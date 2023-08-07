<head>
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<?php


$host = 'localhost';
$dbname = 'jeudfra';
$username = 'root ';
$password = ' ';


$conn = new mysqli($host, $username, $password, $dbname);




if($_POST['data']=='nothing'){

?>


<?php

}

else if($_POST['data']=='premiums'){
  
  

  
  $query = mysqli_query($conn, 'SELECT DISTINCT premiums.Policy FROM premiums INNER JOIN clients ON premiums.Policy = clients.Policy;');
  $array = mysqli_fetch_array($query);
  $policy = $array['Policy'];
  $num = mysqli_num_rows($query);
?>
<div class="form-group">
<label for="exampleSelectGender">Invoices</label>
  
<select onchange='invsa()' class="form-control" id="specifa" >
  

  <option value='nothing' >select</option>
<?php
    
    foreach($query as $row){
               
          
    
  ?>
  
  <option  > <?php echo $row['Policy'] ?></option>
  <?php  
       
    }
  ?>
  </select>


</div>

<?php
}
else if($_POST['data']=='Credit sales'){
  
  $query = mysqli_query($conn, 'SELECT DISTINCT creditsales.id_ FROM creditsales INNER JOIN clients ON creditsales.id_ = clients._ID;');
  $array = mysqli_fetch_array($query);
?>
<div class="form-group">
<label for="exampleSelectGender">Invoices</label>
<select onchange='invsb()' class="form-control" id="specifb" >

  <option value='nothing' >select</option>
<?php
  foreach ($query as $rows) { 
  ?>
  <option><?php echo $rows['id_'] ?></option>
  <?php
    }
  ?>
  </select>


</div>

<?php

}



else if($_POST['data']=='Cash sales'){

  
  
  $query = mysqli_query($conn, 'SELECT DISTINCT cashsales.id_ FROM cashsales INNER JOIN clients ON cashsales.id_ = clients._ID;');
  $array = mysqli_fetch_array($query);
?>
<div class="form-group">
<label for="exampleSelectGender">Invoices</label>
<select onchange='invsc()' class="form-control" id="specifc" >

  <option value='nothing' >select</option>
<?php
  foreach ($query as $rows) { 
  ?>
  <option><?php echo $rows['id_'] ?></option>
  <?php
    }
  ?>
  </select>


</div>

<?php

}



else if($_POST['data']=='Quotation'){
  
  $query = mysqli_query($conn, 'SELECT DISTINCT quotation.id_ FROM quotation INNER JOIN clients ON quotation.id_ = clients._ID;');
  $array = mysqli_fetch_array($query);
?>
<div class="form-group">
<label for="exampleSelectGender">Invoices</label>
<select onchange='invsd()' class="form-control" id="specifd" >
<option value='nothing' >select</option>
  
<?php
  foreach ($query as $rows) { 
  ?>
  <option><?php echo $rows['id_'] ?></option>
  <?php
    }
  ?>
  </select>


</div>

<?php

}


else if($_POST['data']=='sales'){

$query = mysqli_query($conn, 'SELECT DISTINCT sales_payment.ID FROM sales_payment INNER JOIN clients ON sales_payment.ID = clients._ID;');
  $array = mysqli_fetch_array($query);
  
?>

<div class="form-group">
  
<label for="exampleSelectGender">Invoices</label>
<select onchange='invse()' class="form-control" id="specife" >
<option  >select</option>
<?php
  foreach ($query as $rows) { 
  ?>
  
  <option ><?php echo $rows['ID'] ?></option>
  <?php
    }
  ?>
</select>
</div>

<?php

}









?>


<script>

  
  
  function invsa(){

    
    // Define the variables
var dataToSend = $('#specifa').val();
var request = "premiums";

// Build the URL with variables
var url = "https://mandhagri.co.za/21/pages/forms/specific.php?data=" + encodeURIComponent(dataToSend) + "&request=" + encodeURIComponent(request);

// Redirect to the new page
window.location.href = url;

    
    /*
     $(document).ready(function() {
      // Get the data from the source element
      var dataToSend = $('#specifa').val();
       
	
      // Send the data to another page using AJAX
      $.ajax({
        url: 'specific.php', // Replace with the URL of the destination page
        type: 'POST',
        data: { data: dataToSend, request:'premiums' },
        success: function(response) {
          // Display the returned data in HTML
          $('#results2').html(response);
        },
        error: function() {
          // Handle any errors
          alert('Error occurred while sending the data.');
        }
      });
    });
    */
  }
  
  
  function invsb(){
    
    
    var dataToSend = $('#specifb').val();
var request = "sales";

// Build the URL with variables
var url = "https://mandhagri.co.za/21/pages/forms/specific.php?data=" + encodeURIComponent(dataToSend) + "&request=" + encodeURIComponent(request);

// Redirect to the new page
window.location.href = url;

    /*

     $(document).ready(function() {
      // Get the data from the source element
      var dataToSend = $('#specifb').val();

      // Send the data to another page using AJAX
      $.ajax({
        url: 'specific.php', // Replace with the URL of the destination page
        type: 'GET',
        data: { sale: dataToSend, request:'credit sales' },
        success: function(response) {
          // Display the returned data in HTML
          $('#results2').html(response);
        },
        error: function() {
          // Handle any errors
          alert('Error occurred while sending the data.');
        }
      });
    });
    
    */
  }
  
  
  
  function invsc(){
    
    var dataToSend = $('#specifc').val();
var request = "sales";

// Build the URL with variables
var url = "https://mandhagri.co.za/21/pages/forms/specific.php?data=" + encodeURIComponent(dataToSend) + "&request=" + encodeURIComponent(request);

// Redirect to the new page
window.location.href = url;
    
    /*

    
     $(document).ready(function() {
      // Get the data from the source element
      var dataToSend = $('#specifc').val();

      // Send the data to another page using AJAX
      $.ajax({
        url: 'specific.php', // Replace with the URL of the destination page
        type: 'GET',
        data: { data: dataToSend, request:'cash sales' },
        success: function(response) {
          // Display the returned data in HTML
          $('#results2').html(response);
        },
        error: function() {
          // Handle any errors
          alert('Error occurred while sending the data.');
        }
      });
    });
    
    */
  }
  
  
  
  
  function invsd(){
    
        var dataToSend = $('#specifd').val();
var request = "sales";

// Build the URL with variables
var url = "https://mandhagri.co.za/21/pages/forms/specific.php?data=" + encodeURIComponent(dataToSend) + "&request=" + encodeURIComponent(request);

// Redirect to the new page
window.location.href = url;

    /*

     $(document).ready(function() {
      // Get the data from the source element
      var dataToSend = $('#specifd').val();

      // Send the data to another page using AJAX
      $.ajax({
        url: 'specific.php', // Replace with the URL of the destination page
        type: 'POST',
        data: { data: dataToSend, request:'quotation' },
        success: function(response) {
          // Display the returned data in HTML
          $('#results2').html(response);
        },
        error: function() {
          // Handle any errors
          alert('Error occurred while sending the data.');
        }
      });
    });
    
    */
  }
  
  
  
  

  
  
  function invse(){

        var dataToSend = $('#specife').val();
var request = "sales";

// Build the URL with variables
var url = "https://mandhagri.co.za/21/pages/forms/specific.php?data=" + encodeURIComponent(dataToSend) + "&request=" + encodeURIComponent(request);

// Redirect to the new page
window.location.href = url;

    /*
    
     $(document).ready(function() {
      // Get the data from the source element
      var dataToSend = $('#specife').val();

      // Send the data to another page using AJAX
      $.ajax({
        url: 'specific.php', // Replace with the URL of the destination page
        type: 'POST',
        data: { data: dataToSend, request:'sales' },
        success: function(response) {
          // Display the returned data in HTML
          $('#results2').html(response);
        },
        error: function() {
          // Handle any errors
          alert('Error occurred while sending the data.');
        }
      });
    });
    
    */
    
  } 
</script>  