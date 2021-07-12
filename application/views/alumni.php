<!--/about -->
<div id="about" class="about all_pad w3ls">
    <div class="container">
        <h3 class="w3-about-title">Data Alumni</h3>
        <div class="ser-top-grids">
            <div class="row" style="margin: auto 8px;">
                <div class="col-lg-4 col-md-4 col-sm-4">

                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <form action="<?php echo site_url('Welcome/alumni'); ?>" class="form-inline" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                            <span class="input-group-btn">
                                <?php
                                if ($q <> '') {
                                ?>
                                    <a href="<?php echo site_url('Welcome/alumni'); ?>" class="btn btn-sm btn-default">Reset</a>
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
                            <th>NIS</th>
                            <th>Nama lengkap</th>
                            <th>Jenis kelamin</th>
                            <th>Tempat / tanggal lahir</th>
                            <th>Email</th>
                            <th class="text-center">Tahun Masuk</th>
                            <th class="text-center">Tahun Lulus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($alumni_data as $alumni) {
                        ?>
                            <tr>
                                <td width="80px"><?php echo ++$start ?></td>
                                <td width="180px"><?php echo $alumni->nis ?></td>
                                <td><?php echo $alumni->nama ?></td>
                                <td><?php echo $alumni->jenis_kelamin ?></td>
                                <td><?php echo $alumni->tempat_lahir . ", " . $alumni->tanggal_lahir ?></td>
                                <td><?php echo $alumni->email ?></td>
                                <td class="text-center"><?php echo $alumni->tahun_masuk ?></td>
                                <td class="text-center"><?php echo $alumni->tahun_lulus ?></td>
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