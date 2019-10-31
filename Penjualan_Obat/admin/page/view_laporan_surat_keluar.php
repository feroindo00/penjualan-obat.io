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
          <i class="fa fa-table"></i> Tabel Data Laporan Surat Keluar</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nomor Surat</th>
				  <th>Tanggal</th>
				  <th>Penerima</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nomor</th>
                  <th>Nomor Surat</th>
				  <th>Tanggal</th>
				  <th>Penerima</th>
                </tr>
              </tfoot>
              <tbody>
			  <?php
				$no = 1;				
				$queryy = "select * from tb_surat_keluar, tb_pengirim_penerima where tb_surat_keluar.penerima_sk=tb_pengirim_penerima.kode_pp order by id_sk desc";
				
				if(isset($_POST['cari_tanggal'])){
				$tanggal_awal=$_POST['tanggal_awal'];
				$tanggal_akhir=$_POST['tanggal_akhir'];
				$queryy = "select * from tb_surat_keluar, tb_pengirim_penerima where tb_surat_keluar.penerima_sk=tb_pengirim_penerima.kode_pp and tanggal_input_sk NOT IN (0000-00-00) and tanggal_input_sk between '$tanggal_awal' and '$tanggal_akhir' order by id_sk desc";
				}
				
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){ 
				  $id_sk = $data['id_sk'];
				  $nomor_sk = $data['nomor_sk'];
				  $tanggal_sk = $data['tanggal_sk'];
				  $tanggal_skk = $hari[date("w", strtotime($tanggal_sk))].", ".date("j", strtotime($tanggal_sk))." ".$bulan[date("n", strtotime($tanggal_sk))]." ".date("Y", strtotime($tanggal_sk));						                  								
				  $penerima_sk = $data['penerima_sk'];
				  $perihal_sk = $data['perihal_sk'];
				  $keterangan_sk = $data['keterangan_sk'];
				  $file_sk = $data['file_sk'];
				  $nama_pp = $data['nama_pp'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><a href='index?p=detail_surat_keluar&id=<?php echo $id_sk;?>'><?php echo $penerima_sk; ?>-<?php echo $nomor_sk; ?></a></td>
				  <td><?php echo $tanggal_skk; ?></td>
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
	  
	<a href='laporan/unduh_laporan_surat_keluar' class="btn btn-sm btn-warning" style="width: 100%;">Unduh Laporan</a><br><br> 

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
          <form action="index?p=view_laporan_surat_keluar" method="post" role="form">
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