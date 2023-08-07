<?php
$currentDate = date('Y-m-d'); // Get the current date
$newDate = date('Y-m-d', strtotime('+6 months', strtotime($currentDate))); // Add 6 months

//echo $newDate; // Output the new date
//
?>