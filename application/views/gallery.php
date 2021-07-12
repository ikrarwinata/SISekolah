	<!-- gallery -->
	<div class="gallery" id="gallery">
		<div class="container">
			<div class="agileits_w3layouts_head">
			<h3>Gallery Sekolah</h3>
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
	        <div class="row" style="margin: 8px auto">
	            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                <button type="button" class="form-control btn btn-primary" onclick="window.location='Welcome'"><i class="fa fa-home"></i>&nbsp;Kembali</button>
	            </div>
	        </div>
		</div>
	</div>
<!-- //gallery -->