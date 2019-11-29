<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Presensi</a>
			</li>
			<li class="breadcrumb-item active">Tambah Presensi</li>
		</ol>
		<div>
		<!-- load notif templates -->
		<?php $this->load->view('admin/dashboard/notification') ?>
		<!-- end load notif -->
		</div>
		<form action="<?php echo base_url('admin/presensi/add_process') ?>" method="post"
			enctype="multipart/form-data">
			<div class="form-group col-md-6">
				<label for="inputAddress">Bulan</label>
				<select name="bulan" class="form-control">
                    <option value="">-Pilih Bulan-</option>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                </select>
			</div>
			<div class="form-group col-md-6">
				<label for="inputAddress">Tahun</label>
				<input type="text" class="form-control" name="tahun" placeholder="Tahun Presensi" required>
            </div>
			<div class="form-group" style="margin-left:200px">
				<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</button>
			</div>
		</form>
	</div>
