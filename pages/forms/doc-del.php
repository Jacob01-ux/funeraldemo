<?php

$host = 'localhost';
$dbname = 'jeudfra';
$username = 'root ';
$password = ' ';

$admin = $_POST['admin'];

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE 
        FROM documents
        WHERE id = $admin";

$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {
  echo '<script>
  window.location.replace("upload.php");
          </script>';
} else {
  die("Error deleting record: " . $conn->error);
}
header("Location: upload.php");