<div class="container-fluid">
		<!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="./">Home</a>
        </li>
        <li class="breadcrumb-item active">Tambah Data Obat</li>
      </ol>
	<!--breadcumb end-->
	<div class="box">
		<h4>Tambah Data Obat <br><br>
			<a href='index?p=data_transaksi'class="btn btn-info btn-xs" style="width: 15%;">Kembali</a>
		</h4>
		<div class="rows">
			<div class="col-lg-6 col-lg-offset-3">
				<form action='index?p=Tambah_Transaksi_act1' method="post">
					<div class="form-group">
						<label for="count-add">Banyak Record yang akan di tambahkan</label>
						<input type="text" name="count_add" id="count_add" maxlength="2" pattern="[0-9]+" class="form-control" required>
					</div>
					<div class="form-group pull-right">
						<input type="submit" name="generate" value="Generate" class="btn btn-success">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>