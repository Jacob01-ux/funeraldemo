<?php
session_start();
 // Connect to the database
 $conn = mysqli_connect("localhost", "jeudfra", " ", "root") or die("something wrong happend");

////Saving and Securing Data
if (isset($_POST['Save'])) {

    // Take html names and declare to place holders
 
    $categoryName = $_POST['categoryName'];
 
    

	// Sanitize user inputs

// Retrieve POST data and sanitize user inputs
$categoryName = filter_var($_POST['categoryName'], FILTER_SANITIZE_STRING);




// Prepare and execute SQL query
$stmt = $conn->prepare ("INSERT INTO categories (categoryName) 
                         VALUES ( ?)");
$stmt->bind_param("s", $categoryName);
$stmt->execute();

// Check for errors and commit or rollback transaction
if (!$stmt->error) {
    mysqli_query($conn, "COMMIT");
    echo '<script>
        alert("Record successfully added")
        window.location.replace("Add_Categories.php");
    </script>';
} else {
    mysqli_query($conn, "ROLLBACK");
    echo "Records not added successfully";
}

// Close connection and statement
$stmt->close();
$conn->close();
}

?>
