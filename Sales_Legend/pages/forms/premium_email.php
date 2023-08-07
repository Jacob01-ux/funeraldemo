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

$email= $_POST['email'];

  


if($email==""){


echo"
  
<div class='container'>


  
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' onclick='reload()' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Note</h4>
        </div>
        <div class='modal-body'>
          <p style='color:red'>Complete filling the form.</p>
        </div>
        <div class='modal-footer'>
          <button type='button' onclick='reload()' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
      
    </div>
  </div>
  ";
}


else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){


echo"
  
<div class='container'>


  
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' onclick='reload()' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Note</h4>
        </div>
        <div class='modal-body'>
          <p style='color:red'>Invalid email formart.</p>
        </div>
        <div class='modal-footer'>
          <button type='button' onclick='reload()' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
      
    </div>
  </div>
  ";
}
else{
$to_email = $email;
$subject = "Test email";
$body = "This is a test email.";

$headers = "From: sender@example.com\r\n";
$headers .= "Reply-To: sender@example.com\r\n";
$headers .= "Content-Type: text/html\r\n";

if (mail($to_email, $subject, $body, $headers)) {
    echo "
    

    
<div class='container'>


  
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' onclick='reload()' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Note</h4>
        </div>
        <div class='modal-body'>
          <p style='color:green'>Email sent successfully to $to_email.</p>
        </div>
        <div class='modal-footer'>
          <button type='button' onclick='reload()' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
      
    </div>
  </div>
    
    
    
    ";
} else {
    echo "
    
    
    
    
    
    

    
<div class='container'>


  
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' onclick='reload()' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Note</h4>
        </div>
        <div class='modal-body'>
          <p style='color:red'>Failed to send email, please try again later</p>
        </div>
        <div class='modal-footer'>
          <button type='button' onclick='reload()' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
      
    </div>
  </div>
    
    
    
    
    
    ";
}



}
?>

<script>
  
  function reload(){

location.reload();
}
  
  </script>

