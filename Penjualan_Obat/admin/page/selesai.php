<?php
$a=mysqli_query($con,"delete from keranjang");
if($a){
	echo "<script>window.location = 'index?p=data_transaksi'</script>";
}else{
	echo "<script>window.location = 'index?p=data_transaksi'</script>";
}
?>