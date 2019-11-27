<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Master Jabatan</a>
			</li>
			<li class="breadcrumb-item active">Tambah Jabatan</li>
		</ol>
		<div>
		<!-- load notif templates -->
		<?php $this->load->view('admin/dashboard/notification') ?>
		<!-- end load notif -->
		</div>
		<form action="<?php echo base_url('admin/master/jabatan/add_process') ?>" method="post"
			enctype="multipart/form-data">
			<div class="form-group col-md-6">
				<label for="inputAddress">Nama Jabatan</label>
				<input type="text" class="form-control" name="nama_jabatan" placeholder="Nama Jabatan">
            </div>
            <div class="form-group col-md-6">
				<label for="inputAddress">Status</label>
				<select name="status" class="form-control">
                    <option value="">-Pilih Status-</option>
                    <option value="1">Aktif</option>
                    <option value="2">Tidak Aktif</option>
                </select>
			</div>
			<div class="form-group" style="margin-left:200px">
				<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</button>
			</div>
		</form>
	</div>
