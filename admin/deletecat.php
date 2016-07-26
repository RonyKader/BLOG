<?php include "../config/config.php"; ?>	
<?php include "../lib/Database.php"; ?>	
<?php include "../helpers/Formate.php"; ?>	
<?php 
	$db = new Database();
	$formate = new Formate();

	if ( isset( $_GET['id'])) {
		$id = $_GET['id'];

		$query = "DELETE FROM `category` WHERE id='$id'";
		$result = $db->delete( $query );
		if ( $result ) 
		{			
			header("Location: catlist.php?msg=".urlencode('Category Deleted successfully.'));	
		}
		else
		{
		header("Location: catlist.php?msg=".urlencode('Sorry ! Please Try Again.'));
		}
	}

 ?>