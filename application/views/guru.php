<!--/about -->
<div id="about" class="about all_pad w3ls">
	<div class="container">
		<h3 class="w3-about-title">Tenaga Pengajar</h3>
		<div class="ser-top-grids">
            <div class="row" style="margin: auto 8px;">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <form action="<?php echo site_url('Welcome/guru'); ?>" class="form-inline" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                            <span class="input-group-btn">
                                <?php 
                                    if ($q <> '')
                                    {
                                        ?>
                                        <a href="<?php echo site_url('Welcome/guru'); ?>" class="btn btn-sm btn-default">Reset</a>
                                        <?php
                                    }
                                ?>
                              <button class="btn btn-sm btn-primary" type="submit">Pencarian</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table" style="width: 100%; border-collapse: collapse;table-layout: auto;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                    </tr>
                    </thead>
                    <tbody>
                    	<?php
                        foreach ($guru_data as $guru)
                        {
                        ?>
                        <tr>
                            <td width="80px"><?php echo ++$start ?></td>
                            <td width="150px"><?php echo $guru->nip ?></td>
                            <td><?php echo $guru->nama ?></td>
                            <td><?php echo $guru->jabatan ?></td>
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