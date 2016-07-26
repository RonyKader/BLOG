<?php include( 'templates/header.php' ); ?>
<?php include "../config/config.php"; ?>    
<?php include "../lib/Database.php"; ?> 
<?php include "../helpers/Formate.php"; ?>  
<?php 
    $db = new Database();
    $formate = new Formate();
?>
<?php include( 'templates/sidebar.php' ); ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Post Title</th>
							<th>Description</th>
							<th>Category</th>
							<th>Image</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$query = "SELECT * FROM `post_table`";
						$result = $db->select( $query );
						if ( $result ) 
						{
							while ( $row = $result->fetch_assoc() ) 
							{
							?>
							<tr class="odd gradeX">
								<td><?php echo $row['title'];?></td>
								<td><?php echo $row['body'];?></td>
								<td>category</td>
								<td class="center"><img src="<?php echo $row['images'];?>" alt="Images"></td>
								<td><a href="">Edit</a> || <a href="">Delete</a></td>
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