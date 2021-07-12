<?php
require_once 'dbconfig.php';
 
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    //$sql = 'SELECT id, topic, category, type, doi, author, year	FROM lib_database';	//ORDER BY id;';	//$sql = "SELECT * FROM literature;"
	$sql = "SELECT `id`,`topic`,`category`,`subcategory`,`type`,`doi`,`author`,`year` FROM `lib_database` ORDER BY `id`";
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

<?php
	$local_root = 'http://' . $_SERVER['SERVER_NAME'];	
	$selected_tab = 3;
	$tab_title = "Literature > 2D-LC";
	include($_SERVER['DOCUMENT_ROOT']. '/scaffold/header.php');
?>

<main style="position:relative;left: -128px;width:1091px;top:-13.4px;">

<meta name="robots" content="Multi-Dimensional, Separations, Database, 2D-LC, Literature">


<!-- /css for tablesorter -->
	<link rel="stylesheet" href="tablesorter/css/theme.blue.css">
	<link rel="stylesheet" href="tablesorter/addons/pager/jquery.tablesorter.pager.css">
<!-- /page style css -->
	<!--<link href="tablesorter/css/color-style.css" rel="stylesheet">-->
<!-- / adjusted (removed table css) typography style css -->
	<!--<link href="tablesorter/css/typography.css" rel="stylesheet">-->

<!-- /javascript for tablesorter -->
	<script
		src="https://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		crossorigin="anonymous">
	</script>
	<script src="tablesorter/js/jquery.tablesorter.js"></script>
	<script src="tablesorter/js/jquery.tablesorter.widgets.js"></script>
	<script src="tablesorter/addons/pager/jquery.tablesorter.pager.js"></script>



<div class="clearfix"></div>	

<div class="site-content" id="content" role="main" style="width:1069px;">

<!--======================================
   BreadCrumb Section
========================================-->

<section class="page-wrapper">
	<div class="container">
		<div class="row padding-top-60 padding-bottom-60">		
			<div class="col-md-12">	
				<div class="site-content">
				
				<h1 style="font-size:2em;">Overview of 2D-LC Literature</h1>
				<hr>
				
            	<button type="button" class="toggle">Disable pager</button>
            	<button type="button" class="reset" style="float: right">Reset filter</button>
				<br><br>
				
				<div class="pager">
				Page: <select class="gotoPage"></select>
				<img src="tablesorter/addons/pager/icons/first.png" class="first" alt="First" title="First page" />
				<img src="tablesorter/addons/pager/icons/prev.png" class="prev" alt="Prev" title="Previous page" />
				<span class="pagedisplay"></span> <!-- this can be any element, including an input -->
				<img src="tablesorter/addons/pager/icons/next.png" class="next" alt="Next" title="Next page" />
				<img src="tablesorter/addons/pager/icons/last.png" class="last" alt="Last" title= "Last page" />
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
						<th class="subcategory filter-select" data-placeholder="Select category">Subcategory</th>
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
						<td><?php echo htmlspecialchars($row['subcategory']); ?></td>
						<td><?php echo htmlspecialchars($row['type']); ?></td>
						<td><a href="https://doi.org/<?php echo urlencode ($row['ref']); ?>" target="_blank"><?php echo $row['author'] ?></a></td>
						<td><?php echo htmlspecialchars($row['year']); ?></td>
						</tr>
						<?php endwhile; ?>
                	</tbody>
					</table>
				
					<div class="pager">	
					Page: <select class="gotoPage"></select>		
					<img src="tablesorter/addons/pager/icons/first.png" class="first" alt="First" title="First page" />
					<img src="tablesorter/addons/pager/icons/prev.png" class="prev" alt="Prev" title="Previous page" />
					<span class="pagedisplay"></span> <!-- this can be any element, including an input -->
					<img src="tablesorter/addons/pager/icons/next.png" class="next" alt="Next" title="Next page" />
					<img src="tablesorter/addons/pager/icons/last.png" class="last" alt="Last" title= "Last page" />
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
========================================
			</div>-->
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

</main>

<?php
	include($_SERVER['DOCUMENT_ROOT'].'/scaffold/footer.php');
?>
		