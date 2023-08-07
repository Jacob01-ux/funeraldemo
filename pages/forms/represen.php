<?php
// Retrieve the member details from the request
$name = isset($_POST['de_Name']) ? $_POST['de_Name'] : '';
$surname = isset($_POST['de_Surname']) ? $_POST['de_Surname'] : '';
$contactNo = isset($_POST['de_ContactNo']) ? $_POST['de_ContactNo'] : '';
$idNumber = isset($_POST['de_idNumber']) ? $_POST['de_idNumber'] : '';
$relationship = isset($_POST['deRelationship']) ? $_POST['deRelationship'] : '';
$nationality = isset($_POST['de_Nationality']) ? $_POST['de_Nationality'] : '';
$gender = isset($_POST['de_Gender']) ? $_POST['de_Gender'] : '';
$FILE_no1 = isset($_POST['FILE_no1']) ? $_POST['FILE_no1'] : '';
$appoidate = isset($_POST['appoidate']) ? $_POST['appoidate'] : '';
$G_groupName = isset($_POST['G_groupName']) ? $_POST['G_groupName'] : '';
$G_Reg = isset($_POST['G_Reg']) ? $_POST['G_Reg'] : '';

// Code to save the member details to a database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jeudfra";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the insert statement
    $stmt = $conn->prepare("INSERT INTO representatives (Registration_Number, Product_No, Role, Name, Surname, _ID, Gender, Contact_Number, Nationality, Apointed, _On) 
                            VALUES (:prodNo, :regNumber, :role, :name, :surname, :idNumber, :gender, :contactNo, :nationality, :appointed, :on)");

    // Bind the values
    $stmt->bindParam(':regNumber', $G_Reg);
    $stmt->bindParam(':prodNo', $FILE_no1);
    $stmt->bindParam(':role', $relationship);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':surname', $surname);
    $stmt->bindParam(':idNumber', $idNumber);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':contactNo', $contactNo);
    $stmt->bindParam(':nationality', $nationality);
    $stmt->bindParam(':appointed', $appoidate);
    $stmt->bindParam(':on', $Period);

    // Set default values for prodNo and Period
    $prodNo = "44455";
    $Period = "Today";

    // Execute the statement
    $stmt->execute();

    // Retrieve the count of saved members
    $countQuery = "SELECT COUNT(*) AS memberCount FROM representatives WHERE Registration_Number = :regNumber";
    $stmt = $conn->prepare($countQuery);
    $stmt->bindParam(':regNumber', $FILE_no1);
    $stmt->execute();

    // Fetch the count
    $row = $stmt->fetch();
    $savedMemberCount = $row['memberCount'];

    // Close the database connection
    $conn = null;

    // Check if the count has increased by 1
    if (isset($prevSavedMemberCount) && $savedMemberCount - $prevSavedMemberCount === 1) {
        echo '<script>alert("Representative successfully added");</script>';
    }

    // Return the count as a response
    echo $savedMemberCount;

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}
?>
