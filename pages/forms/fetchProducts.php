<?php
include "connection.php";

$cat = isset($_POST['value1']) ? $_POST['value1'] : null;

if ($cat) {
    $sql = "SELECT Policy_Name FROM policies WHERE Group_name = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $cat);
    $stmt->execute();
    $stmt->bind_result($Policy_Name);

    $products = array();

    while ($stmt->fetch()) {
        $products[] = $Policy_Name;
    }

    if (!empty($products)) {
        $options = "";
        foreach ($products as $product) {
            $options .= "<option value='$product'>$product</option>";
        }
        echo $options;
    } else {
        echo "<option value=''>No products found</option>";
    }
} else {
    echo "<option value=''>Invalid request parameters</option>";
}
?>
