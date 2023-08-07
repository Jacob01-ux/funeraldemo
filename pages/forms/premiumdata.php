<?php
$conn = mysqli_connect("localhost", "ekhonnec_JeudfraBS", "JeudfraBS33@", "ekhonnec_JeudfraBS") or die("Error, occured contact eKhonnector at*** and report the problem");







if(isset($_POST['query2'])){


$search = mysqli_real_escape_string($conn, $_POST["query2"]);
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


if(isset($_POST['query3'])){


$search = mysqli_real_escape_string($conn, $_POST["query3"]);
	$query = "SELECT _ID FROM clients
	WHERE Policy  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['_ID'];
  
  
}
  

}


if(isset($_POST['query4'])){


$search = mysqli_real_escape_string($conn, $_POST["query4"]);
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


if(isset($_POST['query5'])){

  
$search = mysqli_real_escape_string($conn, $_POST["query5"]);
	$query = "SELECT Package FROM clients
	WHERE Policy  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['Package'];
  
  
}
  


}


if(isset($_POST['query6'])){


$search = mysqli_real_escape_string($conn, $_POST["query6"]);
	$query = "SELECT PremiumCoverAmount FROM clients
	WHERE Policy  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['PremiumCoverAmount'];
  
  
}
  

  
  
}





?>