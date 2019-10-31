<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Load Obat</li>
      </ol>
<div clas="col-md-6">
	<form action="" class="form-inline" method="post">
	
<br>
 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"method="post">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Kode Obat</th>
                  <th>Nama Obat</th>
                  <th>suplier</th>
        				  <th>Harga Suplier</th>
        				  <th>Harga Jual</th>
        				  <th>Jumlah Obat</th>
        				  <th>Jenis Satuan</th>
        				  <th>Tanggal Kadaluarsa</th>
        				  <th>Pengaturan</th>
                </tr>
              </thead>
              
              </tfoot>
              <tbody>
			  <?php
				$no = 1;				
				$queryy ="SELECT * FROM obat, jenis_obat WHERE
                     obat.id_jenis_obat=jenis_obat.id_jenis_obat order by nama_obat asc";
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){
				$kd_obat = $data['kd_obat'];
				$nama_obat = $data['nama_obat'];
				$suplier = $data['suplier'];
				$harga_suplier = $data['harga_suplier'];
				$harga_jual = $data['harga_jual'];
				$jumlah_obat = $data['jumlah_obat'];
				 $id_jenis_obat = $data['id_jenis_obat'];
        $jenis_obat = $data['jenis_obat'];
				$tanggal_kadaluarsa = $data['tanggal_kadaluarsa'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $kd_obat; ?></td>
                  <td><?php echo $nama_obat; ?></td>
                  <td><?php echo $suplier; ?></td>
                  <td><?php echo $harga_suplier; ?></td>
                  <td><?php echo $harga_jual; ?></td>
        				  <td><?php echo $jumlah_obat; ?></td>
        				  <td><?php echo $jenis_obat; ?></td>
        				  <td><?php echo $tanggal_kadaluarsa; ?></td>
                  <td><center>
				  <a href='index?p=Tambah_Transaksi_action&id=<?php echo $kd_obat;?>' class="btn btn-sm btn-success"method="post">Pilih</a> 
				 
				  </center></td>
                </tr>
			  <?php
				$no++; }
			  ?>	
              </tbody>
            </table>
            </form>
</div>
</div>