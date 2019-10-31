<?php
//error_reporting(E_ALL ^ E_DEPRECATED);

date_default_timezone_set('Asia/Jakarta');

$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"apotek");
?>