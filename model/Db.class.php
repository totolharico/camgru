<?php

class Db {
	
	private $_db;

	function __construct() {
		require('config/database.php');
		
		try {
		    $this->_db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		    $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
		    die("Error !: " . $e->getMessage());
		}
	}

	public function checkUser($login) {
		$sql = "SELECT login FROM user WHERE login LIKE '" . $login . "'";
		$row = $this->_db->query($sql);
		if ($row === $login)
			return(false);
		return(true);
	}
	
	public function insertUser($login, $email, $passwd) {
		$passwd = hash('whirlpool', $passwd);
		$sql = "INSERT INTO `user` (`login`, `email`, `password`) VALUES ( '". $login . "','" . $email . "','" . $passwd . "')";
		$this->_db->exec($sql);
	}

}