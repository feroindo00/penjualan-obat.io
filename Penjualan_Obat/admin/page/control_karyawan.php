<?php
include "../ctrl/koneksi.php";
if(isset($_POST['tambah_karyawan'])){

$nama_karyawan = $_POST['nama_karyawan'];
$username_karyawan = $_POST['username_karyawan'];
$password_karyawan = $_POST['password_karyawan'];
$id_level_karyawan = $_POST['id_level_karyawan'];
//$id_bagian_k = $_POST['id_bagian_k'];
$cek_session = $_SESSION['username_karyawan'];

$cek_username = mysqli_query($con,"select * from karyawan where username_karyawan='$username_karyawan'");
$cek_usernamee = mysqli_num_rows($cek_username);

if($cek_usernamee > 0){
echo "<script>alert('Username Tidak Boleh Ada Yang Sama, Mohon Tambahkan Username Lainnya'); window.location = 'index?p=tambah_karyawan'</script>";
} 

if($cek_usernamee == 0){
$sql = "INSERT INTO karyawan VALUES('','$username_karyawan','$password_karyawan','$nama_karyawan','$id_level_karyawan','$cek_session',now(),now())";
$w = mysqli_query($con,$sql);
}	

if($w){
echo "<script>alert('Selamat, Data Karyawan Berhasil Ditambahkan'); window.location = 'index?p=data_karyawan'</script>";
} 

}
?>

<?php
include "../ctrl/koneksi.php";
if(isset($_POST['ubah_karyawan'])){

$id = $_GET['id'];

$nama_karyawan = $_POST['nama_karyawan'];
$password_karyawan = $_POST['password_karyawan'];
$id_level_karyawan = $_POST['id_level_karyawan'];
//$id_bagian_k = $_POST['id_bagian_k'];

$sql = "UPDATE karyawan SET 
						password_karyawan = '$password_karyawan',
						nama_karyawan = '$nama_karyawan',
						id_level_karyawan = '$id_level_karyawan'
						WHERE 
						username_karyawan = '$id'";
$result = mysqli_query($con,$sql);

if($result){
echo "<script>alert('Selamat, Data Karyawan Telah Berhasil Diubah'); window.location = 'index?p=data_karyawan'</script>";	
}		  

}
?>