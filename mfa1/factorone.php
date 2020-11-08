<?php
  session_start();
  date_default_timezone_set("Asia/Calcutta");
  // print_r($_SESSION);
  include_once 'header.php';
  include 'pdo.php';
  if (isset($_SESSION['reattempttime'])) {
    // echo "in if";
    // echo time() - $_SESSION['reattempttime'];
    if ($_SESSION['reattempttime'] - time()  > 0) {
      // echo "inif2";
      $_SESSION['block_err'] = 'Your account has been blocked till ' . date("Y-m-d h:i:s",$_SESSION['reattempttime']) . '. Please try afterwards';
      header("Location: welcome.php"); return;
    }
    else{
      unset($_SESSION['block_err']);
      unset($_SESSION['reattempttime']);
    }
  }



  if (isset($_POST['answer'])) {
    if (strlen($_POST['answer'])<1) {

    }
    $stmt = $pdo->prepare('SELECT `secans` FROM `users` WHERE `userid` = :usridvar');
    $stmt->execute(["usridvar"=>$_SESSION['usrid']]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if (strcasecmp($row['secans'], $_POST['answer'])) {
      $_SESSION['err'] = "Wrong answer";
      $_SESSION['chances'] = $_SESSION['chances'] -1;
      if ($_SESSION['chances']==0) {
        $_SESSION['flag'] = "no";
        $_SESSION['chances'] = 3;
        $_SESSION['reattempttime']= time() + 15;
        $_SESSION['block_err'] = "You have exceeded number of attempts. Your account has been locked till " . date("Y-m-d H:i:s",$_SESSION['reattempttime']);
        header("Location: welcome.php"); return;
      }
      $_SESSION['flag'] = "yes";
    }else{
      // if (isset($_SESSION[''])) {
        # code...
      // }
      header("Location: transfer.php");
      return;
    }
  }
  else{
    if (isset($_SESSION['flag'])) {
      if (strcasecmp($_SESSION['flag'], "yes")) {
        $_SESSION['chances'] = 3;
      }
    }
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
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
input[type=text]{
  width: 30%;
  padding-left:15px;
  margin: 5px 0 22px 0;
  display: block;
  border: none;
  background: #f1f1f1;
  height: 40px;
}
.question{
	margin-left: 18px;
	border-radius: 3px;
	border: 2px solid #00aaff;
	padding-left: 10px;
}
</style>
</head>




<body>

<?php
  $stmt = $pdo->prepare('SELECT `secq` FROM `users` WHERE `userid`=:usridvar');
  $stmt->execute(array(":usridvar"=>$_SESSION['usrid']));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>


<h1 style="font-family: Cambria; color: blue; margin-left: 18px; margin-bottom: 0px"> PnC National Bank</h1>
<br>
<hr>

<div class = "question">

<h3>Please answer the security question</h3>
<?php
  if (isset($_SESSION['err'])) {
    echo "<p style='color:red'>".$_SESSION['err'] ."<b>. Chances remaining: " .$_SESSION['chances'] . "</b></p>";
    unset($_SESSION['err']);
  }

?>
<form method="post" id="form">

<label for="answer"><b style="font-size: 18px;"><?= $row['secq'] ?></b></label>
<input type="text" placeholder=" Answer" name="answer" id="answer" required>

</form>

<br><br>

<button form="form" name="submit" class="submitbtn">Submit</button><br>


</div>


</body>




</html>