
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

$query = "SELECT * FROM additional_members";
$result = $conn->query($query);
 ?>
<center>
  <h3>Sales record</h3>
 <table border="1" cellpadding="10" cellspacing="0">
   
 
   
   
   <td><b>Policy Number</b> </td>
   <td><b>Name</b></td>
   <td> <b> Surname</b></td>
   <td><b>ID</b></td>
   <td><b>Gender</b> </td>
   <td><b>Nationality</b> </td>
   <td><b>Status</b> </td>
   <td><b>ExtendendCover</b> </td>
   <td><b>ExtendendCover</b> </td>
   
 <?php
 $sn=1;
 while($data = $result->fetch(PDO::FETCH_ASSOC)) {
   
   ?>
   
     
    <tr>
     
   <td><?php echo $data['Policy_Number']; ?> </td>
   <td><?php echo $data['Name']; ?> </td>
   <td><?php echo $data['Surname']; ?> </td>
   <td><?php echo $data['_ID']; ?> </td>
   <td><?php echo $data['Gender']; ?> </td>
   <td><?php echo $data['ContactNo']; ?> </td>
      <td><?php echo $data['Nationality']; ?> </td>
      <td><?php echo $data['Status']; ?> </td>
      <td><?php echo $data['ExtendendCover']; ?> </td>
      <td><?php echo $data['coverAmntExtended']; ?> </td>
   
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