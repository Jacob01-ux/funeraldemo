<?php

namespace PhpSpreadsheetmaster\src\PhpSpreadsheet\Calculation\MathTrig;

use PhpSpreadsheetmaster\src\PhpSpreadsheet\Calculation\ArrayEnabled;
use PhpSpreadsheetmaster\src\PhpSpreadsheet\Calculation\Exception;

class Exp
{
    use ArrayEnabled;

    /**
     * EXP.
     *
     * Returns the result of builtin function exp after validating args.
     *
     * @param mixed $number Should be numeric, or can be an array of numbers
     *
     * @return array|float|string Rounded number
     *         If an array of numbers is passed as the argument, then the returned result will also be an array
     *            with the same dimensions
     */
    public static function evaluate($number)
    {
        if (is_array($number)) {
            return self::evaluateSingleArgumentArray([self::class, __FUNCTION__], $number);
        }

        try {
            $number = Helpers::validateNumericNullBool($number);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return exp($number);
    }
}
