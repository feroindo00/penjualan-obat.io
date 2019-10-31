<?php
$id_jual = $_GET['id_jual'];

$query = mysql_query("DELETE FROM detil_keranjang_resep WHERE id_jual='$id_jual'");

if ($query){
	echo "<script>window.location = 'index?p=tambah_transaksi_resep_test'</script>";	
} else {
	echo "<script>window.location = 'index?p=tambah_transaksi_resep_test'</script>";	
}
?>