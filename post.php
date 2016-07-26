<?php include "inc/header.php"; ?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
		<?php 
			if ( ! isset( $_GET['id']) || $_GET['id'] == NULL ) 
			{
				header( "Location: 404.php" );
			}
			else
			{
				$id = $_GET['id'];
				$query = "SELECT * FROM `post_table` WHERE id= '$id'";
				$details_post = $db->select( $query );

				$row = $details_post->fetch_assoc();
				if ( $row ) 
				{ ?>
				<h2><?php echo $row['title'];?></h2>
				<h4><?php echo $formate->formateDate( $row['created_time'] ); ?>, By <?php echo $row['author'];?></h4>
				<img src="admin/<?php echo $row['images'];?>" alt="MyImage"/>
				<p>
					<?php echo $row['body'];?>
				</p>
				<div class="relatedpost clear">

					<h2>Related articles</h2>
					
					<?php 
						$cat_id = $row['cat_id'];
						$cat_query = "SELECT * FROM `post_table` WHERE cat_id = '$cat_id'";

						$cat_post = $db->select( $cat_query );
						while ( $cat_row = $cat_post->fetch_assoc()) 
						{ ?>
						  <a href="post.php?id=<?php echo $cat_row['id'];?>"><img src="admin/<?php echo $row['images'];?>" alt="post image"/></a>			
						 
						<?php }
					;?>
				</div>
					
				<?php }
				else
				{
					header( "Localhost: 404.php" );
				}

			}
		 ?>
				
	</div>

</div>

<?php include "inc/sidebar.php"; ?>
	</div>
<?php include "inc/footer.php"; ?>