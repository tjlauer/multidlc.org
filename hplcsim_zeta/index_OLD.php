﻿<?php
	$local_root = 'http://' . $_SERVER['SERVER_NAME'];	
	//$selected_tab = 5;
	//include($_SERVER['DOCUMENT_ROOT']. '/scaffold/header.php');
	include($_SERVER['DOCUMENT_ROOT']. '/hplcsim_zeta/grabdata.php');
?>

<html>
	<head>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111207257-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			
			gtag('config', 'UA-111207257-1');
		</script>
		<title>Multi-Dimensional Separations</title>
		<link rel="stylesheet" type="text/css" href="sim_css.css">
		<meta charset="utf-8">
		<link rel="icon" href="../images/mini-icon.png">
		<link rel="shortcut icon" href="../images/mini-icon.png">
		<script src="http://d3js.org/d3.v4.min.js"></script>
		<script src="../d3.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
		<script type="text/javascript" src="../jquery.js"></script>
		<script type="text/javascript" src="../toolkit/pressure_prediction.js"></script>
		<script type="text/javascript" src="simulator.js"></script>
		<script type="text/javascript" src="../master-js.js"></script>
		<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
		<style></style>
	</head>
	<body onload="fadeIn();">
		<div id="everything">
			<div class="bar"></div>
			<div id="topYellowBar" class="bar"></div>
			<img src="../images/column.png" alt="Multi-D LC" id="column">
			<div style="min-width:1060px">
				<div id="left">
					<img src="../images/icon.png" alt="Multi-D LC" id="logo">
					<div id="corner"></div>
				</div>
				<div id="middle">
					<header>
						<div id="tfheader">
							<!--<form id="tfnewsearch" method="get" action="http://www.google.com">
								<input type="text" id="tfq" class="tftextinput searchOurWebsite" name="q" size="21" maxlength="120" value="Search our website">
								<input type="submit" value=">" class="tfbutton">
							</form>-->
							<div class="tfclear"></div>
						</div>
						<a href="http://gustavus.edu">
							<div id="banner" onmouseover="lower($(this))" onmouseleave="raise($(this))" style="top: -50px;">
								<img src="../images/gac_logo.png" alt="GAC" id="gac" style="width:76px">
							</div>
						</a>
						<a href="https://www.uva.nl/en">
						<div id="bannerUVA" onmouseover="lower($(this))" onmouseleave="raise($(this))">
							<img src="../images/uva_logo.png" alt="UAV" id="UVA" style="width:76px"></img>
						</div> </a>
						<h1><br>Multi-Dimensional Separations</h1>

						<div style="color:#FDBD2D;float:left;position:relative;top:-68.6px;">
							A site dedicated to multi-dimensional separations with an emphasis on the liquid phase.
						</div>

						<img src="../images/peak.png" alt="peak" class="peak" id="peak" "="" style="left: 28px; z-index: 1; height: 23px; padding-top: 5px; width: 80px; opacity: 1;">
						<img src="../images/peak2.png" alt="peak" class="peak" id="peak2" "="" style="z-index: -2; opacity: 1; height: 23px; padding-top: 5px; width: 80px; left: -57px;">
						<script>
							selected_tab = 5;							setPeak(selected_tab);
							menuSelect(selected_tab);
						</script>
						<menu style="position:relative;top:-36px;">
							<ul class="cf">
								<li class="unselectable" onmouseover="menuSelect(0)" onmouseleave="menuSelect(selected_tab);">
									<a href="../">Home</a>
								</li>
								<li class="unselectable" onmouseover="menuSelect(1)" onmouseleave="menuSelect(selected_tab);">
									<a href="../about/about">About</a>
								</li>
								<li class="unselectable" onmouseover="menuSelect(2)" onmouseleave="menuSelect(selected_tab);">
									<a href="../hplc_resources">Resources</a>
								</li>
								<li class="unselectable" onmouseleave="menuSelect(selected_tab);hideLiteratureDropdown();">
									<a class="dropdown" id="LiteratureDropdownA" onmouseover="menuSelect(3);showLiteratureDropdown();" href="../literature/applications-multidlc" style="width:110px">Literature</a>
									<ul id="LiteratureDropdownUL">
										<li>
											<a href="../literature/2DLC-Applications">Applications of Multi-Dimensional LC</a>
										</li>
										<li>
											<a href="../literature/2D-LC">Database of Technical Papers</a>
										</li>
										<li>
											<a href="../literature/reviews">Reviews</a>
										</li>
										<!--<li>
											<a href="../literature/top-30">Top 30</a>
										</li>
										<li>
											<a href="../literature/top-10">Top Ten</a>
										</li>-->
										<li>
											<a href="../books">Books</a>
										</li>
									</ul>
								</li>
								<li class="unselectable" onmouseover="menuSelect(4)" onmouseleave="menuSelect(selected_tab);">
									<a href="../terminology">Terminology</a>
								</li>
								<li class="unselectable" onmouseleave="menuSelect(selected_tab);hideToolsDropdown();">
									<a class="dropdown" id="ToolsDropdownA" onmouseover="menuSelect(5);showToolsDropdown();" href="../toolkit/tools" style="width:110px">Tools</a>
									<ul id="ToolsDropdownUL">
										<li>
											<a href="../hplcsim/hplcsim.html">1D-LC Simulator</a>
										</li>
									</ul>
								</li>
							</ul>
							<cap id="column"></cap>
						</menu>
						<script>
							function showLiteratureDropdown(){
								//console.log("showLiteratureDropdown()");
								document.getElementById("LiteratureDropdownUL").style.opacity = "0.9";
								document.getElementById("LiteratureDropdownUL").style.visibility = "visible";
								document.getElementById("LiteratureDropdownA").className = "dropdownSelected";
							}
							function hideLiteratureDropdown(){
								//console.log("hideLiteratureDropdown()");
								document.getElementById("LiteratureDropdownUL").style.opacity = "0";
								document.getElementById("LiteratureDropdownUL").style.visibility = "hidden";
								document.getElementById("LiteratureDropdownA").className = "dropdown";
							}
							function showToolsDropdown(){
								//console.log("showToolsDropdown()");
								document.getElementById("ToolsDropdownUL").style.opacity = "0.9";
								document.getElementById("ToolsDropdownUL").style.visibility = "visible";
								document.getElementById("ToolsDropdownA").className = "dropdownSelected";
							}
							function hideToolsDropdown(){
								//console.log("hideToolsDropdown()");
								document.getElementById("ToolsDropdownUL").style.opacity = "0";
								document.getElementById("ToolsDropdownUL").style.visibility = "hidden";
								document.getElementById("ToolsDropdownA").className = "dropdown";
							}
							hideLiteratureDropdown();
							hideToolsDropdown();
						</script>
					</header>
					<main style="position:relative;left: -128px;max-height:700px;min-height:700px;width:1091px;top:-13.4px;">
						<div id="content" onclick="isMouseOverDropdownMenu();">
							<div id="header">
								<!--<table width="1050px">
									<tr>
										<td>
											<div id="title" >
												HPLC Simulator
											</div>
										</td>
										<td>
											<input type="button" value="Reset" onclick="resetMenus()">
										</td>
										<td>
											<a href="../hplcsimabout/about.html"><input class="title_button" type="button" value="About"></a>
											<a href="../hplcsimabout/whats_new.html"><input class="title_button" type="button" value="What's New"></a>
										</td>
										<td style="padding-left:10px;">
											<input class="export_button" type="button" value="Export Chromatogram" onclick="logExportFileData_Full()">
											<h3 style="width:50px; height:25px; float:right;">Version:<br>3.0.3</h3>
											<input class="export_button" type="button" value="Export Selected Compound" onclick="logExportFileData_Selected()">
										</td>
									</tr>
								</table>-->
								<table width="1050px">
									<tr>
										<td style="width:25%">
											<div id="title">
												HPLC Simulator
											</div>
										</td>
										<td style="width:8%">
											<input type="button" value="Reset" onclick="resetMenus()" disabled>
										</td>
										<td style="width:26%">
											<a href="../hplcsimabout/about.html"><input class="title_button" type="button" value="About"></a>
											<a href="../hplcsimabout/whats_new.html"><input class="title_button" type="button" value="What's New"></a>
										</td>
										<td style="width:16%">
											<a href="../hplcsimabout/instructor_resources.html"><input class="title_button" type="button" value="Instructor Resources" style="width:150px"></a>
										</td>
										<td>
											<input class="export_button" type="button" value="Export Chromatogram" onclick="logExportFileData_Full()">
											<h3 style="width:50px; height:25px; float:right; color:goldenrod;">Version:<br>ζ ζ ζ</h3>
											<input class="export_button" type="button" value="Export Selected Compound" onclick="logExportFileData_Selected()">
										</td>
									</tr>
								</table>
							</div>
							<div id="params">
								<!--
									Languages
								-->
								<div class="menu_options" onmouseenter="setDesc('', '')" onmouseleave="setDesc('', '')" hidden>
									<button id="languages_button" class="menu_button" onclick="openMenu('languages');">Languages</button>
								</div>
								<div id="languages" class="menu_section">
									<table>
										<form action="">
											<tr>
												<td colspan="2">
													<input id="english_radio" class="language_selection" type="radio" name="language_selection" value="English" onchange="setLanguage();" checked>English
												</td>
											</tr>
											<tr>
												<td colspan="2">
													<input id="german_radio" class="language_selection" type="radio" name="language_selection" value="German" onchange="setLanguage();">Deutsch
												</td>
											</tr>
											<tr>
												<td colspan="2">
													<input id="spanish_radio" class="language_selection" type="radio" name="language_selection" value="Spanish" onchange="setLanguage();">Español
												</td>
											</tr>
											<tr>
												<td colspan="2">
													<input id="french_radio" class="language_selection" type="radio" name="language_selection" value="French" onchange="setLanguage();">Français
												</td>
											</tr>
										</form>
									</table>
								</div>
								<!-- 
									Manage Compounds
								-->
								<div class="menu_options" onmouseenter="setDesc('Manage Compounds', 'Manipulate the compounds used in the experiment.')" onmouseleave="setDesc('', '')">
									<button id="add_compound_button" class="menu_button" onclick="openMenu('manage_compound');"><!--Manage Compounds-->Manage Compounds</button>
								</div>
								<div id="manage_compound" class='menu_section'>
									<div>
										<button id="custom_compound" class="compound_button" onclick="showCustom();" disabled>Custom Compound</button><br>
										<table id="add_custom_compound_table" hidden>
											<tr>
												<th>Name</th>
											</tr>
											<tr>
												<td><input type="text" class="add_custom_compound_input_text" id="add_custom_compound_name" onchange="checkCustom();"></td>
											</tr>
											<tr>
												<td><br></td>
											</tr>
											<tr>
												<th></th>
												<th>ACN</th>
												<th>MeOH</th>
											</tr>
											<tr>
												<th>lnkw int.</th>
												<td><input type="number" class="add_custom_compound_input_num" id="add_custom_compound_lnkw_int_ACN" onchange="checkCustom();"></td>
												<td><input type="number" class="add_custom_compound_input_num" id="add_custom_compound_lnkw_int_MeOH" onchange="checkCustom();"></td>
											</tr>
											<tr>
												<th>lnkw slope</th>
												<td><input type="number" class="add_custom_compound_input_num" id="add_custom_compound_lnkw_slope_ACN" onchange="checkCustom();"></td>
												<td><input type="number" class="add_custom_compound_input_num" id="add_custom_compound_lnkw_slope_MeOH" onchange="checkCustom();"></td>
											</tr><br>
											<tr>
												<th>S int.</th>
												<td><input type="number" class="add_custom_compound_input_num" id="add_custom_compound_s_int_ACN" onchange="checkCustom();"></td>
												<td><input type="number" class="add_custom_compound_input_num" id="add_custom_compound_s_int_MeOH" onchange="checkCustom();"></td>
											</tr>
											<tr>
												<th>S slope</th>
												<td><input type="number" class="add_custom_compound_input_num" id="add_custom_compound_s_slope_ACN" onchange="checkCustom();"></td>
												<td><input type="number" class="add_custom_compound_input_num" id="add_custom_compound_s_slope_MeOH" onchange="checkCustom();"></td>
											</tr>
											<tr colspan="2">
												<td><br><button id="add_custom_compound_submit_button" class="compound_button" onclick="addCustom();" disabled>Add Custom Compound</button><br></td>
											</tr>
											<tr>
												<td>-----------------------</td>
											</tr>
										</table>
									</div>
									<div hidden>
										<button id="loadAllCompounds_button" class="compound_button" onclick="loadAllCompounds();">Load All Compounds</button>
									</div>
									<div>
										<table id="all_compounds_table">
											<tr colspan="2">
												<th>Name</th>
											</tr>
										</table>
									</div>
								</div>
								<!--
									Mobile Phase Composition
								-->
								<div class="menu_options" onmouseenter="setDesc('Mobile Phase Composition', 'Manipulate aspects of the mobile phase used in the experiment.')" onmouseleave="setDesc('', '')">
									<button id="mobile_phase_button" class="menu_button" onclick="openMenu('mobile_phase_comp');">Mobile Phase Composition</button>
								</div>
								<div id="mobile_phase_comp" class="menu_section">
									<table>
										<tr>
											<td>Solvent A:</td>
											<td class="dropdown_div">
												<button id="solvent_a" onclick="show('solvent_a')" class="dropbutton" onchange="calculatePeaks()" disabled>
													<div id="solvent_a_text" class='dropname'>Water</div>
													<div id='solvent_a_switch' class="switch">&#9660;</div>
												</button>
												<div id="solvent_a_dropdown" class="dropdown-content">
													<a onclick="select_option('Water', 'solvent_a'); show('solvent_a')">Water</a>
												</div>
											</td>
										</tr>
										<tr>
											<td>Solvent B:</td>
											<td class="dropdown_div">
												<button id="solvent_b" onclick="show('solvent_b')" class="dropbutton" onchange="calculatePeaks()">
													<div id='solvent_b_text' class='dropname'>Acetonitrile</div>
													<div id='solvent_b_switch' class="switch">&#9660;</div>
												</button>
												<div id="solvent_b_dropdown" class="dropdown-content">
													<a id="solvent_b_dropdown_ACN" onclick="select_option('Acetonitrile', 'solvent_b'); calculatePeaks(); show('solvent_b')">Acetonitrile</a>
													<a id="solvent_b_dropdown_MeOH" onclick="select_option('Methanol', 'solvent_b'); calculatePeaks(); show('solvent_b')">Methanol</a>
												</div>
											</td>
										</tr>
										<form action="">
											<tr>
												<td colspan="2">
													<input id="isocratic_radio" class="elution_mode" type="radio" name="elution_mode" value="Isocratic Elution Mode" onchange="calculatePeaks()" checked>Isocratic Elution Mode
												</td>
											</tr>
											<tr>
												<td colspan="2">
													<input id="gradient_radio" class="elution_mode" type="radio" name="elution_mode" value="Gradient Elution Mode" onchange="calculatePeaks()">Gradient Elution Mode
												</td>
											</tr>
											<tr>
												<td colspan="2" id="Solvent_B_Fraction_text">Solvent B Fraction (% v/v):<!--<br>WARNING: Going below 25% strains the program. Use at own discretion.--></td>
											</tr>
										</form>
									</table>
									<table>
										<tr>
											<td class="table_cell_slider" colspan="2" id="Solvent_B_Fraction_td">
												<input id="solvent_fraction_slider" class="slider" type="range" min="0" max="100" value="40" oninput="document.getElementById('solvent_fraction_comp').value = document.getElementById('solvent_fraction_slider').value;calculatePeaks();">
												<input class="number" type="number" step="any" id="solvent_fraction_comp" value="40" onchange="document.getElementById('solvent_fraction_slider').value = document.getElementById('solvent_fraction_comp').value; calculatePeaks();"/>
												<div id="solvent_b_slider" class="slider_ticks"></div>
											</td>
										</tr>
									</table>
									<table id="Gradient_Settings_Table" hidden>
										<tr>
											<th>Time (min)</th>
											<th>% B</th>
										</tr>
										<tr>
											<td><input type="number" value="0" disabled></td>
											<td><input type="number" id="Gradient_Phi_Init" value="5" onchange="calculatePeaks();"></td>
										</tr>
										<tr>
											<td><input type="number" id="Gradient_Time" value="5" onchange="calculatePeaks();"></td>
											<td><input type="number" id="Gradient_Phi_Final" value="95" onchange="calculatePeaks();"></td>
										</tr>
									</table><br>
									<input type="button" id="Gradient_Settings_Table_AddRow" value="+ Row" disabled hidden>
									<input type="button" id="Gradient_Settings_Table_RemoveRow" value="- Row" disabled hidden><br><br>
									<div id="Gradient_PreColumn_Volume">
										Pre-column volume:
										<table>
											<!--<tr>
												<td>Mixing:</td>
												<td><input type="number" id="Gradient_MixingVolume" value="200.0" onchange="calculatePeaks()"></td>
												<td>&mu;L</td>
											</tr>
											<tr>
												<td>Non-mixing:</td>
												<td><input type="number" id="Gradient_NonMixingVolume" value="200.0" onchange="calculatePeaks()"></td>
												<td>&mu;L</td>
											</tr>-->
											<tr>
												<td>Gradient Delay Volume:</td>
												<td><input type="number" id="Gradient_Delay_Volume" value="200.0" onchange="calculatePeaks()"></td>
												<td>&mu;L</td>
											</tr>
											<!--<tr>
												<td>Total dwell volume:</td>
												<td id="Gradient_PreColumn_Volume_DwellVolume"></td>
												<td>&mu;L</td>
											</tr>-->
											<tr>
												<td>Dwell time:</td>
												<td id="Gradient_PreColumn_Volume_DwellTime"></td>
												<td>min</td>
											</tr>
										</table>
									</div>
								</div>
								<!--
									Plot Options
								-->
								<div class="menu_options" onmouseenter="setDesc('Plot Options', 'Change what the graph looks like and what it displays.')" onmouseleave="setDesc('', '')" hidden>
									<button id="plot_options_button" class="menu_button" onclick="openMenu('plot_options');" onchange="calculatePeaks()" disabled><!--Plot Options-->Coming Soon! (Plot Options)</button>
								</div>
								<div id="plot_options" class="menu_section">
									<table>
										<tr><td>Second Plot:</td></tr>
										<tr><td><input type="radio" name="second_plot_options" value="no_plot" class="second_plot_options" onchange="calculatePeaks()" checked>No Plot</td></tr>
										<tr><td><input type="radio" name="second_plot_options" value="solvent_b_fraction" class="second_plot_options" onchange="calculatePeaks()">Solvent B Fraction</td></tr>
										<tr><td><input type="radio" name="second_plot_options" value="backpressure" class="second_plot_options" onchange="calculatePeaks()">Back Pressure</td></tr>
										<tr><td><input type="radio" name="second_plot_options" value="mobile_phase_viscosity" class="second_plot_options" onchange="calculatePeaks()">Mobile Phase Viscosity</td></tr>
										<tr><td><input type="radio" name="second_plot_options" value="retention_factor_of" class="second_plot_options">Retention Factor of:</td></tr>
										<tr>
											<td class="dropdown_div">
												<button id="retention_factor" onclick="show('retention_factor')" class="dropbutton">
													<div id="retention_factor_text" class='dropname'>Acetonitrile</div>
													<div id='retention_factor_switch' class="switch">&#9660;</div>
												</button>
												<div id="retention_factor_dropdown" class="dropdown-content">
													<a onclick="select_option('Acetonitrile', 'retention_factor')">Acetonitrile</a>
													<a onclick="select_option('Butylparaben', 'retention_factor')">Butylparaben</a>
													<a onclick="select_option('Propiopheneone', 'retention_factor')">Propiopheneone</a>
													<a onclick="select_option('Ethylparaben', 'retention_factor')">Ethylparaben</a>
													<a onclick="select_option('Propylparaben', 'retention_factor')">Propylparaben</a>
													<a onclick="select_option('Ketoprofen', 'retention_factor')">Ketoprofen</a>
													<a onclick="select_option('3-Nitrophenol', 'retention_factor')">3-Nitrophenol</a>
													<a onclick="select_option('4-Nitrophenol', 'retention_factor')">4-Nitrophenol</a>
												</div>
											</td>
										</tr>
										<tr><td><input type="radio" name="second_plot_options" value="position_along_column_of" class="second_plot_options" onchange="calculatePeaks()">Position Along Column of:</td></tr>
										<tr>
											<td class="dropdown_div">
												<button id="position_along_column" onclick="show('position_along_column')" class="dropbutton">
													<div id="position_along_column_text" class='dropname'>Acetylphenone</div>
													<div id='position_along_column_switch' class="switch">&#9660;</div>
												</button>
												<div id="position_along_column_dropdown" class="dropdown-content">
													<a onclick="select_option('Acetylphenone', 'position_along_column')">Acetylphenone</a>
													<a onclick="select_option('Benzophenone', 'position_along_column')">Benzophenone</a>
													<a onclick="select_option('Butylparaben', 'position_along_column')">Butylparaben</a>
													<a onclick="select_option('Propiopheneone', 'position_along_column')">Propiopheneone</a>
													<a onclick="select_option('Ethylparaben', 'position_along_column')">Ethylparaben</a>
													<a onclick="select_option('Propylparaben', 'position_along_column')">Propylparaben</a>
													<a onclick="select_option('Ketoprofen', 'position_along_column')">Ketoprofen</a>
													<a onclick="select_option('3-Nitrophenol', 'position_along_column')">3-Nitrophenol</a>
													<a onclick="select_option('4-Nitrophenol', 'position_along_column')">4-Nitrophenol</a>
												</div>
											</td>
										</tr>
									</table>
								</div>
								<!--
									Chromatographic Properties
								-->
								<div class="menu_options" onmouseenter="setDesc('Chromatographic Properties', 'Change and view experimental aspects such as Temperature, Flow Rate, and more.')" onmouseleave="setDesc('', '')">
									<button type="button" id="chromatographic_properties_button" class="menu_button" onclick="openMenu('chromatographic_properties');">Chromatographic Properties</button>
								</div>
								<div id="chromatographic_properties" class="menu_section">
									<table>
										<tr id="temperature_disabled_text" hidden>
											<td colspan="4"><b style="color:red">
												Temperature is <i>disabled</i> for this stationary phase.<br>These measurements have not yet been made.</b><br>
											</td>
										</tr>
										<tr id="temperature_input_rowOne" onmouseenter="setDesc('Temperature (&deg;C)', 'The temperature at which the experiment is ran.')" onmouseleave="setDesc('', '')">
											<td colspan="3">Temperature (&deg;C):</td>
										</tr>
										<tr id="temperature_input_rowTwo">
											<td colspan="3">
												<input onmouseenter="setDesc('Temperature (&deg;C)', 'The temperature at which the experiment is ran.<div>-----</div><div>Drag the slider to change the temperature.</div>')" onmouseleave="setDesc('', '')" id="temperature_slider" class="slider" type="range" min="10" max="150" value="40" oninput="document.getElementById('temperature_chrom').value = document.getElementById('temperature_slider').value; calculatePeaks();">
												<div id="temperature_slider_tick" class="slider_ticks"></div>
											</td>
											<td>
												<input onmouseenter="setDesc('Temperature (&deg;C)', 'The temperature at which the experiment is ran.<div>-----</div><div>Enter the temperature at which to run the experiment. Press Enter to apply.</div>')" onmouseleave="setDesc('', '')" class="number" type="number" step="any" id="temperature_chrom" value="40" onchange="document.getElementById('temperature_slider').value = document.getElementById('temperature_chrom').value; calculatePeaks();"/>
											</td>
										</tr>
										<tr onmouseenter="setDesc('Injection Volume', 'The volume of the mobile phase to analize during the experiment.')" onmouseleave="setDesc('', '')">
											<td>Injection Volume:</td>
											<td><input class="number" type="number" step="any" id="injection_volume_chrom" onchange="calculatePeaks()" value="5.0"/></td>
											<td>&mu;L</td>
										</tr>
										<tr onmouseenter="setDesc('Flow Rate', 'The speed at which the mobile phase is pushed through the stationary phase.')" onmouseleave="setDesc('', '')">
											<td>Flow Rate:</td>
											<td><input class="number" type="number" step="any" id="flow_rate_chrom" onchange="calculatePeaks()" value="2.0"/></td>
											<td>mL/min</td>
										</tr>
										<tr onmouseenter="setDesc('Flow Velocities', 'The different calculations of flow velocities. Used in calculating column efficiency.')" onmouseleave="setDesc('', '')">
											<td colspan="3">Flow Velocities:</td>
										</tr>
										<tr onmouseenter="setDesc('Flow Velocities', 'The different calculations of flow velocities. Used in calculating column efficiency.<div>-----</div><div>Open Tube: The rate at which the mobile phase would move through the column if it were empty.</div>')" onmouseleave="setDesc('', '')">
											<td class="tab">--- Open Tube:</td>
											<td id="open_tube_flow_velocity">Loading...</td>
											<td>cm/s</td>
										</tr>
										<tr onmouseenter="setDesc('Flow Velocities', 'The different calculations of flow velocities. Used in calculating column efficiency.<div>-----</div><div>Interstitial: </div>')" onmouseleave="setDesc('', '')">
											<td class="tab">--- Interstitial:</td>
											<td id="intersitial_flow_velocity">Loading...</td>
											<td>cm/s</td>
										</tr>
										<tr onmouseenter="setDesc('Flow Velocities', 'The different calculations of flow velocities. Used in calculating column efficiency.<div>-----</div><div>Chromatographic: </div>')" onmouseleave="setDesc('', '')">
											<td class="tab" style="width: 200px;">--- Chromatographic:</td>
											<td id="chromatographic_flow_velocity">Loading...</td>
											<td>cm/s</td>
										</tr>
										<tr onmouseenter="setDesc('Flow Velocities', 'The different calculations of flow velocities. Used in calculating column efficiency.<div>-----</div><div>Reduced: </div>')" onmouseleave="setDesc('', '')">
											<td class="tab">--- Reduced:</td>
											<td id="reduced_flow_velocity">Loading...</td>
											<td></td>
										</tr>
										<tr onmouseenter="setDesc('HTEP (Height Equivalent to a Theoretical Plate)', '')" onmouseleave="setDesc('', '')">
											<td>H (plate height):</td>
											<td id="HETP_chrom">Loading...</td>
											<td>cm</td>
										</tr>
										<tr onmouseenter="setDesc('Theoretical Plates', 'The number of theoretical plates is the number of efficiency zones. It is dependant on the dimensions of the column and the HETP.')" onmouseleave="setDesc('', '')">
											<td>Plate number:</td>
											<td id="theoretical_plates_chrom">Loading...</td>
											<!-- This was originally 16490 -->
											<td></td>
										</tr>
										<tr onmouseenter="setDesc('Backpressure', '')" onmouseleave="setDesc('', '')">
											<td>Backpressure:</td>
											<td id="backpressure_chrom">Loading...</td>
											<!-- This was originally 173.49 -->
											<td>bar</td>
										</tr>
									</table>
								</div>
								<!--
									General Properties
								-->
								<div class="menu_options" onmouseenter="setDesc('', '')" onmouseleave="setDesc('', '')">
									<button type="button" id="general_properties_button" class="menu_button" onclick="openMenu('general_properties');">General Properties (Beta)</button>
									<!-- Menu is accessible because important information is here. All input tags have been disabled -->
								</div>
								<div id="general_properties" class="menu_section">
									<table>
										<tr onmouseenter="setDesc('Eluent Viscosity', 'The measure of how easily the eluent flows. The lower the viscosity, the easier the eluent flows.')" onmouseleave="setDesc('', '')">
											<td>Eluent Viscosity</td>
											<td id="eluent_viscosity_general">Loading...</td>
											<!-- Originally 0.7689 -->
											<td>cP</td>
										</tr>
										<tr>
											<td>Avg. Diffusion Coeff.:</td>
											<td id="avg_diffusion_coefficient_general">0.00001223</td>
											<td>cm<sup>2</sup>/s</td>
										</tr>
										<tr>
											<td colspan="3" style="opacity:0"> <!-- Spacer -->
												--------------------------------------------------
											</td>
										</tr>
										<tr>
											<td>Time Constant:</td>
											<td><input class="number" type="number" step="any" id="time_constant_general" onchange="calculatePeaks()" value="0.1" disabled></td>
											<td>s</td>
										</tr>
										<tr>
											<td>Signal Offset:</td>
											<td><input class="number" type="number" step="any" id="signal_offset_general" onchange="calculatePeaks()" value="0.0"></td>
											<td>munits</td>
										</tr>
										<tr>
											<td>Noise:</td>
											<td><input class="number" type="number" step="any" id="noise_general" onchange="calculatePeaks()" value="2.0"></td>
											<td></td>
										</tr>
										<tr>
											<td colspan="3">
												<input id="auto_time_check" type="checkbox" name="auto_time_span" value="auto" onchange="enableEdit();calculatePeaks()" checked>Automatically determine time span
											</td>
										</tr>
										<tr>
											<td>Initial Time:</td>
											<td><input id="initial_time_general" class="number" type="number" step="any" onchange="calculatePeaks()" value="0.0" disabled></td>
											<td>s</td>
										</tr>
										<tr>
											<td>Final Time:</td>
											<td><input id="final_time_general" class="number" type="number" step="any" onchange="calculatePeaks()" value=".72748" disabled></td>
											<td>s</td>
										</tr>
										<tr>
											<td>Plot Points:</td>
											<td><input id="plot_points_general" class="number" type="number" step="any" onchange="calculatePeaks()" value="6000"></td>
											<td></td>
										</tr>
										<tr>
											<td>Frequency:</td>
											<td id="plot_points_general_detectorFrequency"></td>
											<td></td>
										</tr>
										<tr>
											<td colspan="2">
												<input id="renderGraph_dots_check" type="checkbox" name="renderGraph_dots" onchange="calculatePeaks()">Plot points on graph
											</td>
										</tr>
										<!--<tr>
											<td colspan="3">
												<input id="renderGraph_newFunction_check" type="checkbox" name="renderGraph_newFunction" onchange="calculatePeaks()">Use new render function
											</td>
										</tr>-->
									</table>
								</div>
								<!--
									Column Properties
								-->
								<div class="menu_options" onmouseenter="setDesc('', '')" onmouseleave="setDesc('', '')">
									<button type="button" id="column_properties_button" class="menu_button" onclick="openMenu('column_properties');">Column Properties</button>
								</div>
								<div id="column_properties" class="menu_section">
									<table>
										<tr onmouseenter="setDesc('Stationary Phase', 'Also known as the column, it is the collection of particles that do not move during the experiment.')" onmouseleave="setDesc('', '')">
											<td colspan="3">Select Stationary Phase:</td>
										</tr>
										<tr onmouseenter="setDesc('Stationary Phase', 'Also known as the column, it is the collection of particles that do not move during the experiment.')" onmouseleave="setDesc('', '')">
											<td class="dropdown_div"[ colspan="3">
												<button id="stationary_phase" onclick="show('stationary_phase')" class="dropbutton">
													<div id='stationary_phase_text' class='dropname'>Agilent SB-C18</div>
													<div id='stationary_phase_switch' class="switch">&#9660;</div>
												</button>
												<div id="stationary_phase_dropdown" class="dropdown-content">
													<a onclick="select_option('Agilent SB-C18', 'stationary_phase'); show('stationary_phase'); toggleColumnProperties('Agilent SB-C18')">Agilent SB-C18</a>
													<!--<a onclick="select_option('Agilent SB-C8', 'stationary_phase'); show('stationary_phase'); toggleColumnProperties('Agilent SB-C8')" disabled>Agilent SB-C8</a>-->
												</div>
											</td>
										</tr>
										<!-- The input tags for Length, Inner Diameter, Particle Size, Interparticle porosity, and Intraparticle porosity
										are disabled by default because the default selected column is 'Agilent SB-C18'. -->
										<tr onmouseenter="setDesc('Column Length', 'Distance from the column inlet to the column outlet. Measured in millimeters.')" onmouseleave="setDesc('', '')">
											<td>Length:</td>
											<td><input class="number" type="number" step="any" id="length_column" value="100.0" onchange="calculatePeaks()"></td>
											<td>mm</td>
										</tr>
										<tr onmouseenter="setDesc('Column Inner Diameter', 'Distance between the inner walls of the column. Measured in millimeters.')" onmouseleave="setDesc('', '')">
											<td>Inner Diameter:</td>
											<td><input class="number" type="number" step="any" id="inner_diameter_column" value="4.6" onchange="calculatePeaks()"></td>
											<td>mm</td>
										</tr>
										<tr onmouseenter="setDesc('Column Particle Size', 'Average diameter of the particles inside the column. Measured in micrometers.')" onmouseleave="setDesc('', '')">
											<td>Particle Size:</td>
											<td><input class="number" type="number" step="any" id="particle_size_column" value="3.0" onchange="calculatePeaks()"></td>
											<td>&mu;m</td>
										</tr>
										<tr onmouseenter="setDesc('Column Interparticle Porosity', 'The fraction of the volume in the column that is between the stationary phase particles.')" onmouseleave="setDesc('', '')">
											<td>Interparticle porosity:</td>
											<td><input class="number" type="number" step="any" id="interparticle_porosity_column" value="0.4" onchange="calculatePeaks()"></td>
											<td></td>
										</tr>
										<tr onmouseenter="setDesc('Column Intraparticle Porosity', 'The fraction of the stationary phase particles that is occupied by the eluent.')" onmouseleave="setDesc('', '')">
											<td>Intraparticle porosity:</td>
											<td><input class="number" type="number" step="any" id="intraparticle_porosity_column" value="0.4" onchange="calculatePeaks()"></td>
											<td></td>
										</tr>
										<tr onmouseenter="setDesc('Column Total Porosity', 'The fraction of the volume in the column that is occupied by eluent, both outside and inside the stationary phase particles.')" onmouseleave="setDesc('', '')">
											<td>Total Porosity:</td>
											<td id="total_porosity_column">Loading...</td>
											<td></td>
										</tr>
										<tr onmouseenter="setDesc('Void Volume', 'The volume in the column that is accessible to the mobile phase (the space between the particles and within them).')" onmouseleave="setDesc('', '')">
											<td>Void Volume:</td>
											<td id="void_volume_column">Loading...</td>
											<td>mL</td>
										</tr>
										<tr onmouseenter="setDesc('Void Time', 'The time required for an entirely unretained solute to pass through the column.')" onmouseleave="setDesc('', '')">
											<td>Void Time:</td>
											<td id="void_time_column">Loading...</td>
											<td>s</td>
										</tr>
										<tr onmouseenter="setDesc('A', 'A van Deemter parameter used in finding the Reduced Plate Height. Typically has a value of 1.0.')" onmouseleave="setDesc('', '')">
											<td>A:</td>
											<td><input class="number" type="number" step="any" id="A_column" onchange="calculatePeaks()" value="1.0"></td>
											<td></td>
										</tr>
										<tr onmouseenter="setDesc('B', 'A van Deemter parameter used in finding the Reduced Plate Height. Typically has a value of 5.0.')" onmouseleave="setDesc('', '')">
											<td>B:</td>
											<td><input class="number" type="number" step="any" id="B_column" onchange="calculatePeaks()" value="5.0"></td>
											<td></td>
										</tr>
										<tr onmouseenter="setDesc('C', 'A van Deemter parameter used in finding the Reduced Plate Height. Typically has a value of 0.05.')" onmouseleave="setDesc('', '')">
											<td>C:</td>
											<td><input class="number" type="number" step="any" id="C_column" onchange="calculatePeaks()" value="0.05"></td>
											<td></td>
										</tr>
										<tr onmouseenter="setDesc('Reduced plate height', 'A dimensionless measure of the efficiency of an HPLC column under a particular set of conditions.')" onmouseleave="setDesc('', '')">
											<td>Reduced plate height:</td>
											<td id="reduced_plate_height_column">Loading...</td>
											<td></td>
										</tr>
									</table>
								</div>
								<!--
									Other
								-->
								<div class="menu_options" onmouseenter="setDesc('', '')" onmouseleave="setDesc('', '')" hidden>
									<button id="other_button" class="menu_button" onclick="openMenu('other');">Other</button>
								</div>
								<div id="other" class="menu_section">
									<table>
										<form>
											<tr>
												<td colspan="3">Post-Column Tubing:</td>
											</tr>
											<tr>
												<td>Length:</td>
												<td>
													<input class="number" type="number" step="any" id="other_length" onchange="calculatePeaks()" value="0.0"/>
												</td>
												<td>cm</td>
											</tr>
											<tr>
												<td>Inner Diameter:</td>
												<td>
													<input class="number" type="number" step="any" id="inner_diameter_other" onchange="calculatePeaks()" value="5.0"/>
												</td>
												<td>mil</td>
											</tr>
											<tr>
												<td>Volume:</td>
												<td id="volume_other">
													0.0000
												</td>
												<td>&mu;L</td>
											</tr>
										</form>
										<tr>
											<td colspan="3">
												<button id="GenRandExpBtn" onclick="document.getElementById('GenRandExpBtn').disabled = true; generateRandomExperiment();">Generate Random Experiment</button>
											</td>
										</tr>
									</table>
								</div>
							</div>
							<div id="graph">
								<svg id="graph_svg" width="1400" height="500"></svg>
							</div>
							<div id="tableDiv">
								<table id="headerTable">
									<tr>
										<th>Compound</th>
   										<!--<th id="headerTable_k">k&#39;</th>-->
										<th id="headerTable_k">k</th>
  										<th>t<sub>R</sub> (min)</th>
										<!--<th>sigma (s)</th>-->
										<th>&#963; (s)</th>
    									<th>k<sub>w</sub></th>
										<th>S</th>
    								</tr>
								</table>
								<div id="scrollTable">
									<table id="dataTable">
									</table>
								</div>
							</div>
							<div id="Description" style="font-size:large" hidden>Descriptions: 
								<div>Mouse over an element to view a description of it!</div>
							</div><br><br>
						</div>
						<div id="about" hidden>
							<input type="button" value="Back" onclick="switchToTab('main')"><br>
							<div id="header">
								<h1>HPLC Simulator: About</h1>
							</div>
							<div>
								<a><img src="http://www.quick-counter.net/aip.php?tp=bb&tz=America%2FChicago" alt="Page hit counter" border="0" /></a>
							</div>
							<h2>Created by Thomas J. Lauer<br><br>Assisted by Dr. Dwight R. Stoll</h2>
							<br><br>
							<h3>Click <a href="https://goo.gl/forms/IiAKRl4wTyd4EOna2">HERE</a> to report a bug or error.</h3>
							<br><br>
							<h3>For any questions, comments, or concerns, contact Thomas Lauer --> tlauer2@gustavus.edu</h3>
							<h3>--------------------------------------------------------------------------------</h3><br>
							<input type="checkbox" id="showDebuggingLog" onchange="updateShowDebugLog()" checked><a onclick="toggleShowDebuggingLog()">Enable Console Logging?</a>
						</div>
					</main>
					<div id="copyright">
						Copyright © 2016 Multi-Dimensional Separations - All Rights Reserved
					</div>
				</div>
			</div>

			<div id="lowerYellowBar" class="bar"></div>
			<footer></footer>
		</div>
	</body>
	<script>

		<?php foreach ($column_data as $this_column) {?>
			compoundLSSCoefficientsArray.push([
				"<?php echo $this_column["Column"]; ?>",
				"<?php echo $this_column["Solvent_A"]; ?>",
				"<?php echo $this_column["Solvent_B"]; ?>",
				<?php echo $this_column["CompPerc_Min"]; ?>,
				<?php echo $this_column["CompPerc_Max"]; ?>,
				<?php echo $this_column["Temp_Min"]; ?>,
				<?php echo $this_column["Temp_Max"]; ?>,
				"<?php echo $this_column["Compound"]; ?>",
				<?php echo $this_column["lnkw_intercept"]; ?>,
				<?php echo $this_column["lnkw_slope"]; ?>,
				<?php echo $this_column["S_intercept"]; ?>,
				<?php echo $this_column["S_slope"]; ?>
			]);
		<?php }?>

		//console.log(compoundLSSCoefficientsArray);

		//foreach(compoundLSSCoefficientsArray as compound_data){
		//	console.log(compound_data);
		//	//validStationaryPhases
		//}

		var stationary_phase_dropdown_innerHTML = "";

		for(var indx = 0; indx < compoundLSSCoefficientsArray.length; indx++){
			if(!validStationaryPhases.includes(compoundLSSCoefficientsArray[indx][0])){
				//console.log(compoundLSSCoefficientsArray[indx][0]);
				validStationaryPhases.push(compoundLSSCoefficientsArray[indx][0]);
				//<a onclick="select_option('Agilent SB-C18', 'stationary_phase'); show('stationary_phase'); toggleColumnProperties('Agilent SB-C18')">Agilent SB-C18</a>
				stationary_phase_dropdown_innerHTML += '<a onclick="';
				stationary_phase_dropdown_innerHTML += "select_option('" + compoundLSSCoefficientsArray[indx][0] + "', 'stationary_phase'); show('stationary_phase'); toggleColumnProperties('" + compoundLSSCoefficientsArray[indx][0] + "')";
				stationary_phase_dropdown_innerHTML += '">' + compoundLSSCoefficientsArray[indx][0] + '</a>';
			}
		}
		//console.log(stationary_phase_dropdown_innerHTML);
		document.getElementById("stationary_phase_dropdown").innerHTML = stationary_phase_dropdown_innerHTML;
		

		//console.log(validStationaryPhases);

		//console.log(compoundLSSCoefficientsArray);
		//console.log(compoundLSSCoefficients);

		document.onload = load();
		//document.onload = openMenu_ALL();
		document.onload = setLanguage();
		document.onload = applyHighlightCode();
		//document.onload = openMenu('general_properties');
		//document.onload = openMenu('chromatographic_properties');
		
		//console.log(document.getElementById('content').clientWidth);
		//console.log(window.innerWidth);
		//console.log((window.innerWidth - document.getElementById('content').clientWidth)/2);
		
		window.onclick = function(event) {
		  if (!event.target.matches('.dropbutton')) {
		    var dropdowns = document.getElementsByClassName("dropdown-content");
		    var i;
		    for (i = 0; i < dropdowns.length; i++) {
		      var openDropdown = dropdowns[i];
		      if (openDropdown.classList.contains('show')) {
		      	var div = openDropdown.id.replace("dropdown", "switch");
		      	var arrow = document.getElementById(div).innerHTML.charCodeAt();
		      	if (arrow == "9650") {
		      		document.getElementById(div).innerHTML = "&#9660;";
		      	}
		        openDropdown.classList.remove('show');
		      }
		    }
		  }
		}
		
		function applyHighlightCode(){
		$("#dataTable tr").click(function() {
			var selected = $(this).hasClass("highlight");
			$("#dataTable tbody tr").removeClass("highlight");
			$("#dataTable").removeClass();
			if(!selected){
				$(this).addClass("highlight");
				$('#dataTable').addClass($(this).attr("id"));
			}
			calculatePeaks();
		});
		}
		
		function switchToTab(tab){
		  if(tab == "about"){
		    document.getElementById("about").hidden = false;
			document.getElementById("content").hidden = true;
		  } else if(tab == "main"){
		    document.getElementById("about").hidden = true;
			document.getElementById("content").hidden = false;
		  }
		}
		
		function updateDebugLog(){
			var master = document.getElementById("showDebuggingLog");
			if(master.checked == true){
				document.getElementById("debuggingLog").hidden = false;
			} else {
				document.getElementById("debuggingLog").hidden = true;
				document.getElementById("showDebuggingLog_Loading").checked = false;
				document.getElementById("showDebuggingLog_Other").checked = false;
			}
		}
		
		function setDebugLog(){
			var masterOne = document.getElementById("showDebuggingLog_Loading");
			var masterTwo = document.getElementById("showDebuggingLog_Other");
			if(masterOne.checked == true){
				document.getElementById("debuggingLog_Loading").hidden = false;
			} else {
				document.getElementById("debuggingLog_Loading").hidden = true;
			}
			if(masterTwo.checked == true){
				document.getElementById("debuggingLog_Other").hidden = false;
			} else {
				document.getElementById("debuggingLog_Other").hidden = true;
			}
		}
	</script>
</html>