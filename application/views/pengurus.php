<!-- Start team Area -->
<section class="team-area section-gap" id="team">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-70 col-lg-8">
				<div class="title text-center">
					<h1 class="mb-10">Pengurus Inti</h1>
				</div>
			</div>
		</div>
		<div class="row justify-content-center d-flex align-items-center">
            <?php $no=1; foreach ($rs_inti as $isi): ?>
			<div class="col-md-3 single-team">
				<div class="thumb">
					<img class="img-fluid" src="<?php echo base_url('upload/pengurus/'.$isi['gambar']) ?>" alt="">
				</div>
				<div class="meta-text mt-30 text-center">
					<h4><?php echo $isi['nama']; ?></h4>
					<p><?php echo $isi['nama_jabatan']; ?></p>
					<p><?php echo $isi['nama_jenis_jabatan']; ?></p>
				</div>
			</div>
            <?php $no++; endforeach; ?>
			<!-- Batas -->			
        </div>
        
	</div>	
</section>
<!-- End team Area -->