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
		<div class="container">
            
			<h2>Presensi : <?php echo $rs_data['bulan'] ?>, <?php echo $rs_data['tahun'] ?></h2>
			<p>Presensi Manual<br>
			<form action="<?php echo site_url('admin/presensi/presensi_manual')?>" method="post">
			<input type="text" name="id_presensi" value="<?= $rs_data['id_presensi']?>" hidden>
			<input type="text" name="id_anggota" class="form-control-row col-md-2" placeholder="ID Anggota">
			<button class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Presensi</button>
			</form>
			</p>
			<div class="row">
				<div class="col-md-7">
					<!-- tabel get data by ajax + interval -->
					<div id="tableHolder">
						
					</div>
                </div>
                <div class="col-md-5">
				
                    <label>Scan Barcode Untuk Melakukan Presensi</label><br>
					<img src="<?= base_url('cache/'.$rs_img) ?>" alt="" srcset=""><br>
					<a href="<?php echo site_url('admin/presensi/view')?>" style="margin-left:27%" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Selesai</a>
				</div>
			</div>
		</div>
    </div>
</div>
