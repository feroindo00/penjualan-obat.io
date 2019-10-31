<hr>
<div class="row">  
  <div class="col-md-3">
    <center><img src="../files/logo.png" style="
    width: 140px;
"/></center>
  </div>
  <div class="col-md-5">
    <center style="
    margin-left: 50px;
">
<h4>Laporan Data Stok Obat Resep</h4>
     Klinik Pengobatan Palembang<br>
      Nomor: 445.2 / 04 / 403.210.2013<br>
      Jl. Dr. Sutomo No. 2A Magetan<br>
      Telp. 0351-7703377
    </center>
  </div>
</div>
      <hr>
      <center><b>Laporan Data Stok Obat Resep</b></center><br>
 <?php 
      $sql="select * from resep_obat where jumlah_obat <=10";
      $result= mysqli_query($con,$sql)or die(mysqli_error());
      while($data=mysqli_fetch_array($result)){  
        if($data['jumlah_obat']<=10){  
          ?>  
          <script>
            $(document).ready(function(){
              $('#pesan_sedia').css("color","red");
              $('#pesan_sedia').append("<span class='fa fa-asterisk'></span>");
            });
          </script>
          <?php
          echo "<div style='padding:5px' class='alert alert-warning'><span class='fa fa-fw fa-exclamation-triangle'></span> Stok  <a style='color:red'>". $data['nama_obat']."</a> yang tersisa sudah kurang dari 10 . silahkan pesan lagi !!</div>"; 
        }
      }
      ?>
 <div class="table-responsive">
            <table class="table table-bordered" border="1">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th><center>Kode Obat</center></th>
                  <th><center>Nama Obat</center></th>
                  <th><Center>suplier</Center></th>
        				  <th>Jumlah Obat</th>
        				  <th>Jenis Satuan</th>
        				  <th>Tanggal Kadaluarsa</th>
                </tr>
              </thead>
              
              <tbody>
			 <?php
        $no = 1;        
        $queryy = "SELECT * FROM resep_obat, jenis_obat WHERE
                     resep_obat.id_jenis_obat=jenis_obat.id_jenis_obat order by nama_obat";
        $sqll = mysqli_query($con,$queryy) or die(mysqli_error());
        while($data = mysqli_fetch_array($sqll)){
        $id_resep_obat = $data['id_resep_obat'];
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
                  <td><center><?php echo $id_resep_obat; ?></center></td>
                  <td><center><?php echo $nama_obat; ?></center></td>
                  <td><center><?php echo $suplier; ?></center></td>
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