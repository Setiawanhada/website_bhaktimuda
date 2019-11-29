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
            
			<h2><label class="id_presensi"><?= $rs_data['id_presensi']?></br><label>Presensi Bulan : <?php echo $rs_data['bulan'] ?>,Tahun : <?php echo $rs_data['tahun'] ?></h2>
			<div class="row">
				<div class="col-md-4">
					<!-- tabel get data by ajax + interval -->
					<div id="tableHolder">
						
					</div>
                </div>
                <div class="col-md-8">
				
                    <label>Scan Barcode Untuk Melakukan Presensi</label><br>
					<img src="<?= base_url('cache/'.$rs_img) ?>" alt="" srcset="">
                    
				</div>
			</div>
		</div>
    </div>
</div>
