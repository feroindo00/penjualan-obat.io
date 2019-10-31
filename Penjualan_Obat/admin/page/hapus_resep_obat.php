<?php
$id = $_GET['id'];
$jumlah_obat = $_GET['$jumlah_obat'];
$query = "UPDATE resep_obat SET
							jumlah_obat = 0
							 WHERE id_resep_obat='$id'";
$result = mysql_query($query);
if ($result){
	echo "<script>window.location = 'index?p=data_resep_obat'</script>";	
} else {
	echo "<script>window.location = 'index?p=data_resep_obat'</script>";	
}
?>