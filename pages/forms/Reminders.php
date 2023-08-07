<?php
// Connect to the database using PDO
$host = 'localhost';
$dbname = 'jeudfra';
$username = 'root ';
$password = ' ';

$dsn = "mysql:host=$host;dbname=$dbname";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $connection = new PDO($dsn, $username, $password, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


// Get the current month and year
$currentMonth = date('m');
$currentYear = date('Y');

// Check if there is no premium for the current month and year
$sql = "SELECT Policy FROM premiums WHERE month != ? AND year != ? AND (boolreminder = 0 OR boolreminder = '')";
$stmt = $connection->prepare($sql);
$stmt->execute([$currentMonth, $currentYear]);
$result = $stmt->fetchAll();

if (!empty($result)) {
    // Retrieve the policy number(s) of the clients who need to pay
    foreach ($result as $row) {
        $policyNumber = $row["Policy"];

        // Retrieve the client's cell number from the clients table
        $sql = "SELECT Number FROM clients WHERE Policy = ?";
        $stmt2 = $connection->prepare($sql);
        $stmt2->execute([$policyNumber]);
        $result2 = $stmt2->fetch();

        if ($result2) {
            $cellNumber = $result2["Number"];
// Send an SMS reminder to the client
  //code for sending an sms
  $apiKey = '509ce3-4382-4a24-a10d-2391bad5a67b';
  $apiSecret = 'z5s70Uhs0EJq8SqfYgtY5qpHLbiyoIV6';
  $accountApiCredentials = $apiKey . ':' .$apiSecret;

  // Initialize the message variable
  $message = "Dear Client,\n\nThis is a reminder that your premium payment is due this month. Please ensure that payment is made by the due date to avoid any inconvenience.\n\nThank you,\nThe Insurance Company";

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

  $authContext = stream_context_create($authOptions);
  $result = file_get_contents($authEndpoint, false, $authContext);
  $authResult = json_decode($result);
  $status_line = $http_response_header[0];
  preg_match('{HTTP\/\S*\s(\d{3})}', $status_line, $match);
  $status = $match[1];
  
  if ($status === '200') { 
      $authToken = $authResult->{'token'};
    $authToken = $authResult->token;
      var_dump($authResult);
  } else {
      var_dump($authResult);
  }

      $sendUrl = 'https://rest.smsportal.com/bulkmessages';
$authHeader = 'Authorization: Bearer ' . $authToken;
$sendData = '{ "messages" : [ { "content" : "' . $message . '", "destination" : "' . $cellNumber . '" } ] }';
$options = array(
'http' => array(
'header' => array("Content-Type: application/json", $authHeader),
'method' => 'POST',
'content' => $sendData,
'ignore_errors'=> true,
 'max_redirects' => 1
)
);
  $context = stream_context_create($options);
  $sendResult = file_get_contents($sendUrl, false, $context);
    
   // Check if the SMS was sent successfully
    $status_line = $http_response_header[0];
    preg_match('{HTTP/\S*\s(\d{3})}', $status_line, $match);
    $status = $match[1];
    if ($status === '200') {
        var_dump($sendResult);
       // Update the premiums table to indicate that the reminder has been sent
      $sql = "UPDATE premiums SET boolreminder = 1 WHERE Policy = '$policyNumber'";
	  $connection->query($sql);
      
    } else {
        var_dump($sendResult);
    }
}
  }

// Close the database connection
$connection = null;
  } else {
    // Handle the case where no rows were returned
}
  //header("Location: Products.php");
exit();

?> 
