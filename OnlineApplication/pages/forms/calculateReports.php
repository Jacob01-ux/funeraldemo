<?php
// Check if the form is submitted
if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Perform database connection
    $host = 'localhost';
    $dbname = 'ekhonnec_vakhandli_group';
    $username = 'ekhonnec_vakhandli_group';
    $password = 'vakhandli_group';

    // Create connection
    $conn = new mysqli($host, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL query to fetch the sum of payments within the selected timeframe
    $sql = "SELECT IFNULL(SUM(monthly_premium), 0) AS total_premium FROM premiums WHERE Date BETWEEN '$start_date' AND '$end_date'";

    // Execute the query
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result) {
        $row = $result->fetch_assoc();
        $total_premium = $row['total_premium'];

        // Send the total premium amount as the response
        echo $total_premium;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
