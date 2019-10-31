<?php
$id = $_GET['id'];

$query = mysqli_query($con,"SELECT * FROM dokter WHERE 
											 username_dokter='$id'");
$data  = mysqli_fetch_array($query);
$username_karyawan = $data['username_dokter'];

$cek_session = $_SESSION['username_dokter'];

if($username_karyawan == $cek_session){

$query = mysqli_query($con,"DELETE FROM dokter WHERE username_dokter='$id'");

if ($query){
	session_destroy();
	echo "<script>window.location = './'</script>";	
}
} else {

$queryy = mysqli_query($con,"DELETE FROM dokter WHERE username_dokter='$id'");

if ($queryy){
	echo "<script>window.location = 'index?p=data_dokter'</script>";	
} else {
	echo "<script>window.location = 'index?p=data_dokter'</script>";	
}

}
?>