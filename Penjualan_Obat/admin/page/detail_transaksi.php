<?php
	include"../ctrl/koneksi.php";
	$id_jual = $_GET['id'];
	$q=mysqli_query($con,"select * from transaksi_jual where id_jual='$id_jual'");
	$data=mysqli_fetch_array($q);
?>
<div class="container-fluid">
	<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="./">Home</a>
        </li>
        <li class="breadcrumb-item active">Detail Transaksi</li>
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
			<th>No</th>
			<th>Kode Barang</th>
			<th>Nama</th>
			<th>Jumlah</th>
			<th>harga</th>
			<th>jumlah harga</th>
			
		</tr>
		<?php
		$no = 1;
			$qobt=mysqli_query($con,"SELECT detil_transaksi.*,obat.* FROM detil_transaksi INNER JOIN obat ON obat.kd_obat = detil_transaksi.kd_obat WHERE id_jual='$id_jual'");
			while ($deta=mysqli_fetch_array($qobt)){
		?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $deta['kd_obat']?></td>
			<td><?php echo $deta['nama_obat']?></td>
			<td><?php echo $deta['jumlah']?></td>
			<td>Rp. <?php echo $deta['harga_jual']?>,-</td>
			<td>Rp. <?php echo $deta['harga']?>,-</td>
			
		</tr>
	<?php } ?>
		<tr>
			<th class="text-right" colspan="5">Total Harga</th>
			<td>Rp.<?php echo number_format($data['total'],2);?></td>
		</tr>
	</table></center>
</div>
			<a href="index?p=data_transaksi" class="btn btn-success">kembali</a>
			<a href="index?p=cetak_transaksi&id=<?php echo $id_jual;?>" class="btn btn-success"><span class="fa fa-print"></span></a>
			<a href='index?p=hapus_transaksi&id=<?php echo $id_jual;?>' onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Karyawan <?php echo $id_jual;?> ?');" class="btn btn-sm btn-danger">Hapuss</a>
    </div>
</div>