	<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Data Resep Pasien</li>
      </ol>
	  <center><a href='index?p=data_transaksi_resep'target="_blank"class="btn btn-sm btn-success" style='width: 80%; color: white;'>Tambah</a></center><br>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabel Data Resep Pasien</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nama</th>
				  <th>Alamat</th>
          <th>Resep Pasien</th>
          <th>keterangan</th>
          <th>jenis pasiesn</th>
            <th>Dokter</th>
          <th>Klinik</th>
				  
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nomor</th>
                  <th>Nama</th>
				  <th>Alamat</th>
          <th>Resep Pasien</th>
           <th>keterangan</th>
          <th>jenis pasiesn</th>
          <th>Dokter</th>
          <th>Klinik</th>
				  
                </tr>
              </tfoot>
              <tbody>
			  <?php
				$no = 1;				
				$queryy = "select * from resep_pasien order by id_pasien desc";
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){ 
				$id_pasien = $data['id_pasien'];
				$nama_pasien = $data['nama_pasien'];
				$alamat_pasien = $data['alamat_pasien'];
        $resep_pasien = $data['resep_pasien'];
         $keterangan = $data['keterangan'];
        $jenis_pasien = $data['jenis_pasien'];
          $nama_dokter = $data['nama_dokter'];
        $klinik = $data['klinik'];
			  ?>
                <tr>
                  <td><center><?php echo  $no; ?></center></td>
                  <td><?php echo $nama_pasien; ?></td>
				  <td><?php echo $alamat_pasien; ?></td>
          <td><?php echo nl2br ($resep_pasien); ?></td>
            <td><?php echo $keterangan; ?></td>
          <td><?php echo $jenis_pasien;?></td>
          <td><?php echo $nama_dokter?></td>
          <td><?php echo $klinik?></td>
                  <!--<td><center>
				 <!-- <?php
				  $cek_periksa = mysql_query("select * from tb_pemeriksaan where id_p_pks='$id_pasien' and status_pks=0");
				  $cek_periksaa = mysql_num_rows($cek_periksa);			  
				  
				  if($cek_periksaa > 0){  
				  ?>
				  
				  <?php
				  }
				  if($cek_periksaa == 0){  
				  ?>
				  <a href='index?p=tambah_periksa&id=<?php echo $id_pasien;?>' class="btn btn-sm btn-warning">Periksa</a>
				  <?php
				  }
				  ?>!-->
          <!--<a href='index?p=proses_pasien'class="btn btn-sm btn-success" target='_blank'>Proceed</a>!-->
				  <!--<a href='index?p=ubah_pasien&id=<?php echo $id_pasien;?>' class="btn btn-sm btn-success">Ubah</a>!-->
				  <!--<a href='index?p=hapus_pasien&id=<?php echo $id_pasien;?>' onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Pasien <?php echo $nama_pasien;?> ?');" class="btn btn-sm btn-danger">Hapus</a>!-->
				  <!--</center></td>!-->
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