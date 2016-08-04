<?php include "config/config.php"; ?>	
<?php include "lib/Database.php"; ?>	
<?php include "helpers/Formate.php"; ?>	
<?php 
	$db = new Database();
	$formate = new Formate();
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo TITLE;?> | Blog Site</title>
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	<meta name="keywords" content="blog,cms blog">
	<meta name="author" content="Delowar">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.css">	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style.css">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
</head>

<body>
	<div class="headersection templete clear">
		<a href="#">
			<div class="logo">
				<img src="images/logo.png" alt="Logo"/>
				<h2>Website Title</h2>
				<p>Our website description</p>
			</div>
		</a>
		<div class="social clear">
			<div class="icon clear">
				<a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="#" target="_blank"><i class="fa fa-google-plus"></i></a>
			</div>
			<div class="searchbtn clear">
			<form action="search.php" method="GET">
				<input type="text" name="searchName" placeholder="Search keyword..."/>
				<input type="submit" name="searchQuery" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
	<ul>
		<li><a id="active" href="index.php">Home</a></li>
		<?php 
			$query = "SELECT * FROM `page_table` WHERE status = 1";
			$result = $db->select( $query );
			if ( $result ) 
			{
				while ( $row = $result->fetch_assoc() ) 
				{
				?>
				<li><a <?php if( isset( $_GET['page_id'] ) && $row['id'] == $_GET['page_id'] ){ echo "id='active'";} ;?> href="front_page.php?page_id=<?php echo $row['id'];?>"><?php echo $row['title'];?></a></li>				
				<?php
				}
			}
		 ?>
		<li><a href="contact.php">Contact</a></li>
	</ul>
</div>
