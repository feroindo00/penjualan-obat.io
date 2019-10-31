<?php
if(isset($_POST['tambah_pasien'])){

$nama_pasien = $_POST['nama_pasien'];
$umur_pasien = $_POST['umur_pasien'];
$jenis_kelamin_pasien = $_POST['jenis_kelamin_pasien'];
$tanggal_lahir_pasien = $_POST['tanggal_lahir_pasien'];
$tempat_lahir_pasien = $_POST['tempat_lahir_pasien'];
$alamat_pasien = $_POST['alamat_pasien'];
$resep_pasien = $_POST['resep_pasien'];
$keterangan = $_POST['keterangan'];
$jenis_pasien = $_POST['jenis_pasien'];
$nama_dokter = $_POST['nama_dokter'];
$klinik = $_POST ['klinik'];
$cek_session = $_SESSION['username_karyawan'];

$sql = "INSERT INTO resep_pasien VALUES('','$nama_pasien','$umur_pasien','$jenis_kelamin_pasien','$tanggal_lahir_pasien','$tempat_lahir_pasien','$alamat_pasien','$resep_pasien','$keterangan','$jenis_pasien','$nama_dokter','$klinik','$cek_session',now(),now())";
$w = mysql_query($sql);

if($w){
echo "<script>alert('Selamat, Data Resep Pasien Berhasil Ditambahkan'); window.location = 'index?p=data_pasien'</script>";
} 

}
?>

<?php
if(isset($_POST['ubah_pasien'])){

$id = $_GET['id'];

$nama_pasien = $_POST['nama_pasien'];
$jenis_kelamin_pasien = $_POST['jenis_kelamin_pasien'];
$tempat_lahir_pasien = $_POST['tempat_lahir_pasien'];
$tanggal_lahir_pasien = $_POST['tanggal_lahir_pasien'];
$alamat_pasien = $_POST['alamat_pasien'];
$resep_pasien = $_POST['resep_pasien'];
$keterangan = $_POST['keterangan'];
$jenis_pasien = $_POST['jenis_pasien'];
$nama_dokter = $_POST['nama_dokter'];
$klinik	= $_POST['klinik'];

$sql = "UPDATE resep_pasien SET 
						nama_pasien = '$nama_pasien',
						jenis_kelamin_pasien = '$jenis_kelamin_pasien',
						tempat_lahir_pasien = '$tempat_lahir_pasien',
						tanggal_lahir_pasien = '$tanggal_lahir_pasien', 
						alamat_pasien = '$alamat_pasien',
						resep_pasien = '$resep_pasien',
						keterangan = '$keterangan',
						jenis_pasien = '$jenis_pasien',
						nama_dokter = '$nama_dokter',
						klinik = '$klinik'
						WHERE 
						id_pasien = '$id'";
$result = mysql_query($sql);

if($result){
echo "<script>alert('Selamat, Data Resep Pasien Telah Berhasil Diubah'); window.location = 'index?p=data_pasien'</script>";	
}		  

}
?>