
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
				<h4><a href="#"><?php echo $data['judul']; ?></a></h4>
				<p>
					<?php echo $data['isi']; ?>
				</p>
			</div>
		<?php endforeach; ?>
		</div>
	</div>
</section>
