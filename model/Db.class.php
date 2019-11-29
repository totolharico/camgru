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
		$sql = "SELECT login, email FROM user WHERE login LIKE '" . $login . "' OR email LIKE '" . $email . "'";
		$sth = $this->_db->prepare($sql);
		$sth->execute();
		$result = $sth->fetch();
		if (isset($result['login']) && $result['login'] === $login)
			return('login');
		if (isset($result['email']) && $result['email'] === $email)
			return('email');
		return (false);

	}
	
	public function insertUser($login, $email, $passwd) {
		$passwd = hash('whirlpool', $passwd);
		$sql = "INSERT INTO `user` (`login`, `email`, `password`) VALUES ( '". $login . "','" . $email . "','" . $passwd . "')";
		$this->_db->exec($sql);
	}

	public function signInUser($login, $passwd) {
		$sql = "SELECT login, password FROM user WHERE login LIKE '" . $login . "' AND password LIKE '" . $passwd . "'";
		$sth = $this->_db->prepare($sql);
		$sth->execute();
		$result = $sth->fetch();
		if (isset($result['login']) && $result['login'] === $login)
			return(true);
		return(false);
	}

}