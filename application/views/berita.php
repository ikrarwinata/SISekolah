<!--/services -->
<div class="services" id="services">
	<div class="w3-services-head">
		<div class="row" style="margin: auto 8px;">
			<div class="col-lg-4 col-md-4 col-sm-4">
				
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4">
				<h3>Berita</h3>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4">
				<form action="<?php echo site_url('Welcome/berita'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('Welcome/berita'); ?>" class="btn btn-sm btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-sm btn-primary" type="submit">Pencarian</button>
                        </span>
                    </div>
                </form>
			</div>
		</div>
		
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
		<?php if (count($berita_data)==0): ?>
			<hr>
			<h3>Tidak ada berita seputar sekolah kami untuk ditampilkan</h3>
			<hr>
		<?php endif ?>
		<div class="clearfix"></div>
	</div>
	<div class="row">
		<hr class="clearfix">
		<div class="col-lg-6 col-md-6 col-sm-6">
			
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6">
			<div class="pull-right"><?php echo $pagination ?></div>
		</div>
	</div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="button" class="form-control btn btn-primary" onclick="window.location='Welcome'"><i class="fa fa-home"></i>&nbsp;Kembali</button>
            </div>
        </div>
</div>
<!--//services -->