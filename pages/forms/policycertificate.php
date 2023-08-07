<?php
session_start();

if(isset($_SESSION["id"])){
// Connect to the database using PDO
$host = 'localhost';
$dbname = 'jeudfra';
$username = 'root ';
$password = ' ';

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

  //on the second page this is the sql statement to retrieve my value

$sql3 = "SELECT * FROM clients WHERE Policy = :policy_number";
$stmt3 = $connection->prepare($sql3);
$stmt3->bindValue(':policy_number', $_POST['policy_number']);
$stmt3->execute();
$result3 = $stmt3->fetch(PDO::FETCH_ASSOC); 
  
//$sql3 = "SELECT * FROM clients  WHERE Policy = "" ;
//$stmt3 = $connection->prepare($sql3);
//$stmt3->execute();
//$result3 = $stmt3->fetch(PDO::FETCH_ASSOC);

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
$sql3 = "SELECT * FROM clients WHERE Policy = ?";
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
$sql4 = "SELECT * FROM spousedetails WHERE spousePolicy = ?";
$stmt4 = $connection->prepare($sql4);
$stmt4->execute([$myValue]);
$result4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);

// Query 5 - get additional benefits for policy MOE0011
$sql5 = "SELECT * FROM members_additional_benefits WHERE Policy_Number = ?";
$stmt5 = $connection->prepare($sql5);
$stmt5->execute([$myValue]);
$result5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);

// Query 6 - get beneficiaries for policy MOE0011
$sql6 = "SELECT * FROM beneficiaries WHERE Policy_number = ?";
$stmt6 = $connection->prepare($sql6);
$stmt6->execute([$myValue]);
$result6 = $stmt6->fetchAll(PDO::FETCH_ASSOC);

// Query 7 - get additional members for policy MOE0011
$sql7 = "SELECT * FROM additional_members WHERE Policy_Number = ?";
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
}else{
  header("Location: ../samples/login-2.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>Funeral Demo| Policy certificate</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
<div class="row">
<div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
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
<p> <?php foreach($result9 as $row){ echo $row['Contact_Number'];} ?><i class="fa fa-phone"></i></p>
<p>admin@funeraldemo.co.za</p>
  <p>Address: Riverside Office Park, <p>Dihlabakela Rd, Riverside,</p> Mbombela, 1200 <i class="fa fa-location-arrow"></i></p>
</div>
</div>
</div>
</div>
<div class="row">
<div class="receipt-header receipt-header-mid">
<div class="col-xs-8 col-sm-8 col-md-8 text-left">
<div class="receipt-right">
  
<?php foreach ($result3 as $rows) { ?>
<h5><?php echo $rows['Customer']?></h5>
<p><b>Mobile :  </b>  <?php echo $rows['Number']; ?></p>
<p><b>Email :</b> <?php echo $rows['email']?></p>
<p><b>Address :</b> <?php echo $rows['Address']?></p>
<p><b>Policy Number :  </b>  <?php echo $rows['Policy']; ?></p>
</div>
</div>
<div class="col-xs-4 col-sm-4 col-md-4">
<div class="receipt-left">
<!--<h3>Policy Number: <?php echo $rows['Policy']?></h3>-->
<?php } ?>
</div>
</div>
</div>
</div>
<div>

      <!--Spouse -->
      <?php
if (!empty($result4)) {
?>
<label style="display: block; font-weight: bold; color: grey; padding: 0%">Spouse Information</label>
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
  <?php
                    foreach ($result4 as $rows) {
                        ?>
    <tr>
      <td style="font-size: 10px"><b>Name(s):</b><?php echo $rows['spouse_Name'] ?></td>
      <td style="font-size: 10px"><b>Surname:</b><?php echo $rows['spouse_Surname'] ?></td>
      <td style="font-size: 10px"><b>ID:</b><?php echo $rows['spouse_ID']?></td>
      <td style="font-size: 10px"><b>Cell:</b><?php echo $rows['spouse_Number'] ?></td>
    </tr>
    <?php
                    }
                    ?>
  </tbody>
</table>
<?php
}
?>

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
      <td><?php echo $rows['ContactNo']?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<?php } ?>

<!-- Additional BENEFITS info -->
<?php if (!empty($result5)) { ?>
  <label style="display: block; font-weight: bold; color: grey">Additional Benefits Information</label>
  <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Benefit Name</th>
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
      
<label style="display: block; font-weight: bold; color: grey">Product Information</label>
<div style="display: flex;">
<div style="flex: 1; padding-right: 20px;">
  <?php
    foreach ($result8 as $rows) {
  ?>
  <p style="display: block;">Date: <?php echo date("m/d/Y"); ?><br>
  Policy Group:  <?php echo $rows['Group_name']?><br>
  Policy Name:  <?php echo $rows['Policy_Name']?><br>
  Amount per Month:  R<?php echo $rows['Amount']?><br>
    N Description:  <?php echo $rows['Description']?></p>
 
</div>
  <br>
  <div style="flex: 1;">
    
     <?php
    break;
    }
  ?>
  </div>
</div>


</div>
<div class="row">
<div class="receipt-header receipt-header-mid receipt-footer">
<div class="col-xs-8 col-sm-8 col-md-8 text-left">
<div class="receipt-right">
<p><b>Date :</b> 15 Aug 2016</p>
<h5 style="color: rgb(140, 140, 140);">Thank you for choosing us!</h5>
</div>
</div>
   <button type="button" class="btn btn-light" onclick="window.print()">Print</button>
  <button type="button" class="btn btn-light" >Download</button>
<div class="col-xs-4 col-sm-4 col-md-4">
<div class="receipt-left">
<h1>Stamp</h1>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>