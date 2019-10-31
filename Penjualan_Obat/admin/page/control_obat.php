<?php
if(isset($_POST['tambah_obat'])){

$kd_obat 	= $_POST['kd_obat'];
$nama_obat = $_POST['nama_obat'];
$suplier = $_POST['suplier'];
$harga_suplier= $_POST['harga_suplier'];
$harga_jual = $_POST['harga_jual'];
$harga_satuan = $_POST['harga_satuan'];
$jumlah_obat = $_POST['jumlah_obat'];
$jumlah_pemasukan = $_POST['jumlah_pemasukan'];
$id_jenis_obat = $_POST['id_jenis_obat'];
$satuan = $_POST['satuan'];
$jumlah_per_satuan = $_POST['jumlah_per_satuan'];
$stok_per_satuan = $jumlah_obat*$jumlah_per_satuan;
$tanggal_kadaluarsa = $_POST['tanggal_kadaluarsa'];
$sisa_stok = $jumlah_obat;
$obat_masuk = $jumlah_obat;
$tanggal = date('y-m-d');

$sql = "INSERT INTO obat (kd_obat,nama_obat,suplier,harga_suplier,harga_jual,harga_satuan,jumlah_obat,jumlah_pemasukan,id_jenis_obat,satuan,jumlah_per_satuan,stok_per_satuan,tanggal_kadaluarsa) VALUES('$kd_obat','$nama_obat','$suplier','$harga_suplier','$harga_jual','$harga_satuan','$jumlah_obat','$jumlah_pemasukan','$id_jenis_obat','$satuan','$jumlah_per_satuan','$stok_per_satuan','$tanggal_kadaluarsa')";
$w = mysqli_query($con,$sql);

$sql2 = "INSERT INTO kartu_stock SET
								kd_obat='$kd_obat',
								tanggal='$tanggal',
								nama_obat='$nama_obat',
								jumlah_obat='$jumlah_obat',
								sisa_stok='$sisa_stok',
								obat_masuk='$obat_masuk'";
$e = mysqli_query($con,$sql2);

if($w){
echo "<script>alert('Selamat, Data Obat Berhasil Ditambahkan'); window.location = 'index?p=data_obat'</script>";
}
if($e){
echo "<script>alert('Selamat, Data Obat beserta Katu Stock Berhasil Ditambahkan'); window.location = 'index?p=data_obat'</script>";
}

}
?>

<?php
if(isset($_POST['ubah_obat'])){

$id = $_GET['id'];

$kd_obat = $_POST['kd_obat'];
$nama_obat = $_POST['nama_obat'];
$suplier = $_POST['suplier'];
$harga_suplier = $_POST['harga_suplier'];
$harga_jual = $_POST['harga_jual'];
$harga_satuan = $_POST['harga_satuan'];
$jumlah_obat = $_POST['jumlah_obat'];
$jumlah_pemasukan = $_POST['jumlah_pemasukan'];
$id_jenis_obat = $_POST['id_jenis_obat'];
$satuan = $_POST['satuan'];
$jumlah_per_satuan = $_POST['jumlah_per_satuan'];
$stok_per_satuan = $jumlah_obat*$jumlah_per_satuan;
$tanggal_kadaluarsa = $_POST['tanggal_kadaluarsa'];
$tanggal = date('y-m-d');
$jumlah = $_POST['jumlah_obat_update'];
$jumlah_obat_updatee = $_POST['jumlah_obat_update'] + $jumlah_obat;
$obat_masuk = $jumlah;
$obat_masukk=$jumlah_obat;
$sisa_stok = $jumlah_obat_updatee+$jumlah_obat;
$stok_per_satuann = $jumlah_obat_updatee * $jumlah_per_satuan;

$sql = "UPDATE obat SET 
					kd_obat = '$kd_obat',
					nama_obat = '$nama_obat',
					suplier = '$suplier',
					harga_suplier = '$harga_suplier',
					harga_jual = '$harga_jual',
					harga_satuan = '$harga_satuan',
					jumlah_obat = '$jumlah_obat',
					jumlah_pemasukan = '$jumlah_pemasukan',
					id_jenis_obat = '$id_jenis_obat',
					satuan = '$satuan',
					jumlah_per_satuan = '$jumlah_per_satuan',
					stok_per_satuan = '$stok_per_satuan',
					tanggal_kadaluarsa = '$tanggal_kadaluarsa'
					WHERE 
					kd_obat = '$id'";
$result = mysqli_query($con,$sql);
if($result){
echo "<script>alert('Selamat, Data Obat Telah Berhasil Diubah'); window.location = 'index?p=data_obat'</script>";	
}



if($jumlah){
	mysqli_query($con,"UPDATE obat SET 
					
					jumlah_obat = '$jumlah_obat_updatee',
					stok_per_satuan = '$stok_per_satuann'
					
					
					WHERE 
					kd_obat = '$id'");
	mysqli_query($con,"INSERT INTO kartu_stock SET
								kd_obat='$kd_obat',
								tanggal='$tanggal',
								nama_obat='$nama_obat',
								jumlah_obat='$jumlah_obat',
								sisa_stok='$jumlah_obat_updatee',
								obat_masuk='$obat_masuk'");
}
elseif($jumlah_obat=$_POST['jumlah_obat']){
	mysql_query($con,"INSERT INTO kartu_stock SET
								kd_obat='$kd_obat',
								tanggal='$tanggal',
								nama_obat='$nama_obat',
								jumlah_obat='$jumlah_obat',
								sisa_stok='$jumlah_obat',
								obat_masuk='$obat_masukk'");
}
else{

	echo"<script>alert('Selamat, Data Obat Telah Berhasil Diubah'); window.location = 'index?p=data_obat'</script>";
}

}
?>