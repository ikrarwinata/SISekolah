<!--/about -->
<div id="about" class="about all_pad w3ls">
	<div class="container">
		<h3 class="w3-about-title">Informasi Sekolah</h3>
		<div class="ser-top-grids">
            <div class="table-responsive">
                <table class="table" style="width: 100%; border-collapse: collapse;table-layout: auto;">
                    <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    	<?php
                        foreach ($profil_sekolah_data as $profil_sekolah)
                        {
                        ?>
                        <tr>
                            <td width="80px"><?php echo ++$start ?></td>
                            <td><?php echo $profil_sekolah->text ?></td>
                            <td>
                                <div class="form-group">
                                    <input type="hidden" name="id[]" value="<?php echo $profil_sekolah->id ?>">
                                    <?php if ($profil_sekolah->inputtype=="textarea"): ?>
                                    	<?php echo $profil_sekolah->nilai ?>
                                    <?php elseif ($profil_sekolah->inputtype=="text"): ?>
                                    	<?php echo $profil_sekolah->nilai ?>
                                    <?php elseif ($profil_sekolah->inputtype=="int"): ?>
                                    	<?php echo $profil_sekolah->nilai ?>&nbsp;<small>m2</small>
                                    <?php elseif ($profil_sekolah->inputtype=="file"): ?>
                                        <img src="<?php echo $profil_sekolah->nilai ?>" style="max-width: 80%; max-height: 100px">
                                    <?php endif ?>
                                </div>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
				</table>
			</div>
			<div class="clearfix"></div>
		</div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="button" class="form-control btn btn-primary" onclick="window.location='Welcome'"><i class="fa fa-home"></i>&nbsp;Kembali</button>
            </div>
        </div>
	</div>
</div>
<!--//about -->