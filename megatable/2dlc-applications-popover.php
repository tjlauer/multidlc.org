<?php
require_once 'dbconfig.php';
 
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
 
    $sql = 'SELECT id, application, category, coupling, mode, modulation, one_d, two_d, detection, ref, author, year
               FROM 2DLC
              ORDER BY id';
 
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
<!doctype html>
<html lang="en-GB">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Pirok Analytical - 2D-LC Applications</title>

<meta name="robots" content="Pirok Analytical, 2D-LC, Applications">

<link rel="stylesheet" id="wp-block-library-css" href="http://pirok-analytical.com/wp-includes/css/dist/block-library/style.min.css?ver=5.0.3" media="all">
<link rel="stylesheet" id="style-css" href="http://pirok-analytical.com/wp-content/themes/specia-standard/style.css?ver=5.0.3" media="all">
<link rel="stylesheet" id="owl-carousel-css" href="http://pirok-analytical.com/wp-content/themes/specia-standard/css/owl.carousel.css?ver=5.0.3" media="all">
<link rel="stylesheet" id="bootstrap-css" href="http://pirok-analytical.com/wp-content/themes/specia-standard/css/bootstrap.css?ver=5.0.3" media="all">
<link rel="stylesheet" id="owl-carousel-theme-css" href="http://pirok-analytical.com/wp-content/themes/specia-standard/css/owl.theme.default.min.css?ver=5.0.3" type="text/css" media="all">
<link rel="stylesheet" id="specia-widget-css" href="http://pirok-analytical.com/wp-content/themes/specia-standard/css/nifty/widget.css?ver=5.0.3" type="text/css" media="all">
<link rel="stylesheet" id="specia-hover-css" href="http://pirok-analytical.com/wp-content/themes/specia-standard/css/hover.css?ver=5.0.3" type="text/css" media="all">
<link rel="stylesheet" id="specia-media-query-css" href="http://pirok-analytical.com/wp-content/themes/specia-standard/css/media-query.css?ver=5.0.3" type="text/css" media="all">
<link rel="stylesheet" id="animate-css" href="http://pirok-analytical.com/wp-content/themes/specia-standard/css/animate.min.css?ver=5.0.3" media="all">
<link rel="stylesheet" id="specia-text-rotator-css" href="http://pirok-analytical.com/wp-content/themes/specia-standard/css/text-rotator.css?ver=5.0.3" media="all">
<link rel="stylesheet" id="specia-menus-css" href="http://pirok-analytical.com/wp-content/themes/specia-standard/css/menus.css?ver=5.0.3" media="all">
<link rel="stylesheet" id="specia-layout-css" href="http://pirok-analytical.com/wp-content/themes/specia-standard/css/layout.css?ver=5.0.3" media="all">
<link rel="stylesheet" id="specia-font-awesome-css" href="http://pirok-analytical.com/wp-content/themes/specia-standard/inc/fonts/font-awesome/css/font-awesome.min.css?ver=5.0.3" media="all">
<link rel="stylesheet" id="specia-fonts-css" href="//fonts.googleapis.com/css?family=Open+Sans%3A300%2C400%2C600%2C700%2C800%7CRaleway%3A400%2C700&amp;subset=latin%2Clatin-ext" media="all">

		<!-- /css for tablesorter -->
	<link rel="stylesheet" href="css/theme.blue.css">
  	<link rel="stylesheet" href="addons/pager/jquery.tablesorter.pager.css">
  	<!-- /page style css -->
	<link href="css/color-style.css" rel="stylesheet">
	<!-- / adjusted (removed table css) typography style css -->
	<link href="css/typography.css" rel="stylesheet">
	
	<!-- /javascript for tablesorter -->
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script src="js/jquery.tablesorter.js"></script>
<script src="js/jquery.tablesorter.widgets.js"></script>
<script src="addons/pager/jquery.tablesorter.pager.js"></script>
  
  <script src="http://pirok-analytical.com/wp-includes/js/jquery/jquery.js?ver=1.12.4"></script>
<script src="http://pirok-analytical.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1"></script>
<script src="http://pirok-analytical.com/wp-content/themes/specia-standard/js/owl.carousel.min.js?ver=5.0.3"></script>
<script src="http://pirok-analytical.com/wp-content/themes/specia/js/bootstrap.min.js?ver=5.0.3"></script>
<script src="http://pirok-analytical.com/wp-content/themes/specia-standard/js/jquery.simple-text-rotator.min.js?ver=5.0.3"></script>
<script src="http://pirok-analytical.com/wp-content/themes/specia-standard/js/jquery.sticky.js?ver=5.0.3"></script>
<script src="http://pirok-analytical.com/wp-content/themes/specia-standard/js/wow.min.js?ver=5.0.3"></script>
<script src="http://pirok-analytical.com/wp-content/themes/specia-standard/js/component.js?ver=5.0.3"></script>
<script src="http://pirok-analytical.com/wp-content/themes/specia-standard/js/modernizr.custom.js?ver=5.0.3"></script>
<script src="http://pirok-analytical.com/wp-content/themes/specia-standard/js/custom.js?ver=5.0.3"></script>
<script src="http://pirok-analytical.com/wp-content/themes/specia/js/dropdown.js?ver=5.0.3"></script>
<script src="http://pirok-analytical.com/wp-content/themes/nifty-lite/js/custom.js?ver=5.0.3"></script>

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

	<a href="http://pirok-analytical.com/" rel="home">
		<img width="2000" height="636" alt="" src="http://pirok-analytical.com/wp-content/uploads/2019/01/cropped-Untitled-4.png" scale="0"></a>

<section class="header_nifty_dark">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-5 col-xs-12 contact_phone">
											</div>
			
			<div class="col-md-6 col-sm-7 spyropress-logo">
				<a class="navbar-brand" href="http://pirok-analytical.com/"></a>
			</div>

            <div class="col-md-3 col-sm-7 contact_email">
			</div>
        </div>
    </div>
</section>

<div class="clearfix"></div>
<header>
	<div class="sticky-wrapper" id="sticky-wrapper" style="height: 53px;"><nav class="navbar navbar-default nav-spyropress sticky-nav" role="navigation">
		
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
							<ul class="nav navbar-nav" id="menu-main"><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-20" id="menu-item-20"><a href="http://pirok-analytical.com">Home</a></li>
							<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-18 dropdown active" id="menu-item-18"><a href="http://pirok-analytical.com/2d-lc/">2D-LC<i class="caret"></i></a>
							<ul class="dropdown-menu">
							<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children current-menu-item current_page_item dropdown active dropdown-submenu"><a href="http://pirok-analytical.com/pirok/2dlc-applications.php">Applications <i class="caret"></i></a>
							<ul class="dropdown-menu">
							<li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="http://pirok-analytical.com/pirok/insertdata-2dlc.html">Add your own application</a></li>
							</ul>
							</li>
							<li class="menu-item menu-item-type-post_type menu-item-object-page page_item"><a href="http://pirok-analytical.com/modulation/">Modulation</a></li>
							<li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="http://pirok-analytical.com/pirok/2dlc-table.php">Opportunities and Challenges</a></li>
							</ul>
							</li>
							<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-19" id="menu-item-19"><a href="http://pirok-analytical.com/research/">Research</a></li>
							<li class="menu-item menu-item-type-post_type menu-item-object-page page_item page-item-14 menu-item-21" id="menu-item-21"><a href="http://pirok-analytical.com/">About</a></li>
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
				</div>
			</div>
		</nav>
	</div>
</header>

<div class="clearfix"></div>	
<div class="site-content" id="content" role="main">
<!--======================================
   BreadCrumb Section
========================================-->

<section class="page-wrapper">
	<div class="container">
		<div class="row padding-top-60 padding-bottom-60">		
			<div class="col-md-12">			
				<div class="site-content">
				<img src="img/logos.png" alt="">
				<p>&nbsp;</p>
				<h3>Overview of 2D-LC applications from 2011 until present</h3>
				<p>We are in the process of expanding the database backwards in time. Please use the contact button or special form to notify us of any mistakes or a method we might have missed.</p>

				<p><strong>Modulation:</strong> Passive modulation = empty loops, ASM = Active-solvent modulation, EM = Evaporation membrane, FSM = Fixed-solvent modulation, SPAM = Stationary-phase-assisted modulation, VEM = Vacuum-evaporation modulation.
				<br><strong>Detection:</strong> CAD = charged-aerosol detection, ELSD = evaporative light-scattering detection, FLD = fluorescence detection, LS = light scattering, MS = mass spectrometry, RID = refractive-index detection, VI = viscometry. LS, RID, and VI are typically combined to obtain &#8220;triple detection&#8221;.</p>
            	<button type="button" class="toggle">Disable pager</button>
            	<button type="button" class="reset" style="float: right">Reset filter</button>
				<br><br>
				
				<div class="pager">
				Page: <select class="gotoPage"></select>
				<img src="addons/pager/icons/first.png" class="first" alt="First" title="First page" />
				<img src="addons/pager/icons/prev.png" class="prev" alt="Prev" title="Previous page" />
				<span class="pagedisplay"></span> <!-- this can be any element, including an input -->
				<img src="addons/pager/icons/next.png" class="next" alt="Next" title="Next page" />
				<img src="addons/pager/icons/last.png" class="last" alt="Last" title= "Last page" />
				<select class="pagesize">
					<option value="10">10</option>
					<option value="20">20</option>
					<option value="30">30</option>
					<option value="40">40</option>
				</select>
				</div>
            	
            	<table class="tablesorter">
            		<thead>
    					<tr>
						<th class="application" data-placeholder="Search">Application</th>
						<th class="category filter-select" data-placeholder="Select category">Category</th>
						<th class="coupling filter-select" data-placeholder="Select coupling">Coupling</th>
						<th class="mode filter-select" data-placeholder="Select mode">Mode</th>
						<th class="modulation filter-select" data-placeholder="Select modulation">Modulation</th>
						<th class="1D filter-select" data-placeholder="Select 1D">1D</th>
						<th class="2D filter-select" data-placeholder="Select 2D">2D</th>
						<th class="detection filter-select" data-placeholder="Select detection">Detection</th>
						<th class="reference" data-placeholder="Search">Reference</th>
						<th class="year filter-select" data-placeholder="Select year">Year</th>
						</tr>
  					</thead>
				
                	<tbody>
						<?php while ($row = $q->fetch()): ?>
						<tr>
						<td><?php echo htmlspecialchars($row['application']); ?></td>
						<td><?php echo htmlspecialchars($row['category']); ?></td>
						<td><?php echo htmlspecialchars($row['coupling']); ?></td>
						<td><?php echo htmlspecialchars($row['mode']); ?></td>
						<td><?php echo htmlspecialchars($row['modulation']); ?></td>
						<td><?php echo htmlspecialchars($row['one_d']) ?></td>
						<td><?php echo htmlspecialchars($row['two_d']); ?></td>
						<td><a href="#" class="hover" id="<?php echo $row['title']; ?>"><?php echo $row['detection']; ?></a></td>
						<td><a href="https://doi.org/<?php echo urlencode ($row['ref']); ?>" data-toggle="tooltip" data-placement="auto top" title="<?php echo ($row['title']); ?>" target="_blank"><?php echo $row['author'] ?></a></td>
						<td><?php echo htmlspecialchars($row['year']); ?></td>
						</tr>
						<?php endwhile; ?>
                	</tbody>
					</table>
				
				<a href="#" data-toggle="tooltip" title="Hooray!">Hover over me</a>
				
					<div class="pager">	
					Page: <select class="gotoPage"></select>		
					<img src="addons/pager/icons/first.png" class="first" alt="First" title="First page" />
					<img src="addons/pager/icons/prev.png" class="prev" alt="Prev" title="Previous page" />
					<span class="pagedisplay"></span> <!-- this can be any element, including an input -->
					<img src="addons/pager/icons/next.png" class="next" alt="Next" title="Next page" />
					<img src="addons/pager/icons/last.png" class="last" alt="Last" title= "Last page" />
					<select class="pagesize">
						<option value="10">10</option>
						<option value="20">20</option>
						<option value="30">30</option>
						<option value="40">40</option>
					</select>
					</div>
		
				</div>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section>

<!--======================================
    Footer Section
========================================-->
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
				<img src="http://pirok-analytical.com/wp-content/uploads/2019/01/Untitled-1.png" scale="0">
								                <p></p>
            </div>
            <div class="col-md-6">
			</div>
        </div>
    </div>
</section>

<!--======================================
    Top Scroller
========================================-->
		<a class="top-scroll proficient-scroll" href="#"><i class="fa fa-chevron-up"></i></a> 
	
	<div style="display:none"></div>
<script>
			$(function() {

  var $table = $('table'),
  // define pager options
  pagerOptions = {
    // target the pager markup - see the HTML block below
    container: $(".pager"),
    // output string - default is '{page}/{totalPages}';
    // possible variables: {size}, {page}, {totalPages}, {filteredPages}, {startRow}, {endRow}, {filteredRows} and {totalRows}
    // also {page:input} & {startRow:input} will add a modifiable input in place of the value
    output: '{startRow} - {endRow} / {filteredRows} ({totalRows})',
    // if true, the table will remain the same height no matter how many records are displayed. The space is made up by an empty
    // table row set to a height to compensate; default is false
    fixedHeight: true,
    // remove rows from the table to speed up the sort of large tables.
    // setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
    removeRows: false,
    // go to page selector - select dropdown that sets the current page
    cssGoto: '.gotoPage'
  };

  // Initialize tablesorter
  // ***********************
  $table
    .tablesorter({
      theme: 'blue',
      headerTemplate : '{content} {icon}', // new in v2.7. Needed to add the bootstrap icon!
      widthFixed: true,
      widgets: ['zebra', 'filter'],
	  widgetOptions: {
      filter_reset: '.reset'
    }
    })

    // initialize the pager plugin
    // ****************************
    .tablesorterPager(pagerOptions);
 

       // Disable / Enable
    // **************
    $('.toggle').click(function() {
      var mode = /Disable/.test( $(this).text() );
      // triggering disablePager or enablePager
      $table.trigger( (mode ? 'disable' : 'enable') + 'Pager');
      $(this).text( ( mode ? 'Enable' : 'Disable' ) + ' Pager');
      return false;
    });
    $table.bind('pagerChange', function() {
      // pager automatically enables when table is sorted.
      $('.toggle').text( 'Disable Pager' );
    });
});
		</script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
});
</script>

	</body>
	</html>
		