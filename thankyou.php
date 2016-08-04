<?php include "inc/header.php"; ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">			
				<?php if ( isset( $message) ) 
				{
					echo "<h2 style='color: green;'>".$message."</h2>";
				} ?>
							
 			</div>

		</div>
<?php include "inc/sidebar.php"; ?>
	</div>
<?php include "inc/footer.php"; ?>