<?php
  session_start();
  // print_r($_SESSION);
  include_once 'pdo.php';
  if (isset($_POST['login'])) {
    if (strlen($_POST['username'])<1 || strlen($_POST['psw'])<1) {
      $_SESSION['err'] = "Please fill all the fields";
      header("Location: login.php");
      return;
    }
    $stmt =  $pdo->prepare('SELECT * FROM `users` WHERE `username` = :uservar');
    $stmt->execute(array(":uservar"=>$_POST['username']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
      if (password_verify($_POST['psw'], $row['password'])) {
        $_SESSION['usrid'] = $row['userid'];
        $_SESSION['user'] = $row['username'];
        header("Location: welcome.php");
        return;
      }
      else{
        $_SESSION['err'] = "Wrong password";
        header("Location:index.php"); return;
      }
    }
    else{
      $_SESSION['err'] = "Username not found";
      header("Location:index.php"); return;
    }
  }

?>

<!DOCTYPE html>
<html>

<head>
	
<style type="text/css">
.container {
  padding-left: 20px;
  padding-bottom: 20px;
  margin: auto;
}	
input[type=text], input[type=password] {
  width: 30%;
  padding-left: 15px;
  margin: 5px 0 22px 0;
  display: block;
  border: none;
  background: #f1f1f1;
  height: 40px;
}
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}	
.loginbtn {
  background-color: #0000ff;
  color: white;
  padding: 16px 20px;
  margin: 18 0;
  border: none;
  cursor: pointer;
  width: 20%;
  opacity: 0.8;
  border-radius: 6px;
}
.loginbtn:hover {
  opacity:1;
}
</style>


</head>

<body>
	
<h1 style= "font-family: Cambria; color: blue; margin-left: 18px; margin-bottom: 0px"> PnC National Bank</h1>
<br>


<div class="container">
  <form method="post" id="form">
    <h1>Login</h1>
    <?php
      if (isset($_SESSION['succ'])) {
        echo "<p style='color:green'>" . $_SESSION['succ'] . "</p>";
        unset($_SESSION['succ']);
      }
      if (isset($_SESSION['error'])) {
        echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
      }

    ?>
    <hr>
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" id="username" required>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
	 <div class="g-recaptcha" data-sitekey="6LeZfdsZAAAAACjntC3EWbOJyAEDgwyVEdvWZlsq" data-theme="light" data-size="normal" data-image="image"></div>
    <br>
    <br>
    <button type="submit" name="login" class="loginbtn">Login</button>
 
  </form>
<p>New user?<a href="register.php"> Register here</a></p>
</div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>