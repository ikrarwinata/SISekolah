	<!--header-->
	<div class="header">
		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="w3_navigation_pos">
						<h1 style="font-size: 32px"><a href="Welcome"><?php echo $this->Profil_sekolah_model->get_profil("nama_singkat_sekolah") ?></i></a></h1>
					</div>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="link-effect-2" id="link-effect-2">
						<ul class="nav navbar-nav">
							<li style="margin: 0px 0px 35px 0px;"><a href="Welcome">Beranda</a></li>
							<li style="margin: 0px 0px 35px 0px;"><a href="Welcome/berita">Berita</a></li>
							<li style="margin: 0px 0px 35px 0px;"><a href="Welcome/kegiatan">Kegiatan</a></li>
							<li style="margin: 0px 0px 35px 0px;"><a href="Welcome/psb">Pendaftaran</a></li>
							<li style="margin: 0px 0px 35px 0px;">
								<a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Tentang&nbsp;<i class="fa fa-caret-down"></i></a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 200px">
									<div style="margin-top: 5px; margin-bottom: 15px;"><a href="Welcome/about">Profil Sekolah</a></div>
									<div style="margin-top: 5px; margin-bottom: 15px;"><a href="Welcome/sejarah">Sejarah</a></div>
									<div style="margin-top: 5px; margin-bottom: 15px;"><a href="Welcome/visimisi">Visi & Misi</a></div>
									<div style="margin-top: 5px; margin-bottom: 15px;"><a href="Welcome/struktur">Struktur Organisasi</a></div>
								</div>
							</li>
							<li style="margin: 0px 0px 35px 0px;">
								<a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Sekolah&nbsp;<i class="fa fa-caret-down"></i></a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 200px">
									<div style="margin-top: 5px; margin-bottom: 15px;"><a href="Welcome/guru">Data Guru</a></div>
									<div style="margin-top: 5px; margin-bottom: 15px;"><a href="Welcome/siswa">Data Siswa</a></div>
									<div style="margin-top: 5px; margin-bottom: 15px;"><a href="Welcome/alumni">Data Alumni</a></div>
									<div class="dropdown-divider">
										<hr>
									</div>
									<div style="margin-top: 5px; margin-bottom: 15px;"><a href="Welcome/prestasi">Prestasi</a></div>
									<div style="margin-top: 5px; margin-bottom: 15px;"><a href="Welcome/gallery">Gallery</a></div>
									<div style="margin-top: 5px; margin-bottom: 15px;"><a href="Welcome/fasilitas">Sarana & Prasarana</a></div>
									<div class="dropdown-divider">
										<hr>
									</div>
								</div>
							</li>
							<li style="margin: 0px 0px 35px 0px;"><a href="Welcome/kontak">Kontak</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</nav>
	</div>
	<!--//header-->