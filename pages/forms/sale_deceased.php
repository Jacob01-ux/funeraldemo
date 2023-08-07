<head>
  	<!-- html2pdf CDN-->
	<script src=
"https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js">
	</script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript"></script>
	</head>
<?php
session_start();

$de_Name= $_POST['de_Name'];
$de_idNumber= $_POST['de_idNumber'];

$DOB= $_POST['DOB'];

  
  


if($de_Name==""){


echo"
  
<div class='container'>


  
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' onclick='history.back()' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Note</h4>
        </div>
        <div class='modal-body'>
          <p style='color:red'>Complete filling the form.</p>
        </div>
        <div class='modal-footer'>
          <button type='button' onclick='history.back()' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
      
    </div>
  </div>
  ";
}

else if($de_idNumber==""){

echo"
  
<div class='container'>


  
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' onclick='history.back()' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Note</h4>
        </div>
        <div class='modal-body'>
          <p style='color:red'>Complete filling the form.</p>
        </div>
        <div class='modal-footer'>
          <button type='button' onclick='history.back()' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
      
    </div>
  </div>
  ";
}

else if($DOB==""){

echo"
  
<div class='container'>


  
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' onclick='history.back()' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Note</h4>
        </div>
        <div class='modal-body'>
          <p style='color:red'>Complete filling the form.</p>
        </div>
        <div class='modal-footer'>
          <button type='button' onclick='history.back()' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
      
    </div>
  </div>
  ";
}
else{
  
  
  
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jeudfra";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
  
  //now we are saving the data 

  $stmt = $conn->prepare("INSERT INTO sale_deceased (de_Name, de_idNumber, DOB) VALUES (:de_Name, :de_idNumber, :DOB)");
  $stmt->bindParam(':de_Name', $de_Name);
  $stmt->bindParam(':de_idNumber', $de_idNumber);
  $stmt->bindParam(':DOB', $DOB);
  
  
 
  //now we sanitize the input
  // Sanitize input using filter_var()
$de_Name = filter_var($_POST['de_Name'], FILTER_SANITIZE_STRING);
$de_idNumber = filter_var($_POST['de_idNumber'], FILTER_SANITIZE_STRING);
$DOB = filter_var($_POST['DOB'], FILTER_SANITIZE_STRING);


  
  
	//checking to see if the data was inserted
  if ($stmt->execute()) 
  {
    // Insert query was successful
    if ($stmt->rowCount() > 0) {
   
echo"
  
<div class='container'>


  
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' onclick='history.back()' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Note</h4>
        </div>
        <div class='modal-body'>
          <p style='color:Green'>Data is successfully added.</p>
        </div>
        <div class='modal-footer'>
          <button type='button' onclick='history.back()' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
      
    </div>
  </div>
  ";

  }
  }
    
  }

