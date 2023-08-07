
<?php
session_start();
 // Connect to the database
 $conn = mysqli_connect("localhost", "jeudfra", " ", "root") or die("something wrong happend");

////Saving and Securing Data
//Policies
if (isset($_POST['save_Products'])) {
    // Take html names and declare to placeholders
    $prodCategory = $_POST['prodCategory'];
    $prodName = $_POST['prodName'];
    $prodType = $_POST['prodType'];
    $prodWaiting = $_POST['prodWaiting'];
    $prodAmnt = $_POST['prodAmnt'];
    $prodDependents = $_POST['prodDependents'];
    $prodaddMember = $_POST['prodaddMember'];
    $prodUnder = $_POST['prodUnder'];
    $prodBenefits = $_POST['prodBenefits'];
    $prodCode = $_POST['prodCode'];
    $prodDescription = $_POST['prodDescription'];
    $prodCoverAmnt = $_POST['prodCoverAmnt'];
    $prodPeriod3 = $_POST['date'];
    $currentdate3 = date("Y-m-d H:i:s");
  $Joining_fee = $_POST['Joining_fee'];
  $Extra_Member = $_POST['Extra_Member'];
  
    $ageRange1 = $_POST['ageRange1'];
    $ageRange2 = $_POST['ageRange2'];
    $addAmount1 = $_POST['addAmount1'];
    $addCoverAmount1 = $_POST['addCoverAmount1'];
  
    $ageRange3 = $_POST['ageRange3'];
    $ageRange4 = $_POST['ageRange4'];
    $addAmount2 = $_POST['addAmount2'];
    $addCoverAmount2 = $_POST['addCoverAmount2'];
  
    $ageRange5 = $_POST['ageRange5'];
    $ageRange6 = $_POST['ageRange6'];
    $addAmount3 = $_POST['addAmount3'];
    $addCoverAmount3 = $_POST['addCoverAmount3'];
  
    $ageRange7 = $_POST['ageRange7'];
    $ageRange8 = $_POST['ageRange8'];
    $addAmount4 = $_POST['addAmount4'];
    $addCoverAmount4 = $_POST['addCoverAmount4'];

    // Sanitize user inputs
    $prodCategory = filter_var($_POST['prodCategory'], FILTER_SANITIZE_STRING);
    $prodName = filter_var($_POST['prodName'], FILTER_SANITIZE_STRING);
    $prodType = filter_var($_POST['prodType'], FILTER_SANITIZE_STRING);
    $prodWaiting = filter_var($_POST['prodWaiting'], FILTER_SANITIZE_NUMBER_INT);
    $prodAmnt = filter_var($_POST['prodAmnt'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $prodDependents = filter_var($_POST['prodDependents'], FILTER_SANITIZE_NUMBER_INT);
    $prodaddMember = filter_var($_POST['prodaddMember'], FILTER_SANITIZE_NUMBER_INT);
    $prodUnder = filter_var($_POST['prodUnder'], FILTER_SANITIZE_STRING);
    $prodBenefits = filter_var($_POST['prodBenefits'], FILTER_SANITIZE_STRING);
    $prodCode = filter_var($_POST['prodCode'], FILTER_SANITIZE_STRING);
    $prodDescription = filter_var($_POST['prodDescription'], FILTER_SANITIZE_STRING);
    $prodCoverAmnt = filter_var($_POST['prodCoverAmnt'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
  $Joining_fee = filter_var($_POST['Joining_fee'], FILTER_SANITIZE_STRING);
  $Extra_Member = filter_var($_POST['Extra_Member'], FILTER_SANITIZE_STRING);

$ageRange1 = filter_var($_POST['ageRange1'], FILTER_SANITIZE_STRING);
$ageRange2 = filter_var($_POST['ageRange2'], FILTER_SANITIZE_STRING);
$addAmount1 = filter_var($_POST['addAmount1'], FILTER_SANITIZE_STRING);
$addCoverAmount1 = filter_var($_POST['addCoverAmount1'], FILTER_SANITIZE_STRING);
$ageRange3 = filter_var($_POST['ageRange3'], FILTER_SANITIZE_STRING);
$ageRange4 = filter_var($_POST['ageRange4'], FILTER_SANITIZE_STRING);
$addAmount2 = filter_var($_POST['addAmount2'], FILTER_SANITIZE_STRING);
$addCoverAmount2 = filter_var($_POST['addCoverAmount2'], FILTER_SANITIZE_STRING);
$ageRange5 = filter_var($_POST['ageRange5'], FILTER_SANITIZE_STRING);
$ageRange6 = filter_var($_POST['ageRange6'], FILTER_SANITIZE_STRING);
$addAmount3 = filter_var($_POST['addAmount3'], FILTER_SANITIZE_STRING);
$addCoverAmount3 = filter_var($_POST['addCoverAmount3'], FILTER_SANITIZE_STRING);
$ageRange7 = filter_var($_POST['ageRange7'], FILTER_SANITIZE_STRING);
$ageRange8 = filter_var($_POST['ageRange8'], FILTER_SANITIZE_STRING);
$addAmount4 = filter_var($_POST['addAmount4'], FILTER_SANITIZE_STRING);
$addCoverAmount4 = filter_var($_POST['addCoverAmount4'], FILTER_SANITIZE_STRING);

$stmt = $conn->prepare("INSERT INTO policies (Product_Code, Group_name, Policy_Name,Type,Amount, Period, waiting_period, Covered, addMembers, Description, Cover_Amount, Underwritten_By, addBenefitsNo, _On, Joining_fee, Extra_Member) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssssssssssssssss", $prodCode, $prodCategory, $prodName,$prodType, $prodAmnt, $prodPeriod3, $prodWaiting, $prodDependents, $prodaddMember, $prodDescription, $prodCoverAmnt, $prodUnder, $prodBenefits, $currentdate3, $Joining_fee, $Extra_Member);

$stmt->execute();
$stmt->close();

if (!empty($ageRange1) && !empty($addAmount1)) {
    $stmt1 = $conn->prepare("INSERT INTO policyrange (Product_Code, Group_name, Policy_Name,Type, minAge, maxAge, Amount, CoverAmnt, _By, _On) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)");

    $stmt1->bind_param("ssssssssss", $prodCode, $prodCategory, $prodName,$prodType, $ageRange1, $ageRange2, $addAmount1, $addCoverAmount1, $currentdate3, $currentdate3);

    $stmt1->execute();

    if (!$stmt1->error) {
        mysqli_query($conn, "COMMIT");
    }

    $stmt1->close();
}

if (!empty($ageRange3) && !empty($addAmount2)) {
$stmt2 = $conn->prepare("INSERT INTO policyrange(Product_Code, Group_name, Policy_Name,Type, minAge, maxAge, Amount, CoverAmnt, _By, _On)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
$stmt2->bind_param("ssssssssss", $prodCode, $prodCategory, $prodName,$prodType, $ageRange3, $ageRange4, $addAmount2, $addCoverAmount2, $currentdate3, $currentdate3);
$stmt2->execute();
if (!$stmt2->error) {
mysqli_query($conn, "COMMIT");
}
$stmt2->close();
}
if (!empty($ageRange5) && !empty($addAmount3)) {
$stmt3 = $conn->prepare("INSERT INTO policyrange (Product_Code, Group_name, Policy_Name,Type, minAge, maxAge, Amount, CoverAmnt, _By, _On)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
$stmt3->bind_param("ssssssssss", $prodCode, $prodCategory, $prodName,$prodType, $ageRange5, $ageRange6, $addAmount3, $addCoverAmount3, $currentdate3, $currentdate3);
$stmt3->execute();
if (!$stmt3->error) {
mysqli_query($conn, "COMMIT");
}
$stmt3->close();
}

if (!empty($ageRange7) && !empty($addAmount4)) {
$stmt4 = $conn->prepare("INSERT INTO policyrange (Product_Code, Group_name, Policy_Name,Type, minAge, maxAge, Amount, CoverAmnt, _By, _On)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
$stmt4->bind_param("ssssssssss", $prodCode, $prodCategory, $prodName,$prodType, $ageRange7, $ageRange8, $addAmount4, $addCoverAmount4, $currentdate3, $currentdate3);
$stmt4->execute();
if (!$stmt4->error) {
mysqli_query($conn, "COMMIT");
}
$stmt4->close();
}
if (!mysqli_error($conn)) {
mysqli_query($conn, "COMMIT");
// Transfer to AdditionalBenefits.php if prodBenefits > 1
if ($prodBenefits > 1) {
$url = "AdditionalBenefits.php?prodBenefits=" . $prodBenefits . "&prodCode=" . $prodCode."&prodName=" . $prodName;
header("Location: $url");
exit();
}
}

echo '<script>
alert("Product Successfully added")
window.location.replace("Products.php");
</script>';
} else {
mysqli_query($conn, "ROLLBACK");
echo "Records not added successfully";
}

  




//Asset Register
if (isset($_POST['save_Asset'])) {
  
$AsuppName = $_POST['AsuppName'];
$AassetName = $_POST['AassetName'];
$AassetType = $_POST['AassetType'];
$AmodelNo = $_POST['AmodelNo'];
$ArefNo = $_POST['ArefNo'];
$Aquantity = $_POST['Aquantity'];
$AunitPrice = $_POST['AunitPrice'];
$AtotalCost = $_POST['AtotalCost'];
$Adatetime = $_POST['Adatetime'];
$APeriod = $_POST['AMonth'] . ' ' . $_POST['AYear'];
  
$AsuppName = filter_var($_POST['AsuppName'], FILTER_SANITIZE_STRING);
$AassetName = filter_var($_POST['AassetName'], FILTER_SANITIZE_STRING);
$AassetType = filter_var($_POST['AassetType'], FILTER_SANITIZE_STRING);
$AmodelNo = filter_var($_POST['AmodelNo'], FILTER_SANITIZE_STRING);
$ArefNo = filter_var($_POST['ArefNo'], FILTER_SANITIZE_STRING);
$Aquantity = filter_var($_POST['Aquantity'], FILTER_VALIDATE_INT);
$AunitPrice = filter_var($_POST['AunitPrice'], FILTER_VALIDATE_FLOAT);
$AtotalCost = filter_var($_POST['AtotalCost'], FILTER_VALIDATE_FLOAT);
$Adatetime = filter_var($_POST['Adatetime'], FILTER_SANITIZE_STRING);
$currentdate = date("Y-m-d H:i:s");

// Check if user input is valid

if ($AsuppName === false || $AassetName === false || $AassetType === false || $AmodelNo === false || $ArefNo === false || $Aquantity === false || $AunitPrice === false || $AtotalCost === false || $Adatetime === false || $APeriod === false) {

    die("Invalid input");

}
  else{
   echo '<script>
    alert("Asset Successfully added")
    window.location.replace("Asset_Register.php");
    </script>';
  }
  

// Prepare and execute the SQL query using prepared statements

$stmt = mysqli_prepare($conn, "INSERT INTO equipment (Period, Transaction_Date, Equipment_Type, Supplier_Name, Product_Name, Model_Number, ref_Num, Quantity, Unit_Price, Total_Cost, _On) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

mysqli_stmt_bind_param($stmt, "ssssssiiidd", $APeriod, $Adatetime, $AassetType, $AsuppName, $AassetName, $AmodelNo, $ArefNo, $Aquantity, $AunitPrice, $AtotalCost, $currentdate);

mysqli_stmt_execute($stmt);

// Close the database connection

mysqli_close($conn);

}



//Asset Disposal

if (isset($_POST['save_Disposal'])) {

$DisprodName = $_POST['DisprodName'];
$DisModelNo = $_POST['DisModelNo'];
$DisReason = $_POST['DisReason'];
$disComment = $_POST['disComment'];
$disQuantity = $_POST['disQuantity'];
$disPrice = $_POST['disPrice'];
$disTransDate = $_POST['disTransDate'];
$disPeriod = $_POST['DisprodMonth'] . ' ' . $_POST['DisprodYear'];

$DisprodName = filter_var($_POST['DisprodName'], FILTER_SANITIZE_STRING);
$DisModelNo = filter_var($_POST['DisModelNo'], FILTER_SANITIZE_STRING);
$DisReason = filter_var($_POST['DisReason'], FILTER_SANITIZE_STRING);
$disComment = filter_var($_POST['disComment'], FILTER_SANITIZE_STRING);
$disQuantity = filter_var($_POST['disQuantity'], FILTER_VALIDATE_INT);
$disPrice = filter_var($_POST['disPrice'], FILTER_VALIDATE_FLOAT);
$disTransDate = filter_var($_POST['disTransDate'], FILTER_SANITIZE_STRING);
$currentdate2 = date("Y-m-d H:i:s");

// Check if user input is valid

if ( $DisprodName === false || $DisModelNo === false || $DisReason === false || $disComment === false || $disQuantity === false || $disPrice === false || $disTransDate === false) {
    die("Invalid input");
}
  else
  {
     echo '<script>
    alert("Asset Disposal Successfully added")
    window.location.replace("Asset_Register.php");
    </script>';
  }

// Start transaction

mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);

// Prepare and execute the SQL query using prepared statements

$stmt = mysqli_prepare($conn, "INSERT INTO asset_disposal (Period,Transaction_Date,Product_Name,Model_Number,Reason,Comment,Quantity,Price,_On) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

mysqli_stmt_bind_param($stmt, "ssssssidd", $disPeriod, $disTransDate, $DisprodName, $DisModelNo, $DisReason, $disComment, $disQuantity, $disPrice, $currentdate2);

mysqli_stmt_execute($stmt);

// Check for errors and commit or rollback the transaction

if (!mysqli_error($conn)) {
    mysqli_commit($conn);
    echo "Records added successfully";
} else {
    mysqli_rollback($conn);
    echo "Records not added successfully";
}

// Close the database connection

mysqli_close($conn);
}

///////CLAIMS

if (isset($_POST['save_claims'])) {
$ClaimerPeriod = $_POST['ClaimerPeriod'];
$Claimer_name = $_POST['Claimer_name'];
$Claimer_IDs = $_POST['Claimer_IDs'];
$Claimer_contacts = $_POST['Claimer_contacts'];
$Claimer_Genders = $_POST['Claimer_Genders'];
$Claimer_Areas = $_POST['Claimer_Areas'];
$Claimer_Addresss = $_POST['Claimer_Addresss'];
$Claim_dates = $_POST['Claim_dates'];
$claimerDoD = $_POST['claimerDoD'];
//$prodCode = $_POST['prodCode'];
$death_certificate = $_POST['death_certificate'];
$D_id = $_POST['D_id'];
$deasedSurname = $_POST['deasedSurname'];
$deasedName = $_POST['deasedName'];
$currentdate3 = date("Y-m-d H:i:s");

$ClaimerPeriod = filter_var($_POST['ClaimerPeriod'], FILTER_SANITIZE_STRING);
$Claimer_name = filter_var($_POST['Claimer_name'], FILTER_SANITIZE_STRING);
$Claimer_IDs = filter_var($_POST['Claimer_IDs'], FILTER_SANITIZE_STRING);
$Claimer_contacts = filter_var($_POST['Claimer_contacts'], FILTER_SANITIZE_STRING);
$Claimer_Genders = filter_var($_POST['Claimer_Genders'], FILTER_SANITIZE_STRING);
$Claimer_Areas = filter_var($_POST['Claimer_Areas'], FILTER_SANITIZE_STRING);
$Claimer_Addresss = filter_var($_POST['Claimer_Addresss'], FILTER_SANITIZE_STRING);
$Claim_dates = filter_var($_POST['Claim_dates'], FILTER_SANITIZE_STRING);
$claimerDoD = filter_var($_POST['claimerDoD'], FILTER_SANITIZE_STRING);
//$prodCode = filter_var($_POST['prodCode'], FILTER_SANITIZE_STRING);
$death_certificate = filter_var($_POST['death_certificate'], FILTER_SANITIZE_STRING);
$D_id = filter_var($_POST['D_id'], FILTER_SANITIZE_STRING);
$deasedSurname = filter_var($_POST['deasedSurname'], FILTER_SANITIZE_STRING);
$deasedName = filter_var($_POST['deasedName'], FILTER_SANITIZE_STRING);

$stmt = $conn->prepare("INSERT INTO claims (Period,Claimer_name,Claimer_IDs,Claimer_contacts,Claimer_Genders,Claimer_Areas,Claimer_Addresss,Claim_dates,DoD,Policy,death_certificate,D_id,deasedName,deasedSurname,_On) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("sssssssssssssss", $ClaimerPeriod, $Claimer_name, $Claimer_IDs, $Claimer_contacts, $Claimer_Genders, $Claimer_Areas, $Claimer_Addresss, $Claim_dates, $claimerDoD, $currentdate3, $death_certificate, $D_id, $deasedName, $deasedSurname, $currentdate3);

if ($stmt->execute()) {
    echo '<script>
    alert("Claim Successfully added")
    window.location.replace("Claims.html");
    </script>';
} else {
    echo "Records not added successfully";
}
$stmt->close();
  
}

//Cashbook_INCOME
if (isset($_POST['save_Cash'])) {

    // Take html names and declare to place holders
 
   /* $prodCategery = $_POST['prodCategery'];
    $prodName = $_POST['prodName'];
    $prodType = $_POST['prodType'];
    $prodWaiting = $_POST['prodWaiting'];*/
    $cashtrans2= $_POST['cashtrans2'];
    $cashFrom = $_POST['cashFrom'];
    $cashRef= $_POST['cashRef'];
    $cashTrans = $_POST['cashTrans'];
    $cashDescription = $_POST['cashDescription'];
    $cashQuantity = $_POST['cashQuantity'];
    $cashPrice = $_POST['cashPrice'];
    $prodPeriod3 = $_POST['cashmonth'] . ' ' . $_POST['cashyear'];
    $currentdate3 = date("Y-m-d H:i:s");
  	$prodAmnt = $_POST['prodAmnt'];

	// Sanitize user inputs

// Retrieve POST data and sanitize user inputs
$cashtrans2 = filter_var($_POST['cashtrans2'], FILTER_SANITIZE_STRING);
$cashFrom = filter_var($_POST['cashFrom'], FILTER_SANITIZE_STRING);
$cashRef = filter_var($_POST['cashRef'], FILTER_SANITIZE_STRING);
$cashTrans = filter_var($_POST['cashTrans'], FILTER_SANITIZE_NUMBER_INT);
$cashDescription = filter_var($_POST['cashDescription'], FILTER_SANITIZE_STRING);
$cashQuantity = filter_var($_POST['cashQuantity'], FILTER_SANITIZE_NUMBER_INT);
$cashPrice = filter_var($_POST['cashPrice'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$prodPeriod3 = filter_var($_POST['cashmonth'], FILTER_SANITIZE_STRING) . ' ' . filter_var($_POST['cashyear'], FILTER_SANITIZE_STRING);
$currentdate3 = date("Y-m-d H:i:s");

// Prepare and execute SQL query
$stmt = $conn->prepare("INSERT INTO income1 (ref_Num, Period, transaction_type, From_TO, description, quantity, price, Amount, Transaction_date, _On) 
                         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssss", $cashRef, $prodPeriod3, $cashTrans, $cashFrom, $cashDescription, $cashQuantity, $cashPrice, $prodAmnt,$cashtrans2,$currentdate3);
$stmt->execute();

// Check for errors and commit or rollback transaction
if (!$stmt->error) {
    mysqli_query($conn, "COMMIT");
    echo '<script>
        alert("Record successfully added")
        window.location.replace("Cashbook.php");
    </script>';
} else {
    mysqli_query($conn, "ROLLBACK");
    echo "Records not added successfully";
}

// Close connection and statement
$stmt->close();
$conn->close();
}

//Cashbook_EXPENSE
if (isset($_POST['save_cash'])) {

    // Take html names and declare to place holders
 
   /* $prodCategery = $_POST['prodCategery'];
    $prodName = $_POST['prodName'];
    $prodType = $_POST['prodType'];
    $prodWaiting = $_POST['prodWaiting'];*/
   $transaction_date = $_POST['transaction_date'];
$E_To = $_POST['E_To'];
$Ref2 = $_POST['Ref2'];
$TransM = $_POST['TransM'];
$Description2 = $_POST['Description2'];
$quantity2 = floatval($_POST['quantity2']);
$Price2 = floatval($_POST['Price2']);
$prodPeriod4 = $_POST['EMonth'] . ' ' . $_POST['EYear'];
$currentdate4 = date("Y-m-d H:i:s");

$prodAmnt = $quantity2 * $Price2;


	// Sanitize user inputs

// Retrieve POST data and sanitize user inputs
$transaction_date = filter_var($_POST['transaction_date'], FILTER_SANITIZE_STRING);
$E_To = filter_var($_POST['E_To'], FILTER_SANITIZE_STRING);
$Ref2 = filter_var($_POST['Ref2'], FILTER_SANITIZE_STRING);
$TransM = filter_var($_POST['TransM'], FILTER_SANITIZE_NUMBER_INT);
$Description2 = filter_var($_POST['Description2'], FILTER_SANITIZE_STRING);
$quantity2 = filter_var($_POST['quantity2'], FILTER_SANITIZE_NUMBER_INT);
$Price2 = filter_var($_POST['Price2'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$prodPeriod4 = filter_var($_POST['EMonth'], FILTER_SANITIZE_STRING) . ' ' . filter_var($_POST['EYear'], FILTER_SANITIZE_STRING);
$currentdate4 = date("Y-m-d H:i:s");

// Prepare and execute SQL query
$stmt = $conn->prepare("INSERT INTO expenses (Period,  _TO, transaction_method, description, quantity, price, Amount, Transaction_date, refNumber, _On) 
                         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssss", $prodPeriod4, $E_To, $TransM, $Description2, $quantity2, $Price2, $prodAmnt, $transaction_date, $Ref2, $currentdate4);
$stmt->execute();

// Check for errors and commit or rollback transaction
if (!$stmt->error) {
    mysqli_query($conn, "COMMIT");
    echo '<script>
        alert("Record successfully added")
        window.location.replace("Cashbook.php");
    </script>';
} else {
    mysqli_query($conn, "ROLLBACK");
    echo "Records not added successfully";
}

// Close connection and statement
$stmt->close();
$conn->close();
}
///Product Additional Benefits

if (isset($_POST['Product_Additional_Benefits'])) {
    // Connect to the database
    $conn = mysqli_connect("localhost", "jeudfra", " ", "root") or die("something wrong happend");

    // Sanitize and validate user input
    $AddBeneName = filter_var($_POST['AddBeneName'], FILTER_SANITIZE_STRING);
    $AddBeneAmonts = filter_var($_POST['AddBeneAmonts'], FILTER_SANITIZE_STRING);
    $AddBenedescription = filter_var($_POST['AddBenedescription'], FILTER_SANITIZE_STRING);
    $prodBenefits1 = filter_var($_POST['prodBenefits1'], FILTER_SANITIZE_STRING);
    $prodCode1 = filter_var($_POST['prodCode1'], FILTER_SANITIZE_STRING);
    $prodName1 = filter_var($_POST['prodName1'], FILTER_SANITIZE_STRING);

    // Validate user input
    if (empty($AddBeneName) || empty($AddBeneAmonts) || empty($AddBenedescription)) {
        die("Invalid input");
    }

    // Prepare and execute the SQL query using prepared statements
$stmt = $conn->prepare("INSERT INTO additional_benefits (product_Code, Policy_Name, benefit_name, addAmount, description, _On) 
                         VALUES (?, ?, ?, ?, ?, ?)");
$current_date_time = date("Y-m-d H:i:s");
$stmt->bind_param("ssssss", $prodCode1, $prodName1, $AddBeneName, $AddBeneAmonts, $AddBenedescription, $current_date_time);
$stmt->execute();

// Check for errors and commit or rollback the transaction
if (!$stmt->error) {
    mysqli_query($conn, "COMMIT");
    echo '<script>
        alert("Record successfully added")
        window.location.replace("AdditionalBenefits.php");
    </script>';
} else {
    mysqli_query($conn, "ROLLBACK");
    echo "Records not added successfully";
}

// Close the database connection and statement
$stmt->close();
$conn->close();

}


if (isset($_POST['Save_Groups'])) {
    $G_year = $_POST['G_year'];
    $G_month = $_POST['G_month'];
    $G_groupName = $_POST['G_groupName'];
    $G_Reg = $_POST['G_Reg'];
    $G_Contact = $_POST['G_Contact'];
    $G_email = $_POST['G_email'];
    $G_Startdate = $_POST['G_Startdate'];
    $G_Termdate = $_POST['G_Termdate'];
    $G_Agreedate = $_POST['G_Agreedate'];
    $Gres_address = $_POST['Gres_address'];
    $G_Norep = $_POST['G_Norep'];
    $FILE_no1 = $_POST['FILE_no1'];
    $G_TYPE = $_POST['G_TYPE'];
    $Status = $_POST['Status'];
    $Slogan = $_POST['Slogan'];
    $Period = $G_month . " " . $G_year;

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "jeudfra";

    // Create a PDO instance
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("INSERT INTO groups (Registration_Number, Gnum, group_name, cellPhone_number, email, group_type, start_date, agreement_date, termination_date, group_address, representatives, _ON, Slogan, Status) 
                          VALUES (:FILE_no1, :G_Reg, :G_groupName, :G_Contact, :G_email, :G_TYPE, :G_Startdate, :G_Agreedate, :G_Termdate, :Gres_address, :G_Norep, :Period, :Slogan, :Status)");

        $stmt->bindParam(':FILE_no1', $FILE_no1);
        $stmt->bindParam(':G_Reg', $G_Reg);
        $stmt->bindParam(':G_groupName', $G_groupName);
        $stmt->bindParam(':G_Contact', $G_Contact);
        $stmt->bindParam(':G_email', $G_email);
        $stmt->bindParam(':G_TYPE', $G_TYPE);
        $stmt->bindParam(':G_Startdate', $G_Startdate);
        $stmt->bindParam(':G_Termdate', $G_Termdate);
        $stmt->bindParam(':G_Agreedate', $G_Agreedate);
        $stmt->bindParam(':Gres_address', $Gres_address);
        $stmt->bindParam(':G_Norep', $G_Norep);
        $stmt->bindParam(':Period', $Period);
        $stmt->bindParam(':Slogan', $Slogan);
        $stmt->bindParam(':Status', $Status);

        if ($stmt->execute()) {
            $rowCount = $stmt->rowCount();
            if ($rowCount > 0) {
                echo '<script>
                    alert("New Group info successfully added");
                    window.location.replace("Group_profile.php");
                </script>';
            } else {
                echo "Group info not inserted";
            }
        } else {
            throw new Exception("Error: " . $stmt->errorInfo()[2]);
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}


?>
