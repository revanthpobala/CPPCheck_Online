<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Secure Login: Log In</title>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>		
		<script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/paper/bootstrap.min.css" rel="stylesheet">
		<script>
			function onloading(){
				$("#login-modal").modal('show');
			}
		</script
    </head>
    <body onload="onloading()">
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p> <script>alert("Error Logging In!") </script>';
        }
        ?> 
		
		<div class="modal fade" tabindex="-1" role="dialog" id="login-modal"  data-backdrop="static"  data-keyboard="false" style="background:#666666">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header" style="background-color:#0d87e9">
					<h4 class="modal-title" style="text-align:center; color:white; font-weight:bold;">Welcome to Online CPP Check</h4>
			  </div>
			  <div class="modal-body">
				<br>
				
				<form action="includes/process_login.php" method="post" name="login_form">                      
				
 
							<div class="form-group ">
								   <input type="text" class="form-control"  name="email" maxlength="50" placeholder="Email">
							</div>

							<div class="form-group">
								<input  class="form-control"  type="password" name="password" maxlength="30"
										 id="password"
										 placeholder="Password">
							</div>									
					 				
			  </div>
				<div class="modal-footer">
									<a class="btn btn-warning" href='register.php'>register</a>
					<button type="button" class="btn btn-success" onclick="formhash(this.form, this.form.password);" >Login</button>
					

					</form>
			  </div>
			</div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
		
		
		
		
		
		
		

 
<?php
/*
        if (login_check($mysqli) == true) {
                        echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';
			echo '<p>Go to the <a href="protected_page.php">upload page</a> to get started.</p>';
            echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
        } else {
                        echo '<p>Currently logged ' . $logged . '.</p>';
                        echo "<p>If you don't have a login, please <a href='register.php'>register</a></p>";
                }*/
?>      
    </body>
</html>