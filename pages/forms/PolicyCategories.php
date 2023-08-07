<?php
include "connection.php";

$result = mysqli_query($connection, 'SELECT COUNT(DISTINCT Type) as total_count FROM policies');
$num = mysqli_fetch_array($result);

if (empty($num['total_count'])) {
    echo '0';
} else {
    echo $num['total_count'];
}

?>