<?php
session_start();

if (!isset($_SESSION['user'])) {
  $_SESSION['err'] = "Please log in first";
  header("Location: index.php"); return;
}

// print_r($_SERVER);
// print_r($_SESSION);
  // include_once 'header.php';
    if (isset($_SERVER['QUERY_STRING'])) {
      // print_r($_SERVER['QUERY_STRING']);
    }

  if (isset($_POST['submit'])) {
    $_SESSION['chances'] = 3;
    header("Location: factortwo.php");
    return;
  }
  
?>
<!DOCTYPE html>
<html>

<head>

<style type="text/css">
.submitbtn {
  background-color: #0000ff;
  color: white;
  padding: 10px 20px;
  margin-bottom: 20px;
  font-size: 20px;
  cursor: pointer;
  width: 20%;
  opacity: 0.9;
  border-radius: 4px;
}
.submitbtn:hover {
  opacity:1;
}
input[type=text], input[type=number] {
  width: 30%;
  padding-left: 15px;
  margin: 5px 0 22px 0;
  display: block;
  border: none;
  background: #f1f1f1;
  height: 40px;
}
input[type=text]:focus, input[type=number]:focus {
  background-color: #ddd;
  outline: none;
}	
.details{
	margin-left: 18px;
	margin-right: 18px;
	border-radius: 3px;
	border: 2px solid #00aaff;
	padding-left: 10px;
}
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
</style>

</head>






<body>

<h1 style="font-family: Cambria; color: blue; margin-left: 18px; margin-bottom: 0px"> PnC National Bank</h1>
<br>
<hr>

<div class="details">

<h3> Enter transaction details</h3>


<form method="post" id="form">
<label for="username"><b>Account ID</b></label>
<input type="text" placeholder="Enter Username" name="username" id="username" required>

<label for="quantity"><b>Ener Amount</b></label>
<input type="number" id="amount" name="amount" placeholder="In ₹" min="1000" max="100000" step="100">

</form>
<br>

<button form="form" name="submit" class="submitbtn">Submit</button><br>

</body>	
</html>