<?php
$a=mysql_query("delete from keranjang_resep");
if($a){
	echo "<script>window.location = 'index?p=data_transaksi_resep'</script>";
}else{
	echo "<script>window.location = 'index?p=data_transaksi_resep'</script>";
}
$b=mysql_query("delete from detil_keranjang_resep");
if($b){
	echo "<script>window.location = 'index?p=tambah_transaksi_resep_test'</script>";
}else{
	echo "<script>window.location = 'index?p=tambah_transaksi_resep_test'</script>";
}
?>