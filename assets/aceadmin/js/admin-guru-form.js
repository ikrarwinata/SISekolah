	jQuery(function($) {
		$('#user-profile-3')
		.find('input[type=file]').ace_file_input({
			style:'well',
			btn_choose:'Change avatar',
			btn_change:null,
			no_icon:'ace-icon fa fa-picture-o',
			thumbnail:'large',
			droppable:true,
			
			allowExt: ['jpg', 'jpeg', 'png', 'gif'],
			allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
		})
		.end().find('button[type=reset]').on(ace.click_event, function(){
			$('#user-profile-3 input[type=file]').ace_file_input('reset_input');
		})
		.end().find('.date-picker').datepicker().next().on(ace.click_event, function(){
			$(this).prev().focus();
		})
		// $('.input-mask-phone').mask('9999-9999-9999');
	
		$('#user-profile-3').find('input[type=file]').ace_file_input('show_file_list', [{type: 'image', name: $('#avatar').attr('src')}]);
	})