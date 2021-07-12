<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>MTs DDI Kota Harapan :: Administrator</title>
        <base href="<?php echo base_url() ?>">
        <meta name="description" content="top menu &amp; navigation" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="assets/aceadmin/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/aceadmin/font-awesome/4.5.0/css/font-awesome.min.css" />

        <!-- page specific plugin styles -->

        <!-- text fonts -->
        <link rel="stylesheet" href="assets/aceadmin/css/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="assets/aceadmin/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

        <!--[if lte IE 9]>
            <link rel="stylesheet" href="assets/aceadmin/css/ace-part2.min.css" class="ace-main-stylesheet" />
        <![endif]-->
        <link rel="stylesheet" href="assets/aceadmin/css/ace-skins.min.css" />
        <link rel="stylesheet" href="assets/aceadmin/css/ace-rtl.min.css" />

        <!--[if lte IE 9]>
          <link rel="stylesheet" href="assets/aceadmin/css/ace-ie.min.css" />
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- ace settings handler -->
        <script src="assets/aceadmin/js/ace-extra.min.js"></script>

        <?php foreach ($PageAttribute['bootstraps'] as $key => $value): ?>
        <link rel="stylesheet" href="<?php echo $value ?>"/>
        <?php endforeach ?>
        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="assets/aceadmin/js/html5shiv.min.js"></script>
        <script src="assets/aceadmin/js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="no-skin">
        <?php $this->load->view('admin/_partials/topbar', TRUE); ?>

        <div class="main-container ace-save-state" id="main-container">
            <?php $this->load->view('admin/_partials/navbar', TRUE); ?>

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="page-content">
                        <div class="page-header">
                            <h1>
                                <?php echo $PageAttribute['title'] ?>
                                <?php foreach ($PageAttribute["subtitle"] as $key => $value): ?>
                                    <small>
                                        <i class="ace-icon fa fa-angle-double-right"></i>
                                        <?php echo $value ?>
                                    </small>
                                <?php endforeach ?>
                            </h1>
                        </div><!-- /.page-header -->

                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <?php $this->load->view($PageAttribute["content"], TRUE); ?>
                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.page-content -->

                </div>
            </div><!-- /.main-content -->

            <?php $this->load->view('admin/_partials/footer', TRUE); ?>
        </div><!-- /.main-container -->

        <!-- basic scripts -->

        <!--[if !IE]> -->
        <script src="assets/aceadmin/js/jquery-2.1.4.min.js"></script>

        <!-- <![endif]-->

        <!--[if IE]>
<script src="assets/aceadmin/js/jquery-1.11.3.min.js"></script>
<![endif]-->
        <script type="text/javascript">
            if('ontouchstart' in document.documentElement) document.write("<script src='assets/aceadmin/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>
        <script src="assets/aceadmin/js/bootstrap.min.js"></script>

        <!-- page specific plugin scripts -->

        <!-- ace scripts -->
        <script src="assets/aceadmin/js/ace-elements.min.js"></script>
        <script src="assets/aceadmin/js/ace.min.js"></script>

        <?php foreach ($PageAttribute['scripts'] as $key => $value): ?>
        <script type="text/javascript" src="<?php echo $value ?>"></script>
        <?php endforeach ?>
    </body>
</html>
