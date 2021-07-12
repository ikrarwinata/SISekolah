<!--/about -->
<div id="about" class="about all_pad w3ls">
	<div class="container">
		<div class="ser-top-grids">
            <h3 class="w3-about-title"><?php echo $caption ?></h3>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <img src="<?php echo $foto ?>" style="max-width: 80%; max-height: 250px; height: 250px;width: auto">
                </div>
                <div class="col-lg-12 text-center">
                    
                </div>
                <div class="col-lg-12">
                    <span class="pull-right" style="margin: auto 15px"><strong><i class="fa fa-eye"></i>&nbsp;<small style="color: #62686a"><?php echo $dilihat ?></small></strong></span>
                    <span class="pull-right" style="margin: auto 15px"><strong><i class="fa fa-user"></i>&nbsp;<small style="color: #62686a"><?php echo $user ?></small></strong></span>
                    <span class="pull-right" style="margin: auto 15px"><strong><i class="fa fa-calendar"></i>&nbsp;<small style="color: #62686a"><?php echo $tanggal ?></small></strong></span>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-12">
                    <?php echo $deskripsi ?>
                </div>
            </div>
			<div class="clearfix"></div>
		</div>
        <hr>
	</div>
</div>
<?php if (count($berita_data)>=1): ?>
    <div class="services" id="services">
        <div class="w3-services-head">
            <h3>Berita Lainnya</h3>
        </div>
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
<!--//about -->