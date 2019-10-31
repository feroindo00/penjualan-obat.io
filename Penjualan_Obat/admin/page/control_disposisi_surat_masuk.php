<?php
if(isset($_POST['tambah_disposisi_surat_masuk'])){

$nomor_dsm = $_POST['nomor_dsm'];
$tujuan_dsm = $_POST['tujuan_dsm'];
$keterangan_dsm = $_POST['keterangan_dsm'];
$cek_session = $_SESSION['username_k'];	

$sql = "INSERT INTO tb_disposisi_surat_masuk VALUES('','$nomor_dsm','$tujuan_dsm','$keterangan_dsm','0','','$cek_session',now(),now())";
$w = mysql_query($sql);

if($w){
echo "<script>alert('Selamat, Data Disposisi Surat Masuk Berhasil Ditambahkan'); window.location = 'index?p=data_disposisi_surat_masuk'</script>";
} 

}
?>

<?php
if(isset($_POST['ubah_disposisi_surat_masuk'])){

$id = $_GET['id'];

$tujuan_dsm = $_POST['tujuan_dsm'];
$keterangan_dsm = $_POST['keterangan_dsm'];

$sql = "UPDATE tb_disposisi_surat_masuk SET 
						tujuan_dsm = '$tujuan_dsm',
						keterangan_dsm = '$keterangan_dsm' WHERE 
						id_dsm = '$id'";
$result = mysql_query($sql);

if($result){
echo "<script>alert('Selamat, Data Disposisi Surat Masuk Telah Berhasil Diubah'); window.location = 'index?p=data_disposisi_surat_masuk'</script>";	
}

}
?>