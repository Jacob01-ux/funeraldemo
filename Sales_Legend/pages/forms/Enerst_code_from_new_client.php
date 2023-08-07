  
  <?php



//personal -info
$date = $_POST['date'];
$Name = $_POST['Name'];
$Surname = $_POST['Surname']; 
$ContactNo = $_POST['ContactNo'];
$IdNumber = $_POST['IdNumber'];
$Gender = $_POST['Gender'];
$Email = $_POST['Email'];
$policy_No = $_POST['policy_No'];
$Address= $_POST['Address'];
$Product= $_POST['Product'];
$list_of_Benefits = $_POST['list_of_Benefits'];
$Product_Additional_Benefits = $_POST['Product_Additional_Benefits'];
$Dependent_Covered= $_POST['Dependent_Covered'];
$Extended_Members= $_POST['Extended_Members'];
$Marital_Status= $_POST['Marital_Status'];
$Preferred_Payment_Date = $_POST['Preferred_Payment_Date'];
$inception_date= $_POST['inception_date'];
  
  //Extended member
  
$Ex_Name = $_POST['Ex_Name'];
$Ex_Surname = $_POST['Ex_Surname']; 
$Ex_ContactNo = $_POST['Ex_ContactNo'];
$Ex_idNumber = $_POST['Ex_idNumber'];
$Relationship = $_POST['Relationship'];
$Nationality = $_POST['Nationality'];
$Ex_Gender = $_POST['Ex_Gender'];
  
  // spouse details
$Sp_Name = $_POST['Sp_Name'];
$Sp_Surname = $_POST['Sp_Surname'];
$Sp_ContactNo = $_POST['Sp_ContactNo'];
$Sp_idNumber = $_POST['Sp_idNumber'];
$SP_Gender = $_POST['Sp_Gender'];
$Sp_date = $_POST['Sp_date'];
  
  //product additional befits Name_of_Benefits  Product_Additonal_Benefits

$Pr_Name = $_POST['Pr_Name'];
$Name_of_Benefits  = $_POST['Name_of_Benefits'];
$Product_Additonal_Benefits = $_POST['Product_Additonal_Benefits'];


//sending policy number to policy certificate
$Pname = $policy_No;
header("Location: policycertificate.php?name=".$Pname);
exit;
  ?>