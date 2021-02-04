<?php
	$local_root = 'http://' . $_SERVER['SERVER_NAME'];	
	$selected_tab = 5;
	include($_SERVER['DOCUMENT_ROOT']. '/scaffold/header.php');
	include($_SERVER['DOCUMENT_ROOT']. '/wikiChrom/grabdata.php');
?>

<main style="position:relative;left: -212px;width:1259px;top:-13.4px;">

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

<div class="site-content" id="content" role="main" style="width:1231px;">

<!--======================================
   BreadCrumb Section
========================================-->

<section class="page-wrapper">
	<div class="container">
		<div class="row padding-top-60 padding-bottom-60">		
			<div class="col-md-12">	
				<div class="site-content">
				
					<h1 style="font-size:2em;">wikiChrom - metadata</h1>
					<hr>
					<table>
						<thead>
							<tr>
								<th>Dataset ID</th>
								<th>Description</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>2020_01</td>
								<td>This is Dwight's dataset from WAD, 2014</td>
							</tr>
						</tbody>
					</table>
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
		