<?php
session_start();

include ("koneksi.php");
date_default_timezone_set('Asia/Jakarta');

$username_dokter = $_POST['username_dokter'];
$password_dokter = $_POST['password_dokter'];

$query = mysql_query("select * from dokter where username_dokter='$username_dokter' and password_dokter='$password_dokter'");
$row = mysql_fetch_array($query);

if (mysql_num_rows($query) > 0) {
	session_start();
    $_SESSION['username_dokter'] = $row['username_dokter'];
	header('location:../admin/index_dokter');
} else {
	echo "<script>alert('Username / Password Yang Anda Masukkan Salah'); window.location = '../index_dokter'</script>";
}
?>