<?php
// Get the input values from the AJAX request
$groupName = $_POST['Group_Name'];
$policyName = $_POST['product'];

// Perform the database query (assuming the credentials are correct)
$servername = 'localhost';
$dbname = 'jeudfra';
$username = 'root ';
$password = ' ';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT Extra_Member FROM policies WHERE Group_name = ? AND Policy_Name = ?");
$stmt->bind_param("ss", $groupName, $policyName);
$stmt->execute();
$stmt->bind_result($extraAmount);
$stmt->fetch();

// Send the response as a simple JSON object
$response = array('extraAmount' => $extraAmount);
echo json_encode($response);

$stmt->close();
$conn->close();
?>
