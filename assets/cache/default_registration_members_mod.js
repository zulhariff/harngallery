$(function () {

	$.validator.addMethod('ifArtist',function(value, element) {
		if ($('#members_type_option1').attr('checked')){
			if(value){
				return true;
			}
			return false;
		}else{
			return true;
		}		
	}, 'Field is required');

	$('#registrationForm').validate({
		debug : true,
		ignore: [],
		rules: {
		members_dob: 'required',
		members_address1: 'required',
		members_phone: 'required',
		members_city: 'required',
		members_postal: 'required',
		members_photo: 'ifArtist'
	} ,
	submitHandler: function(form) {  
		console.log('submit');
		if ($(form).valid()) 
			form.submit(); 
			return false; // prevent normal form posting
		} 
	});

	$('.removeimage').live( 'click', function(){					
		$(this).parent().prev().show();
		$(this).parent().children().remove();
	});		
	$('.datepicker').datepicker();
	$('#btnRegistrationImageUpload').fileupload({
		dataType: 'json',
		url:'/members/imageupload',
		formData:{subdir:'registration'}, 
		replaceFileInput : true,
		disableImageResize: /Android(?!.*Chrome)|Opera/
		.test(window.navigator && navigator.userAgent),
		imageMaxWidth: 150,
		imageMaxHeight: 200,   
		submit: function(e,data){
			$(this).hide();			        	
			$('<div style=\'width:130px\' class=\'load\'><div class=\'loader-bert\'></div></div>').appendTo($(this).next());
		},     
		done: function (e, data) {
			$.each(data.result.files, function (index, file) {
				thefile=file;			            				            	
			});
			$('.load').remove();
			$('<img src=\''+thefile.url+'\'>').appendTo($(this).next());
			//$('<a href=\"javascript:void(0)\" class=\"removeimage\"><i class=\"icon-trash\" style=\"vertical-align: text-top; position: absolute;\"></i></a>').appendTo($(this).next());
			$('<a href=\"javascript:void(0)\" class=\"removeimage\" style=\"display:block;padding-left:150px\">Remove</a>').appendTo($(this).next());
			$('#members_photo').val(thefile.name);
			$('label.error').remove();
		}
	});
	$('#members_type_option1').change(function(){
		if($(this).is(':checked'))
			$('#aboutDiv').show();
			$('#aboutCommissionDiv').show();
			$('#NoteDiv').show();
			$('#ProfilePhotoDiv').show();
	});
	$('#members_type_option2').change(function(){
		if($(this).is(':checked'))
			$('#aboutDiv').hide();
		$('#aboutCommissionDiv').hide();
		$('#NoteDiv').hide();
		$('#ProfilePhotoDiv').hide();
	});			
});
