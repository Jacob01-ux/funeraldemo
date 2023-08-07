<?php
session_start();
 // Connect to the database
 $conn = mysqli_connect("localhost", "jeudfra", " ", "root") or die("something wrong happend");

////Saving and Securing Data
if (isset($_POST['Save'])) {

    // Take html names and declare to place holders
 
    $Name_and_Surname = $_POST['Name_and_Surname'];
    $ID_ = $_POST['ID_'];
    $Company_name = $_POST['Company_name'];
    $Company_telephone = $_POST['Company_telephone'];
    $Physical_Address = $_POST['Physical_Address'];
    $Email_Address = $_POST['Email_Address'];
    $type = $_POST['type'];
    

	// Sanitize user inputs

// Retrieve POST data and sanitize user inputs
$Name_and_Surname = filter_var($_POST['Name_and_Surname'], FILTER_SANITIZE_STRING);
$ID_ = filter_var($_POST['ID_'], FILTER_SANITIZE_NUMBER_INT);
$Company_name = filter_var($_POST['Company_name'], FILTER_SANITIZE_STRING);
$Company_telephone = filter_var($_POST['Company_telephone'], FILTER_SANITIZE_NUMBER_INT);
$Physical_Address= filter_var($_POST['Physical_Address'], FILTER_SANITIZE_STRING);
$Email_Address = filter_var($_POST['Email_Address'], FILTER_SANITIZE_STRING);
$type = filter_var($_POST['type'], FILTER_SANITIZE_STRING);


// Prepare and execute SQL query
$stmt = $conn->prepare ("INSERT INTO phonebook (Name_and_Surname,ID_,Company_name,Company_telephone,Physical_Address,Email_Address,type) 
                         VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $Name_and_Surname, $ID_, $Company_name, $Company_telephone, $Physical_Address, $Email_Address, $type,);
$stmt->execute();

// Check for errors and commit or rollback transaction
if (!$stmt->error) {
    mysqli_query($conn, "COMMIT");
    echo '<script>
        alert("Record successfully added")
        window.location.replace("phonebook.php");
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
