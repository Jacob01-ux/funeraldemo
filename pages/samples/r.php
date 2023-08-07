<?php
// Retrieve form data
//business - user
$BusName = $_POST['BusName'];
$slogan = $_POST['slogan'];
$contactno = $_POST['contactno'];

//personal - user pri
$p_names = $_POST['p_names'];
$p_email = $_POST['p_email'];
$p_phone = $_POST['p_phone'];
$p_password = $_POST['p_password'];
//$p_passconf = $_POST['p_passconf'];
$hint = $_POST['hint'];
$accesslevel = $_POST['accesslevel'];
$campanykey = $_POST['campanykey'];

$errorMsg = "";
$successMsg ="";

// Validate input data 
if (empty($p_names)){
echo "Please fill in names.";
  exit;
} else if (empty($p_email)){
    echo "Please fill in email address.";
    exit;
}  else if (empty($p_password)){
    echo "Please fill in password.";
    exit;
} else if (empty($hint)){
    echo "Please fill hint.";
    exit;
}else if (empty($accesslevel)){
    echo "Please select access level.";
    exit;
} else if (empty($campanykey)){
    echo "Please fill in campany key.";
    exit;
}else if (empty($BusName)){
    echo "Please fill in business name.";
    exit;
}else if (empty($slogan)){
    echo "Please fill in slogan.";
    exit;
}else if (empty($p_phone)){
    echo "Please fill in personal number.";
    exit;
}else if (empty($contactno)){
    echo "Please fill in business number.";
    exit;
}

// Connect to the database
$db = new mysqli('localhost', 'ekhonnec_JeudfraBS', 'JeudfraBS33@', 'ekhonnec_JeudfraBS');

// Check if username already exists
$query = "SELECT * FROM accounts WHERE email = '$p_email'";
$result = $db->query($query);

if ($result->num_rows > 0) {
    echo '<script>
    alert("Username already exists. Please choose another one.");
    header("Location: register-2.html");
    </script>';
  //echo "Username already exists. Please choose another one.";
  exit;
}

$query = "SELECT * FROM company_keys WHERE c_key = '$campanykey'";
$result2 = $db->query($query);

if ($result2->num_rows > 0) {
    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "jeudfra";
    try{
        $conn1 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          //echo "Connected successfully";
      
        //now saving extended members
                //now saving 
                $save = $conn1->prepare("INSERT INTO userprofile (Business_Name, Slogan, Contact_Number) 
                VALUES (:BusName, :slogan, :contactno)");
$save->bindParam(':BusName', $BusName);
$save->bindParam(':slogan', $slogan);
$save->bindParam(':contactno', $contactno);
        //$save_extended->bindParam(':Sp_idNumber', $Sp_idNumber);
        //$save_extended->bindParam(':Sp_Gender', $Sp_Gender);
        //$save_extended->bindParam(':Sp_date', $Sp_date);
        //$save_extended->bindParam(':de_Gender', $de_Gender);
        // $Pr_Name = $_POST['Pr_Name'];
        // $Name_of_Benefits = $_POST['Name_of_Benefits'];
        // $Product_Additonal_Benefits = $_POST['Product_Additonal_Benefits'];

        //now we sanitize the input
        // Sanitize input using filter_var()
        $BusName = filter_var($_POST['BusName'], FILTER_SANITIZE_STRING);
        $slogan = filter_var($_POST['slogan'], FILTER_SANITIZE_STRING);
        $contactno = filter_var($_POST['contactno'], FILTER_SANITIZE_STRING);
     // $Sp_idNumber = filter_var($_POST['Sp_idNumber'], FILTER_SANITIZE_STRING);
     // $Sp_Gender = filter_var($_POST['Sp_Gender'], FILTER_SANITIZE_STRING);
      //$Ex_Gender = filter_var($_POST['Sp_date'], FILTER_SANITIZE_STRING);
      //$Ex_Gender = filter_var($_POST['de_Gender'], FILTER_SANITIZE_STRING);
        
          //checking to see if the data was inserted
        if ($save->execute()) 
        {
          // Insert query was successful
          if ($save->rowCount() > 0) 
          {
            //   echo '<script>
            //   alert("Product additional benefits  info Successfully added");
            //   window.location.replace("login-2.html");
            //   </script>';
          } 
          else 
          {
            echo '<script>
              alert("business details info not inserted");
              </script>';
          }
      } 
        else 
        {
          // Insert query failed   window.location.replace("newClient.php");
          echo " Error: " . $save->errorInfo()[2];
      } }catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
      }
$conn1 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          //echo "Connected successfully";
      
        //now saving extended members
                //now saving 
                $save = $conn1->prepare("INSERT INTO groupsOLD (group_name, slogan, cellPhone_number) 
                VALUES (:BusName, :slogan, :contactno)");
$save->bindParam(':BusName', $BusName);
$save->bindParam(':slogan', $slogan);
$save->bindParam(':contactno', $contactno);
        //$save_extended->bindParam(':Sp_idNumber', $Sp_idNumber);
        //$save_extended->bindParam(':Sp_Gender', $Sp_Gender);
        //$save_extended->bindParam(':Sp_date', $Sp_date);
        //$save_extended->bindParam(':de_Gender', $de_Gender);
        // $Pr_Name = $_POST['Pr_Name'];
        // $Name_of_Benefits = $_POST['Name_of_Benefits'];
        // $Product_Additonal_Benefits = $_POST['Product_Additonal_Benefits'];

        //now we sanitize the input
        // Sanitize input using filter_var()
        $BusName = filter_var($_POST['BusName'], FILTER_SANITIZE_STRING);
        $slogan = filter_var($_POST['slogan'], FILTER_SANITIZE_STRING);
        $contactno = filter_var($_POST['contactno'], FILTER_SANITIZE_STRING);
     // $Sp_idNumber = filter_var($_POST['Sp_idNumber'], FILTER_SANITIZE_STRING);
     // $Sp_Gender = filter_var($_POST['Sp_Gender'], FILTER_SANITIZE_STRING);
      //$Ex_Gender = filter_var($_POST['Sp_date'], FILTER_SANITIZE_STRING);
      //$Ex_Gender = filter_var($_POST['de_Gender'], FILTER_SANITIZE_STRING);
        
          //checking to see if the data was inserted
        if ($save->execute()) 
        {
          // Insert query was successful
          if ($save->rowCount() > 0) 
          {
            //   echo '<script>
            //   alert("Product additional benefits  info Successfully added");
            //   window.location.replace("login-2.html");
            //   </script>';
          } 
          else 
          {
            echo '<script>
              alert("business details info not inserted");
              </script>';
          }
     
      //2
      try{
        $conn1 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          //echo "Connected successfully";
      
        //now saving extended members
        $p_names = $_POST['p_names'];
$p_email = $_POST['p_email'];
$p_phone = $_POST['p_phone'];
$p_password = $_POST['p_password'];
//$p_passconf = $_POST['p_passconf'];
$hint = $_POST['hint'];
$accesslevel = $_POST['accesslevel'];
$campanykey = $_POST['campanykey'];
                //now saving 
                $save = $conn1->prepare("INSERT INTO accounts (Username, names, Contact_Number, email, Password, Hint, AccessType)
                VALUES (:p_email, :p_names, :p_phone, :p_email, :p_password, :hint, :accesslevel)");
$save->bindParam(':p_email', $p_email);
$save->bindParam(':p_names', $p_names);
$save->bindParam(':p_phone', $p_phone);
$save->bindParam(':p_email', $p_email);
$save->bindParam(':p_password', $p_password);
$save->bindParam(':hint', $hint);
$save->bindParam(':accesslevel', $accesslevel);
        //$save_extended->bindParam(':Sp_idNumber', $Sp_idNumber);
        //$save_extended->bindParam(':Sp_Gender', $Sp_Gender);
        //$save_extended->bindParam(':Sp_date', $Sp_date);
        //$save_extended->bindParam(':de_Gender', $de_Gender);
        // $Pr_Name = $_POST['Pr_Name'];
        // $Name_of_Benefits = $_POST['Name_of_Benefits'];
        // $Product_Additonal_Benefits = $_POST['Product_Additonal_Benefits'];

        //now we sanitize the input
        // Sanitize input using filter_var()
        $p_email = filter_var($_POST['p_email'], FILTER_SANITIZE_STRING);
        $p_names = filter_var($_POST['p_names'], FILTER_SANITIZE_STRING);
        $p_phone = filter_var($_POST['p_phone'], FILTER_SANITIZE_STRING);
        $p_email = filter_var($_POST['p_email'], FILTER_SANITIZE_STRING);
        $p_password = filter_var($_POST['p_password'], FILTER_SANITIZE_STRING);
        $hint = filter_var($_POST['hint'], FILTER_SANITIZE_STRING);
        $accesslevel = filter_var($_POST['accesslevel'], FILTER_SANITIZE_STRING);
     // $Sp_idNumber = filter_var($_POST['Sp_idNumber'], FILTER_SANITIZE_STRING);
     // $Sp_Gender = filter_var($_POST['Sp_Gender'], FILTER_SANITIZE_STRING);
      //$Ex_Gender = filter_var($_POST['Sp_date'], FILTER_SANITIZE_STRING);
      //$Ex_Gender = filter_var($_POST['de_Gender'], FILTER_SANITIZE_STRING);
        
          //checking to see if the data was inserted
        if ($save->execute()) 
        {
          // Insert query was successful
          if ($save->rowCount() > 0) 
          {
              echo '<script>
              alert("You have successfully registered a business. you will receive a confirmation email shortly");
              window.location.replace("login-2.php");
              </script>';
            
            //EMAIL FEATURE STARTS HERE
?>
    <script>
      //Write the name of the business HERE,
      var NameOfBusiness = "Jeudfra"; //replace the name in quotes e.g Amathonga, Zwide, Moahi, Mafoko, Simponia...
      var ClientName1 = "<?php echo $p_names; ?>";
      var ClientEmail1 = "<?php echo $p_email; ?>";
      var ClientPin1 = "<?php echo $p_password; ?>";

      alert("You have successfully registered a business. You will receive a confirmation email shortly");
      window.location.replace("https://ekhonnector.co.za/moahiEmailseNt.php?Clientemail=" + ClientEmail1 + "&ClientName=" + ClientName1 + "&Uphasiwedi=" + ClientPin1 + "&BusinessName=" + NameOfBusiness + "");
    </script>
    <?php
      //EMAIL FEATURE ENDS HERE
            
            
 /*             
$to = $p_email;
$subject = 'Amangema account confirmation';
$message ='Hello'.' '.$p_names.' '.$p_names.', '.' Account registering at Amangema websystems was successfull'. "\r\n". 
'Your Login Username is:'. "\r\n" .
'Your Login Password is:'. "\r\n".
'0794396413 | Amangema@Amangema.co.za | www.Amangema.co.za ';
$headers = 'From: blessed@Amangema.co.za' . "\r\n" .
           'Reply-To: Amangema@gmail.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

if (mail($to, $subject, $message, $headers)) {
    echo 'The email was sent successfully.';
} else {
    echo 'There was an error sending the email.';
    
    // Get the error message
  $errorMessage = error_get_last()['message'];
  // Log the error message to a file or database
  error_log($errorMessage);
}
*/

$apiKey = '72509ce3-4382-4a24-a10d-2391bad5a67b';
$apiSecret = 'z5s70Uhs0EJq8SqfYgtY5qpHLbiyoIV6';
$accountApiCredentials = $apiKey . ':' .$apiSecret;


$massage = "Hello, $p_names\n\nCongratulations and welcome to $BusName your account was created successfully.\n\nUsername:\n$p_email\nPassword:\n$p_password\n*Use the above creditials to login to the admin portal.\n\n Thank you and have a wonderful day.";

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

$sendData = "{ 'messages' : [ { 'content' : '$massage', 'destination' : '$p_phone' } ] }";

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
          else 
          {
              echo "insertion fail";
          }
      } 
        else 
        {
          // Insert query failed   window.location.replace("newClient.php");
          echo "Error: " . $save->errorInfo()[2];
      } }catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
      }
        }
      
 // Insert user data into database
// $query = "INSERT INTO userprofile (Business_Name, Slogan, Contact_Number) VALUES ('$BusName', '$slogan', '$contactno')";
// mysqli_query($db, $query);

// $query2 = "INSERT INTO accounts (Username, names, Contact_Number, email, Password, Hint, AccessType) VALUES ('$p_email', '$p_names', '$p_phone', '$p_email', '$p_password', '$hint', '$accesslevel')";
// mysqli_query($db, $query2);

//$result = $db->query($query);
// if (!mysqli_error($db)) {
//    // mysqli_query($db, "COMMIT");
//     echo "Sign up successful! please check your email for confirmation";

//     header("Location: login.html");
//     exit;

// } else {
//     mysqli_query($db, "ROLLBACK");
//     echo "Error: " . $db->error;
// }

// if ($result) {
//   echo "Sign up successful!";
// } else {
//   echo "Error: " . $db->error;
// }

// Close database connection
$db->close();
} else {
    echo '<script>
    alert("The was a problem registering, please provide correct campany key");
    header("Location: register-2.html");
    </script>';
    exit;
}
?>
