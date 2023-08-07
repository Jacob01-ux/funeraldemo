<?php


session_start();

if(isset($_SESSION["id"])){
// Connect to the database using PDO
$host = 'localhost';
$dbname = 'ekhonnec_JeudfraBS';
$username = 'ekhonnec_JeudfraBS';
$password = 'JeudfraBS33@';

$dsn = "mysql:host=$host;dbname=$dbname";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $connection = new PDO($dsn, $username, $password, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = $_GET["_id"];

$sql0 = "SELECT * 
         FROM termsandConditions
         WHERE id='$id'";

$result0 = mysqli_query($conn, $sql0);

$member = $result0->fetch_assoc();

$category = $member["category"];
$Surname = $member["description"];

$sql = "SELECT * FROM accounts
WHERE id = '{$_SESSION["id"]}'";

$result = $conn->query($sql);

$u = $result->fetch_assoc();
//retrieving policy number from new clients

$sql1 = "SELECT * FROM policies";
$stmt1 = $connection->prepare($sql1);
$stmt1->execute();
$result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

$sql10= "SELECT * FROM branch_details";
$stmt10 = $connection->prepare($sql10);
$stmt10->execute();
$result10 = $stmt10->fetchAll(PDO::FETCH_ASSOC);

}else{
  header("Location: ../samples/login-2.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Funeral Demo | T&Cs</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
  $(function(){
	$('#tablee').load("table.php");
  })
  $(function(){
	$('#table2').load("table_.php");
  })
</script>
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    	body{
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
		/* .receipt-main td {
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
		} */
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
		
		#container {
			background-color: #dcdcdc;
		}
    </style>
</head>
<body>
<div class="col-md-12">
<div class="row" >
<div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3" id="print-certificate">
<div class="row">
<div class="receipt-header">
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="receipt-left">
<img class="img-responsive" alt="iamgurdeeposahan" src="download.png" style="width: 91px; border-radius: 43px;">
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6 text-right">
<div class="receipt-right">
<h5>Terms And Conditions</h5>
<p>+27 729 4761 67</i></p>
<p>admin@funeraldemo.co.za</p>
  <p>Address: Riverside Office Park, <p>Dihlabakela Rd, Riverside,</p> Mbombela, 1200 <i class="fa fa-location-arrow"></i></p>
</div>
</div>
</div>
</div>

<div>
	<label style="display: block; font-weight: bold; color: grey; text-align: center; text-align: center; padding:1%">Terms And Conditions for <?= htmlspecialchars($member["category"]) ?> plan.</label>
<!--Main Member and spouse info -->
<table class="table" style="margin-bottom: -1.5em;  margin-top: 0em;">
	<!-- <thead class="thead-light" style="background-color: white;">
	 <tr>
		<th scope="col" style="color:grey">Main Member Information</th>
		<th scope="col" style="color:grey; text-align: right;">Spouse details</th>
	  </tr> 
	</thead> -->
	<tbody>
	  <tr>
		<td style="font-size: 10px">
        <?= htmlspecialchars($member["description"]) ?>
		</td>
	  </tr>
	</tbody>
  </table>
<br/>

</div>
<div class="row">
<div class="receipt-header receipt-header-mid receipt-footer">
<div class="col-xs-8 col-sm-8 col-md-8 text-left">
<div class="receipt-right">
<p><b>Date :</b> <?php echo date("m/d/Y"); ?></p>
<h5 style="color: rgb(140, 140, 140);">Thank you for choosing us!</h5>
</div>
</div>

<div class="col-xs-4 col-sm-4 col-md-4">
<div class="receipt-left">

</div>
</div>
</div>
</div>
</div>
</div>
<div class="mt-3 text-center">
<button type="button" id="downloadcerticate"  onclick="document.location='termcondition.php'" style="border: 2px solid black; background-color: white; color: black;" class="btn btn-light">Cancel</button>
  <button type="button" id="printcerticate" onclick="printcerticate()" class="btn btn-primary mr-2">Print T&Cs</button>
  <button type="button" id="downloadcerticate"  onclick="down()" style="border: 2px solid black; background-color: white; color: black;" class="btn btn-light">Download</button>
</div>
</div>

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
function printcerticate() {
    var printContents = document.getElementById("print-certificate").innerHTML;
  var originalContents = document.body.innerHTML;
  document.body.innerHTML = printContents;
  window.print();
  document.body.innerHTML = originalContents;
}
function downloadcerticate() {
   alert("workin")
}
window.jsPDF = window.jspdf.jsPDF;
var docPDF = new jsPDF();
function down(){
var elementHTML = document.querySelector("#print-certificate");
docPDF.html(elementHTML, {
 callback: function(docPDF) {
  docPDF.save('policy-certificate.pdf');
 },
 x: 15,
 y: 15,
 width: 170,
 windowWidth: 650
});
}
</script>
</body>
</html>