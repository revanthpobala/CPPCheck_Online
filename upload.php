<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>		
<script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/paper/bootstrap.min.css" rel="stylesheet">

</head>
<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start(); ?> 
<?php error_reporting(E_ERROR | E_PARSE); ?>
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
<div class="col-lg-2"> </div>
<div class=" container col-lg-8" style="background-color:white;height:80%"> 
<?php
if (login_check($mysqli) == true)
{
	if (isset($_FILES["fileToUpload"]["name"]))
	{
		$u = htmlentities($_SESSION['username']);
		$udir = "uploads/$u";
		if (!is_dir($udir))
			mkdir($udir, 0777);
		$target_dir = $udir;
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$error_message = "";
		$fileType = pathinfo($target_file,PATHINFO_EXTENSION);?>
		
		
		// Check file size
		<?php if ($_FILES["fileToUpload"]["size"] > 200000000000) {
			$error_message = $error_message . "Sorry, your file is too large. <br>";
			$uploadOk = 0;
		}
		// Check file extension
		if($fileType != "c" && $fileType != "cpp") {
			$error_message = $error_message . "Sorry, only C/C++ files are allowed. <br>";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "<h1>Upload Failure!</h1>$error_message <br>Please go back to the <a href='protected_page.php'>upload page</a> and try again.";
		// if everything is ok, try to upload file
		} else {
			$newFileName = "$udir/code.$fileType";
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newFileName)) {
				$execStmt = "cppcheck $newFileName 2> $udir/result.txt";
				exec($execStmt);
				echo "<h1 style='text-align:center'>Upload Success!</h1><p>The file ". basename( $_FILES['fileToUpload']['name']). " has been uploaded and is being analysed!</p></p>You can now go back to the <a href='protected_page.php'>upload page</a> and view the results</p>";
			} else {
				echo "<h1>Upload Failure!</h1>Sorry, there was an error uploading your file. Please go back to the <a href='protected_page.php'>upload page</a> and try again.";
			}
		}
	}
	else echo '<h1>You have not selected a file to upload.</h1><p>Click <a href="protected_page.php">here</a> to do so.</p>';
}
else echo '<h1>You are not authorized to access this page.</h1><p>Click <a href="index.php">here</a> to log in.</p>';
?>
</div>
<div class="col-lg-2"> </div>
</body>
</html>