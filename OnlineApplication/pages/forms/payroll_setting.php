

<?php
session_start();
 // Connect to the database
 $conn = mysqli_connect("localhost", "ekhonnec_vakhandli_group", "vakhandli_group", "ekhonnec_vakhandli_group") or die("something wrong happend");

////Saving and Securing Data


//Deduction Details
if (isset($_POST['save_Deduction'])) {
  
$NameOfDeduction = $_POST['NameOfDeduction'];
$DeductionRate = $_POST['DeductionRate'];
$Amount = $_POST['Amount'];

  
$NameOfDeduction = filter_var($_POST['NameOfDeduction'], FILTER_SANITIZE_STRING);
$DeductionRate = filter_var($_POST['DeductionRate'], FILTER_SANITIZE_STRING);
$Amount = filter_var($_POST['Amount'], FILTER_SANITIZE_STRING);

// Check if user input is valid

if ($NameOfDeduction === false || $DeductionRate === false || $Amount === false ) {

    die("Invalid input");

}
  else{
   echo '<script>
    alert("Deduction Details Successfully added")
    window.location.replace("payrol_settings.php");
    </script>';
  }
  


// Prepare and execute the SQL query using prepared statements

$stmt = mysqli_prepare($conn, "INSERT INTO deduction_details (Deduction_Name, Deduction_Rate, Amount) 
    VALUES (?, ?, ?)");

mysqli_stmt_bind_param($stmt, "sss", $NameOfDeduction, $DeductionRate, $Amount);

mysqli_stmt_execute($stmt);

// Close the database connection

mysqli_close($conn);

}

//Job Details
if (isset($_POST['save_Job'])) {
  
$JobTitle = $_POST['JobTitle'];
$JobType = $_POST['JobType'];
$RemunerationType = $_POST['RemunerationType'];
$JobAmount = $_POST['JobAmount'];
$Benefits = $_POST['Benefits'];

  
$JobTitle = filter_var($_POST['JobTitle'], FILTER_SANITIZE_STRING);
$JobType = filter_var($_POST['JobType'], FILTER_SANITIZE_STRING);
$RemunerationType = filter_var($_POST['RemunerationType'], FILTER_SANITIZE_STRING);
$JobAmount = filter_var($_POST['JobAmount'], FILTER_SANITIZE_STRING);
$Benefits = filter_var($_POST['Benefits'], FILTER_SANITIZE_STRING);


// Check if user input is valid

if ($JobTitle === false || $JobType === false || $RemunerationType === false || $JobAmount === false || $Benefits === false) {

    die("Invalid input");

}
  else{
   echo '<script>
    alert("Job Details Successfully added")
    window.location.replace("payrol_settings.php");
    </script>';
  }
  


// Prepare and execute the SQL query using prepared statements

$stmt = mysqli_prepare($conn, "INSERT INTO job_details (job_Name, job_Type, remuneration_Type, Amount, Benefits) 
    VALUES (?, ?, ?, ?, ?)");

mysqli_stmt_bind_param($stmt, "sssss", $JobTitle, $JobType, $RemunerationType, $JobAmount, $Benefits);

mysqli_stmt_execute($stmt);

// Close the database connection

mysqli_close($conn);

}



//Working details

if (isset($_POST['save_Work'])) {

$JobTitles = $_POST['JobTitles'];
$OrdinaryRate = $_POST['OrdinaryRate'];
$LeaveDaysAllowed = $_POST['LeaveDaysAllowed'];
$SickDaysRate = $_POST['SickDaysRate'];
$SundayRate = $_POST['SundayRate'];
$PublicDays = $_POST['PublicDays'];
$OvertimeRate = $_POST['OvertimeRate'];


$JobTitles = filter_var($_POST['JobTitles'], FILTER_SANITIZE_STRING);
$OrdinaryRate = filter_var($_POST['OrdinaryRate'], FILTER_SANITIZE_STRING);
$LeaveDaysAllowed = filter_var($_POST['LeaveDaysAllowed'], FILTER_SANITIZE_STRING);
$SickDaysRate = filter_var($_POST['SickDaysRate'], FILTER_SANITIZE_STRING);
$SundayRate = filter_var($_POST['SundayRate'], FILTER_SANITIZE_STRING);
$PublicDays = filter_var($_POST['PublicDays'], FILTER_SANITIZE_STRING);
$OvertimeRate = filter_var($_POST['OvertimeRate'], FILTER_SANITIZE_STRING);


// Check if user input is valid

if ( $JobTitles === false || $OrdinaryRate === false || $LeaveDaysAllowed === false || $SickDaysRate === false || $SundayRate === false || $PublicDays === false || $OvertimeRate === false) {
    die("Invalid input");
}
  else
  {
     echo '<script>
    alert("Working details Successfully added")
    window.location.replace("payrol_settings.php");
    </script>';
  }

// Start transaction

mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);

// Prepare and execute the SQL query using prepared statements

$stmt = mysqli_prepare($conn, "INSERT INTO working_details (job_Title,rate,leave_Days,sick_Days,sunday_rate,public_days,overtime_rate) 
    VALUES (?, ?, ?, ?, ?, ?, ?)");



mysqli_stmt_bind_param($stmt, "ssssssi", $JobTitles, $OrdinaryRate, $LeaveDaysAllowed, $SickDaysRate, $SundayRate, $PublicDays, $OvertimeRate);

mysqli_stmt_execute($stmt);

// Check for errors and commit or rollback the transaction

if (!mysqli_error($conn)) {
    mysqli_commit($conn);
    echo "Records added successfully";
} else {
    mysqli_rollback($conn);
    echo "Records not added successfully";
}

// Close the database connection

mysqli_close($conn);
}

?>
