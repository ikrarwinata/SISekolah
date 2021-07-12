<!--/about -->
<div id="about" class="w3-agile-contact-address">
	<div class="container">
        <div class="w3-agile-contact-head">
        <h3 style="margin: 15px auto;">Kontak Kami</h3>
        </div>
        <div class="w3-agile-contact-grids">
            <div class="agile-contact">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 text-center">
                        <div>
                            <i class="fa fa-map-marker fa-3x text-primary"></i><br>
                            <?php echo $this->Profil_sekolah_model->get_profil("alamat") ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 text-center">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div>
                                    <i class="fa fa-envelope fa-lg text-primary"></i><br>
                                    <?php echo $this->Profil_sekolah_model->get_profil("email") ?>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                <div>
                                    <i class="fa fa-phone fa-lg text-primary"></i><br>
                                    <?php echo $this->Profil_sekolah_model->get_profil("phone") ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <hr>
                <div class=" contact-map-right">
                    <div id="map">
                        <div style="width: 100%"><iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=300&amp;hl=en&amp;q=-1.042731,%20104.026827+(MTs%20DDI%20Kota%20Harapan)&amp;t=p&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.maps.ie/route-planner.htm">Road Trip Planner</a></div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin: 15px auto;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button type="button" class="form-control btn btn-primary" onclick="window.location='Welcome'"><i class="fa fa-home"></i>&nbsp;Kembali</button>
                </div>
            </div>
        </div>

	</div>
</div>
<!--//about -->