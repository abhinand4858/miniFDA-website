<?php
    ob_start();
    session_start(); 
    if(!isset($_SESSION['user']) ) { 
    	header("Location: index.php");
    }
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>MiniFDA</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

  <link rel="stylesheet" href="css/bt/bootstrap.min.css">
<script src="js/js/jquery.min.js"></script>
<script src="js/js/bootstrap.min.js"></script>
<link href="css/bt/signin.css" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="images/logo.png"/>

  

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

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

	<div class="gtco-loader"></div>
	
	<div id="page">

	
	<div class="page-inner">
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="index.php">MiniFDA <em></em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li><a href="search.php">Reaction</a></li>
						<li><a href="search2.php">Active Substance</a></li>
						<li><a href="search3.php">Drug Indication</a></li>
						<?php  if(isset($_SESSION['user']) ) {
                        ?>
                        <li class="btn-cta has-dropdown">
                        	<a href="#"><span><?php echo $_SESSION['user']; ?></span></a>
                        	<ul class="dropdown">
								<li><a href="logout.php?logout">Logout</a></li>
							</ul>
                        </li>
                        <?php  }  ?>
					</ul>
				</div>
			</div>
			
		</div>

	</nav>

	<div 
	<header id="gtco-header" class="gtco-cover" role="banner" style="background-image: url(images/img_4.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					

					<div class="row row-mt-15em">
						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							<span class="intro-text-small"></span>
						</div>
								<div class="wrapper">
    <form class="form-signin" action="query.php" method="post">
      <h2 class="form-signin-heading" style="text-align: right;"></h2>
      <input type="text" class="form-control" name="query3" placeholder="drug name" required="" autofocus="" /><br>
      <button class="btn btn-lg btn-success btn-block" type="submit" name="btn-search3">Search</button>
    </form>
      <div align="center">
					    <br><br><br><br>
					    <h3 style="color: #ffffff">
					    <?php  if(isset($_SESSION['result']) ) {
					    	echo "<b>Result</b>";
					    	echo "<br><br>";
					    	$ret = $_SESSION['result'];
					    	
						        echo $ret;
						        echo "<br>";
						   
						 }
						 unset($_SESSION['result']);
                        ?>
                    	</h3>
                    </div>
  					</div>			
				</div>
			</div>
		</div>
	</header>
	
	
	
	

	

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

