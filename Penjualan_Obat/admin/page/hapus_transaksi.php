
<?php
$id=$_GET['id'];

$a=mysqli_query($con,"DELETE FROM transaksi_jual WHERE id_jual = '$id'");
$b=mysqli_query($con,"DELETE FROM detil_transaksi WHERE id_jual = '$id'");
if($b){
	echo "<script>window.location = 'index?p=data_transaksi'</script>";
}else{
	echo "<script>window.location = 'index?p=data_transaksi'</script>";
}
?>