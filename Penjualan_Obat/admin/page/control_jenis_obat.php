<?php
if(isset($_POST['tambah_jenis_obat'])){

$jenis_obat = $_POST['jenis_obat'];

$cek_jabatan = mysqli_query($con,"select * from jenis_obat where jenis_obat='$jenis_obat'");
$cek_jabatann = mysqli_num_rows($cek_jabatan);

if($cek_jabatann > 0){
echo "<script>alert('Jenis Obat Tidak Boleh Ada Yang Sama, Mohon Tambahkan Jenis Obat Lainnya'); window.location = 'index?p=tambah_jenis_obat'</script>";
} 

if($cek_jabatann == 0){
$sql = "INSERT INTO jenis_obat VALUES('','$jenis_obat')";
$w = mysqli_query($con,$sql);
}	

if($w){
echo "<script>alert('Selamat, Data Jenis Obat Berhasil Ditambahkan'); window.location = 'index?p=data_jenis_obat'</script>";
} 

}
?>

<?php
if(isset($_POST['ubah_jenis_obat'])){

$id = $_GET['id'];

$jenis_obat = $_POST['jenis_obat'];

$sql = "UPDATE jenis_obat SET 
						jenis_obat = '$jenis_obat' WHERE 
						id_jenis_obat = '$id'";
$result = mysqli_query($con,$sql);

if($result){
echo "<script>alert('Selamat, Data Jenis Obat Telah Berhasil Diubah'); window.location = 'index?p=data_jenis_obat'</script>";	
}

}
?>