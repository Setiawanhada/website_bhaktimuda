<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Master Jenis Jabatan</a>
			</li>
			<li class="breadcrumb-item active">Hapus Jenis Jabatan</li>
		</ol>
		<form action="<?php echo base_url('admin/master/jenis_jabatan/delete_process') ?>" method="post"
            enctype="multipart/form-data">
            <input type="text" name="kode_jenis_jabatan" value="<?php echo $rs_delete['kode_jenis_jabatan'] ?>" hidden>
			<div class="form-group col-md-6">
                <label for="inputAddress">Nama Jabatan</label>
				<label for="inputAddress">: <?php echo $rs_delete['nama_jabatan'] ?></label>
			</div>
			<div class="form-group col-md-6">
                <label for="inputAddress">Nama Jenis Jabatan</label>
				<label for="inputAddress">: <?php echo $rs_delete['nama_jenis_jabatan'] ?></label>
			</div>
			<div class="form-group col-md-6">
                <label for="inputAddress">Status</label>
				<label for="inputAddress">: <?php if($rs_delete['status']== 1) {echo 'Aktif';}
                                else{echo'Tidak Aktif';} ?></label>
            </div>
			<div class="form-group" style="margin-left:200px">
				<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
				<a href="<?php echo site_url('admin/master/jenis_jabatan/')?>" class="btn btn-success btn-sm"><i class="fas fa-arrow-left"></i></i> Kembali</a>
			</div>
		</form>
	</div>
