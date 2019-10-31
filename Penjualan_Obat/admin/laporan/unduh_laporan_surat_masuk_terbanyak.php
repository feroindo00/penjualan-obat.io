<?php
include "../../ctrl/koneksi.php";
include "../../ctrl/code.php";
$fileName = "data_laporan_surat_masuk_terbanyak_" . date('dmy') . "_" . time() . ".xls";
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$fileName");
?>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
              <thead>
                <tr>
                  <th>Nomor</th>
				  <th>Pengirim</th>
				  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
			  <?php
				$no = 1;				
				$queryy = "select *, count(pengirim_sm) as jumlah_smt from tb_surat_masuk, tb_klasifikasi_surat where tb_surat_masuk.pengirim_sm=tb_klasifikasi_surat.kode_ks group by pengirim_sm order by jumlah_smt desc";
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){ 
				  $nama_ks = $data['nama_ks'];
				  $jumlah_smt = $data['jumlah_smt'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
				  <td><?php echo $nama_ks; ?></td>
				  <td><?php echo $jumlah_smt; ?></td>
                </tr>
			  <?php
				$no++; }
			  ?>	
              </tbody>
            </table>