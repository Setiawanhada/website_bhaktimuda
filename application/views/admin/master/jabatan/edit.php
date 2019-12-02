<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Master Jabatan</a>
			</li>
			<li class="breadcrumb-item active">Edit Jabatan</li>
		</ol>
		<!-- load notif templates -->
		<?php $this->load->view('admin/dashboard/notification') ?>
		<!-- end load notif -->
		</div>
		<form action="<?php echo base_url('admin/master/jabatan/edit_process') ?>" method="post"
            enctype="multipart/form-data">
            <input type="text" name="kode_jabatan" value="<?php echo $rs_edit['kode_jabatan']?>"hidden>
			<div class="form-group col-md-6">
				<label for="inputAddress">Nama Jabatan</label>
				<input type="text" class="form-control" name="nama_jabatan" placeholder="Nama Jabatan" value="<?php echo $rs_edit['nama_jabatan']?>">
            </div>
            <div class="form-group col-md-6">
				<label for="inputAddress">Status</label>
				<select name="status" class="form-control">
                    <option value="">-Pilih Status-</option>
                    <option value="1" <?php if ($rs_edit['status'] == '1'){echo 'selected';} ?>>Aktif</option>
                    <option value="2" <?php if ($rs_edit['status'] == '2'){echo 'selected';} ?>>Tidak Aktif</option>
                </select>
			</div>
			<div class="form-group" style="margin-left:200px">
				<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</button>
			</div>
		</form>
	</div>
