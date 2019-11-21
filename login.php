<?php

$error = [];

$fields = ['login', 'email', 'passwd', 'passwd2'];
foreach ($fields as $field) {
	if (!isset($_POST[$field]) || $_POST[$field] == '') {
		$error[$field] ='this field is required';
		break;
	}
}
if (count($error) === 0) {
	if (strlen($_POST['login']) < 4 || strlen($_POST['login']) > 15)
		$error['login'] = 'login must contain between 4 and 15 char';
	else if (strlen($_POST['email']) > 320)
		$error['email'] = 'email invalid';
	else if (strlen($_POST['passwd']) < 6)
		$error['passwd'] = 'password must contain at least 6 char';
	else if ($_POST['passwd2'] !== $_POST['passwd'])
		$error['passwd2'] = 'you must use the same password';
}
echo json_encode($error);




// if (isset($_POST['submit_register']) && $_POST['submit_register'] === 'OK') {
	
// 	if (!isset($_POST['login']) || ($login = $_POST['login'] === '')) {
// 		$errors = array('login' => 'this field is required.');
	
// 	} else if (strlen($login > 15)) {
// 		$errors = array('login' => 'login size is upper than 15 char');
	
// 	} if (!isset($_POST['passwd']) || ($passwd = $_POST['passwd'] === '')) {
// 		$errors['passwd'] = ('this field is required.');
	
// 	} else if (strlen($passwd < 6)) {
// 		$errors['passwd'] = ('password size is lower than 6 char');
	
// 	} if (!isset($_POST['passwd_2']) || ($passwd_2 = $_POST['passwd_2'] === '')) {
// 		$errors['passwd_2'] = ('this field is required.');
	
// 	} else if ($passwd_2 !== $passwd) {
// 		$errors['passwd_2'] = ('you must use the same password');
	
// 	} if (!isset($_POST['email']) || ($email = $_POST['email'] === '')) {
// 		$errors['email'] = ('this field is required.');
	
// 	} else if (strlen($email > 320)) {
// 		$errors['email'] = ('your email is invalid');
	
// 	} else {
		
// 	}	
// }
