<?php
  session_start();
  include_once 'pdo.php';
  
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
    <h1>Register</h1>
    <p>Please select an image and click at a point in a image. Remember where you clicked as you will be asked to click on the same image at the same point during multi-factor authentication</p>

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
   
    <!-- DROPDOWN IMAGE -->
    <select id="imgnumsel" onchange="changeimage()">
      <option value="0">Select a image</option>
      <option value="1">Image 1</option>
      <option value="2">Image 2</option>
      <option value="3">Image 3</option>
      <!-- <option value="4">Image 4</option> -->
    </select>
    <br><br>
    <a href="saveimgcoord.php" id="anchorimg">
      <!-- <img src="Images/img1.jpg " height="500" ismap> -->
    </a>

    <br>
    <br>


  </div>
<script type="text/javascript">
  function changeimage () {
    var num = parseInt(document.getElementById('imgnumsel').value);
    switch (num) {
      case 1:
      document.cookie="imgnum=1";
        document.getElementById('anchorimg').innerHTML = "<img src='Images/img1.jpg' height='500' ismap>";
        break;
      case 2:
      document.cookie="imgnum=2";
        document.getElementById('anchorimg').innerHTML = "<img src='Images/img2.jpg' height='500' ismap>";
        break;
      case 3:
      document.cookie="imgnum=3";
        document.getElementById('anchorimg').innerHTML = "<img src='Images/img3.jpg' height='500' ismap>";
        break;
    }
    // if (num === 1) {
    //   console.log("===1");
    // }
  }
</script>
 
</body>
</html>