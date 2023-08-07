<?php 
	require 'db.php';

	if(isset($_POST['aid'])) {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM books WHERE author_id = " . $_POST['aid']);
		$stmt->execute();
		$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($books);
	}

	function loadAuthors() {
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM groups");
		$stmt->execute();
		$authors = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $authors;
	}

    // function loadBussiness(){
    //     $sql = "SELECT * FROM groups";
    //     $stmt = $connection->prepare($sql);
    //     $stmt->execute();
    //     $businesses = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     return $businesses;
    // }
    // function loadProducts(){
    //     $select ="SELECT * FROM clients WHERE Policy='$Policy' ";
    //     $query =mysqli_query($connection,$select);
    //     $check = mysqli_num_rows($query);
    //     $row = mysqli_fetch_array($query);
    // }

 ?>
 
