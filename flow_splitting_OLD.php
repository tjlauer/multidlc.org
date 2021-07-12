<?php
	$local_root = 'http://' . $_SERVER['SERVER_NAME'];	
	$selected_tab = 3;
	include($_SERVER['DOCUMENT_ROOT']. '/scaffold/header.php');
?>

<style>
th, td {
	text-align:left;
}
</style>

<main onload="calculateFlowSplitting();">
<div id="description">
	<h1 id="page-title">Flow Splitting Calculator</h1>
	<hr></hr>
</div>
<div id="content">
	<table style="width:100%;">
		<tr>
			<td style="width:50%;">
				<table style="border:0px;">
					<tr>
						<th style="border:0px;">Column efficiency (N)</th>
						<td style="border:0px;"><input class="number" type="number" step="any" id="column_N" value="7000" onchange="calculateFlowSplitting();"/></td>
					</tr>
					<tr>
						<th style="border:0px;">Column length (cm)</th>
						<td style="border:0px;"><input class="number" type="number" step="any" id="column_length" value="3" onchange="calculateFlowSplitting();"/></td>
					</tr>
					<tr>
						<th style="border:0px;">Column ID (mm)</th>
						<td style="border:0px;"><input class="number" type="number" step="any" id="column_ID" value="2.1" onchange="calculateFlowSplitting();"/></td>
					</tr>
					<tr>
						<th style="border:0px;">Total porosity</th>
						<td style="border:0px;"><input class="number" type="number" step="any" id="column_total_porosity" value="0.504" onchange="calculateFlowSplitting();"/></td>
					</tr>
					<tr>
						<th style="border:0px;">Estimated ke</th>
						<td style="border:0px;"><input class="number" type="number" step="any" id="retention_factor" value="2" onchange="calculateFlowSplitting();"/></td>
					</tr>
					<tr>
						<th style="border:0px;">Split ratio (1:X)</th>
						<td style="border:0px;"><input class="number" type="number" step="any" id="split_factor" value="10" onchange="calculateFlowSplitting();"/></td>
					</tr>
					<tr>
						<th style="border:0px;">Flow rate in column (mL/min)</th>
						<td style="border:0px;"><input class="number" type="number" step="any" id="column_flow_rate" value="2" onchange="calculateFlowSplitting();"/></td>
					</tr>
				</table>
				<hr>
				<table style="border:0px;">
					<tr>
						<th style="border:0px;">Detector flow rate (mL/min)</th>
						<td style="border:0px;" id="detector_flow_rate">covfefe</td>
					</tr>
					<tr>
						<th style="border:0px;">Column void volume (µL)</th>
						<td style="border:0px;" id="column_void_volume">covfefe</td>
					</tr>
					<tr>
						<th style="border:0px;">Column peak variance (µL<sup>2</sup>)</th>
						<td style="border:0px;" id="column_peak_variance">covfefe</td>
					</tr>
					<tr>
						<th style="border:0px;">Column peak<br>standard deviation (µL)</th>
						<td style="border:0px;" id="column_peak_stdev">covfefe</td>
					</tr>
					<tr>
						<th style="border:0px;">Column standard deviation<br>in detector (µL)</th>
						<td style="border:0px;" id="column_stdev_detector">covfefe</td>
					</tr>
					<tr>
						<th style="border:0px;">Column peak variance in<br>detector without tubing (µL<sup>2</sup>)</th>
						<td style="border:0px;" id="column_variance_detector_wo_tubing">covfefe</td>
					</tr>
				</table>
			</td>
			<td style="width:50%;">
				<p style="font-size:15px;"><strong>Post-split tubing</strong></p>
				<table style="border:0px;">
					<tr>
						<th style="border:0px;">Length (cm)</th>
						<td style="border:0px;"><input class="number" type="number" step="any" id="split_tubing_length" value="20" onchange="calculateFlowSplitting();"/></td>
					</tr>
					<tr>
						<th style="border:0px;">ID (µm)</th>
						<td style="border:0px;"><input class="number" type="number" step="any" id="split_tubing_ID" value="50" onchange="calculateFlowSplitting();"/></td>
					</tr>
					<tr>
						<th style="border:0px;">Estimated Dmol (m<sup>2</sup>/s)</th>
						<td style="border:0px;"><input class="number" type="number" step="any" id="split_tubing_Dmol" value="0.000000001" onchange="calculateFlowSplitting();"/></td>
					</tr>
					<br>
					<tr>
						<th style="border:0px;">Dynamic viscosity (cP)</th>
						<td style="border:0px;"><input class="number" type="number" step="any" id="split_tubing_dyn_viscosity" value="1" onchange="calculateFlowSplitting();"/></td>
					</tr>
				</table>
				<br><hr>
				<p style="font-size:15px;"><strong>Estimated post split tubing contribution</strong></p>
				<table style="border:0px;">
					<tr>
						<th style="border:0px;">Peak variance from tubing (µL<sup>2</sup>)</th>
						<td style="border:0px;" id="split_tubing_peak_variance">covfefe</td>
					</tr>
				</table>
				<br><hr><br>
				<table style="border:0px;">
					<tr>
						<th style="border:0px;">Total peak variance (µL<sup>2</sup>)</th>
						<td style="border:0px;" id="total_peak_variance">covfefe</td>
					</tr>
					<tr>
						<th style="border:0px;">Total peak standard deviation (µL)</th>
						<td style="border:0px;" id="total_peak_stdev">covfefe</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<br>
				<table style="border:0px; font-size:16px;">
					<tr>
						<th style="border:0px;">Relative increase in peak variance</th>
						<td style="border:0px;" id="relative_increase_peak_variance">covfefe</td>
					</tr>
					<tr>
						<th style="border:0px;">Relative increase in peak standard deviation</th>
						<td style="border:0px;" id="relative_increase_peak_stdev">covfefe</td>
					</tr>
					<tr>
						<th style="border:0px;">Apparent efficiency (N)</th>
						<td style="border:0px;" id="apparent_efficiency">covfefe</td>
					</tr>
					<tr>
						<th style="border:0px;">Pressure drop in post split tubing (bar)</th>
						<td style="border:0px;" id="split_tubing_pressure_drop">covfefe</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>
</main>

<script>

function calculateFlowSplitting(){
	var column_N = Number(document.getElementById("column_N").value);
	var column_length = Number(document.getElementById("column_length").value);
	var column_ID = Number(document.getElementById("column_ID").value);
	var column_total_porosity = Number(document.getElementById("column_total_porosity").value);
	var retention_factor = Number(document.getElementById("retention_factor").value);
	var split_factor = Number(document.getElementById("split_factor").value);
	var column_flow_rate = Number(document.getElementById("column_flow_rate").value);
	
	var column_length_METERS = column_length/100;
	var column_ID_METERS = column_ID/1000;
	
	var split_tubing_length = Number(document.getElementById("split_tubing_length").value);
	var split_tubing_ID = Number(document.getElementById("split_tubing_ID").value);
	var split_tubing_Dmol = Number(document.getElementById("split_tubing_Dmol").value);
	var split_tubing_dyn_viscosity = Number(document.getElementById("split_tubing_dyn_viscosity").value);
	
	var split_tubing_length_METERS = split_tubing_length/100;
	var split_tubing_ID_METERS = split_tubing_ID * Math.pow(10, -6);
	var split_tubing_dyn_viscosity_PAS = split_tubing_dyn_viscosity / 1000;
	
	var detector_flow_rate = column_flow_rate/(split_factor+1);
	var detector_flow_rate_METERS = (detector_flow_rate * Math.pow(10,-6))/60;
	
	var column_void_volume_METERS = column_length_METERS*(Math.pow(column_ID_METERS,2)*Math.PI/4)*column_total_porosity;
	var column_void_volume = column_void_volume_METERS * Math.pow(10,9);
	
	var column_peak_variance = Math.pow(column_void_volume,2)/column_N*Math.pow((1+retention_factor),2);
	var column_peak_stdev = Math.pow(column_peak_variance, 0.5);
	
	var column_stdev_detector = column_peak_stdev*detector_flow_rate/column_flow_rate;
	var column_variance_detector_wo_tubing = Math.pow(column_stdev_detector,2);
	
	
	
	var split_tubing_peak_variance_METERS = Math.pow(Math.PI,2)*Math.pow(split_tubing_length_METERS,2)*Math.pow(split_tubing_ID_METERS,4)/(48+(192*Math.PI*split_tubing_length_METERS*split_tubing_Dmol/detector_flow_rate_METERS));
	var split_tubing_peak_variance = split_tubing_peak_variance_METERS * Math.pow(10,18);
	
	var total_peak_variance = split_tubing_peak_variance + column_variance_detector_wo_tubing;
	var total_peak_stdev = Math.pow(total_peak_variance, 0.5);
	
	
	
	var split_tubing_pressure_drop_METERS = 128*split_tubing_dyn_viscosity_PAS*split_tubing_length_METERS*detector_flow_rate_METERS/(Math.PI*Math.pow(split_tubing_ID_METERS,4));
	
	var relative_increase_peak_stdev = (total_peak_stdev-column_stdev_detector)/column_stdev_detector*100;
	var relative_increase_peak_variance = (total_peak_variance-column_variance_detector_wo_tubing)/column_variance_detector_wo_tubing*100;
	var apparent_efficiency = (column_variance_detector_wo_tubing/total_peak_variance)*column_N;
	var split_tubing_pressure_drop = split_tubing_pressure_drop_METERS / Math.pow(10,5);
	
	
	
	document.getElementById("detector_flow_rate").innerHTML = detector_flow_rate.toFixed(4);
	document.getElementById("column_void_volume").innerHTML = column_void_volume.toFixed(4);
	document.getElementById("column_peak_variance").innerHTML = column_peak_variance.toFixed(4);
	document.getElementById("column_peak_stdev").innerHTML = column_peak_stdev.toFixed(4);
	document.getElementById("column_stdev_detector").innerHTML = column_stdev_detector.toFixed(4);
	document.getElementById("column_variance_detector_wo_tubing").innerHTML = column_variance_detector_wo_tubing.toFixed(4);
	
	document.getElementById("split_tubing_peak_variance").innerHTML = split_tubing_peak_variance.toFixed(4);
	document.getElementById("total_peak_variance").innerHTML = total_peak_variance.toFixed(4);
	document.getElementById("total_peak_stdev").innerHTML = total_peak_stdev.toFixed(4);
	
	document.getElementById("relative_increase_peak_stdev").innerHTML = relative_increase_peak_stdev.toFixed(2) + "%";
	document.getElementById("relative_increase_peak_variance").innerHTML = relative_increase_peak_variance.toFixed(2) + "%";
	document.getElementById("apparent_efficiency").innerHTML = apparent_efficiency.toFixed(0);
	document.getElementById("split_tubing_pressure_drop").innerHTML = split_tubing_pressure_drop.toFixed(2);
	
}

calculateFlowSplitting()

</script>

<?php
	include($_SERVER['DOCUMENT_ROOT'].'/scaffold/footer.php');
?>