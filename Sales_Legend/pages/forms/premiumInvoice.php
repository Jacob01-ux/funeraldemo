<?php
$month= $_POST['month'];
echo $month;
$year= $_POST['year'];
$policy= $_POST['PolicyNumber'];
echo $policy;
$client= $_POST['Name_and_Surname'];
$client_id= $_POST['ID'];
$plan= $_POST['Policy_Plan'];
$monthly_premium= $_POST['monthly_premium'];
$date= $_POST['pr_date'];
//we need code to get the name of the person logged into the system
$_On = date("Y-m-d H:i:s");
//we need code to get the time when the user saved the information
$_By = "";
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  	<!-- html2pdf CDN-->
	<script src=
"https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js">
	</script>
<meta charset="utf-8">


<title>Premuim Invoice</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
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
    </style>
   
<body>
  
  
<div class="col-md-12" id="makepdf">
<div class="row">
<div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
<div class="row">
<div class="receipt-header">
<div class="col-xs-6 col-sm-6 col-md-6">
<div class="receipt-left">
<img class="img-responsive" alt="iamgurdeeposahan" src="https://bootdey.com/img/Content/avatar/avatar6.png" style="width: 71px; border-radius: 43px;">
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6 text-right">
<div class="receipt-right">
<h5>Company Name.</h5>
<p>+1 3649-6589 <i class="fa fa-phone"></i></p>
<p><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="20434f4d50414e5960474d41494c0e434f4d">[email&#160;protected]</a> <i class="fa fa-envelope-o"></i></p>
<p>USA <i class="fa fa-location-arrow"></i></p>
</div>
</div>
</div>
</div>
<div class="row">
<div class="receipt-header receipt-header-mid">
<div class="col-xs-8 col-sm-8 col-md-8 text-left">
<div class="receipt-right">
<h5>Customer Name </h5>
<p><b>Mobile :</b> +1 12345-4569</p>
<p><b>Email :</b> <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6704121413080a021527000a060e0b4904080a">[email&#160;protected]</a></p>
<p><b>Address :</b> New York, USA</p>
</div>
</div>
<div class="col-xs-4 col-sm-4 col-md-4">
<div class="receipt-left">
<h3>INVOICE # 102</h3>
</div>
</div>
</div>
</div>
<div>
<table class="table table-bordered">
<thead>
<tr>
<th>Description</th>
<th>Amount</th>
</tr>
</thead>
<tbody>
 <tr>
<td class="col-md-9">Payment for August 2016</td>
<td class="col-md-3"><i class="fa fa-inr"></i> 15,000/-</td>
</tr>
<tr>
<td class="col-md-9">Payment for June 2016</td>
<td class="col-md-3"><i class="fa fa-inr"></i> 6,00/-</td>
</tr>
<tr>
<td class="col-md-9">Payment for May 2016</td>
<td class="col-md-3"><i class="fa fa-inr"></i> 35,00/-</td>
</tr>
<tr>
<td class="text-right">
<p>
<strong>Total Amount: </strong>
</p>
<p>
<strong>Late Fees: </strong>
</p>
<p>
<strong>Payable Amount: </strong>
</p>
<p>
<strong>Balance Due: </strong>
</p>
</td>
<td>
<p>
<strong><i class="fa fa-inr"></i> 65,500/-</strong>
</p>
<p>
<strong><i class="fa fa-inr"></i> 500/-</strong>
</p>
<p>
<strong><i class="fa fa-inr"></i> 1300/-</strong>
</p>
<p>
<strong><i class="fa fa-inr"></i> 9500/-</strong>
</p>
</td>
</tr>
<tr>
<td class="text-right"><h2><strong>Total: </strong></h2></td>
<td class="text-left text-danger"><h2><strong><i class="fa fa-inr"></i> 31.566/-</strong></h2></td>
</tr>
</tbody>
</table>
</div>
<div class="row">
<div class="receipt-header receipt-header-mid receipt-footer">
<div class="col-xs-8 col-sm-8 col-md-8 text-left">
<div class="receipt-right">
<p><b>Date :</b> 15 Aug 2016</p><br><br>
<h5 style="color: rgb(140, 140, 140);">Thanks for shopping.!</h5>
</div>
</div>
<div class="col-xs-4 col-sm-4 col-md-4">
<div class="receipt-left">

<h1>Stamp</h1>

</form>
  
</div>
</div>
  </div>
</div>
</div>
</div>
</div>
  
    <button id="button" type="submit" class="btn btn-primary"value="Submit">Download</button>
  <button id="button" type="submit" class="btn btn-light"value="Submit">Print</button>
    <button id="button2" type="reset"  class="btn btn-light" value="Clear">Email</button>
  <br> <br> <br>
  	<script>
		var button = document.getElementById("button");
		var makepdf = document.getElementById("makepdf");

		button.addEventListener("click", function () {
			html2pdf().from(makepdf).save();
		});
	</script>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>



