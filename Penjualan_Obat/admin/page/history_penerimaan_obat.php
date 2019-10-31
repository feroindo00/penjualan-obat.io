<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="./">Home</a>
        </li>
        <li class="breadcrumb-item"><a href="index?p=data_penerimaan_obat">Penerimaan Obat</a></li>
        <li class="breadcrumb-item active"><b>History</b></li>
    </ol>
    <?php
        $flash="select * from obat where tanggal_kadaluarsa";
        $hasil = mysqli_query($con,$flash)or die(mysqli_error());
        while($lol=mysqli_fetch_array($hasil)){ 
            $tanggal_kadaluarsa = $lol['tanggal_kadaluarsa'];
            $tanggal_sekarang = date('y-m-d');
            $masa= strtotime($tanggal_kadaluarsa)-strtotime($tanggal_sekarang);
    if($masa/(24*60*60)<1){
    ?>
    <script>
       $(document).ready(function(){
       $('#pesan_sedia').css("color","red");
       $('#pesan_sedia').append("<span class='fa fa-asterisk'></span>");
       });
    </script>
    <?php
        echo "<div style='padding:5px' class='alert alert-warning'><span class='fa fa-fw fa-exclamation-triangle'></span> Stok Obat <a style='color:red'>".$lol['nama_obat']."</a> Pada Tanggal <a style='color:red'>".$lol['tanggal_kadaluarsa']."</a>  . sudah melewati tanggal kadaluarsa silahkan pesan lagi !!</div>"; 
   }
    elseif($masa/(24*60*60)<10){
    ?>
     <script>
       $(document).ready(function(){
       $('#pesan_sedia').css("color","red");
       $('#pesan_sedia').append("<span class='fa fa-asterisk'></span>");
       });
    </script>
    <?php
    echo "<div style='padding:5px' class='alert alert-warning'><span class='fa fa-fw fa-exclamation-triangle'></span> Stok Obat <a style='color:red'>".$lol['nama_obat']."</a> Pada Tanggal <a style='color:red'>".$lol['tanggal_kadaluarsa']."</a>  . Hampir mendekati tanggal kadaluarsa silahkan pesan lagi !!</div>"; 
    
   }
 }
 ?>
    <div class="card mb-3">
    	<div class="card-header">
    		<i class="fa fa-table"></i> Tabel History Penerimaan Obat
    	</div>
    	<div class="card-body">
    		<div class="table-responsive">
    			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    				<thead>
    					<tr>
    						<th>No</th>
    						<th>Tanggal</th>
    						<th>Nama Obat</th>
    						<th>Jumlah</th>
    						<th>Tanggal Kadaluarsa</th>
    					</tr>
    				</thead>
    				<tbody>
    					<?php
    						$no = 1;
    						$query ="SELECT * FROM penerimaan_obat order by id_penerimaan desc";
    						$sql= mysqli_query($con,$query) or die (mysqli_error());
    						while($data = mysqli_fetch_array($sql)){
    							$kd_obat= $data['kd_obat'];
    							$nama_obat = $data['nama_obat'];
    							$jumlah = $data['jumlah'];
    							$harga_suplier = $data['harga_suplier'];
    							$harga_jual = $data['harga_jual'];
    							$harga_satuan = $data['harga_satuan'];
    							$tanggal = $data['tanggal'];
    							$tanggal_kadaluarsa = $data['tanggal_kadaluarsa'];
                                $tanggal_sekarang = date('y-m-d');
                                $masa= strtotime($tanggal_kadaluarsa)-strtotime($tanggal_sekarang);
    					?>
    					<tr>
    						<td><?php echo $no; ?></td>
    						<td><?php echo $tanggal; ?></td>
    						<td><?php 
                                if($masa/(24*60*60)<10){
                                    echo "<a style='color:red'>".$nama_obat."</a>";
                                }
                                else{
                                    echo $nama_obat;
                                } ?></td>
    						<td><?php
                                    if($masa/(24*60*60)<10){
                                      echo "<a style='color:red'>".$jumlah."</a>";  
                                    }
                                    else{
                                        echo $jumlah; 
                                    }
                                ?></td>
    						<td><?php 
                                    if($masa/(24*60*60)<10){
                                      echo "<a style='color:red'>".$tanggal_kadaluarsa."</a>";  
                                    }
                                    elseif($masa/(24*60*60)<1){
                                       echo "<a style='color:red'>EXPIRED</a>";  
                                    }
                                    else{
                                        echo $tanggal_kadaluarsa;
                                    }
                                ?></td>
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