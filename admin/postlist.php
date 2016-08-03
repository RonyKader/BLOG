<?php include( 'templates/header.php' ); ?>
<?php include( 'templates/sidebar.php' ); ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <p><?php if( isset( $_GET['msg']) ){ echo $_GET['msg']; } ?></p>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="20%">Post Title</th>
							<th width="30%">Description</th>
							<th width="20%" style="text-align: center;">Category</th>
							<th width="20%">Image</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						// $query = "SELECT * FROM `post_table`";
						$query = "SELECT post_table.*,category.name FROM post_table
						INNER JOIN category ON post_table.cat_id = category.id";
						$result = $db->select( $query );
						if ( $result ) 
						{
							while ( $row = $result->fetch_assoc() ) 
							{
							?>
							<tr class="odd gradeX">
								<td><?php echo $row['title'];?></td>
								<td><?php echo $formate->shortText( $row['body'],300 );?></td>
								<td style="text-align: center;"><?php echo $row['name'];?></td>
								<td class="center"><img width="200" height="150" src="<?php echo $row['images'];?>" alt="Images"></td>
								<td><a href="editpost.php?edit_id=<?php echo $row['id'];?>">Edit</a> || <a onclick="return confirm('Are you sure to delete')" href="delete_post.php?delete_id=<?php echo $row['id'];?>">Delete</a></td>
							</tr>
							<?php	
							}
						}
						
					 ?>
												
					</tbody>
				</table>
	
               </div>
            </div>
        </div>

	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
<?php include( 'templates/footer.php' ); ?>    