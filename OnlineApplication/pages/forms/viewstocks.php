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
$username = "ekhonnec_vakhandli_group";
$password = "vakhandli_group";
$dbname = "ekhonnec_vakhandli_group";


try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";}
catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}


try {
 

   
   $query = "SELECT * FROM stock";
$result = $conn->query($query);
 ?>
<center>
  <h3>Stock record</h3>
 <table border="1" cellpadding="10" cellspacing="0">
   
   
   <td><b>Year</b> </td>
   <td><b> Month</b></td>
   <td> <b> Date</b></td>
   <td><b> Action</b></td>
   <td><b>Product</b> </td>
   <td><b>Product number</b> </td>
   <td><b>Manufactoring</b> </td>
   <td><b>Quantity</b> </td>
   <td><b>Unit price</b> </td>
     </li>

   
   
   
   
   
 <?php
 $sn=1;
 while($data = $result->fetch(PDO::FETCH_ASSOC)) {
   
   ?>
   
     
    <tr>
   
   <td><?php echo $data['year']; ?> </td>
   <td><?php echo $data['month']; ?> </td>
   <td><?php echo $data['Date']; ?> </td>
   <td><?php echo $data['Action']; ?> </td>
   <td><?php echo $data['Product']; ?> </td>
   <td><?php echo $data['PNumber']; ?> </td>
      <td><?php echo $data['Cost_price']; ?> </td>
      <td><?php echo $data['Qty']; ?> </td>
      <td><?php echo $data['Unit_price']; ?> </td>
      
   
    </tr>
   </center>
    <?php
  }
  ?>
</table>
  <?php
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
?>