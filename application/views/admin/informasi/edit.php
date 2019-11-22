<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Informasi</a>
			</li>
			<li class="breadcrumb-item active">Edit Informasi</li>
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
		<form action="<?php echo base_url('admin/informasi/edit_process') ?>" method="post"
			enctype="multipart/form-data">
            <input type="text" name="kode_info" value="<?php echo $rs_edit['kode_info'] ?>" hidden>
			<div class="form-group col-md-6">
				<label for="inputAddress">Judul Informasi</label>
				<input type="text" class="form-control" name="judul" placeholder="Judul Informasi" value="<?php echo $rs_edit['judul'] ?>">
			</div>
            <div class="form-group col-md-6">
                <label for="inputAddress2">Gambar Lama</label><br>
                <img src="<?php echo base_url('upload/informasi/'.$rs_edit['gambar']) ?>" width="65%" />
            </div>
			<div class="form-group col-md-6">
				<label for="inputAddress2">Gambar</label>
				<input type="file" class="dropify" name="gambar">
			</div>
			<div class="form-group col-md-6">
				<label for="inputAddress2">Isi Informasi</label>
				<textarea class="form-control" name="isi"><?php echo $rs_edit['isi'] ?></textarea>
			</div>
			<div class="form-group" style="margin-left:200px">
				<button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</button>
                <a href="<?php echo site_url('admin/informasi/view')?>" class="btn btn-success btn-sm"><i class="fas fa-arrow-left"></i></i> Kembali</a>
			</div>
		</form>
	</div>
