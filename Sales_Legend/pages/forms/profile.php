<?php
session_start();
$host = 'localhost';
$dbname = 'ekhonnec_JeudfraBS';
$username = 'ekhonnec_JeudfraBS';
$password = 'JeudfraBS33@';

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
$query = "UPDATE clients SET ";
$query .= "n_month = '$getttt', names = '$names', Surname = '$Surname', Customer = '$Customer', idno = '$idno', ";
$query .= "phone = '$phone', gender = '$gender', main_Nationality = '$main_Nationality', languages_ = '$languages_', ";
$query .= "product = '$product', PremiumCoverAmount = '$PremiumCoverAmount', Dep_covered = '$Dep_covered', ";
$query .= "email = '$email', product_add_ben = '$product_add_ben', policy_no = '$policy_no', ";
$query .= "ext_members = '$ext_members', inc_date = '$inc_date', m_status = '$m_status', res_address = '$res_address', ";
$query .= "Preferred_Payment_Date = '$Preferred_Payment_Date', cat = '$cat', sms_status = '$sms_status' ";
$query .= "WHERE policy = 'policy'";

if ($success) {
    echo "Update successful!";
} else {
   // echo "Update failed!";
  header("Location: Clientprofile-certificate.php");
}

// Execute the query using your database connection



 // header("Location: Clientprofile-certificate.php");
?>