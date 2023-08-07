<?php
include "connection.php";


$num = mysqli_fetch_array(mysqli_query($connection, 'select Total from tombstone ORDER BY ID ASC LIMIT 1'));

echo $num['Total'];

?>