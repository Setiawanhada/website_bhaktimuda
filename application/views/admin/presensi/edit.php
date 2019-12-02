<div id="content-wrapper">

	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Presensi</a>
			</li>
			<li class="breadcrumb-item active">Edit Presensi</li>
		</ol>
		<div>
		<!-- load notif templates -->
		<?php $this->load->view('admin/dashboard/notification') ?>
		<!-- end load notif -->
		</div>
		<form action="<?php echo base_url('admin/presensi/edit_process') ?>" method="post"
			enctype="multipart/form-data">
            <input type="text" name="id_presensi" value="<?php echo $rs_edit['id_presensi'] ?>" hidden>
			<div class="form-group col-md-6">
				<label for="inputAddress">Bulan</label>
				<select name="bulan" class="form-control">
                    <option value="">-Pilih Bulan-</option>
                    <option value="Januari" <?php if ($rs_edit['bulan'] == 'Januari'){echo 'selected';} ?>>Januari</option>
                    <option value="Februari" <?php if ($rs_edit['bulan'] == 'Februari'){echo 'selected';} ?>>Februari</option>
                    <option value="Maret" <?php if ($rs_edit['bulan'] == 'Maret'){echo 'selected';} ?>>Maret</option>
                    <option value="April" <?php if ($rs_edit['bulan'] == 'April'){echo 'selected';} ?>>April</option>
                    <option value="Mei" <?php if ($rs_edit['bulan'] == 'Mei'){echo 'selected';} ?>>Mei</option>
                    <option value="Juni" <?php if ($rs_edit['bulan'] == 'Juni'){echo 'selected';} ?>>Juni</option>
                    <option value="Juli" <?php if ($rs_edit['bulan'] == 'Juli'){echo 'selected';} ?>>Juli</option>
                    <option value="Agustus" <?php if ($rs_edit['bulan'] == 'Agustus'){echo 'selected';} ?>>Agustus</option>
                    <option value="September" <?php if ($rs_edit['bulan'] == 'September'){echo 'selected';} ?>>September</option>
                    <option value="Oktober" <?php if ($rs_edit['bulan'] == 'Oktober'){echo 'selected';} ?>>Oktober</option>
                    <option value="November" <?php if ($rs_edit['bulan'] == 'November'){echo 'selected';} ?>>November</option>
                    <option value="Desember" <?php if ($rs_edit['bulan'] == 'Desember'){echo 'selected';} ?>>Desember</option>
                </select>
			</div>
			<div class="form-group col-md-6">
				<label for="inputAddress">Tahun</label>
				<input type="text" class="form-control" name="tahun" placeholder="Tahun Presensi" value="<?php echo $rs_edit['tahun'] ?>">
            </div>
			<div class="form-group" style="margin-left:200px">
				<button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</button>
				<a href="<?php echo site_url('admin/presensi/view')?>" class="btn btn-success btn-sm"><i class="fas fa-arrow-left"></i></i> Kembali</a>
			</div>
		</form>
	</div>
