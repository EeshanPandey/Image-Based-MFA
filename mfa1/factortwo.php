<?php
  session_start();
  include_once 'pdo.php';
  include_once 'header.php';
  date_default_timezone_set("Asia/Calcutta");

  // print_r($_SESSION);

  if (isset($_SESSION['reattempttime'])) {
    echo "in if";
    echo time() - $_SESSION['reattempttime'];
    if ($_SESSION['reattempttime'] - time()  > 0) {
      echo "inif2";
      $_SESSION['block_err'] = 'Your account has been blocked till ' . date("Y-m-d h:i:s",$_SESSION['reattempttime']) . '. Please try afterwards';
      header("Location: welcome.php"); return;
    }
    else{
      unset($_SESSION['block_err']);
      unset($_SESSION['reattempttime']);
    }
  }

  if (($_SERVER['QUERY_STRING'])) {
    echo "isset is query string";
    $coord = explode(",", $_SERVER['QUERY_STRING']);
    $xcord = (int)$coord[0];
    $ycord = (int)$coord[1];

    echo "<br>x,y: $xcord,$ycord </br>";
    $stmt = $pdo->prepare('SELECT `imgx`,`imgy` FROM `users` WHERE `userid` = :usridvar');
    $stmt->execute(["usridvar"=>$_SESSION['usrid']]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $xdiff = abs((int)$xcord - (int)$row['imgx']);
    $ydiff = abs((int)$ycord - (int)$row['imgy']);
    echo "diff(x,y): $xdiff, $ydiff <br>";
    if ($xdiff>10 || $ydiff>10) {
      //wrong answer
      $_SESSION['err'] = "Wrong answer";
      $_SESSION['chances'] = $_SESSION['chances'] -1;
      // header("Location:factortwo.php"); return;
      if ($_SESSION['chances']<1) {
        $_SESSION['flag'] = "no";
        $_SESSION['chances'] = 3;
        $_SESSION['reattempttime']= time() + 5;
        $_SESSION['block_err'] = "You have exceeded number of attempts. Your account has been locked till " . date("Y-m-d H:i:s",$_SESSION['reattempttime']) . ". A notification mail of the action has been sent to your registered email";
        unset($_SERVER['QUERY_STRING']);
        header("Location: welcome.php"); return;
      }
      else{
        $_SESSION['flag'] = "yes";
        header("Location: factortwo.php"); 
        return;
      }
    }
    else{
      header("Location: success.php");
      return;
    }
  }
  else{
    if(isset($_SESSION['flag'])){

        if (strcasecmp($_SESSION['flag'], "yes")) {
          $_SESSION['chances'] = 3;
        }
    }
  }





?>




<!DOCTYPE html>
<html>

<style>
  
.container {
  padding-left: 20px;
  padding-bottom: 20px;
  margin: auto;
}


input[type=text], input[type=password] {
  width: 40%;
  padding: "15px";
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


.submitbtn {
  background-color: #0000ff;
  color: white;
  padding: 16px 20px;
  margin: 18 0;
  border: none;
  cursor: pointer;
  width: 40%;
  opacity: 0.9;
}

.submitbtn:hover {
  opacity:1;
}

a {
  color: dodgerblue;
}




</style>
<body>

<h1 style="font-family: Cambria; color: blue; margin-left: 18px; margin-bottom: 0px"> PnC National Bank</h1>
  <div class="container">
    <h1>Third Authentication</h1>
    <p>Verify image</p>

    <?php
  if (isset($_SESSION['err'])) {
    echo "<p style='color:red'>".$_SESSION['err'] ."<b>. Chances remaining: " .$_SESSION['chances'] . "</b></p>";
    unset($_SESSION['err']);
  }

?>


    <hr>
    <br>
    <br>
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
    
    <?php
      $stmt = $pdo->prepare("SELECT `imgnum` FROM `users` WHERE `userid`= :usridvar");
      $stmt->execute([":usridvar"=>$_SESSION['usrid']]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

    ?>

    <br><br>
    <a href="factortwo.php" id="anchorimg">
      <img src="Images/img<?=$row['imgnum']?>.jpg " height="500" ismap>
    </a>

    <br>
    <br>


  </div>

</body>
</html>