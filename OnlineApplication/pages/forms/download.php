<?php
include 'session_handler.php';
$host = 'localhost';
$dbname = 'ekhonnec_vakhandli_group';
$username = 'ekhonnec_vakhandli_group';
$password = 'vakhandli_group';

$dsn = "mysql:host=$host;dbname=$dbname";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$table = $_SESSION['table'];

$result = array();
try {
    $connection = new PDO($dsn, $username, $password, $options);

    $stmt = $connection->prepare("SELECT * FROM $table"); // use the $table variable in the query
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}
 
?>

<!DOCTYPE html>
<html lang="en">


<head>
  <!-- Required meta tags --> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Melody Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>
<div class="col-12">
    
    <?php if (empty($result)) { ?>
        <p style="font-size: 4em; text-align: center;">No data found.</p>
    <?php } else { ?>
        <h1 style="font-size: 2em; text-align: center;"><?php echo strtoupper($table); ?></h1>
  <br><br>
        <div class="table-responsive">
            <table id="order-listing" class="table table-bordered">
                <thead>
                    <tr>
                        <?php
                            $headers = $result[0];
                            $first_col_header = array_keys($headers)[0];
                            foreach ($headers as $key => $value) {
                                echo "<th>" . htmlspecialchars($key) . "</th>";
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($result as $row) { ?>
                        <tr>
                            <?php
                                foreach ($row as $key => $value) {
                                    echo "<td>" . htmlspecialchars($value) . "</td>";
                                    if ($key == $first_col_header) {
                                        $first_col_value = $value;
                                    }
                                }
                            ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>
</div>
<div class="buttons">
    <button class="btn btn-primary mr-2" onclick="printTable()">Print</button>
    <button class="btn btn-light" onclick="downloadTable()">Download as PDF</button>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script>
    function printTable() {
        window.print();
    }

   function downloadTable() {
    var table = document.querySelector("#order-listing");
    html2canvas(table).then(function(canvas) {
        var pdf = new jsPDF('p', 'mm', 'a4');
        var pageWidth = pdf.internal.pageSize.getWidth();
        var pageHeight = pdf.internal.pageSize.getHeight();
        var tableWidth = table.offsetWidth;
        var tableHeight = table.offsetHeight;
        var widthRatio = pageWidth / tableWidth;
        var heightRatio = pageHeight / tableHeight;
        var optimalRatio = Math.min(widthRatio, heightRatio);

        // Add header
        pdf.setFontSize(18);
        pdf.setFontStyle('bold');
        pdf.text('<?php echo strtoupper($table); ?>', pageWidth / 2, 20, { align: 'center' });

        // Add table image
        pdf.addImage(canvas, 'PNG', 0, 30, tableWidth * optimalRatio, tableHeight * optimalRatio);

        pdf.save('<?php echo $table ?>.pdf');
    });
}
</script>
