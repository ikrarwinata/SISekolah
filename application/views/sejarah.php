<!--/about -->
<div id="about" class="about all_pad w3ls">
	<div class="container">
		<h3 class="w3-about-title">Sejarah <?php echo $this->Profil_sekolah_model->get_profil("nama_singkat_sekolah") ?></h3>
		<div class="ser-top-grids">
            <?php echo $sejarah->nilai ?>
			<div class="clearfix"></div>
            <hr>
		</div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="button" class="form-control btn btn-primary" onclick="window.location='Welcome'"><i class="fa fa-home"></i>&nbsp;Kembali</button>
            </div>
        </div>
	</div>
</div>
<!--//about -->