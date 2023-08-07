<?php
session_start();
 // Connect to the database
 $conn = mysqli_connect("localhost", "jeudfra", " ", "root") or die("something wrong happend");

////Saving and Securing Data

//staff1

if (isset($_POST['save_staff1'])) {
    // Retrieve the form data
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

    // Sanitize and validate the form data
    $staff1Name = filter_var($staff1Name, FILTER_SANITIZE_STRING);
    $staff1Surname = filter_var($staff1Surname, FILTER_SANITIZE_STRING);
    $staff1ID = filter_var($staff1ID, FILTER_VALIDATE_INT);
    $staff1Gender = filter_var($staff1Gender, FILTER_SANITIZE_STRING);
    $staff1Contact = filter_var($staff1Contact, FILTER_SANITIZE_STRING);
    $staff1Email = filter_var($staff1Email, FILTER_SANITIZE_EMAIL);
    $staff1PhysicalAddress = filter_var($staff1PhysicalAddress, FILTER_SANITIZE_STRING);
    $staff1DOB = filter_var($staff1DOB, FILTER_SANITIZE_STRING);
    $staffRole = filter_var($staffRole, FILTER_SANITIZE_STRING);
    $JobDescription = filter_var($JobDescription, FILTER_SANITIZE_STRING);
    $induction = filter_var($induction, FILTER_SANITIZE_STRING);
    $AccountHolder = filter_var($AccountHolder, FILTER_SANITIZE_STRING);
    $AccountNumber = filter_var($AccountNumber, FILTER_VALIDATE_INT);
    $BranchCode = filter_var($BranchCode, FILTER_VALIDATE_FLOAT);
    $BankName = filter_var($BankName, FILTER_SANITIZE_STRING);
    $NameNsurname = filter_var($NameNsurname, FILTER_SANITIZE_STRING);
    $CellphoneNo = filter_var($CellphoneNo, FILTER_VALIDATE_INT);
    $kinAddress = filter_var($kinAddress, FILTER_SANITIZE_STRING);

    // Prepare and execute the SQL query using prepared statements
    $stmt = mysqli_prepare($conn, "INSERT INTO staffmember1 (name, surname, ID_number, gender, phone_number, physical_addres, date_of_birth, Role, Job_Description, induct_date, accHolder, accNumber, branchCode, bankName, Name_and_Surname, cell_number, next_of_kin_address, email) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    mysqli_stmt_bind_param($stmt, "ssisssssssssssisss", $staff1Name, $staff1Surname, $staff1ID, $staff1Gender, $staff1Contact, $staff1PhysicalAddress, $staff1DOB, $staffRole, $JobDescription, $induction, $AccountHolder, $AccountNumber, $BranchCode, $BankName, $NameNsurname, $CellphoneNo, $kinAddress, $staff1Email);

    mysqli_stmt_execute($stmt);

    // Check for errors and commit or rollback transaction
    if (!mysqli_stmt_error($stmt)) {
        mysqli_query($conn, "COMMIT");
        echo '<script>
            alert("Record successfully added");
            window.location.replace("Company_Staff.php");
        </script>';
    } else {
        mysqli_query($conn, "ROLLBACK");
        echo "Records not added successfully";
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($conn);
}

?>