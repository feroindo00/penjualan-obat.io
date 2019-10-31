<?php
if(isset($_POST['tambah_pemeriksaan'])){

$id = $_GET['id'];

$keluhan_pks = $_POST['keluhan_pks'];
$id_d_pks = $_POST['id_d_pks'];
$tindakan_pks = $_POST['tindakan_pks'];
$id_o_pks = $_POST['id_o_pks'];

$sql = "UPDATE tb_pemeriksaan SET 
						keluhan_pks = '$keluhan_pks',
						id_d_pks = '$id_d_pks',
						tindakan_pks = '$tindakan_pks',
						id_o_pks = '$id_o_pks',
						status_pks = '1' WHERE 
						id_pks = '$id'";
$result = mysql_query($sql);

if($result){
echo "<script>alert('Selamat, Data Pemeriksaan Telah Berhasil Ditambah'); window.location = 'index?p=data_pemeriksaan'</script>";	
}		  

}
?>