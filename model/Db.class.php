<?php

class Db {
	
	private $_db;

	function __construct() {
		require('../config/database.php');
		
		try {
		    $this->_db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		    $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
		    die("Error !: " . $e->getMessage());
		}
	}

	public function checkUser($login) {
		if ($this->_db->exect('SELECT login FROM user WHERE login LIKE $login') === 1)
			return('Login already used');
		return('');

	}
	// public function insertUser() {
	// 	$
	// }

}