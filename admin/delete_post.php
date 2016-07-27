<?php include( '../helpers/Session.php' );
    Session::CheckSession();
 ?>
<?php include "../config/config.php"; ?>    
<?php include "../lib/Database.php"; ?> 
<?php include "../helpers/Formate.php"; ?>  
<?php 
    $db = new Database();
    $formate = new Formate();

if ( !isset( $_GET['delete_id'] ) || $_GET['delete_id'] == NULL ) 
{
	header( "Location: postlist.php" );
}
else
{
	$delete_id = $_GET['delete_id'];
	$unlink_query = "SELECT * FROM `post_table` WHERE id = '$delete_id'";
	$result = $db->select( $unlink_query );
	if ( $result ) 
	{
		$row = $result->fetch_assoc();
		$unline_image = $row['images'];
		unlink( $unline_image );
	}
	$del_query = "DELETE FROM `post_table` WHERE id = '$delete_id'";
	$del_result = $db->delete( $del_query );
	if ( $del_result ) 
	{
		header( "Location: postlist.php?msg="."Post Deleted Sucessfully" );
	}
}

?>
