	jQuery(function($) {
		try {
			var id = null, counter = 1;

			$("textarea.inline-editor").each(function(){
				id = $(this).attr("id");
				if (id==null) {
					id = "textarea" + counter;
					$(this).attr("id", id);
				}
				CKEDITOR.inline(id);
				counter++;
			})
		  } catch (error) {
		    
		  }

		try {
			var id = null, counter = 1;

			$("textarea.ckeditor-editor").each(function(){
				id = $(this).attr("id");
				if (id==null) {
					id = "textarea" + counter;
					$(this).attr("id", id);
				}
				CKEDITOR.replace(id);
				counter++;
			})
		  } catch (error) {
		    
		  }
	})