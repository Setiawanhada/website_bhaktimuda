<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Foto</a>
			</li>
			<li class="breadcrumb-item active">Edit Foto</li>
		</ol>
		<div>
		<?php 
		$notif = $this->session->userdata('sess_notif');
		if (!empty($notif['tipe'])){
			 if($notif['tipe'] == 'Sukses'){
				echo '<div class="alert alert-success" style="margin-top: 20px">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<label ><strong>'.$notif['tipe'].',</strong> '.$notif['pesan'].'</label>
				</div>';
			 }else{
				echo '<div class="alert alert-danger" style="margin-top: 20px">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<label ><strong>'.$notif['tipe'].',</strong> '.$notif['pesan'].'</label>
				</div>';
			 }
		} 
		?>
		</div>
		<form action="<?php echo base_url('admin/foto/edit_process') ?>" method="post"
			enctype="multipart/form-data">
            <input type="text" name="kode_foto" value="<?php echo $rs_edit['kode_foto'] ?>" hidden>
			<div class="form-group col-md-6">
				<label for="inputAddress">Judul Foto</label>
				<input type="text" class="form-control" name="judul" placeholder="Judul Foto" value="<?php echo $rs_edit['judul'] ?>">
            </div>
            <div class="form-group col-md-6">
				<label for="inputAddress">Link Foto</label>
				<input type="text" class="form-control" name="link" placeholder="Link Foto"  value="<?php echo $rs_edit['link'] ?>">
			</div>
			<div class="form-group" style="margin-left:200px">
				<button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</button>
				<a href="<?php echo site_url('admin/foto/view')?>" class="btn btn-success btn-sm"><i class="fas fa-arrow-left"></i></i> Kembali</a>
			</div>
		</form>
	</div>
