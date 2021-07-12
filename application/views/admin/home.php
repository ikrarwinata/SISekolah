<div class="well well-sm alert-info">
    Selamat datang <span class="blue bolder"><?php echo $this->session->userdata('nama'); ?></span><br>
    Saat ini tanggal : <?php echo date("d M Y") ?>
</div>

<div class="visible-none d-none hide hidden" id="pie-values">
    <?php foreach ($perc_pengunjung as $key => $value): ?>
        <div class="obj-pie">
            <span class="bulan"><?php echo $key ?></span>
            <span class="nilai"><?php echo $value["nilai"] ?></span>
            <span class="warna"><?php echo $value["warna"] ?></span>
        </div>
    <?php endforeach ?>
</div>

<div class="widget-box">
    <div class="widget-header widget-header-flat widget-header-small">
        <h5 class="widget-title">
            <i class="ace-icon fa fa-signal"></i>
            Data Pengunjung
        </h5>

        <div class="widget-toolbar no-border">
            <div class="inline dropdown-hover">
                <button class="btn btn-minier btn-primary">
                    <?php if ($viewrange==0): ?>
                        Tahun Ini
                    <?php else: ?>
                        Keseluruhan
                    <?php endif ?>
                    <i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
                </button>

                <ul class="dropdown-menu dropdown-menu-right dropdown-125 dropdown-lighter dropdown-close dropdown-caret">
                    <li <?php echo($viewrange==0?'class="active"':NULL); ?>>
                        <a href="admin/Dashboard/index/0" <?php echo($viewrange==0?'class="blue"':NULL); ?>>
                            <?php if ($viewrange==0): ?>
                                <i class="ace-icon fa fa-caret-right bigger-110">&nbsp;</i>
                            <?php endif ?>
                            Tahun Ini
                        </a>
                    </li>

                    <li <?php echo($viewrange==1?'class="active"':NULL); ?>>
                        <a href="admin/Dashboard/index/1" <?php echo($viewrange==1?'class="blue"':NULL); ?>>
                            <?php if ($viewrange==1): ?>
                                <i class="ace-icon fa fa-caret-right bigger-110">&nbsp;</i>
                            <?php endif ?>
                            <i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
                            Keseluruhan
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <div class="widget-body">
        <div class="widget-main">
            <div>
                Total Pengunjung : <strong><?php echo $total_data ?></strong>
            </div>
            <div class="hr hr8 hr-double"></div>

            <div id="piechart-placeholder"></div>

        </div><!-- /.widget-main -->
    </div><!-- /.widget-body -->
</div><!-- /.widget-box -->
