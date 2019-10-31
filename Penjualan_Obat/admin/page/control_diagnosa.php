<?php
if(isset($_POST['tambah_diagnosa'])){

$nama_d = $_POST['nama_d'];

$sql = "INSERT INTO tb_diagnosa VALUES('','$nama_d')";
$w = mysql_query($sql);

if($w){
echo "<script>alert('Selamat, Data Diagnosa Berhasil Ditambahkan'); window.location = 'index?p=data_diagnosa'</script>";
} 

}
?>

<?php
if(isset($_POST['ubah_diagnosa'])){

$id = $_GET['id'];

$nama_d = $_POST['nama_d'];

$sql = "UPDATE tb_diagnosa SET 
						nama_d = '$nama_d' WHERE 
						id_d = '$id'";
$result = mysql_query($sql);

if($result){
echo "<script>alert('Selamat, Data Diagnosa Berhasil Diubah'); window.location = 'index?p=data_diagnosa'</script>";	
}

}
?>