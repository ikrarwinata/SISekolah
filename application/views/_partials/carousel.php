	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<?php 
			$no = 0;
			$active = 'class="active"';
			foreach ($carousel_data as $key => $value): ?>
				<li data-target="#myCarousel" data-slide-to="<?php echo $no++; ?>" <?php echo ($no==1?$active:NULL); ?>></li>
			<?php endforeach ?>
		</ol>
		<div class="carousel-inner" role="listbox">
			<?php 
			$no = 0;
			$active = 'active';
			foreach ($carousel_data as $key => $value): ?>
				<div class="item carousel-item <?php echo ($no==0?$active:NULL); ?>"> 
					<div class="hide hidden d-none visible-none img-file-path"><?php echo $value->file ?></div>
					<div class="container">
						<div class="carousel-caption">
							<h2><?php echo $value->header ?></h2>
							<p><?php echo $value->text ?></p>
						</div>
					</div>
				</div>
			<?php
			$no++;
			 endforeach ?>
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>

		<!-- The Modal -->
		<div id="myModal" class="modal wthree-modal" tabindex="-1"> 
			<!-- Modal content -->
			<div class="modal-content">
				<div class="modal-header">
					<span class="close" data-dismiss="modal" >&times;</span>
					<h3>Education portal</h3>
				</div>
				<div class="col-md-6 modal-img">
					<img src="assets/images/public-page/ban1.jpg" class="img-responsive" alt="w3layouts" title="w3layouts">
				</div>
				<div class="col-md-6 modal-text">
					<p class="banner-p1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed nisl ultricies, dignissim mi at, dignissim dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque tempor ultrices nisi eget dictum. Integer quis massa ut elit laoreet consectetur. Sed rhoncus erat tellus, at commodo erat mattis eu.</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>		
		<div class="thim-click-to-bottom">
			<a href="#professor" class="scroll">
				<i class="fa  fa-chevron-down"></i>
			</a>
		</div>
    </div> 