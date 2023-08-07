<?php
session_start();

$PolicyNumber = $_POST['PolicyNumber'];
$getttt = $_POST['n_month'] ." ". $_POST['n_year'];
$period = $getttt;

$names = $_POST['names'];
$Surname = $_POST['Surname'];

$Customer = $names ." ". $Surname;
$idno = $_POST['idno'];
$phone = $_POST['phone'];
$gender =  $_POST['gender'];
$main_Nationality = $_POST['main_Nationality'];
$languages_ = $_POST['languages_'];
$product = $_POST['product'];
$PremiumCoverAmount = $_POST['Premium'];
$Dep_covered =  $_POST['Dep_covered'];
$email =  $_POST['email'];

$product_add_ben =  $_POST['product_add_ben'];

$policy_no =  $_POST['policy_no'];

$ext_members =  $_POST['ext_members'];
$inc_date =  $_POST['inc_date'];
$m_status =  $_POST['m_status'];
$res_address = $_POST['res_address'];

$Preferred_Payment_Date = $_POST['Preferred_Payment_Date'];
$cat = $_POST['cat']; 
$sms_status = $_POST['sms_status'];//


  header("Location: Clientprofile-certificate.php");
?>