<?php

namespace PhpSpreadsheetmaster\src\PhpSpreadsheet\Calculation\MathTrig;

use PhpSpreadsheetmaster\src\PhpSpreadsheet\Calculation\ArrayEnabled;
use PhpSpreadsheetmaster\src\PhpSpreadsheet\Calculation\Exception;
use PhpSpreadsheetmaster\src\PhpSpreadsheet\Calculation\Functions;

class SeriesSum
{
    use ArrayEnabled;

    /**
     * SERIESSUM.
     *
     * Returns the sum of a power series
     *
     * @param mixed $x Input value
     * @param mixed $n Initial power
     * @param mixed $m Step
     * @param mixed[] $args An array of coefficients for the Data Series
     *
     * @return array|float|string The result, or a string containing an error
     */
    public static function evaluate($x, $n, $m, ...$args)
    {
        if (is_array($x) || is_array($n) || is_array($m)) {
            return self::evaluateArrayArgumentsSubset([self::class, __FUNCTION__], 3, $x, $n, $m, ...$args);
        }

        try {
            $x = Helpers::validateNumericNullSubstitution($x, 0);
            $n = Helpers::validateNumericNullSubstitution($n, 0);
            $m = Helpers::validateNumericNullSubstitution($m, 0);

            // Loop through arguments
            $aArgs = Functions::flattenArray($args);
            $returnValue = 0;
            $i = 0;
            foreach ($aArgs as $argx) {
                if ($argx !== null) {
                    $arg = Helpers::validateNumericNullSubstitution($argx, 0);
                    $returnValue += $arg * $x ** ($n + ($m * $i));
                    ++$i;
                }
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return $returnValue;
    }
}
