<?php
session_start();


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
$sms_status = $_POST['sms_status'];
// $Ex_Name = $_POST['Ex_Name'];
// $Ex_Surname= $_POST['Ex_Surname'];
// $Ex_ContactNo = $_POST['Ex_ContactNo'];
// $Ex_idNumber = $_POST['Ex_idNumber'];
// $Ex_Nationality = $_POST['Ex_Nationality'];
// $Ex_Gender = $_POST['Ex_Gender'];

// $de_Name = $_POST['de_Name'];
// $de_Surname= $_POST['de_Surname'];
// $de_ContactNo = $_POST['de_ContactNo'];
// $de_idNumber= $_POST['de_idNumber'];
// $deRelationship = $_POST['deRelationship'];
// $de_Nationality= $_POST['de_Nationality'];
// $de_Gender = $_POST['de_Gender'];


$Sp_Name = $_POST['Sp_Name'];
$Sp_Surname= $_POST['Sp_Surname'];
$Sp_ContactNo = $_POST['Sp_ContactNo'];
$Sp_idNumber= $_POST['Sp_idNumber'];
$Sp_Gender = $_POST['Sp_Gender'];
$Sp_date= $_POST['Sp_date'];
$Sp_Gender = $_POST['Sp_Gender'];

$_By = $_POST['admin'];
// $Pr_Name = $_POST['Pr_Name'];
// $Name_of_Benefits = $_POST['Name_of_Benefits'];
// $Product_Additonal_Benefits = $_POST['Product_Additonal_Benefits'];

$errorMsg = "";
$successMsg ="";



$servername = "localhost";
$username = "ekhonnec_Mphye_Funerals";
$password = "websystems_10";
$dbname = "ekhonnec_Mphye_Funerals";

$mysqli = new mysqli(hostname: $servername,
                     username: $username, 
                     password: $password, 
                     database: $dbname);

//check connection error
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli-connect_error);
}

$sql = sprintf("SELECT * 
FROM 
clients");

$result = $mysqli->query($sql);

$ad_id = mysqli_num_rows($result) + 1;
$admin_id = "EYO" . str_pad($ad_id, 3, '0', STR_PAD_LEFT);

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";

    if($policy_no == "*AUTOMATED* eg MFS001"){
      $policy_no = $admin_id;
    }
    $_SESSION['my_viriable'] = "$policy_no";
  //now we are saving the data of the main member
  $stmt = $conn->prepare("INSERT INTO clients (Customer, _ID, Number, Gender, Nationality, languageOf_com, Package, PremiumCoverAmount, Policy, Covered, Group_Name, email, Address, Product_Added_Benefit, extended_members, Marital_Status, Inception_date, Payment_Date, Period, _By) 
                          VALUES (:Customer, :ID_no, :Number, :Gender, :Nationality, :languages_, :Package, :PremiumCoverAmount, :Policy, :Covered, :cat, :email, :Address, :Product_Added_Benefit, :extended_members, :Marital_Status, :Inception_date, :Payment_Date, :Period, :_By)");
  $stmt->bindParam(':Customer', $Customer);
  $stmt->bindParam(':ID_no', $idno);
  $stmt->bindParam(':Number', $phone);
  $stmt->bindParam(':Gender', $gender);
  $stmt->bindParam(':Nationality', $main_Nationality);
  $stmt->bindParam(':languages_', $languages_);
  $stmt->bindParam(':Package', $product);
  $stmt->bindParam(':PremiumCoverAmount', $PremiumCoverAmount);
  $stmt->bindParam(':Policy', $policy_no);
  $stmt->bindParam(':Covered', $Dep_covered);
  $stmt->bindParam(':cat', $cat);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':Address', $res_address);
  $stmt->bindParam(':Product_Added_Benefit', $product_add_ben);
  $stmt->bindParam(':extended_members', $ext_members);
  $stmt->bindParam(':Marital_Status', $m_status);
  $stmt->bindParam(':Inception_date', $inc_date);
  $stmt->bindParam(':Payment_Date', $Preferred_Payment_Date);
  $stmt->bindParam(':Period', $period);
  $stmt->bindParam(':_By', $_By);


  
 
  //$stmt->bindParam(':Product', $cat);
  
  
 
  //now we sanitize the input
  // Sanitize input using filter_var()
// $names = filter_var($_POST['names'], FILTER_SANITIZE_STRING);
// $Surname = filter_var($_POST['Surname'], FILTER_SANITIZE_STRING);
// $idno = filter_var($_POST['idno'], FILTER_SANITIZE_STRING);
// $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
// $gender= filter_var($_POST['gender'], FILTER_SANITIZE_STRING);
// $m_status = filter_var($_POST['m_status'], FILTER_SANITIZE_STRING);
// $Dep_covered = filter_var($_POST['Dep_covered'], FILTER_SANITIZE_STRING);
// $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
// $res_address = filter_var($_POST['res_address'], FILTER_SANITIZE_STRING);
// $product_add_ben = filter_var($_POST['product_add_ben'], FILTER_SANITIZE_STRING);
// $inc_date = filter_var($_POST['inc_date'], FILTER_SANITIZE_STRING);
// $period = filter_var($_POST['period'], FILTER_SANITIZE_STRING);
// $policy_no = filter_var($_POST['policy_no'], FILTER_SANITIZE_STRING);
// $ext_members= filter_var($_POST['ext_members'], FILTER_SANITIZE_STRING);
// $Preferred_Payment_Date = filter_var(['Preferred_Payment_Date'], FILTER_SANITIZE_STRING);
// $cat = filter_var(['cat'], FILTER_SANITIZE_STRING);
  
	//checking to see if the data was inserted
  if ($stmt->execute()) 
  {
    // Insert query was successful
    if ($stmt->rowCount() > 0) 
    {

        echo '<script>
        alert("Client info Successfully added");     
        </script>';
    } 
    else 
    {
        echo "Client info not inserted";
    }
} 
  else 
  {
    // Insert query failed
    echo "Error: " . $stmt->errorInfo()[2];
} }catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


if($m_status == "Married" || $m_status == "Partner"){
  try{
    $conn1 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";
  
    //now saving extended membersspousedetails
    $save_extended = $conn1->prepare("INSERT INTO spousedetails (Policy, spouse_Name, spouse_Surname, spouse_Number, spouse_ID, _By) 
                                      VALUES (:spousePolicy, :Sp_Name, :Sp_Surname, :Sp_ContactNo, :Sp_idNumber, :_By)");
   $save_extended->bindParam(':spousePolicy', $policy_no);
   $save_extended->bindParam(':Sp_Name', $Sp_Name);
    $save_extended->bindParam(':Sp_Surname', $Sp_Surname);
    $save_extended->bindParam(':Sp_ContactNo', $Sp_ContactNo);
    $save_extended->bindParam(':Sp_idNumber', $Sp_idNumber);
    $save_extended->bindParam(':_By', $_By);
    //$save_extended->bindParam(':Sp_Gender', $Sp_Gender);
    //$save_extended->bindParam(':Sp_date', $Sp_date);
    //$save_extended->bindParam(':de_Gender', $de_Gender);
  
    //now we sanitize the input
    // Sanitize input using filter_var()
  // $Sp_Name = filter_var($_POST['Sp_Name'], FILTER_SANITIZE_STRING);
  // $Sp_Surname = filter_var($_POST['Sp_Surname'], FILTER_SANITIZE_STRING);
  // $Sp_ContactNo = filter_var($_POST['Sp_ContactNo'], FILTER_SANITIZE_STRING);
  // $Sp_idNumber = filter_var($_POST['Sp_idNumber'], FILTER_SANITIZE_STRING);
  // $Sp_Gender = filter_var($_POST['Sp_Gender'], FILTER_SANITIZE_STRING);
  //$Ex_Gender = filter_var($_POST['Sp_date'], FILTER_SANITIZE_STRING);
  //$Ex_Gender = filter_var($_POST['de_Gender'], FILTER_SANITIZE_STRING);
    
      //checking to see if the data was inserted
    if ($save_extended->execute()) 
    {
      // Insert query was successful
      if ($save_extended->rowCount() > 0) 
      {
          echo '<script>
          alert("Spouse Member info Successfully added");
          window.location.replace("newClient.php");
          </script>';
      } 
      else 
      {
          echo "Spouse Member info not inserted";
      }
  } 
    else 
    {
      // Insert query failed   window.location.replace("newClient.php");
      echo "Spouse Member Error: " . $save_extended->errorInfo()[2];
  } }catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
  }
}


/*


try{
    $conn1 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";
  
    //now saving extended members
    $save_extended = $conn1->prepare("INSERT INTO beneficiaries (Name, surname, ContactNo, _ID, Relationship, Nationality, Gender) 
                                      VALUES (:de_Name, :de_Surname, :de_ContactNo, :de_idNumber, :deRelationship, :de_Nationality, :de_Gender)");
    $save_extended->bindParam(':de_Name', $de_Name);
    $save_extended->bindParam(':de_Surname', $de_Surname);
    $save_extended->bindParam(':de_ContactNo', $de_ContactNo);
    $save_extended->bindParam(':de_idNumber', $de_idNumber);
    $save_extended->bindParam(':deRelationship', $deRelationship);
    $save_extended->bindParam(':de_Nationality', $de_Nationality);
    $save_extended->bindParam(':de_Gender', $de_Gender);
  
    //now we sanitize the input
    // Sanitize input using filter_var()
  $Ex_Name = filter_var($_POST['de_Name'], FILTER_SANITIZE_STRING);
  $Ex_Surname = filter_var($_POST['de_Surname'], FILTER_SANITIZE_STRING);
  $Ex_ContactNo = filter_var($_POST['de_ContactNo'], FILTER_SANITIZE_STRING);
  $Ex_idNumber = filter_var($_POST['de_idNumber'], FILTER_SANITIZE_STRING);
  $Ex_Nationality = filter_var($_POST['deRelationship'], FILTER_SANITIZE_STRING);
  $Ex_Gender = filter_var($_POST['de_Nationality'], FILTER_SANITIZE_STRING);
  $Ex_Gender = filter_var($_POST['de_Gender'], FILTER_SANITIZE_STRING);
    
      //checking to see if the data was inserted
    if ($save_extended->execute()) 
    {
      // Insert query was successful
      if ($save_extended->rowCount() > 0) 
      {
          echo '<script>
          alert("Dependent Member info Successfully added");
          </script>';
      } 
      else 
      {
          echo "Dependent Member info not inserted";
      }
  } 
    else 
    {
      // Insert query failed   window.location.replace("newClient.php");
      echo "Extended Member Error: " . $save_extended->errorInfo()[2];
  } }catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
  }

  try{
    $conn1 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";
  
    //now saving extended members
    $save_extended = $conn1->prepare("INSERT INTO members_additional_benefits (benefit_name, addAmount, description) 
                                      VALUES (:Pr_Name, :Name_of_Benefits, :Product_Additonal_Benefits)");
    $save_extended->bindParam(':Pr_Name', $Pr_Name);
    $save_extended->bindParam(':Name_of_Benefits', $Name_of_Benefits);
    $save_extended->bindParam(':Product_Additonal_Benefits', $Product_Additonal_Benefits);
    //$save_extended->bindParam(':Sp_idNumber', $Sp_idNumber);
    //$save_extended->bindParam(':Sp_Gender', $Sp_Gender);
    //$save_extended->bindParam(':Sp_date', $Sp_date);
    //$save_extended->bindParam(':de_Gender', $de_Gender);
    $Pr_Name = $_POST['Pr_Name'];
    $Name_of_Benefits = $_POST['Name_of_Benefits'];
    $Product_Additonal_Benefits = $_POST['Product_Additonal_Benefits'];
    //now we sanitize the input
    // Sanitize input using filter_var()
  $Pr_Name = filter_var($_POST['Pr_Name'], FILTER_SANITIZE_STRING);
  $Name_of_Benefits = filter_var($_POST['Name_of_Benefits'], FILTER_SANITIZE_STRING);
  $Product_Additonal_Benefits = filter_var($_POST['Product_Additonal_Benefits'], FILTER_SANITIZE_STRING);
 // $Sp_idNumber = filter_var($_POST['Sp_idNumber'], FILTER_SANITIZE_STRING);
 // $Sp_Gender = filter_var($_POST['Sp_Gender'], FILTER_SANITIZE_STRING);
  //$Ex_Gender = filter_var($_POST['Sp_date'], FILTER_SANITIZE_STRING);
  //$Ex_Gender = filter_var($_POST['de_Gender'], FILTER_SANITIZE_STRING);
    
      //checking to see if the data was inserted
    if ($save_extended->execute()) 
    {
      // Insert query was successful
      if ($save_extended->rowCount() > 0) 
      {
          echo '<script>
          alert("Product additional benefits  info Successfully added");
          window.location.replace("newClient.php");
          </script>';
      } 
      else 
      {
          echo "Product additional benefits info not inserted";
      }
  } 
    else 
    {
      // Insert query failed   window.location.replace("newClient.php");
      echo "Product additional benefits Error: " . $save_extended->errorInfo()[2];
  } }catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
  }*/
if($sms_status == "Enabled")
{
///code for sending an sms
$apiKey = '72509ce3-4382-4a24-a10d-2391bad5a67b';
$apiSecret = 'z5s70Uhs0EJq8SqfYgtY5qpHLbiyoIV6';
$accountApiCredentials = $apiKey . ':' .$apiSecret;

$massage = "Hello, $Customer\n\nCongratulations and welcome to Funeral demo your policy registration was successfully. Your policy number is $policy_no\n\n*Use the above policy number for all your queries.\n\n Thank you and have a wonderful day.";

$base64Credentials = base64_encode($accountApiCredentials);
$authHeader = 'Authorization: Basic ' . $base64Credentials;

$authEndpoint = 'https://rest.smsportal.com/Authentication';

$authOptions = array(
    'http' => array(
        'header'  => $authHeader,
        'method'  => 'GET',
        'ignore_errors' => true
    )
);
$authContext  = stream_context_create($authOptions);

$result = file_get_contents($authEndpoint, false, $authContext);

$authResult = json_decode($result);

$status_line = $http_response_header[0];
preg_match('{HTTP\/\S*\s(\d{3})}', $status_line, $match);
$status = $match[1];

if ($status === '200') { 
    $authToken = $authResult->{'token'};
    
    var_dump($authResult);
}
else {
    var_dump($authResult);
}

$sendUrl = 'https://rest.smsportal.com/bulkmessages';

$authHeader = 'Authorization: Bearer ' . $authToken;

$sendData = "{ 'messages' : [ { 'content' : '$massage', 'destination' : '$phone' } ] }";
$options = array(
    'http' => array(
        'header'  => array("Content-Type: application/json", $authHeader),
        'method'  => 'POST',
        'content' => $sendData,
        'ignore_errors' => true
    )
);
$context  = stream_context_create($options);

$sendResult = file_get_contents($sendUrl, false, $context);

$status_line = $http_response_header[0];
preg_match('{HTTP\/\S*\s(\d{3})}', $status_line, $match);
$status = $match[1];

if ($status === '200') {
    var_dump($sendResult);
}
else {
    var_dump($sendResult);
}
}
  header("Location: policy-certificate.php");
?>