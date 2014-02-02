$(function () {	
	$('.removeimage').live( 'click', function(){					
					$(this).parent().prev().show();
					$(this).parent().children().remove();
				});							

	$('#ArtworkSubForm').validate({
		ignore: [],
		rules: {
			artwork1: 'required',
			artwork2: 'required',
			artwork3: 'required',
			artwork4: 'required',
			artwork5: 'required'
		}
	,
	submitHandler: function(form) {  
		if ($(form).valid()) 		
			form.submit(); 		
			return false;
		} 
	});	;

				$('.btnfileupload').fileupload({
			        dataType: 'json',
			        url:'/members/imageupload',
			        formData:{subdir:'artsub'},    
			        submit: function(e,data){
					        	$(this).hide();			        	
					        	$('<div style=\'width:130px\' class=\'load\'><div class=\'loader-bert\'></div></div>').appendTo($(this).next());
					 },
			        done: function (e, data) {			        
			            $.each(data.result.files, function (index, file) {
			            	thefile=file;			            	
			            });
			            $('.load').remove();
						$('<img style=\'height:150px;\' src=\''+thefile.url+'\'>').appendTo($(this).next());
						//$('<a href=\"javascript:void(0)\" class=\"removeimage\"><i class=\"icon-trash\" style=\"vertical-align: text-top; position: absolute;\"></i></a>').appendTo($(this).next());
						$('<a href=\"javascript:void(0)\" class=\"removeimage\" style=\"display:block;\">Remove</a>').appendTo($(this).next());						
						$(this).parent().find('input:hidden').val(thefile.name);
						$('label.error').remove();
			        },
			        progressall: function (e, data) {
			            var progress = parseInt(data.loaded / data.total * 100, 10);
			            $('#progress .progress-bar').css(
			                'width',
			                progress + '%'
			            );
			        }			   
			    }).prop('disabled', !$.support.fileInput)
			        .parent().addClass($.support.fileInput ? undefined : 'disabled');			    
				});
