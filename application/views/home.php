
<div id="about" class="about all_pad w3ls">
	<div class="container">
		<h3 class="w3-about-title">Visi & Misi</h3>
		<div class="ser-top-grids">
			<div class="col-md-6 ser-grid wow flipInY" data-wow-duration="1.5s" data-wow-delay="0s">
				<div class="con-left text-center">
					<div class="spa-ico"><span><i class="fa fa-book" aria-hidden="true"></i></span></div>
					<h5>Visi</h5>
					<?php echo str_shortened($this->Profil_sekolah_model->get_profil("visi"), 180, ".......") ?>
					
				</div>
			</div>
			<div class="col-md-6 ser-grid wow flipInY" data-wow-duration="1.5s" data-wow-delay="0s">
				<div class="con-left text-center">
					<div class="spa-ico"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></div>
					<h5>Misi</h5>
					<?php echo str_shortened($this->Profil_sekolah_model->get_profil("misi"), 180, ".......") ?>
					
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!--//about -->
<!--/services -->
<?php if (count($berita_data)>=1): ?>
	<div class="services" id="services">
		<!-- <div class="w3-services-head">
			<h5>Berita Lainnya</h5>
		</div> -->
		<div class="w3-service-grids">
			<?php foreach ($berita_data as $key => $berita): ?>
				<div class="w3-service-grid-top1" style="margin-top: 3px">
					<div class="col-md-12 w3-services-grid1">
							<div class="col-md-4 w3-services-01">
								<img src="<?php echo $berita->foto ?>" style="max-width: 250px; max-height: 250px">
							</div>
							<div class="col-md-8 w3-services-heading">
								<a href="Welcome/detail_berita/<?php echo $berita->id ?>"><h3><?php echo $berita->caption ?></h3></a>
								<?php echo str_shortened($berita->deskripsi, 180) ?>
							</div>
					</div>
					<div class="clearfix"></div>
				</div>
			<?php endforeach ?>
			<div class="clearfix"></div>
		</div>
	</div>
<?php endif ?>

<!--//services -->
<!-- gallery -->
<div class="gallery" id="gallery">
	<div class="container">
		<div class="agileits_w3layouts_head">
		<h3>Gallery Sekolah Kami</h3>
		</div>
		<div class="w3layouts_gallery_grids">
			<?php foreach ($gallery_data as $key => $foto): ?>
			<div class="col-md-4 w3layouts_gallery_grid">
				<a href="<?php echo $foto->file ?>" class="lsb-preview" data-lsb-group="header">
					<div class="w3layouts_news_grid">
						<img src="<?php echo $foto->file ?>" alt=" " class="img-responsive">
						<div class="w3layouts_news_grid_pos">
							<div class="wthree_text"><h3><?php echo $foto->caption ?></h3></div>
						</div>
					</div>
				</a>
			</div>
			<?php endforeach ?>
			
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- //gallery -->


<!-- professors -->
<?php if (count($guru_data)>=1): ?>
	<div class="jarallax team" id="professor">
		<div class="team-dot">
			<div class="container">
				<div class="w3-agile-heading team-heading">
					<h3>Tenaga Pengajar Kami</h3>
				</div>
				<div class="agileits-team-grids">
					<?php foreach ($guru_data as $key => $guru): ?>
						<div class="col-md-3 agileits-team-grid">
							<div class="team-info">
								<img src="<?php echo $guru->foto ?>" alt="">
								<div class="team-caption"> 
									<h4><?php echo $guru->nama ?></h4>
									<p><?php echo $guru->jabatan ?></p>
									<ul>
										<?php if ($guru->fb!=NULL): ?>
											<li><a href="<?php echo $guru->fb ?>"><i class="fa fa-facebook fa-lg"></i></a></li>
										<?php endif ?>
										<?php if ($guru->twitter!=NULL): ?>
											<li><a href="<?php echo $guru->twitter ?>"><i class="fa fa-twitter fa-lg"></i></a></li>
										<?php endif ?>
										<?php if ($guru->whatsapp!=NULL): ?>
											<li><a href="https://api.whatsapp.com/send?phone=<?php echo $guru->whatsapp ?>&text=&source=&data="><i class="fa fa-whatsapp fa-lg"></i></a></li>
										<?php endif ?>
									</ul>
								</div>
							</div>
						</div>
					<?php endforeach ?>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>
<!-- //professor 