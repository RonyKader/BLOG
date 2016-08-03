<?php include( 'templates/header.php' ); ?>
<?php include( 'templates/sidebar.php' ); ?>

<div class="grid_10">		
    <div class="box round first grid">
    <?php 
        if ( $_SERVER['REQUEST_METHOD'] === "POST" ) 
        {
          $title = $formate->inputValidation( $_POST['title'] );
          $slogan = $formate->inputValidation( $_POST['slogan'] );
          $id = $_POST['id'] ;
          $title = mysqli_real_escape_string( $db->link, $title );
          $slogan = mysqli_real_escape_string( $db->link, $slogan );

          $image_permition = array( 'png' );
          $file_name = $_FILES['logo']['name'];
          $tmp_name = $_FILES['logo']['tmp_name'];
          $file_type = $_FILES['logo']['type'];
          $file_size = $_FILES['logo']['size'];

          $type_divied = explode( '.', $file_name );
          $get_logoextention = strtolower( end( $type_divied ) );
          $foldaer_name = "uploads/";
          $logoname = $foldaer_name."logo".".".$get_logoextention;


          if ( !empty( $title ) || !empty( $slogan ) || $file_name != NULL ) 
          {
             move_uploaded_file( $tmp_name,$logoname );
             $query = "UPDATE `slogan_log` SET
             title = '$title',
             slogan = '$slogan',
             logo = '$logoname'
             WHERE id = '$id'"; 

             $result = $db->insert( $query );
             if ( $result ) 
             {
                 echo "Sucessfully data updated";
             }
          }
          else
          {
            echo "Input field could\'t be empty";
          }

        }

        $query = "SELECT * FROM `slogan_log` WHERE id=1";
        $result = $db->select( $query );
        if ( $result ) 
        {   
            $row = $result->fetch_assoc();
        }

     ?>
        <h2>Update Site Title and Description</h2>
        <div class="block sloginblock">               
         <form action="" method="POST" enctype="multipart/form-data">
            <table class="form">					
                <tr>
                    <td>
                        <label>Website Title</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $row['title'];?>"  name="title" class="medium" />
                        <input type="hidden" value="<?php echo $row['id'];?>"  name="id" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Website Slogan</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $row['slogan'];?>" name="slogan" class="medium" />
                    </td>
                </tr>

                 <tr>
                    <td>
                        <label>Upload Logo</label>
                    </td>
                    <td>
                        <img width="200" height="120" src="<?php echo $row['logo'];?>" alt="">
                        <br>
                        <input type="file" class="medium" name="logo" />
                    </td>
                </tr>				 
				
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="logosubmit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>

<?php include( 'templates/footer.php' ); ?>