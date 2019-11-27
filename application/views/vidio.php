<?php include "template/header.php"; ?>
					<div class="section-top-border">
						<center><h3 class="mb-30">Vidio Kegiatan Bhakti Muda</h3></center>
						<div class="progress-table-wrap">
							<div class="progress-table">
								<div class="table-head">
									<div class="serial">No</div>
									<div class="country">Nama Kegiatan</div>
									<div class="visit">Link</div>
									
								</div>
								 <?php 
                                                        require "config/koneksi.php";
                                                        $no = 1;
                                                        $data = mysqli_query($connect, "SELECT * FROM vidio");
                                                        while($isi = mysqli_fetch_array($data))
                                                        {
                                                    ?>
								<div class="table-row">
									<div class="serial"><?php echo $isi['kode_vidio']; ?></div>
									<div class="country"> <?php echo $isi['judul']; ?></div>
									<div class="visit"><a href="<?php echo $isi['link']; ?>">Klik Disini</a> </div>
									<div class="percentage">
										
									</div>
								</div>
								
								
								
								
								
							<?php
                                                    }
                                                    ?>
							</div>
						</div>
					</div>
					<?php include "template/footer.php"; ?>