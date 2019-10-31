<?php
include "../../ctrl/koneksi.php";
include "../../ctrl/code.php";
$fileName = "data_laporan_surat_keluar_" . date('dmy') . "_" . time() . ".xls";
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$fileName");
?>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nomor Surat</th>
				  <th>Tanggal</th>
				  <th>Penerima</th>
				  <th>Perihal</th>
				  <th>Keterangan</th>
				  <th>File</th>
				  <th>Ditambahkan Oleh</th>
				  <th>Ditambahkan Pada</th>
                </tr>
              </thead>
              <tbody>
			  <?php
				$no = 1;				
				$queryy = "select * from tb_surat_keluar, tb_klasifikasi_surat where tb_surat_keluar.penerima_sk=tb_klasifikasi_surat.kode_ks order by id_sk desc";
				$sqll = mysql_query($queryy) or die(mysql_error());
				while($data = mysql_fetch_array($sqll)){ 
					$id_sk = $data['id_sk'];
					$nomor_sk = $data['nomor_sk'];
					$tanggal_sk = $data['tanggal_sk'];
					$tanggal_skk = $hari[date("w", strtotime($tanggal_sk))].", ".date("j", strtotime($tanggal_sk))." ".$bulan[date("n", strtotime($tanggal_sk))]." ".date("Y", strtotime($tanggal_sk));						                  			
					$penerima_sk = $data['penerima_sk'];
					$perihal_sk = $data['perihal_sk'];
					$keterangan_sk = $data['keterangan_sk'];
					$file_sk = $data['file_sk'];
					$admin_input_sk = $data['admin_input_sk'];
					$tanggal_input_sk = $data['tanggal_input_sk'];
					$tanggal_input_skk = $hari[date("w", strtotime($tanggal_input_sk))].", ".date("j", strtotime($tanggal_input_sk))." ".$bulan[date("n", strtotime($tanggal_input_sk))]." ".date("Y", strtotime($tanggal_input_sk));						                  			
					$jam_input_sk = $data['jam_input_sk'];
					$nama_ks = $data['nama_ks'];
					
					$queryy = mysql_query("SELECT * FROM tb_karyawan WHERE
										 username_k='$admin_input_sk'");
                    $dataa  = mysql_fetch_array($queryy);
					$nama_k = $dataa['nama_k'];
			  ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $penerima_sk; ?>-<?php echo $nomor_sk; ?></td>
				  <td><?php echo $tanggal_skk; ?></td>
				  <td><?php echo $nama_ks; ?></td>
				  <td><?php echo $perihal_sk; ?></td>
				  <td><?php echo $keterangan_sk; ?></td>
				  <td><?php echo $file_sk; ?></td>
				  <td><?php echo $nama_k; ?></td>
				  <td><?php echo $tanggal_input_skk; ?> ( <?php echo $jam_input_sk; ?> )</td>
                </tr>
			  <?php
				$no++; }
			  ?>	
              </tbody>
            </table>