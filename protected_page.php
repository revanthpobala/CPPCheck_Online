<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Protected Page</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>		
		<script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/paper/bootstrap.min.css" rel="stylesheet">
		<link href="../css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
        <script src="../js/fileinput.js" type="text/javascript"></script>

    </head>
    <body style="background-color:#dfdfdf">
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
					<li><a style="font-size:20px;font-weight:bold; color:white"><?php echo htmlentities($_SESSION['username']); ?></a> </li> 
					<li><a href="includes/logout.php">Logout</a></li>
				  </ul>
				</div>
			  </div>
			</nav>
	<!--Nav Bar End-->
	
	<?php error_reporting(E_ERROR | E_PARSE); ?>
	
	<div class="col-lg-2"> </div>
		<div class=" jumbotron col-lg-8" style="background-color:white"> 
        <?php if (login_check($mysqli) == true) : ?>	
            <form action="upload.php" method="post" enctype="multipart/form-data">
				Select file to upload:
				<input class="file" type="file" name="fileToUpload" placeholder="Select file to upload" id="fileToUpload"><br>
				<center><input class="btn btn-success" type="submit" value="Upload File" name="submit"></center>
			</form>
			<br>
			<p style="color:red;text-align:justify">Note: If you have previously submitted a file for analysis, it (as well as its results) will be overwritten.</p>
			<p><a href="code.php">View Submitted Code</a></p>
			<p><a href="result.php">View Results</a></p>

        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
		</div>
	<div class="col-lg-2"> </div>
    </body>
</html>