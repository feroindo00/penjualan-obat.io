<?php
$id = $_GET['id'];

$query = mysql_query("DELETE FROM tb_disposisi_surat_masuk WHERE id_dsm='$id'");

if ($query){
	echo "<script>window.location = 'index?p=data_disposisi_surat_masuk'</script>";	
} else {
	echo "<script>window.location = 'index?p=data_disposisi_surat_masuk'</script>";	
}
?>