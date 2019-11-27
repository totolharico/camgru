window.onload = function() {

	function removeError() {
		var inputs = ['login', 'email', 'passwd', 'passwd2']
		inputs.forEach(function(id) {
			document.querySelector('#register_' + id).classList.remove("form_error")
			document.querySelector('#error_' + id).innerText = ''
		})
	}

	function handleResponse(response) {
		response.json().then(function(data){
			console.log(data)
			var key = Object.keys(data)[0]
			if (key !== 'no_error'){
				var input = document.querySelector('#register_' + key)
				input.classList.add("form_error");
				var msg_error = document.querySelector('#error_' + key)
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
		removeError()
		var body = new FormData(form)
		
		fetch('login.php', {
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