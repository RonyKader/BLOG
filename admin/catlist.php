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
            <h2>Category List</h2>
            <h4><?php if ( isset( $_GET['msg'] ) ) { echo $_GET['msg']; } ?></h4>
            <div class="block">        
                <table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Category Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					$query = "SELECT * FROM `category` ORDER BY id DESC";

					$result = $db->select( $query );
					$i = 0; 
					while ( $row = $result->fetch_assoc()) {
						$i ++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $row['name'];?></td>
							<td><a href="editcat.php?id=<?php echo $row['id'];?>">Edit</a> || <a onclick="return confirm('Are you sure want to DELETE ?')" href="deletecat.php?id=<?php echo $row['id'];?>">Delete</a></td>
						</tr>

						<?php
						
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
