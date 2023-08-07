<?php
include "connection.php";

$policyNumber = isset($_POST['policyNumber']) ? $_POST['policyNumber'] : null;

if ($policyNumber) {
    $sql = "SELECT DISTINCT Name, Surname FROM additional_members WHERE Policy_Number = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $policyNumber);
    $stmt->execute();
    $stmt->bind_result($name, $surname);

    $dependents = array();

    while ($stmt->fetch()) {
        $dependents[] = $name . ' ' . $surname;
    }

    if (!empty($dependents)) {
        $options = "";
        foreach ($dependents as $dependent) {
            $options .= "<option value='$dependent'>$dependent</option>";
        }
        echo $options;
    } else {
        echo "<option value=''>No Extended Members found</option>";
    }
} else {
    echo "<option value=''>Invalid request parameters</option>";
}
?>
