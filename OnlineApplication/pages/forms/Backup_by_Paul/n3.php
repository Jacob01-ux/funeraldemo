<?php

$de_Name = $_POST['de_Name'];
$de_Surname= $_POST['de_Surname'];
$de_ContactNo = $_POST['de_ContactNo'];
$de_idNumber = $_POST['de_idNumber'];
$deRelationship = $_POST['deRelationship'];
$de_Nationality = $_POST['de_Nationality'];
$de_Gender = $_POST['de_Gender'];
$policy_no =  $_POST['policy_no'];
//$Dep_covered =  $_POST['Dep_covered'];


$servername = "localhost";
$username = "ekhonnec_Mphye_Funerals";
$password = "websystems_10";
$dbname = "ekhonnec_Mphye_Funerals";

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
clients");

$result = $mysqli->query($sql);

$ad_id = mysqli_num_rows($result) + 1;
$admin_id = "EYO" . str_pad($ad_id, 3, '0', STR_PAD_LEFT);

try{
  $conn1 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    if($policy_no == "*AUTOMATED* eg MFS001"){
      $policy_no = $admin_id;
    }
  //now saving extended members
  $save_extended = $conn1->prepare("INSERT INTO beneficiaries(Policy_number, Name, surname, _ID, Gender, Relationship, ContactNo, Nationality)
                                    VALUES (:policy_no, :de_Name, :de_Surname, :de_idNumber, :de_Gender, :deRelationship, :de_ContactNo, :de_Nationality)");
  $save_extended->bindParam(':policy_no', $policy_no);
  $save_extended->bindParam(':de_Name', $de_Name);
  $save_extended->bindParam(':de_Surname', $de_Surname);
  $save_extended->bindParam(':de_idNumber', $de_idNumber);
  $save_extended->bindParam(':de_Gender', $de_Gender);
  $save_extended->bindParam(':deRelationship', $deRelationship);
  $save_extended->bindParam(':de_ContactNo', $de_ContactNo);
  $save_extended->bindParam(':de_Nationality', $de_Nationality);
 
  
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
      echo '<script>
      if(Dp_counter2 == document.getElementById("Dep_covered").value){
        if(document.getElementById("Dep_covered").value == 1){
          alert("Thank you! " + document.getElementById("de_Name").value + " " + document.getElementById("de_Surname").value + " is saved successfully to our database as your Dependent member")
        }else {
          alert(document.getElementById("de_Name").value + " " + document.getElementById("de_Surname").value + " is saved")
          alert("Thank you! all " +  document.getElementById("Dep_covered").value + " Dependent members are saved successfully in our database")
        }
      }else {
        alert(document.getElementById("de_Name").value + " " + document.getElementById("de_Surname").value + " is saved")
    
      }     
      </script>';

      // if($ext_members === "1")
      // {
      //   echo '<script>
      //   alert(Ex_counter2)
      //   alert("Thank you! " + document.getElementById("Ex_Name").value + " " + document.getElementById("Ex_Surname").value + " is saved successfully to our database as your extended member");     
      //   </script>';
      // }else{
      //   echo '<script>
      //   alert("Member Successfully added");     
      //   </script>';
      // }

    } 
    else 
    {
      echo '<script>
      alert("Dependent Member info not inserted");     
      </script>';
       // echo "Extended Member info not inserted";
    }
} 
  else 
  {
    // Insert query failed   window.location.replace("newClient.php");
    echo "Dependent Member Error: " . $save_extended->errorInfo()[2];
} }catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}