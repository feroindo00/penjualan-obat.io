<?php
include "../../ctrl/koneksi.php";
include "../../ctrl/code.php";
$fileName = "data_laporan_disposisi_surat_masuk_" . date('dmy') . "_" . time() . ".xls";
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$fileName");
?>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nomor Surat</th>
				  <th>Tujuan Disposisi</th>
				  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
			  <?php
				$no = 1;				
				$queryy = "select * from tb_disposisi_surat_masuk, tb_karyawan, tb_surat_masuk where tb_disposisi_surat_masuk.tujuan_dsm=tb_karyawan.username_k and tb_disposisi_surat_masuk.nomor_dsm=tb_surat_masuk.nomor_sm order by id_dsm desc";
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){ 
				  $id_dsm = $data['id_dsm'];
				  $nomor_dsm = $data['nomor_dsm'];
				  $keterangan_dsm = $data['keterangan_dsm'];
				  $id_sm = $data['id_sm'];
				  $pengirim_sm = $data['pengirim_sm'];
				  $nama_k = $data['nama_k'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $pengirim_sm; ?>-<?php echo $nomor_dsm; ?></td>
				  <td><?php echo $nama_k; ?></td>
				  <td><?php echo $keterangan_dsm; ?></td>
                </tr>
			  <?php
				$no++; }
			  ?>	
              </tbody>
            </table>