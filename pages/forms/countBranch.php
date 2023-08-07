<?php
include "connection.php";

$result = mysqli_query($connection, 'SELECT COUNT(*) as total_count FROM groups');
$num = mysqli_fetch_array($result);

if (empty($num['total_count'])) {
    echo '0';
} else {
    echo $num['total_count'];
}

?>