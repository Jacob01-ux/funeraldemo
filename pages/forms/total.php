<?php
include "connection.php";


$num = mysqli_num_rows(mysqli_query($connection, 'select id from premiums'));

echo $num;

?>