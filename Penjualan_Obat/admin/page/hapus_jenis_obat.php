<?php
$id = $_GET['id'];

$query = mysqli_query($con,"DELETE FROM jenis_obat WHERE id_jenis_obat='$id'");

if ($query){
	echo "<script>window.location = 'index?p=data_jenis_obat'</script>";	
} else {
	echo "<script>window.location = 'index?p=data_jenis_obat'</script>";	
}
?>