<!DOCTYPE html>
<html>

<head>

  <style type="text/css">
   
    .button1 {border-radius: 4px; background-color: #0066ff;}	
    .button1:hover {
      box-shadow: 0 8px 8px 0 rgba(0,0,0,0.20), 0 17px 50px 0 rgba(0,0,0,0.15);
    }
    .button2:hover {
      box-shadow: 0 8px 8px 0 rgba(0,0,0,0.20), 0 17px 50px 0 rgba(0,0,0,0.15);
    }
    .button { 
      border: none;
      color: white;
      padding: 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin-left: 18px;
      cursor: pointer;
    }
    .container{
     padding-left: 20px;
   }
   hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
  }
  span{
   color: green;
 }
 .button2 {background-color: #ff2200; margin-top: 10px; border-radius: 4px;}
</style>


</head>




<body>
	
  <h1 style="font-family: Cambria; color: blue; margin-left: 18px; margin-bottom: 0px"> CnC National Bank</h1>

  <hr>

  <div class="container">

    <h3 style="font-family: Century Gothic;"> Amount 1000 has been <span>successfully</span> transferred to ESP152 </h3>

    <br>

    <a href="welcome.php"><button class="button button1" name="button1"><b>Back to home</b></button></a>
    <br>

    <a href="logout.php"><button class="button button2" name="button2"><b>Logout</b></button></a>

  </div>



</body>


</html>