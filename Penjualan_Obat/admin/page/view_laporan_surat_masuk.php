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
          <i class="fa fa-table"></i> Tabel Data Laporan Surat Masuk</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nomor Surat</th>
				  <th>Tanggal</th>
				  <th>Pengirim</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nomor</th>
                  <th>Nomor Surat</th>
				  <th>Tanggal</th>
				  <th>Pengirim</th>
                </tr>
              </tfoot>
              <tbody>
			  <?php
				$no = 1;				
				$queryy = "select * from tb_surat_masuk, tb_pengirim_penerima where tb_surat_masuk.pengirim_sm=tb_pengirim_penerima.kode_pp order by id_sm desc";
				
				if(isset($_POST['cari_tanggal'])){
				$tanggal_awal=$_POST['tanggal_awal'];
				$tanggal_akhir=$_POST['tanggal_akhir'];
				$queryy = "select * from tb_surat_masuk, tb_pengirim_penerima where tb_surat_masuk.pengirim_sm=tb_pengirim_penerima.kode_pp and tanggal_input_sm NOT IN (0000-00-00) and tanggal_input_sm between '$tanggal_awal' and '$tanggal_akhir' order by id_sm desc";
				}
				
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){ 
				  $id_sm = $data['id_sm'];
				  $nomor_sm = $data['nomor_sm'];
				  $tanggal_sm = $data['tanggal_sm'];
				  $tanggal_smm = $hari[date("w", strtotime($tanggal_sm))].", ".date("j", strtotime($tanggal_sm))." ".$bulan[date("n", strtotime($tanggal_sm))]." ".date("Y", strtotime($tanggal_sm));						                  								
				  $pengirim_sm = $data['pengirim_sm'];
				  $perihal_sm = $data['perihal_sm'];
				  $keterangan_sm = $data['keterangan_sm'];
				  $file_sm = $data['file_sm'];
				  $nama_pp = $data['nama_pp'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><a href='index?p=detail_surat_masuk&id=<?php echo $id_sm;?>'><?php echo $pengirim_sm; ?>-<?php echo $nomor_sm; ?></a></td>
				  <td><?php echo $tanggal_smm; ?></td>
				  <td><?php echo $nama_pp; ?></td>
                </tr>
			  <?php
				$no++; }
			  ?>	
              </tbody>
            </table>
          </div>
        </div>
      </div>
	  
	<a href='laporan/unduh_laporan_surat_masuk' class="btn btn-sm btn-warning" style="width: 100%;">Unduh Laporan</a><br><br>
	  
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
          <form action="index?p=view_laporan_surat_masuk" method="post" role="form">
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