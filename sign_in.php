<?php
require('model/Db.class.php');

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
	if ($db->signInUser(hash('whirlpool', $_POST['passwd'])) === false)
		$error['other'] = 'login or passeword invalid';
	else
		$error['no_error'] = '';
}
echo json_encode($error);