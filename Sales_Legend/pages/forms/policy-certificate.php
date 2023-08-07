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
	
	$sql = "SELECT * FROM accounts
	WHERE id = '{$_SESSION["id"]}'";
	
	$result = $conn->query($sql);
	
	$u = $result->fetch_assoc();

	$sql1 = "SELECT * FROM incoming_clients
	WHERE Policy = '{$_SESSION["my_viriable"]}'";
	
	$result = $conn->query($sql1);
	
	$c = $result->fetch_assoc();

	$sql2 = "SELECT * FROM incoming_spousedetails
	WHERE Policy = '{$_SESSION["my_viriable"]}'";
	
	$result = $conn->query($sql2);
	
	$s = $result->fetch_assoc();

     
     
	
//$query = "SELECT * FROM company_keys WHERE c_key = '$company_key'";
$sql3 = "SELECT Policy FROM incoming_clients WHERE Policy = :my_viriable";
$stmt3 = $connection->prepare($sql3);
$stmt3->bindParam(':my_viriable', $_SESSION['my_viriable']);
$stmt3->execute();
$result3 = $stmt3->fetch(PDO::FETCH_ASSOC);

// Check if the query returned a row
if ($result3) {
    // Get the Policy value of the last row
    $myValue = $result3['Policy'];
} else {
    // Handle the case where no rows were returned
    $myValue = null; // Or set it to some default value
}

	//retrieving policy number from new clients
	
	
	// Query 1 - get all policies
	$sql1 = "SELECT * FROM policies";
	$stmt1 = $connection->prepare($sql1);
	$stmt1->execute();
	$result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
	
	
	// Query 2 - get policy count
	$sql2 = "SELECT COUNT(*) AS count FROM policies";
	$stmt2 = $connection->prepare($sql2);
	$stmt2->execute();
	$result2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	$count = $result2['count'];
	
	// Query 3 - get clients with policy MOE0011
	$sql3 = "SELECT * FROM incoming_clients WHERE Policy = ?";
	$stmt3 = $connection->prepare($sql3);
	$stmt3->execute([$myValue]);
	$result3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
	$polName = "";
	$groName = "";
	foreach ($result3 as $rows) {
		$polName = $rows['Package'];
		$groName = $rows['Group_Name'];
	}
	
	// Query 4 - get spouse details for policy MOE0011
	$sql4 = "SELECT * FROM incoming_spouse WHERE Policy = ?";
	$stmt4 = $connection->prepare($sql4);
	$stmt4->execute([$myValue]);
	$result4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
	
	// Query 5 - get additional benefits for policy MOE0011
	$sql5 = "SELECT * FROM incoming_members_additional_benefits WHERE Policy_Number = ?";
	$stmt5 = $connection->prepare($sql5);
	$stmt5->execute([$myValue]);
	$result5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);
	
	// Query 6 - get beneficiaries for policy MOE0011
	$sql6 = "SELECT * FROM incoming_beneficiaries WHERE Policy_number = ?";
	$stmt6 = $connection->prepare($sql6);
	$stmt6->execute([$myValue]);
	$result6 = $stmt6->fetchAll(PDO::FETCH_ASSOC);
	
	// Query 7 - get additional members for policy MOE0011
	$sql7 = "SELECT * FROM incoming_additional_members WHERE Policy_Number = ?";
	$stmt7 = $connection->prepare($sql7);
	$stmt7->execute([$myValue]);
	$result7 = $stmt7->fetchAll(PDO::FETCH_ASSOC);
	
	// Query 8 - get policy by policy name and group name
	$sql8 = "SELECT * FROM policies WHERE Policy_Name = ? AND Group_name = ?";
	$stmt8 = $connection->prepare($sql8);
	$stmt8->execute([$polName, $groName]);
	$result8 = $stmt8->fetchAll(PDO::FETCH_ASSOC);
	
	// Query 9 - get all branch details
	$sql9 = "SELECT * FROM branch_details";
	$stmt9 = $connection->prepare($sql9);
	$stmt9->execute();
	$result9 = $stmt9->fetchAll(PDO::FETCH_ASSOC);
	
	// Query 10 - get all branch details (duplicate)
	$sql10= "SELECT * FROM branch_details";
	$stmt10 = $connection->prepare($sql10);
	$stmt10->execute();
	$result10 = $stmt10->fetchAll(PDO::FETCH_ASSOC);
    $pno = 'FD001';
	$_SESSION['my_viriable'] = $myValue;
	}else{
	  header("Location: ../samples/login-2.php");
	}
	?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Funeral Demo | Policy certicate</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
  $(function() {
    var policyNumber = "<?php echo $_POST['PolicyNumber']; ?>";
    $.ajax({
      url: "table.php",
      type: "POST",
      data: { policyNumber: policyNumber },
      success: function(response) {
        $('#tablee').html(response); // Assuming the PHP script returns HTML content
      },
      error: function(xhr, status, error) {
        console.error(error); // Handle errors if any
      }
    });

    $.ajax({
      url: "table_.php",
      type: "POST",
      data: { policyNumber: policyNumber },
      success: function(response) {
        $('#table2').html(response); // Assuming the PHP script returns HTML content
      },
      error: function(xhr, status, error) {
        console.error(error); // Handle errors if any
      }
    });
  });
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
<img class="img-responsive" alt="iamgurdeeposahan" src="Eyomusa.png" style="width: 91px; border-radius: 43px;">
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6 text-right">
<div class="receipt-right">
<h5>POLICY CERTIFICATE</h5>

  
  <?php
// Database connection
	$host = 'localhost';
$dbname = 'ekhonnec_JeudfraBS';
$username = 'ekhonnec_JeudfraBS';
$password = 'JeudfraBS33@';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to retrieve data from branch_details table
    $query = "SELECT Branch_Name, Email, Address, Contact_Number FROM branch_details";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    // Fetch data and format it
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       echo '<p style="margin-bottom: 0em; margin-top: 1em;">' . $row['Address'] . '</p>';
        echo '<p style="margin-bottom: -1.5em; margin-top: 0em;">' . $row['Contact_Number'] . '</p>';
        echo '<p style="margin-bottom: 0em; margin-top: 1em;">' . $row['Email'] . '</p>';
       echo '<p style="margin-bottom: -1.5em; margin-top: 0em;">' . $row['Branch_Name'] . '</p>';
    }
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>

  
  
</div>
</div>
</div>
</div>

<div>
	<br><br><br><label style="display: block; font-weight: bold; color: grey; text-align: center; text-align: center; padding:1%">POLICY-NUMBER: <?= htmlspecialchars($c["Policy"]) ?></label>
<!--Main Member and spouse info -->
<table class="table" style="margin-bottom: -1.5em;  margin-top: 0em;">
	<thead class="thead-light" style="background-color: white;">
	  <tr>
		<th scope="col" style="color:grey">Main Member Information</th>
		<th scope="col" style="color:grey; text-align: right;">Spouse details</th>
	  </tr>
	</thead>
	<tbody>
	  <tr>
		<td style="font-size: 10px">
			<h5 style="margin-bottom: 0em;  margin-top: 1em;"><b><?= htmlspecialchars($c["Customer"]) ?></h5>
			<p style="margin-bottom: -1.5em;  margin-top: 0em;"><b>Mobile : <?= htmlspecialchars($c["Number"]) ?></p><br/>
			<p style="margin-bottom: -1.5em;  margin-top: 0em;"><b>ID :<?= htmlspecialchars($c["_ID"]) ?></p><br/> 
			<p style="margin-bottom: -1.5em;  margin-top: 0em;"><b>Email :<?= htmlspecialchars($c["email"]) ?></p><br/>
			<p style="margin-bottom: -1.5em;  margin-top: 0em;"><b>Address :<?= htmlspecialchars($c["Address"]) ?></p><br/> 
              <p style="margin-bottom: -1.5em;  margin-top: 0em;"><b>Activation Date :<?= htmlspecialchars($c["Activation_date"]) ?></p><br/> 
               
		</td>
		<?php if (!empty($result4)) {?>
		<td style="font-size: 10px; text-align: right;">
		<?php
                    foreach ($result4 as $rows) {
                        ?>
			<h5 style="margin-bottom: 0em;  margin-top: 1em;"><b><?php echo $rows['spouse_Name']?> <?php echo $rows['spouse_Surname']?></h5>
			<p style="margin-bottom: -1.5em;  margin-top: 0em;"><b>Mobile: <?php echo $rows['spouse_Number']?></p><br/> 
			<p style="margin-bottom: -1.5em;  margin-top: 0em;"><b>ID:</b><?php echo $rows['spouse_ID']?></p><br/> 
			<?php
                    }
                    ?>
		</td>
		<?php
}
?>
	  </tr>
	</tbody>
  </table>
<br/>
<!-- Dependent info -->
<?php if (!empty($result6)) { ?>  
  <label style="display: block; font-weight: bold; color: grey">Dependent Members Information</label>
  <table class="table">
  <thead class="thead-light">
    <tr >
      <th scope="col">Name(s)</th>
      <th scope="col">Surname</th>
      <th scope="col">ID</th>
      <th scope="col">Relationship</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($result6 as $rows) { ?>
    <tr>
    <td><?php echo $rows['Name']?></td>
      <td><?php echo $rows['surname']?></td>
      <td><?php echo $rows['_ID']?></td>
      <td><?php echo $rows['Relationship']?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<?php } ?>

<!-- Extended info -->
<?php if (!empty($result7)) { ?>
  <label style="display: block; font-weight: bold; color: grey">Extended Members Information</label>
  <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Name(s)</th>
      <th scope="col">Surname</th>
      <th scope="col">ID</th>
      <th scope="col">Cell</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($result7 as $rows) { ?>
    <tr>
    <td><?php echo $rows['Name']?></td>
      <td><?php echo $rows['Surname']?></td>
      <td><?php echo $rows['_ID']?></td>
      <td><?php echo $rows['Relationship']?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<?php } ?>

<!-- additional Products -->
<?php if (!empty($result5)) { ?>
<label style="display: block; font-weight: bold; color: grey; text-align: center;">Additional Product Information</label>
<table class="table">
    <thead class="thead-light">
      <tr style="font-size: smaller;">
        <th scope="col">Product name</th>
        <th scope="col">Description</th>
      </tr>
    </thead>
    <tbody>
	<?php foreach ($result5 as $rows) { ?>
    <tr>
      <td><?php echo $rows['benefit_name']?></td>
      <td><?php echo $rows['description']?></td>
    </tr>
    <?php } ?>
    </tbody>
  </table>
  <?php } ?>
<!-- PRODUCT INFORMATION --> 
<label style="display: block; font-weight: bold; color: grey; text-align: center;">Product Information</label>
   <table class="table">
  <!-- <thead class="thead-light" >
    <tr>
      <th scope="col" >Name(s)</th>
      <th scope="col">Surname</th>
      <th scope="col">ID</th>
      <th scope="col">Cell</th>
    </tr>
  </thead> -->
  <tbody>
    <tr>
	<?php foreach ($result8 as $rows) {?>
      <td style="font-size: 10px"><b>Policy Group: <?php echo $rows['Group_name']?> </td>
      <td style="font-size: 10px"><b>Policy Name:</b><?php echo $rows['Policy_Name']?></td>
      <td style="font-size: 10px"><b>Monthly Premium: </b> R<?php echo $rows['Amount']?></td>
      
      <td style="font-size: 10px"><b>Description:</b><?php echo $rows['Description']?></td>
	  <?php break; } ?>
    </tr>
  </tbody>
</table>



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
  <button type="button" id="printcerticate" onclick="printcerticate()" class="btn btn-primary mr-2">Print certicate</button>
  <button type="button" id="downloadcerticate"  onclick="down()" class="btn btn-light">Download</button>
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