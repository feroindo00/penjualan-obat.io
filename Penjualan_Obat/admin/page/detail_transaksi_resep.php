<?php
	include"../ctrl/koneksi.php";
	$id_jual = $_GET['id'];
	$q=mysql_query("select * from transaksi_jual_resep where id_jual='$id_jual'");
	$data=mysql_fetch_array($q);

	$a=mysql_query("SELECT * FROM detil_transaksi_resepp WHERE id_jual='$id_jual'");
	$emboh=mysql_fetch_array($a);
?>
<div class="container-fluid">
	<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="./">Home</a>
        </li>
        <li class="breadcrumb-item active">Detail Transaksi Resep</li>
      </ol>
    <div class="row">
    	<div class="col-md-4">
    		<table class="table table-condensed">
	    		<tr>
	    			<th>Kode Penjualan</th><td><?php echo $data['id_jual'];?></td>
	    		</tr>
	    		<tr>
	    			<th>Tanggal</th><td><?php echo $data['tanggal'];?></td>	
	    		</tr>
	    	</table>
    	</div>
    	<div class="col-md-4">
    		<table class="table table-condensed">
    			<tr>
    				<th>Total Harga</th><td>Rp.<?php echo number_format($data['total'],2);?></td>
    			</tr>
    			<tr>
    				<th>Pembayaran</th><td>Rp.<?php echo number_format($data['uang'],2);?></td>
    			</tr>
    			<tr>
    				<th>Kembalian</th><td>Rp.<?php echo number_format( $data['kembali'],2);?></td>
    			</tr>
    		</table>
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-10">
    	<div class="table-responsive">
    	<center><table class="table table-bordered" >
		<tr>
			<th><center>No</center></th>
			<th><center>Kode Barang</center></th>
			<th><center>Nama</center></th>
			<th><center>Jumlah</center></th>
			<th><center>harga</center></th>
			<th><center>jumlah harga</center></th>
			
		</tr>
		<?php
		$no = 1;
			$qobt=mysql_query("SELECT detil_transaksi_resep.*,resep_obat.* FROM detil_transaksi_resep INNER JOIN resep_obat ON resep_obat.id_resep_obat = detil_transaksi_resep.id_resep_obat WHERE id_jual='$id_jual'");
			while ($deta=mysql_fetch_array($qobt)){
		?>
		<tr>
			<td><center><?php echo $no++;?></center></td>
			<td><center><?php echo $deta['id_resep_obat']?></center></td>
			<td><center><?php echo $deta['nama_obat']?></center></td>
			<td><center><?php echo $deta['jumlah']?></center></td>
			<td><center>Rp. <?php echo $deta['harga_jual']?>,-</center></td>
			<td><center>Rp. <?php echo $deta['harga']?>,-</center></td>
			
		</tr>
	<?php } ?>
		<tr>
			<th class="text-right" colspan="4">Dokter</th>
			<td><?php echo $emboh['dokter'];?></td>
		</tr>
		<tr>
			<th class="text-right" colspan="4">Nama Pasien</th>
			<td><?php echo $emboh['nama'];?></td>
		</tr>
		<tr>
			<th class="text-right" colspan="4">Rumah Sakit/Klinik</th>
			<td><?php echo $emboh['lokasi'];?></td>
		</tr>
		<tr>
			<th class="text-right" colspan="4">Catatan</th>
			<td><?php echo $emboh['note'];?></td>
		</tr>
		<tr>
			<th class="text-right" colspan="4">Bukti Resep</th>
			<td><center><img src="../files/<?php echo $emboh['upload_resep']; ?>" style="width: 150px;"/></center></td>
		</tr>
	</table></center>
</div>
			<a href="index?p=data_transaksi_resep" class="btn btn-success">kembali</a>
			
			<a href='index?p=hapus_transaksi_resep&id=<?php echo $id_jual;?>' onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Karyawan <?php echo $id_jual;?> ?');" class="btn btn-danger">Hapuss</a>
    </div>
</div>