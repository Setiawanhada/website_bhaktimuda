<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Master Jenis Jabatan</a>
			</li>
			<li class="breadcrumb-item active">Tambah Jenis Jabatan</li>
		</ol>
		<div>
		<!-- load notif templates -->
		<?php $this->load->view('admin/dashboard/notification') ?>
		<!-- end load notif -->
		</div>
		<form action="<?php echo base_url('admin/master/jenis_jabatan/add_process') ?>" method="post"
			enctype="multipart/form-data">
			<div class="form-group col-md-6">
				<label for="inputAddress">Jabatan</label>
				<select class="form-control select2-show-search" id="kode_jabatan" name="kode_jabatan"
					data-placeholder="-- Pilih Jabatan --">
					<option value="" disabled selected>-- Pilih Jabatan --</option>
					<?php foreach ($rs_jabatan as $jabatan): ?>
					<option value="<?php echo $jabatan['kode_jabatan'] ?>"><?php echo $jabatan['nama_jabatan'] ?>
					</option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group col-md-6">
				<label for="inputAddress">Nama Jenis Jabatan</label>
				<input type="text" class="form-control" name="nama_jenis_jabatan" placeholder="Nama Jenis Jabatan">
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
