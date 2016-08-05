<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ListUsersCommand extends ContainerAwareCommand
{
    private $entityManager;

    protected function configure()
    {
        $this
            ->setName('app:list-users')
            ->setDescription('List all the existing users')
            ->setHelp(<<<HELP
The <info>%command.name%</info> command lists all the users registered in the application:

  <info>php %command.full_name%</info>

By default the command only displays the 50 most recent users. Set the number of
results to display with the <comment>--max-results</comment> option:

  <info>php %command.full_name%</info> <comment>--max-results=2000</comment>

In addition to displaying the user list, you can also send this information to
the email address specified in the <comment>--send-to</comment> option:

  <info>php %command.full_name%</info> <comment>--send-to=fabien@symfony.com</comment>

HELP
            )
            ->addOption(
                'max-results',
                null,
                InputOption::VALUE_OPTIONAL,
                'Limits the number of users listed',
                50
            )
            ->addOption(
                'send-to',
                null,
                InputOption::VALUE_OPTIONAL,
                'If set, the result is sent to the given email address'
            );
    }

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->entityManager = $this->getContainer()->get('doctrine')->getManager();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $maxResults = $input->getOption('max-results');
        $users = $this->entityManager->getRepository('AppBundle:User')->findBy(
            array(),
            array('id' => 'DESC'),
            $maxResults
        );
        $usersAsPlainArrays = array_map(function (User $user) {
            return array(
                    $user->getId(),
                    $user->getUsername(),
                    $user->getEmail(),
                    implode(',', $user->getRoles())
                   );
        }, $users);

        $bufferedOutput = new BufferedOutput();
        $table = new Table($bufferedOutput);
        $table
            ->setHeaders(array('ID', 'Username', 'Email', 'Roles'))
            ->setRows($usersAsPlainArrays);
        $table->render();

        $tableContents = $bufferedOutput->fetch();

        if (null !== $mail = $input->getOption('send-to')) {
            $this->sendReport($tableContents, $email);
        }

        $output->writeln($tableContents);
    }

    private function sendReport($contents, $recipient)
    {
        $mailer = $this->getContainer()->get('mailer');

        $message = $mailer->createMessage()
            ->setSubject(sprintf(
                'app:list-users report (%s)', date('Y-m-d H:i:s')))
            ->setFrom($this->getContainer()->getParameter('app.notifications.email_sender'))
            ->setTo($recipient)
            ->setBody($contents, 'text/plain');

        $mailer->send($message);
    }
}

