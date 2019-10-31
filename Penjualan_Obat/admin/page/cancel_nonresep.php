<?php
$a=mysqli_query("TRUNCATE TABLE keranjang");
if($a){
	echo "<script>window.location = 'index?p=tambah_transaksi_test'</script>";
}else{
	echo "<script>window.location = 'index?p=tambah_transaksi_test'</script>";
}
?>