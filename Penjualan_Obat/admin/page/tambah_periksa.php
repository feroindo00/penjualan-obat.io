<?php
$id = $_GET['id'];
$cek_session = $_SESSION['username_k'];

$sql = "INSERT INTO tb_pemeriksaan VALUES('','$id','','','','','0','$cek_session',now(),now())";
$w = mysql_query($sql);

if($w){
echo "<script>alert('Selamat, Data Pasien Telah Berhasil Di Tempatkan Pada Bagian Pemeriksaan'); window.location = 'index?p=data_pasien'</script>";
} 
?>