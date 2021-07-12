<?php
require_once 'dbconfig.php';
 
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
 
    //$sql = 'SELECT id, application, category, coupling, mode, modulation, one_d, two_d, detection, ref, author, year
    //           FROM 2DLC
    //          ORDER BY id';
 
	$sql = "SELECT `id`,`application`,`category`,`coupling`,`mode`,`modulation`,`one_d`,`two_d`,`detection`,`ref`,`author`,`year` FROM `2dlc` ORDER BY `id`";
 
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
<title>MOREPEAKS - 2D-LC Applications</title>
<meta name="robots" content="MOREPEAKS, 2D-LC, Applications">
<link rel="stylesheet" id="wp-block-library-css" href="https://www.morepeaks.org/wp-includes/css/dist/block-library/style.min.css?ver=5.0.3" media="all">
<link rel="stylesheet" id="style-css" href="https://www.morepeaks.org/wp-content/themes/specia-standard/style.css?ver=5.0.3" media="all">
<link rel="stylesheet" id="owl-carousel-css" href="https://www.morepeaks.org/wp-content/themes/specia-standard/css/owl.carousel.css?ver=5.0.3" media="all">
<link rel="stylesheet" id="bootstrap-css" href="https://www.morepeaks.org/wp-content/themes/specia-standard/css/bootstrap.css?ver=5.0.3" media="all">
<link rel="stylesheet" id="owl-carousel-theme-css" href="https://www.morepeaks.org/wp-content/themes/specia-standard/css/owl.theme.default.min.css?ver=5.0.3" type="text/css" media="all">
<link rel="stylesheet" id="specia-widget-css" href="https://www.morepeaks.org/wp-content/themes/specia-standard/css/nifty/widget.css?ver=5.0.3" type="text/css" media="all">
<link rel="stylesheet" id="specia-hover-css" href="https://www.morepeaks.org/wp-content/themes/specia-standard/css/hover.css?ver=5.0.3" type="text/css" media="all">
<link rel="stylesheet" id="specia-media-query-css" href="https://www.morepeaks.org/wp-content/themes/specia-standard/css/media-query.css?ver=5.0.3" type="text/css" media="all">
<link rel="stylesheet" id="animate-css" href="https://www.morepeaks.org/wp-content/themes/specia-standard/css/animate.min.css?ver=5.0.3" media="all">
<link rel="stylesheet" id="specia-text-rotator-css" href="https://www.morepeaks.org/wp-content/themes/specia-standard/css/text-rotator.css?ver=5.0.3" media="all">
<link rel="stylesheet" id="specia-menus-css" href="https://www.morepeaks.org/wp-content/themes/specia-standard/css/menus.css?ver=5.0.3" media="all">
<link rel="stylesheet" id="specia-layout-css" href="https://www.morepeaks.org/wp-content/themes/specia-standard/css/layout.css?ver=5.0.3" media="all">
<link rel="stylesheet" id="specia-font-awesome-css" href="https://www.morepeaks.org/wp-content/themes/specia-standard/inc/fonts/font-awesome/css/font-awesome.min.css?ver=5.0.3" media="all">
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
<script src="https://www.morepeaks.org/wp-includes/js/jquery/jquery.js?ver=1.12.4"></script> 
<script src="https://www.morepeaks.org/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1"></script> 
<script src="https://www.morepeaks.org/wp-content/themes/specia-standard/js/owl.carousel.min.js?ver=5.0.3"></script> 
<script src="https://www.morepeaks.org/wp-content/themes/specia/js/bootstrap.min.js?ver=5.0.3"></script> 
<script src="https://www.morepeaks.org/wp-content/themes/specia-standard/js/jquery.simple-text-rotator.min.js?ver=5.0.3"></script> 
<script src="https://www.morepeaks.org/wp-content/themes/specia-standard/js/jquery.sticky.js?ver=5.0.3"></script> 
<script src="https://www.morepeaks.org/wp-content/themes/specia-standard/js/wow.min.js?ver=5.0.3"></script> 
<script src="https://www.morepeaks.org/wp-content/themes/specia-standard/js/component.js?ver=5.0.3"></script> 
<script src="https://www.morepeaks.org/wp-content/themes/specia-standard/js/modernizr.custom.js?ver=5.0.3"></script> 
<script src="https://www.morepeaks.org/wp-content/themes/specia-standard/js/custom.js?ver=5.0.3"></script> 
<script src="https://www.morepeaks.org/wp-content/themes/specia/js/dropdown.js?ver=5.0.3"></script> 
<script src="https://www.morepeaks.org/wp-content/themes/nifty-lite/js/custom.js?ver=5.0.3"></script>
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
<div class="site" id="page"> <a class="skip-link screen-reader-text" href="#main">Skip to content</a> <a href="https://www.morepeaks.org/" rel="home"> <img width="2000" height="636" alt="" src="https://www.morepeaks.org/wp-content/uploads/2019/06/cropped-header_MP.png" scale="0"></a>
  <div class="clearfix"></div>
  <header role="banner">
    <nav class="navbar navbar-default nav-spyropress sticky-nav sticky" role="navigation">
      <div class="container nifty-border"> 
        
        <!-- Mobile Display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <!-- /Mobile Display --> 
        
  
        			<!-- Menu Toggle -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<div class="">
					<div class="row">
						<div class="col-md-7 col-xs-12 padding-0">
							<ul id="menu-main" class="nav navbar-nav"><li id="menu-item-20" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-20"><a href="https://www.morepeaks.org/">Home</a></li>
<li id="menu-item-18" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-18 dropdown"><a href="https://morepeaks.org/2d-lc/">2D-LC <i class="caret"></i></a>
<ul class="dropdown-menu">
	<li id="menu-item-27" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-27 dropdown dropdown-submenu"><a href="https://www.morepeaks.org/pirok/2dlc-applications.php">Application Database <i class="caret"></i></a>
	<ul class="dropdown-menu">
		<li id="menu-item-31" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-31"><a href="https://www.morepeaks.org/pirok/insertdata-2dlc.html">Add your own application</a></li>
	</ul>
</li>
	<li id="menu-item-150" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-150"><a href="https://morepeaks.org/modulation/">Modulation</a></li>
	<li id="menu-item-28" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-28"><a href="https://www.morepeaks.org/pirok/2dlc-table.php">Opportunities and Challenges</a></li>
	<li id="menu-item-524" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-524"><a href="http://multidlc.org/literature/2D-LC">Technical Literature Database</a></li>
</ul>
</li>
<li id="menu-item-19" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-19"><a href="https://morepeaks.org/research/">Research</a></li>
<li id="menu-item-345" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-345 dropdown"><a href="https://morepeaks.org/software/">Software <i class="caret"></i></a>
<ul class="dropdown-menu">
	<li id="menu-item-525" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-525"><a href="https://morepeaks.org/software/">Overview</a></li>
	<li id="menu-item-523" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-523"><a href="https://morepeaks.org/patchnotes/">Patch Notes</a></li>
	<li id="menu-item-543" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-543"><a href="https://morepeaks.org/download/">Download</a></li>
</ul>
</li>
<li id="menu-item-491" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-491"><a href="https://morepeaks.org/team/">About Us</a></li>
<li id="menu-item-492" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-492"><a href="https://morepeaks.org/newsletter/">Newsletter</a></li>
</ul>						</div>
						
						<div class="col-md-2 col-xs-12 header-top-info-8">
						<!-- Start Social Media Icons -->
												
						
													<ul class="social pull-left">
																
								 
								<li><a href="https://www.linkedin.com/in/bob-pirok-91a35956/" ><i class="fa fa-linkedin"></i></a></li>
																
																
																
																
																
																
																
								 
								<li><a href="mailto:B.W.J.Pirok@uva.nl" ><i class="fa fa-envelope-o"></i></a></li>
																
																
																
															</ul>
												<!-- /End Social Media Icons-->
						</div>
						
						<div class="col-md-3 col-xs-12 spyro-button-container">
							<ul><li><div class='spyro_button'><a href='mailto:B.W.J.Pirok@uva.nl'  class='spyropress-button'><i class='fa '></i> CONTACT</a></div></li></ul>						</div>
						
					</div>
			</div>
			<!-- Menu Toggle -->
			
			
			
			
			
		</div>
	</nav>
</header>
<div class="clearfix"></div>	<div id="content" class="site-content" role="main">
    <!--======================================
   BreadCrumb Section
========================================-->
    
    <section class="page-wrapper">
      <div class="container">
        <div class="row padding-top-60 padding-bottom-60">
          <div class="col-md-12">
            <div class="site-content"> <img src="img/logos.png" alt="">
              <p>&nbsp;</p>
              <h3>Overview of 2D-LC applications from 1978 until present</h3>
              <p><strong>Modulation:</strong> Passive modulation = empty loops, ASM = Active-solvent modulation, EM = Evaporation membrane, FSM = Fixed-solvent modulation, SPAM = Stationary-phase-assisted modulation, VEM = Vacuum-evaporation modulation. <br>
                <strong>Detection:</strong> CAD = charged-aerosol detection, ELSD = evaporative light-scattering detection, FLD = fluorescence detection, LS = light scattering, MS = mass spectrometry, RID = refractive-index detection, VI = viscometry. LS, RID, and VI are typically combined to obtain &#8220;triple detection&#8221;.</p>
              <button type="button" class="toggle">Disable pager</button>
              <button type="button" class="reset" style="float: right">Reset filter</button>
              <br>
              <br>
              <div class="pager"> Page:
                <select class="gotoPage">
                </select>
                <img src="addons/pager/icons/first.png" class="first" alt="First" title="First page" /> <img src="addons/pager/icons/prev.png" class="prev" alt="Prev" title="Previous page" /> <span class="pagedisplay"></span> <!-- this can be any element, including an input --> 
                <img src="addons/pager/icons/next.png" class="next" alt="Next" title="Next page" /> <img src="addons/pager/icons/last.png" class="last" alt="Last" title= "Last page" />
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
                    <td><?php echo htmlspecialchars($row['detection']); ?></td>
                    <td><a href="https://doi.org/<?php echo urlencode ($row['ref']); ?>" target="_blank"><?php echo $row['author'] ?></a></td>
                    <td><?php echo htmlspecialchars($row['year']); ?></td>
                  </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
              <div class="pager"> Page:
                <select class="gotoPage">
                </select>
                <img src="addons/pager/icons/first.png" class="first" alt="First" title="First page" /> <img src="addons/pager/icons/prev.png" class="prev" alt="Prev" title="Previous page" /> <span class="pagedisplay"></span> <!-- this can be any element, including an input --> 
                <img src="addons/pager/icons/next.png" class="next" alt="Next" title="Next page" /> <img src="addons/pager/icons/last.png" class="last" alt="Last" title= "Last page" />
                <select class="pagesize">
                  <option value="10">10</option>
                  <option value="20">20</option>
                  <option value="30">30</option>
                  <option value="40">40</option>
                </select>
              </div>
            </div>
          </div>
          <!-- /.col --> 
        </div>
        <!-- /.row --> 
      </div>
      <!-- /.container --> 
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
      <div class="col-md-6 text-left"> <img src="https://www.morepeaks.org/wp-content/uploads/2019/01/Untitled-1.png" scale="0">
        <p></p>
      </div>
      <div class="col-md-6"> </div>
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
</body>
</html>
