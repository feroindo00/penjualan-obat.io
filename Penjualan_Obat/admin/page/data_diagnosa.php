	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Data Diagnosa</li>
      </ol>
	  <a href='index?p=tambah_diagnosa' class="btn btn-sm btn-primary" style="width: 100%;">Tambah</a><br><br>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Diagnosa</div>
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
				$queryy = "select * from tb_diagnosa order by id_d desc";
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){ 
				$id_d = $data['id_d'];
				$nama_d = $data['nama_d'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $nama_d; ?></td>
                  <td><center>
				  <a href='index?p=ubah_diagnosa&id=<?php echo $id_d;?>' class="btn btn-sm btn-success">Ubah</a> 
				  <a href='index?p=hapus_diagnosa&id=<?php echo $id_d;?>' onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Diagnosa <?php echo $nama_d;?> ?');" class="btn btn-sm btn-danger">Hapus</a>
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