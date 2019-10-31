<?php
$id = $_GET['id'];

$query = mysqli_query($con,"DELETE FROM jabatan WHERE id_jabatan_karyawan='$id'");

if ($query){
	echo "<script>window.location = 'index?p=data_jabatan_karyawan'</script>";	
} else {
	echo "<script>window.location = 'index?p=data_jabatan_karyawan'</script>";	
}
?>