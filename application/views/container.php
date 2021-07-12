    
<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>MTs DDI Kota Harapan</title>
<base href="<?php echo base_url() ?>">
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $this->Profil_sekolah_model->get_profil('nama_sekolah').', '.$this->Profil_sekolah_model->get_profil('nama_singkat_sekolah') ?>" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--// Meta tag Keywords -->
<!-- css files -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="assets/css/carousel.css" type="text/css" rel="stylesheet" media="all"> 
<link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="assets/css/jquery-ui.css" />
<!-- gallery -->
<link href="assets/css/lsb.css" rel="stylesheet" type="text/css">
<!-- //gallery -->
<!-- /fonts -->
<link href="assets/css/font-1.css" rel="stylesheet">
<link href="assets/css/font-2.css" rel="stylesheet">
<!-- //fonts -->

<!-- //css files -->
<!-- js -->
<script type="text/javascript" src="assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-3.1.1.min.js"></script>

<!-- //js -->
</head>
<body>
<!--header-banner-section-starts-here -->
<section class="banner-header" id="home">
	<?php $this->load->view("_partials/navbar") ?>

	<!-- banner -->
	<?php if (isset($carousel) && $carousel==TRUE): ?>
		<?php $this->load->view("_partials/carousel") ?>
	<?php else: ?>
		<div style="width: 100%;min-height: 200px; height: 10%;background-image: url('assets/images/public-page/ban1.jpg');">
			<div style="background-color: black; opacity: 0.2;height: 200px">
				<div style="background-color: blue; opacity: 0.2;height: 100px;">
					
				</div>
			</div>
		</div>
	<?php endif ?>
	<!-- //banner -->
</section>	
<!--//header-banner-section-end-here -->

<?php $this->load->view($konten) ?>

<?php $this->load->view("_partials/footer") ?>
<!-- //footer -->
	<!-- start-smooth-scrolling -->
	<script type="text/javascript" src="assets/js/move-top.js"></script>
	<script type="text/javascript" src="assets/js/easing.js"></script>
	<script src="assets/js/lsb.min.js"></script>
	<script>
	$(window).load(function() {
		  $.fn.lightspeedBox();
		});
	</script>
	<!-- Calendar -->
	<script src="assets/js/jquery-ui.js"></script>
	  <script>
			  $(function() {
			  	var dtpickr = $( "#datepicker,#datepicker1,#datepicker2,#datepicker3" );
			  	if (dtpickr) {
			  		dtpickr.datepicker();
			  	};

			  	$(".show-details-btn").click(function(e){
			  		e.preventDefault();
			  		if($(this).closest("tr").next("tr").hasClass("hidden")){
			  			$(this).closest("tr").next("tr").removeClass("hidden");
			  			$(this).find("i").removeClass("fa-angle-double-down");
			  			$(this).find("i").addClass("fa-angle-double-up");
			  		}else{
			  			$(this).closest("tr").next("tr").addClass("hidden");
			  			$(this).find("i").removeClass("fa-angle-double-up");
			  			$(this).find("i").addClass("fa-angle-double-down");
			  		}
			  		return false;
			  	})
			  });
	  </script>
<!-- //Calendar -->
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".carousel-item").each(function(){
					var path = $(this).find(".img-file-path").text(),
					newcss = '-webkit-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url("' + path + '") no-repeat top center fixed',
					mozcss = '-moz-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url("' + path + '") no-repeat top center fixed',
					mscss = '-ms-linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url("' + path + '") no-repeat top center fixed',
					grdcss = 'linear-gradient(rgba(23, 22, 23, 0.2), rgba(23, 22, 23, 0.5)), url("' + path + '") no-repeat top center fixed'
					;
					$(this).css("background", grdcss);
					$(this).css("background", mscss);
					$(this).css("background", mozcss);
					$(this).css("background", newcss);
				});

				$(".scroll").click(function(event){		
					event.preventDefault();
			
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
					});
			});
	</script>
	<!-- //end-smooth-scrolling -->	
	<!-- smooth-scrolling-of-move-up -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->  
