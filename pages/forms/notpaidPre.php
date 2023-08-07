<?php
include "connection.php";


$num = mysqli_num_rows(mysqli_query($connection, 'select _ID from premiumsnotpaid'));

echo $num;

?>