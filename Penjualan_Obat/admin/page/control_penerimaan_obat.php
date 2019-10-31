<?php
if(isset($_POST['tambah_penerimaan'])){
	$kd_obat = $_POST['kd_obat'];
	$nama_obat = $_POST['nama_obat'];
	$jumlah = $_POST['jumlah'];
	$jumlah_obat = $_POST['jumlah_obat'];
	$jumlah_per_satuan = $_POST['jumlah_per_satuan'];
	$harga_suplier = $_POST['harga_suplier'];
	$harga_satuan = $harga_suplier / $jumlah;
	$harga_jual = $harga_satuan*1.1*1.25;
	$harga_jual_apotek = $harga_jual*10;
	$harga_satuann = $harga_satuan;
	$tanggal = date('y-m-d');
	$tanggal_kadaluarsa = $_POST['tanggal_kadaluarsa'];
	$jumlah_obat_update = $jumlah_obat + $jumlah;
	$stok_per_satuan = $jumlah_obat_update * $jumlah_per_satuan;
	$obat_masuk = $jumlah_obat;

	$sql1 = "INSERT INTO penerimaan_obat SET
						kd_obat = '$kd_obat',
						nama_obat = '$nama_obat',
						jumlah = '$jumlah',
						harga_suplier = '$harga_suplier',
						harga_satuan = '$harga_satuann',
						harga_jual = '$harga_jual_apotek',
						tanggal = '$tanggal',
						tanggal_kadaluarsa = '$tanggal_kadaluarsa'";
	$w1 = mysqli_query($con,$sql1);

if($jumlah){
	$harga_satuan = $jumlah_obat/$harga_suplier;
	mysqli_query($con,"UPDATE obat SET 
						harga_suplier = '$harga_suplier',
						harga_satuan = '$harga_satuann',
						harga_jual = '$harga_jual_apotek',
						jumlah_obat = '$jumlah_obat_update',
						stok_per_satuan = '$stok_per_satuan'
				WHERE 
						kd_obat = '$kd_obat' ");
	mysqli_query($con,"INSERT INTO kartu_stock SET
							kd_obat = '$kd_obat',
							tanggal = '$tanggal',
							nama_obat = '$nama_obat',
							jumlah_obat = '$jumlah_obat',
							sisa_stok = '$jumlah_obat_update',
							obat_masuk = '$jumlah'");
}

echo"<script>alert('Selamat, Data Penerimaan Obat Telah Berhasil Disimpan'); window.location = 'index?p=history_penerimaan_obat'</script>";
}
?>