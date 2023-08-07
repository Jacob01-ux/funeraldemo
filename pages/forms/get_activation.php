<?php
include "connection.php";

$cat = isset($_POST['value1']) ? $_POST['value1'] : null;
$product = isset($_POST['value2']) ? $_POST['value2'] : null;

if ($cat && $product) {
    $sql = "SELECT waiting_period FROM policies WHERE Group_name = ? AND Policy_Name = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ss", $cat, $product);
    $stmt->execute();
    $stmt->bind_result($waiting_period);

    $waitingPeri = array(); // Initialize an empty array to store the waiting periods

    while ($stmt->fetch()) {
        $waitingPeri[] = $waiting_period; // Add each waiting period to the $waitingPeri array
    }

    if (!empty($waitingPeri)) {
        $inc_date = new DateTime();
        $waiting_period_in_days = reset($waitingPeri) * 30; // Convert waiting period to days
        $inc_date->add(new DateInterval("P" . $waiting_period_in_days . "D")); // Assuming there's only one waiting period
        $Activation_date = $inc_date->format('Y-m-d');

        echo $Activation_date;
    } else {
        echo 'No waiting period found for the given category and product.';
    }
} else {
    echo 'Invalid request parameters';
}
?>
