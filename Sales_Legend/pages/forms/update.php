<?php
// Assuming you have a MySQL database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jeudfra";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$PolicyNumber = $_POST['PolicyNumber'];
$period = $_POST['n_month'];
$groupName = $_POST['Group_Name'];
$product = $_POST['product'];
$premium = $_POST['Premium'];
$productAddBenefits = $_POST['product_add_ben'];
$dependentCovered = $_POST['Dep_covered'];
$extendedMembers = $_POST['ext_members'];
$preferredPaymentDay = $_POST['Preferred_Payment_Date'];
$inceptionDate = $_POST['inc_date'];
$mainMemberName = $_POST['names'];
$mainMemberContact = $_POST['phone1'];
$mainMemberID = $_POST['idno'];
$mainMemberNationality = $_POST['Nationality'];
$mainMemberLanguage = $_POST['languages_'];
$mainMemberGender = $_POST['gender'];
$mainMemberEmail = $_POST['email'];
$mainMemberAddress = $_POST['res_address'];
$mainMemberMaritalStatus = $_POST['m_status'];
$spouseName = $_POST['Sp_Name'];
$spouseSurname = $_POST['Sp_Surname'];
$spouseContact = $_POST['Sp_ContactNo'];
$spouseID = $_POST['Sp_idNumber'];

// Prepare and bind the SQL statement
$stmt = $conn->prepare("UPDATE clients SET  Period=?, Group_name=?, Package=?, PremiumCoverAmount=?, Product_Added_Benefit=?, Covered=?, extended_members=?, Payment_Date=?, Inception_date=?, Customer=?, Number=?, _ID=?, Nationality=?, languageOf_com=?, Gender=?, email=?, address=?, Marital_status=?, spouse_Name=?, spouse_Surname=?, spouse_Number=?, spouse_ID=? WHERE Policy=?");
$stmt->bind_param("ssssssssssssssssssssssi", $period, $groupName, $product, $premium, $productAddBenefits, $dependentCovered, $extendedMembers, $preferredPaymentDay, $inceptionDate, $mainMemberName, $mainMemberContact, $mainMemberID, $mainMemberNationality, $mainMemberLanguage, $mainMemberGender, $mainMemberEmail, $mainMemberAddress, $mainMemberMaritalStatus, $spouseName, $spouseSurname, $spouseContact, $spouseID, $Policy);

// Execute the statement
if ($stmt->execute()) {
    echo "Record updated successfully.";
} else {
    echo "Error updating record: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
