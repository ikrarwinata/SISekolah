	jQuery(function($) {
		try {
			$("#cb-parent").change(function(){
				var cb = this;
				$("td input[type=checkbox]").each(function(){
					this.checked = cb.checked;
				});
			})
		  } catch (error) {
		    
		  }

		try {
			$("#btn-hapus").click(function(){
				var arr = [], v = null;
				$("td input[type=checkbox]").each(function(){
					if (this.checked) {
						v = $(this).closest("td").find(".id-placeholder").val();
						arr.push({id : v});
					};
				});

				$.post("admin/Pengunjung/ajaxRequest_delete", {data : arr})
                 .done(function( data ) {
                    if(data=="success"){
                        $("td input[type=checkbox]").each(function(){
							if (this.checked) {
								$(this).closest("tr").remove();
							};
						});
						var cb = $("#cb-parent");
						cb.checked = false;
                    }else{
                        console.log(data);
                    }
               	});

			})
		  } catch (error) {
		    
		  }
	})