		<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
				<?php 
					$query = "SELECT * FROM `category`";
					$category = $db->select( $query );
				 ?>
					<ul>
						<?php 
							while ( $row = $category->fetch_assoc()) { ?>
							<li><a href="posts.php?cat_id=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></li>					
							<?php }
						 ?>
					</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
			<?php 
				$query = "SELECT * FROM `post_table` LIMIT 4";

				$post = $db->select( $query );

			 ?>
			 <?php if ( $post ): ?>
			 	<?php while ( $row = $post->fetch_assoc() ) :?>

					<div class="popular clear">
						<h3><a href="post.php?id=<?php echo $row['id'];?>"><?php echo $row['title'] ?></a></h3>
						<a href="#"><img src="admin/<?php echo $row['images'];?>" alt="post image"/></a>
						<p><?php echo $formate->shortText( $row['body'], 100 ); ?></p>	
					</div>

				 <?php endwhile; ?>
			<?php endif ?>
			<!-- End of end while loof -->
	
			</div>
			
		</div>