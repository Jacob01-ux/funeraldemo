<?php
$Ex_Name = $_POST['Ex_Name'];
$Ex_Surname = $_POST['Ex_Surname'];
$Ex_ContactNo = $_POST['Ex_ContactNo'];
$Ex_idNumber = $_POST['Ex_idNumber'];
$Ex_Nationality = $_POST['Ex_Nationality'];
$Ex_Gender = $_POST['Ex_Gender'];
$policy_no = $_POST['policy_no'];
$ext_members = $_POST['ext_members'];

$servername = "localhost";
$username = "ekhonnec_vakhandli_group";
$password = "vakhandli_group";
$dbname = "ekhonnec_vakhandli_group";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Prepare and execute the SQL query to retrieve the group name and package from clients
    $query = "SELECT Customer, Group_Name, Package, PremiumCoverAmount, Number FROM clients WHERE Policy = :policy_no";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':policy_no', $policy_no);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Retrieve the group name and package values
        $group_name = $result['Group_Name'];
        $package = $result['Package'];
        $coverAmnt = $result['PremiumCoverAmount'];
        $phone = $result['Number'];
        $Customer = $result['Customer'];

        // Prepare and execute the SQL query to retrieve the extra member from policies
        $query = "SELECT Extra_Member FROM policies WHERE Group_name = :group_name AND Policy_Name = :package";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':group_name', $group_name);
        $stmt->bindParam(':package', $package);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Retrieve the extra member value
            $extra = $result['Extra_Member'];

            // Prepare and execute the SQL query to count additional members
            $query = "SELECT COUNT(*) AS CountAdd FROM additional_members WHERE Policy_Number = :policy_no";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':policy_no', $policy_no);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $countAdd = $result['CountAdd'];

            if ($countAdd >= 15) {
    // Prepare and execute the SQL query to update clients
    $query = "UPDATE clients SET PremiumCoverAmount = PremiumCoverAmount + :extra WHERE Policy = :policy_no";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':extra', $extra);
    $stmt->bindParam(':policy_no', $policy_no);
    $stmt->execute();
    $coverAmntnew = $coverAmnt + $extra;
    try {
        // Prepare and execute the SQL query to insert into additional_members
        $save_extended = $conn->prepare("INSERT INTO additional_members (Policy_Number, Name, Surname, _ID, Gender, ContactNo, Nationality) 
                          VALUES (:policy_no, :Ex_Name, :Ex_Surname, :Ex_idNumber, :Ex_Gender, :Ex_ContactNo, :Ex_Nationality)");
        $save_extended->bindParam(':policy_no', $policy_no);
        $save_extended->bindParam(':Ex_Name', $Ex_Name);
        $save_extended->bindParam(':Ex_Surname', $Ex_Surname);
        $save_extended->bindParam(':Ex_ContactNo', $Ex_ContactNo);
        $save_extended->bindParam(':Ex_idNumber', $Ex_idNumber);
        $save_extended->bindParam(':Ex_Nationality', $Ex_Nationality);
        $save_extended->bindParam(':Ex_Gender', $Ex_Gender);

        if ($save_extended->execute()) {
            if ($save_extended->rowCount() > 0) {
                echo '<script>
                    alert("Thank you! ' . $Ex_Name . ' ' . $Ex_Surname . ' issaved successfully to our database as your Extended member");
                    window.location.href = "Client_profile.php";
                </script>';
            } else {
                echo '<script>
                    alert("Dependent member info not inserted");
                    window.location.href = "Client_profile.php";
                </script>';
            }
        }
    } catch (PDOException $e) {
        echo "Insertion failed: " . $e->getMessage();
    }
                          ///code for sending an sms
$apiKey = '72509ce3-4382-4a24-a10d-2391bad5a67b';
$apiSecret = 'z5s70Uhs0EJq8SqfYgtY5qpHLbiyoIV6';
$accountApiCredentials = $apiKey . ':' .$apiSecret;

 $massage = "Hello, $Customer\n\nWe would like to inform you of your monthly premium amount increase from R$coverAmnt to $coverAmntnew. Your policy number is $policy_no.\n\n*Use the above policy number for all your queries.\n\n Thank you and have a wonderful day.";           

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
} else {
    try {
        // Prepare and execute the SQL query to insert into additional_members
        $save_extended = $conn->prepare("INSERT INTO additional_members (Policy_Number, Name, Surname, _ID, Gender, ContactNo, Nationality) 
                        VALUES (:policy_no, :Ex_Name, :Ex_Surname, :Ex_idNumber, :Ex_Gender, :Ex_ContactNo, :Ex_Nationality)");
        $save_extended->bindParam(':policy_no', $policy_no);
        $save_extended->bindParam(':Ex_Name', $Ex_Name);
        $save_extended->bindParam(':Ex_Surname', $Ex_Surname);
        $save_extended->bindParam(':Ex_ContactNo', $Ex_ContactNo);
        $save_extended->bindParam(':Ex_idNumber', $Ex_idNumber);
        $save_extended->bindParam(':Ex_Nationality', $Ex_Nationality);
        $save_extended->bindParam(':Ex_Gender', $Ex_Gender);

        if ($save_extended->execute()) {
            if ($save_extended->rowCount() > 0) {
                echo '<script>
                    alert("Thank you! ' . $Ex_Name . ' ' . $Ex_Surname . ' is saved successfully to our database as your Extended member");
                    window.location.href = "Client_profile.php";
                </script>';
            } else {
                            echo '<script>
                                alert("Dependent member info not inserted");
                                window.location.href = "Client_profile.php";
                            </script>';
                        }
                    } else {
                        $errorInfo = $save_extended->errorInfo();
                        echo '<script>
                            alert("Dependent member error: ' . $errorInfo[2] . '");
                            window.location.href = "Client_profile.php";
                        </script>';
                    }
                } catch (PDOException $e) {
                    echo "Insertion failed: " . $e->getMessage();
                }
            }
        }
    }
}
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

