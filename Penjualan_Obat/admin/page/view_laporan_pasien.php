    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Data Laporan</li>
      </ol>
	<a class="btn btn-sm btn-success" data-toggle="modal" data-target="#cari_tanggal" style='width: 100%; color: white;'>Cari Berdasarkan Tanggal</a>
	<br><br>
	  <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Laporan Data Pasien</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nama</th>
				  <th>Alamat</th>
				  <th>Tanggal Input</th>
          <th>Resep Pasien</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nomor</th>
                  <th>Nama</th>
				  <th>Alamat</th>
				  <th>Tanggal Input</th>
          <th>Resep Pasien</th>
                </tr>
              </tfoot>
              <tbody>
			  <?php
				$no = 1;				
				$queryy = "select * from pasien order by id_pasien desc";
				
				if(isset($_POST['cari_tanggal'])){
				$tanggal_awal=$_POST['tanggal_awal'];
				$tanggal_akhir=$_POST['tanggal_akhir'];
				$queryy = "select * from pasien where tanggal_input_pasien NOT IN (0000-00-00) and tanggal_input_pasien between '$tanggal_awal' and '$tanggal_akhir' order by id_pasien desc";
				}
				
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){ 
				$id_pasien = $data['id_pasien'];
				$nama_pasien = $data['nama_pasien'];
				$alamat_pasien = $data['alamat_pasien'];
        $resep_pasien = $data['resep_pasien'];
				$tanggal_input_pasien = $data['tanggal_input_pasien'];
				$tanggal_input_pasienp = $hari[date("w", strtotime($tanggal_input_pasien))].", ".date("j", strtotime($tanggal_input_pasien))." ".$bulan[date("n", strtotime($tanggal_input_pasien))]." ".date("Y", strtotime($tanggal_input_pasien));						                  				
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><a href='index?p=detail_pasien&id=<?php echo $id_pasien;?>'><?php echo $nama_pasien; ?></a></td>
				  <td><?php echo $alamat_pasien; ?></td>
				  <td><?php echo $tanggal_input_pasienp; ?></td>
          <td><?php echo nl2br ($resep_pasien); ?></td>
                </tr>
			  <?php
				$no++; }
			  ?>	
              </tbody>
            </table>
          </div>
        </div>
      </div>
	  
	<center><a href='index?p=unduh_laporan_pasien' class="btn btn-sm btn-warning" style="width: 80%;">Unduh Laporan</a></center><br><br>
	  
	<div class="modal fade" id="cari_tanggal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cari Berdasarkan Tanggal</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
		  <div class="modal-body">
          <form action="index?p=view_laporan_pasien" method="post" role="form">
			<label>Tanggal Awal</label>
            <input name="tanggal_awal" type="date" id="tanggal_awal" class="form-control" style='margin-bottom: 20px;' required autocomplete='off' />
      <label>Tanggal Akhir</label>
			      <input name="tanggal_akhir" type="date" id="tanggal_akhir" class="form-control" style='margin-bottom: 20px;' required autocomplete='off' />
			<center>
			<button type="submit" name="cari_tanggal" class="btn btn-sm btn-primary">Cari</button>
            <button type="reset" class="btn btn-sm btn-danger">Batal</button>
			</center>
		  </form> 	
		  </div>
        </div>
      </div>
    </div>
	</div>
    <!-- /.container-fluid-->