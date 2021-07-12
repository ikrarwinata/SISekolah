	jQuery(function($) {
		var set = false;
		$("#xlsx-loader").on("click", function(){
			set = true;
			$("#xlsx-file").click();
		})
		$("#xlsx-file").on("change", function(){
			if ($(this).val()!=null && set) {
				$("#xlsx-send").click();
			}
		})
	})