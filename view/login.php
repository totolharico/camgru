<?php
if (isset($_POST['submit_register']) && $_POST['submit_register'] === 'OK') {
	
	if (!isset($_POST['login']) || ($login = $_POST['login'] === '')) {
		$errors = array('login' => 'this field is required.');
	
	} else if (strlen($login > 15)) {
		$errors = array('login' => 'login size is upper than 15 char');
	
	} if (!isset($_POST['passwd']) || ($passwd = $_POST['passwd'] === '')) {
		$errors['passwd'] = ('this field is required.');
	
	} else if (strlen($passwd < 6)) {
		$errors['passwd'] = ('password size is lower than 6 char');
	
	} if (!isset($_POST['passwd_2']) || ($passwd_2 = $_POST['passwd_2'] === '')) {
		$errors['passwd_2'] = ('this field is required.');
	
	} else if ($passwd_2 !== $passwd) {
		$errors['passwd_2'] = ('you must use the same password');
	
	} if (!isset($_POST['email']) || ($email = $_POST['email'] === '')) {
		$errors['email'] = ('this field is required.');
	
	} else if (strlen($email > 320)) {
		$errors['email'] = ('your email is invalid');
	
	} else {
		
	}	
}
$currentLogin = $_SESSION['current_login'] ?? '' // => equivalent a ecrire isset($_SESSION['current_login']) ? $_SESSION['current_login'] : ''
?>
<div id='login_container'>
	<form id='sign_in' action="#" method="POST" class='login_form'>
		<h2>Sign in</h2>
		<input type="text" name="login" placeholder="login" value="">
		<input type="password" name="passwd" placeholder="password" value="">
		<input type="submit" name="submit_login" value="OK" />
	</form>
	<form id='sign_up' action="#" method="POST" class='login_form'>
		<h2>Sign up</h2>
		<input id="register_login" type="text" name="login" placeholder="login" value="">
		<p class="error_msg" id="error_login"></p>
		<input id="register_email" type="email" name="email" placeholder="email" value="">
		<p class="error_msg" id="error_email"></p>
		<input id="register_passwd" type="password" name="passwd" placeholder="password" value="">
		<p class="error_msg" id="error_passwd"></p>
		<input id="register_passwd2" type="password" name="passwd2" placeholder="confirm password" value="">
		<p class="error_msg" id="error_passwd2"></p>
		<input id="register_submit" type="submit" name="submit_register" value="OK" />
	</form>
</div>

