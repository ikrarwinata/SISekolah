	jQuery(function($) {
		$('#timepicker1').timepicker({
			minuteStep: 1,
			showSeconds: false,
			showMeridian: false,
			disableFocus: true,
			icons: {
				up: 'fa fa-chevron-up',
				down: 'fa fa-chevron-down'
			}
		}).on('focus', function() {
			$('#timepicker1').timepicker('showWidget');
		}).next().on(ace.click_event, function(){
			$(this).prev().focus();
		});
		
		$('#timepicker2').timepicker({
			minuteStep: 1,
			showSeconds: false,
			showMeridian: false,
			disableFocus: true,
			icons: {
				up: 'fa fa-chevron-up',
				down: 'fa fa-chevron-down'
			}
		}).on('focus', function() {
			$('#timepicker2').timepicker('showWidget');
		}).next().on(ace.click_event, function(){
			$(this).prev().focus();
		});
	})