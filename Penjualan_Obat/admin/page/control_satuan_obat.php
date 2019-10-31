<?php
if(isset($_POST['tambah_satuan_obat'])){

$satuan = $_POST['satuan'];

$cek_satuan = mysql_query("select * from satuan_obat where satuan='$satuan'");
$cek_satuann = mysql_num_rows($cek_satuan);

if($cek_satuann > 0){
echo "<script>alert('Satuan Obat Tidak Boleh Ada Yang Sama, Mohon Tambahkan Jenis Obat Lainnya'); window.location = 'index?p=tambah_satuan_obat'</script>";
} 

if($cek_satuann == 0){
$sql = "INSERT INTO jenis_satuan VALUES('','$satuan')";
$wb = mysql_query($sql);
}	

if($wb){
echo "<script>alert('Selamat, Data Jenis Satuan Obat Berhasil Ditambahkan'); window.location = 'index?p=data_satuan_obat'</script>";
} 

}
?>

<?php
if(isset($_POST['ubah_satuan_obat'])){

$id = $_GET['id'];

$satuan_obat = $_POST['satuan_obat'];

$sql = "UPDATE satuan_obat SET 
						satuan_obat = '$satuan_obat' WHERE 
						id_satuan_obat = '$id'";
$result = mysql_query($sql);

if($result){
echo "<script>alert('Selamat, Data Jenis Satuan Obat Telah Berhasil Diubah'); window.location = 'index?p=data_satuan_obat'</script>";	
}

}
?>