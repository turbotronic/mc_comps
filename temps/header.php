<!DOCTYPE HTML> 
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<title><?php echo THE_TITLE; ?></title>
    <meta charset="utf-8"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<link rel="author" href="<?php echo BASE_URL; ?>/humans.txt" />
	<meta name="dcterms.rightsHolder" content="Property name here" />
	<meta name="dcterms.dateCopyrighted" content="<?php echo date('Y'); ?>" />
	<meta name="description" content="" />
	<link rel="canonical" href="<?php echo BASE_URL; ?>" />
	
	
	<!-- ICONS -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/touch/apple-touch-icon-144x144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/touch/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/touch/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="img/touch/apple-touch-icon-57x57-precomposed.png">
    <link rel="shortcut icon" href="img/touch/apple-touch-icon.png">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	
    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="img/touch/apple-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#222222">

	<!-- iOS apps -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Media Center">


	<!-- MODERNIZER -->
	<script src="<?php echo JS_DIR; ?>/lib/modernizr.js"></script>
	
	<!-- STYLESHEETS -->
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/media-center.min.css" media="screen"/>

</head>
<body class="<?php if(isset($_GET['subtopic'])){ echo 'subtopic-page '; } ?>
			<?php if($page_type == 'blog-homepage'){ echo 'blog-homepage '; } ?>
			<?php if($page_type == 'article'){ echo 'article-page '; } ?>
		">
	<header id="site-header" role="banner">
	  <div class="container">
		<a class="branding" href="#"><img src="img/logo.png" alt="" /></a>
		<div id="share-global" class="share-zipper hidden-touch">
			<div class="drawer">
				<ul class="share-tools">
					<li data-toggle="tooltip" data-placement="bottom" data-original-title="Visit Denver Media Center on Facebook" title="Visit Denver Media Center on Facebook"><a class="fc-webicon facebook large" href=""><span class="sr-only">Facebook</span></a></li>
					<li data-toggle="tooltip" data-placement="bottom" data-original-title="Follow us at @dpmediacenter on Twitter" title="Follow us at @dpmediacenter on Twitter"><a class="fc-webicon twitter large" href=""><span class="sr-only">Twitter</span></a></li>
					<li data-toggle="tooltip" data-placement="bottom" data-original-title="Follow us on Google Plus" title="Follow us on Google Plus" ><a class="fc-webicon googleplus large" href=""><span class="sr-only">Google Plus</span></a></li>
				</ul> <!-- .share-tools -->
			</div> <!-- .drawer -->
			<button class="share-toggle"><span class="glyphicon glyphicon-share-alt"><span class="sr-only">Share</span></span></button>
		</div> <!-- #share-global -->
		<div id="global-search" class="search-zipper">
			<div class="drawer">
				<input type="text" id="search-field"/>
			</div>
			<button class="search-toggle"><span class="glyphicon glyphicon-search"><span class="sr-only">Search</span></span></button>
		</div> <!-- #search-global -->
	  </div> <!-- .container -->
	</header>
    <?php include('temps/ui/subtopicsnav.php'); ?>
