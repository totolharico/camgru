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

	public function checkUser($login, $email) {
		$sql = "SELECT login, email FROM user WHERE login LIKE '" . $login . "' AND email LIKE '" . $email . "'";
		$sth = $this->_db->prepare($sql);
		$sth->execute();
		$result = [];
		$result = $sth->fetch();
		if (isset($result['login']))
			return('login');
		if (isset($result['email']))
			return('email');
		return (false);

	}
	
	public function insertUser($login, $email, $passwd) {
		$passwd = hash('whirlpool', $passwd);
		$sql = "INSERT INTO `user` (`login`, `email`, `password`) VALUES ( '". $login . "','" . $email . "','" . $passwd . "')";
		$this->_db->exec($sql);
	}

}