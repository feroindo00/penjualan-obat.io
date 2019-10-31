<?php
$id = $_GET['id'];
$idi = $_GET['idi'];

$query = mysql_query("DELETE FROM tb_surat_masuk WHERE id_sm='$id'");

unlink('../files/'.$idi.'');

if ($query){
	echo "<script>window.location = 'index?p=data_surat_masuk'</script>";	
} else {
	echo "<script>window.location = 'index?p=data_surat_masuk'</script>";	
}
?>