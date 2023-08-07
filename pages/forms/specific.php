<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>Jeudfra | Invoicepage</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> 
  
  
  </head>
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
		
		#container {
			background-color: #dcdcdc;
		}
    </style>

<body>

<?php


$host = 'localhost';
$dbname = 'jeudfra';
$username = 'root ';
$password = ' ';


$conn = new mysqli($host, $username, $password, $dbname);


$query = mysqli_query($conn, "SELECT Contact_Number, Email, Business_Name, Address, Branch_Name, Name_of_Bank, Account_Holder, Account_Number FROM branch_details");
  
$array = mysqli_fetch_array($query);


// Bind result variables
//mysqli_stmt_bind_result($stmt1, $Business_Contact_Number, $Business_Email, $Business_Name, $Business_Address, $Branch_Name, $Business_Name_of_Bank, $Business_Account_Holder, $Business_Account_Number);


  
    
if($_GET['request']=='premiums'){
  
  
  
  
  $query = mysqli_query($conn, "select * from clients where Policy='$_GET[data]'");
  $row = mysqli_fetch_array($query);
  
  
  $isthe = mysqli_num_rows($query);
  
  $querys = mysqli_query($conn, "select * from premiums where Policy='$_GET[data]'");
  $rows = mysqli_fetch_array($querys);
  
    
  ?>

  
  
<div class='col-md-12' id='makepdf'>
<div class='row'>
<div class='receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3'>
<div class='row'>
<div class='receipt-header'>
<div class='col-xs-6 col-sm-6 col-md-6'>
<div class='receipt-left'>
<img class='img-responsive' alt='eKhonnector' src='logo/Eyomusa.png' style='width: 71px; border-radius: 43px;'>
</div>
</div>
<div class='col-xs-6 col-sm-6 col-md-6 text-right'>
<div class='receipt-right'>
<h5><?php echo $array['Business_Name']; ?></h5>
<p><?php echo $array['Contact_Number']; ?><i class='fa fa-phone'></i></p>
<p><a><?php echo $array['Email']; ?></a> <i class='fa fa-envelope-o'></i></p>
<p><?php echo $array['Address']; ?><i class='fa fa-location-arrow'></i></p>
</div>
</div>
</div>
</div>
<div class='row'>
<div class='receipt-header receipt-header-mid'>
<div class='col-xs-8 col-sm-8 col-md-8 text-left'>
<div class='receipt-right'>
<h5><?php echo $row['Customer']; ?></h5>
<p><b>Mobile : </b> <?php echo $row['Number']; ?> </b></p>
<input type='hidden' id='email' value=<?php echo $row['email'] ?> />
8
<p><b>Policy Number : </b> <?php echo $row['Policy'] ?> </p> 
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
<td class='col-md-9'>Monthly premuim for <?php echo $row['Group_Name']; ?> policy plan for <?php echo $rows['Plan'] ; ?> </td>
<td class='col-md-3'><i class='fa fa-inr'></i><?php echo $rows['monthly_premium'];?></td>
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
<strong><i class='fa fa-inr'></i><?php echo $rows['monthly_premium'];?> </strong>
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
<td class='text-left text-danger'><h2><strong><i class='fa fa-inr'></i> <?php echo $rows['monthly_premium'];?></strong></h2></td>
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
<td class='col-md-9'>Bank Name : <?php echo $array['Name_of_Bank']; ?> | Account Holder : <?php echo $array['Account_Holder']; ?> </td>
<td class='col-md-3'><i class='fa fa-inr'></i><?php echo $array['Account_Number']; ?></td>
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
  
    
  <br> <br> <br>
  
  
  
    <?php
  }




else if($_POST['request']=='credit sales'){
  
  
  
  $query = mysqli_query($conn, "select * from creditsales where Policy='$_POST[data]'");
  $row = mysqli_fetch_array($query);
  
  
  $isthe = mysqli_num_rows($query);
  
  $querys = mysqli_query($conn, "select * from creditsales where Policy='$_POST[data]'");
  $rows = mysqli_fetch_array($querys);
  
    
  ?>

  
  
<div class='col-md-12' id='makepdf'>
<div class='row'>
<div class='receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3'>
<div class='row'>
<div class='receipt-header'>
<div class='col-xs-6 col-sm-6 col-md-6'>
<div class='receipt-left'>
<img class='img-responsive' alt='eKhonnector' src='logo/ekhonnector.jpg' style='width: 71px; border-radius: 43px;'>
</div>
</div>
<div class='col-xs-6 col-sm-6 col-md-6 text-right'>
<div class='receipt-right'>
<h5><?php echo $array['Business_Name']; ?></h5>
<p><?php echo $array['Contact_Number']; ?><i class='fa fa-phone'></i></p>
<p><a><?php echo $array['Email']; ?></a> <i class='fa fa-envelope-o'></i></p>
<p><?php echo $array['Address']; ?><i class='fa fa-location-arrow'></i></p>
</div>
</div>
</div>
</div>
<div class='row'>
<div class='receipt-header receipt-header-mid'>
<div class='col-xs-8 col-sm-8 col-md-8 text-left'>
<div class='receipt-right'>
<h5><?php echo $row['Group_Name']; ?></h5>
<p><b>Mobile : </b> <?php echo $row['Number']; ?> </b></p>
<input type='hidden' id='email' value=<?php echo $row['email'] ?> />
<p><b>Email : </b> <a><?php echo $row['email'] ?></a></p>
<p><b>Policy Number : </b> <?php echo $row['Policy'] ?> </p> 
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
<td class='col-md-9'>Monthly premuim for <?php echo $row['Group_Name']; ?> policy plan for <?php echo $rows['Plan'] ; ?> </td>
<td class='col-md-3'><i class='fa fa-inr'></i><?php echo $rows['monthly_premium'];?></td>
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
<strong><i class='fa fa-inr'></i><?php echo $rows['monthly_premium'];?> </strong>
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
<td class='text-left text-danger'><h2><strong><i class='fa fa-inr'></i> <?php echo $rows['monthly_premium'];?></strong></h2></td>
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
<td class='col-md-9'>Bank Name : <?php echo $array['Name_of_Bank']; ?> | Account Holder : <?php echo $array['Account_Holder']; ?> </td>
<td class='col-md-3'><i class='fa fa-inr'></i><?php echo $array['Account_Number']; ?></td>
</tr>

<tr>

</tbody>
</table>
</div>

  
<div class='row'>
<div class='receipt-header receipt-header-mid receipt-footer'>
<div class='col-xs-8 col-sm-8 col-md-8 text-left'>
<div class='receipt-right'>
  <p>Date:  "$currentDate = date('Y-m-d'); echo $currentDate"</p>
<!--<p><b>Date : </b>" .date('Y/m/d'). "</p><br><br>-->
<h5 style='color: rgb(140, 140, 140);'>We appreciate you, enjoy the rest of your .</h5>
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
  
    
  <br> <br> <br>
  
  
  
  
  
    <?php
  }




else if($_POST['request']=='cash sales'){
  
  
  
  $query = mysqli_query($conn, "select * from cashsales where Policy='$_POST[data]'");
  $row = mysqli_fetch_array($query);
  
  
  $isthe = mysqli_num_rows($query);
  
  $querys = mysqli_query($conn, "select * from cashsales where Policy='$_POST[data]'");
  $rows = mysqli_fetch_array($querys);
  
    
  ?>

  
  
<div class='col-md-12' id='makepdf'>
<div class='row'>
<div class='receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3'>
<div class='row'>
<div class='receipt-header'>
<div class='col-xs-6 col-sm-6 col-md-6'>
<div class='receipt-left'>
<img class='img-responsive' alt='eKhonnector' src='logo/ekhonnector.jpg' style='width: 71px; border-radius: 43px;'>
</div>
</div>
<div class='col-xs-6 col-sm-6 col-md-6 text-right'>
<div class='receipt-right'>
<h5><?php echo $array['Business_Name']; ?></h5>
<p><?php echo $array['Contact_Number']; ?><i class='fa fa-phone'></i></p>
<p><a><?php echo $array['Email']; ?></a> <i class='fa fa-envelope-o'></i></p>
<p><?php echo $array['Address']; ?><i class='fa fa-location-arrow'></i></p>
</div>
</div>
</div>
</div>
<div class='row'>
<div class='receipt-header receipt-header-mid'>
<div class='col-xs-8 col-sm-8 col-md-8 text-left'>
<div class='receipt-right'>
<h5><?php echo $row['Group_Name']; ?></h5>
<p><b>Mobile : </b> <?php echo $row['Number']; ?> </b></p>
<input type='hidden' id='email' value=<?php echo $row['email'] ?> />
<p><b>Email : </b> <a><?php echo $row['email'] ?></a></p>
<p><b>Policy Number : </b> <?php echo $row['Policy'] ?> </p> 
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
<td class='col-md-9'>Monthly premuim for <?php echo $row['Group_Name']; ?> policy plan for <?php echo $rows['Plan'] ; ?> </td>
<td class='col-md-3'><i class='fa fa-inr'></i><?php echo $rows['monthly_premium'];?></td>
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
<strong><i class='fa fa-inr'></i><?php echo $rows['monthly_premium'];?> </strong>
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
<td class='text-left text-danger'><h2><strong><i class='fa fa-inr'></i> <?php echo $rows['monthly_premium'];?></strong></h2></td>
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
<td class='col-md-9'>Bank Name : <?php echo $array['Name_of_Bank']; ?> | Account Holder : <?php echo $array['Account_Holder']; ?> </td>
<td class='col-md-3'><i class='fa fa-inr'></i><?php echo $array['Account_Number']; ?></td>
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
  
    
  <br> <br> <br>
  
  
  
  
    <?php
  }




else if($_POST['request']=='quotation'){
  
  
  
  $query = mysqli_query($conn, "select * from quotation where Policy='$_POST[data]'");
  $row = mysqli_fetch_array($query);
  
  
  $isthe = mysqli_num_rows($query);
  
  $querys = mysqli_query($conn, "select * from quotation where Policy='$_POST[data]'");
  $rows = mysqli_fetch_array($querys);
  
    
  ?>

  
  
<div class='col-md-12' id='makepdf'>
<div class='row'>
<div class='receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3'>
<div class='row'>
<div class='receipt-header'>
<div class='col-xs-6 col-sm-6 col-md-6'>
<div class='receipt-left'>
<img class='img-responsive' alt='eKhonnector' src='logo/ekhonnector.jpg' style='width: 71px; border-radius: 43px;'>
</div>
</div>
<div class='col-xs-6 col-sm-6 col-md-6 text-right'>
<div class='receipt-right'>
<h5><?php echo $array['Business_Name']; ?></h5>
<p><?php echo $array['Contact_Number']; ?><i class='fa fa-phone'></i></p>
<p><a><?php echo $array['Email']; ?></a> <i class='fa fa-envelope-o'></i></p>
<p><?php echo $array['Address']; ?><i class='fa fa-location-arrow'></i></p>
</div>
</div>
</div>
</div>
<div class='row'>
<div class='receipt-header receipt-header-mid'>
<div class='col-xs-8 col-sm-8 col-md-8 text-left'>
<div class='receipt-right'>
<h5><?php echo $row['Group_Name']; ?></h5>
<p><b>Mobile : </b> <?php echo $row['Number']; ?> </b></p>
<input type='hidden' id='email' value=<?php echo $row['email'] ?> />
<p><b>Email : </b> <a><?php echo $row['email'] ?></a></p>
<p><b>Policy Number : </b> <?php echo $row['Policy'] ?> </p> 
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
<td class='col-md-9'>Monthly premuim for <?php echo $row['Group_Name']; ?> policy plan for <?php echo $rows['Plan'] ; ?> </td>
<td class='col-md-3'><i class='fa fa-inr'></i><?php echo $rows['monthly_premium'];?></td>
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
<strong><i class='fa fa-inr'></i><?php echo $rows['monthly_premium'];?> </strong>
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
<td class='text-left text-danger'><h2><strong><i class='fa fa-inr'></i> <?php echo $rows['monthly_premium'];?></strong></h2></td>
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
<td class='col-md-9'>Bank Name : <?php echo $array['Name_of_Bank']; ?> | Account Holder : <?php echo $array['Account_Holder']; ?> </td>
<td class='col-md-3'><i class='fa fa-inr'></i><?php echo $array['Account_Number']; ?></td>
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
  
    
  <br> <br> <br>
  
  
  
  



  <?php
  }

  ?>  
  
  
  
  <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
