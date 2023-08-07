<?php

namespace PhpSpreadsheetmaster\src\PhpSpreadsheet\Calculation\Financial\Securities;

use PhpSpreadsheetmaster\src\PhpSpreadsheet\Calculation\Exception;
use PhpSpreadsheetmaster\src\PhpSpreadsheet\Calculation\Financial\FinancialValidations;
use PhpSpreadsheetmaster\src\PhpSpreadsheet\Calculation\Information\ExcelError;

class SecurityValidations extends FinancialValidations
{
    /**
     * @param mixed $issue
     */
    public static function validateIssueDate($issue): float
    {
        return self::validateDate($issue);
    }

    /**
     * @param mixed $settlement
     * @param mixed $maturity
     */
    public static function validateSecurityPeriod($settlement, $maturity): void
    {
        if ($settlement >= $maturity) {
            throw new Exception(ExcelError::NAN());
        }
    }

    /**
     * @param mixed $redemption
     */
    public static function validateRedemption($redemption): float
    {
        $redemption = self::validateFloat($redemption);
        if ($redemption <= 0.0) {
            throw new Exception(ExcelError::NAN());
        }

        return $redemption;
    }
}
