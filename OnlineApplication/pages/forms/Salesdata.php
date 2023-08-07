<?php
$conn = mysqli_connect("localhost", "ekhonnec_vakhandli_group", "vakhandli_group", "ekhonnec_vakhandli_group") or die("Error, occured contact eKhonnector at*** and report the problem");

$username = 'ekhonnec_vakhandli_group';
$password = 'vakhandli_group';



if(isset($_POST['query'])){

$search = mysqli_real_escape_string($conn, "");
	$query = "SELECT Customer FROM clients
	WHERE Policy  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['Customer'];
  
  
}
  
}



if(isset($_POST['query1'])){


$search = mysqli_real_escape_string($conn, $_POST["query1"]);
	$query = "SELECT Number FROM clients
	WHERE Policy  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['Number'];
  
  
}
  

}

if(isset($_POST['query2'])){


$search = mysqli_real_escape_string($conn, $_POST["query2"]);
	$query = "SELECT Address FROM clients
	WHERE Policy  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['Address'];
  
  
}
  

}

?>