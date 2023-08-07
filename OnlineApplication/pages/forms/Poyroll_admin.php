<?php
session_start();
 // Connect to the database
 $conn = mysqli_connect("localhost", "ekhonnec_vakhandli_group", "vakhandli_group", "ekhonnec_vakhandli_group") or die("something wrong happend");

////Saving and Securing Data
if (isset($_POST['save_payroll'])) {

    // Take html names and declare to place holders
 
    $periodroll = $_POST['periodroll'];
    $EmployeeNo = $_POST['EmployeeNo'];
    $DeductionType = $_POST['DeductionType'];
    $SpecifyDeduction = $_POST['SpecifyDeduction'];
    $OrdinaryHours = $_POST['OrdinaryHours'];
  	$OvertimeHours = $_POST['OvertimeHours'];
    $LeaveDaysTaken = $_POST['LeaveDaysTaken'];
    $SickDaysTaken = $_POST['SickDaysTaken'];
  	
    

	// Sanitize user inputs

// Retrieve POST data and sanitize user inputs
$periodroll = filter_var($_POST['periodroll'], FILTER_SANITIZE_STRING);
$EmployeeNo = filter_var($_POST['EmployeeNo'], FILTER_SANITIZE_NUMBER_INT);
$DeductionType = filter_var($_POST['DeductionType'], FILTER_SANITIZE_STRING);
$SpecifyDeduction = filter_var($_POST['SpecifyDeduction'], FILTER_SANITIZE_STRING);
$OrdinaryHours = filter_var($_POST['OrdinaryHours'], FILTER_SANITIZE_STRING);
$OvertimeHours = filter_var($_POST['OvertimeHours'], FILTER_SANITIZE_STRING);
$LeaveDaysTaken = filter_var($_POST['LeaveDaysTaken'], FILTER_SANITIZE_STRING);
$SickDaysTaken = filter_var($_POST['SickDaysTaken'], FILTER_SANITIZE_STRING);



// Prepare and execute SQL query
$stmt = $conn->prepare ("INSERT INTO Payroll_admin (period_roll,Employee_No,Deduction_Type,Specify_Deduction,Ordinary_Hours,Overtime_Hours,LeaveDaysTaken,SickDaysTaken) 
                         VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $periodroll,$EmployeeNo,$DeductionType,$SpecifyDeduction,$OrdinaryHours,$OvertimeHours,$LeaveDaysTaken,$SickDaysTaken);
$stmt->execute();

// Check for errors and commit or rollback transaction
if (!$stmt->error) {
    mysqli_query($conn, "COMMIT");
    echo '<script>
        alert("Info successfully added")
        window.location.replace("Payrol_admin.php");
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
