<?php
$tgl=$_POST['tanggal'];
$nama=$_POST['nama'];
$harga=$_POST['harga'];
$jumlah=$_POST['jumlah'];

$dt=mysql_query("select * from obat where nama_obat='$nama'")or die(mysql_error());
$data=mysql_fetch_array($dt);
$sisa=$data['jumlah_obat']-$jumlah;
mysql_query("update obat set jumlah_obat='$sisa' where nama_obat='$nama'")or die(mysql_error());

$modal=$data['harga_suplier'];
$laba=$harga-$modal;
$labaa=$laba*$jumlah;
$total_harga=$harga*$jumlah;
$pilih= count($tgl, $nama, $jumlah, $harga, $total_harga, $labaa);

$query=mysql_query("insert into transaksi values('','$tgl','$nama','$jumlah','$harga','$total_harga','$labaa')")or die(mysql_error());
for($i=0;$i<$count;$i++){

	$query = "('{')"

}
//header("location:data_transaksi.php")
echo "<script>alert('Selamat, Data Obat Berhasil Ditambahkan'); window.location = 'index?p=data_transaksi'</script>";
}
?>