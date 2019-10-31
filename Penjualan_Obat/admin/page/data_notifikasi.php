    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Data Notifikasi Disposisi Surat Masuk</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Notifikasi Disposisi Surat Masuk</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nomor Surat</th>
				  <th>Keterangan</th>
				  <th>Pengaturan</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nomor</th>
                  <th>Nomor Surat</th>
				  <th>Keterangan</th>
				  <th>Pengaturan</th>
                </tr>
              </tfoot>
              <tbody>
			  <?php
			    $cek_session = $_SESSION['username_k'];
				$no = 1;				
				$queryy = "select * from tb_disposisi_surat_masuk, tb_surat_masuk, tb_pengirim_penerima where tb_disposisi_surat_masuk.nomor_dsm=tb_surat_masuk.nomor_sm and tb_surat_masuk.pengirim_sm=tb_pengirim_penerima.kode_pp and tujuan_dsm='$cek_session' order by id_dsm desc";
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){ 
				  $id_dsm = $data['id_dsm'];
				  $id_sm = $data['id_sm'];
				  $nomor_dsm = $data['nomor_dsm'];
				  $keterangan_dsm = $data['keterangan_dsm'];
				  $kode_pp = $data['kode_pp'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><a href='index?p=detail_surat_masuk&id=<?php echo $id_sm;?>'><?php echo $kode_pp; ?>-<?php echo $nomor_dsm; ?></a></td>
				  <td><?php echo $keterangan_dsm; ?></td>
				  <td><center>
				  <?php
				  $cek_terima_dsm = mysql_query("select * from tb_disposisi_surat_masuk where id_dsm='$id_dsm'");
				  $data = mysql_fetch_array($cek_terima_dsm); 
				  $terima_tolak_dsm = $data['terima_tolak_dsm'];
				  $alasan_tolak_dsm = $data['alasan_tolak_dsm'];

				  if($terima_tolak_dsm == '1'){
				  ?>
				  Telah Anda Terima
				  <?php
				  } 			  
				  if($terima_tolak_dsm == '2'){
				  ?>
				  Telah Anda Tolak Dengan Alasan <?php echo $alasan_tolak_dsm; ?>
				  <?php
				  } 
				  if($terima_tolak_dsm == '0'){
				  ?>
				  <a href='index?p=terima_disposisi&id=<?php echo $id_dsm;?>' class="btn btn-sm btn-success">Terima</a> 
				  <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#tolak_disposisi" style='color: white;'>Tolak</a>
                  <?php
				  }
				  ?>
				  </center></td>
				</tr>
			  <?php
				$no++; }
			  ?>	
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
	
	<div class="modal fade" id="tolak_disposisi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Alasan Menolak Disposisi</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
		  <form action="index?p=tolak_disposisi&id=<?php echo $id_dsm;?>" method="post" role="form">
		  <div class="modal-body">
          <div class="form-group">
            <textarea class="form-control" type='text' name="alasan_tolak_dsm" id="alasan_tolak_dsm" placeholder="Masukkan Alasan Disini ..." required autocomplete='off'></textarea>
          </div>
		  </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-primary">OK</button>
            <button type="reset" class="btn btn-sm btn-danger">Batal</button>
          </div>
		  </form>
        </div>
      </div>
    </div>