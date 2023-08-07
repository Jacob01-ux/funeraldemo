<?php
// Connect to the database using PDO
	$host = 'localhost';
$dbname = 'jeudfra';
$username = 'root ';
$password = ' ';

// Create a new connection
$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$selectedPolicyNumber = $_POST['PolicyNumber'];
$Name = $_POST['names'];
$contact = $_POST['phone1'];
$n_month = $_POST['n_month'];
    $Group_Name = $_POST['Group_Name'];
    $product = $_POST['product'];
    $Premium = $_POST['Premium'];
    $product_add_ben = $_POST['product_add_ben'];
    $Dep_covered = $_POST['Dep_covered'];
    $ext_members = $_POST['ext_members'];
    $Preferred_Payment_Date = $_POST['Preferred_Payment_Date'];
    $inc_date = $_POST['inc_date'];
    $idno = $_POST['idno'];
    $Nationality = $_POST['Nationality'];
    $languages_ = $_POST['languages_'];
    $gender = $_POST['gender'];
    $Status = $_POST['Status'];
    $email = $_POST['email'];
    $res_address = $_POST['res_address'];
    $m_status = $_POST['m_status'];
    $Sp_Name = $_POST['Sp_Name'];
    $Sp_Surname = $_POST['Sp_Surname'];
    $Sp_ContactNo = $_POST['Sp_ContactNo'];
    $Sp_idNumber = $_POST['Sp_idNumber'];




$updateQuery = "UPDATE clients SET Customer = '$Name', Number = '$contact',  Period = '$n_month', Group_Name = '$Group_Name', Package = '$product',
            PremiumCoverAmount = '$Premium',
            Product_Added_Benefit = '$product_add_ben',
            Covered = '$Dep_covered',
            extended_members = '$ext_members',
            Payment_Date = '$Preferred_Payment_Date',
            inception_date = '$inc_date',
            _ID = '$idno',
            Nationality = '$Nationality',
            languageOf_com = '$languages_',
            Gender = '$gender',
            Status = '$Status',
            email = '$email',
            Address = '$res_address',
            Marital_Status = '$m_status',
            spouse_Name = '$Sp_Name',
            spouse_Surname = '$Sp_Surname',
            spouse_Number = '$Sp_ContactNo',
            spouse_ID = '$Sp_idNumber'


WHERE Policy = '$selectedPolicyNumber'";
if (mysqli_query($conn, $updateQuery)) {
   echo '<script>
alert("Record Successfully UPDATED")
window.location.replace("Client_profile.php");
</script>';
} else {
mysqli_query($conn, "ROLLBACK");
echo "Records not UPDATED successfully";
}
mysqli_close($conn);
?>

