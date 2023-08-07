<?php
// Start the session
//include_once 'Reminders.php';
// Connect to the database using PDO
$host = 'localhost';
$dbname = 'ekhonnec_vakhandli_group';
$username = 'ekhonnec_vakhandli_group';
$password = 'vakhandli_group';

$dsn = "mysql:host=$host;dbname=$dbname";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $connection = new PDO($dsn, $username, $password, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// retrieve the selected category
$category = $_POST['category'];

// perform a database query to retrieve the policy names
$sql = "SELECT DISTINCT Policy_Name FROM policies WHERE Group_name = '$category'";
$result = mysqli_query($conn, $sql);

// create an array of policy names
$policies = array();
while ($row = mysqli_fetch_assoc($result)) {
  $policies[] = $row;
}

// return the array as JSON
echo json_encode($policies);

?>

?>