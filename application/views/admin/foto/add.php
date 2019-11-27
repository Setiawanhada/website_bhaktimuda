<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Foto</a>
			</li>
			<li class="breadcrumb-item active">Tambah Foto</li>
		</ol>
		<div>
		<!-- load notif templates -->
		<?php $this->load->view('admin/dashboard/notification') ?>
		<!-- end load notif -->
		</div>
		<form action="<?php echo base_url('admin/foto/add_process') ?>" method="post"
			enctype="multipart/form-data">
			<div class="form-group col-md-6">
				<label for="inputAddress">Judul Foto</label>
				<input type="text" class="form-control" name="judul" placeholder="Judul Foto">
            </div>
            <div class="form-group col-md-6">
				<label for="inputAddress">Link Foto</label>
				<input type="text" class="form-control" name="link" placeholder="Link Foto">
			</div>
			<div class="form-group" style="margin-left:200px">
				<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</button>
			</div>
		</form>
	</div>
