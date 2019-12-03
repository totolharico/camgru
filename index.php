<?php
session_start();
// include_once('model/Db.class.php');
// $db = new Db;
// $ret = $db->checkUser('totolharicoo', 'tpillot@student.42.fr');
// var_dump($ret);
if (isset($_SESSION['user_logged'])) {
	$page = 'view/main_page.php';
	$style = 'css/main_page.css';
	$js = 'js/main_page.js';
} else {
	$page = 'view/login.php';
	$style = 'css/login.css';
	$js = 'js/login.js';
}

require('includes/template.php');


?>