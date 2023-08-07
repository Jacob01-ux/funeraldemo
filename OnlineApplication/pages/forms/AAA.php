<!DOCTYPE html>
<html>
<head>
    <title>Sum of Payments</title>
</head>
<body>
    <h1>Sum of Payments</h1>
    <form method="POST" action="">
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" required>
        <br>
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" required>
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    // Check if the form is submitted
    if (isset($_POST['submit'])) {
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

            // Display the total payments
            echo "<p>Total Premium Amount: $total_premium</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
    ?>
</body>
</html>

