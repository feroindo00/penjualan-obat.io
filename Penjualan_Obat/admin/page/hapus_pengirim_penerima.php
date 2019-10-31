<?php
$id = $_GET['id'];

$query = mysql_query("DELETE FROM tb_pengirim_penerima WHERE id_pp='$id'");

if ($query){
	echo "<script>window.location = 'index?p=data_pengirim_penerima'</script>";	
} else {
	echo "<script>window.location = 'index?p=data_pengirim_penerima'</script>";	
}
?>