<?php
$id = $_GET['id'];

$sql = "UPDATE tb_disposisi_surat_masuk SET 
						terima_tolak_dsm = '1' WHERE 
						id_dsm = '$id'";
$result = mysql_query($sql);

if($result){
echo "<script>window.location = 'index?p=data_notifikasi'</script>";	
}
?>