<?php
if(isset($_POST['tambah_pembayaran'])){

$id = $_GET['id'];
$idi = $_GET['idi'];

$harga_periksa_pby = $_POST['harga_periksa_pby'];
$total_harga_pby = $harga_periksa_pby+$harga_o;
$cek_session = $_SESSION['username_k'];

$sql = "INSERT INTO tb_pembayaran VALUES('','$id','$idi','$harga_periksa_pby','$harga_o','$total_harga_pby','$cek_session',now(),now())";
$w = mysql_query($sql);

if($w){
echo "<script>alert('Selamat, Data Pembayaran Berhasil Ditambahkan'); window.location = 'index?p=data_pembayaran'</script>";
} 	  

}
?>