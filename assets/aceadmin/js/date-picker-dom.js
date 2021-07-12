	jQuery(function($) {
		$('.date-picker').datepicker().next().on(ace.click_event, function(){
			$(this).prev().focus();
		})
	})