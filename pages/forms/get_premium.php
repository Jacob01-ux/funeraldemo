<?php
include "connection.php";

$cat = isset($_POST['value1']) ? $_POST['value1'] : null;
$product = isset($_POST['value2']) ? $_POST['value2'] : null;


if ($cat && $product) {
    $sql = "SELECT Amount FROM policies WHERE Group_name = ? AND Policy_Name = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ss", $cat, $product);
    $stmt->execute();
    $stmt->bind_result($amount);

    if ($stmt->fetch()) {
        if (empty($amount)) {
            echo '0';
        } else {
            echo $amount;
        }
    } else {
        echo 'No results found';
    }
} else {
    echo 'Invalid request parameters';
}
?>
