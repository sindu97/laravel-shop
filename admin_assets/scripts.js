const debug = true;

function console_log(data){
	if(debug === true){
		console.log(data);
	}
}


$(document).ajaxStart(function(){
    $(".ajax_loader_overlay").css({"display": "block"}) ;
}).ajaxStop(function(){
    $(".ajax_loader_overlay").css({"display": "none"}) ;
});

$(function () {
   // admin login page 
    $("#staff_login").submit(function(e){
    	e.preventDefault();
    	var form = $(this);
    	$.ajax({
    		url: form.attr('action'),
    		method: form.attr('method'),
    		dataType: "JSON",
    		data: form.serialize(),
    		beforeSend: function(){
    			form.find("input, textarea, select, button").prop("disabled", true)
    			.parents(".form-group")
    			.removeClass('has-error has-success')
    			.find('.help-block').remove();
    			$("#res").html(`<div class='text-danger'>Please wait...</div>`);
    		},
    		success: function(data){
    			console_log(data);
    			form.find("input, textarea, select, button").prop("disabled", false)
    			if(data.success === true){
    				$("#res").html(`<div class="text-success">
					Login Success, Redirecting to admin panel	
					</div>`)
    				form.trigger("reset");
    				window.location.href = base_url('admin');
    			}else{
    				$("#res").html(" ");
    				$.each(data.message, function(key, value){
    					if(key === "res") {
    						$("#res").html(`<div class="text-danger">
    						${value}	
							</div>`)
    					}else{
    						form.find('#'+key).after(value.length >0 ? `
							<div class='help-block'>${value}</div>
	    					` : '')
	    					.parents('.form-group').addClass(value.length >0 ? 'has-error' : 'has-success')
    					} ;    					
    				});
    			}
    		},
    		error: function(err){
    			console.log(err);
    			$("#res").html(" ");
    			form.find("input, textarea, select, button").prop("disabled", false)
    		}
    	})
    });
//-------------------owner-portal----------------------//



	// read uploaded image file
	readURL = function(input, id) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#'+id)
				.attr('src', e.target.result);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}

//end of file
});


