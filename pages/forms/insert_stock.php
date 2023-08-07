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

$month= $_POST['month'];


$year= $_POST['year'];

$action= $_POST['action'];
$Manufacturing= $_POST['Manufacturing'];
$Quantity= $_POST['Quantity'];

$price_per_product = $_POST['price_per_product'];

$product_number = $_POST['product_number'];

$date = $_POST['date'];
$product = $_POST['product'];




  
  


if($month==""){


echo"
  
<div class='container'>


  
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' onclick='history.back()' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Modal Header</h4>
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

else if($year==""){

echo"
  
<div class='container'>


  
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' onclick='history.back()' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Modal Header</h4>
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

else if($action==""){

echo"
  
<div class='container'>


  
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' onclick='history.back()' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Modal Header</h4>
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




else if($product==""){

echo"
  
<div class='container'>


  
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' onclick='history.back()' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Modal Header</h4>
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

else if($Manufacturing==""){

echo"
  
<div class='container'>


  
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' onclick='history.back()' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Modal Header</h4>
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

else if($Quantity==""){

echo"
  
<div class='container'>


  
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' onclick='history.back()' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Modal Header</h4>
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




else if($price_per_product==""){

echo"
  
<div class='container'>


  
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' onclick='history.back()' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Modal Header</h4>
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



else if($product_number==""){

echo"
  
<div class='container'>


  
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' onclick='history.back()' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Modal Header</h4>
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



else if($date==""){

echo"
  
<div class='container'>


  
    <div class='modal-dialog'>
    
      <!-- Modal content-->
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' onclick='history.back()' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Modal Header</h4>
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
    

  
$month= $_POST['month'];
$year= $_POST['year'];

$action= $_POST['action'];
$Manufacturing= $_POST['Manufacturing'];
$Quantity= $_POST['Quantity'];

$price_per_product = $_POST['price_per_product'];

$product_number = $_POST['product_number'];

$date = $_POST['date'];


  
  //now we are saving the data 
  $stmt = $conn->prepare("INSERT INTO stock (year, month, Date, Action, Product, PNumber, Cost_price, Qty, Unit_price) 
  VALUES (:year, :month, :date, :action, :product, :product_number, :Manufacturing, :Quantity, :price_per_product)");
  $stmt->bindParam(':year', $year);
  $stmt->bindParam(':month', $month);
  $stmt->bindParam(':date', $date);
  $stmt->bindParam(':action', $action);
  $stmt->bindParam(':product', $product);
  $stmt->bindParam(':product_number', $product_number);
  $stmt->bindParam(':Manufacturing', $Manufacturing);
  $stmt->bindParam(':Quantity', $Quantity);
  $stmt->bindParam(':price_per_product', $price_per_product);
  
  
  
 
  //now we sanitize the input
  // Sanitize input using filter_var()
$year = filter_var($_POST['year'], FILTER_SANITIZE_STRING);
$month= filter_var($_POST['month'], FILTER_SANITIZE_STRING);
$date = filter_var($_POST['date'], FILTER_SANITIZE_STRING);
$action= filter_var($_POST['action'], FILTER_SANITIZE_STRING);
$product = filter_var($_POST['product'], FILTER_SANITIZE_STRING);
  $product_number = filter_var($_POST['product_number'], FILTER_SANITIZE_STRING);
$Manufacturing = filter_var($_POST['Manufacturing'], FILTER_SANITIZE_STRING);  
  $Quantity = filter_var($_POST['Quantity'], FILTER_SANITIZE_STRING);
  $price_per_product = filter_var($_POST['price_per_product'], FILTER_SANITIZE_STRING);

  
  
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
          <h4 class='modal-title'>Modal Header</h4>
        </div>
        <div class='modal-body'>
          <p style='color:Green'>Success.</p>
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

