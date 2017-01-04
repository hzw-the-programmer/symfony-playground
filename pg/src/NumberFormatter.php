<?php

$formatter = new NumberFormatter('zh_CN', NumberFormatter::DECIMAL);
$len = 30;
printf("%-{$len}s: %d\n", "MAX_FRACTION_DIGITS", $formatter->getAttribute(NumberFormatter::MAX_FRACTION_DIGITS));
printf("%-{$len}s: %d\n", "FRACTION_DIGITS", $formatter->getAttribute(NumberFormatter::FRACTION_DIGITS));
printf("%-{$len}s: %s\n", "ROUNDING_MODE", roundingModeStr($formatter->getAttribute(NumberFormatter::ROUNDING_MODE)));
printf("%-{$len}s: %d\n", "GROUPING_USED", $formatter->getAttribute(NumberFormatter::GROUPING_USED));
printf("%-{$len}s: %s\n", "GROUPING_SEPARATOR_SYMBOL", $formatter->getSymbol(NumberFormatter::GROUPING_SEPARATOR_SYMBOL));
printf("%-{$len}s: %s\n", "DECIMAL_SEPARATOR_SYMBOL", $formatter->getSymbol(NumberFormatter::DECIMAL_SEPARATOR_SYMBOL));
printf("%-{$len}s: %s\n", "FORMAT", $formatter->format(1234.56789));

echo "\n";

$formatter = new NumberFormatter('zh_CN', NumberFormatter::SPELLOUT);
echo $formatter->format(1234.56789) . "\n";

function roundingModeStr($roundingMode) {
    switch($roundingMode) {
        case NumberFormatter::ROUND_CEILING:
            return 'ROUND_CEILING';
        case NumberFormatter::ROUND_FLOOR:
            return 'ROUND_FLOOR';
        case NumberFormatter::ROUND_UP:
            return 'ROUND_UP';
        case NumberFormatter::ROUND_DOWN:
            return 'ROUND_DOWN';
        case NumberFormatter::ROUND_HALFUP:
            return 'ROUND_HALFUP';
        case NumberFormatter::ROUND_HALFDOWN:
            return 'ROUND_HALFDOWN';
        case NumberFormatter::ROUND_HALFEVEN:
            return 'ROUND_HALFEVEN';
        default:
            return 'UNKNOWN: ' . $roundingMode;
    }
}
