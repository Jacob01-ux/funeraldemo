<?php
session_start();
 // Connect to the database
 $conn = mysqli_connect("localhost", "jeudfra", " ", "root") or die("something wrong happend");

////Saving and Securing Data
if (isset($_POST['Save'])) {

    // Take html names and declare to place holders
 
    $Branch_Name = $_POST['Branch_Name'];
    $Business_Conctact = $_POST['Business_Conctact'];
    $Email = $_POST['Email'];
    $Address = $_POST['Address'];
    $Registration_Number = $_POST['Registration_Number'];
  	$Name_of_Bank = $_POST['Name_of_Bank'];
    $Account_Holder = $_POST['Account_Holder'];
    $Account_Number = $_POST['Account_Number'];
  	$Branch_Code = $_POST['Branch_Code'];
  	$Business_Name = $_POST['Business_Name'];
  	$Slogan = $_POST['Slogan'];
    

	// Sanitize user inputs

// Retrieve POST data and sanitize user inputs
$Branch_Name = filter_var($_POST['Branch_Name'], FILTER_SANITIZE_STRING);
$Business_Conctact = filter_var($_POST['Business_Conctact'], FILTER_SANITIZE_NUMBER_INT);
$Email = filter_var($_POST['Email'], FILTER_SANITIZE_STRING);
$Address = filter_var($_POST['Address'], FILTER_SANITIZE_STRING);
$Registration_Number= filter_var($_POST['Registration_Number'], FILTER_SANITIZE_NUMBER_INT);
$Name_of_Bank = filter_var($_POST['Name_of_Bank'], FILTER_SANITIZE_STRING);
$Account_Holder = filter_var($_POST['Account_Holder'], FILTER_SANITIZE_STRING);
$Account_Number = filter_var($_POST['Account_Number'], FILTER_SANITIZE_STRING);
$Branch_Code= filter_var($_POST['Branch_Code'], FILTER_SANITIZE_NUMBER_INT);
$Business_Name = filter_var($_POST['Business_Name'], FILTER_SANITIZE_STRING);
$Slogan = filter_var($_POST['Slogan'], FILTER_SANITIZE_STRING);


// Prepare and execute SQL query
$stmt = $conn->prepare ("INSERT INTO branch_details (Branch_Name,Contact_Number,Email,Address,Account_Number,Registration_No,Name_of_Bank,Account_Holder,Business_Name,Slogan) 
                         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ? )");
$stmt->bind_param("ssssssssss", $Branch_Name,$Business_Conctact,$Email,$Address,$Account_Number,$Registration_Number,$Name_of_Bank,$Account_Holder,$Business_Name,$Slogan,);
$stmt->execute();

// Check for errors and commit or rollback transaction
if (!$stmt->error) {
    mysqli_query($conn, "COMMIT");
    echo '<script>
        alert("Record successfully added")
        window.location.replace("Cash_Book.html");
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
