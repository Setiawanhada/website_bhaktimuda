
<div class="section-top-border">
	<center>
		<h3 class="mb-30">Presensi Kedatangan anggota Bhakti Muda</h3>
	</center>
	<div class="progress-table-wrap">
		<div class="progress-table">
			<div class="table-head">
				<div class="serial">No</div>
				<div class="country">Bulan</div>
				<div class="country">Tahun</div>
				<div class="country">Jumlah Hadir</div>
				<div class="visit">Link Daftar Hadir</div>
			</div>
			<?php $no=1; foreach ($rs_data as $data): ?>
			<div class="table-row">
				<div class="serial"><?php echo $no ?></div>
				<div class="country"> <?php echo $data['bulan']; ?></div>
				<div class="visit"> <?php echo $data['tahun']; ?></div>
				<div class="visit"> <?php echo $data['jml']; ?></div>
				<div class="visit"><a href="<?php echo $data['link']; ?>">Klik Disini</a> </div>
			</div>
			<?php $no++; endforeach; ?>
		</div>
	</div>
</div>
