<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <title>Cart Page | red store cart </title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/loginpopup.css">
</head>
<body>

<!--     
<h2>Modal Login Form</h2> -->

<!-- <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button> -->

<div id="id02" class="modal1">
  
  <form class="modal-content animate" action="account.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/user/userimage.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="useremail"  value="<?php if(isset($_COOKIE['EmailCookie'])) { echo $_COOKIE['EmailCookie']; } ?>" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" value="<?php if(isset($_COOKIE['PasswordCookie'])) { echo $_COOKIE['PasswordCookie']; } ?>"  required>
        
      <button type="submit" name="login_btn">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="rememberme"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

 <script src="js/js.js"></script> 


</body>
</html>