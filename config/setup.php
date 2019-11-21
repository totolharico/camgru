<?php
require('database.php');
try {
    $db = new PDO('mysql:host=localhost', $DB_USER, $DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec('CREATE DATABASE IF NOT EXISTS camagru_db');

} catch (PDOException $e) {
    die("Error !: " . $e->getMessage());
}

try {
    $db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $db->exec('CREATE TABLE IF NOT EXISTS user (
    	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    	login VARCHAR(15) NOT NULL,
    	email VARCHAR(320) NOT NULL,
    	password VARCHAR(128) NOT NULL,
    	email_confirm BOOLEAN NOT NULL DEFAULT 0)');
    
} catch (PDOException $e) {
    die("Error !: " . $e->getMessage());
}