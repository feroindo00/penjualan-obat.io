<?php

if(isset($_POST['Tambah_Transaksi_act1'])){
		$tgl=$_POST['tanggal'];
		$nama=$_POST['nama'];
		$harga=$_POST['harga'];
		$jumlah=$_POST['jumlah'];
		$total_pembayaran=$_POST['total_pembayaran'];

	$dt=mysql_query("select * from obat where nama_obat='$nama'")or die(mysql_error());
	$data=mysql_fetch_array($dt);
	$sisa=$data['jumlah_obat']-$jumlah;
	mysql_query("update obat set jumlah_obat='$sisa' where nama_obat='$nama'")or die(mysql_error());

	$modal=$data['harga_suplier'];
	$laba=$harga-$modal;
	$labaa=$laba*$jumlah;
	$total_harga=$harga*$jumlah;
	$sql=mysql_query("insert into transaksi values('','$no','$tgl','$nama','$jumlah','$harga','$total_pembayaran','$total_harga','$labaa')")or die(mysql_error());
}
//if($sql){
//header("location:data_transaksi.php")
//echo "<script>alert('Selamat, Data Obat Berhasil Ditambahkan'); window.location = 'index?p=data_transaksi'</script>";
//}
//else{
//	echo "<script>alert('Selamat, Data Obat  Tidak Berhasil Ditambahkan'); window.location = 'index?p=Tambah_Transaksi1'</script>";

//}
if(isset($_POST['btnTambah'])){
	$kd_obat=$_POST['kd_obat'];
	$harga=$_POST['harga'];
	$jumlah=$_POST['jumlah'];
	if($kd_obat){
		echo "<script>alert('data obat belum diisi silahkan isi kemabali')</script>";
	}
	if($harga){
		echo "<script>alert('data obat belum diisi silahkan isi kemabali')</script>";
	}
	if($harga){
		echo "<script>alert('data obat belum diisi silahkan isi kemabali')</script>";
	}
	$ceksql="select jumlah from obat where kd_obat='$kd_obat'";
	$cekQry=mysql_query($ceksql)or die(mysql_error());
	$cekRow=mysql_fetch_array($cekQry);
	if($cekRow['jumlah'] < $jumlah){
		echo "<script>alert('Stok Obat untuk kode $kd_obat adalah $cekRow[jumlah], tidak dapar dijual! silahkan update obat!')</script>";
	}
	else{
		$tmpsql=("insert into transaksi_tmp (kd_obat, harga, jumlah) values('$kd_obat','$harga','$jumlah')");
		mysql_query($tmpsql)or die (mysql_error());
	}
}

?>