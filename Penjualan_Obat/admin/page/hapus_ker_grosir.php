<?php
$kd_obat=$_GET['kd_obat'];
$id_keranjang=$_GET['id_keranjang'];
$jumlah = $_GET['jumlah'];
$qobat = mysqli_query($con,"SELECT * FROM obat WHERE kd_obat = '$kd_obat'");
$obat = mysqli_fetch_array($qobat);
$stok = $obat['jumlah_obat'] + $jumlah;
$stoksatuan = $obat['stok_per_satuan'] + $jumlah;
mysqli_query($con,"UPDATE obat sET jumlah_obat ='$stok', stok_per_satuan='$stoksatuan' WHERE kd_obat = '$kd_obat'");
mysqli_query($con"DELETE FROM keranjang WHERE id_keranjang = '$id_keranjang'");
echo "<script>window.location = 'index?p=tambah_transaksi_grosir'</script>";

?>