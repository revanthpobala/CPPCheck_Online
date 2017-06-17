<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Registration Success</title>
      	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>		
		<script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/paper/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>
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
        <center><h1>Registration successful!</h1>
		<?php error_reporting(E_ERROR | E_PARSE); ?>
        <h4>You can now go back to the <a id="login-click" href="index.php">login page</a> and log in</h4> </center>
    </body>
</html>