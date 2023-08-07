<?php
    // Connect to database
    $servername = "localhost";
    $db_username = "ekhonnec_Mphye_Funerals";
    $db_password = "websystems_10";
    $dbname = "ekhonnec_Mphye_Funerals";
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

$Pr_Name = mysqli_real_escape_string($conn, $_POST['Pr_Name']);
$Name_of_Benefits= mysqli_real_escape_string($conn, $_POST['Name_of_Benefits']);
$Product_Additonal_Benefits = mysqli_real_escape_string($conn, $_POST['Product_Additonal_Benefits']);
$Sp_idNumber= mysqli_real_escape_string($conn, $_POST['Sp_idNumber']);
$Sp_Gender = mysqli_real_escape_string($conn, $_POST['Sp_Gender']);
$Sp_date= mysqli_real_escape_string($conn, $_POST['Sp_date']);
$Ex_Gender = mysqli_real_escape_string($conn, $_POST['Ex_Gender']);
// $email= mysqli_real_escape_string($conn, $_POST['email']);
// $product_add_ben = mysqli_real_escape_string($conn, $_POST['product_add_ben']);
// $policy_opt= mysqli_real_escape_string($conn, $_POST['policy_opt']);
// $Dep_covered = mysqli_real_escape_string($conn, $_POST['Dep_covered']);
// $policy_no= mysqli_real_escape_string($conn, $_POST['policy_no']);
// $ext_members = mysqli_real_escape_string($conn, $_POST['ext_members']);
// $inc_date= mysqli_real_escape_string($conn, $_POST['inc_date']);
// $m_status = mysqli_real_escape_string($conn, $_POST['m_status']);
// $res_address= mysqli_real_escape_string($conn, $_POST['res_address']);
// $en_sms= mysqli_real_escape_string($conn, $_POST['en_sms']);
// $gender= mysqli_real_escape_string($conn, $_POST['gender']);
// $Preferred_Payment_Date= mysqli_real_escape_string($conn, $_POST['Preferred_Payment_Date']);

//$insert = "insert into additional_members(ad_name, ad_id, birthday, ad_quote_id) values('$ad_name', '$ad_id', '$ad_date','$ad_quote_id')";
$insert = "insert into additional_benefits(benefit_name, Policy_Name, description) 
           values('$Pr_Name', '$Name_of_Benefits', '$Product_Additonal_Benefits')";
           
$query = mysqli_query($conn, $insert);

if($query === FALSE){  
    throw new exception(mysqli_error($conn));
}
if($query){ 
    //alert("Member Successfully added!"); 
    //echo"<p style='color:white'>You have successfully added client</p>"; 
    echo '<script>
    alert("Product Successfully added")
    window.location.replace("newClient.php");
    </script>';
    //header("Location: dependents.html");
}
else{
    //alert("Error accured member not added!")
    die("Could not save member, please try again later ");
    echo"<p style='color:red'>Could not save member, please try again later</p>";
    
}
?>