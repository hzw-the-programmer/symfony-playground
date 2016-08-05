<?php

namespace AppBundle\Utils;

class MomentFormatConverter
{
    private static $formatConvertRules = array(
        'yyyy' => 'YYYY', 'yy' => 'YY', 'y' => 'YYYY',
        'dd' => 'DD', 'd' => 'D',
        'EE' => 'ddd', 'EEEEEE' => 'dd',
        'ZZZZZ' => 'Z', 'ZZZ' => 'ZZ',
        '\'T\'' => 'T',
    );

    public function convert($format)
    {
        return strtr($format, self::$formatConvertRules);
    }
}

