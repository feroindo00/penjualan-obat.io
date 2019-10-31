<?php

				if(isset($_POST['proses'])){
					$uang = $_POST['uang'];
					$kembali = $uang - $total['total'];
				
					$tanggal = date('y-m-d');
					mysql_query("insert into detil_transaksi(id_transaksi,kd_obat,jumlah,harga,id_jual) select id_keranjang,kd_obat,jumlah,harga,'$kodeotomatis' from keranjang");
					//masukan data ke transaksi_jual
					mysql_query("insert into transaksi_jual(id_jual,total,uang,kembali,tanggal) values('$kodeotomatis','$total[total]','$uang','$kembali','$tanggal')");
					
					}
				?>