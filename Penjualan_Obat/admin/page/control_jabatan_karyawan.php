<?php
if(isset($_POST['tambah_jabatan_karyawan'])){

$level_jabatan_karyawan = $_POST['level_jabatan_karyawan'];

$cek_jabatan = mysqli_query($con,"select * from jabatan where level_jabatan_karyawan='$level_jabatan_karyawan'");
$cek_jabatann = mysqli_num_rows($cek_jabatan);

if($cek_jabatann > 0){
echo "<script>alert('Jabatan Tidak Boleh Ada Yang Sama, Mohon Tambahkan Jabatan Lainnya'); window.location = 'index?p=tambah_jabatan_karyawan'</script>";
} 

if($cek_jabatann == 0){
$sql = "INSERT INTO jabatan VALUES('','$level_jabatan_karyawan')";
$w = mysqli_query($con,$sql);
}	

if($w){
echo "<script>alert('Selamat, Data Jabatan Karyawan Berhasil Ditambahkan'); window.location = 'index?p=data_jabatan_karyawan'</script>";
} 

}
?>

<?php
if(isset($_POST['ubah_jabatan_karyawan'])){

$id = $_GET['id'];

$level_jabatan_karyawan = $_POST['level_jabatan_karyawan'];

$sql = "UPDATE jabatan SET 
						level_jabatan_karyawan = '$level_jabatan_karyawan' WHERE 
						id_jabatan_karyawan = '$id'";
$result = mysqli_query($con,$sql);

if($result){
echo "<script>alert('Selamat, Data Jabatan Karyawan Telah Berhasil Diubah'); window.location = 'index?p=data_jabatan_karyawan'</script>";	
}

}
?>