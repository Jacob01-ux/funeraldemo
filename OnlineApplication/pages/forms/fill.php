<?php
$conn = mysqli_connect("localhost", "ekhonnec_vakhandli_group", "vakhandli_group", "ekhonnec_vakhandli_group") or die("Error, occured contact eKhonnector at*** and report the problem");






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


if(isset($_POST['query2'])){


$search = mysqli_real_escape_string($conn, $_POST["query2"]);
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


if(isset($_POST['query3'])){

  
$search = mysqli_real_escape_string($conn, $_POST["query3"]);
	$query = "SELECT Client_id FROM premiums
	WHERE Policy  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['Client_id'];
  
  
}
  


}


if(isset($_POST['query4'])){


$search = mysqli_real_escape_string($conn, $_POST["query4"]);
	$query = "SELECT Plan FROM premiums
	WHERE Policy  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['Plan'];
  
  
}
  

  
  
}



if(isset($_POST['query5'])){

  
  
$search = mysqli_real_escape_string($conn, $_POST["query5"]);
	$query = "SELECT monthly_premium FROM premiums
	WHERE Policy  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['monthly_premium'];
  
  
}
  


}



if(isset($_POST['query6'])){


$search = mysqli_real_escape_string($conn, $_POST["query6"]);
	$query = "SELECT Date FROM premiums
	WHERE Policy  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['Date'];
  
  
}
  

  
}



?>