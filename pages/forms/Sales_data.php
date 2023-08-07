<?php
$conn = mysqli_connect("localhost", "ekhonnec_JeudfraBS", "JeudfraBS33@", "ekhonnec_JeudfraBS") or die("Error, occured contact eKhonnector at*** and report the problem");


if(isset($_POST['query11'])){

$search = mysqli_real_escape_string($conn,$_POST["query11"] );
	$query = "SELECT Qty FROM stock
	WHERE Product  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['Qty'];
  
  
}
  
}



if(isset($_POST['query12'])){


$search = mysqli_real_escape_string($conn, $_POST["query12"]);
	$query = "SELECT Unit_price FROM stock
	WHERE Product  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['Unit_price'];
  
  
}
  

}

if(isset($_POST['query22'])){


$search = mysqli_real_escape_string($conn, $_POST["query22"]);
	$query = "SELECT Cost_price FROM stock
	WHERE Product  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['Cost_price'];
  
  
}
  

}
if(isset($_POST['query111'])){

$search = mysqli_real_escape_string($conn,$_POST["query111"] );
	$query = "SELECT Description FROM stock
	WHERE Product  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['Description'];
  
  
}
  
}



?>