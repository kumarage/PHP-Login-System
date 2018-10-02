$(document)
.on("submit", "form.js-register", function(event){
	//below code prevents us from taking out of the page
	event.preventDefault(); 

	var _form = $(this);
	var _error = $(".js-error",_form);

	var dataObj = {
		email: $("input[type='email']",_form).val(),
		password: $("input[type='password']",_form).val()
	}

	if(dataObj.email.length<6) {
		_error
			.text("Please enter a valid email")
			.show();
		return false;
	} else if (dataObj.password.length<8){
		_error
			.text("Password is not long enough")
			.show();
		return false;	
	}

	//Assumiing a user get this far we can start the ajax process

	_error.hide();

	$.ajax({
		type: 'POST',
		url: '/php_login_course/ajax/register.php',
		data: dataObj,
		dataType:'json',
		async: true
	})
	.done(function ajaxDone(data) {
		// whatever data is
		console.log(data);
		if(data.redirect !== undefined){	
			window.location.href = data.redirect;
		} else if (data.error !== undefined){
			_error
			.text(data.error)
			.show();
		}

		alert(data.name);
	})
	.fail(function ajaxFailed(e) {
		// This failed
		console.log(e);
	})
	.always(function ajaxAlwaysDoThis(data){
		// Always do
		console.log('Always');
	})

	return false;
})