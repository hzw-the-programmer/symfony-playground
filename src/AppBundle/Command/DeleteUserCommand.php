<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DeleteUserCommand extends ContainerAwareCommand
{
    const MAX_ATTEMPTS = 5;

    private $entityManager;

    protected function configure()
    {
        $this
            ->setName('app:delete-user')
            ->setDescription('Delete users from the database')
            ->setHelp(<<<HELP
The <info>%command.name%</info> command deletes users from the database:

  <info>php %command.full_name%</info> <comment>username</comment>

If you omit the argument, the command will ask you to
provide the missing value:

  <info>php %command.full_name%</info>
HELP
            );
    }

    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->entityManager = $this->getContainer()->get('doctrine')->getManager();
    }

    protected function interact(InputInterface $input, OutputInterface $output)
    {
        if (null !== $input->getArgument('username')) {
            return;
        }

        $output->writeln('');
        $output->writeln('Delete User Command Interactive Wizard');
        $output->writeln('--------------------------------------');

        $output->writeln(array(
            '',
            'If you prefer to not use this interactive wizard, provide the',
            'arguments required by this command as follows:',
            '',
            ' $ php app/console app:delete-user username',
            '',
        ));

        $output->writeln(array(
            '',
            'Now we\'ll ask you for the value of all the missing command arguments.',
            '',
        ));

        $helper = $this->getHelper('question');

        $question = new Question(' > <info>Username</info>: ');
        $question->setValidator(array($this, 'usernameValidator'));
        $question->setMaxAttempts(self::MAX_ATTEMPTS);

        $username = $helper->ask($input, $output, $question);
        $input->setArgument('username', $username);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $username = $input->getArgument('username');
        $this->usernameValidator($username);

        $repository = $this->entityManager->getRepository('AppBundle:User');
        $user = $repository->findOnByUsername($username);

        if (null === $user) {
            throw new \RuntimeException(sprintf(
                'User with username "%s" not found.',
                $username
            ));
        }

        $userId = $user->getId();
        $this->entityManager->remove($user);
        $this->entityManager->flush();

        $output->writeln('');
        $output->writeln(sprintf(
            '[OK] User "%s" (ID: %d, email: %s) was successfully deleted.',
            $user->getUsername(),
            $userId,
            $user->getEmail()
        ));
    }

    public function usernameValidator($username)
    {
        if (empty($username)) {
            throw new \Exception('The username can not be empty.');
        }

        if (1 !== preg_match('/^[a-z_]+$/', $username)) {
            throw new \Exception(
                'The username must contain only lowercase latin characters and underscores.'
            );
        }

        return $username;
    }
}

