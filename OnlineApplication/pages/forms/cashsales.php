<head>
  	<!-- html2pdf CDN-->
	<script src=
"https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js">
	</script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript"></script>
	</head>
<?php
session_start();

$period= $_POST['period'];
$transaction_type= $_POST['transaction_type'];
$client_status= $_POST['client_status'];
$ID= $_POST['ID'];
$payment= $_POST['payment'];
$invoice_type = $_POST['invoice_type'];
$number = $_POST['number'];
$address = $_POST['address'];
$transaction_date = $_POST['transaction_date'];
$down_payment = $_POST['down_payment'];
$next_payment_date= $_POST['next_payment_date'];

$servername = "localhost";
$username = "ekhonnec_vakhandli_group";
$password = "vakhandli_group";
$dbname = "ekhonnec_vakhandli_group";

    $conn1 = mysqli_connect($servername, $username, $password, $dbname);
    
    
$query = mysqli_query($conn1, "SELECT * FROM clients WHERE _ID = '$ID'");
$array = mysqli_fetch_array($query);

if ($array) {
    $customer = $array['Customer'];
    $group_name = $array['Group_Name'];
    $email = $array['email'];
    $number = $array['Number'];
} else {
    // Handle the case where no rows were returned
    $customer = null;
    $group_name = null;
    $email = null;
    $number = null;
}

$servername = "localhost";
$username = "ekhonnec_vakhandli_group";
$password = "vakhandli_group";
$dbname = "ekhonnec_vakhandli_group";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

/*if (empty($period) || empty($transaction_type) || empty($client_status) || empty($ID) || empty($payment) || empty($invoice_type) || empty($number) || empty($address) || empty($transaction_date) || empty($down_payment) || empty($next_payment_date)) {
    echo "One or more required fields are empty.";
    exit;
}*/

  
  //now we are saving the data 
  $stmt = $conn->prepare("INSERT INTO sales_payment (period, transaction_type, client_status, ID, payment, invoice_type, number, address, transaction_date, down_payment, next_payment_date) 
  				  							VALUES (:period, :transaction_type, :client_status, :ID, :payment, :invoice_type, :number,  :address, :transaction_date, :down_payment, :next_payment_date)");
  
  $stmt->bindParam(':period', $period);
  $stmt->bindParam(':transaction_type', $transaction_type);
  $stmt->bindParam(':client_status', $client_status);
  $stmt->bindParam(':ID', $ID);
  $stmt->bindParam(':payment', $payment);
  $stmt->bindParam(':invoice_type', $invoice_type);
  $stmt->bindParam(':number', $number);
  $stmt->bindParam(':address', $address);
  $stmt->bindParam(':transaction_date', $transaction_date);
  $stmt->bindParam(':down_payment', $down_payment);
  $stmt->bindParam(':next_payment_date', $next_payment_date);

  //now we sanitize the input
  // Sanitize input using filter_var()
$period = filter_var($_POST['period'], FILTER_SANITIZE_STRING);
$transaction_type = filter_var($_POST['transaction_type'], FILTER_SANITIZE_STRING);
$client_status = filter_var($_POST['client_status'], FILTER_SANITIZE_STRING);
$ID= filter_var($_POST['ID'], FILTER_SANITIZE_STRING);
$payment = filter_var($_POST['payment'], FILTER_SANITIZE_STRING);
  $invoice_type = filter_var($_POST['invoice_type'], FILTER_SANITIZE_STRING);
$number = filter_var($_POST['number'], FILTER_SANITIZE_STRING);    
$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);  
$transaction_date = filter_var($_POST['transaction_date'], FILTER_SANITIZE_STRING);  
$down_payment = filter_var($_POST['down_payment'], FILTER_SANITIZE_STRING);  
  $next_payment_date = filter_var($_POST['next_payment_date'], FILTER_SANITIZE_STRING);

   

    
  
	//checking to see if the data was inserted
  if ($stmt->execute()) 
  {
    
    // Insert query was successful
    if ($stmt->rowCount() > 0) {
   
echo"
  
<div class='container'>


  
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' onclick='history.back()' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Note</h4>
        </div>
        <div class='modal-body'>
          <p style='color:Green'>Data is successfully added.</p>
        </div>
        <div class='modal-footer'>
          <button type='button' onclick='history.back()' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
      
    </div>
  </div>
  ";
      
      
      
echo $_POST['Enable_SMS'];
      
      
      if($_POST['Enable_SMS']==1){
        
        

        
        
$apiKey = '72509ce3-4382-4a24-a10d-2391bad5a67b';
$apiSecret = 'z5s70Uhs0EJq8SqfYgtY5qpHLbiyoIV6';
$accountApiCredentials = $apiKey . ':' . $apiSecret;

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

$sendUrl = 'https://rest.smsportal.com/bulkmessages';

$authHeader = 'Authorization: Bearer ' . $authToken;

$message = "Hello, {$customer} \nThank you for making a payment of R {$down_payment} on your Sale. Enjoy the rest of your day.\n\n{$group_name}";

$sendData = json_encode(array(
    'messages' => array(
        array(
            'content' => $message,
            'destination' => $number
        )
    )
));

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
    // SMS sent successfully
}
else {
    // Error sending SMS
}

  }
  }
  }
  
  else if($_POST['Enable_SMS']==2 or $_POST['Enable_SMS']=='' ){
  // Do not send sms
  
  }
  
  

