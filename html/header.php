<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Art for Sale - Art Gallery - Buy Art on Harngallery.com</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Find original paintings and photographs by emerging and established artists. Artworks are selected by our curators">
  <meta name="author" content="Zulkarnain Shariff" >
  <meta name="keywords" content="" >

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-lightbox.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="img/favicon.png">
  
	<script type="text/javascript" src="js/libs/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-lightbox.min.js"></script>
	<script type="text/javascript" src="js/libs/jquery.masonry.min.js"></script>	
	<script type="text/javascript" src="js/scripts.js"></script>
</head>

<body>
<div class="container-fluid" id="main-container">
<!-- Harn Header-->
<div id="harn_header">
	<div class="row-fluid" id="logo">
		<div class="span4">
			<a href="index.php"><img alt="140x140" src="img/logo.png"></a>
		</div>
		<div class="span8">
			<ul id="top-menu">
				<li><span class="icon-shopping-cart"></span> <a href="#">Cart</a></li>
				<li><a href="#RegisterModal" role="button" data-toggle="modal">Register</a> or <a href="#LoginModal"role="button" data-toggle="modal">Login</a></li>
				<li><span class="icon-question-sign"></span> <a href="support.php">Help</a></li>
				<li>Artist: <a href="#LoginModal"role="button" data-toggle="modal">Sell / Upload</a></li>			
			</ul>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span8" id="harn_menu">
			<div class="navbar navbar-inverse navbar-static-top">
				<div class="navbar-inner">
								
					<div class="container-fluid">
					
						 <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a> 
						 
						<div class="nav-collapse collapse navbar-responsive-collapse">
							<ul class="nav">
								<li>
									<a href="browse-art.php">BROWSE ART</a>
								</li>
								<li class="divider-slash"></li>						
								<li>
									<a href="new-this-week.php">NEW THIS WEEK</a>
								</li>
								<li class="divider-slash"></li>			
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#">COLLECTIONS
									</a>
									<ul class="dropdown-menu2">
										<li>
											<a href="under-500.php">UNDER $500</a>
										</li>
										<li class="ds-level2 divider-slash"></li>		
										<li>
											<a href="staff-favorites.php">STAFF FAVORITES</a>
										</li>
										<li class="ds-level2 divider-slash"></li>			
										<li>
											<a href="most-popular.php">MOST POPULAR</a>
										</li>
									</ul>
								</li>
								<li class="divider-slash"></li>			
								<li>
									<a href="invest-in-art.php">INVEST IN ART</a>
								</li>
								<li class="divider-slash"></li>				
								<li>
									<a href="commission.php">COMMISSIONS</a>									
								</li>								
							</ul>
						</div>
						
					</div>
					
				</div>
				
			</div>
		</div>
		<div class="span4" id="searchbar">
			<form class="navbar-search pull-right" style="width:100px">
				<div class="btn-group pull-right">			
				<input class="input-medium search-query" type="text" placeholder="Search for..."> 
				<button type="submit" class="btn btn-inverse"><i class="icon-search icon-white"></i></button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Harn Header-->

<?php include "modal/register.php"; ?>
<?php include "modal/login.php"; ?>
