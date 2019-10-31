<?php
include '../ctrl/koneksi.php';
$nama_obat = $_GET['nama_obat'];
$query = mysqli_query($koneksi, "select * from obat where nama_obat='$_Get[nama_obat]'");
$querryy = mysqli_fetch_array($query);
$data = array(
			'nama_obat'		=> $querryy['nama_obat'],
            'harga_jual'      =>  $querryy['harga_jual']);
 echo json_encode($data);
?>