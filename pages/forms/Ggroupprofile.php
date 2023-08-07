<?php
session_start();
$host = 'localhost';
$dbname = 'jeudfra';
$username = 'root ';
$password = ' ';

$PolicyNumber = $_POST['PolicyNumber'];
$getttt = $_POST['n_month'] ." ". $_POST['n_year'];
$period = $getttt;

$names = $_POST['names'];
$Surname = $_POST['Surname'];
$Customer = $names ." ". $Surname;
$idno = $_POST['idno'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$main_Nationality = $_POST['main_Nationality'];
$languages_ = $_POST['languages_'];
$product = $_POST['product'];
$PremiumCoverAmount = $_POST['Premium'];
$Dep_covered = $_POST['Dep_covered'];
$email = $_POST['email'];
$Email = $_POST['Email'];
$Address = $_POST['Address'];
$Branch_Name = $_POST['Branch_Name'];
$Contact_Number = $_POST['Contact_Number'];

$product_add_ben = $_POST['product_add_ben'];
$policy_no = $_POST['policy_no'];
$ext_members = $_POST['ext_members'];
$inc_date = $_POST['inc_date'];
$m_status = $_POST['m_status'];
$res_address = $_POST['res_address'];

$Preferred_Payment_Date = $_POST['Preferred_Payment_Date'];
$cat = $_POST['cat'];
$sms_status = $_POST['sms_status'];

// Update query with WHERE clause
$query = "UPDATE groups SET ";
$query .= "n_month = '$getttt', names = '$names', Surname = '$Surname', Customer = '$Customer', idno = '$idno', ";
$query .= "phone = '$phone', gender = '$gender', main_Nationality = '$main_Nationality', languages_ = '$languages_', ";
$query .= "product = '$product', PremiumCoverAmount = '$PremiumCoverAmount', Dep_covered = '$Dep_covered', ";
$query .= "WHERE Registration_Number = 'policy'";


if ($success) {
    echo "Update successful!";
} else {
   echo "Update failed!";
 
}

// Execute the query using your database connection



  header("Location: Groupprofile-certificate.php");
?>