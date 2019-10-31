<div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../">Home</a>
        </li>
        <li class="breadcrumb-item active">Tambah Transaksi</li>
      </ol>
<?php
if(isset($_POST['btnTambah'])){ 
    # Baca Data dari Form 
    $cmbBarang    = $_POST['cmbBarang']; 
    $txtHarga    = $_POST['txtHarga']; 
    $txtJumlah    = $_POST['txtJumlah']; 

    # Validasi Form 
    $pesanError = array(); 
    if (trim($cmbBarang)=="Kosong") { 
        $pesanError[] = "Data <b>Nama Barang belum dipilih</b>, silahkan pilih dari combo barang!";         
    } 
    if (trim($txtHarga)=="" or ! is_numeric(trim($txtHarga))) { 
        $pesanError[] = "Data <b>Harga Penjualan (Rp) belum diisi</b>, silahkan <b>isi dengan angka</b> !";         
    } 
    if (trim($txtJumlah)=="" or ! is_numeric(trim($txtJumlah))) { 
        $pesanError[] = "Data <b>Jumlah Barang (Qty) belum diisi</b>, silahkan <b>isi dengan angka</b> !";         
    } 
     
    # Cek Stok, jika stok Opname (stok bisa dijual) < kurang dari Jumlah yang dibeli, maka buat Pesan Error 
    $cekSql    = "SELECT jumlah FROM obat WHERE kd_obat='$cmbBarang'"; 
    $cekQry = mysqli_query(  $cekSql) or die (mysql_error());
    if ($cekRow['stok'] < $txtJumlah) { 
        $pesanError[] = "Stok Barang untuk Kode <b>$cmbBarang</b> adalah <b> $cekRow[stok]</b>, tidak dapat dijual!"; 
    } 
             
    # JIKA ADA PESAN ERROR DARI VALIDASI 
    if (count($pesanError)>=1 ){ 
        echo "<div class='mssgBox'>"; 
        echo "<img src='../images/attention.png'> <br><hr>"; 
            $noPesan=0; 
            foreach ($pesanError as $indeks=>$pesan_tampil) {  
            $noPesan++; 
                echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";     
            }  
        echo "</div> <br>";  
    } 
    else { 
        # SIMPAN KE DATABASE (tmp_penjualan)     
        // Jika Kode ditemukan, masukkan data ke Keranjang (TMP) 
        $tmpSql     = "INSERT INTO tmp_transaksi (kd_barang, harga, jumlah)  
                    VALUES ('$cmbBarang', '$txtHarga', '$txtJumlah')"; 
        mysqli_query($tmpSql) or die(mysql_error()); 
    } 
} 
// ============================================================================ 
?>
<form method='post' role="form" action="btnTambah">
	<div class="form-group" style="width: 30%;">
        <label>tanggal</label>
        <input class="form-control" type='date' name="tanggal-"  placeholder="Masukkan tanggal Pasien Disini ..." autofocus required autocomplete='off'>
    </div>
    <div class="form-group"style="width: 30%;">
    	<label>Nama Barang</label>								
			<select class="form-control" name="nama-" id="nama" onchange="document.getElementById('prd_name').value = prdName[this.value]">
				<?php 
					$brg=mysql_query("select * from obat");
					$jsArray="var prdName = new Array();";
					while($b=mysql_fetch_array($brg)){
				?>	
				<option value="<?php echo $b['nama_obat']; ?>"><?php echo $b['nama_obat'] ?></option>
				<?php
					$jsArray .= "prdName['" . $b['nama_obat'] . "'] = '" . addslashes($b['harga_jual']) . "';";
				?>
				<?php 
				}
				?>
			</select>
	</div>
	<div class="form-group" style="width: 30%;">
		<label>Harga jual</label>
		<input type="text" name="harga" id="prd_name" class="form-control" autocomplete="off" readonly> 
	</div>
    <div class="form-group" style="width: 30%;">
		<label>Jumlah</label>
		<input name="jumlah" type="text" class="form-control" placeholder="Jumlah" autocomplete="off">
	</div>
	 <center> 
	 	<button type="proses" name="btnTambah" style="cursor:pointer;" class="btn btn-sm btn btn-info" value="proses">Proses</button>
	 	<!--<input name="Tambah" type="submit" style="cursor:pointer;" value=" Tambah " /> !-->
	 	<button type="submit" name="Tambah_Transaksi" class="btn btn-sm btn-primary">Tambah</button>
          <button type="reset" class="btn btn-sm btn-danger">Batal</button></center>
 </form>
 <div class="table-responsive">
				<table class="table table-bordered"  width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode</th>
							<th>Nama Barang</th>
							<th>Harga Terjual/pc</th>
							<th>Jumlah</th>
							<th>Total Harga</th>
						</tr>
					</thead><br>
					<tbody>
					<?php				
						
					  ?>
							<tr>
								<td><?php ?></td>
								<td><?php  ?></td>
								<td><?php  ?></td>
								<td><?php  ?></td>	
								<td><?php  ?></td>
								<td><?php  ?></td>			
							</tr>

							<?php 
						
						?>
						
					</tbody>
				</table>
			</div>
 <script type="text/javascript">  

                <?php echo $jsArray; ?>  

                </script>             
</div>
