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
	<div id='pressure-calculator'>
		<form onsubmit="return readDataP();">
			<table id='calculator'>
				<tr>
					<td class="label">Length (m)</td>
					<td class="input">
					<input class="number" type="number" step="any" id="length_input" name="length_input" required/>
					</td>
				</tr>
				<tr>
					<td class="label">Diameter (micron)</td>
					<td class="input">
					<input class="number" type="number" step="any" id="diameter_input" name="diameter_input" required/>
					</td>
				</tr>
				<tr>
					<td class="label">Composition (scale ACN/water)</td>
					<td class="input">
					<input class="number" type="number" step="any" id="composition_input" name="composition_input" required min="0" max="1"/>
					</td>
				</tr>
				<tr>
					<td class="label">Temperature (C)</td>
					<td class="input">
					<input class="number" type="number" step="any" id="temperature_input" name="temperature_input" min="20" max="80" required/>
					</td>
				</tr>
				<tr>
					<td class="label" colspan='2'>
					<input id='ambient_input' type='checkbox'>
					Include Laminar Flow at Ambient Pressure</input> </td>
					<input style="display:none" id="laminar_input" type="checkbox" > </input>
					<input style="display:none" id="turbulent_input" type="checkbox" > </input>
				</tr>
				<tr>
					<td colspan="2">
					<input type='submit' value='Submit'/>
					</td>
				</tr>
			</table>
		</form>
		<div id="graph" style="height:580px;width:598px">
			<ol id="legend">
				<li id="turbulent" onclick="check(this, document.getElementById('turbulent_input'));">Turbulent Flow</li>
				<li id="laminar" onclick="check(this, document.getElementById('laminar_input'));">Laminar Flow (Viscosity at Actual Pressure)</li>
				<li id="ambient" onclick="check(this, document.getElementById('ambient_input'));">Laminar Flow (Viscosity at Ambient Pressure)</li>
			</ol>
		</div>
		<div id="readme">
			<a id="readme-link" href="readme/readme_pressure_prediction.html">Stuck? Click Here for the README</a>
		</div>
	</div>
	<hr>
	</hr>
	<div id="return">
		<a id='return' href='tools.php'>Return to toolkit</a>
	</div>
</div>
</main>

<?php
	include($_SERVER['DOCUMENT_ROOT'].'/scaffold/footer.php');
?>

<script>
	document.getElementById("laminar_input").checked = true;
	document.getElementById("turbulent_input").checked = true;
	document.getElementById("ambient").style.color = "#797979";
	window.onload = function() {
	readDataP();
	}
</script>