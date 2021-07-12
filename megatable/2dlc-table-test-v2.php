<?php
require_once 'dbconfig.php';

/* Attempt MySQL server connection. */
$link = mysqli_connect($host,$username,$password,$dbname);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 ?>
<!doctype html>

<html lang="en-GB">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>MOREPEAKS - 2D-LC Opportunities and Challenges Table</title>

<meta name="robots" content="MOREPEAKS, 2D-LC, Opportunities, Challenges, Table">

<link rel="stylesheet" id="wp-block-library-css" href="wp-includes/css/dist/block-library/style.min.css?ver=5.0.3" media="all">
<link rel="stylesheet" id="style-css" href="wp-content/themes/specia-standard/style.css?ver=5.0.3" media="all">
<link rel="stylesheet" id="owl-carousel-css" href="wp-content/themes/specia-standard/css/owl.carousel.css?ver=5.0.3" media="all">
<link rel="stylesheet" id="bootstrap-css" href="wp-content/themes/specia-standard/css/bootstrap.css?ver=5.0.3" type="text/css" media="all">
<link rel="stylesheet" id="owl-carousel-theme-css" href="wp-content/themes/specia-standard/css/owl.theme.default.min.css?ver=5.0.3" type="text/css" media="all">
<link rel="stylesheet" id="specia-widget-css" href="wp-content/themes/specia-standard/css/nifty/widget.css?ver=5.0.3" type="text/css" media="all">
<link rel="stylesheet" id="specia-hover-css" href="wp-content/themes/specia-standard/css/hover.css?ver=5.0.3" type="text/css" media="all">
<link rel="stylesheet" id="specia-typography-css" href="wp-content/themes/specia-standard/css/typography.css?ver=5.0.3" type="text/css" media="all">
<link rel="stylesheet" id="specia-media-query-css" href="wp-content/themes/specia-standard/css/media-query.css?ver=5.0.3" type="text/css" media="all">
<link rel="stylesheet" id="animate-css" href="wp-content/themes/specia-standard/css/animate.min.css?ver=5.0.3" type="text/css" media="all">
<link rel="stylesheet" id="specia-text-rotator-css" href="wp-content/themes/specia-standard/css/text-rotator.css?ver=5.0.3" type="text/css" media="all">
<link rel="stylesheet" id="specia-menus-css" href="wp-content/themes/specia-standard/css/menus.css?ver=5.0.3" type="text/css" media="all">
<link rel="stylesheet" id="specia-layout-css" href="wp-content/themes/specia-standard/css/layout.css?ver=5.0.3" type="text/css" media="all">
<link rel="stylesheet" id="specia-font-awesome-css" href="wp-content/themes/specia-standard/inc/fonts/font-awesome/css/font-awesome.min.css?ver=5.0.3" type="text/css" media="all">
<link rel="stylesheet" id="specia-fonts-css" href="//fonts.googleapis.com/css?family=Open+Sans%3A300%2C400%2C600%2C700%2C800%7CRaleway%3A400%2C700&amp;subset=latin%2Clatin-ext" type="text/css" media="all">
	<!-- Color style css -->
	<link href="css/color-style.css" rel="stylesheet">
	<!-- Table display css -->
	<link href="css/table.css" rel="stylesheet">
	
<!-- /not the latest jquery javascript, but this one works with the table -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <!-- /theme javascript -->
<script src="wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1"></script>
<script src="wp-content/themes/specia-standard/js/owl.carousel.min.js?ver=5.0.3"></script>
<script src="wp-content/themes/specia-standard/js/bootstrap.min.js?ver=5.0.3"></script>
<script src="wp-content/themes/specia-standard/js/jquery.simple-text-rotator.min.js?ver=5.0.3"></script>
<script src="wp-content/themes/specia-standard/js/jquery.sticky.js?ver=5.0.3"></script>
<script src="wp-content/themes/specia-standard/js/wow.min.js?ver=5.0.3"></script>
<script src="wp-content/themes/specia-standard/js/component.js?ver=5.0.3"></script>
<script src="wp-content/themes/specia-standard/js/modernizr.custom.js?ver=5.0.3"></script>
<script src="wp-content/themes/specia-standard/js/custom.js?ver=5.0.3"></script>
<script src="wp-content/themes/specia-standard/js/dropdown.js?ver=5.0.3"></script>
<!-- <script src="wp-content/themes/nifty-lite/js/custom.js?ver=5.0.3"></script> -->
<!-- /icons -->
<link rel="apple-touch-icon" sizes="57x57" href="img/icon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="img/icon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/icon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="img/icon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/icon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="img/icon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="img/icon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="img/icon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="img/icon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="img/icon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="img/icon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="img/icon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="img/icon/favicon-16x16.png">
<link rel="manifest" href="img/icon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="img/icon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
		</head>
	
<body class="home page-template-default page wide">

<div class="site" id="page">
	<a class="skip-link screen-reader-text" href="#main">Skip to content</a>

	<a href="https://morepeaks.org/" rel="home">
		<img width="2000" height="636" alt="" src="wp-content/uploads/2019/01/cropped-Untitled-4.png"></a>

<section class="header_nifty_dark">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-5 col-xs-12 contact_phone">
											</div>
			
			<div class="col-md-6 col-sm-7 spyropress-logo">
				<a class="navbar-brand" href="https://morepeaks.org/"></a>
			</div>

            <div class="col-md-3 col-sm-7 contact_email">
			</div>
        </div>
    </div>
</section>

<div class="clearfix"></div>
<header>
	<div class="sticky-wrapper" id="sticky-wrapper" style="height: 53px;">
	<nav class="navbar navbar-default nav-spyropress sticky-nav">
		
		<div class="container nifty-border">

			<!-- Mobile Display -->
			<div class="navbar-header">
				<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- /Mobile Display -->

			<!-- Menu Toggle -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<div>
					<div class="row">
						<div class="col-md-7 col-xs-12 padding-0">
							<ul class="nav navbar-nav" id="menu-main"><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-20" id="menu-item-20"><a href="https://morepeaks.org">Home</a></li>
							<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-18 dropdown active" id="menu-item-18"><a href="https://morepeaks.org/2d-lc/">2D-LC<i class="caret"></i></a>
							<ul class="dropdown-menu">
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown dropdown-submenu"><a href="https://morepeaks.org/pirok/2dlc-applications.php">Applications <i class="caret"></i></a>
							<ul class="dropdown-menu">
							<li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="https://morepeaks.org/pirok/insertdata-2dlc.html">Add your own application</a></li>
							</ul>
							</li>
							<li class="menu-item menu-item-type-post_type menu-item-object-page page_item"><a href="https://morepeaks.org/modulation/">Modulation</a></li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item active"><a href="https://morepeaks.org/pirok/2dlc-table.php">Opportunities and Challenges</a></li>
							</ul>
							</li>
							<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-19" id="menu-item-19"><a href="https://morepeaks.org/research/">Research</a></li>
							<li class="menu-item menu-item-type-post_type menu-item-object-page page_item page-item-14 menu-item-21" id="menu-item-21"><a href="https://morepeaks.org/">About</a></li>
							</ul>						
						</div>
						
						<div class="col-md-2 col-xs-12 header-top-info-8">
						<!-- Start Social Media Icons -->
							<ul class="social pull-left">
							<li><a href="https://www.linkedin.com/in/bob-pirok-91a35956/"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="mailto:B.W.J.Pirok@uva.nl"><i class="fa fa-envelope-o"></i></a></li>
							</ul>
						<!-- /End Social Media Icons-->
						</div>
						<div class="col-md-3 col-xs-12 spyro-button-container">
							<ul><li><div class="spyro_button"><a class="spyropress-button" href="mailto:B.W.J.Pirok@uva.nl"><i class="fa "></i> CONTACT</a></div></li></ul>						</div>
					</div>
				</div>
				<!-- Menu Toggle -->
				</div>
			</div>
		</nav>
	</div>
</header>

<div class="clearfix"></div>	
	<div class="site-content" id="content" role="main">
		<section class="page-wrapper">
			<div class="container">
					
				<div class="row padding-top-60 padding-bottom-60">		
					<div class="col-md-12">			
						<div class="site-content">
			
						<h3>Optimizing separations in online comprehensive two‐dimensional liquid chromatography</h3>
						<h4>Overview of the possible online LC×LC combination using the most-common forms of LC separations</h4>
 			
 					<div style="overflow-x:auto;">
 				<table>
 				<tbody>
				<tr>
				<th style="background-color: #FFFFFF"></th>
				
				<th> <h3><sup>2</sup>RP </h3>
				<hr><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Fast Separation" data-content="Method with short analysis times (e.g. <1 min).">F<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="High-resolution separation" data-content="Method capable of high peak capacity.">H<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Column re-equilibration" data-content="Speed of column re-equilibration.">Q<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="MS compatible" data-content="Possibility of using volatile mobile-phase additives and achieving good MS sensitivity.">M<sup>+</sup></a> 
				<br><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Suitable for separations of polymers."><img src="img/plm-s.png" width="25" alt=""/></a>
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Suitable for separations of proteins."><img src="img/prt-s.png" width="25" alt=""/></a>
 				</th>
 
 				<th> <h3><sup>2</sup>NP </h3>
				<hr><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Fast Separation" data-content="Method with short analysis times (e.g. <1 min).">F<sup>-</sup></a> 
 				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Column re-equilibration" data-content="Speed of column re-equilibration.">Q<sup>-</sup></a> 
 				<br><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Suitable for separations of polymers."><img src="img/plm-s.png" width="25" alt=""/></a>
 				</th>
 			
 				<th> <h3><sup>2</sup>HILIC </h3>
				<hr><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="MS compatible" data-content="Possibility of using volatile mobile-phase additives and achieving good MS sensitivity.">M<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Column re-equilibration" data-content="Speed of column re-equilibration.">Q<sup>-</sup></a>
 				<br>&nbsp;
 				</th>
 
 				<th> <h3><sup>2</sup>HIC </h3>
				<hr><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Fast Separation" data-content="Method with short analysis times (e.g. <1 min).">F<sup>-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="High-resolution separation" data-content="Method capable of high peak capacity.">H<sup>-</sup></a>
 				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="MS compatible" data-content="Possibility of using volatile mobile-phase additives and achieving good MS sensitivity.">M<sup>-</sup></a> 
 				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Column re-equilibration" data-content="Speed of column re-equilibration.">Q<sup>-</sup></a>
 				<br>&nbsp;
 				</th>
 
 				<th> <h3><sup>2</sup>IEX </h3>
				<hr><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="MS compatible" data-content="Possibility of using volatile mobile-phase additives and achieving good MS sensitivity.">M<sup>-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Column re-equilibration" data-content="Speed of column re-equilibration.">Q<sup>-</sup></a> 
 				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Selectivity/Specificity" data-content="Capability of the separation method to separate based on chemical characteristics of sample components (e.g. shape, orientation, composition/ sequence)">S<sup>+</sup></a>
				<br>&nbsp;
				</th>
 
				<th> <h3><sup>2</sup>SEC-Aq </h3>
				<hr><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Fast Separation" data-content="Method with short analysis times (e.g. <1 min).">F<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="High-resolution separation" data-content="Method capable of high peak capacity.">H<sup>-</sup></a>
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Isocratic" data-content="Possibility of (easily) running isocratic methods, reducing the complexity of the setup.">I</a> 
				<br><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Suitable for separations of polymers."><img src="img/plm-s.png" width="25" alt=""/></a><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Suitable for separations of proteins."><img src="img/prt-s.png" width="25" alt=""/></a>
				</th>
 
				<th> <h3><sup>2</sup>SEC-Or </h3>
				<hr><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Fast Separation" data-content="Method with short analysis times (e.g. <1 min).">F<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="High-resolution separation" data-content="Method capable of high peak capacity.">H<sup>-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Isocratic" data-content="Possibility of (easily) running isocratic methods, reducing the complexity of the setup.">I</a> 
				<br><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Suitable for separations of polymers."><img src="img/plm-s.png" width="25" alt=""/></a>
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Suitable for separations of proteins."><img src="img/prt-s.png" width="25" alt=""/></a>
				</th>
 
				<th> <h3><sup>2</sup>Ag </h3>
				<hr><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Fast Separation" data-content="Method with short analysis times (e.g. <1 min).">F<sup>-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Column re-equilibration" data-content="Speed of column re-equilibration.">Q<sup>-</sup></a> <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Selectivity/Specificity" data-content="Capability of the separation method to separate based on chemical characteristics of sample components (e.g. shape, orientation, composition/ sequence)">S<sup>+</sup></a>
				<br>&nbsp;
				</th>
 
				<th> <h3><sup>2</sup>Chiral </h3>
				<hr><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Fast Separation" data-content="Method with short analysis times (e.g. <1 min).">F<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Isocratic" data-content="Possibility of (easily) running isocratic methods, reducing the complexity of the setup.">I</a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Selectivity/Specificity" data-content="Capability of the separation method to separate based on chemical characteristics of sample components (e.g. shape, orientation, composition/ sequence)">S<sup>+</sup></a> 
				<br><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Unsuitable for separations of polymers."><img src="img/plm-u.png" width="25" alt=""/></a>
 				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Unsuitable for separations of proteins."><img src="img/prt-u.png" width="25" alt=""/></a>
 				</th>
 
			 	<th> <h3><sup>2</sup>Affinity </h3>
				<hr><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="High-resolution separation" data-content="Method capable of high peak capacity.">H<sup>-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Column re-equilibration" data-content="Speed of column re-equilibration.">Q<sup>-</sup></a> <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Selectivity/Specificity" data-content="Capability of the separation method to separate based on chemical characteristics of sample components (e.g. shape, orientation, composition/ sequence)">S<sup>+</sup></a> 
				<br><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Unsuitable for separations of polymers."><img src="img/plm-u.png" width="25" alt=""/></a>
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Unsuitable for separations of proteins."><img src="img/prt-u.png" width="25" alt=""/></a>
				</th>

				<th> <h3><sup>2</sup>SFC </h3>
				<hr><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Fast Separation" data-content="Method with short analysis times (e.g. <1 min).">F<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="High-resolution separation" data-content="Method capable of high peak capacity.">H<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="MS compatible" data-content="Possibility of using volatile mobile-phase additives and achieving good MS sensitivity.">M<sup>+</sup></a> 
				<br><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Unsuitable for separations of polymers."><img src="img/plm-u.png" width="25" alt=""/></a>
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Unsuitable for separations of proteins."><img src="img/prt-u.png" width="25" alt=""/></a>
 				</th>
 				</tr>
 			
 				<tr>
				<th> <h3><sup>1</sup>RP </h3>
				<hr><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="High-resolution separation" data-content="Method capable of high peak capacity.">H<sup>2+</sup></a>
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Suitable for separations of polymers."><img src="img/plm-s.png" width="25" alt=""/></a>
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Suitable for separations of proteins."><img src="img/prt-s.png" width="25" alt=""/></a>
				</th>
				
				<td class="score7-9">
					<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Easy to modulate" data-content="Ease of developing active modulation methods (e.g. trap columns or solvent admixing).">E</a> 
					<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
					<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>+</sup></a> 
					<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
					<br>
					
					<a data-toggle="modal" href="#ref1"><i class="fa fa-file-text-o" style="color:black; vertical-align: bottom"></i></a>
					<!-- Modal -->
					<div class="modal fade" id="ref1" role="dialog">
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">References</h4>
								</div>
								<div class="modal-body">
								
									<?php
										// Attempt select query execution
										$sql = "SELECT * FROM `2dlc` WHERE ( `one_d` = 'RPLC' OR `one_d` = 'IP-RPLC' OR `one_d` = 'NA-RPLC' ) AND( `two_d` = 'RPLC' OR `two_d` = 'IP-RPLC' OR `two_d` = 'NA-RPLC' )";
										if($result = mysqli_query($link, $sql)){
											if(mysqli_num_rows($result) > 0){
												while($row = mysqli_fetch_array($result)){
													echo $row['author'] . '&nbsp;(' . $row['year'] . ')<br>' . '<a href="https://doi.org/' . $row['ref'] . '" target="_blank">' . $row['title'] . '</a><br>' . '<br>' . '<hr>';
												}
												// Free result set
												mysqli_free_result($result);
											} else{
												echo "No records matching your query were found.";
											}
										} else{
											echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
										}
									?>
								
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
					
					<br>
					<?php
						// Attempt select query execution
						$sql = "SELECT * FROM `2dlc` WHERE ( `one_d` = 'RPLC' OR `one_d` = 'IP-RPLC' OR `one_d` = 'NA-RPLC' ) AND( `two_d` = 'RPLC' OR `two_d` = 'IP-RPLC' OR `two_d` = 'NA-RPLC' )";
						if($result = mysqli_query($link, $sql)){
							if(mysqli_num_rows($result) > 0){
								
								echo '<a data-toggle="modal" href="#ref1"><i class="fa fa-file-text-o" style="color:black; vertical-align: bottom"></i></a>';
								echo '<div class="modal fade" id="ref1" role="dialog">';
								echo '<div class="modal-dialog">';
								echo '<!-- Modal content-->';
								echo '<div class="modal-content">';
								echo '<div class="modal-header">';
								echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
								echo '<h4 class="modal-title">References</h4>';
								echo '</div>';
								echo '<div class="modal-body">';
								
								while($row = mysqli_fetch_array($result)){
									echo $row['author'] . '&nbsp;(' . $row['year'] . ')<br>' . '<a href="https://doi.org/' . $row['ref'] . '" target="_blank">' . $row['title'] . '</a><br>' . '<br>' . '<hr>';
								}
								
								echo '</div>';
								echo '<div class="modal-footer">';
								echo '<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
								echo '</div>';
												
								// Free result set
								mysqli_free_result($result);
							} else{
								//echo "No records matching your query were found.";
							}
						} else{
							echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
						}
					?>
				</td>
 
				<td class="score-4">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2-</sup></a>
				<br><a data-toggle="modal" href="#ref2"><i class="fa fa-file-text-o" style="color:black;"></i></a>
				<!-- Modal -->
 					<div class="modal fade" id="ref2" role="dialog">
						<div class="modal-dialog">
						<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">References</h4>
								</div>
								<div class="modal-body">
								<?php
								// Attempt select query execution
$sql = "SELECT * FROM `2dlc` WHERE ( `one_d` = 'RPLC' OR `one_d` = 'IP-RPLC' OR `one_d` = 'NA-RPLC' ) AND( `two_d` = 'NPLC' OR `two_d` = 'IP-RPLC' OR `two_d` = 'NA-RPLC' )";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
                echo $row['author'] . '&nbsp;(' . $row['year'] . ')<br>' . '<a href="https://doi.org/' . $row['ref'] . '" target="_blank">' . $row['title'] . '</a><br>' . '<br>' . '<hr>';
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
								</div>
								<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								</div>
 							</div>
 						</div>
 					</div>
					</td>
 
				<td class="score2">
 				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
				<br><a data-toggle="modal" href="#ref3"><i class="fa fa-file-text-o" style="color:black;"></i></a>
				<!-- Modal -->
 				<div class="modal fade" id="ref3" role="dialog">
 					<div class="modal-dialog">
 					<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">References</h4>
							</div>
							<div class="modal-body">
							<?php
								// Attempt select query execution
$sql = "SELECT * FROM `2dlc` WHERE ( `one_d` = 'RPLC' OR `one_d` = 'IP-RPLC' OR `one_d` = 'NA-RPLC' ) AND `two_d` = 'HILIC'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
                echo $row['author'] . '&nbsp;(' . $row['year'] . ')<br>' . '<a href="https://doi.org/' . $row['ref'] . '" target="_blank">' . $row['title'] . '</a><br>' . '<br>' . '<hr>';
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
							</div>
							<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a>
				</td>
 
				<td class="score-5-10">
 				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Easy to modulate" data-content="Ease of developing active modulation methods (e.g. trap columns or solvent admixing).">E</a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
 				<br><a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a>
 				</td>
				
				<td class="score1">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a>
				<br><a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a>
				</td>
				
				<td class="score3">
					<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Adsorption" data-content="Lengthening of elution time due to injection solvent. Applies exclusively to SEC.">A</a>
					<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Easy to modulate" data-content="Ease of developing active modulation methods (e.g. trap columns or solvent admixing)."> E</a> 
					<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
					<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>+</sup></a> <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
					<br>
					<a tabindex="0" role="button" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="Suitable for separations of proteins."><img class="fl-rgt" src="img/plm-s.png" width="25" alt=""/></a>
				</td>
				
				<td class="score1">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Adsorption" data-content="Lengthening of elution time due to injection solvent. Applies exclusively to SEC.">A</a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Easy to modulate" data-content="Ease of developing active modulation methods (e.g. trap columns or solvent admixing).">E</a>
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a>
				<br> <a data-toggle="modal" href="#ref4"><i class="fa fa-file-text-o" style="color:black;"></i></a>
				<!-- Modal -->
 				<div class="modal fade" id="ref4" role="dialog">
 					<div class="modal-dialog">
 					<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">References</h4>
							</div>
 							<div class="modal-body">
							<?php
								// Attempt select query execution
$sql = "SELECT * FROM `2dlc` WHERE ( `one_d` = 'RPLC' OR `one_d` = 'IP-RPLC' OR `one_d` = 'NA-RPLC' ) AND `two_d` = 'SEC'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
        	echo $row['author'] . '&nbsp;(' . $row['year'] . ')<br>' . '<a href="https://doi.org/' . $row['ref'] . '" target="_blank">' . $row['title'] . '</a><br>' . '<br>' . '<hr>';
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
 							</div>
 							<div class="modal-footer">
 							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
 							</div>
 						</div>
 					</div>
 				</div>
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Suitable for separations of proteins."><img class="fl-rgt" src="img/plm-s.png" width="25" alt=""/></a></td>
					
				<td class="score0">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>-</sup></a>
				<br><a data-toggle="modal" href="#ref5"><i class="fa fa-file-text-o" style="color:black;"></i></a>
				<!-- Modal -->
 				<div class="modal fade" id="ref5" role="dialog">
 				<div class="modal-dialog">
 				<!-- Modal content-->
 					<div class="modal-content">
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">References</h4>
							</div>
 					<div class="modal-body">
							<?php
								// Attempt select query execution
$sql = "SELECT * FROM `2dlc` WHERE ( `one_d` = 'RPLC' OR `one_d` = 'IP-RPLC' OR `one_d` = 'NA-RPLC' ) AND `two_d` = 'AgLC'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
        	echo $row['author'] . '&nbsp;(' . $row['year'] . ')<br>' . '<a href="https://doi.org/' . $row['ref'] . '" target="_blank">' . $row['title'] . '</a><br>' . '<br>' . '<hr>';
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
 					</div>
 					<div class="modal-footer">
 					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
 					</div>
 					</div>
 					</div>
 				</div>
				<a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a></td>
					
				<td class="score3">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a>
				<br> <a data-toggle="modal" href="#ref6"><i class="fa fa-file-text-o" style="color:black;"></i></a>
				<!-- Modal -->
				<div class="modal fade" id="ref6" role="dialog">
 				<div class="modal-dialog">
				<!-- Modal content-->
					<div class="modal-content">
 				<div class="modal-header">
 				<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">References</h4>
 				</div>
 				<div class="modal-body">
						<?php
								// Attempt select query execution
$sql = "SELECT * FROM `2dlc` WHERE ( `one_d` = 'RPLC' OR `one_d` = 'IP-RPLC' OR `one_d` = 'NA-RPLC' ) AND `two_d` = 'Chiral'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
                echo $row['author'] . '&nbsp;(' . $row['year'] . ')<br>' . '<a href="https://doi.org/' . $row['ref'] . '" target="_blank">' . $row['title'] . '</a><br>' . '<br>' . '<hr>';
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
 				</div>
 				<div class="modal-footer">
 				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
 				</div>
 				</div>
 			</div>
 			</div>
 				</td>
 
				<td class="score3">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
				<br>&nbsp;</td>
					
				<td class="score4">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>-</sup></a>
				<br><a data-toggle="modal" href="#ref7"><i class="fa fa-file-text-o" style="color:black;"></i></a>
				<!-- Modal -->
 				<div class="modal fade" id="ref7" role="dialog">
 				<div class="modal-dialog">
					<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
						 	<button type="button" class="close" data-dismiss="modal">&times;</button>
						 	<h4 class="modal-title">References</h4>
							</div>
							<div class="modal-body">
					 	<?php
								// Attempt select query execution
$sql = "SELECT * FROM `2dlc` WHERE ( `one_d` = 'RPLC' OR `one_d` = 'IP-RPLC' OR `one_d` = 'NA-RPLC' ) AND `two_d` = 'SFC'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
                echo $row['author'] . '&nbsp;(' . $row['year'] . ')<br>' . '<a href="https://doi.org/' . $row['ref'] . '" target="_blank">' . $row['title'] . '</a><br>' . '<br>' . '<hr>';
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
 							</div>
 						<div class="modal-footer">
 					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
 					</div>
 					</div>
 				</div>
 				</div>
 				</td>
 			</tr>
 
 				<tr>
				<th> <h3><sup>1</sup>NP </h3>
	 			<hr><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="High-resolution separation" data-content="Method capable of high peak capacity.">H<sup>+</sup></a>
	 			<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Suitable for separations of polymers."><img src="img/plm-s.png" width="25" alt=""/></a></th>
				
				<td class="score4">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2-</sup></a>
				<br><a data-toggle="modal" href="#ref8"><i class="fa fa-file-text-o" style="color:black;"></i></a>
 			<!-- Modal -->
 				<div class="modal fade" id="ref8" role="dialog">
					<div class="modal-dialog">
					<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">References</h4>
							</div>
							<div class="modal-body">
							<?php
								// Attempt select query execution
$sql = "SELECT * FROM `2dlc` WHERE `one_d`='NPLC' AND ( `two_d` = 'RPLC' OR `two_d` = 'IP-RPLC' OR `two_d` = 'NA-RPLC' )";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
			echo $row['author'] . '&nbsp;(' . $row['year'] . ')<br>' . '<a href="https://doi.org/' . $row['ref'] . '" target="_blank">' . $row['title'] . '</a><br>' . '<br>' . '<hr>';
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
							</div>
							<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						</div>
	 				</div>
 				</div>
 			</td>
					
				<td class="score-2">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
				<br>&nbsp;</td>
					
				<td class="score-2">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a> <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>-</sup></a>
				<br>&nbsp;</td>
					
				<td class="score-5-10">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2-</sup></a>
				<br>&nbsp;</td>
					
				<td class="score3">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a><br>
				<a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a></td>
					
				<td class="score1"><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2-</sup></a>
				<br>&nbsp;</td>
					
				<td class="score6">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
				<br> <a data-toggle="modal" href="#ref9"><i class="fa fa-file-text-o" style="color:black;"></i></a>
				<!-- Modal -->
 				<div class="modal fade" id="ref9" role="dialog">
 				<div class="modal-dialog">
					<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">References</h4>
							</div>
							<div class="modal-body">
							<?php
								// Attempt select query execution
$sql = "SELECT * FROM `2dlc` WHERE `one_d`='NPLC' AND `two_d` = 'SEC'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
			echo $row['author'] . '&nbsp;(' . $row['year'] . ')<br>' . '<a href="https://doi.org/' . $row['ref'] . '" target="_blank">' . $row['title'] . '</a><br>' . '<br>' . '<hr>';
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
							</div>
							<div class="modal-footer">
						 	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
					 	</div>
 					</div>
 				</div>
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Suitable for separations of proteins."><img class="fl-rgt" src="img/plm-s.png" width="25" alt=""/></a></td>
					
				<td class="score3">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
			 	<br>&nbsp;
			 	</td>
					
				<td class="score4">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a>
				<br>&nbsp;
				</td>
					
				<td class="score-1">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2-</sup></a>
				<br>&nbsp;
				</td>
					
				<td class="score6"><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2+</sup></a>
				<br>&nbsp;
				</td>
				</tr>
 
				<tr>
				<th> <h3><sup>1</sup>HILIC </h3>
				<hr><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="High-resolution separation" data-content="Method capable of high peak capacity.">H<sup>+</sup></a>
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Suitable for separations of proteins."><img src="img/prt-s.png" width="25" alt=""/></a>
				</th>
					
				<td class="score7-9">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>+</sup></a> <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
				<br><a data-toggle="modal" href="#ref10"><i class="fa fa-file-text-o" style="color:black;"></i></a>
				<!-- Modal -->
 				<div class="modal fade" id="ref10" role="dialog">
 				<div class="modal-dialog">
 				<!-- Modal content-->
 					<div class="modal-content">
 					<div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal">&times;</button>
							 <h4 class="modal-title">References</h4>
 					</div>
 					<div class="modal-body">
							<?php
								// Attempt select query execution
$sql = "SELECT * FROM `2dlc` WHERE `one_d` = 'HILIC' AND( `two_d` = 'RPLC' OR `two_d` = 'IP-RPLC' OR `two_d` = 'NA-RPLC' )";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
			echo $row['author'] . '&nbsp;(' . $row['year'] . ')<br>' . '<a href="https://doi.org/' . $row['ref'] . '" target="_blank">' . $row['title'] . '</a><br>' . '<br>' . '<hr>';
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
							</div>
 					<div class="modal-footer">
 					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
 					</div>
 					</div>
 				</div>
 				</div>
 			</td>
					
 			<td class="score-4">
 			<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> 
 			<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>-</sup></a> 
 			<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>-</sup></a>
 			<br>&nbsp;
 			</td>
 			
				<td class="score1">
 			<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>-</sup></a> 
 			<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
 			<br><a data-toggle="modal" href="#ref11"><i class="fa fa-file-text-o" style="color:black;"></i></a>
				<!-- Modal -->
 				<div class="modal fade" id="ref11" role="dialog">
 				<div class="modal-dialog">
 				<!-- Modal content-->
 					<div class="modal-content">
 					<div class="modal-header">
 					<button type="button" class="close" data-dismiss="modal">&times;</button>
 					<h4 class="modal-title">References</h4>
 					</div>
 					<div class="modal-body">
							<?php
								// Attempt select query execution
$sql = "SELECT * FROM `2dlc` WHERE `one_d` = 'HILIC' AND `two_d` = 'HILIC'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
			echo $row['author'] . '&nbsp;(' . $row['year'] . ')<br>' . '<a href="https://doi.org/' . $row['ref'] . '" target="_blank">' . $row['title'] . '</a><br>' . '<br>' . '<hr>';
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
							</div>
 					<div class="modal-footer">
 					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
 					</div>
 					</div>
 				</div>
 				</div>
				</td>
					
				<td class="score-4">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>-</sup></a>
				<br>&nbsp;
				</td>
					
 				<td class="score3">
 				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
 				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
 				<br><a data-toggle="modal" href="#ref12"><i class="fa fa-file-text-o" style="color:black;"></i></a>
				<!-- Modal -->
 				<div class="modal fade" id="ref12" role="dialog">
 				<div class="modal-dialog">
 				<!-- Modal content-->
 					<div class="modal-content">
 					<div class="modal-header">
 					<button type="button" class="close" data-dismiss="modal">&times;</button>
 					<h4 class="modal-title">References</h4>
 					</div>
 					<div class="modal-body">
							<?php
								// Attempt select query execution
$sql = "SELECT * FROM `2dlc` WHERE `one_d` = 'HILIC' AND( `two_d` = 'IEX' OR `two_d` = 'SCX' OR `two_d` = 'WCX' OR `two_d` = 'SAX' )";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
			echo $row['author'] . '&nbsp;(' . $row['year'] . ')<br>' . '<a href="https://doi.org/' . $row['ref'] . '" target="_blank">' . $row['title'] . '</a><br>' . '<br>' . '<hr>';
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
							</div>
 					<div class="modal-footer">
 					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
 					</div>
 					</div>
 				</div>
 				</div>
 				</td>
 				
				<td class="score5">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>+</sup></a>
				<br>&nbsp;
				</td>
					
				<td class="score3">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Adsorption" data-content="Lengthening of elution time due to injection solvent. Applies exclusively to SEC.">A</a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
			 	<br>&nbsp;
			 	</td>
					
				<td class="score0">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>-</sup></a>
			 	<br>&nbsp;
			 	</td>
					
				<td class="score4">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a>
			 	<br>&nbsp;
			 	</td>
					
				<td class="score0">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>-</sup></a>
			 	<br>&nbsp;
			 	</td>
					
				<td class="score6">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
				<br>&nbsp;
				</td>
 				</tr>
 
 				<tr>
 				<th> <h3><sup>1</sup>HIC </h3>
				<hr><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="High-resolution separation" data-content="Method capable of high peak capacity.">H<sup>-</sup></a>
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Suitable for separations of proteins."><img src="img/prt-s.png" width="25" alt=""/></a>
				</th>
		 
		 		<td class="score6">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Easy to modulate" data-content="Ease of developing active modulation methods (e.g. trap columns or solvent admixing).">E</a> <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2+</sup></a>
				<br> <a data-toggle="modal" href="#ref13"><i class="fa fa-file-text-o" style="color:black;"></i></a>
				<!-- Modal -->
 				<div class="modal fade" id="ref13" role="dialog">
 				<div class="modal-dialog">
				 	<!-- Modal content-->
				 		<div class="modal-content">
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">References</h4>
							</div>
							<div class="modal-body">
							<?php
								// Attempt select query execution
$sql = "SELECT * FROM `2dlc` WHERE `one_d` = 'HIC' AND( `two_d` = 'RPLC' OR `two_d` = 'IP-RPLC' OR `two_d` = 'NA-RPLC' )";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
			echo $row['author'] . '&nbsp;(' . $row['year'] . ')<br>' . '<a href="https://doi.org/' . $row['ref'] . '" target="_blank">' . $row['title'] . '</a><br>' . '<br>' . '<hr>';
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
 						</div>
						<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
 					</div>
 				</div>
 				</div>
 				</td>
		 
				<td class="score-5-10">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2-</sup></a>
				<br>&nbsp;
				</td>
		 
				<td class="score-1">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>-</sup></a>
				<br>&nbsp;
				</td>
		 
				<td class="score-5-10">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>2-</sup></a>
				<br>&nbsp;</td>
		 
				<td class="score0">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a> <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2+</sup></a>
				<br>&nbsp;
				</td>
		 
				<td class="score2">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2+</sup></a>
				<br>&nbsp;</td>
		 
				<td class="score-2">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Adsorption" data-content="Lengthening of elution time due to injection solvent. Applies exclusively to SEC.">A</a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>-</sup></a>
				<br>&nbsp;
				</td>
		 
				<td class="score-4">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2-</sup></a>
				<br>&nbsp;
				</td>
		 
				<td class="score-1">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>2-</sup></a>
				<br>&nbsp;
				</td>
		 
				<td class="score1">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
				<br>&nbsp;
				</td>
		 
				<td class="score-2">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>2-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2-</sup></a>
				<br>&nbsp;
				</td>
				</tr>

				<tr>
				<th> <h3><sup>1</sup>IEX </h3>
				<hr><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="High-resolution separation" data-content="Method capable of high peak capacity.">H<sup>-</sup></a>
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Selectivity/Specificity" data-content="Capability of the separation method to separate based on chemical characteristics of sample components (e.g. shape, orientation, composition/ sequence)">S<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Suitable for separations of polymers."><img src="img/plm-s.png" width="25" alt=""/></a>
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Suitable for separations of proteins."><img src="img/prt-s.png" width="25" alt=""/></a>
				</th>
		
				<td class="score7-9">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Easy to modulate" data-content="Ease of developing active modulation methods (e.g. trap columns or solvent admixing).">E</a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2+</sup></a>
				<br><a data-toggle="modal" href="#ref14"><i class="fa fa-file-text-o" style="color:black;"></i></a>
 			<!-- Modal -->
 				<div class="modal fade" id="ref14" role="dialog">
 				<div class="modal-dialog">
					<!-- Modal content-->
 					<div class="modal-content">
 					<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">References</h4>
 					</div>
 					<div class="modal-body">
 					<?php
								// Attempt select query execution
$sql = "SELECT * FROM `2dlc` WHERE ( `one_d` = 'IEX' OR `one_d` = 'SCX' OR `one_d` = 'WCX' OR `one_d` = 'SAX' ) AND( `two_d` = 'RPLC' OR `two_d` = 'IP-RPLC' OR `two_d` = 'NA-RPLC' )";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
			echo $row['author'] . '&nbsp;(' . $row['year'] . ')<br>' . '<a href="https://doi.org/' . $row['ref'] . '" target="_blank">' . $row['title'] . '</a><br>' . '<br>' . '<hr>';
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
 					</div>
 						<div class="modal-footer">
 						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
 			</div>
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Suitable for separations of proteins."><img class="fl-rgt" src="img/prt-s.png" width="25" alt=""/></a>
				</td>
		
				<td class="score-3">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2-</sup></a>
				<br>&nbsp;
				</td>
		
				<td class="score0">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>-</sup></a>
				<br>&nbsp;
				</td>
		
				<td class="score-2">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a> <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2+</sup></a>
				<br>&nbsp;
				</td>
		
				<td class="score-1">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>-</sup></a>
				<br><a data-toggle="modal" href="#ref15"><i class="fa fa-file-text-o" style="color:black;"></i></a>
				<!-- Modal -->
				<div class="modal fade" id="ref15" role="dialog">
					<div class="modal-dialog">
					<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">References</h4>
							</div>
							<div class="modal-body">
							<?php
								// Attempt select query execution
$sql = "SELECT * FROM `2dlc` WHERE ( `one_d` = 'IEX' OR `one_d` = 'SCX' OR `one_d` = 'WCX' OR `one_d` = 'SAX' ) AND( `two_d` = 'IEX' OR `two_d` = 'SCX' OR `two_d` = 'WCX' OR `two_d` = 'SAX' )";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
			echo $row['author'] . '&nbsp;(' . $row['year'] . ')<br>' . '<a href="https://doi.org/' . $row['ref'] . '" target="_blank">' . $row['title'] . '</a><br>' . '<br>' . '<hr>';
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
							</div>
							<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				</td>
		
	 			<td class="score5">
		 		<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
		 		<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2+</sup></a>
				<br><a data-toggle="modal" href="#ref16"><i class="fa fa-file-text-o" style="color:black;"></i></a>
 			<!-- Modal -->
 				<div class="modal fade" id="ref16" role="dialog">
					<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">References</h4>
						</div>
						<div class="modal-body">
 						<?php
								// Attempt select query execution
$sql = "SELECT * FROM `2dlc` WHERE ( `one_d` = 'IEX' OR `one_d` = 'SCX' OR `one_d` = 'WCX' OR `one_d` = 'SAX' ) AND `two_d` = 'SEC'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
			echo $row['author'] . '&nbsp;(' . $row['year'] . ')<br>' . '<a href="https://doi.org/' . $row['ref'] . '" target="_blank">' . $row['title'] . '</a><br>' . '<br>' . '<hr>';
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
 				</div>
 				<div class="modal-footer">
 				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
 					</div>
					</div>
	 			</div>
 		</div>
 		</td>
		
				<td class="score0">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Adsorption" data-content="Lengthening of elution time due to injection solvent. Applies exclusively to SEC.">A</a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>-</sup></a>
				<br>&nbsp;
				</td>
		
				<td class="score0">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>-</sup></a>
				<br>&nbsp;
				</td>
		
				<td class="score4">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a>
				<br>&nbsp;
				</td>
		
				<td class="score3">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
				<br>&nbsp;
				</td>
		
				<td class="score3">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2-</sup></a>
				<br>&nbsp;
				</td>
 			</tr>
 
 				<tr>
 				<th> <h3><sup>1</sup>SEC-Aq </h3>
				<hr><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="High-resolution separation" data-content="Method capable of high peak capacity.">H<sup>2-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Suitable for separations of polymers."><img src="img/plm-s.png" width="25" alt=""/></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Suitable for separations of proteins."><img src="img/prt-s.png" width="25" alt=""/></a>
				</th>
		
				<td class="score7-9">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Easy to modulate" data-content="Ease of developing active modulation methods (e.g. trap columns or solvent admixing).">E</a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2+</sup></a>
				<br><a data-toggle="modal" href="#ref17"><i class="fa fa-file-text-o" style="color:black;"></i></a>
 				<!-- Modal -->
 				<div class="modal fade" id="ref17" role="dialog">
 					<div class="modal-dialog">
					<!-- Modal content-->
						<div class="modal-content">
 							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">References</h4>
 							</div>
							<div class="modal-body">
							<?php
								// Attempt select query execution
$sql = "SELECT * FROM `2dlc` WHERE `one_d` = 'SEC' AND( `two_d` = 'RPLC' OR `two_d` = 'IP-RPLC' OR `two_d` = 'NA-RPLC' )";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
			echo $row['author'] . '&nbsp;(' . $row['year'] . ')<br>' . '<a href="https://doi.org/' . $row['ref'] . '" target="_blank">' . $row['title'] . '</a><br>' . '<br>' . '<hr>';
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
							</div>
							<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
 							</div>
						</div>
	 				</div>
 				</div>
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Suitable for separations of proteins."><img class="fl-rgt" src="img/prt-s.png" width="25" alt=""/></a>
				</td>
		
				 <td class="score-4"><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2-</sup></a>
				 <br><a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a>
				 </td>
		
				 <td class="score0">
				 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>-</sup></a>
				 <br><a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a>
				 </td>
		
				 <td class="score-5-10"><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
				 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a>
				 <br><a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a>
				 </td>

				 <td class="score3">
				 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
				 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2+</sup></a>
				 <br><a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a>
				 </td>
		
				<td class="score-4">
				 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2-</sup></a> 
				 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>2-</sup></a>
				 <br>&nbsp;
				 </td>
		
				<td class="score-5-10">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Adsorption" data-content="Lengthening of elution time due to injection solvent. Applies exclusively to SEC.">A</a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>2-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2-</sup></a>
				<br><a data-toggle="modal" href="#ref18"><i class="fa fa-file-text-o" style="color:black;"></i></a>
 				<!-- Modal -->
 				<div class="modal fade" id="ref18" role="dialog">
 					<div class="modal-dialog">
					 <!-- Modal content-->
					 <div class="modal-content">
						 <div class="modal-header">
						 <button type="button" class="close" data-dismiss="modal">&times;</button>
						 <h4 class="modal-title">References</h4>
						 </div>
						 <div class="modal-body">
						 <?php
								// Attempt select query execution
$sql = "SELECT * FROM `2dlc` WHERE `one_d` = 'SEC' AND `two_d` = 'SEC'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
			echo $row['author'] . '&nbsp;(' . $row['year'] . ')<br>' . '<a href="https://doi.org/' . $row['ref'] . '" target="_blank">' . $row['title'] . '</a><br>' . '<br>' . '<hr>';
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
						 </div>
						 <div class="modal-footer">
						 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						 </div>
					</div>
				 </div>
			 </div>
			 </td>
		
			 <td class="score-1">
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2-</sup></a> 
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2-</sup></a>
			 <br>&nbsp;
			 </td>
		
			<td class="score2">
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a>
			 <br>&nbsp;</td>
			
			<td class="score3">
			<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
			<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
			<br>&nbsp;
			</td>
		
			 <td class="score4">
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Easy to modulate" data-content="Ease of developing active modulation methods (e.g. trap columns or solvent admixing).">E</a> 
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a> 
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>-</sup></a>
			 <br>&nbsp;
			 </td>
 				</tr>
 
			 	<tr>
			 <th> <h3><sup>1</sup>SEC-Or </h3>
			 <hr><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="High-resolution separation" data-content="Method capable of high peak capacity.">H<sup>2-</sup></a> 
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Suitable for separations of polymers."><img src="img/plm-s.png" width="25" alt=""/></a>
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Suitable for separations of proteins."><img src="img/prt-s.png" width="25" alt=""/></a>
			 </th>
		 
			 <td class="score1">
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B<sup>2-</sup></a> 
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>-</sup></a>
			<br><a data-toggle="modal" href="#ref19"><i class="fa fa-file-text-o" style="color:black;"></i></a>
 		<!-- Modal -->
 				<div class="modal fade" id="ref19" role="dialog">
					 <div class="modal-dialog">
					 <!-- Modal content-->
					 <div class="modal-content">
					 <div class="modal-header">
					 <button type="button" class="close" data-dismiss="modal">&times;</button>
					 <h4 class="modal-title">References</h4>
					 </div>
					 <div class="modal-body">
					<?php
								// Attempt select query execution
$sql = "SELECT * FROM `2dlc` WHERE `one_d` = 'SEC' AND( `two_d` = 'RPLC' OR `two_d` = 'IP-RPLC' OR `two_d` = 'NA-RPLC' )";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
			echo $row['author'] . '&nbsp;(' . $row['year'] . ')<br>' . '<a href="https://doi.org/' . $row['ref'] . '" target="_blank">' . $row['title'] . '</a><br>' . '<br>' . '<hr>';
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
					 </div>
					 <div class="modal-footer">
					 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					 </div>
					</div>
				 </div>
			 </div>
			 </td>
 
			 <td class="score0">
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> 
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
			 <br><a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a>
			 </td>
		 
			 <td class="score2">
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
			 <br><a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a>
			 </td>
		 
			 <td class="score-5-10">
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a> 
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2-</sup></a>
			 <br>&nbsp;
			 </td>
		 
			 <td class="score-2">
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a> 
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>-</sup></a>
			 <br>&nbsp;
			 </td>
		 
			 <td class="score-5-10">
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2-</sup></a> 
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>2-</sup></a> 
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>-</sup></a>
			 <br>&nbsp;
			 </td>
			 
			 <td class="score-4">
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2-</sup></a> 
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>2-</sup></a>
			<br><a data-toggle="modal" href="#ref20"><i class="fa fa-file-text-o" style="color:black;"></i></a>
 			<!-- Modal -->
 			<div class="modal fade" id="ref20" role="dialog">
				 <div class="modal-dialog">
				 <!-- Modal content-->
				 <div class="modal-content">
				 <div class="modal-header">
				 <button type="button" class="close" data-dismiss="modal">&times;</button>
				 <h4 class="modal-title">References</h4>
				 </div>
				 <div class="modal-body">
				 <?php
								// Attempt select query execution
$sql = "SELECT * FROM `2dlc` WHERE `one_d` = 'SEC' AND `two_d` = 'SEC'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
			echo $row['author'] . '&nbsp;(' . $row['year'] . ')<br>' . '<a href="https://doi.org/' . $row['ref'] . '" target="_blank">' . $row['title'] . '</a><br>' . '<br>' . '<hr>';
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
				 </div>
				 <div class="modal-footer">
				 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				 </div>
				</div>
			 </div>
		 </div>
		 </td>
 
			 <td class="score3">
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
			 <br><a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a>
			 </td>
		 
			 <td class="score2">
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2-</sup></a> 
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a>
			 <br>&nbsp;
			 </td>
			 
			 <td class="score-2">
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>2-</sup></a> 
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>-</sup></a>
			 <br>&nbsp;
			 </td>
			 
			 <td class="score5"><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a> 
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
			 <br>&nbsp;
			 </td>
			 </tr>

			 <tr>
			 <th> <h3><sup>1</sup>Ag </h3>
		 	<hr><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="High-resolution separation" data-content="Method capable of high peak capacity.">H<sup>+</sup></a>
 			<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Selectivity/Specificity" data-content="Capability of the separation method to separate based on chemical characteristics of sample components (e.g. shape, orientation, composition/ sequence)">S<sup>+</sup></a> 
 			<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Unsuitable for separations of polymers."><img src="img/plm-u.png" width="25" alt=""/></a> 
 			<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Unsuitable for separations of proteins."><img src="img/prt-u.png" width="25" alt=""/></a></th>
		 
		 	<td class="score7-9"><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> 
		 	<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a>
			<br><a data-toggle="modal" href="#ref21"><i class="fa fa-file-text-o" style="color:black;"></i></a>
 			<!-- Modal -->
 				<div class="modal fade" id="ref21" role="dialog">
					 <div class="modal-dialog">
					 <!-- Modal content-->
					 <div class="modal-content">
					 <div class="modal-header">
					 <button type="button" class="close" data-dismiss="modal">&times;</button>
					 <h4 class="modal-title">References</h4>
					 </div>
					 <div class="modal-body">
					<?php
								// Attempt select query execution
$sql = "SELECT * FROM `2dlc` WHERE `one_d` = 'AgLC' AND( `two_d` = 'RPLC' OR `two_d` = 'IP-RPLC' OR `two_d` = 'NA-RPLC' )";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
			echo $row['author'] . '&nbsp;(' . $row['year'] . ')<br>' . '<a href="https://doi.org/' . $row['ref'] . '" target="_blank">' . $row['title'] . '</a><br>' . '<br>' . '<hr>';
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
					 </div>
					 <div class="modal-footer">
					 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					 </div>
				</div>
			</div>
		</div>
		</td>
		 
		<td class="score3">
		<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
		<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
		<br><a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a></td>
		 
		<td class="score5">
		<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
		<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
		<br>&nbsp;
		</td>
		 
		<td class="score-2">
		<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
		<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a> 
		<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>-</sup></a>
		<br>&nbsp;
		</td>
		 
		<td class="score4">
		<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
		<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>-</sup></a>
		<br>&nbsp;
		</td>
		 
		<td class="score5">
		<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
		<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>-</sup></a>
		<br>&nbsp;</td>
		
		<td class="score7-9">
		<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
		<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>-</sup></a>
		<br>&nbsp;
		</td>
		 
		<td class="score-2">
		<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2-</sup></a> 
		<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>2-</sup></a>
		<br>&nbsp;
		</td>
		 
		<td class="score6">
		<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a>
		<br>&nbsp;
		</td>
		 
		<td class="score2">
		<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
		<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2-</sup></a>
		<br>&nbsp;
		</td>
		 
		<td class="score7-9">
		<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
		<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
		<br>&nbsp;
		</td>
 		</tr>
 
 				<tr>
				<th> <h3><sup>1</sup>Chiral </h3>
				<hr><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Isocratic" data-content="Possibility of (easily) running isocratic methods, reducing the complexity of the setup.">I</a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Selectivity/Specificity" data-content="Capability of the separation method to separate based on chemical characteristics of sample components (e.g. shape, orientation, composition/ sequence)">S<sup>+</sup></a>
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Unsuitable for separations of polymers."><img src="img/plm-u.png" width="25" alt=""/></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Unsuitable for separations of proteins."><img src="img/prt-u.png" width="25" alt=""/></a>
				</th>
		 
				<td class="score7-9">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a>
				<br><a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a>
				</td>
		 
				<td class="score2">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a>
				<br><a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a>
				</td>
		 
				<td class="score4">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a>
				<br><a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a>
				</td>
		
				<td class="score-3">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>2-</sup></a>
				<br>&nbsp;
				</td>
		 
		 		<td class="score4">
		 		<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a>
				<br><a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a>
				</td>
		 
				<td class="score4">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a>
				<br>&nbsp;
				</td>
		 
		 <td class="score4">
		 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
		 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a>
			 <br>&nbsp;
			 </td>
		 
		 <td class="score4">
		 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a>
			 <br>&nbsp;
			 </td>
		 
		 <td class="score-2">
		 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2-</sup></a> 
		 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>2-</sup></a>
			<br><a data-toggle="modal" href="#ref22"><i class="fa fa-file-text-o" style="color:black;"></i></a>
 		<!-- Modal -->
 				<div class="modal fade" id="ref22" role="dialog">
				 <div class="modal-dialog">
				 <!-- Modal content-->
				 <div class="modal-content">
				 <div class="modal-header">
				 <button type="button" class="close" data-dismiss="modal">&times;</button>
				 <h4 class="modal-title">References</h4>
				 </div>
				 <div class="modal-body">
				 <?php
								// Attempt select query execution
$sql = "SELECT * FROM `2dlc` WHERE `one_d` = 'Chiral' AND `two_d` = 'Chiral'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
			echo $row['author'] . '&nbsp;(' . $row['year'] . ')<br>' . '<a href="https://doi.org/' . $row['ref'] . '" target="_blank">' . $row['title'] . '</a><br>' . '<br>' . '<hr>';
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
				 </div>
				 <div class="modal-footer">
				 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				 </div>
				</div>
			</div>
		</div>
					 </td>
					<td class="score4">
					<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a>
					<br>&nbsp;</td>
						 
					<td class="score7-9">
					<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a>
					<br>&nbsp;
					</td>
				 </tr>
 
 				<tr>
				<th> <h3><sup>1</sup>Affinity </h3>
 				<hr><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="High-resolution separation" data-content="Method capable of high peak capacity.">H<sup>-</sup></a>
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Selectivity/Specificity" data-content="Capability of the separation method to separate based on chemical characteristics of sample components (e.g. shape, orientation, composition/ sequence)">S<sup>++</sup></a>
				</th>
		
				<td class="score7-9"><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
					<br><a data-toggle="modal" href="#ref23"><i class="fa fa-file-text-o" style="color:black;"></i></a>
				<!-- Modal -->
						<div class="modal fade" id="ref23" role="dialog">
					 <div class="modal-dialog">
					 <!-- Modal content-->
					 <div class="modal-content">
					 <div class="modal-header">
					 <button type="button" class="close" data-dismiss="modal">&times;</button>
					 <h4 class="modal-title">References</h4>
					 </div>
					 <div class="modal-body">
					 <?php
								// Attempt select query execution
$sql = "SELECT * FROM `2dlc` WHERE `one_d` = 'Affinity' AND( `two_d` = 'RPLC' OR `two_d` = 'IP-RPLC' OR `two_d` = 'NA-RPLC' )";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
			echo $row['author'] . '&nbsp;(' . $row['year'] . ')<br>' . '<a href="https://doi.org/' . $row['ref'] . '" target="_blank">' . $row['title'] . '</a><br>' . '<br>' . '<hr>';
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
					 </div>
					 <div class="modal-footer">
					 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					 </div>
					</div>
				 </div>
			 </div>
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a>
			 </td>
		
				<td class="score-2">
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> 
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a> 
			 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>-</sup></a>
			 <br><a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a>
			 </td>
		
				<td class="score1">
				 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a> 
				 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a> 
				 <br><a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a>
				 </td>

				<td class="score-2">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a> 
				<br><a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a>
				</td>

				<td class="score2">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
				<br>&nbsp;
				</td>
		
				<td class="score4">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
				<br>&nbsp;
				</td>
		
				<td class="score-3">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Adsorption" data-content="Lengthening of elution time due to injection solvent. Applies exclusively to SEC.">A</a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>2-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2-</sup></a>
				<br>&nbsp;
				</td>
		
				<td class="score0"><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">B</a>
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>-</sup></a>
				<br>&nbsp;
				</td>
		
				<td class="score3">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a>
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a> 
				<br><a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a>
				</td>
		
				<td class="score-3">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>-</sup></a>
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>2-</sup></a> 
				<br>&nbsp;
				</td>

				<td class="score2">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2-</sup></a>
				<br><a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a>
				</td>
				</tr>
				 
				<tr>
				<th> <h3><sup>1</sup>SFC
				 </h3><hr><a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="High-resolution separation" data-content="Method capable of high peak capacity.">H<sup>+</sup></a>
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Unsuitable for separations of polymers."><img src="img/plm-u.png" width="25" alt=""/></a>
 				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Unsuitable for separations of proteins."><img src="img/prt-u.png" width="25" alt=""/></a>
 				</th>
		
				<td class="score7-9">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Easy to modulate" data-content="Ease of developing active modulation methods (e.g. trap columns or solvent admixing).">E</a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
				<br><a data-toggle="modal" href="#ref24"><i class="fa fa-file-text-o" style="color:black;"></i></a>
 				<!-- Modal -->
 				<div class="modal fade" id="ref24" role="dialog">
 				<div class="modal-dialog">
				<!-- Modal content-->
					<div class="modal-content">
 						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">References</h4>
 						</div>
 						<div class="modal-body">
 						<?php
								// Attempt select query execution
$sql = "SELECT * FROM `2dlc` WHERE `one_d` = 'SFC' AND( `two_d` = 'RPLC' OR `two_d` = 'IP-RPLC' OR `two_d` = 'NA-RPLC' )";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
			echo $row['author'] . '&nbsp;(' . $row['year'] . ')<br>' . '<a href="https://doi.org/' . $row['ref'] . '" target="_blank">' . $row['title'] . '</a><br>' . '<br>' . '<hr>';
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
 						</div>
 						<div class="modal-footer">
 						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
 						</div>
					</div>
	 			</div>
 			</div>
 			</td>
		
				<td class="score-1">
				 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>-</sup></a> 
				 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
				 <br><a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a>
				 </td>
		
				<td class="score0">
				 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Easy to modulate" data-content="Ease of developing active modulation methods (e.g. trap columns or solvent admixing).">E</a> 
				 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>-</sup></a>
				 <br><a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a>
				 </td>

				<td class="score-4">
				 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				 <a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>3-</sup></a>
				 <br>&nbsp;
				 </td>
		
				<td class="score4">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
				<br>&nbsp;
				</td>

				<td class="score2">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">P<sup>2-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2+</sup></a>
				<br><a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a>
				</td>

				<td class="score6">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2+</sup></a>
				<br><a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a>
				</td>
		
				<td class="score3">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>+</sup></a>
				<br><a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a>
				</td>

				<td class="score4">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a>
				<br>&nbsp;
				</td>
		
				<td class="score2">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>2+</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>-</sup></a>
				<br>&nbsp;
				</td>

				<td class="score6">
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Easy to modulate" data-content="Ease of developing active modulation methods (e.g. trap columns or solvent admixing).">E</a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">O<sup>-</sup></a> 
				<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">X<sup>2+</sup></a>
				<br><a data-toggle="modal" href="#ref25"><i class="fa fa-file-text-o" style="color:black;"></i></a>
						<!-- Modal -->
				<div class="modal fade" id="ref25" role="dialog">
				 <div class="modal-dialog">
				 <!-- Modal content-->
				 <div class="modal-content">
				 <div class="modal-header">
				 <button type="button" class="close" data-dismiss="modal">&times;</button>
				 <h4 class="modal-title">References</h4>
				 </div>
				 <div class="modal-body">
				<?php
								// Attempt select query execution
$sql = "SELECT * FROM `2dlc` WHERE `one_d` = 'SFC' AND `two_d` = 'SFC'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
			echo $row['author'] . '&nbsp;(' . $row['year'] . ')<br>' . '<a href="https://doi.org/' . $row['ref'] . '" target="_blank">' . $row['title'] . '</a><br>' . '<br>' . '<hr>';
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
				 </div>
				 <div class="modal-footer">
				 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				 </div>
						</div>
	 				</div>
 				</div>
 				</td>
 				</tr>
 				</tbody>
				</table>
							</div>
						</div><!-- /.site-content -->
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section>
	</div>
</div>

<div class="clearfix"></div>

<!--======================================
    Footer Section
========================================-->

<section class="footer-copyright">
    <div class="container">
        <div class="row padding-top-20 padding-bottom-10 ">
            <div class="col-md-6 text-left">
				<img src="wp-content/uploads/2019/01/Untitled-1.png" alt="">
				<p></p>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
</section>
	
	<!-- script to call modal !-->
 	<script>
		$(document).ready(function(){
 	$("#ref").modal();
 	});
	</script>
	
	<!-- script to call popover !-->
	<script>
	$(function () {
 $('[data-toggle="popover"]').popover()
})
	</script>

</body>
</html>