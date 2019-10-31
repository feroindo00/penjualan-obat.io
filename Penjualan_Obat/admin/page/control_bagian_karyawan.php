<?php
if(isset($_POST['tambah_bagian_karyawan'])){

$nama_bk = $_POST['nama_bk'];

$cek_bagian = mysql_query("select * from tb_bagian_karyawan where nama_bk='$nama_bk'");
$cek_bagiann = mysql_num_rows($cek_bagian);

if($cek_bagiann > 0){
echo "<script>alert('Bagian Tidak Boleh Ada Yang Sama, Mohon Tambahkan Bagian Lainnya'); window.location = 'index?p=tambah_bagian_karyawan'</script>";
} 

if($cek_bagiann == 0){
$sql = "INSERT INTO tb_bagian_karyawan VALUES('','$nama_bk')";
$w = mysql_query($sql);
}	

if($w){
echo "<script>alert('Selamat, Data Bagian Karyawan Berhasil Ditambahkan'); window.location = 'index?p=data_bagian_karyawan'</script>";
} 

}
?>

<?php
if(isset($_POST['ubah_bagian_karyawan'])){

$id = $_GET['id'];

$nama_bk = $_POST['nama_bk'];

$sql = "UPDATE tb_bagian_karyawan SET 
						nama_bk = '$nama_bk' WHERE 
						id_bk = '$id'";
$result = mysql_query($sql);

if($result){
echo "<script>alert('Selamat, Data Bagian Karyawan Telah Berhasil Diubah'); window.location = 'index?p=data_bagian_karyawan'</script>";	
}

}
?>