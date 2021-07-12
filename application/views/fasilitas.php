<!--/about -->
<div id="about" class="about all_pad w3ls">
	<div class="container">
		<h3 class="w3-about-title">Sarana &amp; Prasarana</h3>
		<div class="ser-top-grids">
            <div class="row" style="margin: auto 8px;">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <form action="<?php echo site_url('Welcome/fasilitas'); ?>" class="form-inline" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                            <span class="input-group-btn">
                                <?php 
                                    if ($q <> '')
                                    {
                                        ?>
                                        <a href="<?php echo site_url('Welcome/fasilitas'); ?>" class="btn btn-sm btn-default">Reset</a>
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
                        <th>Sarana &amp; Prasarana</th>
                        <th>Jumlah</th>
                    </tr>
                    </thead>
                    <tbody>
                    	<?php
                        foreach ($fasilitas_data as $fasilitas)
                        {
                        ?>
                        <tr>
                            <td style="max-width: 40px;width: 40px"><?php echo ++$start ?></td>
                            <td style="max-width: 20px;width: 20px"><a href="#" role="button" class="green bigger-140 show-details-btn" title="Tampilkan rincian"><i class="fa fa-angle-double-down"></i></a></td>
                            <td width="45%"><?php echo $fasilitas->nama ?></td>
                            <td><?php echo $fasilitas->jumlah ?></td>
                        </tr>
                        <tr class="hidden">
                            <td class="bordered" colspan="5">
                                <div class="inner-row-container">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-4" style="align-self: center;align-items: center;">
                                            <?php if ($fasilitas->gambar!=NULL): ?>
                                                <a href="<?php echo $fasilitas->gambar ?>" target="_blank"><img src="<?php echo $fasilitas->gambar ?>" style="max-width: 90%;max-height: 170px; margin: 15px; border-radius: 20px"></a>
                                            <?php endif ?>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-8" style="padding: 25px">
                                            <strong>Keterangan : </strong><hr>
                                            <?php echo $fasilitas->deskripsi ?>
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