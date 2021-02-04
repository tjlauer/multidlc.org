<?php
	$local_root = 'http://' . $_SERVER['SERVER_NAME'];	
	$selected_tab = 5;
	include($_SERVER['DOCUMENT_ROOT']. '/scaffold/header.php');
	include($_SERVER['DOCUMENT_ROOT']. '/wikiChrom/grabdata.php');
?>

<!-- <main style="position:relative;left: -212px;width:1259px;top:-13.4px;"> -->
<main style="position:relative;left: -259px;width:1385px;top:-13.4px;">

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

<div class="site-content" id="content" role="main" style="width:1364px;">

<!--======================================
   BreadCrumb Section
========================================-->

<section class="page-wrapper">
	<div class="container">
		<div class="row padding-top-60 padding-bottom-60">		
			<div class="col-md-12">	
				<div class="site-content">
				
					<table style="width: 100%;">
						<tr>
							<td style="border: 0px;"><h1 style="font-size:2em;">wikiChrom</h1></td>
							<td style="border: 0px; text-align: right;"><button onclick="exportTable();">Export Filtered Table</button></td>
						</tr>
					</table>
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
							<option value="50">50</option>
							<option value="100">100</option>
						</select>
					</div>
            	
					<table class="tablesorter">
						<thead>
							<tr>
								<th class="analyte" data-placeholder="Search">Analyte</th>
								<th class="abbreviation" data-placeholder="Search">Abbreviation</th>
								<th class="cas" data-placeholder="Search">CAS #</th>
								<th class="dataset_id" data-placeholder="Search">Dataset ID</th>
								<th class="mechanism" data-placeholder="Select mechanism">Mechanism</th>
								<th class="manufacturer" data-placeholder="Select manufacturer">Manufacturer</th>
								<th class="brand" data-placeholder="Select brand">Brand</th>
								<th class="stationary_phase" data-placeholder="Search">Stationary Phase</th>
								<th class="pore_size" data-placeholder="Search">Pore Size (A)</th>
								<th class="particle_size" data-placeholder="Search">Particle Size (µm)</th>
								<th class="a_solvent" data-placeholder="Select Solvent A">Solvent A</th>
								<th class="b_solvent" data-placeholder="Select Solvent B">Solvent B</th>
								<th class="composition" data-placeholder="Search">Composition (%B)</th>
								<th class="temperature" data-placeholder="Select Temperature">Temperature (C)</th>
								<th class="midpoint_pressure" data-placeholder="Search">Midpoint Pressure (bar)</th>
								<th class="retention_factor" data-placeholder="Search">Retention Factor</th>
								<th class="SD_k" data-placeholder="Search">SD k</th>
								<th class="n_k" data-placeholder="Search">n k</th>
							</tr>
						</thead>
						<tbody id="resultsTableBody">
							<?php foreach ($column_data as $this_column) { ?>
							<tr>
								<td><?php echo htmlspecialchars($this_column['analyte']); ?></td>
								<td><?php echo htmlspecialchars($this_column['abbreviation']); ?></td>
								<td><?php echo htmlspecialchars($this_column['cas']); ?></td>
								<td><?php echo htmlspecialchars($this_column['dataset_id']); ?></td>
								<td><?php echo htmlspecialchars($this_column['mechanism']); ?></td>
								<td><?php echo htmlspecialchars($this_column['manufacturer']) ?></td>
								<td><?php echo htmlspecialchars($this_column['brand']); ?></td>
								<td><?php echo htmlspecialchars($this_column['stationary_phase']); ?></td>
								<td><?php echo htmlspecialchars($this_column['pore_size']); ?></td>
								<td><?php echo htmlspecialchars($this_column['particle_size']); ?></td>
								<td><?php echo htmlspecialchars($this_column['a_solvent']); ?></td>
								<td><?php echo htmlspecialchars($this_column['b_solvent']); ?></td>
								<td><?php echo htmlspecialchars($this_column['composition']); ?></td>
								<td><?php echo htmlspecialchars($this_column['temperature']); ?></td>
								<td><?php echo htmlspecialchars($this_column['midpoint_pressure']); ?></td>
								<td><?php echo htmlspecialchars($this_column['retention_factor']); ?></td>
								<td><?php echo htmlspecialchars($this_column['SD_k']); ?></td>
								<td><?php echo htmlspecialchars($this_column['n_k']); ?></td>
							</tr>
							<?php } ?>
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
							<option value="50">50</option>
							<option value="100">100</option>
						</select>
					</div>
					<hr>
					<div>
						<h2>
							How to Use This Page
						</h2>
						<div>
							Searching:
							<p style="margin-left: 40px">
								Type in the desired parameters under their respective column search boxes.
							</p><br>
							Multi-Searching:
							<p style="margin-left: 40px">
								To search for multiple values in a single column, type each value separated by a "|" character.<br>
								Ex. Under Abbreviation, type "AP2|AP5" to receive results for both AP2 and AP5.
							</p><br>
							Sorting:
							<p style="margin-left: 40px">
								To sort all results by a single column, simply click the column's header.
							</p><br>
							Multi-Sorting:
							<p style="margin-left: 40px">
								To sort all results by multiple columns, simply hold "CTRL" while clicking the desired column headers.
							</p>
						</div>
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
			removeRows: true,
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
	function exportTable(){
		var table = document.getElementById("resultsTableBody");
		var table_rows = table.children;
		var CSV_Cache = "Analyte, Abbreviation, CAS Number, Dataset ID, Mechanism, Manufacturer, Brand, Stationary Phase, Pore Side (A), Particle Size (um), Solvent A, Solvent B, Composition (%B), Temperature (C), Retention Factor";
		for (i = 0; i < table_rows.length; i++) {
			CSV_Cache += "\n";
			var table_row_children = table_rows[i].children;
			for (j = 0; j < table_row_children.length; j++) {
				if(j > 0){ CSV_Cache += ", "; }
				CSV_Cache += table_row_children[j].innerHTML;
			}
		}
		//console.log(CSV_Cache);
		var hiddenElement = document.createElement('a');
		hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(CSV_Cache);
		hiddenElement.target = '_blank';
		hiddenElement.download = 'output.csv';
		hiddenElement.click();
	}
</script>

</main>

<?php
	include($_SERVER['DOCUMENT_ROOT'].'/scaffold/footer.php');
?>
		