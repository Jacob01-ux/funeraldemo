

  
<?php
function fetchBranchDetails()
{
    // Create a database connection
    $conn1 = mysqli_connect("localhost", "ekhonnec_vakhandli_group", "vakhandli_group", "ekhonnec_vakhandli_group");

    // Check the connection
    if (!$conn1) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare a statement to fetch data from the database
    $stmt1 = mysqli_prepare($conn1, "SELECT Contact_Number, Email, Address, Branch_Name FROM branch_details");

    // Execute the prepared statement
    mysqli_stmt_execute($stmt1);

    // Bind result variables
    mysqli_stmt_bind_result($stmt1, $Contact_Number, $Email, $Address, $Branch_Name);

    // Fetch the results
    $results = array();
    while (mysqli_stmt_fetch($stmt1)) {
        // Store fetched data in an array
        $result = array(
            'Contact_Number' => $Contact_Number,
            'Email' => $Email,
            'Address' => $Address,
            'Branch_Name' => $Branch_Name
        );
        $results[] = $result;
    }

    // Close the statement
    mysqli_stmt_close($stmt1);
    mysqli_close($conn1);

    // Return the results
    return $results;
}

// Call the function and output the results
$results = fetchBranchDetails();
foreach ($results as $result) {
    echo $result['Contact_Number'] . "<br>";
    echo $result['Email'] . "<br>";
    echo $result['Address'] . "<br>";
    echo $result['Branch_Name'] . "<br>";
}
?>
