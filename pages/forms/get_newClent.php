<?php
include "connection.php";

$PolicyNumber = isset($_POST['PolicyNumber']) ? $_POST['PolicyNumber'] : null;

if ($PolicyNumber) {
    $sql = "SELECT Customer, _ID, Number, Package, PremiumCoverAmount, _On FROM clients WHERE Policy = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $PolicyNumber);
    $stmt->execute();
    $stmt->bind_result($Client, $Client_id, $ContactNumber, $Plan, $monthly_premium, $Date);

    if ($stmt->fetch()) {
        $result = array($Client, $Client_id, $ContactNumber, $Plan, $monthly_premium, $Date);
        echo implode(',', $result);
    } else {
        echo 'No results found';
    }
} else {
    echo 'Invalid request parameters';
}


?>