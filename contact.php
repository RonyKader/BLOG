<?php include "inc/header.php"; ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
			<?php 
				if ( $_SERVER['REQUEST_METHOD'] === "POST" ) 
				{
					$firstName = $formate->inputValidation( $_POST['firstname'] );
					$lastname  = $formate->inputValidation( $_POST['lastname'] );
					$email 	   = $formate->inputValidation( $_POST['email'] );
					$body 	   = $_POST['body'];

					$firstName = mysqli_real_escape_string( $db->link, $firstName );
					$lastname  = mysqli_real_escape_string( $db->link, $lastname );
					$email 	   = mysqli_real_escape_string( $db->link, $email );
					$body 	   = mysqli_real_escape_string( $db->link, $body );

					try {
						if ( empty( $firstName ) ) 
						{
							throw new Exception( "Please enter your firstname", 1);
							header( "Location: contact.php" );
							
						}
						if ( empty( $lastname ) ) 
						{
							throw new Exception( "Please enter your lastname", 1);
							header( "Location: contact.php" );
							
						}
						if ( empty( $email ) ) 
						{
							throw new Exception( "Please enter your email addresss", 1);
							header( "Location: contact.php" );
							
						}
						if ( filter_var( $email,FILTER_VALIDATE_EMAIL) === false ) {
							throw new Exception( "Please enter a valid email", 1);
							header( "Location: contact.php" );
						}
						if ( empty( $body ) ) 
						{
							throw new Exception( "Please write your message", 1);
							header( "Location: contact.php" );
							
						}

						$query = "INSERT INTO `contact` ( firstname,lastname,email,body ) VALUES( '$firstName','$lastname','$email','$body')";
						$result = $db->insert( $query );
						if ( $result ) 
						{
							throw new Exception( "Your message sent by sucessfully", 1 );
							header( "Location: thankyou.php" );
							
						}
					} catch (Exception $e) {
						$message = $e->getMessage();
					}
					
				}

			 ?>
				<h2>Contact us</h2>
				<?php if ( isset( $message) ) 
				{
					echo "<h3 style='color: red;'>".$message."</h3>";
				} ?>
			<form action="" method="POST">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
					<input type="text" name="firstname" placeholder="Enter first name" />
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<input type="text" name="lastname" placeholder="Enter Last name" />
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="email" name="email" placeholder="Enter Email Address" />
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea name="body"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="form_submit" value="Submit"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>

		</div>
<?php include "inc/sidebar.php"; ?>
	</div>
<?php include "inc/footer.php"; ?>