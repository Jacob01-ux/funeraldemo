<?php

$cat = $_POST['cat'];
$tnc= $_POST['tnc'];
$admin = $_POST['admin'];

$servername = "localhost";
$username = "ekhonnec_vakhandli_group";
$password = "vakhandli_group";
$dbname = "ekhonnec_vakhandli_group";

try{
  $conn1 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";

  //now saving extended members
  $save_extended = $conn1->prepare("INSERT INTO termsandConditions (category, description, _By) 
                                    VALUES (:cat, :tnc, :admin)");
  $save_extended->bindParam(':cat', $cat);
  $save_extended->bindParam(':tnc', $tnc);
  $save_extended->bindParam(':admin', $admin);


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
        alert("Terms and conditions added successfully!");  
        window.location.replace("termcondition.php");   
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
      alert("Terms and conditions not inserted");     
      </script>';
       // echo "Extended Member info not inserted";
    }
} 
  else 
  {
    // Insert query failed   window.location.replace("newClient.php");
    echo "Terms and conditions Error: " . $save_extended->errorInfo()[2];
} }catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}