<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Pengurus</a>
			</li>
			<li class="breadcrumb-item active">Edit Pengurus</li>
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
		<form action="<?php echo base_url('admin/pengurus/edit_process') ?>" method="post"
            enctype="multipart/form-data">
            <input type="text" name="id_pengurus" value="<?php echo $rs_edit['id_pengurus']?>" hidden>
            <div class="form-group col-md-6">
				<label for="inputAddress">Jabatan</label>
				<select class="form-control select2" name="kode_jabatan"
                    data-placeholder="-- Pilih Jabatan --">
                    <option value="" disabled selected>-- Pilih Jabatan --</option>
                    <?php foreach ($rs_jabatan as $jabatan): ?>
                    <option value="<?php echo $jabatan['kode_jabatan']?>" <?php if ($rs_edit['kode_jabatan'] == $jabatan['kode_jabatan']){echo 'selected';} ?>><?php echo $jabatan['nama_jabatan']?>
                    </option>
                    <?php endforeach; ?>
                </select>
			</div>
			<div class="form-group col-md-6">
				<label for="inputAddress">Jenis Jabatan</label>
				<select class="form-control select2" name="kode_jenis_jabatan"
                    data-placeholder="-- Pilih Jenis Jabatan --">
                    <option value="" disabled selected>-- Pilih Jenis Jabatan --</option>
                    <?php foreach ($rs_jenis_jabatan as $jenis_jabatan): ?>
                    <option value="<?php echo $jenis_jabatan['kode_jenis_jabatan']?>" <?php if ($rs_edit['kode_jenis_jabatan'] == $jenis_jabatan['kode_jenis_jabatan']){echo 'selected';} ?>><?php echo $jenis_jabatan['nama_jenis_jabatan']?>
                    </option>
                    <?php endforeach; ?>
                </select>
			</div>
			<div class="form-group col-md-6">
				<label for="inputAddress">Nama</label>
				<input type="text" class="form-control" name="nama" placeholder="Nama Pengurus" value="<?php echo $rs_edit['nama']?>">
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress2">Gambar Lama</label><br>
                <img src="<?php echo base_url('upload/pengurus/'.$rs_edit['gambar']) ?>" width="50%" hight="50%" />
            </div>
			<div class="form-group col-md-6">
				<label for="inputAddress2">Gambar</label>
				<input type="file" class="dropify" name="gambar">
			</div>
			<div class="form-group col-md-2">
				<label for="inputAddress">Status</label>
				<select name="status" class="form-control select2">
                    <option value="">-Pilih Status-</option>
                    <option value="1" <?php if ($rs_edit['status'] == '1'){echo 'selected';} ?>>Aktif</option>
                    <option value="2" <?php if ($rs_edit['status'] == '2'){echo 'selected';} ?>>Tidak Aktif</option>
                </select>
			</div>
			<div class="form-group" style="margin-left:200px">
				<button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</button>
				<a href="<?php echo site_url('admin/pengurus/view')?>" class="btn btn-success btn-sm"><i class="fas fa-arrow-left"></i></i> Kembali</a>
            </div>
		</form>
	</div>
