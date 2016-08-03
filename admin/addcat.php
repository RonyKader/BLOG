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
            if ( isset( $_POST['catsubmit'] ) ) {
                $name1 = $formate->inputValidation( $_POST['name']);
                $name1 = mysqli_real_escape_string( $db->link, $name1 );
                if ( empty( $name1 )) 
                {
                    header("Location: addcat.php?msg=".urlencode( 'Category name can\'t be empty' ));                    
                }
                else
                {
                    $query = "INSERT INTO `category` (name) VALUES( '$name1' )";
                    $result = $db->insert( $query );

                    if ( $result ) {
                    header("Location: addcat.php?msg=".urlencode( 'Category name Added Sucessfully' ));               
                        
                    }
                }
            }

            ?>
             <form method="post" action="addcat.php">
                <table class="form">					
                    <tr>
                        <td>
                            <input type="text" name="name" placeholder="Enter Category Name..." class="medium" />
                        </td>
                    </tr>
					<tr> 
                        <td>
                            <input type="submit" name="catsubmit" Value="Save" />
                        </td>
                    </tr>
                </table>
                </form>
            </div>
        </div>
    </div>

<?php include( 'templates/footer.php' ); ?>