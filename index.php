<?php

?>
<html>
<head>
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hacklunch</title>

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/main.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
<a href="show.php" style="float:right">Hridoy Button</a>

<!-- <div class="wrapper">
<form method="post" action="login.php">
	<label>Email: <input type="text" name="userid"><br><br></label>
	<label>Password: <input type="password" name="userpass"><br><br></label>
	<label><input type="submit" name="userlogin" value="Login"></label><br><br>
	</form>
</div> -->

<div class="container">

<form class="form-horizontal" method="post" action="login.php">
<fieldset>

<!-- Form Name -->


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="userid">Email Address</label>
  <div class="col-md-4">
  <input id="userid" name="userid" type="text" placeholder="Enter email address" class="form-control input-md" required="">

  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="userpass">Password</label>
  <div class="col-md-4">
    <input id="userpass" name="userpass" type="password" placeholder="Enter password" class="form-control input-md" required="">

  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="userlogin"></label>
  <div class="col-md-8">
    <button id="userlogin" name="userlogin" class="btn btn-success" type="submit" value="Login">Log In</button>
    <a class="forgot-pass" href="">Forgot Password?</a>
  </div>
</div>

</fieldset>
</form>



</div>
<footer class="footer">
      <div class="container">
				<center>
        <p class="text-muted">Made with <span class="glyphicon glyphicon-heart" aria-hidden="true"></span> by <a href="#">@fahad</a></p>
			</center>
      </div>
    </footer>

</body>
</html>
