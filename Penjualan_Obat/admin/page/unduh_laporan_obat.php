
  <center>
      <img src="../files/logo.png" /><br>
      Klinik Pengobatan Palembang<br>
      Nomor: 445.2 / 04 / 403.210.2013<br>
      Jl. Dr. Sutomo No. 2A Magetan<br>
      Telp. 0351-7703377
      </center>
      <hr>
      <center><b>Laporan Data Obat</b></center><br>
 <div class="table-responsive">
            <table class="table table-bordered" border="1">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th><center>Kode Obat</center></th>
                  <th><center>Nama Obat</center></th>
                  <th><Center>suplier</Center></th>
        				  <th>Harga Suplier</th>
        				  <th>Harga Jual</th>
        				  <th>Jumlah Obat</th>
        				  <th>Jenis Satuan</th>
        				  <th>Tanggal Kadaluarsa</th>
                </tr>
              </thead>
              
              <tbody>
			 <?php
        $no = 1;        
        $queryy = "SELECT * FROM obat, jenis_obat WHERE
                     obat.id_jenis_obat=jenis_obat.id_jenis_obat order by kd_obat asc";
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
                 <td><Center><?php echo $no; ?></Center></td>
                  <td><center><?php echo $kd_obat; ?></center></td>
                  <td><center><?php echo $nama_obat; ?></center></td>
                  <td><center><?php echo $suplier; ?></center></td>
                  <td><center><?php echo $harga_suplier; ?></center></td>
                  <td><center><?php echo $harga_jual; ?></center></td>
                  <td><center><?php echo $jumlah_obat; ?></center></td>
                  <td><center><?php echo $jenis_obat; ?></center></td>
                  <td><center><?php echo $tanggal_kadaluarsa; ?></center></td>
                </tr>
			  <?php
				$no++; }
			  ?>	
              </tbody>
            </table>
          </div>
          <script type="text/javascript">
      window.print();
    </script>