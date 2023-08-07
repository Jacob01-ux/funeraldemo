<?php

$Ex_Name = $_POST['Ex_Name'];
$Ex_Surname= $_POST['Ex_Surname'];
$Ex_ContactNo = $_POST['Ex_ContactNo'];
$Ex_idNumber = $_POST['Ex_idNumber'];
$Ex_Nationality = $_POST['Ex_Nationality'];
$Ex_Gender = $_POST['Ex_Gender'];
$Policy_Number =  $_POST['policy_no'];

$servername = "localhost";
$username = "mandhagr_websystems_10";
$password = "websystems_10";
$dbname = "mandhagr_websystems_10";

try{
  $conn1 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";

  //now saving extended members
  $save_extended = $conn1->prepare("INSERT INTO additional_members (Policy_Number, Name, Surname, ContactNo, _ID, Nationality, Gender) 
                                    VALUES (:Policy_Number, :Ex_Name, :Ex_Surname, :Ex_ContactNo, :Ex_idNumber, :Ex_Nationality, :Ex_Gender)");
  $save_extended->bindParam(':Policy_Number', $Policy_Number);
  $save_extended->bindParam(':Ex_Name', $Ex_Name);
  $save_extended->bindParam(':Ex_Surname', $Ex_Surname);
  $save_extended->bindParam(':Ex_ContactNo', $Ex_ContactNo);
  $save_extended->bindParam(':Ex_idNumber', $Ex_idNumber);
  $save_extended->bindParam(':Ex_Nationality', $Ex_Nationality);
  $save_extended->bindParam(':Ex_Gender', $Ex_Gender);

 

  //now we sanitize the input
  // Sanitize input using filter_var()
// $Ex_Name = filter_var($_POST['Ex_Name'], FILTER_SANITIZE_STRING);
// $Ex_Surname = filter_var($_POST['Ex_Surname'], FILTER_SANITIZE_STRING);
// $Ex_ContactNo = filter_var($_POST['Ex_ContactNo'], FILTER_SANITIZE_STRING);
// $Ex_idNumber = filter_var($_POST['Ex_idNumber'], FILTER_SANITIZE_STRING);
// $Ex_Nationality = filter_var($_POST['Ex_Nationality'], FILTER_SANITIZE_STRING);
// $Ex_Gender = filter_var($_POST['Ex_Gender'], FILTER_SANITIZE_STRING);

  
	//checking to see if the data was inserted
  if ($save_extended->execute()) 
  {
    // Insert query was successful
    if ($save_extended->rowCount() > 0) 
    {
        echo "Member Successfully added";
    } 
    else 
    {
        echo "Extended Member info not inserted";
    }
} 
  else 
  {
    // Insert query failed   window.location.replace("newClient.php");
    echo "Extended Member Error: " . $save_extended->errorInfo()[2];
} }catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}