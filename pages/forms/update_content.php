<?php
session_start();
// Connect to the database
$connection = new PDO("mysql:host=localhost;dbname=ekhonnec_JeudfraBS", "ekhonnec_JeudfraBS", "JeudfraBS33@");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the updated content from the POST parameters
  $updatedContent = $_POST["updatedContent"];

  // Sanitize and validate the input
  // ...

  // Update the content in the database
  $sql = "UPDATE termsandconditions SET description = :content WHERE id = :id";
  $stmt = $connection->prepare($sql);
  $stmt->bindParam(":content", $updatedContent);
  $stmt->bindParam(":id", $_SESSION["recordId"]);
  $stmt->execute();

  // Return a success response to the client-side
  echo "Content updated successfully";
}

header("Location: rreportss.php");
exit();
?>
