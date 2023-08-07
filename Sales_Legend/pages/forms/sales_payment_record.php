

swap



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

  
  
$query = "SELECT * FROM sales_payment";
$result = $conn->query($query);
 ?>
<center>
  <h3>Sales record</h3>
 <table border="1" cellpadding="10" cellspacing="0">
   
   <td><b>Period</b> </td>
   <td><b> Transaction type</b></td>
   <td> <b> Client status</b></td>
   <td><b> ID/Passport</b></td>
   <td><b>Payment</b> </td>
   <td><b>Invoice type</b> </td>
   <td><b>Number</b> </td>
   <td><b>Address</b> </td>
   <td><b>Transaction date</b> </td>
   <td><b>Down payment</b> </td>
   <td><b> Next payment date</b> </td>
 <?php
 $sn=1;
 while($data = $result->fetch(PDO::FETCH_ASSOC)) {
   
   ?>
   
     
    <tr>
   
      
   <td><?php echo $data['period']; ?> </td>
   <td><?php echo $data['transaction_type']; ?> </td>
   <td><?php echo $data['client_status']; ?> </td>
   <td><?php echo $data['ID']; ?> </td>
   <td><?php echo $data['payment']; ?> </td>
   <td><?php echo $data['invoice_type']; ?> </td>
      <td><?php echo $data['number']; ?> </td>
      <td><?php echo $data['address']; ?> </td>
      <td><?php echo $data['transaction_date']; ?> </td>
      <td><?php echo $data['down_payment']; ?> </td>
      <td><?php echo $data['next_payment_date']; ?> </td>
   
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