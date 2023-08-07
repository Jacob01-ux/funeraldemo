<?php
// Establish a database connection
$conn = mysqli_connect('localhost', 'ekhonnec_JeudfraBS', 'JeudfraBS33@', 'ekhonnec_JeudfraBS');

// Check if the connection was successful
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Get the selected Name and Surname from the form
$selectedNameSurname = explode('|', $_POST['NameSurname']);
$selectedName = $selectedNameSurname[0];
$selectedSurname = $selectedNameSurname[1];

// Perform the delete operation
$deleteQuery = "DELETE FROM beneficiaries WHERE Name = '$selectedName' AND Surname = '$selectedSurname'";
if (mysqli_query($conn, $deleteQuery)) {
   echo '<script>
alert("Record Successfully deleted")
window.location.replace("Client_profile.php");
</script>';
} else {
mysqli_query($conn, "ROLLBACK");
echo "Records not deleted successfully";
}

$deleteQuery1 = "DELETE FROM additional_members WHERE Name = '$selectedName' AND Surname = '$selectedSurname'";
if (mysqli_query($conn, $deleteQuery1)) {
    echo "Record deleted successfully.";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}



// Close the database connection
mysqli_close($conn);


?>
