<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Informasi</a>
			</li>
			<li class="breadcrumb-item active">Hapus Presenis</li>
		</ol>
		<form action="<?php echo base_url('admin/presensi/delete_process') ?>" method="post"
            enctype="multipart/form-data">
            <input type="text" name="id_presensi" value="<?php echo $rs_delete['id_presensi'] ?>" hidden>
			<div class="form-group col-md-6">
                <label for="inputAddress">Bulan Presensi</label>
				<label for="inputAddress">: <?php echo $rs_delete['bulan'] ?></label>
			</div>
			<div class="form-group col-md-6">
                <label for="inputAddress">Tahun Presensi</label>
				<label for="inputAddress">: <?php echo $rs_delete['tahun'] ?></label>
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress">Jumlah Hadir</label>
				<label for="inputAddress">: <?php echo $rs_delete['jml'] ?></label>
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress">Link Presensi</label>
				<label for="inputAddress">: <?php echo $rs_delete['link'] ?></label>
			</div>
			<div class="form-group" style="margin-left:200px">
				<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
				<a href="<?php echo site_url('admin/presensi/view')?>" class="btn btn-success btn-sm"><i class="fas fa-arrow-left"></i></i> Kembali</a>
			</div>
		</form>
	</div>
