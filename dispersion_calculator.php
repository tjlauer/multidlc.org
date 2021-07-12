<?php
	$local_root = 'http://' . $_SERVER['SERVER_NAME'];	
	$selected_tab = 5;
	$tab_title = "Dispersion Calculator";
	include($_SERVER['DOCUMENT_ROOT']. '/scaffold/header.php');
?>

<style>
th, td {
	text-align:left;
}
</style>

<main onload="">
<div id="description">
	<h1 id="page-title">Dispersion Calculator</h1>
	<p>This calculator is based off of theory discussed in the following articles: 
		<a href="https://www.chromatographyonline.com/view/where-has-my-efficiency-gone-impacts-of-extracolumn-peak-broadening-on-performance-part-i-basic-concepts" target="_blank">Part 1</a>, 
		<a href="https://www.chromatographyonline.com/view/where-has-my-efficiency-gone-impacts-of-extracolumn-peak-broadening-on-performance-part-ii-sample-injection" target="_blank">Part 2</a>, 
		<a href="https://www.chromatographyonline.com/view/where-has-my-efficiency-gone-impacts-of-extracolumn-peak-broadening-on-performance-part-iii-tubing-and-detectors" target="_blank">Part 3</a>, and 
		<a href="https://www.chromatographyonline.com/view/where-has-my-efficiency-gone-impacts-of-extracolumn-peak-broadening-on-performance-part-iv-gradient-elution-flow-splitting-and-a-holistic-view" target="_blank">Part 4</a>.
	</p>
	<hr></hr>
</div>
<div id="content">
	<table style="width:100%;">
		<tr>
			<td style="width:50%;vertical-align:top;">
				<div id="DIV_General">
					<p onclick="ToggleHidden('Table_General');" class="SectionHeader">General</p>
					<table style="border:0px;" id="Table_General" hidden>
						<tr>
							<th style="border:0px;">Isocratic or Gradient elution?</th>
							<td style="border:0px;"><select id="General_ElutionMode" class="Input" onchange="CalculateDispersion();"><option value="Isocratic">Isocratic</option><option value="Gradient">Gradient</option></select></td>
						</tr>
						<tr>
							<th style="border:0px;">UV Detection?</th>
							<td style="border:0px;"><select id="General_UV_Detection" class="Input" onchange="CalculateDispersion();"><option value="Yes">Yes</option><option value="No">No</option></select></td>
						</tr>
						<tr>
							<th style="border:0px;">Flow rate through column [mL/min]</th>
							<td style="border:0px;"><input class="number Input" type="number" step="any" id="General_FlowRate" value="0.5" onchange="CalculateDispersion();"/></td>
						</tr>
						<tr>
							<th style="border:0px;">Diffusion Coefficient [m<sup>2</sup>/s]</th>
							<td style="border:0px;"><input class="number Input" type="number" step="any" id="General_DiffusionCoefficient_Coefficient" value="1" style="width:20%" onchange="CalculateDispersion();"/> <strong>* 10^</strong> <input class="number" type="number" step="any" id="General_DiffusionCoefficient_Exponent" value="-10" style="width:20%" onchange="CalculateDispersion();"/></td>
						</tr>
						<tr>
							<th style="border:0px;">Mobile Phase Dynamic Viscosity [cP]</th>
							<td style="border:0px; width: 100px;"><input class="number Input" type="number" step="any" id="PressureDrop_Viscosity" value="1" onchange="CalculateDispersion();"/></td>
						</tr>
					</table>
				</div>
				<div id="DIV_Injection">
					<p onclick="ToggleHidden('Table_Injection');" class="SectionHeader">Injection (Flow through injector)</p>
					<table style="border:0px;" id="Table_Injection" hidden>
						<tr>
							<th style="border:0px;">Needle seat diameter [µm]</th>
							<td style="border:0px;"><input class="number Input" type="number" step="any" id="Injection_NeedleSeatDiameter" value="120" onchange="CalculateDispersion();"/></td>
						</tr>
						<tr>
							<th style="border:0px;">Needle seat length [mm]</th>
							<td style="border:0px;"><input class="number Input" type="number" step="any" id="Injection_NeedleSeatLength" value="50" onchange="CalculateDispersion();"/></td>
						</tr>
						<tr>
							<th style="border:0px;">V<sub>inj</sub> [µL]</th>
							<td style="border:0px;"><input class="number Input" type="number" step="any" id="Injection_Volume" value="2" onchange="CalculateDispersion();"/></td>
						</tr>
						<tr>
							<th style="border:0px;">θ<sub>inj</sub></th>
							<td style="border:0px;" class="Output" id="Injection_Theta">#</td>
						</tr>
						<tr>
							<th style="border:0px;">σ<sup>2</sup><sub style="display: inline-block; transform: translate(-5.86px,1px);">hydrodynamic</sub>[µL<sup>2</sup>]</th>
							<td style="border:0px;" class="Output" id="Injection_Var_Hydrodynamic">#</td>
						</tr>
						<tr>
							<th style="border:0px;">σ<sup>2</sup><sub style="display: inline-block; transform: translate(-5.86px,1px);">inj</sub>[µL<sup>2</sup>]</th>
							<td style="border:0px;" class="Output" id="Injection_Var">#</td>
						</tr>
					</table>
				</div>
				<div id="DIV_Tubing_PreColumn">
					<p onclick="ToggleHidden('Table_Tubing_PreColumn');" class="SectionHeader">Tubing (Pre-Column)</p>
					<table style="border:0px;" id="Table_Tubing_PreColumn" hidden>
						<tr>
							<th style="border:0px;">Diameter [µm]</th>
							<td style="border:0px;"><input class="number Input" type="number" step="any" id="Tubing_PreColumn_Diameter" value="120" onchange="CalculateDispersion();"/></td>
						</tr>
						<tr>
							<th style="border:0px;">Length [mm]</th>
							<td style="border:0px;"><input class="number Input" type="number" step="any" id="Tubing_PreColumn_Length" value="400" onchange="CalculateDispersion();"/></td>
						</tr>
						<tr>
							<th style="border:0px;">σ<sup>2</sup><sub style="display: inline-block; transform: translate(-5.86px,1px);">tub,pre-col</sub>[µL<sup>2</sup>]</th>
							<td style="border:0px;" class="Output" id="Tubing_PreColumn_Var">#</td>
						</tr>
					</table>
				</div>
				<div id="DIV_Tubing_HeatExchanger">
					<p onclick="ToggleHidden('Table_Tubing_HeatExchanger');" class="SectionHeader">Heat Exchanger</p>
					<table style="border:0px;" id="Table_Tubing_HeatExchanger" hidden>
						<tr>
							<th style="border:0px;">Diameter [µm]</th>
							<td style="border:0px;"><input class="number Input" type="number" step="any" id="Tubing_HeatExchanger_Diameter" value="120" onchange="CalculateDispersion();"/></td>
						</tr>
						<tr>
							<th style="border:0px;">Length [mm]</th>
							<td style="border:0px;"><input class="number Input" type="number" step="any" id="Tubing_HeatExchanger_Length" value="50" onchange="CalculateDispersion();"/></td>
						</tr>
						<tr>
							<th style="border:0px;">σ<sup>2</sup><sub style="display: inline-block; transform: translate(-5.86px,1px);">tub,heat exchanger</sub>[µL<sup>2</sup>]</th>
							<td style="border:0px;" class="Output" id="Tubing_HeatExchanger_Var">#</td>
						</tr>
					</table>
				</div>
				<div id="DIV_Column">
					<p onclick="ToggleHidden('Table_Column');" class="SectionHeader">Column</p>
					<table style="border:0px;" id="Table_Column" hidden>
						<tr>
							<th style="border:0px;">Diameter [mm]</th>
							<td style="border:0px;"><input class="number Input" type="number" step="any" id="Column_Diameter" value="2.1" onchange="CalculateDispersion();"/></td>
						</tr>
						<tr>
							<th style="border:0px;">Length [mm]</th>
							<td style="border:0px;"><input class="number Input" type="number" step="any" id="Column_Length" value="100" onchange="CalculateDispersion();"/></td>
						</tr>
						<tr>
							<th style="border:0px;">Total Porosity</th>
							<td style="border:0px;"><input class="number Input" type="number" step="any" id="Column_TotalPorosity" value="0.5" onchange="CalculateDispersion();"/></td>
						</tr>
						<tr>
							<th style="border:0px;">Column Dead Volume [µL]</th>
							<td style="border:0px;" class="Output" id="Column_DeadVolume">#</td>
						</tr>
						<tr>
							<th style="border:0px;">Particle Size [µm]</th>
							<td style="border:0px;"><input class="number Input" type="number" step="any" id="Column_ParticleSize" value="5" onchange="CalculateDispersion();"/></td>
						</tr>
						<tr>
							<th style="border:0px;">Reduced Plate Height</th>
							<td style="border:0px;"><input class="number Input" type="number" step="any" id="Column_ReducedPlateHeight" value="2" onchange="CalculateDispersion();"/></td>
						</tr>
						<tr>
							<th style="border:0px;">Plate Number</th>
							<td style="border:0px;" class="Output" id="Column_PlateNumber">#</td>
						</tr>
						<tr>
							<th style="border:0px;">Retention Factor (k or k<sub>e</sub>)</th>
							<td style="border:0px;"><input class="number Input" type="number" step="any" id="Column_RetentionFactor" value="1" onchange="CalculateDispersion();"/></td>
						</tr>
						<tr>
							<th style="border:0px;">σ<sup>2</sup><sub style="display: inline-block; transform: translate(-5.86px,1px);">col</sub>[µL<sup>2</sup>]</th>
							<td style="border:0px;" class="Output" id="Column_Var">#</td>
						</tr>
					</table>
				</div>
				<div id="DIV_Tubing_PostColumn">
					<p onclick="ToggleHidden('Table_Tubing_PostColumn');" class="SectionHeader">Tubing (Post-Column)</p>
					<table style="border:0px;" id="Table_Tubing_PostColumn" hidden>
						<tr>
							<th style="border:0px;">Diameter [µm]</th>
							<td style="border:0px;"><input class="number Input" type="number" step="any" id="Tubing_PostColumn_Diameter" value="120" onchange="CalculateDispersion();"/></td>
						</tr>
						<tr>
							<th style="border:0px;">Length [mm]</th>
							<td style="border:0px;"><input class="number Input" type="number" step="any" id="Tubing_PostColumn_Length" value="400" onchange="CalculateDispersion();"/></td>
						</tr>
						<tr>
							<th style="border:0px;">σ<sup>2</sup><sub style="display: inline-block; transform: translate(-5.86px,1px);">tub,post-col</sub>[µL<sup>2</sup>]</th>
							<td style="border:0px;" class="Output" id="Tubing_PostColumn_Var">#</td>
						</tr>
					</table>
				</div>
				<div id="DIV_FlowSplitting">
					<p onclick="ToggleHidden('Table_FlowSplitting');" class="SectionHeader">Flow Splitting</p>
					<table style="border:0px;" id="Table_FlowSplitting" hidden>
						<tr>
							<th style="border:0px;">Split Ratio (1:X)</th>
							<td style="border:0px;"><input class="number Input" type="number" step="any" id="FlowSplitting_SplitRatio" value="0" onchange="CalculateDispersion();"/></td>
						</tr>
						<tr>
							<th style="border:0px;">Post-Split Flow Rate [mL/min]</th>
							<td style="border:0px;" class="Output" id="FlowSplitting_PostSplitFlowRate">#</td>
						</tr>
					</table>
				</div>
				<div id="DIV_Tubing_PostSplit">
					<p onclick="ToggleHidden('Table_Tubing_PostSplit');" class="SectionHeader">Tubing (Post-Split)</p>
					<table style="border:0px;" id="Table_Tubing_PostSplit" hidden>
						<tr>
							<th style="border:0px;">Diameter [µm]</th>
							<td style="border:0px;"><input class="number Input" type="number" step="any" id="Tubing_PostSplit_Diameter" value="120" onchange="CalculateDispersion();"/></td>
						</tr>
						<tr>
							<th style="border:0px;">Length [mm]</th>
							<td style="border:0px;"><input class="number Input" type="number" step="any" id="Tubing_PostSplit_Length" value="400" onchange="CalculateDispersion();"/></td>
						</tr>
						<tr>
							<th style="border:0px;">σ<sup>2</sup><sub style="display: inline-block; transform: translate(-5.86px,1px);">tub,post-split</sub>[µL<sup>2</sup>]</th>
							<td style="border:0px;" class="Output" id="Tubing_PostSplit_Var">#</td>
						</tr>
					</table>
				</div>
				<div id="DIV_Detector">
					<p onclick="ToggleHidden('Table_Detector');" class="SectionHeader">Detector</p>
					<table style="border:0px;" id="Table_Detector" hidden>
						<tr>
							<th style="border:0px;">θ<sub>det</sub></th>
							<td style="border:0px;"><input class="number Input" type="number" step="any" id="Detector_Theta" value="0.5" onchange="CalculateDispersion();"/></td>
						</tr>
						<tr>
							<th style="border:0px;">V<sub>cell</sub> [µL]</th>
							<td style="border:0px;"><input class="number Input" type="number" step="any" id="Detector_CellVolume" value="1" onchange="CalculateDispersion();"/></td>
						</tr>
						<tr>
							<th style="border:0px;">σ<sup>2</sup><sub style="display: inline-block; transform: translate(-5.86px,1px);">det</sub>[µL<sup>2</sup>]</th>
							<td style="border:0px;" class="Output" id="Detector_Var">#</td>
						</tr>
					</table>
				</div>
			</td>
			<td style="width:50%;vertical-align:top;">
				<div id="DIV_PieChart">
					<p onclick="ToggleHidden('Chart_Variances');" class="SectionHeader">Variance Chart</p>
					<div id="Chart_Variances" style="margin-top:7px;">
						[PIE CHART]
					</div>
				</div>
				<div id="DIV_Contributions">
					<p onclick="ToggleHidden('Table_Contributions');" class="SectionHeader">Variance Table</p>
					<table style="border:0px;" id="Table_Contributions">
						<tr>
							<th style="border:0px;"></th>
							<th style="border:0px;text-align:center;">Variance [µL<sup>2</sup>]</th>
							<th style="border:0px;text-align:center;width:20%;">%</th>
							<th style="border:0px;width:20%;"></th>
						</tr>
						<tr onclick="FocusMenu(1);">
							<th style="border:0px;">Injection</th>
							<td style="border:0px;text-align:center;" class="Output" id="Contributions_Injection_Var">#</td>
							<td style="border:0px;text-align:center;" class="Output" id="Contributions_Injection_Percent">#</td>
                            <td id="colors_Injection" style="border:0px;background-color:#000000"></td>
                        </tr>
						<tr onclick="FocusMenu(2);">
							<th style="border:0px;">Tubing (Pre-Column)</th>
							<td style="border:0px;text-align:center;" class="Output" id="Contributions_Tubing_PreColumn_Var">#</td>
							<td style="border:0px;text-align:center;" class="Output" id="Contributions_Tubing_PreColumn_Percent">#</td>
							<td id="colors_Tubing_PreColumn" style="border:0px;background-color:#000000"></th>
						</tr>
						<tr onclick="FocusMenu(3);">
							<th style="border:0px;">Heat Exchanger</th>
							<td style="border:0px;text-align:center;" class="Output" id="Contributions_Tubing_HeatExchanger_Var">#</td>
							<td style="border:0px;text-align:center;" class="Output" id="Contributions_Tubing_HeatExchanger_Percent">#</td>
							<td id="colors_HeatExchanger" style="border:0px;background-color:#000000"></th>
						</tr>
						<tr onclick="FocusMenu(4);">
							<th style="border:0px;">Column</th>
							<td style="border:0px;text-align:center;" class="Output" id="Contributions_Column_Var">#</td>
							<td style="border:0px;text-align:center;" class="Output" id="Contributions_Column_Percent">#</td>
							<td id="colors_Column" style="border:0px;background-color:#000000"></th>
						</tr>
						<tr onclick="FocusMenu(5);">
							<th style="border:0px;">Tubing (Post-Column)</th>
							<td style="border:0px;text-align:center;" class="Output" id="Contributions_Tubing_PostColumn_Var">#</td>
							<td style="border:0px;text-align:center;" class="Output" id="Contributions_Tubing_PostColumn_Percent">#</td>
							<td id="colors_Tubing_PostColumn" style="border:0px;background-color:#000000"></th>
						</tr>
						<tr onclick="FocusMenu(6);">
							<th style="border:0px;">Tubing (Post-Split)</th>
							<td style="border:0px;text-align:center;" class="Output" id="Contributions_Tubing_PostSplit_Var">#</td>
							<td style="border:0px;text-align:center;" class="Output" id="Contributions_Tubing_PostSplit_Percent">#</td>
							<td id="colors_Tubing_PostSplit" style="border:0px;background-color:#000000"></th>
						</tr>
						<tr onclick="FocusMenu(7);">
							<th style="border:0px;">Detector</th>
							<td style="border:0px;text-align:center;" class="Output" id="Contributions_Detector_Var">#</td>
							<td style="border:0px;text-align:center;" class="Output" id="Contributions_Detector_Percent">#</td>
							<td id="colors_Detector" style="border:0px;background-color:#000000"></th>
						</tr>
						<tr style="border-top:2px solid black;">
							<th style="border-left:0px;border-right:0px;">Total</th>
							<td style="border-left:0px;border-right:0px;text-align:center;" class="Output" id="Contributions_Total_Var">#</td>
							<td style="border-left:0px;border-right:0px;text-align:center;" class="Output" id="Contributions_Total_Percent">#</td>
							<td style="border-left:0px;border-right:0px;"></th>
						</tr>
					</table>
				</div>
				<div id="DIV_EfficiencyLoss">
					<table style="width:55%;margin-top:7px;">
						<tr>
							<th style="border:0px;">Apparent Plate Number</th>
							<td style="border:0px;" class="Output" id="Column_ApparentEfficiency">#</td>
						</tr>
						<tr id="Column_EfficiencyLoss_Row">
							<th style="border:0px;">Efficiency Loss [%]</th>
							<td style="border:0px;" class="Output" id="Column_EfficiencyLoss">#</td>
						</tr>
					</table>
				</div>
				<div id="DIV_PressureDrop">
					<p onclick="ToggleHidden('Table_PressureDrop');" class="SectionHeader">Pressure Drop</p>
					<table style="border:0px;" id="Table_PressureDrop">
						<tr onclick="FocusMenu(1);">
							<th style="border:0px;">Needle Seat Capillary [bar]</th>
							<td style="border:0px;" class="Output" id="PressureDrop_Injection">#</td>
						</tr>
						<tr onclick="FocusMenu(2);">
							<th style="border:0px;">Pre-Column Tubing [bar]</th>
							<td style="border:0px;" class="Output" id="PressureDrop_PreColumnTubing">#</td>
						</tr>
						<tr onclick="FocusMenu(3);">
							<th style="border:0px;">Heat Exchanger [bar]</th>
							<td style="border:0px;" class="Output" id="PressureDrop_HeatExchangerTubing">#</td>
						</tr>
						<tr onclick="FocusMenu(5);">
							<th style="border:0px;">Post-Column Tubing [bar]</th>
							<td style="border:0px;" class="Output" id="PressureDrop_PostColumnTubing">#</td>
						</tr>
						<tr onclick="FocusMenu(6);">
							<th style="border:0px;">Post-Split Tubing [bar]</th>
							<td style="border:0px;" class="Output" id="PressureDrop_PostSplitTubing">#</td>
						</tr>
						<tr style="border-top:2px solid black;">
							<th style="border-left:0px;border-right:0px;border-bottom:0px;">Total Tubing Pressure Drop [bar]</th>
							<td style="border-left:0px;border-right:0px;border-bottom:0px;" class="Output" id="PressureDrop_TubingTotal">#</td>
						</tr>
					</table>
				</div>
			</td>
		</tr>
	</table>
</div>
</main>

<!-- This script tag creates the JSON object containing all of the metadata for individual elements -->
<!-- Examples of metadata included tooltip text, number if decimals/sigfigs to display, min/max values, etc. -->
<script>
	const metadata = {
		"General_ElutionMode": {
			"Class": "Input",
			"Tooltip": "This calculator assumes that when using gradient elution the initial retention of analysis during the separation is very high, so that pre-column sources of dispersion are completely eliminated.",
			"Value": {
				"Type": "select",
				"Default": "Isocratic",
				"Min": NaN,
				"Max": NaN
			}
		},
		"General_UV_Detection": {
			"Class": "Input",
			"Tooltip": "",
			"Value": {
				"Type": "select",
				"Default": "Yes",
				"Min": NaN,
				"Max": NaN
			}
		},
		"General_FlowRate": {
			"Class": "Input",
			"Tooltip": "", //Volumetric flow rate through the column.
			"Value": {
				"Type": "number",
				"Default": 1,
				"Min": 0,
				"Max": NaN
			}
		},
		"General_DiffusionCoefficient_Coefficient": {
			"Class": "Input",
			"Tooltip": "", //Analyte Diffusion Coefficient in Mobile Phase (Dm)
			"Value": {
				"Type": "number",
				"Default": 1,
				"Min": 0,
				"Max": NaN
			}
		},
		"General_DiffusionCoefficient_Exponent": {
			"Class": "Input",
			"Tooltip": "", //Analyte Diffusion Coefficient in Mobile Phase (Dm)
			"Value": {
				"Type": "number",
				"Default": -10,
				"Min": 0,
				"Max": NaN
			}
		},
		"PressureDrop_Viscosity": {
			"Class": "Input",
			"Tooltip": "Viscosity of water at room temperature is about 1 cP",
			"Value": {
				"Type": "number",
				"Default": 1,
				"Min": 0,
				"Max": NaN
			}
		},
		"Injection_NeedleSeatDiameter": {
			"Class": "Input",
			"Tooltip": "Standard needle seat capillaries are typically 120 µm i.d.; low dispersion seat capillaries are typically 75 µm i.d.",
			"Value": {
				"Type": "number",
				"Default": 75,
				"Min": 0,
				"Max": NaN
			}
		},
		"Injection_NeedleSeatLength": {
			"Class": "Input",
			"Tooltip": "A typical needle seat capillary is about 50 mm long",
			"Value": {
				"Type": "number",
				"Default": 50,
				"Min": 0,
				"Max": NaN
			}
		},
		"Injection_Volume": {
			"Class": "Input",
			"Tooltip": "",
			"Value": {
				"Type": "number",
				"Default": 0.5,
				"Min": 0,
				"Max": NaN
			}
		},
		"Tubing_PreColumn_Diameter": {
			"Class": "Input",
			"Tooltip": "",
			"Value": {
				"Type": "number",
				"Default": 75,
				"Min": 0,
				"Max": NaN
			}
		},
		"Tubing_PreColumn_Length": {
			"Class": "Input",
			"Tooltip": "",
			"Value": {
				"Type": "number",
				"Default": 400,
				"Min": 0,
				"Max": NaN
			}
		},
		"Tubing_HeatExchanger_Diameter": {
			"Class": "Input",
			"Tooltip": "Standard heat exchanger capillaries are typically about 250 mm x 120 µm i.d.; low dispersion heat exchanger capillaries are typically about 250 mm x 75 µm i.d.",
			"Value": {
				"Type": "number",
				"Default": 75,
				"Min": 0,
				"Max": NaN
			}
		},
		"Tubing_HeatExchanger_Length": {
			"Class": "Input",
			"Tooltip": "Standard heat exchanger capillaries are typically about 250 mm x 120 µm i.d.; low dispersion heat exchanger capillaries are typically about 250 mm x 75 µm i.d.",
			"Value": {
				"Type": "number",
				"Default": 250,
				"Min": 0,
				"Max": NaN
			}
		},
		"Column_Diameter": {
			"Class": "Input",
			"Tooltip": "",
			"Value": {
				"Type": "number",
				"Default": 2.1,
				"Min": 0,
				"Max": NaN
			}
		},
		"Column_Length": {
			"Class": "Input",
			"Tooltip": "",
			"Value": {
				"Type": "number",
				"Default": 50, //10,
				"Min": 0,
				"Max": NaN
			}
		},
		"Column_TotalPorosity": {
			"Class": "Input",
			"Tooltip": "A typical value for columns packed with porous particles is 0.5. Superficially particles lead to slightly smaller values, and full porous particles lead to slightly larger values.",
			"Value": {
				"Type": "number",
				"Default": 0.5,
				"Min": 0,
				"Max": 1
			}
		},
		"Column_ParticleSize": {
			"Class": "Input",
			"Tooltip": "",
			"Value": {
				"Type": "number",
				"Default": 1.8,
				"Min": 0,
				"Max": NaN
			}
		},
		"Column_ReducedPlateHeight": {
			"Class": "Input",
			"Tooltip": "A reduced plate height of 2 is typical for the minimum in a plot of reduced plate height versus reduced mobile phase velocity. Moving to higher or lower velocities will lead to higher values of h.",
			"Value": {
				"Type": "number",
				"Default": 2,
				"Min": 0,
				"Max": NaN
			}
		},
		"Column_RetentionFactor": {
			"Class": "Input",
			"Tooltip": "When using gradient elution, k<sub>e</sub> is used, which is the local retention factor at the column exit. The range of k<sub>e</sub> for most gradient separations is 1-3.",
			"Value": {
				"Type": "number",
				"Default": 2,
				"Min": 0,
				"Max": NaN
			}
		},
		"Tubing_PostColumn_Diameter": {
			"Class": "Input",
			"Tooltip": "",
			"Value": {
				"Type": "number",
				"Default": 75,
				"Min": 0,
				"Max": NaN
			}
		},
		"Tubing_PostColumn_Length": {
			"Class": "Input",
			"Tooltip": "",
			"Value": {
				"Type": "number",
				"Default": 400,
				"Min": 0,
				"Max": NaN
			}
		},
		"FlowSplitting_SplitRatio": {
			"Class": "Input",
			"Tooltip": "1:X, e.g. X=1 for a  50% split = 1:1-ratio; for no split, X=0",
			"Value": {
				"Type": "number",
				"Default": 1,
				"Min": 0,
				"Max": NaN
			}
		},
		"Tubing_PostSplit_Diameter": {
			"Class": "Input",
			"Tooltip": "",
			"Value": {
				"Type": "number",
				"Default": 75,
				"Min": 0,
				"Max": NaN
			}
		},
		"Tubing_PostSplit_Length": {
			"Class": "Input",
			"Tooltip": "",
			"Value": {
				"Type": "number",
				"Default": 200, //400,
				"Min": 0,
				"Max": NaN
			}
		},
		"Detector_Theta": {
			"Class": "Input",
			"Tooltip": "Typical values for modern flow cells are 0.5-0.8",
			"Value": {
				"Type": "number",
				"Default": 0.5,
				"Min": 0,
				"Max": NaN
			}
		},
		"Detector_CellVolume": {
			"Class": "Input",
			"Tooltip": "",
			"Value": {
				"Type": "number",
				"Default": 0.5,
				"Min": 0,
				"Max": NaN
			}
		},



		"Injection_Theta": {
			"Class": "Output",
			"Tooltip": "This value is about 1 for injection volumes less than 1 µL. For volumes between 1 and 10 µL, the value increases linearly with volume. For volumes larger than 10 µL, the value is about 8.",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 2
			}
		},
		"Injection_Var_Hydrodynamic": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 2
			}
		},
		"Injection_Var": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 2
			}
		},
		"Tubing_PreColumn_Var": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 2
			}
		},
		"Tubing_HeatExchanger_Var": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 2
			}
		},
		"Column_DeadVolume": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 1
			}
		},
		"Column_PlateNumber": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 0
			}
		},
		"Column_Var": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 2
			}
		},
		"Tubing_PostColumn_Var": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 2
			}
		},
		"FlowSplitting_PostSplitFlowRate": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 3
			}
		},
		"Tubing_PostSplit_Var": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 2
			}
		},
		"Detector_Var": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 2
			}
		},



		"Contributions_Injection_Var": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 1
			}
		},
		"Contributions_Injection_Percent": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 1
			}
		},
		"Contributions_Tubing_PreColumn_Var": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 1
			}
		},
		"Contributions_Tubing_PreColumn_Percent": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 1
			}
		},
		"Contributions_Tubing_HeatExchanger_Var": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 1
			}
		},
		"Contributions_Tubing_HeatExchanger_Percent": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 1
			}
		},
		"Contributions_Column_Var": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 1
			}
		},
		"Contributions_Column_Percent": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 1
			}
		},
		"Contributions_Tubing_PostColumn_Var": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 1
			}
		},
		"Contributions_Tubing_PostColumn_Percent": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 1
			}
		},
		"Contributions_Tubing_PostSplit_Var": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 1
			}
		},
		"Contributions_Tubing_PostSplit_Percent": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 1
			}
		},
		"Contributions_Detector_Var": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 1
			}
		},
		"Contributions_Detector_Percent": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 1
			}
		},
		"Contributions_Total_Var": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 1
			}
		},
		"Contributions_Total_Percent": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 1
			}
		},



		"Column_ApparentEfficiency": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 0
			}
		},
		"Column_EfficiencyLoss": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 1
			}
		},



		"PressureDrop_Injection": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 1
			}
		},
		"PressureDrop_PreColumnTubing": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 1
			}
		},
		"PressureDrop_HeatExchangerTubing": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 1
			}
		},
		"PressureDrop_PostColumnTubing": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 1
			}
		},
		"PressureDrop_PostSplitTubing": {
			"Class": "Output",
			"Tooltip": "",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 1
			}
		},
		"PressureDrop_TubingTotal": {
			"Class": "Output",
			"Tooltip": "The pressure is calculated for three independent tubing zones: broken into five parts: 1) Needle seat capillary; 2) Pre-column tubing; 3) Heat exchanger; 4) Tubing between the column outlet and the split point; and 5) Tubing between the post-column split point and the detector.",
			"DisplayRounding": {
				"Type": "Decimals",
				"Value": 1
			}
		}
	};

	/*// Original Colors
	const colors = {
		"Injection": "#4472C4",
		"Tubing_PreColumn": "#ED7D31",
		"HeatExchanger": "#A5A5A5",
		"Column": "#FFC000",
		"Tubing_PostColumn": "#5B9BD5",
		"Tubing_PostSplit": "#70AD47",
		"Detector": "#264478"
	};*/

	// New Colors
	const colors = {
		"Injection": "#70AD47",
		"Tubing_PreColumn": "#ED7D31",
		"HeatExchanger": "#9671E1",
		"Column": "#FFC000",
		"Tubing_PostColumn": "#5B9BD5",
		"Tubing_PostSplit": "#B55392",
		"Detector": "#A6A6A6",
		"EfficiencyLossBackground_Midpoint": 25
	};
</script>


<!-- This script tag contains all of the code for the dispersion calculations -->
<script>
	function GetInputs(){
		let inputs = {};

		for(inputID in metadata){
			if(metadata[inputID].Class == "Input"){
				if(metadata[inputID].Value.Type == "number"){
					inputs[inputID] = Number(document.getElementById(inputID).value);
				} else {
					inputs[inputID] = document.getElementById(inputID).value;
				}
			}
		}

		return inputs;
	}

	function SetOutputs(variables){
		
		var variables_Inputs = {};
		var variables_Other = {};
		var variables_Outputs = {};
		var variables_Contributions_Var = {};
		var variables_Contributions_Percent = {};

		for(tmpName in variables){
			if(!Object.keys(metadata).includes(tmpName)){
				variables_Other[tmpName] = variables[tmpName];
				continue;
			}
			if(metadata[tmpName].Class == "Output"){
				if(tmpName.includes("Contributions")){
					if(tmpName.includes("_Var")){
						variables_Contributions_Var[tmpName] = variables[tmpName];
					} else {
						variables_Contributions_Percent[tmpName] = variables[tmpName];
					}
				} else {
					variables_Outputs[tmpName] = variables[tmpName];
				}
				if(metadata[tmpName].DisplayRounding.Type == "Decimals"){
					document.getElementById(tmpName).innerHTML = variables[tmpName].toFixed(metadata[tmpName].DisplayRounding.Value);
				} else if(metadata[tmpName].DisplayRounding.Type == "SigFigs"){
					document.getElementById(tmpName).innerHTML = variables[tmpName].toPrecision(metadata[tmpName].DisplayRounding.Value);
				}
			} else if(metadata[tmpName].Class == "Input"){
				variables_Inputs[tmpName] = variables[tmpName];
			}
		}

		EfficiencyLossBackground(variables.Column_EfficiencyLoss);

		drawChart(
			variables.Contributions_Injection_Var,
			variables.Contributions_Tubing_PreColumn_Var,
			variables.Contributions_Tubing_HeatExchanger_Var,
			variables.Contributions_Column_Var,
			variables.Contributions_Tubing_PostColumn_Var,
			variables.Contributions_Tubing_PostSplit_Var,
			variables.Contributions_Detector_Var
		);

		LogVariablesToConsole(variables_Inputs, variables_Other, variables_Outputs, variables_Contributions_Var, variables_Contributions_Percent);
	}

	function CalcBackpressure(Length,Diameter,Viscosity,FlowRate){
		return (128*(Viscosity/1000)/Math.PI)*((Length/1000)*(FlowRate/1000000/60)/Math.pow((Diameter/1000000),4))*0.00001;
	}

	function CalcVariance(Length,Diameter,DiffusionCoefficient,FlowRate){
		// Calculate the variance introduced a given tube's dimensions. (Part #, Eq. ##)
		//return ((Math.pow(Math.PI,2)*Math.pow((Length/1000),2)*Math.pow((Diameter/1000000),4))/(48+(384*Math.PI*(Length/1000)*DiffusionCoefficient/(FlowRate/60/1000000))))*1000000000000000000;
		var numerator = (Math.pow(Math.PI,2)*Math.pow((Length/1000),2)*Math.pow((Diameter/1000000),4));
		var denominator = (48+(384*Math.PI*(Length/1000)*DiffusionCoefficient/(FlowRate/60/1000000)));
		var variance = (numerator / denominator) * Math.pow(10,18);
		return variance;
	}

	function CalculateDispersion(){
		var variables = GetInputs();

		// Calculate the Diffusion Coefficient by calculating "[COEFFICIENT]*10^[EXPONENT]"
		variables.DiffusionCoefficient = variables.General_DiffusionCoefficient_Coefficient * Math.pow(10, variables.General_DiffusionCoefficient_Exponent);

		if(variables.Injection_Volume > 4){
			variables.Injection_Theta = (Math.pow(variables.Injection_Volume,2)/(3.1+Math.pow(variables.Injection_Volume,2)/9.6));
		} else if(variables.Injection_Volume < 1){
			variables.Injection_Theta = 1.1;
		} else {
			variables.Injection_Theta = (Math.pow(variables.Injection_Volume,2)/(1/1.1+((variables.Injection_Volume-1)/(4-1))*(4.766-0.909)));
		}

		// Calculate the Hydrodynamic Variance introduced by the Injector. (Part #, Eq. ##)
		variables.Injection_Var_Hydrodynamic = CalcVariance(variables.Injection_NeedleSeatLength,variables.Injection_NeedleSeatDiameter,variables.DiffusionCoefficient,variables.General_FlowRate);
		// Calculate the Variance introduced by the Injector. (Part #, Eq. ##)
		variables.Injection_Var = ((1/variables.Injection_Theta)*Math.pow(variables.Injection_Volume,2))+variables.Injection_Var_Hydrodynamic;
		variables.PressureDrop_Injection = CalcBackpressure(variables.Injection_NeedleSeatLength,variables.Injection_NeedleSeatDiameter,variables.PressureDrop_Viscosity,variables.General_FlowRate);

		// Calculate the Variance introduced by the Pre-Column Tubing. (Part #, Eq. ##)
		variables.Tubing_PreColumn_Var = CalcVariance(variables.Tubing_PreColumn_Length,variables.Tubing_PreColumn_Diameter,variables.DiffusionCoefficient,variables.General_FlowRate);
		variables.PressureDrop_PreColumnTubing = CalcBackpressure(variables.Tubing_PreColumn_Length,variables.Tubing_PreColumn_Diameter,variables.PressureDrop_Viscosity,variables.General_FlowRate);

		// Calculate the Variance introduced by the Heat Exchanger. (Part #, Eq. ##)
		variables.Tubing_HeatExchanger_Var = CalcVariance(variables.Tubing_HeatExchanger_Length,variables.Tubing_HeatExchanger_Diameter,variables.DiffusionCoefficient,variables.General_FlowRate);
		variables.PressureDrop_HeatExchangerTubing = CalcBackpressure(variables.Tubing_HeatExchanger_Length,variables.Tubing_HeatExchanger_Diameter,variables.PressureDrop_Viscosity,variables.General_FlowRate);

		// Calculate the Dead Volume inside of the Column. (Part #, Eq. ##)
		variables.Column_DeadVolume = Math.PI*Math.pow((variables.Column_Diameter/2/10),2)*(variables.Column_Length/10)*variables.Column_TotalPorosity*1000;
		// Calculate the Plate Number of the Column. (Part #, Eq. ##)
		variables.Column_PlateNumber = (variables.Column_Length/(variables.Column_ReducedPlateHeight*(variables.Column_ParticleSize/1000)));
		// Calculate the Variance introduced by the Column. (Part #, Eq. ##)
		variables.Column_Var = (Math.pow(variables.Column_DeadVolume,2)/variables.Column_PlateNumber)*Math.pow((1+variables.Column_RetentionFactor),2);

		// Calculate the Variance introduced by the Post-Column Tubing. (Part #, Eq. ##)
		variables.Tubing_PostColumn_Var = CalcVariance(variables.Tubing_PostColumn_Length,variables.Tubing_PostColumn_Diameter,variables.DiffusionCoefficient,variables.General_FlowRate);
		variables.PressureDrop_PostColumnTubing = CalcBackpressure(variables.Tubing_PostColumn_Length,variables.Tubing_PostColumn_Diameter,variables.PressureDrop_Viscosity,variables.General_FlowRate);

		// Calculate the post-split flow rate.
		variables.FlowSplitting_PostSplitFlowRate = variables.General_FlowRate / (variables.FlowSplitting_SplitRatio + 1);

		// Calculate the Variance introduced by the Post-Split Tubing. (Part #, Eq. ##)
		variables.Tubing_PostSplit_Var = CalcVariance(variables.Tubing_PostSplit_Length,variables.Tubing_PostSplit_Diameter,variables.DiffusionCoefficient,variables.FlowSplitting_PostSplitFlowRate);
		variables.PressureDrop_PostSplitTubing = CalcBackpressure(variables.Tubing_PostSplit_Length,variables.Tubing_PostSplit_Diameter,variables.PressureDrop_Viscosity,variables.FlowSplitting_PostSplitFlowRate);

		// Calculate the Variance introduced by the Detector. (Part #, Eq. ##)
		variables.Detector_Var = Math.pow(variables.Detector_CellVolume,2)/variables.Detector_Theta;

		// Set Injection_Var and Tubing_PreColumn_Var to 0 if using Gradient Elution Mode.
		if(variables.General_ElutionMode == "Gradient"){
			variables.Injection_Var = 0;
			variables.Tubing_PreColumn_Var = 0;
			variables.Tubing_HeatExchanger_Var = 0;
		}

		// Set Detector_Var to 0 if NOT using UV detection.
		if(variables.General_UV_Detection == "No"){
			variables.Detector_Var = 0;
		}

		// Calculate the Total Variance introduced by the System. (Part #, Eq. ##)
		variables.TotalVariance = variables.Injection_Var + variables.Tubing_PreColumn_Var + variables.Tubing_HeatExchanger_Var + variables.Column_Var + variables.Tubing_PostColumn_Var + variables.Tubing_PostSplit_Var + variables.Detector_Var;

		variables.PressureDrop_TubingTotal = variables.PressureDrop_Injection + variables.PressureDrop_PreColumnTubing + variables.PressureDrop_HeatExchangerTubing + variables.PressureDrop_PostColumnTubing + variables.PressureDrop_PostSplitTubing;

		variables.Contributions_Correction_Factor = Math.pow((variables.FlowSplitting_PostSplitFlowRate / variables.General_FlowRate),2);

		variables.Contributions_Injection_Var = variables.Injection_Var * variables.Contributions_Correction_Factor;
		variables.Contributions_Tubing_PreColumn_Var = variables.Tubing_PreColumn_Var * variables.Contributions_Correction_Factor;
		variables.Contributions_Tubing_HeatExchanger_Var = variables.Tubing_HeatExchanger_Var * variables.Contributions_Correction_Factor;
		variables.Contributions_Column_Var = variables.Column_Var * variables.Contributions_Correction_Factor;
		variables.Contributions_Tubing_PostColumn_Var = variables.Tubing_PostColumn_Var * variables.Contributions_Correction_Factor;
		variables.Contributions_Tubing_PostSplit_Var = variables.Tubing_PostSplit_Var;
		variables.Contributions_Detector_Var = variables.Detector_Var;

		variables.Contributions_Total_Var = 
			variables.Contributions_Injection_Var + 
			variables.Contributions_Tubing_PreColumn_Var + 
			variables.Contributions_Tubing_HeatExchanger_Var + 
			variables.Contributions_Column_Var + 
			variables.Contributions_Tubing_PostColumn_Var + 
			variables.Contributions_Tubing_PostSplit_Var + 
			variables.Contributions_Detector_Var;

		variables.Column_ApparentEfficiency = variables.Column_PlateNumber * (variables.Contributions_Column_Var / variables.Contributions_Total_Var);
		variables.Column_EfficiencyLoss = 100*((variables.Column_PlateNumber - variables.Column_ApparentEfficiency) / variables.Column_PlateNumber);

		variables.Contributions_Injection_Percent = (variables.Contributions_Injection_Var/variables.Contributions_Total_Var)*100;
		variables.Contributions_Tubing_PreColumn_Percent = (variables.Contributions_Tubing_PreColumn_Var/variables.Contributions_Total_Var)*100;
		variables.Contributions_Tubing_HeatExchanger_Percent = (variables.Contributions_Tubing_HeatExchanger_Var/variables.Contributions_Total_Var)*100;
		variables.Contributions_Column_Percent = (variables.Contributions_Column_Var/variables.Contributions_Total_Var)*100;
		variables.Contributions_Tubing_PostColumn_Percent = (variables.Contributions_Tubing_PostColumn_Var/variables.Contributions_Total_Var)*100;
		variables.Contributions_Tubing_PostSplit_Percent = (variables.Contributions_Tubing_PostSplit_Var/variables.Contributions_Total_Var)*100;
		variables.Contributions_Detector_Percent = (variables.Contributions_Detector_Var/variables.Contributions_Total_Var)*100;
		variables.Contributions_Total_Percent = (variables.Contributions_Total_Var/variables.Contributions_Total_Var)*100;

		SetOutputs(variables);
	}
</script>

<!-- This script tag loads the Google Charts library -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- This script tag contains all of the code for the pie chart -->
<script>
	// Load google charts
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(CalculateDispersion);

	// Draw the chart and set the chart values
	function drawChart(Injection,Tubing_PreColumn,Tubing_HeatExchanger,Column,Tubing_PostColumn,Tubing_PostSplit,Detector) {
		var chartWidth = document.getElementById("Chart_Variances").clientWidth * 1.0;
		var chartHeight = document.getElementById("Chart_Variances").clientHeight * 1.0;

		var data = google.visualization.arrayToDataTable([
		['Source', 'Variance'],
		['Injection', Injection],
		['Tubing, Pre-Column', Tubing_PreColumn],
		['Heat Exchanger', Tubing_HeatExchanger],
		['Column', Column],
		['Tubing, Post-Column', Tubing_PostColumn],
		['Tubing, Post-Split', Tubing_PostSplit],
		['Detector', Detector]
		]);

		var options = {};
		options.colors = [colors.Injection, colors.Tubing_PreColumn, colors.HeatExchanger, colors.Column, colors.Tubing_PostColumn, colors.Tubing_PostSplit, colors.Detector];
		options.chartArea = {'width':chartWidth,'height':chartHeight};
		options.width = document.getElementById("Chart_Variances").clientWidth;
		options.height = document.getElementById("Chart_Variances").clientHeight;
		options.legend = {position: 'none'};
		options.pieSliceText = 'label';
		options.pieStartAngle = 0;
		options.tooltip = {'trigger': 'none'};

		// Display the chart inside the <div> element with id="Chart_Variances"
		var chart = new google.visualization.PieChart(document.getElementById('Chart_Variances'));

		// The select handler. Call the chart's getSelection() method
		function selectHandler() {
			if(chart.getSelection().length == 0){
				FocusMenu(-1);
			} else {
				FocusMenu(chart.getSelection()[0].row + 1);
			}
		}

		// Listen for the 'select' event, and call my function selectHandler() when
		// the user selects something on the chart.
		google.visualization.events.addListener(chart, 'select', selectHandler);

		// Draw the chart
		chart.draw(data, options);
	}

	function FocusMenu(selectedItemRow){
		document.getElementById("Table_General").hidden = true;
		document.getElementById("Table_Injection").hidden = true;
		document.getElementById("Table_Tubing_PreColumn").hidden = true;
		document.getElementById("Table_Tubing_HeatExchanger").hidden = true;
		document.getElementById("Table_Column").hidden = true;
		document.getElementById("Table_Tubing_PostColumn").hidden = true;
		document.getElementById("Table_FlowSplitting").hidden = true;
		document.getElementById("Table_Tubing_PostSplit").hidden = true;
		document.getElementById("Table_Detector").hidden = true;

		switch(selectedItemRow) {
				case 0:
					document.getElementById("Table_General").hidden = false;
					break;
				case 1:
					document.getElementById("Table_Injection").hidden = false;
					break;
				case 2:
					document.getElementById("Table_Tubing_PreColumn").hidden = false;
					break;
				case 3:
					document.getElementById("Table_Tubing_HeatExchanger").hidden = false;
					break;
				case 4:
					document.getElementById("Table_Column").hidden = false;
					break;
				case 5:
					document.getElementById("Table_Tubing_PostColumn").hidden = false;
					break;
				case 6:
					document.getElementById("Table_FlowSplitting").hidden = false;
					document.getElementById("Table_Tubing_PostSplit").hidden = false;
					break;
				case 7:
					document.getElementById("Table_Detector").hidden = false;
					break;
			}
	}
</script>

<!-- This script tag contains all of the code for custom element style calculations -->
<script>
	function GetDateString_addLeadingZeros(value, numDigits){
		var valueString = "";
		for(var digitNum = 2; digitNum <= numDigits; digitNum++){
			if(value < Math.pow(10,digitNum-1)){
				valueString += "0";
			}
		}
		return (valueString + value);
	}

	function GetDateString(){
		var d = new Date();
		var Year = GetDateString_addLeadingZeros(d.getFullYear(), 4);
		var Month = GetDateString_addLeadingZeros(d.getMonth()+1, 2);
		var Day = GetDateString_addLeadingZeros(d.getDate(), 2);
		var Hour = GetDateString_addLeadingZeros(d.getHours(), 2);
		var Minute = GetDateString_addLeadingZeros(d.getMinutes(), 2);
		var Second = GetDateString_addLeadingZeros(d.getSeconds(), 2);
		var Millisecond = GetDateString_addLeadingZeros(d.getMilliseconds(), 3);
		return (""+Year+Month+Day+"_"+Hour+Minute+Second+"_"+Millisecond);
	}

	function SetInputsToDefaults(){
		for(key in metadata){
			if(metadata[key].Class == "Input"){
				if(metadata[key].Value.Type == "number"){
					document.getElementById(key).value = metadata[key].Value.Default;
				} else if(metadata[key].Value.Type == "select") {
					document.getElementById(key).value = metadata[key].Value.Default;
				}
			}
		}
	}

	function AssignTooltipToElement(key){
		if(metadata[key].Tooltip != ""){
			if(metadata[key].Class == "Input"){
				document.getElementById(key).parentElement.parentElement.firstElementChild.style.position = "relative";
				document.getElementById(key).parentElement.parentElement.firstElementChild.addEventListener("mouseover", function(){createTooltip(this, key);});
				document.getElementById(key).parentElement.parentElement.firstElementChild.addEventListener("mouseout", function(){deleteTooltip(key);});
			} else {
				document.getElementById(key).parentElement.firstElementChild.style.position = "relative";
				document.getElementById(key).parentElement.firstElementChild.addEventListener("mouseover", function(){createTooltip(this, key);});
				document.getElementById(key).parentElement.firstElementChild.addEventListener("mouseout", function(){deleteTooltip(key);});
			}
		}
	}

	function createTooltip(ele, eleID){
		var tooltipElement = document.createElement("P");
		tooltipElement.id = "tooltip_"+eleID;
		tooltipElement.style.position = "absolute"; //https://www.w3schools.com/jsref/prop_style_position.asp
		tooltipElement.style.width = (ele.parentElement.clientWidth - 10) + "px";
		tooltipElement.style.bottom = "20px";
		tooltipElement.style.padding = "5px";
		tooltipElement.style.borderRadius = "6px";
		tooltipElement.style.backgroundColor = "black";
		tooltipElement.style.color = "white";
		tooltipElement.innerHTML = metadata[eleID].Tooltip;
		tooltipElement.style.zIndex = "1";

		ele.appendChild(tooltipElement);
	}

	function deleteTooltip(eleID){
		document.getElementById("tooltip_"+eleID).remove();
	}

	function PageStyling_GetElement(ID){
		tmp = {};
	
		tmp.element = document.getElementById(ID);
		tmp.width = document.getElementById(ID).style.width;
		tmp.height = document.getElementById(ID).style.height;
		tmp.clientWidth = document.getElementById(ID).clientWidth;
		tmp.clientHeight = document.getElementById(ID).clientHeight;
		tmp.backgroundColor = document.getElementById(ID).style.backgroundColor;
	
		console.log(tmp);
	}

	function PageStyling_DIV_PieChart(){
		var ele = {};
		ele["Chart_Variances"] = document.getElementById("Chart_Variances");
		ele["Chart_Variances"].style.width = "100%";
		ele["Chart_Variances"].style.height = ele["Chart_Variances"].clientWidth + "px";
		ele["Chart_Variances"].style.backgroundColor = "black";
	}

	function PageStyling_SectionHeaders(){
		var SectionHeaders = document.getElementsByClassName("SectionHeader");
		for(var indx = 0; indx < SectionHeaders.length; indx++){
			SectionHeaders[indx].style.fontSize = "16px";
			SectionHeaders[indx].style.fontWeight = "bold";
			SectionHeaders[indx].style.textAlign = "center";
			SectionHeaders[indx].style.backgroundColor = "#b5c6d0";
			SectionHeaders[indx].style.margin = "0px";
			SectionHeaders[indx].style.marginTop = "7px";//"14px";
			SectionHeaders[indx].style.paddingTop = "6px";
			SectionHeaders[indx].style.paddingBottom = "6px";
			SectionHeaders[indx].style.border = "2px solid black";
		}
	}

	function ToggleHidden(ID){
		document.getElementById(ID).hidden = !document.getElementById(ID).hidden;
	}

	function EfficiencyLossBackground(percentLost){
		let midpoint = colors.EfficiencyLossBackground_Midpoint;
		if(percentLost >= midpoint){
			var Red = "FF";
			//var Green = Math.round(((50-(percentLost-50))/50)*255).toString(16).toUpperCase();
			var Green = (255-Math.round(((percentLost-midpoint)/(100-midpoint))*255)).toString(16).toUpperCase();
			if(Green.length < 2){ Green = "0"+Green; }
		} else {
			var Green = "FF";
			var Red = Math.round((percentLost/midpoint)*255).toString(16).toUpperCase();
			if(Red.length < 2){ Red = "0"+Red; }
		}
		document.getElementById("Column_EfficiencyLoss_Row").style.backgroundColor = ("#"+Red+Green+"00");
	}
</script>

<!-- This script tag contains all of the code for JSON object manipulation -->
<script>
	function SortJSON(unordered){
		const ordered = Object.keys(unordered).sort().reduce(
			(obj, key) => {
				obj[key] = unordered[key];
				return obj;
			},
			{}
		);
		return ordered;
	}

	function ConcatJSON(obj1, obj2){
		for(var key in obj2) {
			obj1[key] = obj2[key];
		}
		return obj1;
	}

	function JSON_KeyIncludes(obj, searchKey){
		objNew = {};
		for(var key in obj){
			if(key.includes(searchKey)){
				objNew[key] = obj[key];
			}
		}
		return objNew;
	}

	function JSON_KeyNotIncludes(obj, searchKey){
		objNew = {};
		for(var key in obj){
			if(key.includes(searchKey)){
				// Do Nothing
			} else {
				objNew[key] = obj[key];
			}
		}
		return objNew;
	}
</script>

<!-- This script tag contains all of the code for fancy console logs -->
<script>
	function LogVariablesToConsole(variables_Inputs, variables_Other, variables_Outputs, variables_Contributions_Var, variables_Contributions_Percent){
		var variables_All = {};
		variables_All = ConcatJSON(variables_All, variables_Inputs);
		variables_All = ConcatJSON(variables_All, variables_Other);
		variables_All = ConcatJSON(variables_All, variables_Outputs);
		variables_All = ConcatJSON(variables_All, variables_Contributions_Var);
		variables_All = ConcatJSON(variables_All, variables_Contributions_Percent);

		console.groupCollapsed(GetDateString());
			
			console.groupCollapsed("Inputs");
				console.group("General"); console.table(ConcatJSON(JSON_KeyIncludes(variables_Inputs, "General_"),JSON_KeyIncludes(variables_Inputs, "PressureDrop_"))); console.groupEnd();
				console.group("Injection"); console.table(JSON_KeyIncludes(variables_Inputs, "Injection_")); console.groupEnd();
				console.group("Pre-Column Tubing"); console.table(JSON_KeyIncludes(variables_Inputs, "Tubing_PreColumn_")); console.groupEnd();
				console.group("Heat Exchanger"); console.table(JSON_KeyIncludes(variables_Inputs, "Tubing_HeatExchanger_")); console.groupEnd();
				console.group("Column"); console.table(JSON_KeyNotIncludes(JSON_KeyIncludes(variables_Inputs, "Column_"),"Tubing_")); console.groupEnd();
				console.group("Post-Column Tubing"); console.table(JSON_KeyIncludes(variables_Inputs, "Tubing_PostColumn_")); console.groupEnd();
				console.group("Flow Splitting"); console.table(JSON_KeyIncludes(variables_Inputs, "FlowSplitting_")); console.groupEnd();
				console.group("Post-Split Tubing"); console.table(JSON_KeyIncludes(variables_Inputs, "Tubing_PostSplit_")); console.groupEnd();
				console.group("Detector"); console.table(JSON_KeyIncludes(variables_Inputs, "Detector_")); console.groupEnd();
			console.groupEnd();
			
			console.groupCollapsed("Intermediate Values");
				console.table(variables_Other);
			console.groupEnd();

			console.groupCollapsed("Outputs");
				console.group("Injection"); console.table(JSON_KeyIncludes(variables_Outputs, "Injection_")); console.groupEnd();
				console.group("Pre-Column Tubing"); console.table(JSON_KeyIncludes(variables_Outputs, "Tubing_PreColumn_")); console.groupEnd();
				console.group("Heat Exchanger"); console.table(JSON_KeyIncludes(variables_Outputs, "Tubing_HeatExchanger_")); console.groupEnd();
				console.group("Column"); console.table(JSON_KeyNotIncludes(JSON_KeyIncludes(variables_Outputs, "Column_"),"Tubing_")); console.groupEnd();
				console.group("Post-Column Tubing"); console.table(JSON_KeyIncludes(variables_Outputs, "Tubing_PostColumn_")); console.groupEnd();
				console.group("Flow Splitting"); console.table(JSON_KeyIncludes(variables_Outputs, "FlowSplitting_")); console.groupEnd();
				console.group("Post-Split Tubing"); console.table(JSON_KeyIncludes(variables_Outputs, "Tubing_PostSplit_")); console.groupEnd();
				console.group("Detector"); console.table(JSON_KeyIncludes(variables_Outputs, "Detector_")); console.groupEnd();
				console.group("Pressure Drop"); console.table(JSON_KeyIncludes(variables_Outputs, "PressureDrop_")); console.groupEnd();
			console.groupEnd();

			console.groupCollapsed("Variance Table");
				console.table((variables_Contributions_Var));
				console.table((variables_Contributions_Percent));
			console.groupEnd();

			console.log(variables_All);

		console.groupEnd();
	}
</script>

<!-- This script tag contains all of the code that is executed once when the page is first loaded -->
<script>
	SetInputsToDefaults();
	for(key in metadata){ AssignTooltipToElement(key); }
	PageStyling_SectionHeaders()
	PageStyling_DIV_PieChart();
	for(key in colors){ document.getElementById("colors_"+key).style.backgroundColor = colors[key]; }
</script>

<?php
	include($_SERVER['DOCUMENT_ROOT'].'/scaffold/footer.php');
?>