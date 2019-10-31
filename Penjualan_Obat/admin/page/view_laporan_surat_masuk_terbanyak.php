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
          <i class="fa fa-table"></i> Tabel Data Laporan Surat Masuk Terbanyak</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nomor</th>
				  <th>Pengirim</th>
				  <th>Jumlah</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nomor</th>
				  <th>Pengirim</th>
				  <th>Jumlah</th>
                </tr>
              </tfoot>
              <tbody>
			  <?php
				$no = 1;				
				$queryy = "select *, count(pengirim_sm) as jumlah_smt from tb_surat_masuk, tb_pengirim_penerima where tb_surat_masuk.pengirim_sm=tb_pengirim_penerima.kode_pp group by pengirim_sm order by jumlah_smt desc";
				
				if(isset($_POST['cari_tanggal'])){
				$tanggal_awal=$_POST['tanggal_awal'];
				$tanggal_akhir=$_POST['tanggal_akhir'];
				$queryy = "select *, count(pengirim_sm) as jumlah_smt from tb_surat_masuk, tb_pengirim_penerima where tb_surat_masuk.pengirim_sm=tb_pengirim_penerima.kode_pp and tanggal_input_sm NOT IN (0000-00-00) and tanggal_input_sm between '$tanggal_awal' and '$tanggal_akhir' group by pengirim_sm order by jumlah_smt desc";
				}
				
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){ 
				  $nama_pp = $data['nama_pp'];
				  $jumlah_smt = $data['jumlah_smt'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
				  <td><?php echo $nama_pp; ?></td>
				  <td><?php echo $jumlah_smt; ?></td>
                </tr>
			  <?php
				$no++; }
			  ?>	
              </tbody>
            </table>
          </div>
        </div>
      </div>
	  
	<a href='laporan/unduh_laporan_surat_masuk_terbanyak' class="btn btn-sm btn-warning" style="width: 100%;">Unduh Laporan</a><br><br>  

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
          <form action="index?p=view_laporan_surat_masuk_terbanyak" method="post" role="form">
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