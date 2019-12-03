<?php
require('model/Db.class.php');
session_start();
$error = [];

$fields = ['login', 'passwd'];
foreach ($fields as $field) {
	if (!isset($_POST[$field]) || $_POST[$field] == '') {
		$error[$field] ='this field is required';
		break;
	}
}
if (count($error) === 0) {
	$db = new Db;
	if ($db->signInUser($_POST['login'], hash('whirlpool', $_POST['passwd'])) === false)
		$error['other'] = 'login or passeword invalid';
	else {
		$_SESSION['user_logged'] = $_POST['login'];
		$error['no_error'] = '';
	}
}
echo json_encode($error);