<?php
//start session
session_start();
// include class file.
require_once('main.class.php');
// call the class obj
$user = new engine();
//redirect if logged in
if ($user->im_logIn()) {
	$user->rd('dashboard.php');
}
if(isset($_POST['loginbtn'])){
	$username = esc($_POST['userId']);
	$password = esc($_POST['password']);
    $pass = md5($password);

	$auth = $user->admLogin($username, $pass);
	if(!$auth){
		$_SESSION['paultryblgmessage'] = 'Invalid username or password';
	}
	else{
		$_SESSION['authbjgvjhv78547545gff3426587xgxgfbn'] = $auth;
		$user->rd('dashboard.php');
	}
}else{
	$_SESSION['paultryblgmessage'] = 'You need to login first';
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Blog</title>
	<link href="src/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Admin Login</h1>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
		    <div class="login-panel panel panel-primary">
		        <div class="panel-heading">
		            <h3 class="panel-title"><span class="glyphicon glyphicon-lock"></span> Login
		            </h3>
		        </div>
		    	<div class="panel-body">
		        	<form method="POST" action="">
		            	<fieldset>
		                	<div class="form-group">
		                    	<input class="form-control" placeholder="Username/Email" type="text" name="userId" required>
		                	</div>
		                	<div class="form-group">
		                    	<input class="form-control" placeholder="Password" type="password" name="password" required>
		                	</div>
		                	<button type="submit" name="loginbtn" class="btn btn-lg btn-primary btn-block"><span class="glyphicon glyphicon-log-in"></span> Login</button>
		            	</fieldset>
		        	</form>
		    	</div>
		    </div>
		    <?php
		    	if(isset($_SESSION['paultryblgmessage'])){
		    		?>
		    			<div class="alert alert-info text-center">
					        <?php echo $_SESSION['paultryblgmessage']; ?>
					    </div>
		    		<?php

		    		unset($_SESSION['paultryblgmessage']);
		    	}
		    ?>
		</div>
	</div>
</div>
</body>
</html>
