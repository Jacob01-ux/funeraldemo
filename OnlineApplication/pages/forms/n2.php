<?php

$Ex_Name = $_POST['Ex_Name'];
$Ex_Surname= $_POST['Ex_Surname'];
$Ex_ContactNo = $_POST['Ex_ContactNo'];
$Ex_idNumber = $_POST['Ex_idNumber'];
$Ex_Nationality = $_POST['Ex_Nationality'];
$Ex_Gender = $_POST['Ex_Gender'];
$policy_no =  $_POST['policy_no'];
$ext_members =  $_POST['ext_members'];

$servername = "localhost";
$dbname = 'ekhonnec_JeudfraBS';
$username = 'ekhonnec_JeudfraBS';
$password = 'JeudfraBS33@';



$mysqli = new mysqli(hostname: $servername,
                     username: $username, 
                     password: $password, 
                     database: $dbname);

//check connection error
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli-connect_error);
}

$sql = sprintf("SELECT * 
FROM 
incoming_clients");

$result = $mysqli->query($sql);

$ad_id = mysqli_num_rows($result) + 1;
$admin_id = $firstName.$lastName . date("m") ."/". date("y")."/";
$admin_id = $admin_id . str_pad($ad_id, 3, '0', STR_PAD_LEFT);

try{
  $conn1 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    if($policy_no == "***AUTOMATED***"){
      $policy_no = $admin_id;
    }
  //now saving extended members
  $save_extended = $conn1->prepare("INSERT INTO incoming_additional_members (Policy_Number, Name, Surname, _ID, Gender,ContactNo,Nationality) 
                                    VALUES (:policy_no, :Ex_Name, :Ex_Surname, :Ex_idNumber, :Ex_Gender, :Ex_ContactNo,  :Ex_Nationality)");
  $save_extended->bindParam(':policy_no', $policy_no);
  $save_extended->bindParam(':Ex_Name', $Ex_Name);
  $save_extended->bindParam(':Ex_Surname', $Ex_Surname);
  $save_extended->bindParam(':Ex_ContactNo', $Ex_ContactNo);
  $save_extended->bindParam(':Ex_idNumber', $Ex_idNumber);
  $save_extended->bindParam(':Ex_Nationality', $Ex_Nationality);
  $save_extended->bindParam(':Ex_Gender', $Ex_Gender);

  
	//checking to see if the data was inserted
  if ($save_extended->execute()) 
  {
    // Insert query was successful
    if ($save_extended->rowCount() > 0) 
    {
      echo '<script>
      if(Ex_counter2 == document.getElementById("ext_members").value){
        if(document.getElementById("ext_members").value == 1){
          alert("Thank you! " + document.getElementById("Ex_Name").value + " " + document.getElementById("Ex_Surname").value + " is saved successfully to our database as your Extended member")
        }else {
          alert(document.getElementById("Ex_Name").value + " " + document.getElementById("Ex_Surname").value + " is saved")
          alert("Thank you! all " +  document.getElementById("ext_members").value + " Extended members are saved successfully in our database")
        }
      }else {
        alert(document.getElementById("Ex_Name").value + " " + document.getElementById("Ex_Surname").value + " is saved")
    
      }     
      </script>';

    } 
    else 
    {
      echo '<script>
      alert("Extended Member info not inserted");     
      </script>';
       // echo "Extended Member info not inserted";
    }
} 
  else 
  {
    // Insert query failed   window.location.replace("newClient.php");
    echo "Extended Member Error: " . $save_extended->errorInfo()[2];
} }catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}