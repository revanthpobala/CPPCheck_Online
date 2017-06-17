<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>
<?php error_reporting(E_ERROR | E_PARSE); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Registration Form</title>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>		
		<script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/paper/bootstrap.min.css" rel="stylesheet">
    </head>
    <body style="overflow-x:hidden;background-color:#dfdfdf">
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
		<!--Nav Bar-->
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="#">CPP Check</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="index.php">Login</a></li>
			  </ul>
			</div>
		  </div>
		</nav>
		<!--Nav Bar End-->
	   	<div class="col-lg-2"></div>
		<div class="jumbotron col-lg-8" style="background-color:#fff; margin:0;padding:10 10 10 10">
			<h2 style="text-align:center;color:#0c84e4;font-size:bold ">Register </h2> 
		
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        <div class="container" style="background-color:white;">
		<ul style="font-weight:bold">
            <li>Usernames may contain only digits, upper and lower case letters and underscores</li>
            <li>Emails must have a valid email format</li>
            <li>Passwords must be at least 6 characters long</li>
            <li>Passwords must contain
                <ul>
                    <li>At least one uppercase letter (A-Z) and  one lower case letter (a-z) and one number (0-9)  </li>
                </ul>
            </li>
            <li>Your password and confirmation must match exactly</li>
        </ul>
		</div>
		
		<div style="float:center;padding:0" class="container">
        <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" 
                method="post" 
                name="registration_form">
				
				
				<div class="form-group">
					<input type="text" class="form-control"  placeholder="Enter Unique username" name='username'maxlength="30" id='username'>
				</div>
				<div class="form-group">
					<input type="text" class="form-control"  placeholder="Enter Unique Email" type="text" name="email" id="email" maxlength="50">
				</div>
				<div class="form-group">
					<input type="password" class="form-control"  placeholder="Password"  name="password" maxlength="30" id="password">
				</div>
				<div class="form-group">
					<input type="password" class="form-control"  placeholder="Confirm Password"  name="confirmpwd"  maxlength="30" id="confirmpwd">
				</div>				
             <input style="float:right"class="btn btn-success"type="button" 
                    value="Register" 
                   onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd);" /> 
								    <a style="float-right" class="btn btn-warning"href="index.php">login page</a>
        </form>
        <?php error_reporting(E_ERROR | E_PARSE); ?>
		</div>
		</div>
			   	<div class="col-lg-2"></div>
    </body>
</html>