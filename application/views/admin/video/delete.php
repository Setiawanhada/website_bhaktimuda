<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Video</a>
			</li>
			<li class="breadcrumb-item active">Hapus Video</li>
		</ol>
		<form action="<?php echo base_url('admin/video/delete_process') ?>" method="post"
            enctype="multipart/form-data">
            <input type="text" name="kode_video" value="<?php echo $rs_delete['kode_video'] ?>" hidden>
			<div class="form-group col-md-6">
                <label for="inputAddress">Judul Video</label>
				<label for="inputAddress">: <?php echo $rs_delete['judul'] ?></label>
			</div>
            <div class="form-group col-md-6">
                <label for="inputAddress">Link Video</label>
				<label for="inputAddress">: <?php echo $rs_delete['link'] ?></label>
			</div>
			<div class="form-group" style="margin-left:200px">
				<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
				<a href="<?php echo site_url('admin/video/view')?>" class="btn btn-success btn-sm"><i class="fas fa-arrow-left"></i></i> Kembali</a>
			</div>
		</form>
	</div>
