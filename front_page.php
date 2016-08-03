<?php include "inc/header.php"; ?>
<?php 
	if ( isset( $_GET['page_id'] )) 
	{
		$page_id = $_GET['page_id'];
		$query = "SELECT * FROM `page_table` WHERE id = '$page_id'";
		$result = $db->select( $query );
		if ( $result ) 
		{
			$row = $result->fetch_assoc();
		}
	}
 ?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2><?php echo $row['title']; ?></h2>
				<?php echo $row['body']; ?>	
				
	</div>

		</div>
<?php include "inc/sidebar.php"; ?>
	</div>
<?php include "inc/footer.php"; ?>