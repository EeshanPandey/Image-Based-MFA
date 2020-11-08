<?php

//session timeout
if (isset($_SESSION['LAST_ACTIVITY'])) {
	if (time() - $_SESSION['LAST_ACTIVITY'] > 900) {
			session_unset();
			session_destroy();
		}
}
$_SESSION['LAST_ACTIVITY'] = time();

//check user logged in 
if (!isset($_SESSION['user'])) {
	$_SESSION['err'] = "Please log in first";
	header("Location: index.php"); return;
}


?>