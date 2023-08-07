<?php
$host = 'localhost';
$dbname = 'jeudfra';
$username = 'root ';
$password = ' ';

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

// Get the selected year from the POST request
$selectedYear = $_POST['year'];

// Construct the SQL query to retrieve data for the selected year
$query = "SELECT SUBSTRING(Period, 1, LENGTH(Period) - 4) AS month, SUBSTRING(Period, -4) AS year, COUNT(*) AS count
          FROM clients
          WHERE SUBSTRING(Period, -4) = :selectedYear
          GROUP BY SUBSTRING(Period, 1, LENGTH(Period) - 4)
          ORDER BY FIELD(SUBSTRING(Period, 1, LENGTH(Period) - 4), 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')";

// Prepare the query and bind the selected year parameter
$statement = $connection->prepare($query);
$statement->bindParam(':selectedYear', $selectedYear, PDO::PARAM_INT);
$statement->execute();

// Fetch the results as an associative array
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

// Close the database connection
$connection = null;

// Return the data as JSON
echo json_encode($data);
?>