    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Data Laporan Penjualan Obat Resep</li>
      </ol>
	<a class="btn btn-sm btn-success" data-toggle="modal" data-target="#cari_tanggal" style='width: 100%; color: white;'>Cari Berdasarkan Tanggal</a>
	<br>
	  <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Laporan Data Penjualan Obat Resep</div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Tanggal</th>
                  <th>Kode Barang</th>
				  <th>Nama</th>
				  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Total_harga</th>
                  
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nomor</th>
                  <th>Tanggal</th>
                  <th>Kode Barang</th>
                  <th>Nama</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Total_harga</th>
                 
                </tr>
              </tfoot>
              <tbody>
			    <?php
        $no = 1;        
        $queryy = "SELECT detil_transaksi_resep.*,resep_obat.*,transaksi_jual_resep.* FROM detil_transaksi_resep INNER JOIN resep_obat ON resep_obat.id_resep_obat = detil_transaksi_resep.id_resep_obat INNER JOIN transaksi_jual_resep on transaksi_jual_resep.id_jual = detil_transaksi_resep.id_jual order by tanggal desc  ";
         
        if(isset($_POST['cari_tanggal'])){
        $tanggal_awal=$_POST['tanggal_awal'];
        $tanggal_akhir=$_POST['tanggal_akhir'];
        $queryy = "SELECT detil_transaksi_resep*,resep_obat.*,transaksi_jual_resep.* FROM detil_transaksi_resep INNER JOIN resep_obat ON resep_obat.id_resep_obat = detil_transaksi_resep.id_resep_obat INNER JOIN transaksi_jual_resep on transaksi_jual_resep.id_jual = detil_transaksi_resep.id_jual where tanggal and tanggal between '$tanggal_awal' and '$tanggal_akhir'";
        }
        $sqll = mysqli_query($con,$queryy) or die(mysqli_error());
        while($data = mysqli_fetch_array($sqll)){ 
        $id = $data['id_jual'];
        $tanggal = $data['tanggal'];
        $id_resep_obat = $data['id_resep_obat'];
        $nama = $data['nama_obat'];
              $jumlah = $data['jumlah'];
            $harga = $data['harga'];
            $total_harga = $data ['harga_jual'];
            //$laba = $data ['laba'];
        $tanggal = $data['tanggal'];
        $tanggall = $hari[date("w", strtotime($tanggal))].", ".date("j", strtotime($tanggal))." ".$bulan[date("n", strtotime($tanggal))]." ".date("Y", strtotime($tanggal));                                      
        ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $tanggal; ?></td>
                  <td><?php echo $id_resep_obat;?></td>
                  <td><?php echo $nama; ?></a></td>
                  <td><?php echo $jumlah; ?></td>
                  <td><?php echo $total_harga; ?></td>
                  <td><?php echo $harga; ?></td>
                  
                  <!--<td><?php echo $laba; ?></td>!-->
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
	  
	<!--<center><a href='index?p=unduh_laporan_penjualan' class="btn btn-sm btn-warning" style="width: 80%;">Unduh Laporan</a></center><br><br><!-->
  <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#cari_tanggall" style='width: 100%; color: white;'>Unduh Laporan</a>
	  
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
          <form action="index?p=view_laporan_penjualan" method="post" role="form">
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
    <div class="modal fade" id="cari_tanggall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cari Berdasarkan Tanggal</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
      <div class="modal-body">
          <form action="index?p=unduh_laporan_penjualan_resep" method="post" role="form">
      <label>Tanggal Awal</label>
            <input name="tanggal_awal" type="date" id="tanggal_awal" class="form-control" style='margin-bottom: 20px;' required autocomplete='off' />
      <label>Tanggal Akhir</label>
            <input name="tanggal_akhir" type="date" id="tanggal_akhir" class="form-control" style='margin-bottom: 20px;' required autocomplete='off' />
      <center>

      <button type="submit" name="cari_tanggal" class="btn btn-sm btn-primary">Cetak Berdasarkan Tanggal</button>
            <button type="reset" class="btn btn-sm btn-danger">Batal</button><br><br>
            <a href='index?p=unduh_semua_laporan_penjualan_resep1' class="btn btn-sm btn-warning" style="width: 80%;">Unduh Semua</a>
      </center>
      </form>   
      </div>
        </div>
      </div>
    </div>
	</div>
    <!-- /.container-fluid-->