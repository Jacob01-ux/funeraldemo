<style>
body {
  font-family: 'lato', sans-serif;
}
.container {
  max-width: 1000px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 10px;
  padding-right: 10px;
}

h2 {
  font-size: 26px;
  margin: 20px 0;
  text-align: center;
  small {
    font-size: 0.5em;
  }
}

.responsive-table {
  li {
    border-radius: 3px;
    padding: 25px 30px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
  }
  .table-header {
    background-color: #95A5A6;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.03em;
  }
  .table-row {
    background-color: #ffffff;
    box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
  }
  .col-1 {
    flex-basis: 10%;
  }
  .col-2 {
    flex-basis: 40%;
  }
  .col-3 {
    flex-basis: 25%;
  }
  .col-4 {
    flex-basis: 25%;
  }
  
  @media all and (max-width: 767px) {
    .table-header {
      display: none;
    }
    .table-row{
      
    }
    li {
      display: block;
    }
    .col {
      
      flex-basis: 100%;
      
    }
    .col {
      display: flex;
      padding: 10px 0;
      &:before {
        color: #6C7A89;
        padding-right: 10px;
        content: attr(data-label);
        flex-basis: 50%;
        text-align: right;
      }
    }
  }
}
</style>
<?php
 // include("database.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jeudfra";


try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";}
catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}


try {
 

   
   $query = "SELECT * FROM income1";
$result = $conn->query($query);
 ?>
<center>
  <h3>Cashbook record</h3>
 <table border="1" cellpadding="10" cellspacing="0">
   
   
   <td><b>Reference number</b> </td>
   <td><b> Period</b></td>
   <td> <b> Transaction type</b></td>
   <td><b> From to</b></td>
   <td><b>Description</b> </td>
   <td><b>Quanity</b> </td>
   <td><b>Price</b> </td>
   <td><b>Amount</b> </td>
   <td><b>Transaction date</b> </td>
   <td><b>_By</b> </td>
   <td><b>_On</b> </td>
     </li>

   
   
   
 <?php
 $sn=1;
  $amount = 0;
   $price = 0;
 while($data = $result->fetch(PDO::FETCH_ASSOC)) {
   
   ?>
   
     
    <tr>
   
   <td><?php echo $data['ref_Num']; ?> </td>
   <td><?php echo $data['Period']; ?> </td>
   <td><?php echo $data['transaction_type']; ?> </td>
   <td><?php echo $data['From_TO']; ?> </td>
   <td><?php echo $data['description']; ?> </td>
   <td><?php echo $data['quantity']; ?> </td>
      <td><?php echo $data['price']; ?> </td>
      <td><?php echo $data['Amount']; ?> </td>
      <td><?php echo $data['Transaction_date']; ?> </td>
      <td><?php echo $data['_By']; ?> </td>
      <td><?php echo $data['_On']; ?> </td>
      
      
   
    </tr>
   </center>


    <?php
   
$amount +=  $data['Amount'];
$price += $data['price'];
  }
  
  
  
  ?>
</table>

<h2>Amount Total: <?php echo $amount; ?> </h2>
<h2>Price Total: <?php echo $price; ?> </h2>

  <?php
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
?>