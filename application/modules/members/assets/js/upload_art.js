$(function () {		
	$('.datepicker').datepicker();	
	$('#ddlCategory').change(function(){
		populateMedium($(this).val());
	});
	$('#ddlMedium').change(function(){
		alert($(this).val());
	});

						function populateMedium(cat_id){							
							$('#ddlMedium').children().remove();
							if(cat_id){
								tmp=med_cat[cat_id];
								for(var i=0; i<tmp.length; i++){
									$('#ddlMedium').append('<option value='+tmp[i].id+'>'+tmp[i].name+'</option>');	
								}
							}
						}
						
						$('#btnImageUpload').fileupload({
					        dataType: 'json',
					        url:'/members/imageupload',
					        formData:{subdir:'artwork'},   
					        done: function (e, data) {
					        	$(this).hide();			        	
					            $.each(data.result.files, function (index, file) {
					            	thefile=file;			            	
					            });
								$('<img style=\'width:200px;height:150px;\' src=\''+thefile.url+'\'>').appendTo($(this).next());
								$('<a href=\"javascript:void(0)\" class=\"removeimage\"><i class=\"icon-trash\" style=\"vertical-align: text-top; position: absolute;\"></i></a>').appendTo($(this).next());
								//$(this).prev().val(thefile.name);
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