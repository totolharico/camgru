window.onload = function() {

	function removeErrorSu() {
		var inputs = ['login', 'email', 'passwd', 'passwd2']
		inputs.forEach(function(id) {
			document.querySelector('#register_' + id).classList.remove("form_error")
			document.querySelector('#register_error_' + id).innerText = ''
		})
	}

	function removeErrorSi() {
		var inputs = ['login', 'passwd']
		inputs.forEach(function(id) {
			document.querySelector('#auth_' + id).classList.remove("form_error")
			document.querySelector('#auth_error_' + id).innerText = ''
		})
		document.querySelector('#auth_error_other').innerText = ''
	}

	function handleResponseSu(response) {
		response.json().then(function(data){
			var key = Object.keys(data)[0]
			console.log(data)
			if (key !== 'no_error'){
				var input = document.querySelector('#register_' + key)
				input.classList.add("form_error");
				var msg_error = document.querySelector('#register_error_' + key)
				msg_error.innerText = data[key]
			} else {
				var valid_msg = document.querySelector('#register_valid')
				valid_msg.innerText = data[key]
			}
		})
	}

	function handleResponseSi(response) {
		response.json().then(function(data){
			var key = Object.keys(data)[0]
			if (key !== 'no_error'){
				var input = document.querySelector('#auth_' + key)
				if (key !== 'other')
					input.classList.add("form_error");
				var msg_error = document.querySelector('#auth_error_' + key)
				msg_error.innerText = data[key]
			} else {
				document.location.href = '.';
			}   
		})
	}


	var formSu = document.querySelector('#sign_up')
	formSu.addEventListener('submit', function(event) {

		event.preventDefault()
		removeErrorSu()
		var body = new FormData(formSu)
		
		fetch('sign_up.php', {
			method: 'POST',
			body: body,
		}).then(handleResponseSu)
	})

	var formSi= document.querySelector('#sign_in')
	formSi.addEventListener('submit', function(event) {

		event.preventDefault()
		removeErrorSi()
		var body = new FormData(formSi)
		
		fetch('sign_in.php', {
			method: 'POST',
			body: body,
		}).then(handleResponseSi)
	})
}




