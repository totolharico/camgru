window.onload = function() {

	function removeErrorSu() {
		var inputs = ['login', 'email', 'passwd', 'passwd2']
		inputs.forEach(function(id) {
			document.querySelector('#register_' + id).classList.remove("form_error")
			document.querySelector('#register_error_' + id).innerText = ''
		})
	}

	function removeErrorSi() {
		var inputs = ['login', 'passwd', 'other']
		inputs.forEach(function(id) {
			document.querySelector('#auth_' + id).classList.remove("form_error")
			document.querySelector('#auth_error_' + id).innerText = ''
		})
	}

	function handleResponseSu(response) {
		response.json().then(function(data){
			console.log(data)
			var key = Object.keys(data)[0]
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
			console.log(data)
			var key = Object.keys(data)[0]
			if (key !== 'no_error'){
				var input = document.querySelector('#auth_' + key)
				input.classList.add("form_error");
				var msg_error = document.querySelector('#auth_error_' + key)
				msg_error.innerText = data[key]
			} else {
				var valid_msg = document.querySelector('#register_valid')
				valid_msg.innerText = data[key]
			}   
		})
	}


	var form = document.querySelector('#sign_up')
	form.addEventListener('submit', function(event) {

		event.preventDefault()
		removeErrorSu()
		var body = new FormData(form)
		
		fetch('sign_up.php', {
			method: 'POST',
			body: body,
		}).then(handleResponse)
	})

	var form = document.querySelector('#sign_in')
	form.addEventListener('submit', function(event) {

		event.preventDefault()
		removeErrorSi()
		var body = new FormData(form)
		
		fetch('sign_in.php', {
			method: 'POST',
			body: body,
		}).then(handleResponse)
		// .then(function(response) {
		// 	response.json().then(function(data) {
		// 		console.log(data.login)
		// 	})
		// 	console.log('toto')
		// })
		// console.log(login.value, email.value, passwd.value, passwd2.value)
	})
	//console.log(login, email, passwd, passwd2)
}