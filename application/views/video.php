
<div class="section-top-border">
	<center>
		<h3 class="mb-30">Video Kegiatan Bhakti Muda</h3>
	</center>
	<div class="row justify-content-center d-flex align-items-center">
            <?php $no=1; foreach ($rs_data as $isi): ?>
			<div class="col-md-3 single-team">
				<div class="thumb">
					<!-- <img class="img-fluid" src="" alt=""> -->
					<!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/KrqQgEiLcTQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
					<iframe width="95%" height="250" src="https://www.youtube.com/embed/<?= $isi['link']?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" class="thumbimg" allowfullscreen></iframe>
				</div>
				<div class="meta-text mt-30 text-center">
					<h4><?= $isi['judul'] ?></h4>
				</div>
			</div>
            <?php $no++; endforeach; ?>
			<!-- Batas -->			
        </div>
</div>
