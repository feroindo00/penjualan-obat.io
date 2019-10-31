<?php
$a=mysqli_query($con,"delete from keranjang_resep");
if($a){
	echo "<script>window.location = 'index?p=tambah_transaksi_resep_test'</script>";
}else{
	echo "<script>window.location = 'index?p=tambah_transaksi_resep_test'</script>";
}
$b=mysqli_query($con,"delete from detil_keranjang_resep");
if($b){
	echo "<script>window.location = 'index?p=tambah_transaksi_resep_test'</script>";
}else{
	echo "<script>window.location = 'index?p=tambah_transaksi_resep_test'</script>";
}
?>