<?php  

session_start();
unset($_SESSION['user_logged']);
header('Location: http://localhost:8080/camagru/index.php');

?>