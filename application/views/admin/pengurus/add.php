<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Pengurus</a>
			</li>
			<li class="breadcrumb-item active">Tambah Pengurus</li>
		</ol>
		<div>
		<!-- load notif templates -->
		<?php $this->load->view('admin/dashboard/notification') ?>
		<!-- end load notif -->
		</div>
		<form action="<?php echo base_url('admin/pengurus/add_process') ?>" method="post"
			enctype="multipart/form-data">
            <div class="form-group col-md-6">
				<label for="inputAddress">Jabatan</label>
				<select class="form-control select2-show-search" name="kode_jabatan"
                    data-placeholder="-- Pilih Jabatan --">
                    <option value="" disabled selected>-- Pilih Jabatan --</option>
                    <?php foreach ($rs_jabatan as $jabatan): ?>
                    <option value="<?php echo $jabatan['kode_jabatan']?>"><?php echo $jabatan['nama_jabatan']?>
                    </option>
                    <?php endforeach; ?>
                </select>
			</div>
			<div class="form-group col-md-6">
				<label for="inputAddress">Jenis Jabatan</label>
				<select class="form-control select2-show-search" name="kode_jenis_jabatan"
                    data-placeholder="-- Pilih Jenis Jabatan --">
                    <option value="" disabled selected>-- Pilih Jenis Jabatan --</option>
                    <?php foreach ($rs_jenis_jabatan as $jenis_jabatan): ?>
                    <option value="<?php echo $jenis_jabatan['kode_jenis_jabatan']?>"><?php echo $jenis_jabatan['nama_jenis_jabatan']?>
                    </option>
                    <?php endforeach; ?>
                </select>
			</div>
			<div class="form-group col-md-6">
				<label for="inputAddress">Nama</label>
				<input type="text" class="form-control" name="nama" placeholder="Nama Pengurus">
			</div>
			<div class="form-group col-md-6">
				<label for="inputAddress2">Gambar</label>
				<input type="file" class="dropify" name="gambar">
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
