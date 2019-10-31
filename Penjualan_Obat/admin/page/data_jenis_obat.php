	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Data Jenis Kemasan</li>
      </ol>
	  <a href='index?p=tambah_jenis_obat' class="btn btn-sm btn-primary" style="width: 100%;">Tambah</a><br><br>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Jenis Obat</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Jenis Kemasan</th>
				  <th>Pengaturan</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nomor</th>
                  <th>Jenis Kemasan</th>
				  <th>Pengaturan</th>
                </tr>
              </tfoot>
              <tbody>
			  <?php
				$no = 1;				
				$queryy = "select * from jenis_obat order by id_jenis_obat asc";
				$sqll = mysqli_query($con,$queryy) or die(mysqli_error());
				while($data = mysqli_fetch_array($sqll)){ 
				$id_jenis_obat = $data['id_jenis_obat'];
				$jenis_obat = $data['jenis_obat'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $jenis_obat; ?></td>
                  <td><center>
				  <a href='index?p=ubah_jenis_obat&id=<?php echo $id_jenis_obat;?>' class="btn btn-sm btn-success">Ubah</a> 
				  <a href='index?p=hapus_jenis_obat&id=<?php echo $id_jenis_obat;?>' onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Jabatan <?php echo $jenis_obat;?> ?');" class="btn btn-sm btn-danger">Hapus</a>
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