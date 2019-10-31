<?php
include "../../ctrl/koneksi.php";
include "../../ctrl/code.php";
$fileName = "data_laporan_surat_keluar_terbanyak_" . date('dmy') . "_" . time() . ".xls";
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$fileName");
?>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
              <thead>
                <tr>
                  <th>Nomor</th>
				  <th>Penerima</th>
				  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
			  <?php
				$no = 1;				
				$queryy = "select *, count(penerima_sk) as jumlah_skt from tb_surat_keluar, tb_klasifikasi_surat where tb_surat_keluar.penerima_sk=tb_klasifikasi_surat.kode_ks group by penerima_sk order by jumlah_skt desc";
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){ 
				  $nama_ks = $data['nama_ks'];
				  $jumlah_skt = $data['jumlah_skt'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
				  <td><?php echo $nama_ks; ?></td>
				  <td><?php echo $jumlah_skt; ?></td>
                </tr>
			  <?php
				$no++; }
			  ?>	
              </tbody>
            </table>