<?php
session_start();
//business fone owner number


if (isset($_GET['PolicyNumber'], $_GET['admin'], $_GET['n_month'], $_GET['Group_Name'], $_GET['product'], $_GET['Premium'], $_GET['product_add_ben'], $_GET['Dep_covered'], $_GET['ext_members'], $_GET['Preferred_Payment_Date'], $_GET['inc_date'], $_GET['names'], $_GET['phone1'], $_GET['idno'], $_GET['Nationality'], $_GET['languages_'], $_GET['gender'], $_GET['email'], $_GET['res_address'], $_GET['m_status'])) {
    // Get the values from the URL
    $policyNumber = $_GET['PolicyNumber'];
    $admin = $_GET['admin'];
    $nMonth = $_GET['n_month'];
    $groupName = $_GET['Group_Name'];
    $product = $_GET['product'];
    $premium = $_GET['Premium'];
    $productAddBen = $_GET['product_add_ben'];
    $depCovered = $_GET['Dep_covered'];
    $extMembers = $_GET['ext_members'];
    $preferredPaymentDate = $_GET['Preferred_Payment_Date'];
    $inceptionDate = $_GET['inc_date'];
    $names = $_GET['names'];
    $phone1 = $_GET['phone1'];
    $idno = $_GET['idno'];
    $nationality = $_GET['Nationality'];
    $languages = $_GET['languages_'];
    $gender = $_GET['gender'];
    $email = $_GET['email'];
    $resAddress = $_GET['res_address'];
    $maritalStatus = $_GET['m_status'];
    $business_o = "0825046928";
    $period = $nMonth;
    $policyNumberold=$policyNumber;
    

    // Now you can use these variables as needed in your PHP logic
    // For example, you can display them or store them in a database.


} else {
    // If any of the required values are missing in the URL, handle the error accordingly.
    echo "Error: Required values are missing.";
}

$host = 'localhost';
$dbname = 'ekhonnec_JeudfraBS';
$username = 'ekhonnec_JeudfraBS';
$password = 'JeudfraBS33@';

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
    // Step 1: Fetch the maximum policy number from the database
    $sql = "SELECT MAX(Policy) AS max_code FROM clients";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Step 2: Extract the numeric part of the maximum policy number and increment it
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row && isset($row['max_code'])) {
        $max_code = $row['max_code'];
        $numeric_part = (int)substr($max_code, 7); // Assuming the policy number format is XXMM/YY/NNN
        $next_numeric_part = $numeric_part + 1;

        // Step 3: Generate the next policy number
        // Extract the first letter of the name
        $firstLetterName = substr($names, 0, 1);

        // Extract the last word from the name
        $words = explode(" ", $names);
        $lastWord = end($words);

        // Extract the first letter of the last word
        $firstLetterLastWord = substr($lastWord, 0, 1);

        // Concatenate the first letters and assign them to $admin
        $admin = $firstLetterName . $firstLetterLastWord;

        // Generate admin_id
        $admin_id = $admin . date("m") . "/" . date("y") . "/";
        $policy_no = $admin_id . str_pad($next_numeric_part, 3, '0', STR_PAD_LEFT);

        echo "Next policy number: " . $policy_no;
    } else {
        // If no records are found in the clients table, start with the initial policy number
        $next_numeric_part = 1;
        // Extract the first letter of the name
        $firstLetterName = substr($names, 0, 1);

        // Extract the last word from the name
        $words = explode(" ", $names);
        $lastWord = end($words);

        // Extract the first letter of the last word
        $firstLetterLastWord = substr($lastWord, 0, 1);

        // Concatenate the first letters and assign them to $admin
        $admin = $firstLetterName . $firstLetterLastWord;

        // Generate admin_id
        $admin_id = $admin . date("m") . "/" . date("y") . "/";
        $policy_no = $admin_id . str_pad($next_numeric_part, 3, '0', STR_PAD_LEFT);

        echo "Next policy number: " . $policy_no;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}


// Close the database connection
$pdo = null;


try {
    $conn = new PDO($dsn, $username, $password, $options);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";

   // session_start();
    $_SESSION['my_variable'] = $policy_no;

    // Now we are saving the data of the main member
    $stmt = $conn->prepare("INSERT INTO clients (Customer, _ID, Number, Gender, Nationality, languageOf_com, Package, PremiumCoverAmount, Policy, Covered, Group_Name, email, Address, Product_Added_Benefit, extended_members, Marital_Status, Inception_date, Payment_Date, Period, _By) 
                          VALUES (:Customer, :idno, :phone, :gender, :main_Nationality, :languages_, :product, :PremiumCoverAmount, :policy_no, :Dep_covered, :cat, :email, :res_address, :product_add_ben, :ext_members, :m_status, :inc_date, :Preferred_Payment_Date, :period, :_By)");
    $stmt->bindParam(':Customer', $names);
    $stmt->bindParam(':idno', $idno);
    $stmt->bindParam(':phone', $phone1);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':main_Nationality', $nationality);
    $stmt->bindParam(':languages_', $languages);
    $stmt->bindParam(':product', $product);
    $stmt->bindParam(':PremiumCoverAmount', $premium);
    $stmt->bindParam(':policy_no', $policy_no);
    $stmt->bindParam(':Dep_covered', $depCovered);
    $stmt->bindParam(':cat', $groupName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':res_address', $resAddress);
    $stmt->bindParam(':product_add_ben', $productAddBen);
    $stmt->bindParam(':ext_members', $extMembers);
    $stmt->bindParam(':m_status', $maritalStatus);
    $stmt->bindParam(':inc_date', $inceptionDate);
    $stmt->bindParam(':Preferred_Payment_Date', $preferredPaymentDate);
    $stmt->bindParam(':period', $period);
    $stmt->bindParam(':_By', $admin);

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
    $transferStmt->bindParam(':policy', $policyNumberold);
    $transferStmt->execute();
     
    $transferSql33 = "UPDATE spousedetails SET Policy = :newPolicy WHERE Policy = :oldPolicy";
    $transferStmt33 = $conn1->prepare($transferSql33);

    // Replace $newPolicyNumber and $oldPolicyNumber with the actual policy numbers
    $newPolicyNumber = $policy_no;
    $oldPolicyNumber = $policyNumberold;

    $transferStmt33->bindParam(':newPolicy', $newPolicyNumber);
    $transferStmt33->bindParam(':oldPolicy', $oldPolicyNumber);

    $transferStmt33->execute();

//Extended
    $transferSql221 = "INSERT INTO additional_members SELECT * FROM incoming_additional_members WHERE Policy_Number = :policy";
    $transferStmt221 = $conn1->prepare($transferSql221);
    $transferStmt221->bindParam(':policy', $policyNumberold);
    $transferStmt221->execute();
     
    $transferSql221 = "UPDATE additional_members SET Policy_Number = :newPolicy WHERE Policy_Number = :oldPolicy";
    $transferStmt221 = $conn1->prepare($transferSql221);

    // Replace $newPolicyNumber and $oldPolicyNumber with the actual policy numbers
    $newPolicyNumber = $policy_no;
    $oldPolicyNumber = $policyNumberold;

    $transferStmt221->bindParam(':newPolicy', $newPolicyNumber);
    $transferStmt221->bindParam(':oldPolicy', $oldPolicyNumber);

    $transferStmt221->execute();

//Beneficiaries
    $transferSql331 = "INSERT INTO beneficiaries SELECT * FROM incoming_beneficiaries WHERE Policy_number = :policy";
    $transferStmt331 = $conn1->prepare($transferSql331);
    $transferStmt331->bindParam(':policy', $policyNumberold);
    $transferStmt331->execute();
     
    $transferSql331 = "UPDATE beneficiaries SET Policy_number = :newPolicy WHERE Policy_number = :oldPolicy";
    $transferStmt331 = $conn1->prepare($transferSql331);

    // Replace $newPolicyNumber and $oldPolicyNumber with the actual policy numbers
    $newPolicyNumber = $policy_no;
    $oldPolicyNumber = $policyNumberold;

    $transferStmt331->bindParam(':newPolicy', $newPolicyNumber);
    $transferStmt331->bindParam(':oldPolicy', $oldPolicyNumber);

    $transferStmt331->execute();

    ///
    $transferSql1 = "INSERT INTO incoming_approved SELECT * FROM clients WHERE Policy = :policy";
    $transferStmt1 = $conn1->prepare($transferSql1);
    $transferStmt1->bindParam(':policy',$policy_no);
    $transferStmt1->execute();

    // Delete data from incoming_spouse table
    $stmt11 = $conn1->prepare("DELETE FROM incoming_spouse WHERE Policy = :policy_no");
    $stmt11->bindParam(':policy_no', $policyNumberold);
    $stmt11->execute();

    // Delete data from incoming_clients table
    $stmt12 = $conn1->prepare("DELETE FROM incoming_clients WHERE Policy = :policy_no");
    $stmt12->bindParam(':policy_no', $policyNumberold);
    $stmt12->execute();
    
    // Delete data from incoming_additional_members table
    $stmt122 = $conn1->prepare("DELETE FROM incoming_additional_members WHERE Policy_Number	= :policy_no");
    $stmt122->bindParam(':policy_no', $policyNumberold);
    $stmt122->execute();

    // Delete data from incoming_beneficiaries table
    $stmt121 = $conn1->prepare("DELETE FROM incoming_beneficiaries WHERE Policy_number = :policy_no");
    $stmt121->bindParam(':policy_no', $policyNumberold);
    $stmt121->execute();


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

$message = "Hello, $names\n\nCongratulations and welcome to Jeudfra_Burial_Society, Your Application for $product has been Accepted. Your policy number is $policy_no\n\n*Use the above policy number for all your queries.\n\n Thank you and have a wonderful day.";

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

$sendData = '{ "messages" : [ { "content" : "' . $message . '", "destination" : "' . $phone1 . '" } ] }';
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

