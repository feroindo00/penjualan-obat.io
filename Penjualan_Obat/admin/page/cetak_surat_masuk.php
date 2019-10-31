<style type="text/css" media="print">
@media print {
  @page { margin: 0; }
  body { margin-top: 1.5cm; margin-right: 0.5cm; margin-left: 0.5cm; font-family: times;}
}
</style>

<script type="text/javascript">
window.print();
window.onclick=function(){ window.close();}
</script>

					<?php
					if(empty($_GET['id'])){
					include '404.php';
					} else {
					?>
					
					<?php
					$id = $_GET['id'];
                    $query = mysql_query("SELECT * FROM tb_sppd WHERE nomor_sppd='$id'");
                    $data  = mysql_fetch_array($query);
					$nomor_sppd = $data['nomor_sppd'];
					$dasar_sppd = $data['dasar_sppd'];
					$maksud_sppd = $data['maksud_sppd'];
					$tanggal_berangkat_sppd = $data['tanggal_berangkat_sppd'];
					$tanggal_kembali_sppd = $data['tanggal_kembali_sppd'];
					$tujuan_sppd = $data['tujuan_sppd'];
					$petunjuk_sppd = $data['petunjuk_sppd'];
					$masalah_sppd = $data['masalah_sppd'];
					$saran_sppd = $data['saran_sppd'];
					$lain_sppd = $data['lain_sppd'];
					$tanggal_tambah_sppd = $data['tanggal_tambah_sppd'];
					$jam_tambah_sppd = $data['jam_tambah_sppd'];
					$tanggal_berangkat_sppdd = date("j", strtotime($tanggal_berangkat_sppd))." ".$bulan[date("n", strtotime($tanggal_berangkat_sppd))]." ".date("Y", strtotime($tanggal_berangkat_sppd));						                                       
					$tanggal_kembali_sppdd = date("j", strtotime($tanggal_kembali_sppd))." ".$bulan[date("n", strtotime($tanggal_kembali_sppd))]." ".date("Y", strtotime($tanggal_kembali_sppd));						                                       
					$tanggal_tambah_sppdd = date("j", strtotime($tanggal_tambah_sppd))." ".$bulan[date("n", strtotime($tanggal_tambah_sppd))]." ".date("Y", strtotime($tanggal_tambah_sppd));						                                       		
										
										if(empty($nomor_sppd)){
											$$nomor_sppd = "-";
										}
										if(empty($dasar_sppd)){
											$dasar_sppd = "-";
										}
										if(empty($maksud_sppd)){
											$maksud_sppd = "-";
										}
										if(empty($tanggal_berangkat_sppd)){
											$tanggal_berangkat_sppd = "-";
										}
										if(empty($tanggal_kembali_sppd)){
											$tanggal_kembali_sppd = "-";
										}
										if(empty($tujuan_sppd)){
											$tujuan_sppd = "-";
										}
										if(empty($petunjuk_sppd)){
											$petunjuk_sppd = "-";
										}
										if(empty($masalah_sppd)){
											$masalah_sppd = "-";
										}
										if(empty($saran_sppd)){
											$saran_sppd = "-";
										}
										if(empty($lain_sppd)){
											$lain_sppd = "-";
										}
										
					if($nomor_sppd == $id){					
                    ?>
					
<div class="row">
  <div class="col-lg-12">
	<div style="text-align: center; font-weight: bold; font-size: 20px;">LAPORAN PERJALANAN DINAS</div>
  </div>
</div>
	
<div class="row" style="margin-top: 40px; font-size: 12px;">
  <div class="col-xs-4">
  I. DASAR
  </div>
  <div class="col-xs-1">
  :
  </div>
  <div class="col-xs-7" style="margin-left: -45px;">
  <?php echo $dasar_sppd; ?>
  </div>
  <!-- Add clearfix for only the required viewport -->
  <div class="clearfix visible-xs"></div>
  <div class="col-xs-4" style="margin-top: 20px;">
  II. MAKSUD TUJUAN
  </div>
  <div class="col-xs-1" style="margin-top: 20px;">
  :
  </div>
  <div class="col-xs-7" style="margin-top: 20px; margin-left: -45px;">
  <?php echo $maksud_sppd; ?>
  </div>
  <!-- Add clearfix for only the required viewport -->
  <div class="clearfix visible-xs"></div>
  <div class="col-xs-4" style="margin-top: 20px;">
  III. WAKTU PELAKSANAAN
  </div>
  <div class="col-xs-1" style="margin-top: 20px;">
  :
  </div>
  <div class="col-xs-7" style="margin-top: 20px; margin-left: -45px;">
  <?php echo $tanggal_berangkat_sppdd; ?> s.d <?php echo $tanggal_kembali_sppdd; ?>
  </div>
  <!-- Add clearfix for only the required viewport -->
  <div class="clearfix visible-xs"></div>
  <div class="col-xs-4" style="margin-top: 20px;">
  IV. NAMA PETUGAS
  </div>
  <div class="col-xs-1" style="margin-top: 20px;">
  :
  </div>
  <div class="col-xs-7" style="margin-top: 20px; margin-left: -45px;">
	<?php
	$no = 1;
	$query = mysql_query("SELECT * FROM tb_sppd,tb_pegawai WHERE 
										tb_sppd.id_pegawai=tb_pegawai.id_pegawai AND 
										nomor_sppd='$id'");
	while($data = mysql_fetch_array($query)){
	$nama_pegawai = $data['nama_pegawai'];
	?>
	<?php echo $no; ?>. <?php echo $nama_pegawai; ?><br>
	<?php
	$no++; }
	?>
  </div>
  <!-- Add clearfix for only the required viewport -->
  <div class="clearfix visible-xs"></div>
  <div class="col-xs-4" style="margin-top: 20px;">
  V. DAERAH TUJUAN / INSTANSI YANG DIKUNJUNGI
  </div>
  <div class="col-xs-1" style="margin-top: 20px;">
  :
  </div>
  <div class="col-xs-7" style="margin-top: 20px; margin-left: -45px;">
  <?php echo $tujuan_sppd; ?>
  </div>
  <!-- Add clearfix for only the required viewport -->
  <div class="clearfix visible-xs"></div>
  <div class="col-xs-4" style="margin-top: 20px;">
  VI. PETUNJUK / ARAHAN YANG DIBERIKAN
  </div>
  <div class="col-xs-1" style="margin-top: 20px;">
  :
  </div>
  <div class="col-xs-7" style="margin-top: 20px; margin-left: -45px;">
  <?php echo $petunjuk_sppd; ?>
  </div>
  <!-- Add clearfix for only the required viewport -->
  <div class="clearfix visible-xs"></div>
  <div class="col-xs-4" style="margin-top: 20px;">
  VII. MASALAH / TEMUAN
  </div>
  <div class="col-xs-1" style="margin-top: 20px;">
  :
  </div>
  <div class="col-xs-7" style="margin-top: 20px; margin-left: -45px;">
  <?php echo $masalah_sppd; ?>
  </div>
  <!-- Add clearfix for only the required viewport -->
  <div class="clearfix visible-xs"></div>
  <div class="col-xs-4" style="margin-top: 20px;">
  VIII. SARAN TINDAKAN
  </div>
  <div class="col-xs-1" style="margin-top: 20px;">
  :
  </div>
  <div class="col-xs-7" style="margin-top: 20px; margin-left: -45px;">
  <?php echo $saran_sppd; ?>
  </div>
  <!-- Add clearfix for only the required viewport -->
  <div class="clearfix visible-xs"></div>
  <div class="col-xs-4" style="margin-top: 20px;">
  IX. LAIN-LAIN
  </div>
  <div class="col-xs-1" style="margin-top: 20px;">
  :
  </div>
  <div class="col-xs-7" style="margin-top: 20px; margin-left: -45px;">
  <?php echo $lain_sppd; ?>
  </div>
  <!-- Add clearfix for only the required viewport -->
  <div class="clearfix visible-xs"></div>
  <div class="col-xs-7" style="margin-top: 20px;">
  </div>
  <div class="col-xs-5" style="margin-top: 20px;">
  <center>Surabaya, <?php echo $tanggal_tambah_sppdd; ?></center>
  <center>PENANGGUNG JAWAB</center><br><br><br>
    <?php
	$query = mysql_query("SELECT * FROM tb_sppd,tb_pegawai WHERE 
										tb_sppd.id_pegawai=tb_pegawai.id_pegawai AND 
										nomor_sppd='$id' ORDER BY
										id_sppd");
	$data = mysql_fetch_array($query);
	$nama_pegawaii = $data['nama_pegawai'];
	$nip_pegawaii = $data['nip_pegawai'];
	?>
  <center><b><u><?php echo $nama_pegawaii; ?></b></u></center>
  <center>NIP. <?php echo $nip_pegawaii; ?></center>
  </div>
</div>

			<?php
			} else {
			include "404.php";
			}
			?>
			
			<?php
			}
			?>						