<?php
$conn = mysqli_connect("localhost", "ekhonnec_JeudfraBS", "JeudfraBS33@", "ekhonnec_JeudfraBS") or die("Error, occured contact eKhonnector at*** and report the problem");





if(isset($_POST['query'])){

$search = mysqli_real_escape_string($conn, "");
	$query = "SELECT Period FROM clients
	WHERE Policy  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['Period'];
  
}
  
}



session_start(); // Start the session

if (isset($_POST['query1'])) {
    $search = mysqli_real_escape_string($conn, $_POST["query1"]);
    $query = "SELECT Group_Name FROM clients WHERE Policy LIKE '%".$search."%'";
  
    $result = mysqli_query($conn, $query);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            echo $row['Group_Name'];
            $_SESSION['group1'] = $row['Group_Name']; // Store the value in session
        } else {
            echo "No results found.";
        }
    } else {
        echo "Query execution failed: " . mysqli_error($conn);
    }
}

if (isset($_POST['query2'])) {
    $search = mysqli_real_escape_string($conn, $_POST["query2"]);
    $query = "SELECT Package FROM clients WHERE Policy LIKE '%".$search."%'";
  
    $result = mysqli_query($conn, $query);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            echo $row['Package'];
            $_SESSION['package1'] = $row['Package']; // Store the value in session
        } else {
            echo "No results found.";
        }
    } else {
        echo "Query execution failed: " . mysqli_error($conn);
    }
}


if (isset($_POST['query111'])) {
    $search = mysqli_real_escape_string($conn, $_POST["query111"]);

    if (!empty($_SESSION['group1']) && !empty($_SESSION['package1'])) {
        $group1 = mysqli_real_escape_string($conn, $_SESSION['group1']);
        $package1 = mysqli_real_escape_string($conn, $_SESSION['package1']);

        $query = "SELECT Extra_Member FROM policies WHERE Group_name = '$group1' AND Policy_Name = '$package1'";

        $result = mysqli_query($conn, $query);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
                echo $row['Extra_Member'];
            } else {
                echo "No results found.";
            }
        } else {
            echo "Query execution failed: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid input values for group1 and package1.<br>";

    }
}


if(isset($_POST['query3'])){


$search = mysqli_real_escape_string($conn, $_POST["query3"]);
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


if(isset($_POST['query4'])){


$search = mysqli_real_escape_string($conn, $_POST["query4"]);
	$query = "SELECT Product_Added_Benefit FROM clients
	WHERE Policy  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['Product_Added_Benefit'];
  
  
}
  

}


if(isset($_POST['query5'])){

  
$search = mysqli_real_escape_string($conn, $_POST["query5"]);
	$query = "SELECT Count(*) AS counter FROM beneficiaries
	WHERE Policy_number  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['counter'];
  
  
}
  


}


if(isset($_POST['query6'])){


$search = mysqli_real_escape_string($conn, $_POST["query6"]);
	$query = "SELECT Count(*) AS Counter2 FROM additional_members
	WHERE 	Policy_Number  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['Counter2'];
  
  
}
  

  
  
}

if(isset($_POST['query7'])){

  
  
$search = mysqli_real_escape_string($conn, $_POST["query7"]);
	$query = "SELECT Payment_Date FROM clients
	WHERE Policy  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['Payment_Date'];
  
  
}
  


}

if(isset($_POST['query8'])){


$search = mysqli_real_escape_string($conn, $_POST["query8"]);
	$query = "SELECT Inception_date FROM clients
	WHERE Policy  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['Inception_date'];
  
  
}
  

  
}


if(isset($_POST['query9'])){


$search = mysqli_real_escape_string($conn, $_POST["query9"]);
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



if(isset($_POST['query10'])){


$search = mysqli_real_escape_string($conn, $_POST["query10"]);
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



if(isset($_POST['query11'])){


$search = mysqli_real_escape_string($conn, $_POST["query11"]);
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



if(isset($_POST['query12'])){


$search = mysqli_real_escape_string($conn, $_POST["query12"]);
	$query = "SELECT Nationality FROM clients
	WHERE Policy  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['Nationality'];
  
  
}
  
}


if(isset($_POST['query13'])){


$search = mysqli_real_escape_string($conn, $_POST["query13"]);
	$query = "SELECT languageOf_com FROM clients
	WHERE Policy  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['languageOf_com'];
  
  
}

}



if(isset($_POST['query14'])){


$search = mysqli_real_escape_string($conn, $_POST["query14"]);
	$query = "SELECT Gender FROM clients
	WHERE Policy  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['Gender'];
  
  
}

}

if(isset($_POST['query15'])){


$search = mysqli_real_escape_string($conn, $_POST["query15"]);
	$query = "SELECT email FROM clients
	WHERE Policy  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['email'];
  
  
}

}

if(isset($_POST['query16'])){


$search = mysqli_real_escape_string($conn, $_POST["query16"]);
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

if(isset($_POST['query17'])){


$search = mysqli_real_escape_string($conn, $_POST["query17"]);
	$query = "SELECT Marital_status FROM clients
	WHERE Policy  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['Marital_status'];
  
  
}

}

if(isset($_POST['query18'])){


$search = mysqli_real_escape_string($conn, $_POST["query18"]);
	$query = "SELECT spouse_Name FROM spousedetails
	WHERE Policy  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['spouse_Name'];
  
  
}

}

if(isset($_POST['query19'])){


$search = mysqli_real_escape_string($conn, $_POST["query19"]);
	$query = "SELECT spouse_Surname FROM spousedetails
	WHERE Policy  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['spouse_Surname'];
  
  
}

}

if(isset($_POST['query20'])){


$search = mysqli_real_escape_string($conn, $_POST["query20"]);
	$query = "SELECT ContactNo FROM spousedetails
	WHERE Policy  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['ContactNo'];
  
  
}

}

if(isset($_POST['query21'])){


$search = mysqli_real_escape_string($conn, $_POST["query21"]);
	$query = "SELECT _ID FROM spousedetails
	WHERE Policy  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['_ID'];
}
}
  
  if(isset($_POST['query22'])){


$search = mysqli_real_escape_string($conn, $_POST["query22"]);
	$query = "SELECT month FROM premiums
	WHERE Policy  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['month'];
  
  
}

}

if(isset($_POST['query23'])){


$search = mysqli_real_escape_string($conn, $_POST["query23"]);
	$query = "SELECT year FROM premiums
	WHERE Policy  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['year'];
}
}


if(isset($_POST['query24'])){


$search = mysqli_real_escape_string($conn, $_POST["query24"]);
	$query = "SELECT Policy FROM premiums
	WHERE Policy  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['Policy'];
}
}

if(isset($_POST['query25'])){


$search = mysqli_real_escape_string($conn, $_POST["query25"]);
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


if(isset($_POST['query26'])){


$search = mysqli_real_escape_string($conn, $_POST["query26"]);
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


if(isset($_POST['query27'])){


$search = mysqli_real_escape_string($conn, $_POST["query27"]);
	$query = "SELECT Client FROM premiums
	WHERE Policy  LIKE '%".$search."%'
";	
  
  $result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

  $row = mysqli_fetch_array($result);
  
  echo $row['Client'];
}
}

if(isset($_POST['query28'])){


$search = mysqli_real_escape_string($conn, $_POST["query28"]);
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

?>