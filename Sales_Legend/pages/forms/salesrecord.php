
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

$query = "SELECT * FROM sale";
$result = $conn->query($query);
 ?>
<center>
  <h3>Sales record</h3>
 <table border="1" cellpadding="10" cellspacing="0">
   
   <td><b>Reference Number</b> </td>
   <td><b> Product Name</b></td>
   <td> <b> Quantity</b></td>
   <td><b> Price</b></td>
   <td><b>Measurements</b> </td>
   <td><b>Total_Cost</b> </td>
 <?php
 $sn=1;
 while($data = $result->fetch(PDO::FETCH_ASSOC)) {
   
   ?>
   
     
    <tr>
   
   <td><?php echo $data['Reference_Number']; ?> </td>
   <td><?php echo $data['Product_Name']; ?> </td>
   <td><?php echo $data['Quantity']; ?> </td>
   <td><?php echo $data['Price']; ?> </td>
   <td><?php echo $data['Measurements']; ?> </td>
   <td><?php echo $data['Total_Cost']; ?> </td>
   
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