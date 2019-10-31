<?php
$id = $_GET['id'];

$query = mysql_query("DELETE FROM tb_diagnosa WHERE id_d='$id'");

if ($query){
	echo "<script>window.location = 'index?p=data_diagnosa'</script>";	
} else {
	echo "<script>window.location = 'index?p=data_diagnosa'</script>";	
}
?>