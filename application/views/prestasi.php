<!--/about -->
<div id="about" class="about all_pad w3ls">
	<div class="container">
		<h3 class="w3-about-title">Prestasi Yang Pernah Diraih</h3>
		<div class="ser-top-grids">
            <div class="row" style="margin: auto 8px;">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <form action="<?php echo site_url('Welcome/prestasi'); ?>" class="form-inline" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                            <span class="input-group-btn">
                                <?php 
                                    if ($q <> '')
                                    {
                                        ?>
                                        <a href="<?php echo site_url('Welcome/prestasi'); ?>" class="btn btn-sm btn-default">Reset</a>
                                        <?php
                                    }
                                ?>
                              <button class="btn btn-sm btn-primary" type="submit">Pencarian</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <div class="">
                <table class="table" style="width: 100%; border-collapse: collapse;table-layout: auto;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th></th>
                        <th>Prestasi</th>
                        <th>Tingkat</th>
                        <th>Tanggal</th>
                    </tr>
                    </thead>
                    <tbody>
                    	<?php
                        foreach ($prestasi_data as $prestasi)
                        {
                        ?>
                        <tr>
                            <td style="max-width: 40px;width: 40px"><?php echo ++$start ?></td>
                            <td style="max-width: 20px;width: 20px"><a href="#" role="button" class="green bigger-140 show-details-btn" title="Tampilkan rincian"><i class="fa fa-angle-double-down"></i></a></td>
                            <td width="45%"><?php echo $prestasi->nama ?></td>
                            <td><?php echo $prestasi->tingkat ?></td>
                            <td><?php echo $prestasi->tanggal ?></td>
                        </tr>
                        <tr class="hidden">
                            <td class="bordered" colspan="5" style="min-height: 200px; margin: auto;">
                                <div style="width: 100%; min-height: 200px; border: 1px #095c79 solid; border-radius: 25px">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-4" style="align-self: center;align-items: center;">
                                            <?php if ($prestasi->foto!=NULL): ?>
                                                <a href="<?php echo $prestasi->foto ?>" target="_blank"><img src="<?php echo $prestasi->foto ?>" style="max-width: 90%;max-height: 170px; margin: 15px; border-radius: 20px"></a>
                                            <?php endif ?>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-8" style="padding: 25px">
                                            <?php echo $prestasi->deskripsi ?>
                                        </div>
                                    </div>
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
            <hr class="clearfix">
            <div class="col-lg-6 col-md-6 col-sm-6">
                
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="pull-right"><?php echo $pagination ?></div>
            </div>
            <hr class="clearfix">
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="button" class="form-control btn btn-primary" onclick="window.location='Welcome'"><i class="fa fa-home"></i>&nbsp;Kembali</button>
            </div>
        </div>
	</div>
</div>
<!--//about -->