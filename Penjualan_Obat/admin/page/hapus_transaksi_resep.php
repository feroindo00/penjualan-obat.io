
<?php
$id=$_GET['id'];

$a=mysql_query("DELETE FROM transaksi_jual_resep WHERE id_jual = '$id'");
$b=mysql_query("DELETE FROM detil_transaksi_resep WHERE id_jual = '$id'");
if($b){
	echo "<script>window.location = 'index?p=data_transaksi_resep'</script>";
}else{
	echo "<script>window.location = 'index?p=data_transaksi_resep'</script>";
}
?>