<?php
	$local_root = 'http://' . $_SERVER['SERVER_NAME'];	
	$selected_tab = 5;
	include($_SERVER['DOCUMENT_ROOT'].'/scaffold/header.php');
?>

<main>
<div id="description">
	<h1 id="page-title">Pressure Prediction Calculator</h1>
	<p>
		Fill in the empty fields and press calculate to make a pressure prediction plot for your tubing
	</p>
	<hr>
	</hr>
</div>
<div id="content">
	<div id='tubing-calculator'>
		<form onsubmit="return readDataV();">
			<table>
				<tr class="viscosity">
					<td class="title" colspan="2">Input</td>
				</tr>
				<tr class="viscosity">
					<td class="label">Composition (scale ACN/water)</td>
					<td>
					<input id="composition_input" type="number" min="0" max="1" step="any" required>
					</td>
				</tr>
				<tr class="viscosity">
					<td class="label">Temperature (C)</td>
					<td>
					<input id="temperature_input" type="number" min="20" max="80" step="any" required>
					</td>
				</tr>
				<tr class="viscosity">
					<td class="label">Pressure (bar)</td>
					<td>
					<input id="pressure_input" type="number" min="0" max="1000" step="any" step="any" required>
					</td>
				</tr>
				<tr class="viscosity">
					<td>
					<input id="submit" type="submit" value="Submit">
					</td>
					<td>
					<input id="submit" type="reset" value="Reset" onclick="clearV();">
					</td>
				</tr>
			</table>
			<table id="second-table">
				<tr class="viscosity">
					<td class="title" colspan="2">Output</td>
				</tr>
				<tr class="viscosity">
					<td class="label">Density (g/mL)</td>
					<td>
					<input id="density_output" step="any" type="number">
					</td>
				</tr>
				<tr class="viscosity">
					<td class="label">Viscosity (cP)</td>
					<td>
					<input id="viscosity_output" step="any" type="number">
					</td>
				</tr>
			</table>
		</form>
		<div id="readme">
			<a id="readme-link" href="readme/readme_viscosity_calculator.html">Stuck? Click Here for the README</a>
		</div>
		<hr>
		</hr>
		<a id='return' href='tools.php'>Return to toolkit</a>
	</div>
</div>
</main>

<?php
	include($_SERVER['DOCUMENT_ROOT'].'/scaffold/footer.php');
?>