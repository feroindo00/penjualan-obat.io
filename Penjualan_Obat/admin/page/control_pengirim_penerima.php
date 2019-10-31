<?php
if(isset($_POST['tambah_pengirim_penerima'])){

$kode_pp = $_POST['kode_pp'];
$nama_pp = $_POST['nama_pp'];
$keterangan_pp = $_POST['keterangan_pp'];
$cek_session = $_SESSION['username_k'];	

$cek_kode = mysql_query("select * from tb_pengirim_penerima where kode_pp='$kode_pp'");
$cek_kodee = mysql_num_rows($cek_kode);

if($cek_kodee > 0){
echo "<script>alert('Kode Tidak Boleh Ada Yang Sama, Mohon Tambahkan Kode Lainnya'); window.location = 'index?p=tambah_pengirim_penerima'</script>";
} 

if($cek_kodee == 0){
$sql = "INSERT INTO tb_pengirim_penerima VALUES('','$kode_pp','$nama_pp','$keterangan_pp','$cek_session',now(),now())";
$w = mysql_query($sql);
}	

if($w){
echo "<script>alert('Selamat, Data Pengirim & Penerima Surat Berhasil Ditambahkan'); window.location = 'index?p=data_pengirim_penerima'</script>";
} 

}
?>

<?php
if(isset($_POST['ubah_pengirim_penerima'])){

$id = $_GET['id'];

$kode_pp = $_POST['kode_pp'];
$nama_pp = $_POST['nama_pp'];
$keterangan_pp = $_POST['keterangan_pp'];

$sql = "UPDATE tb_pengirim_penerima SET 
						kode_pp = '$kode_pp',
						nama_pp = '$nama_pp',
						keterangan_pp = '$keterangan_pp' WHERE 
						id_pp = '$id'";
$result = mysql_query($sql);

if($result){
echo "<script>alert('Selamat, Data Pengirim & Penerima Surat Telah Berhasil Diubah'); window.location = 'index?p=data_pengirim_penerima'</script>";	
}

}
?>