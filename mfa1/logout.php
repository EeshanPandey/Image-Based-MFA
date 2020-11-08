<?php 
	session_start();
	session_destroy();
	//change the header location to blogpage
	header('Location: index.php');
?>