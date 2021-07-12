
<!-- //map -->
<div class="footer">
	<div class="container">
		<div class="footer-grids-all">
		<div class="footer-w3-grid-top">
			<div class="col-md-4 w3layouts_footer_grid">
				<h3>Kontak :</h3>
					<ul>
						<li><i class="glyphicon glyphicon-send"></i> <?php echo $this->Profil_sekolah_model->get_profil('alamat') ?></li>
						<li><i class="glyphicon glyphicon-phone"></i> <?php echo $this->Profil_sekolah_model->get_profil('phone') ?></li>
						<li><i class="glyphicon glyphicon-envelope"></i> <a href="mailto:<?php echo $this->Profil_sekolah_model->get_profil('email') ?>"> <?php echo $this->Profil_sekolah_model->get_profil('email') ?></a></li>
					</ul>

			</div>
		</div>
			<div class="col-md-8 w3layouts_footer_grid">
				<ul class="w3l_footer_nav">
					<li><a href="Welcome" >Beranda</a></li>
					<li><a href="Welcome/berita" >Berita</a></li>
					<li><a href="Welcome/kegiatan" >Kegiatan</a></li>
					<li><a href="Welcome/kontak" >Kontak</a></li>
					<li><a href="Welcome/login" >Login</a></li>
				</ul>
				<div class="col-md-6 w3-footer-icons">
				<h3>Kirim Masukan</h3>
				<p><span><i class="fa fa-envelope-o" aria-hidden="true"></i></span><a href="mailto:example@mail.com"> <?php echo $this->Profil_sekolah_model->get_profil('email') ?></a></p>
				</div>
				<div class="col-md-6 w3-footer-icons">
				<h3>Hubungi Kami</h3>
				<i class="fa fa-phone" aria-hidden="true"></i><span><?php echo $this->Profil_sekolah_model->get_profil('phone') ?></span>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="footer-bottom-agile">
			<p>© 2021 <?php echo $this->Profil_sekolah_model->get_profil("nama_singkat_sekolah") ?> . All rights reserved | Design by <a href="http://w3layouts.com">W3layouts.</a></p>
		</div>
	</div>
</div>
<!-- //footer -->