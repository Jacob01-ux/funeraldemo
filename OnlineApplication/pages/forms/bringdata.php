<?php
include_once('connection.php');

if(isset($_POST['bringdata'])) {
    $Policy = $_POST['bringdata'];
    echo "Policy: " . $Policy;

    $select ="SELECT * FROM clients WHERE Policy='$Policy' ";
    $query = mysqli_query($connection, $select);
    $check = mysqli_num_rows($query);

    if($check > 0) {
        $row = mysqli_fetch_array($query);
    }
}

if(isset($_POST['update'])) {
    $Customer = $_POST['Customer'];
    $_ID = $_POST['_ID'];
    $Number = $_POST['Number'];
    $Gender = $_POST['Gender'];
    $Nationality = $_POST['Nationality'];
    $Package = $_POST['Package'];
    $PremiumCoverAmount = $_POST['PremiumCoverAmount'];
    $Policy = $_POST['Policy'];
    $status = $_POST['status'];
    $Covered = $_POST['Covered'];
    $Group_Name = $_POST['Group_Name'];
    $email = $_POST['email'];
    $Address = $_POST['Address'];
    $Product_Added_Benefit = $_POST['Product_Added_Benefit'];
    $Marital_Status = $_POST['Marital_Status'];
    $Inception_date = $_POST['Inception_date'];
    $Payment_Date = $_POST['Payment_Date'];
    $Period = $_POST['Period'];

    $update = "UPDATE clients SET Customer='$Customer', _ID='$_ID', Number='$Number', Gender='$Gender', Nationality='$Nationality', Package='$Package', PremiumCoverAmount='$PremiumCoverAmount', Policy='$Policy', status='$status', Covered='$Covered', Group_Name='$Group_Name', email='$email', Address='$Address', Product_Added_Benefit='$Product_Added_Benefit', Marital_Status='$Marital_Status', Inception_date='$Inception_date', Payment_Date='$Payment_Date', Period='$Period' WHERE Policy='$Policy'";
    $result = mysqli_query($connection, $update);

    if($result) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
}
?>
				<form id="now" action="" method="POST">
                         
  								  <div class="col-md-8">
                             <label for="name"><B>Name</B></label>
                          <input type="text"  class="form-control"  name="Customer" value= "<?php echo $row['Customer']?>">
                             </div>
                          
                           
                            <div class="col-md-8">
                             <label for="_ID"><B>ID</B></label>
                          <input type="text"   class="form-control" name="_ID" value= "<?php echo $row['_ID']?>">
                          </div>
                          
                            <div class="col-md-8">
                             <label for="Number"><B>Number</B></label>
                          <input type="text"  class="form-control" name="Number" value= "<?php echo $row['Number']?>">
                          </div>
                              
                            <div class="col-md-8">
                             <label for="Gender"><B>Gender</B></label>
                          <input type="text"  class="form-control" name="Gender" value= "<?php echo $row['Gender']?>">
                          </div>
                          
                            <div class="col-md-8">
                             <label for="Nationality"><B>Nationality</B></label>
                          <input type="text"  class="form-control" name="Nationality" value= "<?php echo $row['Nationality']?>">
                          </div>
                          
                            <div class="col-md-8">
                             <label for="Packege"><B>Package</B></label>
                          <input type="text"  class="form-control"name="Package" value= "<?php echo $row['Package']?>">
                          </div>
                          
                            <div class="col-md-8">
                             <label for="PremiumCoverAmount"><B>Premium Cover Amount</B></label>
                          <input type="text" class="form-control" name="PremiumCoverAmount" value= "<?php echo $row['PremiumCoverAmount']?>">
                          </div>
                          
                            <div class="col-md-8">
                             <label for="Policy"><B>PolicyNumber</B></label>
                          <input type="text"  class="form-control"name="Policy" value= "<?php echo $row['Policy']?>">
                          </div>
                              
                                <div class="col-md-8">
                             <label for="status"><B>Status</B></label>
                          <input type="text"  class="form-control" name="status" value= "<?php echo $row['status']?>">
                          </div> 
                                  
                            <div class="col-md-8">
                             <label for="Covered"><B>Cover</B></label>
                          <input type="text"  class="form-control" name="Covered" value= "<?php echo $row['Covered']?>">
                          </div>
                              
                            <div class="col-md-8">
                             <label for="Group_Name"><B>Group Name</B></label>
                          <input type="text"  class="form-control"name="Group_Name" value= "<?php echo $row['Group_Name']?>">
                          </div>
                          
                            <div class="col-md-8">
                             <label for="email"><B>Email</B></label>
                          <input type="text"  class="form-control"name="email" value= "<?php echo $row['email']?>">
                          </div>
                          
                            <div class="col-md-8">
                             <label for="Address"><B>Address</B></label>
                          <input type="text" class="form-control" name="Address" value= "<?php echo $row['Address']?>">
                          </div>
                              
                                <div class="col-md-8">
                             <label for="Product_Added_Benefit"><B>Product Added Benefit</B></label>
                          <input type="text"  class="form-control"name="Product_Added_Benefit" value= "<?php echo $row['Product_Added_Benefit']?>">
                          </div>     
                                 
                            <div class="col-md-8">
                             <label for="Marital_Status"><B>Marital Status</B></label>
                          <input type="text"  class="form-control"name="Marital_Status" value= "<?php echo $row['Marital_Status']?>">
                          </div>
                          
                            <div class="col-md-8">
                             <label for="Inception_date"><B>Inception Date</B></label>
                          <input type="text" class="form-control" name="Inception_date" value= "<?php echo $row['Inception_date']?>">
                          </div>
                              
                                <div class="col-md-8">
                             <label for="Payment_Date"><B>Payment Date</B></label>
                          <input type="text" class="form-control" name="Payment_Date" value= "<?php echo $row['Payment_Date']?>">
                          </div>
                          
                                 <div class="col-md-8">
                             <label for="Period"><B>Period</B></label>   
                          <input type="text" class="form-control" name="Period" value= "<?php echo $row['Period']?>">
                          </div>
                                
                            <div class="col-md-8">
                             <label for="spouse_Surname"><B>Spouse Surname</B></label>
                          <input type="text"  class="form-control"name="spouse_Surname" value= "<?php echo $row['spouse_Surname']?>">
                          </div>
                          
                            <div class="col-md-8">
                             <label for="spouse_Name"><B>Spouse Name</B></label>
                          <input type="text" class="form-control" name="spouse_Name" value= "<?php echo $row['spouse_Name']?>">
                          </div>
                          
                            <div class="col-md-8">
                             <label for="spouse_ID"><B>Spouse ID</B></label>
                          <input type="text"  class="form-control"name="spouse_ID" value= "<?php echo $row['spouse_ID']?>">
                          </div>
                          
                                <div class="col-md-8">
                             <label for="spouse_Number"><B>Spouse Number</B></label>
                          <input type="text" class="form-control" name="spouse_Number" value= "<?php echo $row['spouse_Number']?>">
                            </div>     
                          
                            <div class="col-md-8">
                             <label for="_By"><B>By</B></label>
                          <input type="text"  class="form-control"name="_By" value= "<?php echo $row['_By']?>">
                          </div>
                          
                            <div class="col-md-8">
                             <label for="_On"><B>On</B></label>
                          <input type="text"  class="form-control"name="_On" value= "<?php echo $row['_On']?>">
                          </div>
                         <br><br>
    							<input type="submit"  class="btn btn-light" name="update" value="UPDATE DATA">
                          <button class="btn btn-light" onclick="printContent()">Print</button>
					
                           </form>


  
