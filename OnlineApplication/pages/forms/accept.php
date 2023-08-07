<?php
session_start();
//business fone owner number
$business_o = "0825046928";

$getttt = $_POST['month'] . " " . $_POST['year'];
$period = $_POST['period'];
$Customer = $_POST['Customer'];
$idno = $_POST['idno'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$main_Nationality = $_POST['main_Nationality'];
$languages_ = $_POST['languages_'];
$product = $_POST['product'];
$PremiumCoverAmount = $_POST['PremiumCoverAmount'];
$Dep_covered = $_POST['Dep_covered'];
$email = $_POST['email'];
$product_add_ben = $_POST['product_add_ben'];
$policy_no = $_POST['policy_no'];
$ext_members = $_POST['ext_members'];
$inc_date = $_POST['inc_date'];
$m_status = $_POST['m_status'];
$res_address = $_POST['res_address'];
$Preferred_Payment_Date = $_POST['Preferred_Payment_Date'];
$cat = $_POST['cat'];
$_By = $_POST['_By'];
$Policy_old =$policy_no;
$errorMsg = "";
$successMsg = "";


$_By = $_POST['_By'];




$host = 'localhost';
$dbname = 'ekhonnec_vakhandli_group';
$username = 'ekhonnec_vakhandli_group';
$password = 'vakhandli_group';

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

// Retrieve the highest policy code from the database
try {
    $sql = "SELECT MAX(Policy) AS max_code FROM clients";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row && isset($row['max_code'])) {
        $max_code = $row['max_code'];
        $numeric_part = (int)substr($max_code, 4);
        $next_numeric_part = $numeric_part + 1;

        $admin_id = "VK" . date("y") . "/" . date("m") . "/";
        $policy_no = $admin_id . str_pad($next_numeric_part, 3, '0', STR_PAD_LEFT);

        echo "Next policy number: " . $policy_no;
    } else {
        echo "No records found in the clients table.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}

// Close the database connection
$pdo = null;

// Assuming policy_no is obtained from a form input
$policy_no = $_POST['policy_no'];

try {
    $conn = new PDO($dsn, $username, $password, $options);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";

    session_start();
    $_SESSION['my_variable'] = $policy_no;

    // Now we are saving the data of the main member
    $stmt = $conn->prepare("INSERT INTO clients (Customer, _ID, Number, Gender, Nationality, languageOf_com, Package, PremiumCoverAmount, Policy, Covered, Group_Name, email, Address, Product_Added_Benefit, extended_members, Marital_Status, Inception_date, Payment_Date, Period, _By) 
                          VALUES (:Customer, :idno, :phone, :gender, :main_Nationality, :languages_, :product, :PremiumCoverAmount, :policy_no, :Dep_covered, :cat, :email, :res_address, :product_add_ben, :ext_members, :m_status, :inc_date, :Preferred_Payment_Date, :period, :_By)");
    $stmt->bindParam(':Customer', $Customer);
    $stmt->bindParam(':idno', $idno);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':main_Nationality', $main_Nationality);
    $stmt->bindParam(':languages_', $languages_);
    $stmt->bindParam(':product', $product);
    $stmt->bindParam(':PremiumCoverAmount', $PremiumCoverAmount);
    $stmt->bindParam(':policy_no', $policy_no);
    $stmt->bindParam(':Dep_covered', $Dep_covered);
    $stmt->bindParam(':cat', $cat);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':res_address', $res_address);
    $stmt->bindParam(':product_add_ben', $product_add_ben);
    $stmt->bindParam(':ext_members', $ext_members);
    $stmt->bindParam(':m_status', $m_status);
    $stmt->bindParam(':inc_date', $inc_date);
    $stmt->bindParam(':Preferred_Payment_Date', $Preferred_Payment_Date);
    $stmt->bindParam(':period', $period);
    $stmt->bindParam(':_By', $_By);

    // Checking to see if the data was inserted
    if ($stmt->execute()) {
        // Insert query was successful
        if ($stmt->rowCount() > 0) {
            echo '<script>
                    alert("Client Accepted will direct you to full policy certificate");
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
    die();
}

try {
    // Connect to the database using PDO
    $conn1 = new PDO($dsn, $username, $password, $options);
    $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";

    // Now save extended members spouse details
    $transferSql = "INSERT INTO spousedetails SELECT * FROM incoming_spouse WHERE Policy = :policy";
    $transferStmt = $conn1->prepare($transferSql);
    $transferStmt->bindParam(':policy', $policy_no);
    $transferStmt->execute();

    // Delete data from incoming_spouse table
    $stmt11 = $conn1->prepare("DELETE FROM incoming_spouse WHERE Policy = :policy_no");
    $stmt11->bindParam(':policy_no', $policy_no);
    $stmt11->execute();

    // Delete data from incoming_clients table
    $stmt12 = $conn1->prepare("DELETE FROM incoming_clients WHERE Policy = :policy_no");
    $stmt12->bindParam(':policy_no', $policy_no);
    $stmt12->execute();

    // Checking to see if the data was inserted
    if ($transferStmt->rowCount() > 0) {
        echo '<script>
              alert("Spouse Member info Successfully added");
            </script>';
    } else {
        echo "Spouse Member info not inserted";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}





// if($sms_status == "Enabled")
// {
//code for sending an sms
$apiKey = '72509ce3-4382-4a24-a10d-2391bad5a67b';
$apiSecret = 'z5s70Uhs0EJq8SqfYgtY5qpHLbiyoIV6';
$accountApiCredentials = $apiKey . ':' . $apiSecret;

$message = "Hello, $Customer\n\nCongratulations and welcome to Vakhandli Group, Your Application for $product has been Accepted. Your policy number is $policy_no\n\n*Use the above policy number for all your queries.\n\n Thank you and have a wonderful day.";

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
} else {
    var_dump($authResult);
}

$sendUrl = 'https://rest.smsportal.com/bulkmessages';

$authHeader = 'Authorization: Bearer ' . $authToken;

$sendData = '{ "messages" : [ { "content" : "' . $message . '", "destination" : "' . $phone . '" } ] }';
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
} else {
    var_dump($sendResult);
}
// }
?>
