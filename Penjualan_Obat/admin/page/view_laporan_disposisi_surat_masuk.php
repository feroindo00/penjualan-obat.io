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
          <i class="fa fa-table"></i> Tabel Data Laporan Disposisi Surat Masuk</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nomor Surat</th>
				  <th>Tujuan Disposisi</th>
				  <th>Keterangan</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nomor</th>
                  <th>Nomor Surat</th>
				  <th>Tujuan Disposisi</th>
				  <th>Keterangan</th>
                </tr>
              </tfoot>
              <tbody>
			  <?php
				$no = 1;				
				$queryy = "select * from tb_disposisi_surat_masuk, tb_karyawan, tb_surat_masuk where tb_disposisi_surat_masuk.tujuan_dsm=tb_karyawan.username_k and tb_disposisi_surat_masuk.nomor_dsm=tb_surat_masuk.nomor_sm order by id_dsm desc";
				
				if(isset($_POST['cari_tanggal'])){
				$tanggal_awal=$_POST['tanggal_awal'];
				$tanggal_akhir=$_POST['tanggal_akhir'];
				$queryy = "select * from tb_disposisi_surat_masuk, tb_karyawan, tb_surat_masuk where tb_disposisi_surat_masuk.tujuan_dsm=tb_karyawan.username_k and tb_disposisi_surat_masuk.nomor_dsm=tb_surat_masuk.nomor_sm and tanggal_input_dsm NOT IN (0000-00-00) and tanggal_input_dsm between '$tanggal_awal' and '$tanggal_akhir' order by id_dsm desc";
				}
				
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){ 
				  $id_dsm = $data['id_dsm'];
				  $nomor_dsm = $data['nomor_dsm'];
				  $keterangan_dsm = $data['keterangan_dsm'];
				  $id_sm = $data['id_sm'];
				  $pengirim_sm = $data['pengirim_sm'];
				  $nama_k = $data['nama_k'];					  
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><a href='index?p=detail_surat_masuk&id=<?php echo $id_sm;?>'><?php echo $pengirim_sm; ?>-<?php echo $nomor_dsm; ?></a></td>
				  <td><?php echo $nama_k; ?></td>
				  <td><?php echo $keterangan_dsm; ?></td>
                </tr>
			  <?php
				$no++; }
			  ?>	
              </tbody>
            </table>
          </div>
        </div>
      </div>
	  
	<a href='laporan/unduh_laporan_disposisi_surat_masuk' class="btn btn-sm btn-warning" style="width: 100%;">Unduh Laporan</a><br><br> 
	
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
          <form action="index?p=view_laporan_disposisi_surat_masuk" method="post" role="form">
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