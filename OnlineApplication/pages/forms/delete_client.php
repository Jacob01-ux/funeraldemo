<?php
// Establish a database connection
$conn = mysqli_connect('localhost', 'ekhonnec_vakhandli_group', 'vakhandli_group', 'ekhonnec_vakhandli_group');

// Check if the connection was successful
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Get the selected policy number from the form
$selectedPolicyNumber = mysqli_real_escape_string($conn, $_POST['PolicyNumber']);

// Check if the form was submitted with confirmation
if (isset($_POST['confirmDelete'])) {
    // Start a transaction to ensure atomicity of the DELETE statements
    mysqli_begin_transaction($conn);
    
    // Prepare the delete query for clients table
    $deleteClientsQuery = "DELETE FROM clients WHERE Policy = '$selectedPolicyNumber'";
    
    // Prepare the delete query for spousedetails table
    $deleteSpouseDetailsQuery = "DELETE FROM spousedetails WHERE Policy = '$selectedPolicyNumber'";
    
    // Prepare the delete query for beneficiaries table
    $deleteBeneficiariesQuery = "DELETE FROM beneficiaries WHERE Policy_number = '$selectedPolicyNumber'";
    
    // Prepare the delete query for additional_members table
    $deleteAdditionalMembersQuery = "DELETE FROM additional_members WHERE Policy_Number = '$selectedPolicyNumber'";
    
    // Perform the delete operation for all tables
    if (mysqli_query($conn, $deleteClientsQuery) && mysqli_query($conn, $deleteSpouseDetailsQuery) && mysqli_query($conn, $deleteBeneficiariesQuery) && mysqli_query($conn, $deleteAdditionalMembersQuery)) {
        // Commit the transaction if all DELETE statements were successful
        mysqli_commit($conn);
         echo '<script>
alert("Record Successfully deleted")
window.location.replace("Client_profile.php");
</script>';
    } else {
        // Rollback the transaction if any of the DELETE statements failed
        mysqli_rollback($conn);
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    // Display confirmation dialog
  
echo '
<style>
  /* Center the form */
  .form-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  /* Add some styles to the form */
  form {
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #87CEEB; /* Updated color */
    text-align: center;
    animation: fadeIn 1s;
  }

  /* Add animation */
  @keyframes fadeIn {
    0% { opacity: 0; }
    100% { opacity: 1; }
  }
</style>

<div class="form-container">
  <form method="POST" action="">
    <p>Are you sure you want to delete the record?</p>
    <input type="hidden" name="PolicyNumber" value="' . htmlspecialchars($selectedPolicyNumber) . '">
    <button type="submit" name="confirmDelete">Yes</button>
    <button type="button" onclick="history.back()">No</button>
  </form>
</div>
';


}

// Close the database connection
mysqli_close($conn);
?>
