<?php
if(isset($_POST['tambah_resep_obat'])){

$id_resep_obat 	= $_POST['id_resep_obat'];
$nama_obat = $_POST['nama_obat'];
$suplier = $_POST['suplier'];
$harga_suplier= $_POST['harga_suplier'];
$harga_jual = $_POST['harga_jual'];
$jumlah_obat = $_POST['jumlah_obat'];
$jumlah_pemasukan = $_POST['jumlah_pemasukan'];
$id_jenis_obat = $_POST['id_jenis_obat'];
$satuan = $_POST['satuan'];
$tanggal_kadaluarsa = $_POST['tanggal_kadaluarsa'];

$sql = "INSERT INTO resep_obat VALUES('$id_resep_obat','$nama_obat','$suplier','$harga_suplier','$harga_jual','$jumlah_obat','$jumlah_pemasukan','$id_jenis_obat','$satuan','$tanggal_kadaluarsa')";
$w = mysqli_query($con,$sql);

$sql2= "INSERT INTO kartu_stock_resep SET
								id_resep_obat='$id_resep_obat',
								tanggal='$tanggal',
								nama_obat='$nama_obat',
								jumlah_obat='$jumlah_obat',
								sisa_stok='$sisa_stok',
								obat_masuk='$obat_masuk'";
$e=mysqli_query($con,$sql2);

if($w){
echo "<script>alert('Selamat, Data Obat Khusus Resep Berhasil Ditambahkan'); window.location = 'index?p=data_resep_obat'</script>";
} 
if($e){
	echo "<script>alert('Selamat, Data Obat Resep beserta Katu Stock Resep Berhasil Ditambahkan'); window.location = 'index?p=data_resep_obat'</script>";
}

}
?>

<?php
if(isset($_POST['ubah_resep_obat'])){

$$id_resep_obat 	= $_POST['id_resep_obat'];
$nama_obat = $_POST['nama_obat'];
$suplier = $_POST['suplier'];
$harga_suplier = $_POST['harga_suplier'];
$harga_jual = $_POST['harga_jual'];
$jumlah_obat = $_POST['jumlah_obat'];
$jumlah_pemasukan = $_POST['jumlah_pemasukan'];
$id_jenis_obat = $_POST['id_jenis_obat'];
$satuan = $_POST['satuan'];
$tanggal_kadaluarsa = $_POST['tanggal_kadaluarsa'];
$tanggal = date('y-m-d');
$sisa_stok=$jumlah_obat;
$obat_masuk=$jumlah_obat;
$sql = "UPDATE resep_obat SET 
					nama_obat = '$nama_obat',
					suplier = '$suplier',
					harga_suplier = '$harga_suplier',
					harga_jual = '$harga_jual',
					jumlah_obat = '$jumlah_obat',
					jumlah_pemasukan = '$jumlah_pemasukan',
					id_jenis_obat = '$id_jenis_obat',
					satuan = '$satuan',
					tanggal_kadaluarsa = '$tanggal_kadaluarsa' WHERE 
					id_resep_obat = '$id_resep_obat'";
$result = mysqli_query($con,$sql);

$sql2="INSERT INTO kartu_stock_resep SET
								id_resep_obat='$id_resep_obat',
								tanggal='$tanggal',
								nama_obat='$nama_obat',
								jumlah_obat='$jumlah_obat',
								sisa_stok='$sisa_stok',
								obat_masuk='$obat_masuk'";
$result2 = mysqli_query($con,$sql2);

if($result){
echo "<script>alert('Selamat, Data Obat Khusus Resep Telah Berhasil Diubah'); window.location = 'index?p=data_resep_obat'</script>";	
}
if($result2){
	echo "<script>alert('Selamat, Data Obat Khusus Resep Telah Berhasil Diubah'); window.location = 'index?p=data_resep_obat'</script>";
}

}
?>