<?php
	$local_root = 'http://' . $_SERVER['SERVER_NAME'];	
	$selected_tab = 5;
	$tab_title = "HPLC Toolkit";
	include($_SERVER['DOCUMENT_ROOT'].'/scaffold/header.php');
?>

<main>
<div id="description">
							<h1 id="page-title">HPLC Toolkit</h1>
							<p>Below are the links to several tools that can be used to aid in HPLC calculations.  The 
							bar on the left contains links to additional HPLC simulators and tools</p>
						<hr>
						</hr>
						</div>
						<div id="content">
							<table  id="toolkit">
							<tr>
								<td class='menubar'>
								<p><b>
									Basics
								</p></b></td>
								<td class='buttonlink'><a class='option' style="color:#005695" href='tubing_volume'>Tubing Volume</a></td>
								<td class='buttonlink'><a class='option' style="color:#005695" href='viscosity_calculator'>Viscosity Calculator</a></td>
								<td class='buttonlink'><a class='option' href=''> </a></td>
								<td class='buttonlink'><a class='option' href=''> </a></td>
								<td class='buttonlink'><a class='option' href=''> </a></td>
							</tr>
							<tr>
								<td class='menubar'>
								<p><b>
									Dynamics-Level 1
								</p></b></td>
								<td class='buttonlink'><a class='option' style="color:#BF311A" href=''>Viscosity</a></td>
								<td class='buttonlink'><a class='option' style="color:#BF311A" href=''>Diffusion Coefficients</a></td>
								<td class='buttonlink'><a class='option' style="color:#005695" href='crossing_point'>Partical Size Crossover</a></td>
								<td class='buttonlink'><a class='option' style="color:#BF311A" href=''>Gradients</a></td>
								<td class='buttonlink'><a class='option' style="color:#BF311A" href=''>Method Transfer</a></td>
							</tr>
							<tr>
								<td class='menubar'>
								<p><b>
									Dynamics-Level 2
								</p></b></td>
								<td class='buttonlink'><a class='option' style="color:#BF311A" href=''>Dynamics Dashboard</a></td>
								<td class='buttonlink'><a class='option' style="color:#BF311A" href=''>Poppe Plot-Isocratic</a></td>
								<td class='buttonlink'><a class='option' style="color:#BF311A" href=''>Poppe Plot-Gradient</a></td>
								<td class='buttonlink'><a class='option' style="color:#BF311A" href=''>Compare Poppe Curves</a></td>
								<td class='buttonlink'><a class='option' style="color:#005695" href='pressure_prediction'>Pressure Prediction Plot</a></td>
							</tr>
							<tr>
								<td class='menubar'>
								<p><b>
									2D Liquid Chromatography
								</p></b></td>
								<td class='buttonlink'><a class='option' style="color:#BF311A" href=''>Fraction Volume</a></td>
								<td class='buttonlink'><a class='option' href=''> </a></td>
								<td class='buttonlink'><a class='option' href=''> </a></td>
								<td class='buttonlink'><a class='option' href=''> </a></td>
								<td class='buttonlink'><a class='option' href=''> </a></td>
							</tr>
							<tr>
								<td class='menubar'>
								<p><b>
									LC Mass Spec
								</p></b></td>
								<td class='buttonlink'><a class='option' href=''> </a></td>
								<td class='buttonlink'><a class='option' href=''> </a></td>
								<td class='buttonlink'><a class='option' href=''> </a></td>
								<td class='buttonlink'><a class='option' href=''> </a></td>
								<td class='buttonlink'><a class='option' href=''> </a></td>
							</tr>
						</table>
						</div>
</main>

<?php
	include($_SERVER['DOCUMENT_ROOT'].'/scaffold/footer.php');
?>