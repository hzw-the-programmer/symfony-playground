<?php

namespace AppBundle\Twig;

use AppBundle\Utils\Markdown;
use Symfony\Component\Intl\Intl;

class AppExtension extends \Twig_Extension
{
    private $parser;
    private $locales;

    public function __construct(Markdown $parser, $locales)
    {
        $this->parser = $parser;
        $this->locales = $locales;
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter(
                'md2html',
                array($this, 'markdownToHtml'),
                array('is_safe' => array('html'))
            ),
        );
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction(
                'locales',
                array($this, 'getLocales')
            ),
        );
    }

    public function markdownToHtml($content)
    {
        return $this->parser->toHtml($content);
    }

    public function getLocales()
    {
        $localeCodes = explode('|', $this->locales);

        $locales = array();
        foreach ($localeCodes as $localeCode) {
            $locales[] = array(
                'code' => $localeCode,
                'name' => Intl::getLocaleBundle()->getLocaleName($localeCode, $localeCode)
            );
        }

        return $locales;
    }

    public function getName()
    {
        return 'app.extension';
    }
}

