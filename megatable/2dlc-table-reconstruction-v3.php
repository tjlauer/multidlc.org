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
				<tbody id="pirokTable">
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
				
 				</tbody>
				</table>
				<?php
					$sqlOneDSelectors = array(
					"( `one_d` = 'RPLC' OR `one_d` = 'IP-RPLC' OR `one_d` = 'NA-RPLC' )",
					"( `one_d` = 'NPLC' OR `one_d` = 'IP-RPLC' OR `one_d` = 'NA-RPLC' )",
					"`one_d` = 'HILIC'",
					"`one_d` = 'HIC'",
					"( `one_d` = 'IEX' OR `one_d` = 'SCX' OR `one_d` = 'WCX' OR `one_d` = 'SAX' )",
					"`one_d` = 'SEC'",
					"`one_d` = 'SEC'",
					"`one_d` = 'AgLC'",
					"`one_d` = 'Chiral'",
					"`one_d` = 'Affinity'",
					"`one_d` = 'SFC'"
					);
					
					$sqlTwoDSelectors = array(
					"( `two_d` = 'RPLC' OR `two_d` = 'IP-RPLC' OR `two_d` = 'NA-RPLC' )",
					"( `two_d` = 'NPLC' OR `two_d` = 'IP-RPLC' OR `two_d` = 'NA-RPLC' )",
					"`two_d` = 'HILIC'",
					"`two_d` = 'HIC'",
					"( `two_d` = 'IEX' OR `two_d` = 'SCX' OR `two_d` = 'WCX' OR `two_d` = 'SAX' )",
					"`two_d` = 'SEC'",
					"`two_d` = 'SEC'",
					"`two_d` = 'AgLC'",
					"`two_d` = 'Chiral'",
					"`two_d` = 'Affinity'",
					"`two_d` = 'SFC'"
					);
					
					
					$code = array();
					
					foreach ($sqlOneDSelectors as $sqlOneD) {
						$codeTemp = array();
						foreach ($sqlTwoDSelectors as $sqlTwoD) {
							//echo "$sqlOneD AND $sqlTwoD <br>";
							$sql = "SELECT * FROM `2dlc` WHERE $sqlOneD AND $sqlTwoD";
							if($result = mysqli_query($link, $sql)){
								$resultTable = "";
								if(mysqli_num_rows($result) > 0){
									while($row = mysqli_fetch_array($result)){
										$resultTable = $resultTable . $row['author'] . '&nbsp;(' . $row['year'] . ')<br>' . '<a href="https://doi.org/' . $row['ref'] . '" target="_blank">' . $row['title'] . '</a><br>' . '<br>' . '<hr>';
									}
									// Free result set
									mysqli_free_result($result);
								} //else{
									//$resultTable = "No records matching your query were found.";
								//}
								array_push($codeTemp,$resultTable);
							} else {
								array_push($codeTemp,"ERROR! Please contact the website admin.");
							}
						}
						array_push($code,$codeTemp);
					}
					
					//print_r($code);
				?>
				
				<script type="text/javascript">
					
					var cellSymbolScores = {
						//"Compound Name": [ln kw intercept, ln kw slope, S intercept, S slope],
						"A": 0,
						"A+": 0,
						"A-": 0,
						"A2+": 0,
						"A2-": 0,
						
						"B": 0,
						"B+": 0,
						"B-": 0,
						"B2+": 0,
						"B2-": 0,
						
						"E": 0,
						"E+": 0,
						"E-": 0,
						"E2+": 0,
						"E2-": 0,
						
						"F": 0,
						"F+": 0,
						"F-": 0,
						"F2+": 0,
						"F2-": 0,
						
						"H": 1,
						"H+": 1,
						"H-": 1,
						"H2+": 1,
						"H2-": 1,
						
						"I": 0,
						"I+": 0,
						"I-": 0,
						"I2+": 0,
						"I2-": 0,
						
						"M": 0,
						"M+": 0,
						"M-": 0,
						"M2+": 0,
						"M2-": 0,
						
						"O": 0,
						"O+": 0,
						"O-": 0,
						"O2+": 0,
						"O2-": 0,
						
						"P": 0,
						"P+": 0,
						"P-": 0,
						"P2+": 0,
						"P2-": 0,
						
						"Q": 0,
						"Q+": 0,
						"Q-": 0,
						"Q2+": 0,
						"Q2-": 0,
						
						"S": 0,
						"S+": 0,
						"S-": 0,
						"S2+": 0,
						"S2-": 0,
						
						"X": 0,
						"X+": 0,
						"X-": 0,
						"X2+": 0,
						"X2-": 0,
						
						"REV": 0,
						
						"plm-s": 0,
						"plm-u": 0,
						
						"prt-s": 0,
						"prt-u": 0,
					}
					
					rowNames = ["RP","NP","HILIC","HIC","IEX","SEC-Aq","SEC-Or","Ag","Chiral","Affinity","SFC"];
					
					var symbolsList = {
						"r0": ["H2+","plm-s"],
						"r1": [],
						"r2": [],
						"r3": [],
						"r4": [],
						"r5": [],
						"r6": [],
						"r7": [],
						"r8": [],
						"r9": [],
						"r10": [],
						//"cellID": [symbols],
						"r0_c0": ["E","O+","P+","X+"],
						"r0_c1": ["B","O2+","X2-"],
						"r0_c2": ["B","O2+","X+","REV"],
						"r0_c3": ["B","E","O-","P-","X+"],
						"r0_c4": ["O+"],
						"r0_c5": ["A","E","O+","P+","X+","plm-s"],
						"r0_c6": ["A","E","O+"],
						"r0_c7": ["B","O2+","X-"],
						"r0_c8": ["O2+"],
						"r0_c9": ["O2+","X+"],
						"r0_c10": ["B","O2+","X-"],
						"r1_c0": [],
						"r1_c1": [],
						"r1_c2": [],
						"r1_c3": [],
						"r1_c4": [],
						"r1_c5": [],
						"r1_c6": [],
						"r1_c7": [],
						"r1_c8": [],
						"r1_c9": [],
						"r1_c10": [],
						"r2_c0": [],
						"r2_c1": [],
						"r2_c2": [],
						"r2_c3": [],
						"r2_c4": [],
						"r2_c5": [],
						"r2_c6": [],
						"r2_c7": [],
						"r2_c8": [],
						"r2_c9": [],
						"r2_c10": [],
						"r3_c0": [],
						"r3_c1": [],
						"r3_c2": [],
						"r3_c3": [],
						"r3_c4": [],
						"r3_c5": [],
						"r3_c6": [],
						"r3_c7": [],
						"r3_c8": [],
						"r3_c9": [],
						"r3_c10": [],
						"r4_c0": [],
						"r4_c1": [],
						"r4_c2": [],
						"r4_c3": [],
						"r4_c4": [],
						"r4_c5": [],
						"r4_c6": [],
						"r4_c7": [],
						"r4_c8": [],
						"r4_c9": [],
						"r4_c10": [],
						"r5_c0": [],
						"r5_c1": [],
						"r5_c2": [],
						"r5_c3": [],
						"r5_c4": [],
						"r5_c5": [],
						"r5_c6": [],
						"r5_c7": [],
						"r5_c8": [],
						"r5_c9": [],
						"r5_c10": [],
						"r6_c0": [],
						"r6_c1": [],
						"r6_c2": [],
						"r6_c3": [],
						"r6_c4": [],
						"r6_c5": [],
						"r6_c6": [],
						"r6_c7": [],
						"r6_c8": [],
						"r6_c9": [],
						"r6_c10": [],
						"r7_c0": [],
						"r7_c1": [],
						"r7_c2": [],
						"r7_c3": [],
						"r7_c4": [],
						"r7_c5": [],
						"r7_c6": [],
						"r7_c7": [],
						"r7_c8": [],
						"r7_c9": [],
						"r7_c10": [],
						"r8_c0": [],
						"r8_c1": [],
						"r8_c2": [],
						"r8_c3": [],
						"r8_c4": [],
						"r8_c5": [],
						"r8_c6": [],
						"r8_c7": [],
						"r8_c8": [],
						"r8_c9": [],
						"r8_c10": [],
						"r9_c0": [],
						"r9_c1": [],
						"r9_c2": [],
						"r9_c3": [],
						"r9_c4": [],
						"r9_c5": [],
						"r9_c6": [],
						"r9_c7": [],
						"r9_c8": [],
						"r9_c9": [],
						"r9_c10": [],
						"r10_c0": [],
						"r10_c1": [],
						"r10_c2": [],
						"r10_c3": [],
						"r10_c4": [],
						"r10_c5": [],
						"r10_c6": [],
						"r10_c7": [],
						"r10_c8": [],
						"r10_c9": [],
						"r10_c10": [],
					}
					
					/*var symbolsList = {
						//"cellID": [symbols],
						"r0_c0": ["E","O+","P+","X+"],
						"r0_c1": ["B","O2+","X2-"],
						"r0_c2": ["B","O2+","X+"]
					}*/
					
					function checkForSymbol(symbols, spacerState, sym){
						
						if(spacerState == 1){ spacer = " "; } else { spacer = ""; }
						
						if(symbols.includes(sym)){
							return [spacer+sym,cellSymbolScores[sym]];
						} else if(symbols.includes(sym+"+")){
							return [spacer+sym+"<sup>+</sup>",cellSymbolScores[sym+"+"]];
						} else if(symbols.includes(sym+"-")){
							return [spacer+sym+"<sup>-</sup>",cellSymbolScores[sym+"-"]];
						} else if(symbols.includes(sym+"2+")){
							return [spacer+sym+"<sup>2+</sup>",cellSymbolScores[sym+"2+"]];
						} else if(symbols.includes(sym+"2-")){
							return [spacer+sym+"<sup>2-</sup>",cellSymbolScores[sym+"2-"]];
						} else {
							return ["NULL",0];
						}
					}
					
					function getSymbolCode(symbolCode, score, spacerState, cellSymbols, sym){
						
						if(sym == "A"){
							checkForSymbolResult = checkForSymbol(cellSymbols, spacerState, sym);
							if(checkForSymbolResult[0] != "NULL"){
								score += checkForSymbolResult[1]; spacerState = 1;
								symbolCode = symbolCode+'<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Adsorption" data-content="Lengthening of elution time due to injection solvent. Applies exclusively to SEC.">'+checkForSymbolResult[0]+'</a>';
							}
						} else if(sym == "B"){
							checkForSymbolResult = checkForSymbol(cellSymbols, spacerState, sym);
							if(checkForSymbolResult[0] != "NULL"){
								score += checkForSymbolResult[1]; spacerState = 1;
								symbolCode = symbolCode+'<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">'+checkForSymbolResult[0]+'</a>';
							}
						} else if(sym == "E"){
							checkForSymbolResult = checkForSymbol(cellSymbols, spacerState, sym);
							if(checkForSymbolResult[0] != "NULL"){
								score += checkForSymbolResult[1]; spacerState = 1;
								symbolCode = symbolCode+'<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Easy to modulate" data-content="Ease of developing active modulation methods (e.g. trap columns or solvent admixing).">'+checkForSymbolResult[0]+'</a>';
							}
						} else if(sym == "F"){
							checkForSymbolResult = checkForSymbol(cellSymbols, spacerState, sym);
							if(checkForSymbolResult[0] != "NULL"){
								score += checkForSymbolResult[1]; spacerState = 1;
								symbolCode = symbolCode+'';
							}
						} else if(sym == "H"){
							checkForSymbolResult = checkForSymbol(cellSymbols, spacerState, sym);
							if(checkForSymbolResult[0] != "NULL"){
								score += checkForSymbolResult[1]; spacerState = 1;
								symbolCode = symbolCode+'H';
							}
						} else if(sym == "I"){
							checkForSymbolResult = checkForSymbol(cellSymbols, spacerState, sym);
							if(checkForSymbolResult[0] != "NULL"){
								score += checkForSymbolResult[1]; spacerState = 1;
								symbolCode = symbolCode+'';
							}
						} else if(sym == "M"){
							checkForSymbolResult = checkForSymbol(cellSymbols, spacerState, sym);
							if(checkForSymbolResult[0] != "NULL"){
								score += checkForSymbolResult[1]; spacerState = 1;
								symbolCode = symbolCode+'';
							}
						} else if(sym == "O"){
							checkForSymbolResult = checkForSymbol(cellSymbols, spacerState, sym);
							if(checkForSymbolResult[0] != "NULL"){
								score += checkForSymbolResult[1]; spacerState = 1;
								symbolCode = symbolCode+'<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Orthogonal" data-content="Degree of independence of two separation mechanisms, assuming that the analyte mixture exhibits sample dimensions targeted by the two dimensions.">'+checkForSymbolResult[0]+'</a>';
							}
						} else if(sym == "P"){
							checkForSymbolResult = checkForSymbol(cellSymbols, spacerState, sym);
							if(checkForSymbolResult[0] != "NULL"){
								score += checkForSymbolResult[1]; spacerState = 1;
								symbolCode = symbolCode+'<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">'+checkForSymbolResult[0]+'</a>';
							}
						} else if(sym == "Q"){
							checkForSymbolResult = checkForSymbol(cellSymbols, spacerState, sym);
							if(checkForSymbolResult[0] != "NULL"){
								score += checkForSymbolResult[1]; spacerState = 1;
								symbolCode = symbolCode+'';
							}
						} else if(sym == "S"){
							checkForSymbolResult = checkForSymbol(cellSymbols, spacerState, sym);
							if(checkForSymbolResult[0] != "NULL"){
								score += checkForSymbolResult[1]; spacerState = 1;
								symbolCode = symbolCode+'';
							}
						} else if(sym == "X"){
							checkForSymbolResult = checkForSymbol(cellSymbols, spacerState, sym);
							if(checkForSymbolResult[0] != "NULL"){
								score += checkForSymbolResult[1]; spacerState = 1;
								symbolCode = symbolCode+'<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">'+checkForSymbolResult[0]+'</a>';
							}
						} else if(sym == "REV"){
							if(cellSymbols.includes("REV")){
								score += cellSymbolScores["REV"];
								symbolCode = symbolCode+'<a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a>'
							}
						} else if(sym == "plm-s"){
							if(cellSymbols.includes("plm-s")){
								score += cellSymbolScores["plm-s"];
								symbolCode = symbolCode+'<a tabindex="0" role="button" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="Suitable for separations of proteins."><img class="fl-rgt" src="img/plm-s.png" width="25" alt=""/></a>'
							}
						} else if(sym == "plm-u"){
							
						} else if(sym == "prt-s"){
							
						} else if(sym == "prt-u"){
							
						}
						
						return [symbolCode, score, spacerState];
						
					}
					
					
					
					// Get the existing code for the column headers
					tableCode = document.getElementById("pirokTable").innerHTML;
					
					codeToAppend = "";
					
					cellIndex = 0;
					
					var phpCodeArray=<?php echo json_encode($code); ?>;
					
					// Loop through all the row names
					for(var row = 0; row < rowNames.length; row++){
						
						// Open up the row
						code = "<tr>";
						
						// Add to row header
						code = code+"<th><h3><sup>1</sup>"+rowNames[row]+"</h3><hr>";
						
						rowScore = 0;
						spacerState = 0;
						
						baseSymbols = ["A","B","E","F","H","I","M","O","P","Q","S","X","REV","plm-s","plm-u","prt-s","prt-u"];
						
						for(baseSymbolNum = 0; baseSymbolNum < baseSymbols.length; baseSymbolNum++){
							baseSymbol = baseSymbols[baseSymbolNum];
							//console.log("baseSymbol = "+baseSymbol);
							
							getSymbolCodeResult = getSymbolCode(code, rowScore, spacerState, symbolsList["r"+row], baseSymbol);
							code = getSymbolCodeResult[0]; rowScore = getSymbolCodeResult[1]; spacerState = getSymbolCodeResult[2];
							
						}
						console.log("rowScore = "+rowScore);
						
						code = code+"</th>";
						
						// Loop through all columns
						for(var col = 0; col < 11; col++){
							cellID = "r"+row+"_c"+col;
							
							cellSymbols = symbolsList[cellID];
							
							//console.log("cellIndex = "+cellIndex);
							
							//console.log("cellID = "+cellID);
							symbolCode = "";
							score = 0;
							
							spacerState = 0;
							
							checkForSymbolResult = checkForSymbol(cellSymbols, spacerState, "A");
							if(checkForSymbolResult[0] != "NULL"){
								score += checkForSymbolResult[1]; spacerState = 1;
								symbolCode = symbolCode+'<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Adsorption" data-content="Lengthening of elution time due to injection solvent. Applies exclusively to SEC.">'+checkForSymbolResult[0]+'</a>';
							}
							
							checkForSymbolResult = checkForSymbol(cellSymbols, spacerState, "B");
							if(checkForSymbolResult[0] != "NULL"){
								score += checkForSymbolResult[1]; spacerState = 1;
								symbolCode = symbolCode+'<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Breakthrough/Peak distortion" data-content="Anomalous early elution of analytes injected from 1D to 2D.">'+checkForSymbolResult[0]+'</a>';
							}
							
							checkForSymbolResult = checkForSymbol(cellSymbols, spacerState, "E");
							if(checkForSymbolResult[0] != "NULL"){
								score += checkForSymbolResult[1]; spacerState = 1;
								symbolCode = symbolCode+'<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Easy to modulate" data-content="Ease of developing active modulation methods (e.g. trap columns or solvent admixing).">'+checkForSymbolResult[0]+'</a>';
							}
							
							checkForSymbolResult = checkForSymbol(cellSymbols, spacerState, "F");
							if(checkForSymbolResult[0] != "NULL"){
								score += checkForSymbolResult[1]; spacerState = 1;
								symbolCode = symbolCode+'';
							}
							
							checkForSymbolResult = checkForSymbol(cellSymbols, spacerState, "H");
							if(checkForSymbolResult[0] != "NULL"){
								score += checkForSymbolResult[1]; spacerState = 1;
								symbolCode = symbolCode+'';
							}
							
							checkForSymbolResult = checkForSymbol(cellSymbols, spacerState, "I");
							if(checkForSymbolResult[0] != "NULL"){
								score += checkForSymbolResult[1]; spacerState = 1;
								symbolCode = symbolCode+'';
							}
							
							checkForSymbolResult = checkForSymbol(cellSymbols, spacerState, "M");
							if(checkForSymbolResult[0] != "NULL"){
								score += checkForSymbolResult[1]; spacerState = 1;
								symbolCode = symbolCode+'';
							}
							
							getSymbolCodeResult = getSymbolCode(symbolCode, score, spacerState, cellSymbols, "O");
							symbolCode = getSymbolCodeResult[0]; score = getSymbolCodeResult[1]; spacerState = getSymbolCodeResult[2];
							
							checkForSymbolResult = checkForSymbol(cellSymbols, spacerState, "P");
							if(checkForSymbolResult[0] != "NULL"){
								score += checkForSymbolResult[1]; spacerState = 1;
								symbolCode = symbolCode+'<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Applicability" data-content="Usefulness of the resulting separation.">'+checkForSymbolResult[0]+'</a>';
							}
							
							checkForSymbolResult = checkForSymbol(cellSymbols, spacerState, "Q");
							if(checkForSymbolResult[0] != "NULL"){
								score += checkForSymbolResult[1]; spacerState = 1;
								symbolCode = symbolCode+'';
							}
							
							checkForSymbolResult = checkForSymbol(cellSymbols, spacerState, "S");
							if(checkForSymbolResult[0] != "NULL"){
								score += checkForSymbolResult[1]; spacerState = 1;
								symbolCode = symbolCode+'';
							}
							
							checkForSymbolResult = checkForSymbol(cellSymbols, spacerState, "X");
							if(checkForSymbolResult[0] != "NULL"){
								score += checkForSymbolResult[1]; spacerState = 1;
								symbolCode = symbolCode+'<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Solvent compatibility" data-content="Extent of (in)compatibility of 1D effluent and 2D eluent.">'+checkForSymbolResult[0]+'</a>';
							}
							
							symbolCode = symbolCode+'<br>&nbsp;';
							
							phpCode = ""
							if(phpCodeArray[row] != undefined){
								if(phpCodeArray[row][col] != undefined && phpCodeArray[row][col] != ""){
									phpCode += '<a data-toggle="modal" href="#ref'+cellIndex+'"><i class="fa fa-file-text-o" style="color:black;"></i></a>'
									phpCode += '<div class="modal fade" id="ref'+cellIndex+'" role="dialog">'
									phpCode += '<div class="modal-dialog">'
									phpCode += '<div class="modal-content">'
									phpCode += '<div class="modal-header">'
									phpCode += '<button type="button" class="close" data-dismiss="modal">&times;</button>'
									phpCode += '<h4 class="modal-title">References</h4>'
									phpCode += '</div>'
									phpCode += '<div class="modal-body">'
									phpCode += phpCodeArray[row][col];
									phpCode += '</div>'
									phpCode += '<div class="modal-footer">'
									phpCode += '<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>'
									phpCode += '</div>'
									phpCode += '</div>'
									phpCode += '</div>'
									phpCode += '</div>'
								}
							}
							
							//console.log(phpCode)
							
							symbolCode = symbolCode+phpCode;
							
							if(cellSymbols.includes("REV")){
								score += cellSymbolScores["REV"];
								symbolCode = symbolCode+'<a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a>'
							}
							
							if(cellSymbols.includes("plm-s")){
								score += cellSymbolScores["plm-s"];
								symbolCode = symbolCode+'<a tabindex="0" role="button" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="Suitable for separations of proteins."><img class="fl-rgt" src="img/plm-s.png" width="25" alt=""/></a>'
							}
							
							//console.log("score = "+score);
							
							code = code+"<td id='"+cellID+"' class='score"+score+"'>"
							
							code = code+symbolCode;
							
							code = code+"</td>"
							cellIndex++;
							//console.log("");
						}
						
						// Close out the row
						code = code+"</tr>";
						//console.log(code);
						
						// Add row code to total code cache
						codeToAppend = codeToAppend + code;
						
					}
					
					//console.log(codeToAppend);
					
					// Append the generated code to the existing code
					document.getElementById("pirokTable").innerHTML = tableCode + codeToAppend;
					
				</script>
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