<?php
session_start();

$getttt = $_POST['period1'] . " " . $_POST['period2'];
$period = $getttt;

$names = $_POST['names'];
$Surname = $_POST['Surname'];
$joining = $_POST['Joining'];
$payment_method = $_POST['payment_method'];
$Customer = $names . " " . $Surname;
$idno = $_POST['idno'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$main_Nationality = $_POST['main_Nationality'];
$languages_ = $_POST['languages_'];
$product = $_POST['product'];
$PremiumCoverAmount = $_POST['PremiumCoverAmount'];
$Dep_covered = $_POST['Dep_covered'];
$email = $_POST['email'];
$Activation_date = "";

$status = "Active";

$product_add_ben = $_POST['product_add_ben'];

$policy_no = $_POST['policy_no'];
$ext_members = $_POST['ext_members'];
$inc_date = $_POST['inc_date'];
$m_status = $_POST['m_status'];
$res_address = $_POST['res_address'];

$Preferred_Payment_Date = $_POST['Preferred_Payment_Date'];
$cat = $_POST['cat'];
$sms_status = $_POST['sms_status'];

$Sp_Name = $_POST['Sp_Name'];
$Sp_Surname = $_POST['Sp_Surname'];
$Sp_ContactNo = $_POST['Sp_ContactNo'];
$Sp_idNumber = $_POST['Sp_idNumber'];
$Sp_Gender = $_POST['Sp_Gender'];
$Sp_date = $_POST['Sp_date'];
$Sp_Gender = $_POST['Sp_Gender'];

$_By = $_POST['_By'];

$waitingPeri = "";
$errorMsg = "";
$successMsg = "";

$servername = 'localhost';
$dbname = 'ekhonnec_JeudfraBS';
$username = 'ekhonnec_JeudfraBS';
$password = 'JeudfraBS33@';

$mysqli = new mysqli($servername, $username, $password, $dbname);

// check connection error
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

$sql = sprintf("SELECT * 
FROM 
incoming_clients");

$result = $mysqli->query($sql);

$trimmedNames = trim($names);
$trimmedSurname = trim($Surname);

$firstName = substr($trimmedNames, 0, 1); // Get the first letter of the name
$lastName = substr($trimmedSurname, 0, 1); // Get the first letter of the surname

$ad_id = mysqli_num_rows($result) + 1;
$admin_id = $firstName.$lastName . date("m") ."/". date("y")."/";
$admin_id = $admin_id. str_pad($ad_id, 3, '000', STR_PAD_LEFT);



$sql1 = "SELECT categoryName FROM categories";
$result1 = $mysqli->query($sql1);

$categories = array(); // Initialize an empty array to store the category names

while ($row = $result1->fetch_assoc()) {
    $categories[] = $row['categoryName']; // Add each category name to the $categories array
}

$categoryString = implode(', ', $categories); // Convert the $categories array to a string


$sql19 = "SELECT waiting_period FROM policies WHERE Group_name = ? AND Policy_Name = ?";
$stmt19 = $mysqli->prepare($sql19);
$stmt19->bind_param('ss', $cat, $product);
$stmt19->execute();
$stmt19->bind_result($waiting_period);

$waitingPeri = array(); // Initialize an empty array to store the waiting periods

while ($stmt19->fetch()) {
    $waitingPeri[] = $waiting_period; // Add each waiting period to the $waitingPeri array
}


$inc_date = new DateTime('2023-06-20'); // Replace '2023-06-20' with the desired date or timestamp
$waiting_period_in_days = (int)reset($waitingPeri) * 30; // Convert waiting period to days
$inc_date->add(new DateInterval("P{$waiting_period_in_days}D")); // Assuming there's only one waiting period
$Activation_date = $inc_date->format('Y-m-d');

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";

    if ($policy_no == "***AUTOMATED***") {
        $policy_no = $admin_id;
    }
    $_SESSION['my_viriable'] = $policy_no;

    //Customer, _ID, Number, Gender, Package, PremiumCoverAmount, Policy, status, Covered, Group_Name,Category, email, Address, Product_Added_Benefit,extended_members, Marital_Status, Inception_date, Payment_Date,Period, Activation_Date,_By ,Nationality ,languageOf_com
    $stmt = $conn->prepare("INSERT INTO incoming_clients (Customer, _ID, Number, Gender, Package, PremiumCoverAmount, Policy, status, Covered, Group_Name, Category, email, Address, Product_Added_Benefit, extended_members, Marital_Status, Inception_date, Payment_Date, Period, Activation_date, _By, Nationality, languageOf_com) 
                        VALUES (:Customer, :ID_no, :Number, :Gender, :Package, :PremiumCoverAmount, :Policy, :status, :Covered, :cat, :Category, :email, :Address, :Product_Added_Benefit, :extended_members, :Marital_Status, :Inception_date, :Payment_Date, :Period, :Activation_date, :_By, :Nationality, :languages_)");
    $stmt->bindParam(':Customer', $Customer);
    $stmt->bindParam(':ID_no', $idno);
    $stmt->bindParam(':Number', $phone);
    $stmt->bindParam(':Gender', $gender);
    $stmt->bindParam(':Package', $product);
    $stmt->bindParam(':PremiumCoverAmount', $PremiumCoverAmount);
    $stmt->bindParam(':Policy', $policy_no);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':Covered', $Dep_covered);
    $stmt->bindParam(':cat', $cat);
    $stmt->bindParam(':Category', $categoryString);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':Address', $res_address);
    $stmt->bindParam(':Product_Added_Benefit', $product_add_ben);
    $stmt->bindParam(':extended_members', $ext_members);
    $stmt->bindParam(':Marital_Status', $m_status);
    $inceptionDate = $inc_date->format('Y-m-d'); // Format the date as string
	$stmt->bindParam(':Inception_date', $inceptionDate);
    $stmt->bindParam(':Payment_Date', $Preferred_Payment_Date);
    $stmt->bindParam(':Period', $period);
    $stmt->bindParam(':Activation_date', $Activation_date);
    $stmt->bindParam(':_By', $_By);
    $stmt->bindParam(':Nationality', $main_Nationality);
    $stmt->bindParam(':languages_', $languages_);

    //checking to see if the data was inserted
    if ($stmt->execute()) {
        // Insert query was successful
        if ($stmt->rowCount() > 0) {
            echo '<script>
            alert("Client info Successfully added");
            </script>';
        } else {
            echo "Client info not inserted";
        }
    } else {
        // Insert query failed
        echo "Error: " . $stmt->errorInfo()[2];
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if ($m_status == "Married" || $m_status == "Partner") {
    try {
        $conn1 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";

        //now saving extended membersspousedetails
        $save_extended = $conn1->prepare("INSERT INTO incoming_spousedetails (Policy, spouse_Name, spouse_Surname, spouse_Number, spouse_ID, _By) 
                                      VALUES (:spousePolicy, :Sp_Name, :Sp_Surname, :Sp_ContactNo, :Sp_idNumber, :_By)");
        $save_extended->bindParam(':spousePolicy', $policy_no);
        $save_extended->bindParam(':Sp_Name', $Sp_Name);
        $save_extended->bindParam(':Sp_Surname', $Sp_Surname);
        $save_extended->bindParam(':Sp_ContactNo', $Sp_ContactNo);
        $save_extended->bindParam(':Sp_idNumber', $Sp_idNumber);
        $save_extended->bindParam(':_By', $_By);

        //checking to see if the data was inserted
        if ($save_extended->execute()) {
            // Insert query was successful
            if ($save_extended->rowCount() > 0) {
                echo '<script>
              alert("Spouse Member info Successfully added");
              
              </script>';
            } else {
                echo "Spouse Member info not inserted";
            }
        } else {
            // Insert query failed   window.location.replace("newClient.php");
            echo "Spouse Member Error: " . $save_extended->errorInfo()[2];
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}



if($sms_status == "Enabled")
{
	$totalQuery = "SELECT total FROM countSms";
$totalResult = $conn->query($totalQuery);

if ($totalResult) {
    // Query executed successfully
    $totalRow = $totalResult->fetch(PDO::FETCH_ASSOC);
    $total = $totalRow['total'];

    // Use the $total value as needed
 
} else {
    // Query execution failed
    $errorInfo = $conn->errorInfo();
    echo "Error: " . $errorInfo[2];
}

if ($total > 0) {
///code for sending an sms
//$apiKey = '72509ce3-4382-4a24-a10d-2391bad5a67b';
$apiSecret = 'z5s70Uhs0EJq8SqfYgtY5qpHLbiyoIV6';
$accountApiCredentials = $apiKey . ':' .$apiSecret;

$massage = "Hello, $Customer\n\nCongratulations and welcome to $cat your policy registration was successfully. Your policy number is $policy_no. \n\n*Use the above policy number for all your queries.\n\n Thank you and have a wonderful day.";

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
	$total--;
    
    $updateCountQuery = "UPDATE countSms SET total = :total, date = NOW()";
    $stmt = $conn->prepare($updateCountQuery);
    $stmt->bindValue(':total', $total);
    
    if ($stmt->execute()) {
        // Update successful
        // echo "Count updated successfully.";
    } else {
        // Update failed
        $errorInfo = $stmt->errorInfo();
        // echo "Error updating count: " . $errorInfo[2];
    }
    
    $sql = "INSERT INTO sms_data (ContactNumber, Message, Type, SMSnumber, _By, _On, total_left)
            VALUES (:phone, :message, 'Welcome new Client', :phone, :_By, NOW(), :total)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':phone', $phone);
    $stmt->bindValue(':message', $massage);
    $stmt->bindValue(':_By', $_By);
    $stmt->bindValue(':total', $total);
    
    if ($stmt->execute()) {
        // Query executed successfully
        
        // Retrieve total number of SMSes left
        $remainingSmsQuery = "SELECT COUNT(*) AS total FROM sms_data";
        $result = $conn->query($remainingSmsQuery);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $totalSmsesLeft = $row['total'];
        
        // Show pop-up with the total number of SMSes left
        echo "<script>alert('Total SMSes left: $total');</script>";
    } else {
        // Error in executing the query
        // echo "Error: " . $stmt->errorInfo()[2];
    }
	
	
	
	
	
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
}
 // header("Location: policy-certificate.php");
?>
