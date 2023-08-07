<?php

include "connection.php";

$cat = isset($_POST['value1']) ? $_POST['value1'] : null;
$product = isset($_POST['value2']) ? $_POST['value2'] : null;

var_dump($_POST); // Debugging statement

if ($cat && $product) {
    $sql = "SELECT * FROM policies WHERE Group_name = ? AND Policy_name = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$cat, $product]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (empty($result['Amount'])) {
        echo '0';
    } else {
        echo $result['Amount'];
    }
} else {
    echo 'Invalid request parameters';
}

?>