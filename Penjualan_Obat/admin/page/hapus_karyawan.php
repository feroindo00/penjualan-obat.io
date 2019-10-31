<?php
$id = $_GET['id'];

$query = mysqli_query($con,"SELECT * FROM karyawan WHERE 
											 username_karyawan='$id'");
$data  = mysqli_fetch_array($query);
$username_karyawan = $data['username_karyawan'];

$cek_session = $_SESSION['username_karyawan'];

if($username_karyawan == $cek_session){

$query = mysqli_query($con,"DELETE FROM karyawan WHERE username_karyawan='$id'");

if ($query){
	session_destroy();
	echo "<script>window.location = './'</script>";	
}
} else {

$queryy = mysqli_query($con,"DELETE FROM karyawan WHERE username_karyawan='$id'");

if ($queryy){
	echo "<script>window.location = 'index?p=data_karyawan'</script>";	
} else {
	echo "<script>window.location = 'index?p=data_karyawan'</script>";	
}

}
?>