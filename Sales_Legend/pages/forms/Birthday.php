<?php
try {
//code for sending an sms
$apiKey = '72509ce3-4382-4a24-a10d-2391bad5a67b';
$apiSecret = 'z5s70Uhs0EJq8SqfYgtY5qpHLbiyoIV6';
$accountApiCredentials = $apiKey . ':' .$apiSecret;

// Initialize the message variable
$message = "";

// Connect to the database
$conn = mysqli_connect("localhost", "ekhonnec_JeudfraBS", "JeudfraBS33@", "ekhonnec_JeudfraBS") or die("Could not connect to database");

// Loop through the results to check for clients with a birthday today
$sql = "SELECT * FROM clients WHERE BirthdayMessageSent = 0 OR BirthdayMessageSent = '' ";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
    die('Error executing query: ' . mysqli_error($conn));
}

while ($row = mysqli_fetch_assoc($result)) {
    $client_id = $row["_ID"];
    $client_name = $row["Customer"];
    $client_Number = $row["Number"];
    $client_id_month = substr($client_id, 2, 2);
    $client_id_Day = substr($client_id, 4, 2);
    $client_birthday = $client_id_month."-".$client_id_Day;

    // Determine if today is the client's birthday
    $today = date("m-d");
    if ($client_birthday == $today) {
        // If today is the client's birthday, set the message variable
        // Set the flag to indicate that a message has been sent to the client
        $updateSql = "UPDATE clients SET BirthdayMessageSent = 1 WHERE _ID = $client_id";
        mysqli_query($conn, $updateSql);
        $message = "Dear " . $client_name . ",\n\nHappy birthday! We hope you have a wonderful day filled with joy and celebration.\n\nBest regards,\nThe Company";
    
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
            var_dump($authResult);
        } else {
            var_dump($authResult);
        }
      $sendUrl = 'https://rest.smsportal.com/bulkmessages';
$authHeader = 'Authorization: Bearer ' . $authToken;
$sendData = '{ "messages" : [ { "content" : "' . $message . '", "destination" : "' . $client_Number . '" } ] }';
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
    } else {
        var_dump($sendResult);
    }
}
  }

// Close the database connection
mysqli_close($conn);

// Redirect back to the notification portal

  } catch (Exception $e) {
    // handle the error
    echo "Error: " . $e->getMessage();
}

header("Location: Products.php");
exit();
?>