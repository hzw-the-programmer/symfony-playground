<?php

namespace AppBundle\Utils;

class Markdown
{
    private $parser;
    private $purifier;

    public function __construct()
    {
        $this->parser = new \Parsedown();

        $purifierConfig = \HTMLPurifier_Config::create(array(
            'Cache.DefinitionImpl' => null,
        ));
        $this->purifier = new \HTMLPurifier($purifierConfig);
    }

    public function toHtml($text)
    {
        $html = $this->parser->text($text);
        $safeHtml = $this->purifier->purify($html);

        return $safeHtml;
    }
}

