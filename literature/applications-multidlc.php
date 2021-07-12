<?php
	$local_root = 'http://' . $_SERVER['SERVER_NAME'];	
	$selected_tab = 3;
	include($_SERVER['DOCUMENT_ROOT'].'/scaffold/header.php');
?>

<main>
<div id="description">
		<h1 id="page-title">Applications of Multi-Dimensional LC</h1>
							<hr>
							</hr>
							<p>The following table contains a compilation of references to applications of 2D-LC published in the peer-reviewed literature. Click <a href="apps_bib.html">here</a> to see the complete citations for the references cited in the table.</p>
						</div>
						<div id="content">
							<table id="table-app">
						<thead>
						<tr>
							<td>Application</td>
							<td>Year</td>
							<td>First Mode/Phase</td>
							<td>Second Mode/Phase</td>
							<td>Reference</td>
						</tr>
						</thead>
						<tbody>
						<tr id="odd">
							<td>Small Molecule Pharmaceuticals</td>
							<td>2009</td>
							<td>RP/C18 (low pH)</td>
							<td>RP/C18 (pH 8.6)</td>
							<td>[1]</td>
						</tr>
						<tr id="even">
							<td>Surfactants</td>
							<td>2012</td>
							<td>HILIC/Zic-HILIC</td>
							<td>RP/C8-Aqua</td>
							<td>[2]</td>
						</tr>
						<tr id="odd">
							<td>Traditional Chinese Medicine</td>
							<td>2013</td>
							<td>RP/CN</td>
							<td>RP/C18 (low pH)</td>
							<td>[3]</td>
						</tr>
						<tr id="even">
							<td>Lipids</td>
							<td>2005</td>
							<td>Argentation (Silver ion)</td>
							<td>RP/C18</td>
							<td>[4]</td>
						</tr>
						<tr id="odd">
							<td>Carotenoids</td>
							<td>2006</td>
							<td>NP/Bare silica</td>
							<td>RP/C18</td>
							<td>[5]</td>
						</tr>
						<tr id="even">
							<td>Peptides</td>
							<td>2008</td>
							<td>RP/C18 (pH 1.8)</td>
							<td>RP/C18 (pH 10)</td>
							<td>[6]</td>
						</tr>
						<tr id="odd">
							<td>Peptides</td>
							<td>2005</td>
							<td>IEX/Phosphate modified zirconia</td>
							<td>RP/C18 (low pH)</td>
							<td>[7]</td>
						</tr>
						<tr id="even">
							<td>Polymethacrylates</td>
							<td>2012</td>
							<td>RP/C18</td>
							<td>SEC/C18 (critical conditions)</td>
							<td>[8]</td>
						</tr>
						</tbody>
					</table>
						</div>
</main>

<?php
	include($_SERVER['DOCUMENT_ROOT'].'/scaffold/footer.php');
?>