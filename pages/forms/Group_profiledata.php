<?php
$conn = mysqli_connect("localhost", "ekhonnec_JeudfraBS", "JeudfraBS33@", "ekhonnec_JeudfraBS") or die("Error, occured contact eKhonnector at*** and report the problem");

if (isset($_POST['query'])) {
  $search = mysqli_real_escape_string($conn, $_POST['query']);
  $query = "SELECT group_name FROM groups
    WHERE Registration_Number LIKE '%" . $search . "%'
  ";	
  
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    echo $row['group_name'];
  }
}




if(isset($_POST['query1'])){


$search = mysqli_real_escape_string($conn, $_POST["query1"]);
	$query = "SELECT slogan FROM groups
	WHERE Registration_Number LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['slogan'];
  
  
}
  

}

if(isset($_POST['query2'])){


$search = mysqli_real_escape_string($conn, $_POST["query2"]);
	$query = "SELECT cellPhone_number FROM groups
	WHERE Registration_Number LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['cellPhone_number'];
  
  
}
  

}


if(isset($_POST['query3'])){


$search = mysqli_real_escape_string($conn, $_POST["query3"]);
	$query = "SELECT email FROM groups
	WHERE Registration_Number LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['email'];
  
  
}
  

}


if(isset($_POST['query4'])){


$search = mysqli_real_escape_string($conn, $_POST["query4"]);
	$query = "SELECT group_type FROM groups
	WHERE Registration_Number LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['group_type'];
  
  
}
  

}


if(isset($_POST['query5'])){

  
$search = mysqli_real_escape_string($conn, $_POST["query5"]);
	$query = "SELECT start_date FROM groups
	WHERE Registration_Number LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['start_date'];
  
  
}
  


}


if(isset($_POST['query6'])){


$search = mysqli_real_escape_string($conn, $_POST["query6"]);
	$query = "SELECT agreement_date FROM groups
	WHERE Registration_Number LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['agreement_date'];
  
  
}
  

  
  
}

if(isset($_POST['query7'])){

  
  
$search = mysqli_real_escape_string($conn, $_POST["query7"]);
	$query = "SELECT termination_date FROM groups
	WHERE Registration_Number LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['termination_date'];
  
  
}
  


}



if(isset($_POST['query8'])){


$search = mysqli_real_escape_string($conn, $_POST["query8"]);
	$query = "SELECT product_number FROM groups
	WHERE Registration_Number LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['product_number'];
  
  
}
  

  
}


if(isset($_POST['query9'])){


$search = mysqli_real_escape_string($conn, $_POST["query9"]);
	$query = "SELECT group_address FROM groups
	WHERE Registration_Number LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['group_address'];
  
  
}
  

  
}



if(isset($_POST['query10'])){


$search = mysqli_real_escape_string($conn, $_POST["query10"]);
	$query = "SELECT representatives FROM groups
	WHERE Registration_Number LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['representatives'];
  
  
}
  

  
}




?>