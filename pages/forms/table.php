<?php
session_start();
$policyNumber = $_POST['policyNumber'];

// Database connection
$host = "localhost";
$dbname = "jeudfra";
$username = "root";
$password = "";

$dsn = "mysql:host=$host;dbname=$dbname";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $connection = new PDO($dsn, $username, $password, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Query to retrieve beneficiaries based on policy number
$sql = "SELECT * FROM beneficiaries WHERE Policy_Number = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$policyNumber]);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<?php if(count($result) > 0): ?>
  <table class="table">
    <thead class="thead-light">
      <tr>
        <th scope="col">Name(s)</th>
        <th scope="col">Surname</th>
        <th scope="col">ID</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($result as $row): ?>
        <tr>
          <td><?php echo $row['Name']; ?></td>
          <td><?php echo $row['surname']; ?></td>
          <td><?php echo $row['_ID']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php else: ?>
  <h5 style="margin-bottom: 0em; margin-top: 1em; font-size: smaller"><b>:NONE</b></h5>
<?php endif; ?>
