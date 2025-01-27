<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	
	<form action="addUser.php" method="POST" id="registerForm" class="form-horizontal">
    <div class="form-group">
      <label for="username" class="col-lg-2 control-label">Username</label>
      <div class="col-lg-3">
        <input type="text" class="form-control" name="username" id="username" placeholder="Your desired username">
      </div>
    </div>
    <div class="form-group">
      <label for="email" class="col-lg-2 control-label">E-mail</label>
      <div class="col-lg-3">
        <input type="email" class="form-control" name="email" id="email" placeholder="Your e-mail address">
      </div>
    </div>
    <div class="form-group">
      <label for="password" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-3">
        <input type="password" class="form-control" name="password" id="password" placeholder="Your desired password">
      </div>
    </div>
    <div class="form-group">
      <label for="password2" class="col-lg-2 control-label">Password (repeat)</label>
      <div class="col-lg-3">
        <input type="password" class="form-control" name="password2" id="password2" placeholder="Repeat password">
      </div>
    </div>
   <?php if(isset($_GET['msg'])) {
	if($_GET['msg'] == 'pe1') {
		echo "<p class='text-danger' style='margin-left:200px;'>The passwords you've entered did not match</p>";
	}elseif($_GET['msg'] == 'pe2') {
		echo "<p class='text-danger' style='margin-left:200px;'>The length of the password you've entered is not long enough<br>The password must be at least 8 characters</p>";
	}elseif($_GET['msg'] == 'ue1') {
		echo "<p class='text-danger' style='margin-left:200px;'>The username you have chosen is already in use</p>";
	}elseif($_GET['msg'] == 'sr1') {
		echo "<p class='text-success' style='margin-left:200px;'>You are now succesfully registered</p>";
	}elseif($_GET['msg'] == 'ee1') {
		echo "<p class='text-danger' style='margin-left:200px;'>The email you've entered is already in use</p>";
	}
} ?>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <input type="submit" name="register" class="btn btn-primary" value="Register">
        <div id="formReset" class="btn btn-default">Reset</div>
      </div>
    </div>
	</form>

</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
  $('#formReset').click(function(){
        $('#registerForm')[0].reset();
  });
</script>
</body>
</html>