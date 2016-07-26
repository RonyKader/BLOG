<?php include "inc/header.php"; ?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
		<?php 
			if ( !isset( $_GET['cat_id']) || $_GET['cat_id'] == NULL ) 
			{
				header( "Location: 404.php" );
			}
			else
			{
				$id = $_GET['cat_id'];
				$query = "SELECT * FROM `post_table` WHERE cat_id = '$id'";
				$details_post = $db->select( $query );
				if ( $details_post ) 
				{ ?>
				<?php while ( $row = $details_post->fetch_assoc() ) :?>

				<div class="samepost clear">
					<h2><a href="post.php?id=<?php echo $row['id'];?>"><?php echo $row['title'] ?></a></h2>
					<h4><?php echo $formate->formateDate( $row['created_time'] ); ?>, By <a href="#"><?php echo $row['author'];?></a></h4>
					 <a href="#"><img src="admin/<?php echo $row['images'];?>" alt="post image"/></a>
					<p>
						<?php echo $formate->shortText( $row['body'], 200 ); ?>
					</p>
					<div class="readmore clear">
						<a href="post.php?id=<?php echo $row['id'];?>">Read More</a>
					</div>
				</div>
				<?php endwhile; ?>
				<?php }
				else
				{
					header( "Localhost: 404.php" );
				}

			}
		 ?>
				
	</div>
	<div class="clearfix"></div>

</div>

<?php include "inc/sidebar.php"; ?>
	</div>
<?php include "inc/footer.php"; ?>