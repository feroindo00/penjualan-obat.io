<?php
$id_resep_obat=$_GET['id_resep_obat'];
$id_keranjang=$_GET['id_keranjang'];
$jumlah = $_GET['jumlah'];
$qobat = mysqli_query($con,"SELECT * FROM resep_obat WHERE id_resep_obat = '$id_resep_obat'");
$obat = mysqli_fetch_array($qobat);
$stok = $obat['jumlah_obat'] + $jumlah;
mysqli_query($con,"UPDATE resep_obat SET jumlah_obat ='$stok' WHERE id_resep_obat = '$id_resep_obat'");
mysqli_query($con,"DELETE FROM keranjang_resep WHERE id_keranjang = '$id_keranjang'");
echo "<script>window.location = 'index?p=tambah_transaksi_resep_test'</script>"
?>