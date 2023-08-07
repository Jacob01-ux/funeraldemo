<?php
session_start();

$host = 'localhost';
$dbname = 'ekhonnec_vakhandli_group';
$username = 'ekhonnec_vakhandli_group';
$password = 'vakhandli_group';

$dsn = "mysql:host=$host;dbname=$dbname";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

if (isset($_POST['transfer'])) {
    $policy_no = $_POST['policy_no'];

    try {
        $transferSql = "INSERT INTO clients SELECT * FROM incoming_clients WHERE Policy = :policy";
        $transferStmt = $pdo->prepare($transferSql);
        $transferStmt->bindParam(':policy', $policy_no);
        $transferStmt->execute();

        $deleteSql = "DELETE FROM incoming_clients WHERE Policy = :policy";
        $deleteStmt = $pdo->prepare($deleteSql);
        $deleteStmt->bindParam(':policy', $policy_no);
        $deleteStmt->execute();

        echo "Data transfer successful!";
    } catch (PDOException $e) {
        echo "Error transferring data: " . $e->getMessage();
        die();
    }
}

// Close the database connection
$pdo = null;
?>
