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
            if ( $_SERVER['REQUEST_METHOD'] === "POST" ) 
            {
               
               $title    = $formate->inputValidation( $_POST['title'] );                   
               $body     = $formate->inputValidation( $_POST['body'] );              

               $title = mysqli_real_escape_string( $db->link, $title );                       
               $body  = mysqli_real_escape_string( $db->link, $body );

               try {
                   if ( empty( $title ) ) 
                   {
                       throw new Exception( "Page Title can'\t be empty", 1);                       
                   }

                   $query = 
                   "INSERT INTO `page_table` (title,body) VALUES('$title','$body')";
                   $result = $db->insert( $query );
                   if ( $result ) 
                   {
                       throw new Exception( "Sucessfully created a page", 1);
                       
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
                        <input type="text" name="title" placeholder="Enter Page Title..." class="medium" />
                    </td>
                </tr>
               
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Content</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body"></textarea>
                    </td>
                </tr>
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="postsubmit" Value="Create a page" />
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