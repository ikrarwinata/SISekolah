<!--/about -->
<div id="about" class="about all_pad w3ls">
	<div class="container">
		<h3 class="w3-about-title">Visi & Misi</h3>
		<div class="ser-top-grids">
			<div class="col-md-12 ser-grid wow flipInY" data-wow-duration="1.5s" data-wow-delay="0s">
				<div class="con-left text-center">
					<div class="spa-ico"><span><i class="fa fa-book" aria-hidden="true"></i></span></div>
					<h5>Visi</h5>
					<?php echo $this->Profil_sekolah_model->get_profil("visi") ?>
				</div>
			</div>
			<div class="col-md-12 ser-grid wow flipInY" data-wow-duration="1.5s" data-wow-delay="0s">
				<div class="con-left text-center">
					<div class="spa-ico"><span><i class="fa fa-pencil" aria-hidden="true"></i></span></div>
					<h5>Misi</h5>
					<?php echo $this->Profil_sekolah_model->get_profil("misi") ?>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
        <div class="row" style="margin:8px auto">
            <div class="col-lg-12">
                <button type="button" class="form-control btn btn-primary" onclick="window.location='Welcome'"><i class="fa fa-home"></i>&nbsp;Kembali</button>
            </div>
        </div>
	</div>
</div>
<!--//about -->