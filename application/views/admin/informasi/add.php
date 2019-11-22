<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Informasi</a>
			</li>
			<li class="breadcrumb-item active">Tambah Informasi</li>
		</ol>
		<div>
		<?php 
		$notif = $this->session->userdata('sess_notif');
		if (!empty($notif['tipe'])){
			 if($notif['tipe'] == 'Sukses'){
				echo '<div class="alert alert-success" style="margin-top: 20px">
				<label ><strong>'.$notif['tipe'].',</strong> '.$notif['pesan'].'</label>
				</div>';
			 }else{
				echo '<div class="alert alert-danger" style="margin-top: 20px">
				<label ><strong>'.$notif['tipe'].',</strong> '.$notif['pesan'].'</label>
				</div>';
			 }
		} 
		?>
		</div>
		<form action="<?php echo base_url('admin/informasi/add_process') ?>" method="post"
			enctype="multipart/form-data">
			<div class="form-group col-md-6">
				<label for="inputAddress">Judul Informasi</label>
				<input type="text" class="form-control" name="judul" placeholder="Judul Informasi">
			</div>
			<div class="form-group col-md-6">
				<label for="inputAddress2">Gambar</label>
				<input type="file" class="dropify" name="gambar">
			</div>
			<div class="form-group col-md-6">
				<label for="inputAddress2">Isi Informasi</label>
				<textarea class="form-control" name="isi"></textarea>
			</div>
			<div class="form-group" style="margin-left:200px">
				<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</button>
			</div>
		</form>
	</div>
