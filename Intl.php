<?php

use Symfony\Component\Intl\Intl;

require_once 'vendor/autoload.php';

//print_r(Intl::getRegionBundle()->getCountryNames());
//print_r(Intl::getLocaleBundle()->getLocaleNames());
print_r(Intl::getCurrencyBundle()->getCurrencyNames());
