<?php 
$host = 'localhost';
$dbname = 'ekhonnec_vakhandli_group';
$username = 'ekhonnec_vakhandli_group';
$password = 'vakhandli_group';

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
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bar Graph Example</title>
	<style type="text/css">
		canvas {
			border: 1px solid #ccc;
		}
	</style>
</head>
<body>
  
  
  <?php  
  
  $query = mysqli_query($conn, 'select * from sales_payment');
  $rows = mysqli_num_rows($query);
  
  
  $query = mysqli_query($conn, 'select * from sale');
  $sale_rows = mysqli_num_rows($query);
  
  
  $query = mysqli_query($conn, "select Product_Name from sale where Product_name='Casket'");
  $casket_rows = mysqli_num_rows($query);
  
  $query = mysqli_query($conn, "select Product_Name from sale where Product_name='Coffins'");
  $coffin_rows = mysqli_num_rows($query);
  
  $query = mysqli_query($conn, "select Product_Name from sale where Product_name='Domes'");
  $domes_rows = mysqli_num_rows($query);
  
  $query = mysqli_query($conn, "select Product_Name from sale where Product_name='Flowers'");
  $flowers_rows = mysqli_num_rows($query);
  
  $query = mysqli_query($conn, "select Product_Name from sale where Product_name='Tombstone'");
  $tombstone_rows = mysqli_num_rows($query);
  
  
  $query = mysqli_query($conn, "select client_status from sales_payment where client_status='New client'");
  $newclient_rows = mysqli_num_rows($query);
  
  $query = mysqli_query($conn, "select client_status from sales_payment where client_status='Existing client'");
  $existingclient_rows = mysqli_num_rows($query);
  
  
  $query = mysqli_query($conn, "select payment from sales_payment where payment='cash'");
  $cash_rows = mysqli_num_rows($query);
  
  $query = mysqli_query($conn, "select payment from sales_payment where payment='check'");
  $check_rows = mysqli_num_rows($query);
  
  $query = mysqli_query($conn, "select payment from sales_payment where payment='EFT'");
  $eft_rows = mysqli_num_rows($query);
  
  $query = mysqli_query($conn, "select payment from sales_payment where payment='credit card'");
  $credit_card_rows = mysqli_num_rows($query);
  
  $query = mysqli_query($conn, "select payment from sales_payment where payment='bank transfer'");
  $bank_transfer_rows = mysqli_num_rows($query);
  
  
  
  $query = mysqli_query($conn, "select payment from sales_payment where payment='debit card'");
  $debit_card_rows = mysqli_num_rows($query);
  
  
  
  $query = mysqli_query($conn, "select invoice_type from sales_payment where invoice_type='quotation'");
  $quotation_rows = mysqli_num_rows($query);
  
  
  
  $query = mysqli_query($conn, "select invoice_type from sales_payment where invoice_type='payment made'");
  $payment_made_rows = mysqli_num_rows($query);
  
  $query = mysqli_query($conn, "select Claimer_Genders from claims where Claimer_Genders='male'");
  $male_rows = mysqli_num_rows($query);
  
  
  
  $query = mysqli_query($conn, "select Claimer_Genders from claims where Claimer_Genders='female'");
  $female_rows = mysqli_num_rows($query);
  
  


  ?>
  
  <?php
  
  if($_POST['cat']=='Sales'){
  
  ?>
  
	<h2>Complete number of sales payments: <?php echo $rows; ?></h2>
  <h2>Complete number of sales : <?php echo $sale_rows; ?></h2>
  
  
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Number of product bought</h4>
                  <div class="flot-chart-container">
                    
	<canvas id="myCanvas" width="800" height="400"></canvas>
</div>
                </div>
              </div>
            </div>
            
            
            
            <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Client Status</h4>
                  <div class="flot-chart-container">
                    
	<canvas id="myCanvas2" width="700" height="400"></canvas>
</div>
                </div>
              </div>
            </div>
            
              

                          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Type of payments</h4>
                  <div class="flot-chart-container">
                    
	
                    <canvas id="myChart" width="700" height="400"></canvas>
</div>
                </div>
              </div>
            </div>
            

                            <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Invoice type</h4>
                  <div class="flot-chart-container">
                    
	
                    <canvas id="myChart2" width="700" height="400"></canvas>
</div>
                </div>
              </div>
            </div>

                              
                              
                              


              

            <?php } else if($_POST['cat']=='Claims'){ ?>
                              
                              
                              
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Claims</h4>
                  <div class="flot-chart-container">
                    
	
                    <canvas id="piechart" width="700" height="400"></canvas>
</div>
                </div>
              </div>
            </div>
                              
                              
                              
                              <?php } ?>
            
	<script>
		
		  var canvas = document.getElementById("myCanvas");
  var ctx = canvas.getContext("2d");
          
          var casket_rows = '<?php echo $casket_rows ?>';
          var coffin_rows = '<?php echo $coffin_rows ?>';
          var domes_rows = '<?php echo $domes_rows ?>';
          var flowers_rows = '<?php echo $flowers_rows ?>';
          var tombstone_rows = '<?php echo $tombstone_rows ?>';
          
          var data = [casket_rows, coffin_rows, domes_rows, flowers_rows, tombstone_rows];
var product_label = ['caskets', 'coffins', 'domes', 'flowers', 'tombstones'];

		 // Bar properties
  var barWidth = 40;
  var barSpacing = 70;
  var startX = 50;
  var startY = canvas.height - 50;
  		var maxValue = Math.max.apply(null, data);

  // Draw bars
  for (var i = 0; i < data.length; i++) {
    //var barHeight = data[i];
    			var barHeight = (data[i] / maxValue) * canvas.height;

    var x = startX + i * (barWidth + barSpacing);
    var y = startY - barHeight;
    ctx.fillRect(x, y, barWidth, barHeight);
    ctx.fillStyle = "red";
    
    // Add label
    var label = product_label[i] + "" + "(" + data[i] + ")";
    ctx.fillStyle = "black";
    ctx.font = "12px Arial";
    ctx.textAlign = "center";
    ctx.fillText(label, x + barWidth/2, startY + 20);
		}
          

      
      
      
        var canvas = document.getElementById("myCanvas2");
  var ctx = canvas.getContext("2d");
          
          var newclient_rows = '<?php echo $newclient_rows ?>';
          var existingclient_rows = '<?php echo $existingclient_rows ?>';
          
          var data = [newclient_rows, existingclient_rows];
var product_label = ['new client', 'existing client'];

		 // Bar properties
  var barWidth = 40;
  var barSpacing = 70;
  var startX = 50;
  var startY = canvas.height - 50;
  var maxValue = Math.max.apply(null, data);
  // Draw bars
  for (var i = 0; i < data.length; i++) {
    //var barHeight = data[i];
    var barHeight = (data[i] / maxValue) * canvas.height;
    var x = startX + i * (barWidth + barSpacing);
    var y = startY - barHeight;
    ctx.fillRect(x, y, barWidth, barHeight);
    ctx.fillStyle = "red";
    
    // Add label
    var label = product_label[i] + "" + "(" + data[i] + ")";
    ctx.fillStyle = "black";
    ctx.font = "12px Arial";
    ctx.textAlign = "center";
    ctx.fillText(label, x + barWidth/2, startY + 20);
		}
      
      
      
      
      
var cash =  '<?php echo $cash_rows ?>';
var check =  '<?php echo $check_rows ?>';      
var EFT =  '<?php echo $eft_rows ?>';
var credit_card =  '<?php echo $credit_card_rows ?>';
var bank_transfer =  '<?php echo $bank_transfer_rows ?>';
var debit_card =  '<?php echo $debit_card_rows ?>';
    
      // get the canvas element
var ctx = document.getElementById('myChart').getContext('2d');

// create the data for the chart
var data = {
  labels: ['cash', 'check', 'EFT', 'credit card', 'bank transfer', 'debit card'],
  datasets: [{
    label: 'My First Dataset',
    data: [cash, check, EFT, credit_card, bank_transfer, debit_card],
    backgroundColor: [
      'rgba(255, 99, 132, 0.5)',
      'rgba(54, 162, 235, 0.5)',
      'rgba(255, 206, 86, 0.5)',
      'rgba(75, 192, 192, 0.5)',
      'rgba(153, 102, 255, 0.5)',
      'rgba(255, 159, 64, 0.5)'
    ],
    borderColor: [
      'rgba(255, 99, 132, 1)',
      'rgba(54, 162, 235, 1)',
      'rgba(255, 206, 86, 1)',
      'rgba(75, 192, 192, 1)',
      'rgba(153, 102, 255, 1)',
      'rgba(255, 159, 64, 1)'
    ],
    borderWidth: 1
  }]
};

// create the chart
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: data
});

      
            
var quotation =  '<?php echo $quotation_rows; ?>';
var payment_made =  '<?php echo $payment_made_rows; ?>';      
    
      // get the canvas element
var ctx = document.getElementById('myChart2').getContext('2d');

// create the data for the chart
var data = {
  labels: ['quotation', 'paymnet made'],
  datasets: [{
    label: 'My First Dataset',
    data: [quotation, payment_made],
    backgroundColor: [
      'rgba(255, 99, 132, 0.5)',
      'rgba(54, 162, 235, 0.5)',
      'rgba(255, 206, 86, 0.5)',
      'rgba(75, 192, 192, 0.5)',
      'rgba(153, 102, 255, 0.5)',
      'rgba(255, 159, 64, 0.5)'
    ],
    borderColor: [
      'rgba(255, 99, 132, 1)',
      'rgba(54, 162, 235, 1)',
      'rgba(255, 206, 86, 1)',
      'rgba(75, 192, 192, 1)',
      'rgba(153, 102, 255, 1)',
      'rgba(255, 159, 64, 1)'
    ],
    borderWidth: 1
  }]
};

// create the chart
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: data
});

         
      
      
      
            
var male =  '<?php echo $male_rows; ?>';
var female =  '<?php echo $female_rows; ?>';      
    
      // get the canvas element
var ctx = document.getElementById('piechart').getContext('2d');

// create the data for the chart
var data = {
  labels: ['male', 'female'],
  datasets: [{
    label: 'My First Dataset',
    data: [male, female],
    backgroundColor: [
      'rgba(255, 99, 132, 0.5)',
      'rgba(54, 162, 235, 0.5)',
      'rgba(255, 206, 86, 0.5)',
      'rgba(75, 192, 192, 0.5)',
      'rgba(153, 102, 255, 0.5)',
      'rgba(255, 159, 64, 0.5)'
    ],
    borderColor: [
      'rgba(255, 99, 132, 1)',
      'rgba(54, 162, 235, 1)',
      'rgba(255, 206, 86, 1)',
      'rgba(75, 192, 192, 1)',
      'rgba(153, 102, 255, 1)',
      'rgba(255, 159, 64, 1)'
    ],
    borderWidth: 1
  }]
};

// create the chart
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: data
});
      
	</script>
</body>
</html>
