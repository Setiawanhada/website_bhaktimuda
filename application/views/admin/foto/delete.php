<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Foto</a>
			</li>
			<li class="breadcrumb-item active">Hapus Foto</li>
		</ol>
		<form action="<?php echo base_url('admin/foto/delete_process') ?>" method="post"
            enctype="multipart/form-data">
            <input type="text" name="kode_foto" value="<?php echo $rs_delete['kode_foto'] ?>" hidden>
			<div class="form-group col-md-6">
                <label for="inputAddress">Judul Foto</label>
				<label for="inputAddress">: <?php echo $rs_delete['judul'] ?></label>
			</div>
            <div class="form-group col-md-6">
                <label for="inputAddress">Link Foto</label>
				<label for="inputAddress">: <?php echo $rs_delete['link'] ?></label>
			</div>
			<div class="form-group" style="margin-left:200px">
				<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
				<a href="<?php echo site_url('admin/foto/view')?>" class="btn btn-success btn-sm"><i class="fas fa-arrow-left"></i></i> Kembali</a>
			</div>
		</form>
	</div>
