<?php
$id = $_GET['id'];

$alasan_tolak_dsm = $_POST['alasan_tolak_dsm'];

$sql = "UPDATE tb_disposisi_surat_masuk SET 
						terima_tolak_dsm = '2',
						alasan_tolak_dsm = '$alasan_tolak_dsm' WHERE 
						id_dsm = '$id'";
$result = mysql_query($sql);

if($result){
echo "<script>window.location = 'index?p=data_notifikasi'</script>";	
}
?>