<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: index.php'); exit(); }

//define page title
$title = 'AutoHome: MemberPage';

//include header template
require('layout/header.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AutoHome</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Making your life easier!" />
	<meta name="keywords" content="home security, music, door, autohome, alexa, siri, google" />
	<meta name="author" content="Mahmoud Bachir" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<script src="js/modernizr-2.6.2.min.js"></script>
</head>
	<style>

	h2{
		color: white;
	}
	body {
    max-width: 100%;
    max-height: 70%;
	}

	.intframe iframe{
	position:relative;
	border: 1px blue solid;
	top:200px;
	left:0px;
	float:bottom;
	display: block;
    width: 1050px;
    height: 600px;
    margin: 0 auto;
    background-color: white;
}

	</style>
<body>
	
	<div class="gtco-loader"></div>
	
	<div id="page">

	
	<div class="page-inner">
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="index.php">AutoHome <em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li><h2>Welcome <?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES); ?> ! </h2>
						<li><a href="index.php">Home</a></li>
						<li class="active"><a href="memberpage.php">Memberpage</a></li>
						<li><a href="features.html">Features</a></li>
						<li><a href="tour.html">Tour</a></li>
						<li><a href="contact.html">Contact</a></li>
						<li><a href='logout.php'>Logout</a></li>
					</ul>
				</div>
			</div>
			
		</div>
	</nav>

	<header id="gtco-header" class="gtco-cover" role="banner" style="background-image: url(images/img_4.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					

					<div class="intframe">
						<iframe id ="intframe" src="iframe.php" style="overflow:hidden" scrolling="no" name="Interactive Frame" width="1100" height="600" align="bottom" frameborder="0" >	
						</iframe>	
						
					</div>
							
					
				</div>
			</div>
		</div>
	</div>
	</header>
	
	

	<footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">
			<div class="row row-p	b-md">

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>About <span class="footer-logo">AutoHome<span>.<span></span></h3>
						<p>""</p>
					</div>
				</div>

				<div class="col-md-4 col-md-push-1">
					<div class="gtco-widget">
						<h3></h3>
						
					</div>
				</div>

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3><a href="contact.html"><p style="color:#000000"> Get In Touch</p></a></h3>
						<ul class="gtco-quick-contact">
							<li><a href="#"><i class="icon-phone"></i> +1 234 567 890</a></li>
							<li><a href="#"><i class="icon-mail2"></i> info@autohome.co</a></li>
						</ul>
					</div>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block">&copy; Software Engineering Spring 2018</small> 
					</p>
					<p class="pull-right">
						
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>


			


<?php 
//include header template
require('layout/footer.php'); 
?>
