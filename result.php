<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';?>
<?php sec_session_start();?>
<html>
<head>
      	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>		
		<script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/paper/bootstrap.min.css" rel="stylesheet">
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
	
<div class="col-lg-2"></div>
<div class="col-lg-8 container" style="background-color:white;height:80%">
<?php
if (login_check($mysqli) == true)
{
	
	$u = htmlentities($_SESSION['username']);
	$ufile = "uploads/$u/result.txt";
	if (file_exists($ufile))
	{
		echo "<div><h1 class='col-lg-10'style='text-align:center;'>Submitted Code</h1><p class='col-lg-2'><a style='float: right; font-size: 27px; margin-top: 24%;'href='protected_page.php'>Back</a></p></div>";
		echo "<div class='container' style='
											width: 78%;
											overflow: scroll;
											height: inherit;
										'> <pre><code style='color:#2196f3'>";
		error_reporting(E_ERROR | E_PARSE);
		$myfile = fopen($ufile, "r") or die("Unable to open file!");
		echo fread($myfile,filesize($ufile));
		fclose($myfile);
		echo "</code></pre>
		";
		echo "</div>";
	}
	else echo "<h1>There are no results to show.</h1><p><a href='protected_page.php'>Back</a></p>";
}
else echo '<h1>You are not authorized to access this page.<h1><p>Click <a href="index.php">here</a> to log in</p>';
?>
<div>
<div class="col-lg-2"></div>
<body>
</html>