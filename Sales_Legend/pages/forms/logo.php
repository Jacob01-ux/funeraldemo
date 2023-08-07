<?php

/* Getting file name */
$filename =isset( $_FILES['file']['name']);


if(strlen($filename)>0){
/* Location */
$location = "logo/".$filename;
$uploadOk = 1;

if($uploadOk == 0){
echo 0;
}else{
/* Upload file */
if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){
	echo"<p style='color:green'>Logo uploaded </p>";
}else{
	echo 0;
}
}
}
else{

  echo"<p style='color:red'>Insert logo before submit </p>";

}
?>
