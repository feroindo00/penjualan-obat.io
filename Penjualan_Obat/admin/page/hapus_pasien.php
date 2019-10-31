<?php
$id = $_GET['id'];

$query = mysql_query("DELETE FROM resep_pasien WHERE id_pasien='$id'");

if ($query){
	echo "<script>window.location = 'index?p=data_pasien'</script>";	
} else {
	echo "<script>window.location = 'index?p=data_pasien'</script>";	
}
?>