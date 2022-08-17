<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="bg-image"></div>
	<div class="bg-text">
		<h1>Welcome, Girls Hostel</h1>
		<form class="form-horizontal" action="includes/login-inc.php" method="post">
			<div class="form-group">
			  	<label for="inputEmail" class="col-sm-3 control-label">Email</label>
				<div class="col-sm-6">
					<input type="email" class="form-control" name="email" placeholder="Email">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword" class="col-sm-3 control-label">Password</label>
				<div class="col-sm-6">
					<input type="password" class="form-control" name="pwd" placeholder="Password">
				</div>
			</div>
			<div class="form-group">
				<label for="user" class="col-sm-3 control-label">Student/Warden</label>
				<div class="col-md-2 col-sm-6">
					<select name="user" class="btn btn-default">
						<option value="student">Student</option>
						<option value="warden">Warden</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-8">
				<button type="submit" class="btn btn-default" name="Login">Login</button>
				</div>
			</div>
		</form>	
	<?php
	if(isset($_GET["error"])){
		if($_GET["error"]=="emptyinput"){
			echo "<p id='errormsg'>Fill in all details!</p>";
		}
		else if($_GET["error"]=="invalidEmail"){
			echo "<p id='errormsg'>Invalid Email!</p>";
		}
		else if($_GET["error"]=="invalidPassword"){
			echo "<p id='errormsg'>Incorrect Password!</p>" ;
		}
		else if($_GET["error"]=="stmtfailed"){
			echo "<p id='errormsg'>Something went wrong, retry again!</p>" ;
		}
		else if($_GET["error"]=="none"){
			echo "<p id='errormsg'>Logged in Successfully!</p>" ;
		}
	}
	?>
	</div>

</body>
</html>