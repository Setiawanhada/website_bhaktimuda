<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Pengurus</a>
			</li>
			<li class="breadcrumb-item active">Hapus Pengurus</li>
		</ol>
		<form action="<?php echo base_url('admin/pengurus/delete_process') ?>" method="post"
            enctype="multipart/form-data">
            <input type="text" name="id_pengurus" value="<?php echo $rs_delete['id_pengurus'] ?>" hidden>
			<div class="form-group col-md-6">
                <label for="inputAddress">Jabatan</label>
				<label for="inputAddress">: <?php echo $rs_delete['nama_jabatan'] ?></label>
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress">Jenis Jabatan</label>
				<label for="inputAddress">: <?php echo $rs_delete['nama_jenis_jabatan'] ?></label>
			</div>
			<div class="form-group col-md-6">
                <label for="inputAddress2">Gambar :</label><br>
                <img src="<?php echo base_url('upload/pengurus/'.$rs_delete['gambar']) ?>" width="180px" />
			</div>
			<div class="form-group col-md-6">
				<label for="inputAddress2">Status :</label>
				<label><?php if($rs_delete['status']== 1) {echo 'Aktif';}else{echo'Tidak Aktif';} ?></label>
			</div>
			<div class="form-group" style="margin-left:200px">
				<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
				<a href="<?php echo site_url('admin/pengurus/view')?>" class="btn btn-success btn-sm"><i class="fas fa-arrow-left"></i></i> Kembali</a>
			</div>
		</form>
	</div>
