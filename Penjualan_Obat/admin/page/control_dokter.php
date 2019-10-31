<?php
if(isset($_POST['tambah_dokter'])){

$nama_dokter = $_POST['nama_dokter'];
$klinik_dokter = $_POST['klinik_dokter'];
$username_dokter = $_POST['username_dokter'];
$password_dokter = $_POST['password_dokter'];
$id_level_karyawan = $_POST['id_level_karyawan'];
//$id_bagian_k = $_POST['id_bagian_k'];
$cek_session = $_SESSION['username_karyawan'];

$cek_username = mysqli_query($con,"select * from dokter where username_dokter='$username_dokter'");
$cek_usernamee = mysqli_num_rows($cek_username);

if($cek_usernamee > 0){
echo "<script>alert('Username Dokter Tidak Boleh Ada Yang Sama, Mohon Tambahkan Username Dokter Lainnya'); window.location = 'index?p=tambah_dokter'</script>";
} 

if($cek_usernamee == 0){
$sql = "INSERT INTO dokter VALUES('','$username_dokter','$password_dokter','$nama_dokter','$klinik_dokter','$id_level_karyawan','$cek_session',now(),now())";
$w = mysqli_query($con,$sql);
}	

if($w){
echo "<script>alert('Selamat, Data Dokter Berhasil Ditambahkan'); window.location = 'index?p=data_dokter'</script>";
} 

}
?>

<?php
if(isset($_POST['ubah_dokter'])){

$id = $_GET['id'];

$nama_dokter = $_POST['nama_dokter'];
$password_dokter = $_POST['password_dokter'];
$id_level_karyawan = $_POST['id_level_karyawan'];
$klinik_dokter = $_POST['klinik_dokter'];
//$id_bagian_k = $_POST['id_bagian_k'];

$sql = "UPDATE dokter SET 
						password_dokter = '$password_dokter',
						nama_dokter = '$nama_dokter',
						id_level_karyawan = '$id_level_karyawan',
						klinik_dokter = '$klinik_dokter'
						WHERE 
						username_dokter = '$id'";
$result = mysqli_query($con,$sql);

if($result){
echo "<script>alert('Selamat, Data Dokter Telah Berhasil Diubah'); window.location = 'index?p=data_dokter'</script>";	
}		  

}
?>