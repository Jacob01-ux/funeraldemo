<?php

namespace PhpSpreadsheetmaster\src\PhpSpreadsheet\Collection;

use PhpSpreadsheetmaster\src\PhpSpreadsheet\Settings;
use PhpSpreadsheetmaster\src\PhpSpreadsheet\Worksheet\Worksheet;

abstract class CellsFactory
{
    /**
     * Initialise the cache storage.
     *
     * @param Worksheet $worksheet Enable cell caching for this worksheet
     *
     * */
    public static function getInstance(Worksheet $worksheet): Cells
    {
        return new Cells($worksheet, Settings::getCache());
    }
}
