$(function () {

	$.validator.addMethod('ifArtist',function(value, element) {
		if ($('#member_type').val()==1){
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
		//$(this).parent().prev().show();
		//$(this).parent().children().remove();
		$('#btnRegistrationImageUpload').show();
		$('#members_photo').val('');
		$(this).parent().find('img').remove();
		$(this).remove();
	});		
	$('input[name="members_ship"]').change(function(){
		if($(this).val()==1){
			$('#ship_perc').html('80%');
		}else{
			$('#ship_perc').html('65%');
		}
	});
	$('#members_country').change(function(){
		$('#span_ship_country').html($(this).find(":selected").text());
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
			$('<a href=\"javascript:void(0)\" class=\"removeimage\" style=\"display:block;\">Remove</a>').appendTo($(this).next());
			$('#members_photo').val(thefile.name);
			$('label.error').remove();
		}
	});	
});
