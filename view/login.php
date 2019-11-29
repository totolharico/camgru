
<div id='login_container'>
	<form id='sign_in' action="#" method="POST" class='login_form'>
		<h2>Sign in</h2>
		<input id="auth_login" type="text" name="login" placeholder="login" value="">
		<p class="error_msg" id="auth_error_login"></p>
		<input id="auth_passwd" type="password" name="passwd" placeholder="password" value="">
		<p class="error_msg" id="auth_error_passwd"></p>
		<input type="submit" name="submit_login" value="OK" />
		<p class="error_msg" id="auth_error_other"></p>
	</form>
	<form id='sign_up' action="#" method="POST" class='login_form'>
		<h2>Sign up</h2>
		<input id="register_login" type="text" name="login" placeholder="login" value="">
		<p class="error_msg" id="register_error_login"></p>
		<input id="register_email" type="email" name="email" placeholder="email" value="">
		<p class="error_msg" id="register_error_email"></p>
		<input id="register_passwd" type="password" name="passwd" placeholder="password" value="">
		<p class="error_msg" id="register_error_passwd"></p>
		<input id="register_passwd2" type="password" name="passwd2" placeholder="confirm password" value="">
		<p class="error_msg" id="register_error_passwd2"></p>
		<input id="register_submit" type="submit" name="submit_register" value="OK" />
		<p id="register_valid"></p>
	</form>
</div>

