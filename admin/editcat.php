<?php include( 'templates/header.php' ); ?>
<?php include( 'templates/sidebar.php' ); ?>

    <div class="grid_10">		
        <div class="box round first grid">
            <h2>Add New Category</h2>
             <h4><?php if ( isset( $_GET['msg'] )) {
                 echo $_GET['msg'];
             } ?></h4>
           <div class="block copyblock"> 
           <?php 
            if ( isset( $_POST['cateupdate'] ) ) {
            	$id = $_POST['id'];
                $name1 = $formate->inputValidation( $_POST['name']);
                $name1 = mysqli_real_escape_string( $db->link, $name1 );
                if ( empty( $name1 )) 
                {
                    header("Location: addcat.php?msg=".urlencode( 'Category name can\'t be empty' ));                    
                }
                else
                {
                    $query = "UPDATE `category` SET name ='$name1' WHERE id = '$id'";
                    $result = $db->update( $query );

                    if ( $result ) {
                    header("Location: catlist.php?msg=".urlencode( 'Category name Updated Sucessfully' ));               
                        
                    }
                }
            }

            ?>


            <?php 
            	$id = $_GET['id'];
            	$query = "SELECT * FROM `category` WHERE id='$id'";
            	$result = $db->select( $query );
            	if ( $result ) {
            		$row = mysqli_fetch_assoc( $result );
            		?>
		             <form method="post" action="editcat.php">
		                <table class="form">					
		                    <tr>
		                        <td>
		                        	<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
		                            <input type="text" name="name" placeholder="Enter Category Name..." class="medium" value="<?php echo $row['name'];?>" />
		                        </td>
		                    </tr>
							<tr> 
		                        <td>
		                            <input type="submit" name="cateupdate" Value="Save" />
		                        </td>
		                    </tr>
		                </table>
		                </form>
            		<?php
            	}
             ?>

            </div>
        </div>
    </div>

<?php include( 'templates/footer.php' ); ?>