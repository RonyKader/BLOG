<?php 
	include( '../helpers/Session.php' );
	Session::init();
 ?>
 <?php include "../config/config.php"; ?>	
 <?php include "../lib/Database.php"; ?>	
 <?php include "../helpers/Formate.php"; ?>	
 <?php 
 	$db = new Database();
 	$formate = new Formate();
 ?>


<?php 


 ?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<?php 
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
		{
			$Username = $formate->inputValidation( $_POST['username'] );
			$Password = $formate->inputValidation( $_POST['password'] );

			$Username = mysqli_real_escape_string( $db->link, $Username );
			$Password = mysqli_real_escape_string( $db->link, $Password );
			$query = "SELECT * FROM `users` WHERE username ='$Username' AND password = '$Password'";
			$resutl = $db->select( $query );

			if ( $resutl != FALSE ) 
			{
				$value = mysqli_fetch_assoc($resutl);
				$row = mysqli_num_rows( $resutl );			
				if ( $row > 0 ) {
				 Session::SessionSet("login", TRUE );
				 Session::SessionSet( 'username', $value['username'] );					
				 Session::SessionSet( 'password', $value['password'] );					
			
				 header( "location: index.php" );				
				}
				else
				{
					echo "Worng Username or Password";
				}
			}
			else
			{
				echo "Please Provied valid Username and Password";
			}


       
		}
	?>

	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>