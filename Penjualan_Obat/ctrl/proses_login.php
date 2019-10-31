<?php
session_start();

include ("koneksi.php");
date_default_timezone_set('Asia/Jakarta');

$username_karyawan = $_POST['username_karyawan'];
$password_karyawan = $_POST['password_karyawan'];

$query = mysqli_query($con,"select * from karyawan where username_karyawan='$username_karyawan' and password_karyawan='$password_karyawan'");
$row = mysqli_fetch_array($query);

if (mysqli_num_rows($query) > 0) {
	session_start();
    $_SESSION['username_karyawan'] = $row['username_karyawan'];
	header('location:../admin');
} else {
	echo "<script>alert('Username / Password Yang Anda Masukkan Salah'); window.location = '../'</script>";
}
?>