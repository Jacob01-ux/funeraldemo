<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jeudfra";


$Period = "";
$Policy = "";
$Date="";

  
$monthly_premium = "GHJGJG";
$Client = "";
$Client_id ="";
$Plan = "";
$_On = "";
$_By = "";
  



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  
  //now we are saving the data 
  $stmt = $conn->prepare("INSERT INTO premiums (Period, Policy, Date, monthly_premium, Client, Client_id, Plan, _On, _By) VALUES (:Period, :Policy, :Date, :monthly_premium, :Client, :Client_id, :Plan, :_On, :_By)");
  $stmt->bindParam(':Period', $Period);
  $stmt->bindParam(':Policy', $Policy);
  $stmt->bindParam(':Date', $Date);
  $stmt->bindParam(':monthly_premium', $monthly_premium);
  $stmt->bindParam(':Client', $Client);
  $stmt->bindParam(':Client_id', $Client_id);
  $stmt->bindParam(':Plan', $Plan);
  $stmt->bindParam(':_On', $_On);
  $stmt->bindParam(':_By', $_By);
  
  //now we sanitize the input
  // Sanitize input using filter_var()
  $Period = filter_var($_POST['Period'], FILTER_SANITIZE_STRING);
$Policy = filter_var($_POST['Policy'], FILTER_SANITIZE_STRING);
$Date= filter_var($_POST['Date'], FILTER_SANITIZE_STRING);


  
$monthly_premium = filter_var($_POST['monthly_premium'], FILTER_SANITIZE_STRING);
$Client = filter_var($_POST['Client'], FILTER_SANITIZE_STRING);
$Client_id = filter_var($_POST['Client_id'], FILTER_SANITIZE_STRING);
$Plan = filter_var($_POST['Plan'], FILTER_SANITIZE_STRING);
$_On = filter_var($_POST['_On'], FILTER_SANITIZE_STRING);
$_By = filter_var($_POST['_By'], FILTER_SANITIZE_STRING);
  
 $stmt->execute();
  
	//checking to see if the data was inserted
  if ($stmt->execute()) {
    // Insert query was successful
    if ($stmt->rowCount() > 0) {
        echo "Record inserted successfully";
      
//notify the owneer of the business everytime premiums are paid
      $to = "recipient@example.com";
	$subject = "Test email";
$message = "Hello, this is a test email!";
$headers = "From: sender@example.com\r\n";
$headers .= "Reply-To: sender@example.com\r\n";
$headers .= "Content-Type: text/html\r\n";

if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully"; 
} else {
    echo "Email sending failed";
}

    } else {
        echo "Record not inserted";
    }
} else {
    // Insert query failed
    echo "Error: " . $stmt->errorInfo()[2];
}
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>