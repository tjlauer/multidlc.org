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

<?php
	$local_root = 'http://' . $_SERVER['SERVER_NAME'];	
	$selected_tab = 3;
	include($_SERVER['DOCUMENT_ROOT']. '/scaffold/header.php');
?>

<main style="position:relative;left: -128px;width:1091px;top:-13.4px;">

<meta name="robots" content="Multi-Dimensional, Separations, Database, 2D-LC, Literature">


	<!-- Color style css -->
	<link href="css/color-style.css" rel="stylesheet">
	<!-- Table display css -->
	<link href="css/table.css" rel="stylesheet">
	
<!-- /not the latest jquery javascript, but this one works with the table -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<link rel="manifest" href="img/icon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="img/icon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
		</head>

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
					
					var columnScores = [5,-2,0,-4,0,1,1,0,1,0,4];
					
					var cellSymbolScores = {
						//"Compound Name": [ln kw intercept, ln kw slope, S intercept, S slope],
						"A": -1,
						"A+": 0,
						"A-": -1,
						"A2+": 0,
						"A2-": 0,
						
						"B": -1,
						"B+": 0,
						"B-": -1,
						"B2+": 0,
						"B2-": -3,
						
						"E": 0,
						"E+": 1,
						"E-": 0,
						"E2+": 0,
						"E2-": 0,
						
						"F": 0,
						"F+": 2,
						"F-": -1,
						"F2+": 0,
						"F2-": 0,
						
						"H": 1,
						"H+": 1,
						"H-": -1,
						"H2+": 2,
						"H2-": -2,
						
						"I": 0,
						"I+": 1,
						"I-": 0,
						"I2+": 0,
						"I2-": 0,
						
						"M": 0,
						"M+": 1,
						"M-": -1,
						"M2+": 0,
						"M2-": 0,
						
						"O": 0,
						"O+": 1,
						"O-": -1,
						"O2+": 2,
						"O2-": -2,
						
						"P": 0,
						"P+": 1,
						"P-": -1,
						"P2+": 2,
						"P2-": -3,
						
						"Q": 0,
						"Q+": 1,
						"Q-": -1,
						"Q2+": 0,
						"Q2-": 0,
						
						"S": 0,
						"S+": 2,
						"S-": -2,
						"S2+": 0,
						"S2-": 0,
						
						"X": 0,
						"X+": 1,
						"X-": -1,
						"X2+": 2,
						"X2-": -3,
						
						"REV": 0,
						
						"plm-s": 0,
						"plm-u": 0,
						
						"prt-s": 0,
						"prt-u": 0,
					}
					
					rowNames = ["RP","NP","HILIC","HIC","IEX","SEC-Aq","SEC-Or","Ag","Chiral","Affinity","SFC"];
					
					var symbolsList = {
						"r0": ["H2+","plm-s","prt-s"],
						"r1": ["H+","plm-s"],
						"r2": ["H+","prt-s"],
						"r3": ["H-","prt-s"],
						"r4": ["H-","S+","plm-s","prt-s"],
						"r5": ["H2-","plm-s","prt-s"],
						"r6": ["H2-","plm-s","prt-s"],
						"r7": ["H+","S+","plm-u","prt-u"],
						"r8": ["I","S+","plm-u","prt-u"],
						"r9": ["H-","S2+"],
						"r10": ["H+","plm-u","prt-u"],
						//"cellID": [symbols],
						"r0_c0": ["E","O+","P+","X+"],
						"r0_c1": ["B","O2+","X2-"],
						"r0_c2": ["B","O2+","X+","REV"],
						"r0_c3": ["B","E","O-","P-","X+"],
						"r0_c4": ["O+"],
						"r0_c5": ["A","E","O+","P+","X+","plm-s"],
						"r0_c6": ["A","E","O+","plm-s"],
						"r0_c7": ["B","O2+","X-","REV"],
						"r0_c8": ["O2+"],
						"r0_c9": ["O2+","X+"],
						"r0_c10": ["B","O2+","X-"],
						"r1_c0": ["B","O2+","X2-"],
						"r1_c1": ["O-","P-","X+"],
						"r1_c2": ["O-","P-","X-"],
						"r1_c3": ["B","O2+","P-","X2-"],
						"r1_c4": ["O2+","REV"],
						"r1_c5": ["O2+","X2-"],
						"r1_c6": ["O2+","P+","X+","plm-s"],
						"r1_c7": ["O+","X+"],
						"r1_c8": ["O2+"],
						"r1_c9": ["O+","X2-"],
						"r1_c10": ["O-","X2+"],
						"r2_c0": ["B","O2+","P+","X+"],
						"r2_c1": ["B","O-","X-"],
						"r2_c2": ["O-","X+"],
						"r2_c3": ["B","O2+","P-","X-"],
						"r2_c4": ["O+","X+"],
						"r2_c5": ["O2+","P+"],
						"r2_c6": ["A","O+","X+"],
						"r2_c7": ["B","O+","X-"],
						"r2_c8": ["O2+"],
						"r2_c9": ["X-"],
						"r2_c10": ["X+"],
						"r3_c0": ["E","O-","X2+"],
						"r3_c1": ["B","O2+","P-","X2-"],
						"r3_c2": ["B","O2+","X-"],
						"r3_c3": ["O2-","P2-"],
						"r3_c4": ["B","O+","P-","X2+"],
						"r3_c5": ["O2+","P-","X2+"],
						"r3_c6": ["A","O+","P-","X-"],
						"r3_c7": ["B","O2+","P-","X2-"],
						"r3_c8": ["O2+","P2-"],
						"r3_c9": ["O+","X+"],
						"r3_c10": ["O+","P2-","X2-"],
						"r4_c0": ["E","O+","P+","X2+","prt-s"],
						"r4_c1": ["B","O2+","X2-"],
						"r4_c2": ["B","O+","X-"],
						"r4_c3": ["B","O+","P-","X2+"],
						"r4_c4": ["B","X-"],
						"r4_c5": ["O+","X2+"],
						"r4_c6": ["A","O+","P-","X-"],
						"r4_c7": ["B","O+","X-"],
						"r4_c8": ["O2+"],
						"r4_c9": ["O+","X+"],
						"r4_c10": ["O+","X2-"],
						"r5_c0": ["E","O+","P+","X2+","prt-s"],
						"r5_c1": ["B","O2+","X2-","REV"],
						"r5_c2": ["B","O2+","X-","REV"],
						"r5_c3": ["B","O+","P-","REV"],
						"r5_c4": ["O+","X2+","REV"],
						"r5_c5": ["O2-","P2-"],
						"r5_c6": ["A","O2-","P2-","X2-"],
						"r5_c7": ["O2-","X2-"],
						"r5_c8": ["O2+","P-"],
						"r5_c9": ["O2+","X+"],
						"r5_c10": ["E","O2+","P-","X-"],
						"r6_c0": ["B2-","O+","X-"],
						"r6_c1": ["B","O2+","X+","REV"],
						"r6_c2": ["O+","X+","REV"],
						"r6_c3": ["B","O+","P-","X2-"],
						"r6_c4": ["B","O+","P-","X-"],
						"r6_c5": ["O2-","P2-","X-"],
						"r6_c6": ["O2-","P2-"],
						"r6_c7": ["O2+","X+","REV"],
						"r6_c8": ["O2-","P-"],
						"r6_c9": ["O2+","P2-","X-"],
						"r6_c10": ["O+","P-","X+"],
						"r7_c0": ["B","O2+"],
						"r7_c1": ["O+","X+","REV"],
						"r7_c2": ["O+","X+"],
						"r7_c3": ["B","O2+","P-","X-"],
						"r7_c4": ["O2+","X-"],
						"r7_c5": ["O2+","X-"],
						"r7_c6": ["O2+","X-"],
						"r7_c7": ["O2-","P2-"],
						"r7_c8": ["O2+"],
						"r7_c9": ["O2+","X2-"],
						"r7_c10": ["O+","X+"],
						"r8_c0": ["O2+","REV"],
						"r8_c1": ["O2+","REV"],
						"r8_c2": ["O2+","REV"],
						"r8_c3": ["O2+","P2-"],
						"r8_c4": ["O2+","REV"],
						"r8_c5": ["O2+","P-"],
						"r8_c6": ["O2+","P-"],
						"r8_c7": ["O2+"],
						"r8_c8": ["O2-","P2-"],
						"r8_c9": ["O2+"],
						"r8_c10": ["O2+"],
						"r9_c0": ["O2+","P-","X+","REV"],
						"r9_c1": ["B","O2+","P-","X-","REV"],
						"r9_c2": ["B","O2+","P-","REV"],
						"r9_c3": ["O2+","P-","REV"],
						"r9_c4": ["O+","P-","X+"],
						"r9_c5": ["O2+","P-","X+"],
						"r9_c6": ["A","O2+","P2-","X2-"],
						"r9_c7": ["B","O2+","P-","X-"],
						"r9_c8": ["O2+","P-","REV"],
						"r9_c9": ["O-","P2-"],
						"r9_c10": ["O+","P-","X2-","REV"],
						"r10_c0": ["E","O2+","X+"],
						"r10_c1": ["O-","X+","REV"],
						"r10_c2": ["E","O-","REV"],
						"r10_c3": ["O2+","P2-"], // ["O2+","P3-"],
						"r10_c4": ["O2+","X+"],
						"r10_c5": ["O2+","P2-","X2+","REV"],
						"r10_c6": ["O2+","X2+","REV"],
						"r10_c7": ["O+","X+","REV"],
						"r10_c8": ["O2+"],
						"r10_c9": ["O2+","X-"],
						"r10_c10": ["E","O-","X2+"],
					}
					
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
								symbolCode = symbolCode+'<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Fast Separation" data-content="Method with short analysis times (e.g. <1 min).">'+checkForSymbolResult[0]+'</a> ';
							}
						} else if(sym == "H"){
							checkForSymbolResult = checkForSymbol(cellSymbols, spacerState, sym);
							if(checkForSymbolResult[0] != "NULL"){
								score += checkForSymbolResult[1]; spacerState = 1;
								symbolCode = symbolCode+'<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="High-resolution separation" data-content="Method capable of high peak capacity.">'+checkForSymbolResult[0]+'</a>';
							}
						} else if(sym == "I"){
							checkForSymbolResult = checkForSymbol(cellSymbols, spacerState, sym);
							if(checkForSymbolResult[0] != "NULL"){
								score += checkForSymbolResult[1]; spacerState = 1;
								symbolCode = symbolCode+'<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Isocratic" data-content="Possibility of (easily) running isocratic methods, reducing the complexity of the setup.">'+checkForSymbolResult[0]+'</a> ';
							}
						} else if(sym == "M"){
							checkForSymbolResult = checkForSymbol(cellSymbols, spacerState, sym);
							if(checkForSymbolResult[0] != "NULL"){
								score += checkForSymbolResult[1]; spacerState = 1;
								symbolCode = symbolCode+'<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="MS compatible" data-content="Possibility of using volatile mobile-phase additives and achieving good MS sensitivity.">'+checkForSymbolResult[0]+'</a>';
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
								symbolCode = symbolCode+'<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Column re-equilibration" data-content="Speed of column re-equilibration.">'+checkForSymbolResult[0]+'</a>';
							}
						} else if(sym == "S"){
							checkForSymbolResult = checkForSymbol(cellSymbols, spacerState, sym);
							if(checkForSymbolResult[0] != "NULL"){
								score += checkForSymbolResult[1]; spacerState = 1;
								symbolCode = symbolCode+'<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Selectivity/Specificity" data-content="Capability of the separation method to separate based on chemical characteristics of sample components (e.g. shape, orientation, composition/ sequence)">'+checkForSymbolResult[0]+'</a>';
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
								symbolCode = symbolCode+'<a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="Recommended to consider the reversed order of the mechanisms."><img class="fl-rgt" src="img/ror.png" width="20" alt=""/></a>';
							}
						} else if(sym == "plm-s"){
							if(cellSymbols.includes("plm-s")){
								score += cellSymbolScores["plm-s"];
								symbolCode = symbolCode+'<a tabindex="0" role="button" data-toggle="popover" data-placement="top" data-trigger="focus" data-content="Suitable for separations of proteins."><img class="fl-rgt" src="img/plm-s.png" width="25" alt=""/></a>';
							}
						} else if(sym == "plm-u"){
							if(cellSymbols.includes("plm-u")){
								score += cellSymbolScores["plm-u"];
								symbolCode = symbolCode+'<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Unsuitable for separations of polymers."><img src="img/plm-u.png" width="25" alt=""/></a>';
							}
						} else if(sym == "prt-s"){
							if(cellSymbols.includes("prt-s")){
								score += cellSymbolScores["prt-s"];
								symbolCode = symbolCode+'<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Suitable for separations of proteins."><img src="img/prt-s.png" width="25" alt=""/></a>';
							}
						} else if(sym == "prt-u"){
							if(cellSymbols.includes("prt-u")){
								score += cellSymbolScores["prt-u"];
								symbolCode = symbolCode+'<a tabindex="0" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="Unsuitable for separations of proteins."><img src="img/prt-u.png" width="25" alt=""/></a>';
							}
						}
						
						return [symbolCode, score, spacerState];
						
					}
					
					
					
					// Get the existing code for the column headers
					tableCode = document.getElementById("pirokTable").innerHTML;
					
					codeToAppend = "";
					
					cellIndex = 0;
					
					var phpCodeArray=<?php echo json_encode($code); ?>;
					
					baseSymbolsALL = ["A","B","E","F","H","I","M","O","P","Q","S","X","REV","plm-s","plm-u","prt-s","prt-u"];
					
					baseSymbols1 = ["A","B","E","F","H","I","M","O","P","Q","S","X"];
					baseSymbols2 = ["REV","plm-s","plm-u","prt-s","prt-u"];
					
					// Loop through all the row names
					for(var row = 0; row < rowNames.length; row++){
						
						// Open up the row
						code = "<tr>";
						
						// Add to row header
						code = code+"<th><h3><sup>1</sup>"+rowNames[row]+"</h3><hr>";
						
						rowScore = 0;
						spacerState = 0;
						
						for(baseSymbolNum = 0; baseSymbolNum < baseSymbolsALL.length; baseSymbolNum++){
							baseSymbol = baseSymbolsALL[baseSymbolNum];
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
							
							symbolCode = "";
							score = 0;
							
							spacerState = 0;
							
							for(baseSymbolNum = 0; baseSymbolNum < baseSymbols1.length; baseSymbolNum++){
								baseSymbol = baseSymbols1[baseSymbolNum];
								
								getSymbolCodeResult = getSymbolCode(symbolCode, score, spacerState, cellSymbols, baseSymbol);
								symbolCode = getSymbolCodeResult[0]; score = getSymbolCodeResult[1]; spacerState = getSymbolCodeResult[2];
							}
							
							symbolCode = symbolCode+'<br>'; //&nbsp;
							
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
							
							for(baseSymbolNum = 0; baseSymbolNum < baseSymbols2.length; baseSymbolNum++){
								baseSymbol = baseSymbols2[baseSymbolNum];
								
								getSymbolCodeResult = getSymbolCode(symbolCode, score, spacerState, cellSymbols, baseSymbol);
								symbolCode = getSymbolCodeResult[0]; score = getSymbolCodeResult[1]; spacerState = getSymbolCodeResult[2];
							}
							
							console.log(
								"cellID = "+cellID+"\n"+
								"\tIndividual Score = "+score+"\n"+
								"\tDimension-Wide Score = "+columnScores[col]+"\n"+
								"\tFinal Score = "+(score+columnScores[col])+"\n \n \n"
							);
							
							score += columnScores[col];
							
							score += rowScore;
							
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

</main>

<?php
	include($_SERVER['DOCUMENT_ROOT'].'/scaffold/footer.php');
?>