<?php

$Name_of_Benefits= $_POST['Name_of_Benefits'];
$Product_Additonal_Benefits = $_POST['Product_Additonal_Benefits'];
$policy_no =  $_POST['policy_no'];
$product_code = "Jacob to assign correct value";
//$Dep_covered =  $_POST['Dep_covered'];


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
clients");

$result = $mysqli->query($sql);

$ad_id = mysqli_num_rows($result) + 1;
$admin_id =$firstName.$lastName . date("m") ."/". date("y")."/";
$admin_id = $admin_id . str_pad($ad_id, 3, '0', STR_PAD_LEFT);


try{
  $conn1 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    if($policy_no == "***AUTOMATED***"){
      $policy_no = $admin_id;
    }
  //now saving extended members
  $save_extended = $conn1->prepare("INSERT INTO members_additional_benefits(product_Code, Policy_Number, benefit_name, description)
                                    VALUES (:product_code, :policy_no, :Name_of_Benefits, :Product_Additonal_Benefits)");
  $save_extended->bindParam(':product_code', $product_code);
  $save_extended->bindParam(':policy_no', $policy_no);
  $save_extended->bindParam(':Name_of_Benefits', $Name_of_Benefits);
  $save_extended->bindParam(':Product_Additonal_Benefits', $Product_Additonal_Benefits);
  
 
  
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
      if(Pr_counter2 == document.getElementById("product_add_ben").value){
        if(document.getElementById("product_add_ben").value == 1){
            alert("Thank you! " + document.getElementById("Name_of_Benefits").value  + " is saved successfully to our database as your Product additional benefit")
        }else {
            alert(document.getElementById("Name_of_Benefits").value  + " is saved")
            alert("Thank you! all " +  document.getElementById("product_add_ben").value + " Product additional benefits are saved successfully in our database")
        }
      }else {
        alert(document.getElementById("Name_of_Benefits").value + " is saved")
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
      alert("Product additional benefits info not inserted");     
      </script>';
       // echo "Extended Member info not inserted";
    }
} 
  else 
  {
    // Insert query failed   window.location.replace("newClient.php");
    echo "Product additional benefits  Error: " . $save_extended->errorInfo()[2];
} }catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}