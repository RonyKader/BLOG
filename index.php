<?php include "inc/header.php"; ?>	
<?php include "inc/slider.php"; ?>	

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">

		<?php 
			$query = "SELECT * FROM `post_table` LIMIT 3";

			$post = $db->select( $query );

		 ?>
		 <?php if ( $post ): ?>
		 	<?php while ( $row = $post->fetch_assoc() ) :?>
		 		
			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $row['id'];?>"><?php echo $row['title'] ?></a></h2>
				<h4><?php echo $formate->formateDate( $row['created_time'] ); ?>, By <a href="#"><?php echo $row['author'];?></a></h4>
				 <a href="#"><img src="admin/<?php echo $row['images'];?>" alt="post image"/></a>
				<p>
					<?php echo $formate->shortText( $row['body'], 500 ); ?>
				</p>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $row['id'];?>">Read More</a>
				</div>
			</div>
		 	
		 	 <?php endwhile; ?>
		 <?php endif ?>
		 <!-- End of end while loof -->




		</div>

<?php include "inc/sidebar.php"; ?>
	</div>
<?php include "inc/footer.php"; ?>