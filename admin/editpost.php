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
        <h2>Add New Post</h2>
        <p>
           
        </p>
        <div class="block"> 
        <?php 
        	if ( !isset( $_GET['edit_id'] ) || $_GET['edit_id'] == NULL )
        	{
        		header( "Location: postlist.php" );
        	} 
        	else
        	{
        		$edit_id = $_GET['edit_id'];
        		$query = "SELECT * FROM `post_table` WHERE id = '$edit_id'";
        		$edit_result = $db->select( $query );
        		$edit_row = $edit_result->fetch_assoc();
        	}

         ?>   

        <?php 
            if ( $_SERVER['REQUEST_METHOD'] === "POST" ) 
            {
               
               $title    = $formate->inputValidation( $_POST['title'] );      
               $category = $formate->inputValidation( $_POST['cat_id'] );      
               $body     = $formate->inputValidation( $_POST['body'] );    
               $title    = $formate->inputValidation( $_POST['title'] ); 

               $title = mysqli_real_escape_string( $db->link, $title );           
               $category = mysqli_real_escape_string( $db->link, $category );           
               $body = mysqli_real_escape_string( $db->link, $body );           
               //Code for Images upload
               $file_permition = array( 'jpg','jpeg','png','gif' );
               $file_name      = $_FILES['images']['name']; 
               $tmp_name       = $_FILES['images']['tmp_name']; 
               $file_type      = $_FILES['images']['type']; 
               $file_size      = $_FILES['images']['size']; 
               $folder_name    = "uploads/";
               $devided = explode( '.', $file_name );
               $get_extentin = strtolower( end( $devided ));

               $unique_name = $folder_name.substr( md5( time()), 0,10 ).".".$get_extentin;



               try {
                   if ( empty( $title ) ) 
                   {
                       throw new Exception( "Blog Title can'\t be empty", 1);                       
                   }
                   if (  $category == 0 ) 
                   {
                       throw new Exception( "Please Select a Category", 1);                       
                   }
                   
                   if ( $file_name != NULL && in_array( $get_extentin, $file_permition ) === false ) 
                   {
                       throw new Exception( "You can upload only".implode( ',', $file_permition ). " type File", 1);                      
                   }
                   if ( $file_size > 1048576 ) 
                   {
                       throw new Exception( "Please upload max 1mb file", 1);                      
                   }
                   if ( !empty( $file_name ) ) 
                   {

	                   	$unlink_query = "SELECT * FROM `post_table` WHERE id = '$edit_id'";
	                   	$result = $db->select( $unlink_query );
	                   	if ( $result ) 
	                   	{
	                   		$row = $result->fetch_assoc();
	                   		$unline_image = $row['images'];
	                   		unlink( $unline_image );
	                   	}
	                   move_uploaded_file( $tmp_name, $unique_name );
	                   $query = "UPDATE `post_table` SET 
	                   title = '$title',
	                   cat_id = '$category',
	                   images = '$unique_name',
	                   body = '$body'
	                   WHERE id = '$edit_id'";
	                   $result = $db->insert( $query );
	                   if ( $result ) 
	                   {
	                       throw new Exception( "Sucessfully Updated a post", 1);
	                       
	                   }                   	
                   }
                   else
                   {
                   	   move_uploaded_file( $tmp_name, $unique_name );
	                   $query = "UPDATE `post_table` SET 
	                   title = '$title',
	                   cat_id = '$category',	  
	                   body = '$body'
	                   WHERE id = '$edit_id'";
	                   $result = $db->update( $query );
	                   if ( $result ) 
	                   {
	                       throw new Exception( "Sucessfully Updated a post", 1);
	                       
	                   } 
                   }


               } catch (Exception $e) {
                   $error_message = $e->getMessage(); 
               }

            }

         ?>   


        
         <form action="" method="POST" enctype="multipart/form-data">
            <table class="form">
                <?php if( isset( $error_message)){ echo $error_message; } ?>
                <tr>
                    <td>
                        <label>Title</label>
                    </td>
                    <td>
                    	<input type="hidden" name="update_id" value="<?php echo $edit_row['id'];?>">
                        <input type="text" name="title" value="<?php echo $edit_row['title'];?>" class="medium" />
                    </td>
                </tr>
             
                <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="cat_id">
                           <option value="0">Selecte Category</option>
                        <?php 
                        if ( isset( $_GET['edit_id'] )) 
                        {
                        	$edit_id = $_GET['edit_id'];
                        }
                            $query = "SELECT * FROM `category`";
                            $result = $db->select( $query );
                            if ( $result ) 
                            {
                               while ( $row = $result->fetch_assoc()) 
                               {
                                ?>

                                <option <?php if( $edit_row['cat_id'] == $row['id'] ){ ?> selected <?php } ;?> value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                <?php 
                               }
                            }

                         ?>
                            
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                    	<img width="200" height="150" src="<?php echo $edit_row['images'];?>" alt="Images">
                    	<br>
                        <input type="file" name="images" />
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Content</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body">
                      <?php echo $edit_row['body'];?>
                        </textarea>
                    </td>
                </tr>
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="postsubmit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>

<!--jQuery Date Picker-->
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.datepicker.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.progressbar.min.js" type="text/javascript"></script>
<!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();

            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
        <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            setSidebarHeight();
        });
    </script>
    <!-- /TinyMCE -->
    <style type="text/css">
        #tinymce{font-size:15px !important;}
    </style>
<?php include( 'templates/footer.php' ); ?>    