<?php
$id = $_GET['id'];
$jumlah_obat = $_GET['$jumlah_obat'];
$stok_per_satuan = $_GET['stok_per_satuan'];
$query = "UPDATE obat SET
							jumlah_obat = 0,
							stok_per_satuan = 0
							 WHERE kd_obat='$id'";
$result = mysql_query($query);
if ($result){
	echo "<script>window.location = 'index?p=data_obat'</script>";	
} else {
	echo "<script>window.location = 'index?p=data_obat'</script>";	
}
?>