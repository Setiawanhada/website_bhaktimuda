<!-- start banner Area -->
<section class="banner-area relative" id="home">
	<div class="overlay-bg overlay"></div>
	<div class="container">
		<div class="row fullscreen d-flex align-items-center justify-content-center">
			<div class="banner-content col-lg-6 col-md-12">
				<h1 class="text-uppercase">
					Bhakti Muda <br>

				</h1>
				<p class="pb-20 text-white">
					Official Website Resmi Karang Taruna Bhakti Muda.<br>
					Wadah Organisasi Untuk Seluruh Pemuda di Posakan Barat Rt 02, Cawas, Klaten.
				</p>
				<a href="presensi.php" class="primary-btn2 header-btn text-uppercase">Lihat Daftar Hadir</a>
			</div>
			<div class="col-lg-6">
				<img class="img-fluid" src="<?php echo base_url('assets/public/images/bm.png')?>" width="80%" alt="">
			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->

<!-- start blog Area -->
<section class="blog-area section-gap" id="blog">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-70 col-lg-8">
				<div class="title text-center">
					<h1 class="mb-10">Informasi :</h1>
				</div>
			</div>
		</div>
		<div class="row">
        <?php foreach ($rs_data as $data): ?>
			<div class="col-lg-3 col-md-6 single-blog">
				<div class="thumb">
					<img class="img-fluid" src="<?php echo base_url('upload/informasi/'.$data['gambar']) ?>" alt="">
				</div>
				<p class="date"><?php echo mediumdate_indo($data['tanggal']) ?></p>
				<h4><a href="#"><?php echo $data['judul'] ?></a></h4>
				<p>
                <?php echo $data['isi'] ?>
				</p>

            </div>
        <?php endforeach; ?>
		</div>
	</div>
</section>
