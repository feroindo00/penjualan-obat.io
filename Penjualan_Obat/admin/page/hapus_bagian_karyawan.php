<?php
$id = $_GET['id'];

$query = mysql_query("DELETE FROM tb_bagian_karyawan WHERE id_bk='$id'");

if ($query){
	echo "<script>window.location = 'index?p=data_bagian_karyawan'</script>";	
} else {
	echo "<script>window.location = 'index?p=data_bagian_karyawan'</script>";	
}
?>