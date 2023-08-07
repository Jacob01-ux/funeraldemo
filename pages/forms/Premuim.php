<!DOCTYPE html>

<html lang="en">
<head>
  	<!-- html2pdf CDN-->
	<script src=
"https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js">
	</script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Funeral Demo | Invoice Certificate</title>
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	</head>
  
<style type="text/css">body
  {
  background:#eee;
  margin-top:20px;
  }
  .text-danger strong {
        	color: #9f181c;
		}
		.receipt-main {
			background: #ffffff none repeat scroll 0 0;
			border-bottom: 12px solid #333333;
			border-top: 12px solid #9f181c;
			margin-top: 50px;
			margin-bottom: 50px;
			padding: 40px 30px !important;
			position: relative;
			box-shadow: 0 1px 21px #acacac;
			color: #333333;
			font-family: open sans;
		}
		.receipt-main p {
			color: #333333;
			font-family: open sans;
			line-height: 1.42857;
		}
		.receipt-footer h1 {
			font-size: 15px;
			font-weight: 400 !important;
			margin: 0 !important;
		}
		.receipt-main::after {
			background: #414143 none repeat scroll 0 0;
			content: "";
			height: 5px;
			left: 0;
			position: absolute;
			right: 0;
			top: -13px;
		}
		.receipt-main thead {
			background: #414143 none repeat scroll 0 0;
		}
		.receipt-main thead th {
			color:#fff;
		}
		.receipt-right h5 {
			font-size: 16px;
			font-weight: bold;
			margin: 0 0 7px 0;
		}
		.receipt-right p {
			font-size: 12px;
			margin: 0px;
		}
		.receipt-right p i {
			text-align: center;
			width: 18px;
		}
		.receipt-main td {
			padding: 9px 20px !important;
		}
		.receipt-main th {
			padding: 13px 20px !important;
		}
		.receipt-main td {
			font-size: 13px;
			font-weight: initial !important;
		}
		.receipt-main td p:last-child {
			margin: 0;
			padding: 0;
		}	
		.receipt-main td h2 {
			font-size: 20px;
			font-weight: 900;
			margin: 0;
			text-transform: uppercase;
		}
		.receipt-header-mid .receipt-left h1 {
			font-weight: 100;
			margin: 34px 0 0;
			text-align: right;
			text-transform: uppercase;
		}
		.receipt-header-mid {
			margin: 24px 0;
			overflow: hidden;
		}
		.container {
			position: fixed;
			top: 20%;
			left: 28%;
			margin-top: -65px;
			margin-left: -100px;
			border-radius: 7px;
		}

		.card {
			box-sizing: content-box;
			width: 700px;
			height: 150px;
			padding: 30px;
			border: 1px solid black;
			font-style: sans-serif;
			background-color: #f0f0f0;
		}
  
/*** Button ***/
.btn {
    transition: .5s;
    font-weight: 500;
}

.btn-primary,
.btn-outline-primary:hover {
    color: #348E38;
}

.btn-square {
    width: 38px;
    height: 38px;
}

.btn-sm-square {
    width: 32px;
    height: 32px;
}

.btn-lg-square {
    width: 48px;
    height: 48px;
}

.btn-square,
.btn-sm-square,
.btn-lg-square {
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: normal;
}


		#button {
			background-color: #348E38;
			border-radius: 5px;
			margin-left: 650px;
			margin-bottom: 5px;
			color: white;
		}
		#container {
			background-color: #dcdcdc;
		}
  /* Set the page size and margins for A4 paper */

    </style>
   
<?php
session_start();
$servername = 'localhost';
$dbname = 'jeudfra';
$username = 'root ';
$password = ' ';
$conn2 = mysqli_connect($servername, $username, $password, $dbname);
  $admin = $_POST['admin'];
$month= $_POST['month'];
$year= $_POST['year'];
$policy= $_POST['PolicyNumber'];
$client= $_POST['Name_and_Surname'];
$client_id= $_POST['ID'];
$ContactNumber= $_POST['ContactNumber'];
$email= $_POST['email'];
$plan= $_POST['Policy_Plan'];
$monthly_premium= $_POST['monthly_premium'];
$date= $_POST['pr_date'];
$period = $month." ".$year;
//$InvoiceNumber;
  
  
  ///code for invoice numbers
  
$host = 'localhost';
$dbname = 'jeudfra';
$username = 'root ';
$password = ' ';

  $dsn = "mysql:host=$host;dbname=$dbname";
  $options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
  );

  try {
    $pdo = new PDO($dsn, $username, $password, $options);
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
  }
  

  $sql = "SELECT MAX(invoice_number) AS max_code FROM invoices";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();

  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$row) {
    // Display an error message if the query fails
    echo "Error retrieving product code.";
  } else {
    // Extract the numeric part of the code and increment it by 1
    $max_code = $row['max_code'];
    $numeric_part = (int)substr($max_code, 4);
    $next_numeric_part = $numeric_part + 1;

    // Construct the next product code
    $nextInvoiceNumber = 'Inv' . str_pad($next_numeric_part, 4, '0', STR_PAD_LEFT);
    
  }
  
// Assuming $nextInvoiceNumber contains the invoice number value

// Prepare the query
$insertInvoices = "INSERT INTO invoices (invoice_number) VALUES (?)";
$stmtInvoices = $conn2->prepare($insertInvoices);

if ($stmtInvoices) {
  // Bind the parameter
  $stmtInvoices->bind_param("s", $nextInvoiceNumber); // Assuming invoice_number is a string, change "s" to the appropriate type if necessary

  // Execute the statement
  $stmtInvoices->execute();

  // Close the statement
  $stmtInvoices->close();
} else {
  // Handle the case when the statement preparation fails
  // Display an error message or perform any necessary actions
}

$query = mysqli_query($conn2, "select Number, email, Customer, Group_Name from clients where Policy='$policy'");
  $arr = mysqli_fetch_array($query);
  $Number = $arr['Number'];
  $email = $arr['email'];
  $Group_Name = $arr['Group_Name'];
  $ClientName = $arr['Customer'];
  
$getbusinessdetails = mysqli_query($conn2, "select Branch_Name, Contact_Number, Email, Account_Number, Address, Business_Name from branch_details");
  $one1 = mysqli_fetch_array($getbusinessdetails);
  $BusinessNumber = $one1['Contact_Number'];
  $BusinessEmail = $one1['Email'];
  $BusinessName = $one1['Business_Name'];
  $BusinessAccount = $one1['Account_Number'];
  $BusinessAddress = $one1['Address'];
  


if($month==""){


echo"
  
<div class='container'>


  
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' onclick='history.back()' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Modal Header</h4>
        </div>
        <div class='modal-body'>
          <p>Complete filling the form : Month.</p>
        </div>
        <div class='modal-footer'>
          <button type='button' onclick='history.back()' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
      
    </div>
  </div>
  ";
}

else if($year==""){

echo"
  
<div class='container'>


  
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' onclick='history.back()' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Modal Header</h4>
        </div>
        <div class='modal-body'>
          <p>Complete filling the form : Year.</p>
        </div>
        <div class='modal-footer'>
          <button type='button' onclick='history.back()' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
      
    </div>
  </div>
  ";
}

else if($policy==""){

echo"
  
<div class='container'>


  
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' onclick='history.back()' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Modal Header</h4>
        </div>
        <div class='modal-body'>
          <p>Complete filling the form : Policy.</p>
        </div>
        <div class='modal-footer'>
          <button type='button' onclick='history.back()' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
      
    </div>
  </div>
  ";
}
else if($client==""){

echo"
  
<div class='container'>


  
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' onclick='history.back()' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Modal Header</h4>
        </div>
        <div class='modal-body'>
          <p>Complete filling the form : Client.</p>
        </div>
        <div class='modal-footer'>
          <button type='button' onclick='history.back()' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
      
    </div>
  </div>
  ";
}

else if($client_id==""){

echo"
  
<div class='container'>


  
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' onclick='history.back()' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Modal Header</h4>
        </div>
        <div class='modal-body'>
          <p>Complete filling the form : Client ID.</p>
        </div>
        <div class='modal-footer'>
          <button type='button' onclick='history.back()' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
      
    </div>
  </div>
  ";
}
else if($plan==""){

echo"
  
<div class='container'>


  
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' onclick='history.back()' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Modal Header</h4>
        </div>
        <div class='modal-body'>
          <p>Complete filling the form : Plan.</p>
        </div>
        <div class='modal-footer'>
          <button type='button' onclick='history.back()' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
      
    </div>
  </div>
  ";
}

else if($monthly_premium==""){

echo"
  
<div class='container'>


  
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' onclick='history.back()' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Modal Header</h4>
        </div>
        <div class='modal-body'>
          <p>Complete filling the form : Premuim.</p>
        </div>
        <div class='modal-footer'>
          <button type='button' onclick='history.back()' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
      
    </div>
  </div>
  ";
}


else if($date==""){

echo"
  
<div class='container'>


  
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' onclick='history.back()' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Modal Header</h4>
        </div>
        <div class='modal-body'>
          <p>Complete filling the form : Date.</p>
        </div>
        <div class='modal-footer'>
          <button type='button' onclick='history.back()' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
      
    </div>
  </div>
  ";
}
  

else{



//we need code to get the name of the person logged into the system
$_On = date("Y-m-d H:i:s");
//we need code to get the time when the user saved the information
$_By = "";
$_SESSION['client'] = $client;
$_SESSION['logged_in'] = true;
$errorMsg = "";
$successMsg ="";
$Contact_Number = "";
/*

// Validate input data 
if (empty($period)){
echo "Please fill in month.";
  exit;
} else if (empty($PolicyNumber)){
    echo "Please fill in PolicyNumber.";
    exit;
}  else if (empty($Name_and_Surname)){
    echo "Please fill in Name and Surname.";
    exit;
} else if (empty($ID)){
    echo "Please fill in ID.";
    exit;
} else if (empty($Policy_Plan)){
    echo "Please fill Policy_Plan.";
    exit;
  } else if (empty($monthly_premium)){
    echo "Please fill Monthly premium.";
    exit;
  
}else if (empty($Date)){
    echo "Please fill in Date.";
    exit;
}

*/

$host = 'localhost';
$dbname = 'jeudfra';
$username = 'root ';
$password = ' ';


  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
  
  //now we are saving the data 
  $stmt = $conn->prepare("INSERT INTO premiums (month, year, policy, date, monthly_premium, client, client_id, ContactNumber,email, plan, _On, _By) VALUES (:month, :year, :policy, :date, :monthly_premium, :client, :client_id, :ContactNumber, :email, :plan, :_On, :_By)");
  $stmt->bindParam(':month', $month);
  $stmt->bindParam(':year', $year);
  $stmt->bindParam(':policy', $policy);
  $stmt->bindParam(':date', $date);
  $stmt->bindParam(':monthly_premium', $monthly_premium);
  $stmt->bindParam(':client', $client);
  $stmt->bindParam(':client_id', $client_id);
  $stmt->bindParam(':ContactNumber', $ContactNumber);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':plan', $plan);
  $stmt->bindParam(':_On', $_On);
  $stmt->bindParam(':_By', $_By);
  
 
  //now we sanitize the input
  // Sanitize input using filter_var()
$month = filter_var($_POST['month'], FILTER_SANITIZE_STRING);
$year = filter_var($_POST['year'], FILTER_SANITIZE_STRING);
$policy = filter_var($_POST['PolicyNumber'], FILTER_SANITIZE_STRING);
$date= filter_var($_POST['pr_date'], FILTER_SANITIZE_STRING);
$monthly_premium = filter_var($_POST['monthly_premium'], FILTER_SANITIZE_STRING);
$client = filter_var($_POST['Name_and_Surname'], FILTER_SANITIZE_STRING);
$client_id = filter_var($_POST['ID'], FILTER_SANITIZE_STRING);
$ContactNumber = filter_var($_POST['ContactNumber'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
$plan = filter_var($_POST['Policy_Plan'], FILTER_SANITIZE_STRING);
$_On = filter_var($_On, FILTER_SANITIZE_STRING);
//$_By = filter_var($_POST['_By'], FILTER_SANITIZE_STRING);

	//checking to see if the data was inserted
  if ($stmt->execute()) 
  {
    // Insert query was successful
    if ($stmt->rowCount() > 0) {
        
$incomePeriod = $month." ".$year;
      $incomedescription = "Premium Payment";
      $incomeQuantity = "1";
$stmt2 = $conn->prepare("
    INSERT INTO income1 (ref_Num, Period, transaction_type, From_TO, description, quantity, price, Amount, Transaction_date, _On) 
    VALUES (:ref_Num, :Period, :transaction_type, :From_TO, :description, :quantity, :price, :Amount, :Transaction_date, :_On);
");
  // Bind parameters and execute the second query
$stmt2->bindParam(':ref_Num', $nextInvoiceNumber);
$stmt2->bindParam(':Period', $incomePeriod);
$stmt2->bindParam(':transaction_type', $incomedescription);
$stmt2->bindParam(':From_TO', $client);
$stmt2->bindParam(':description', $plan);
$stmt2->bindParam(':quantity', $incomeQuantity);
$stmt2->bindParam(':price', $monthly_premium);
$stmt2->bindParam(':Amount', $monthly_premium);
$stmt2->bindParam(':Transaction_date', $date);
$stmt2->bindParam(':_On', $date);

$stmt2->execute();

// Execute the query


//code for sending an sms
$apiKey = '72509ce3-4382-4a24-a10d-2391bad5a67b';
$apiSecret = 'z5s70Uhs0EJq8SqfYgtY5qpHLbiyoIV6';
$accountApiCredentials = $apiKey . ':' .$apiSecret;


      
      // change this
 $massage = 'Hello, {$client} thank you for making a payment of {$monthly_premium} on your policy {$plan}. \n \n Enjoy the rest of your day.  \n\n {$group_name} \n {$email} \n {$Number}';
      
      
$phone = $_POST['ContactNumber'];

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
}
else {
    // handle authentication error
}

$sendUrl = 'https://rest.smsportal.com/bulkmessages';

$authHeader = 'Authorization: Bearer ' . $authToken;

//$sendData = "{ 'Hello, {$client} \n thank you for making a payment for {$date}  payment of  {$monthly_premium} \n enjoy the rest of your day  \n\n {$Group_Name} \n {$email} \n {$Number}' : [ { 'content' : '$massage', 'destination' : '$phone' } ] }";
$sendData = "{ 'messages' : [ { 'content' : 'Hello, {$client} thank you for making a payment of {$monthly_premium} on your policy {$plan}. \n \n Enjoy the rest of your day  \n\n {$Group_Name} \n  \n ', 'destination' : '$phone' } ] }";      
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
    // handle success
}
else {
    // handle send error
}

//header("Location: policy-certificate.php");

 
//header("Location: premiumInvoice.php");
      
//notify the owneer of the business everytime premiums are paid



 
///CODE FOR GETTING BUSINESS DETAILS
$conn1 = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn1) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare a statement to fetch data from the database
$stmt1 = mysqli_prepare($conn1, "SELECT Contact_Number, Email, Business_Name, Address, Branch_Name, Name_of_Bank, Account_Holder, Account_Number FROM branch_details");
// Execute the prepared statement
mysqli_stmt_execute($stmt1);

// Bind result variables
mysqli_stmt_bind_result($stmt1, $Business_Contact_Number, $Business_Email, $Business_Name, $Business_Address, $Branch_Name, $Business_Name_of_Bank, $Business_Account_Holder, $Business_Account_Number);

// Fetch the results
while (mysqli_stmt_fetch($stmt1)) {

}

// Close the statement and database connection
mysqli_stmt_close($stmt1);
mysqli_close($conn1);



///CODE FOR GETTING CLIENT DETAILS
$conn2 = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn2) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare a statement to fetch data from the database
$stmt2 = mysqli_prepare($conn2, "SELECT Number, email, Address FROM clients Where Policy='" . $policy . "'");

// Execute the prepared statement
mysqli_stmt_execute($stmt2);

// Bind result variables
mysqli_stmt_bind_result($stmt2, $Client_Contact_Number, $Client_Email, $Client_Address);

// Fetch the results
while ($array = mysqli_stmt_fetch($stmt2)) {
  
  
  

}

// Close the statement and database connection
//mysqli_stmt_close($stmt2);
//mysqli_close($conn2);
      
}
/*
?>
<script>composer require guzzlehttp/guzzle</script>
<?php
///code for sending an sms
$apiKey = '72509ce3-4382-4a24-a10d-2391bad5a67b';
$apiSecret = 'z5s70Uhs0EJq8SqfYgtY5qpHLbiyoIV6';
$accountApiCredentials = $apiKey . ':' .$apiSecret;

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

$sendData = '{ "messages" : [ { "content" : "Thank you for making a payment for ...", "destination" : "+27678293770" } ] }';

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
?>

*/
  
  
  $select =mysqli_query($conn2, "SELECT Number, email, Address FROM clients Where Policy='" . $policy . "'");
  $array = mysqli_fetch_array($select);
  

echo" 

<body>
  
  
<div class='col-md-12' id='makepdf'>
<div class='row'>
<div class='receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3'>
<div class='row'>
<div class='receipt-header'>
<div class='col-xs-6 col-sm-6 col-md-6'>
<div class='receipt-left'>
<img class='img-responsive' alt='eKhonnector' src='Eyomusa.png' style='width: 71px; border-radius: 43px;'>
</div>
</div>
<div class='col-xs-6 col-sm-6 col-md-6 text-right'>
<div class='receipt-right'>
<h5> {$BusinessName}</h5>
<p>  <i class='fa fa-phone'></i></p>
<p>{$BusinessAddress} <i class='fa fa-envelope-o'></i></p>
<p>{$BusinessNumber}<i class='fa fa-location-arrow'></i></p>
<p>{$BusinessEmail} <i class='fa fa-envelope-o'></i></p>

</div>
</div>
</div>
</div>
<div class='row'>
<div class='receipt-header receipt-header-mid'>
<div class='col-xs-8 col-sm-8 col-md-8 text-left'>
<div class='receipt-right'>
<p><b>Client Name : </b>$ClientName</p> 
<p><b>Mobile : </b>  $Client_Contact_Number</b></p>
<input type='hidden' id='email' value='$Client_Email' />
<p><b>Email : </b> <a>$Client_Email</a></p>
<p><b>Policy Number : </b>$policy </p> 
<p><b>Invoice Number :#</b>$nextInvoiceNumber </p>
</div>
</div>
<div class='col-xs-4 col-sm-4 col-md-4'>
<div class='receipt-left'>
<h2>INVOICE </h2>
</div>
</div>
</div>
</div>
<div>
<table class='table table-bordered'>
<thead>
<tr>
<th>Description</th>
<th>Amount</th>
</tr>
</thead>
<tbody>
<tr>
<td class='col-md-9'>Monthly premuim for $plan for $period </td>
<td class='col-md-3'><i class='fa fa-inr'></i> $monthly_premium</td>

<p>

<p>
<strong><i class='fa fa-inr'></i></strong>
</p>
<p>
<strong><i class='fa fa-inr'></i></strong>
</p>
</td>
</tr>
<tr>
<td class='text-right'><h2><strong>Total: </strong></h2></td>
<td class='text-left text-danger'><h2><strong><i class='fa fa-inr'></i> $monthly_premium</strong></h2></td>
</tr>
  <tr>

</tr>
</tbody>
</table>
<table class='table table-bordered'>
<thead>
<tr>
<th>Banking Details</th>
<th>Acc Number</th>
</tr>
</thead>
<tbody>
<tr>
<td class='col-md-9'>Bank Name : $Business_Name_of_Bank | Account Holder : $Business_Account_Holder </td>
<td class='col-md-3'><i class='fa fa-inr'></i>$Business_Account_Number</td>
</tr>

<tr>

</tbody>
</table>
</div>

  
<div class='row'>
<div class='receipt-header receipt-header-mid receipt-footer'>
<div class='col-xs-8 col-sm-8 col-md-8 text-left'>
<div class='receipt-right'>
<p><b>Date : </b>$date</p><br><br>
<p><b>Assisted by : </b>$admin</p><br><br>
<h5 style='color: rgb(140, 140, 140);'>We appreciate you, enjoy the rest of your day.</h5>
</div>
</div>
<div class='col-xs-4 col-sm-4 col-md-4'>
<div class='receipt-left'>
<h1>STAMP</h1>

</form>
  
</div>
</div>
  </div>
</div>
</div>
</div>
</div>
  
    <button id='button' type='submit' class='btn btn-primary'value='Submit'>Download</button>
  <button  type='button' class='btn btn-light' onclick='window.print()' value='Submit'>Print</button>
  
    <button onclick='email()' type='button'  class='btn btn-light' value='Clear'>Email</button>
  <br> <br> <br>
  ";
  
  }
  }

?>

  	
</body>

<div id='result'></div>  
</html>


<script>
  
   function email(){
  
  	$.ajax({
			url:"premium_email.php",
			method:"POST",
			data:{email:$('#email').val()},
			success:function(data)
			{
				$('#result').html(data);
			}
			});
    
    
  }
</script>
