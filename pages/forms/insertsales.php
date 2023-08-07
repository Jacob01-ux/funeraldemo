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


  
<style type="text/css">body
  {
  background:#eee;
  margin-top:20px;
  }
  .text-danger strong {
        	color: #9f181c;
		}
		.receipt-main {
			background: #ffffff none repeat scroll 0 0;
			border-bottom: 12px solid #333333;
			border-top: 12px solid #9f181c;
			margin-top: 50px;
			margin-bottom: 50px;
			padding: 40px 30px !important;
			position: relative;
			box-shadow: 0 1px 21px #acacac;
			color: #333333;
			font-family: open sans;
		}
		.receipt-main p {
			color: #333333;
			font-family: open sans;
			line-height: 1.42857;
		}
		.receipt-footer h1 {
			font-size: 15px;
			font-weight: 400 !important;
			margin: 0 !important;
		}
		.receipt-main::after {
			background: #414143 none repeat scroll 0 0;
			content: "";
			height: 5px;
			left: 0;
			position: absolute;
			right: 0;
			top: -13px;
		}
		.receipt-main thead {
			background: #414143 none repeat scroll 0 0;
		}
		.receipt-main thead th {
			color:#fff;
		}
		.receipt-right h5 {
			font-size: 16px;
			font-weight: bold;
			margin: 0 0 7px 0;
		}
		.receipt-right p {
			font-size: 12px;
			margin: 0px;
		}
		.receipt-right p i {
			text-align: center;
			width: 18px;
		}
		.receipt-main td {
			padding: 9px 20px !important;
		}
		.receipt-main th {
			padding: 13px 20px !important;
		}
		.receipt-main td {
			font-size: 13px;
			font-weight: initial !important;
		}
		.receipt-main td p:last-child {
			margin: 0;
			padding: 0;
		}	
		.receipt-main td h2 {
			font-size: 20px;
			font-weight: 900;
			margin: 0;
			text-transform: uppercase;
		}
		.receipt-header-mid .receipt-left h1 {
			font-weight: 100;
			margin: 34px 0 0;
			text-align: right;
			text-transform: uppercase;
		}
		.receipt-header-mid {
			margin: 24px 0;
			overflow: hidden;
		}
		.container {
			position: fixed;
			top: 20%;
			left: 28%;
			margin-top: -65px;
			margin-left: -100px;
			border-radius: 7px;
		}

		.card {
			box-sizing: content-box;
			width: 700px;
			height: 150px;
			padding: 30px;
			border: 1px solid black;
			font-style: sans-serif;
			background-color: #f0f0f0;
		}
  
/*** Button ***/
.btn {
    transition: .5s;
    font-weight: 500;
}

.btn-primary,
.btn-outline-primary:hover {
    color: #348E38;
}

.btn-square {
    width: 38px;
    height: 38px;
}

.btn-sm-square {
    width: 32px;
    height: 32px;
}

.btn-lg-square {
    width: 48px;
    height: 48px;
}

.btn-square,
.btn-sm-square,
.btn-lg-square {
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: normal;
}


		#button {
			background-color: #348E38;
			border-radius: 5px;
			margin-left: 650px;
			margin-bottom: 5px;
			color: white;
		}
		#container {
			background-color: #dcdcdc;
		}
  /* Set the page size and margins for A4 paper */

    </style>

<?php
session_start();
$PolicyNumber=$_POST['PolicyNumber'];
$Name=$_POST['Name'];
$Contact=$_POST['Contact'];
$Address=$_POST['Address'];
$Product_Name= $_POST['Product_Name'];
//$Measurement= $_POST['Measurement'];

$Quality= $_POST['Quality'];
$unit_price= $_POST['Price'];
$total_cost= $_POST['Total_cost'];
$admin= $_POST['admin'];
$Description= $_POST['Description']; 


if($Product_Name==""){


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

/*else if($Measurement==""){

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
}*/

else if($Quality==""){

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
else if($unit_price==""){

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

else if($total_cost==""){

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
  $stmt = $conn->prepare("INSERT INTO sale (Product_Name, Quantity, Price, Total_cost, PolicyNumber, Name, Contact, Address, Description, _By) VALUES (:Product_Name, :Quality, :Price, :Total_cost, :PolicyNumber, :Name, :Contact, :Address, :Description, :admin)");
  $stmt->bindParam(':Product_Name', $Product_Name);
 // $stmt->bindParam(':Measurement', $Measurement);
  $stmt->bindParam(':Quality', $Quality);
  $stmt->bindParam(':Price', $Price);
  $stmt->bindParam(':Total_cost', $Total_cost);
  $stmt->bindParam(':PolicyNumber', $PolicyNumber);
  $stmt->bindParam(':Name', $Name);
  $stmt->bindParam(':Contact', $Contact);
  $stmt->bindParam(':Address', $Address);
  $stmt->bindParam(':Description', $Description);
  $stmt->bindParam(':admin', $admin);
  
  
 
  //now we sanitize the input
  // Sanitize input using filter_var()
$Product_Name = filter_var($_POST['Product_Name'], FILTER_SANITIZE_STRING);
//$Measurement = filter_var($_POST['Measurement'], FILTER_SANITIZE_STRING);
$Quality = filter_var($_POST['Quality'], FILTER_SANITIZE_STRING);
$Price= filter_var($_POST['Price'], FILTER_SANITIZE_STRING);
$Total_cost = filter_var($_POST['Total_cost'], FILTER_SANITIZE_STRING);
$PolicyNumber = filter_var($_POST['PolicyNumber'], FILTER_SANITIZE_STRING);
 $Name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);  
 $Contact = filter_var($_POST['Contact'], FILTER_SANITIZE_STRING);
 $Address = filter_var($_POST['Address'], FILTER_SANITIZE_STRING);
 $Description = filter_var($_POST['Description'], FILTER_SANITIZE_STRING);
   $admin = filter_var($_POST['admin'], FILTER_SANITIZE_STRING);
 
	//checking to see if the data was inserted
  if ($stmt->execute()) 
  {
    // Insert query was successful
    if ($stmt->rowCount() > 0) {

      $conn1 = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn1) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare a statement to fetch data from the database
$stmt1 = mysqli_prepare($conn1, "SELECT Contact_Number, Email, Business_Name, Address, Branch_Name, Name_of_Bank, Account_Holder, Account_Number FROM branch_details");
// Execute the prepared statement
mysqli_stmt_execute($stmt1);

// Bind result variables
mysqli_stmt_bind_result($stmt1, $Business_Contact_Number, $Business_Email, $Business_Name, $Business_Address, $Branch_Name, $Business_Name_of_Bank, $Business_Account_Holder, $Business_Account_Number);

// Fetch the results
while (mysqli_stmt_fetch($stmt1)) {

}

// Close the statement and database connection
mysqli_stmt_close($stmt1);
mysqli_close($conn1);



///CODE FOR GETTING CLIENT DETAILS
$conn2 = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn2) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare a statement to fetch data from the database
      $policy= $_POST['PolicyNumber'];
$stmt2 = mysqli_prepare($conn2, "SELECT Number, email, Address FROM clients Where Policy='" . $policy . "'");

// Execute the prepared statement
mysqli_stmt_execute($stmt2);

// Bind result variables
mysqli_stmt_bind_result($stmt2, $Client_Contact_Number, $Client_Email, $Client_Address);

// Fetch the results



echo" 




<body>
  
  
<div class='col-md-12' id='makepdf'>
<div class='row'>
<div class='receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3'>
<div class='row'>
<div class='receipt-header'>
<div class='col-xs-6 col-sm-6 col-md-6'>
<div class='receipt-left'>
<img class='img-responsive' alt='eKhonnector' src='Eyomusa.png' style='width: 71px; border-radius: 43px;'>
</div>
</div>
<div class='col-xs-6 col-sm-6 col-md-6 text-right'>
<div class='receipt-right'>
<h5> $Business_Name</h5>
<p> $Business_Contact_Number<i class='fa fa-phone'></i></p>
<p><a> $Business_Email</a> <i class='fa fa-envelope-o'></i></p>
<p> $Business_Address<i class='fa fa-location-arrow'></i></p>
</div>
</div>
</div>
</div>
<div class='row'>
<div class='receipt-header receipt-header-mid'>
<div class='col-xs-8 col-sm-8 col-md-8 text-left'>
<div class='receipt-right'>
<h5><?php echo  ?></h5>
<p><b>Name : </b>  $Name</b></p>
<p><b>Mobile : </b>  $Contact</b></p>
<p><b>Policy Number : </b>  $PolicyNumber</p> 
<p><b>Product : <b>$Product_Name</b></p>
</div>
</div>
<div class='col-xs-4 col-sm-4 col-md-4'>
<div class='receipt-left'>
<h2>INVOICE </h2>
</div>

</div>
</div>
</div>
<div>
<table class='table table-bordered'>
<thead>
<tr>
<th>Description</th>
<th>Amount</th>
</tr>
</thead>
<tbody>
<tr>
<td class='col-md-9'> $Description </td>
<td class='col-md-3'><i class='fa fa-inr'></i><?php echo $total_cost; ?></td>
</tr>
<tr>
<td class='text-left'>

    <p>
<strong>Total cost: </strong>
</p>
</td>
<td>

<p>


  <p>
<strong><i class='fa fa-inr'></i> $total_cost </strong>
</p>
<p>
<strong><i class='fa fa-inr'></i></strong>
</p>
<p>
<strong><i class='fa fa-inr'></i></strong>
</p>
</td>
</tr>
<tr>
<td class='text-right'><h2><strong>Total: </strong></h2></td>
<td class='text-left text-danger'><h2><strong><i class='fa fa-inr'></i> $total_cost</strong></h2></td>
</tr>
  <tr>

</tr>
</tbody>
</table>
<table class='table table-bordered'>
<thead>
<tr>
<th>Banking Details</th>
<th>Acc Number</th>
</tr>
</thead>
<tbody>
<tr>
<td class='col-md-9'>Bank Name : $Business_Name_of_Bank | Account Holder :  $Business_Account_Holder </td>
<td class='col-md-3'><i class='fa fa-inr'></i>$Business_Account_Number</td>
</tr>

<tr>

</tbody>
</table>
</div>

  
<div class='row'>
<div class='receipt-header receipt-header-mid receipt-footer'>
<div class='col-xs-8 col-sm-8 col-md-8 text-left'>
<div class='receipt-right'>
<p><b>Date : </b>" .date('Y/m/d'). "</p><br><br>
<p><b>Assisted by : </b> $admin </p><br><br>
<h5 style='color: rgb(140, 140, 140);'>We appreciate you, enjoy the rest of your day.</h5>
</div>
</div>
<div class='col-xs-4 col-sm-4 col-md-4'>
<div class='receipt-left'>
<h1>Stamp</h1>

</form>
  
</div>
</div>
  </div>
</div>
</div>
</div>
</div>
  
    <button id='button' type='submit' class='btn btn-primary'value='Submit'>Download</button>
  <button  type='button' class='btn btn-light' onclick='window.print()' value='Submit'>Print</button>
  
    <button onclick='email()' type='button'  class='btn btn-light' value='Clear'>Email</button>
  <br> <br> <br>
  ";
  
  
  

  }
  }
    
  }

echo"<div id='result'></div>";
?>

<script>
  
   function email(){
  
  	$.ajax({
			url:"premium_email.php",
			method:"POST",
			data:{email:$('#email').val()},
			success:function(data)
			{
				$('#result').html(data);
			}
			});
    
    
  }
  
   function reload(){

location.reload();
}
</script>

