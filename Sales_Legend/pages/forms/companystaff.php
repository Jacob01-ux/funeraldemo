<?php
session_start();
 // Connect to the database
 $conn = mysqli_connect("localhost", "jeudfra", " ", "root") or die("something wrong happend");

////Saving and Securing Data

//staff1

if (isset($_POST['save_staff2'])) {
  
    $staff1Name = $_POST['staff1Name'];
    $staff1Surname = $_POST['staff1Surname'];
    $staff1ID = $_POST['staff1ID'];
    $staff1Gender = $_POST['staff1Gender'];
    $staff1Contact = $_POST['staff1Contact'];
    $staff1Email = $_POST['staff1Email'];
    $staff1PhysicalAddress = $_POST['staff1PhysicalAddress'];
    $staff1DOB = $_POST['staff1DOB'];
    $staffRole = $_POST['staffRole'];
    $JobDescription = $_POST['JobDescription'];
    $induction = $_POST['induction'];
    $AccountHolder = $_POST['AccountHolder'];
    $AccountNumber = $_POST['AccountNumber'];
    $BranchCode = $_POST['BranchCode'];
    $BankName = $_POST['BankName'];
    $NameNsurname = $_POST['NameNsurname'];
    $CellphoneNo = $_POST['CellphoneNo'];
    $kinAddress = $_POST['kinAddress'];
  
    $staff1Name = filter_var($_POST['staff1Name'], FILTER_SANITIZE_STRING);
    $staff1Surname = filter_var($_POST['staff1Surname'], FILTER_SANITIZE_STRING);
    $staff1ID = filter_var($_POST['staff1ID'], FILTER_VALIDATE_INT);
    $staff1Gender = filter_var($_POST['staff1Gender'], FILTER_SANITIZE_STRING);
    $ArefNo = filter_var($_POST['staff1Contact'], FILTER_VALIDATE_INT);
    $Aquantity = filter_var($_POST['staff1Email'], FILTER_SANITIZE_STRING);
    $staff1PhysicalAddress = filter_var($_POST['staff1PhysicalAddress'], FILTER_VALIDATE_FLOAT);
    $staff1DOB = filter_var($_POST['staff1DOB'], FILTER_SANITIZE_STRING);
    $staffRole = filter_var($_POST['staffRole'], FILTER_SANITIZE_STRING);
    $JobDescription = filter_var($_POST['JobDescription'], FILTER_SANITIZE_STRING);
    $induction = filter_var($_POST['induction'], FILTER_SANITIZE_STRING);
    $AccountHolder = filter_var($_POST['AccountHolder'], FILTER_SANITIZE_STRING);
    $AccountNumber = filter_var($_POST['AccountNumber'], FILTER_VALIDATE_INT);
    $BranchCode = filter_var($_POST['BranchCode'], FILTER_VALIDATE_FLOAT);
    $BankName = filter_var($_POST['BankName'], FILTER_SANITIZE_STRING);
    $NameNsurname = filter_var($_POST['NameNsurname'], FILTER_SANITIZE_STRING);
    $CellphoneNo = filter_var($_POST['CellphoneNo'], FILTER_VALIDATE_INT);
    $kinAddress = filter_var($_POST['kinAddress'], FILTER_SANITIZE_STRING);


// Prepare and execute the SQL query using prepared statements
$stmt = mysqli_prepare($conn, "INSERT INTO staffmember1 (name, surname, ID_number, gender, phone_number, physical_addres, date_of_birth, Role, Job_Description, induct_date, accHolder, accNumber, branchCode, bankName, Name_and_Surname, cell_number, next_of_kin_address, email) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
mysqli_stmt_bind_param($stmt, "sssssssssssssiiidd", $staff1Name, $staff1Surname, $staff1ID, $staff1Gender, $staff1Contact, $staff1PhysicalAddress, $staff1DOB, $staffRole, $JobDescription, $induction, $AccountHolder, $AccountNumber, $BranchCode, $BankName, $NameNsurname, $CellphoneNo, $kinAddress, $staff1Email);

mysqli_stmt_execute($stmt);

// Check for errors and commit or rollback transaction
if (!$stmt->error) {
    mysqli_query($conn, "COMMIT");
    echo '<script>
        alert("Record successfully added")
        window.location.replace("companyStaff.php");
    </script>';
} else {
    mysqli_query($conn, "ROLLBACK");
    echo "Records not added successfully";
}

// Close the statement
$stmt->close();

// Close the database connection
$conn->close();
}
?>