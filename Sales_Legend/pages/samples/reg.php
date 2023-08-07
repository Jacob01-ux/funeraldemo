<?php
///code for sending an sms
$apiKey = '72509ce3-4382-4a24-a10d-2391bad5a67b';
$apiSecret = 'z5s70Uhs0EJq8SqfYgtY5qpHLbiyoIV6';
$accountApiCredentials = $apiKey . ':' .$apiSecret;

$massage = "Hello, $apiSecret \n\nCongratulations and welcome to $apiSecret your account was created successfully. \n\nUsername: $apiKey \nPassword: $apiSecret \n Use the above creditials to login to the admin portal, \n\n Thank you and have a wonderful day.";

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

$sendData = "{ 'messages' : [ { 'content' : '$massage', 'destination' : '0613447514' } ] }";

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