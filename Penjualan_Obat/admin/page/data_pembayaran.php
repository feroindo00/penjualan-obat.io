	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Data Pemeriksaan</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Pemeriksaan</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nama</th>
				  <th>Pengaturan</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nomor</th>
                  <th>Nama</th>
				  <th>Pengaturan</th>
                </tr>
              </tfoot>
              <tbody>
			  <?php
				$no = 1;				
				$queryy = "select * from tb_pemeriksaan, tb_pasien where tb_pemeriksaan.id_p_pks=tb_pasien.id_p and status_pks=1 order by id_pks desc";
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){ 
				$id_pks = $data['id_pks'];
				$id_p = $data['id_p'];
				$nama_p = $data['nama_p'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><a href='index?p=detail_pasien&id=<?php echo $id_p;?>'><?php echo $nama_p; ?></a></td>
                  <td><center>
				  <?php
				  $cek_bayar = mysql_query("select * from tb_pembayaran where id_pks_pby='$id_pks'");
				  $data = mysql_fetch_array($cek_bayar);
				  $cek_bayarr = mysql_num_rows($cek_bayar);	
				  $id_pby = $data['id_pby']; 
				  
				  if($cek_bayarr > 0){  
				  ?>
				  <a href='index?p=detail_pembayaran&id=<?php echo $id_pby;?>' class="btn btn-sm btn-warning">Detail Bayar</a>
				  <?php
				  }
				  if($cek_bayarr == 0){  
				  ?>
				  <a href='index?p=tambah_pembayaran&id=<?php echo $id_pks;?>&idi=<?php echo $id_p;?>' class="btn btn-sm btn-warning">Bayar</a> 
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