<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Check if the "PolicyNumber" key exists in $_POST
  if (isset($_POST['PolicyNumber'])) {
    // Retrieve the selected policy number
    $selectedPolicyNumber = $_POST['PolicyNumber'];

    // Establish a database connection (replace with your own details)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jeudfra";

    // Create a new connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check the connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL query to retrieve the last 5 records for the selected policy number
    $sql = "SELECT * FROM premiums WHERE Policy = '$selectedPolicyNumber' ORDER BY Date DESC LIMIT 5";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if any records were found
   if (mysqli_num_rows($result) > 0) {
  // Create a table to display the records
  echo '<table style="border-collapse: collapse; width: 100%;">';
  echo '<tr style="background-color: #f2f2f2;">
          <th style="border: 1px solid #ddd; padding: 8px;">Policy Number</th>
          <th style="border: 1px solid #ddd; padding: 8px;">ID Number</th>
          <th style="border: 1px solid #ddd; padding: 8px;">Monthly Premium Amount</th>
          <th style="border: 1px solid #ddd; padding: 8px;">Record Date</th>
        </tr>';

  // Loop through the rows and display the records
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr style="border: 1px solid #ddd; padding: 8px;">
            <td style="border: 1px solid #ddd; padding: 8px;">' . $row['Policy'] . '</td>
            <td style="border: 1px solid #ddd; padding: 8px;">' . $row['Client_id'] . '</td>
            <td style="border: 1px solid #ddd; padding: 8px;">' . $row['monthly_premium'] . '</td>
            <td style="border: 1px solid #ddd; padding: 8px;">' . $row['Date'] . '</td>
          </tr>';
  }

  echo '</table>';// Close the table
    } else {
      echo "No records found for the selected policy number.";
    }

    // Close the database connection
    mysqli_close($conn);
  } else {
    echo "No policy number provided.";
  }
}
?>
