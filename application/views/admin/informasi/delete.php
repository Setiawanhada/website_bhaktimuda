<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Informasi</a>
			</li>
			<li class="breadcrumb-item active">Hapus Informasi</li>
		</ol>
		<form action="<?php echo base_url('admin/informasi/delete_process') ?>" method="post"
            enctype="multipart/form-data">
            <input type="text" name="kode_info" value="<?php echo $rs_delete['kode_info'] ?>" hidden>
			<div class="form-group col-md-6">
                <label for="inputAddress">Judul Informasi</label>
				<label for="inputAddress">: <?php echo $rs_delete['judul'] ?></label>
			</div>
			<div class="form-group col-md-6">
                <label for="inputAddress2">Gambar :</label><br>
                <img src="<?php echo base_url('upload/informasi/'.$rs_delete['gambar']) ?>" width="180px" />
			</div>
			<div class="form-group col-md-6">
				<label for="inputAddress2">Isi Informasi :</label>
				<textarea class="form-control" disabled><?php echo $rs_delete['isi'] ?></textarea>
			</div>
			<div class="form-group" style="margin-left:200px">
				<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
				<a href="<?php echo site_url('admin/informasi/view')?>" class="btn btn-success btn-sm"><i class="fas fa-arrow-left"></i></i> Kembali</a>
			</div>
		</form>
	</div>
