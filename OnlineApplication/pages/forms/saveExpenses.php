<?php
session_start();

// Connect to the database
$conn = mysqli_connect("localhost", "ekhonnec_vakhandli_group", "vakhandli_group", "ekhonnec_vakhandli_group");
if (!$conn) {
    die("Failed to connect to the database: " . mysqli_connect_error());
}

if (isset($_POST['expenses'])) {
    // Retrieve the form data and sanitize inputs
  
    $EMonth = mysqli_real_escape_string($conn, $_POST['EMonth']);
    $EYear = mysqli_real_escape_string($conn, $_POST['EYear']);
    $Paid_by = mysqli_real_escape_string($conn, $_POST['Paid_by']);
    $Authorised_by = mysqli_real_escape_string($conn, $_POST['Authorised_by']);
    $E_To = mysqli_real_escape_string($conn, $_POST['E_To']);
    $Ref2 = mysqli_real_escape_string($conn, $_POST['Ref2']);
    $transaction_type = mysqli_real_escape_string($conn, $_POST['transaction_type']);
    $TransM = mysqli_real_escape_string($conn, $_POST['TransM']);
    $Description2 = mysqli_real_escape_string($conn, $_POST['Description2']);
    $Price2 = mysqli_real_escape_string($conn, $_POST['Price2']);
    $quantity2 = mysqli_real_escape_string($conn, $_POST['quantity2']);
    $transaction_date = mysqli_real_escape_string($conn, $_POST['transaction_date']);
    $admin = mysqli_real_escape_string($conn, $_POST['admin']);
  
    $prodPeriod4 = $_POST['EMonth'] . ' ' . $_POST['EYear'];
   $currentdate4 = date("Y-m-d H:i:s");
  $prodAmnt = $quantity2 * $Price2;

    // Insert the data into the database
    $sql = "INSERT INTO expenses (Period, Paid_by, Authorised_by, _To, transaction_type, transaction_method, description, price, quantity,Amount, Transaction_date, refNumber, _By, _On) 
            VALUES ('$prodPeriod4', '$Paid_by', '$Authorised_by', '$E_To', '$transaction_type', '$TransM', '$Description2', '$Price2', '$quantity2', '$prodAmnt','$transaction_date', '$Ref2','$admin','$currentdate4')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Data inserted successfully
        echo '<script>
        alert("Record successfully added")
        window.location.replace("Cashbook.php");
    </script>';
    } else {
        // Error occurred while inserting data
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}

// Close the database connection
mysqli_close($conn);
?>
