<!--/services -->
<div class="services">
	<div class="w3-services-head">
		<h3>Kegiatan Siswa</h3>
	</div>
	<div class="w3-service-grids">
		<?php
		$lastday = NULL;
		foreach ($kegiatan_data as $key => $kegiatan): ?>
				<?php if ($kegiatan->hari!=$lastday && $lastday!=NULL): ?>
					<hr>
				<?php endif ?>
			<div class="w3-service-grid-top1" style="margin-top: 8px">
				<div class="col-md-12 w3-services-grid1">
						<div class="col-md-3 w3-services-01 text-center">
							<?php if ($kegiatan->foto!=NULL): ?>
								<img src="<?php echo $kegiatan->foto ?>" style="max-width: 150px; max-height: 150px">
							<?php endif ?>
						</div>
						<div class="col-md-9 w3-services-heading">
							<h4 style="color:white"><?php echo $kegiatan->hari.", ".$kegiatan->jam." - ".$kegiatan->jam_selesai ?></h4>
							<small style="color: #9fa0a1"><?php echo $kegiatan->kegiatan ?></small>
						</div>
				</div>
				<div class="clearfix"></div>
				<?php $lastday = $kegiatan->hari ?>
			</div>
		<?php endforeach ?>
			<hr>
		<?php if (count($kegiatan_data)==0): ?>
			<h3>Tidak ada kegiatan siswa kami untuk ditampilkan</h3>
			<hr>
		<?php endif ?>
		<div class="clearfix"></div>
	</div>
</div>
<!--//services -->