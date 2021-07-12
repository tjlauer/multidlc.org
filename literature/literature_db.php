<?php
require_once 'dbconfig.php';
 
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    //$sql = 'SELECT id, topic, category, type, doi, author, year	FROM lib_database';	//ORDER BY id;';	//$sql = "SELECT * FROM literature;"
	$sql = "SELECT `id`,`topic`,`category`,`type`,`doi`,`author`,`year` FROM `lib_database` ORDER BY `id`";
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    //$query = "..."; // Your current query
//$sth = $dbh->prepare($query);
//$sth->execute();

// Get error array
//$errors = $sth->errorInfo();
//print_r($errors);

} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
<!doctype html>
<html lang="en-GB">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Multi-Dimensional Separations - 2D-LC Literature Database</title>

<meta name="robots" content="Multi-Dimensional, Separations, Database, 2D-LC, Literature">


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

				<h3>Overview of 2D-LC literature</h3>
				
				
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
						<th class="application" data-placeholder="Search">Topic</th>
						<th class="category filter-select" data-placeholder="Select category">Category</th>
						<th class="coupling filter-select" data-placeholder="Select coupling">Type</th>
						<th class="reference" data-placeholder="Search">Reference</th>
						<th class="year filter-select" data-placeholder="Select year">Year</th>
						</tr>
  					</thead>
				
                	<tbody>
						<?php while ($row = $q->fetch()): ?>
						<tr>
						<td><?php echo htmlspecialchars($row['topic']); ?></td>
						<td><?php echo htmlspecialchars($row['category']); ?></td>
						<td><?php echo htmlspecialchars($row['type']); ?></td>
						<td><a href="https://doi.org/<?php echo urlencode ($row['ref']); ?>" target="_blank"><?php echo $row['author'] ?></a></td>
						<td><?php echo htmlspecialchars($row['year']); ?></td>
						</tr>
						<?php endwhile; ?>
                	</tbody>
					</table>
				
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
		