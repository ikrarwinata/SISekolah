<!--/about -->
<div id="about" class="about all_pad w3ls">
	<div class="container">
		<h3 class="w3-about-title">Struktur Organisasi <?php echo $this->Profil_sekolah_model->get_profil("nama_singkat_sekolah") ?></h3>
		<div class="ser-top-grids">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <a href="<?php echo $gambar_struktur->nilai ?>" target="_blank"><img src="<?php echo $gambar_struktur->nilai ?>" style="max-height: 800px; max-width: 90%;"></a>
                </div>
            </div>

            <div class="row" style="margin: 15px;padding: 15px;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php echo $detail_struktur->nilai ?>
                </div>
            </div>
			<div class="clearfix"></div>
            <hr>
		</div>
        <div class="row">
            <div class="col-lg-6">
                
            </div>
            <div class="col-lg-6">
                <button type="button" class="form-control btn btn-primary" onclick="window.location='Welcome'"><i class="fa fa-home"></i>&nbsp;Kembali</button>
            </div>
        </div>
	</div>
</div>
<!--//about -->