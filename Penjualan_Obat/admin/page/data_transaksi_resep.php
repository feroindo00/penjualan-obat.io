<div class="container-fluid">
	<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="./">Home</a>
        </li>
        <li class="breadcrumb-item active"><b>DATA TRANSAKSKI DENGAN RESEP</b></li>
      </ol>
      <!--<div class="row">
      	<div class="col-md-6">
      		<a href='index?p=data_transaksi'class="btn btn-sm btn-primary" style="width: 100%;">Transaksi Non-Resep</a>
      	
      	</div>
      		<div class="col-md-6">
      		<button class="btn btn-sm btn-primary" disabled="disabled><a href='index?p=data_transaksi' value="disabled" style="width: 100%;">Transaksi Resep</a></button>
      	</div>
      </div><br>-->
	<!--breadcumb end-->
	<a href='index?p=tambah_transaksi_resep_test'class="btn btn-sm btn-success" style="width: 100%;">Tambah Transaksi Resep</a><br><br>
	<!-- Example DataTables Card-->
	<div class="card mb-3">
		<div class="card-header">
			<i class="fa fa-table"> Tabel Data Transaksi Dengan Resep </i><br>
		</div>
		<div class="card_body">
			<div class="table-responsive">
				<table class="table table-bordered"id="dataTable" width="100%" cellspacing="0" >
					<thead>
						<tr>
							<th>Nomor</th>
							<th>Kode Penjualan</th>
							<th>Total Harga</th>
							<th>Pembayaran</th>
							<th>Kembali</th>
							<th>Tanggal</th>
							<th>Opsi</th>
						</tr>
					</thead><br>
					<tbody>
					<?php
						$no = 1;				
						$queryy = "select * from transaksi_jual_resep order by id_jual desc";
						$sqll = mysqli_query($con,$queryy) or die(mysqli_error());
						while($data = mysqli_fetch_array($sqll)){ 
						$id_jual = $data['id_jual'];
						$total = $data['total'];
						$uang = $data['uang'];
						$kembali = $data['kembali'];
						$tanggal=$data['tanggal'];
						
					  ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $id_jual?></td>
								<td><?php echo $total?></td>
								<td><?php echo $uang?></td>
								<td><?php echo $kembali?></td>
								<td><?php echo $tanggal ?></td>
								<td>
									<a href='index?p=detail_transaksi_resep&id=<?php echo $id_jual;?>' class="btn btn-sm btn-success"method="post">Detail</a> 
									
									<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='index?p=hapus_transaksi_resep&id=<?php echo $id_jual;?>' }" class="btn btn-sm btn-danger" style="font:white">Hapus</a>
								</td>
							</tr>

							<?php 
						}
						?>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
