<?php
require_once 'PhpSpreadsheetmaster/src/PhpSpreadsheet/IOFactory.php';
require_once 'PhpSpreadsheetmaster/src/PhpSpreadsheet/Spreadsheet.php';
require_once 'PhpSpreadsheetmaster/src/PhpSpreadsheet/Writer/Xlsx.php';

use PhpSpreadsheetmaster\src\PhpSpreadsheet\IOFactory;
use PhpSpreadsheetmaster\src\PhpSpreadsheet\Spreadsheet;
use PhpSpreadsheetmaster\src\PhpSpreadsheet\Writer\Xlsx;


//use PhpOffice\PhpSpreadsheet\IOFactory;
//use PhpOffice\PhpSpreadsheet\Spreadsheet;
//use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['table'])) {
    $table = $_POST['table'];

    // Fetch data for the selected table (replace this with your actual data retrieval logic)
    $data = fetchDataForTable($table);

    // Create a new Spreadsheet object
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set the headers
    $headers = array_keys($data[0]);
    foreach ($headers as $index => $header) {
        $column = chr(65 + $index);
        $sheet->setCellValue($column . '1', $header);
    }

    // Set the data
    $row = 2;
    foreach ($data as $rowData) {
        foreach ($rowData as $index => $value) {
            $column = chr(65 + $index);
            $sheet->setCellValue($column . $row, $value);
        }
        $row++;
    }

    // Create a writer and save the spreadsheet as an XLSX file
    $writer = new Xlsx($spreadsheet);
    $filename = 'table_data.xlsx';
    $writer->save($filename);

    // Send the file to the browser
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Cache-Control: max-age=0');
    readfile($filename);
    unlink($filename); // Delete the temporary file
    exit;
}

function fetchDataForTable($table)
{
    // Replace this with your actual data retrieval logic for the specified table
    // Return an array of data
    return [];
}
