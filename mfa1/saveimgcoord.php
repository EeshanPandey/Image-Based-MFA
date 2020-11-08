<?php
session_start();
include_once 'header.php';
include_once 'pdo.php';
if (isset($_SERVER['QUERY_STRING'])) {
	// ?234,45
	$coord = explode(",", $_SERVER['QUERY_STRING']);
	// echo "x: ". $coord[0] . " y: ". $coord[1];
	// echo "user: ". $_SESSION['user'];
	// $stmt = $pdo->prepare('INSERT INTO `users`(`imgnum`,`imgx`,`imgy`) VALUES(:numvar, :xvar, :yvar) WHERE `username`=:uservar');
	$stmt = $pdo->prepare('UPDATE `users` SET `imgnum`=:numvar, `imgx`=:xvar,`imgy`=:yvar WHERE `username`=:uservar');
	$stmt->execute(array(
		":numvar"=>$_COOKIE['imgnum'],
		":xvar"=>$coord[0],
		":yvar"=>$coord[1],
		":uservar"=>$_SESSION['user']
	));
	$_SESSION['succ'] = "Account created successfully, login to continue";
	header("Location: index.php"); return;
  }
?>