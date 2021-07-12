<?php
	$local_root = 'http://' . $_SERVER['SERVER_NAME'];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Multi-Dimensional Separations</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="/style.css">
		<link rel="icon" href="../images/mini-icon.png">
		<link rel="shortcut icon" href="../images/mini-icon.png">
		<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>-->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script> <!-- Switched link from HTTP to HTTPS (Thomas J. Lauer, 04 June 2021) -->
		<script type="text/javascript" src="../jquery.js"></script>
		<script type="text/javascript" src="../toolkit/pressure_prediction.js"></script>
		<script type="text/javascript" src="../master-js.js"></script>
		<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
	</head>
	<body onload="fadeIn();">
		<div id="everything">
			<div class="bar"></div>
			<div id="topYellowBar" class="bar"></div>
			<img src="../images/column.png" alt="Multi-D LC" id="column">
			<div style="min-width:1060px">
				<div id="left">
					<img src="../images/icon.png" alt="Multi-D LC" id="logo"></img>
					<div id="corner"></div>
				</div>
				<div id="middle">
					<header>
						<div id="tfheader">
							<!--<form id="tfnewsearch" method="get" action="http://www.google.com">
								<input type="text" id="tfq" class="tftextinput" name="q" size="21" maxlength="120" value="Search our website">
								<input type="submit" value=">" class="tfbutton">
							</form>-->
							<div class="tfclear"></div>
						</div>
						<a href="http://gustavus.edu">
						<div id="banner" onmouseover="lower($(this))" onmouseleave="raise($(this))">
							<img src="../images/gac_logo.png" alt="GAC" id="gac" style="width:76px"></img>
						</div> </a>
						<a href="https://www.uva.nl/en">
						<div id="bannerUVA" onmouseover="lower($(this))" onmouseleave="raise($(this))">
							<img src="../images/uva_logo.png" alt="UAV" id="UVA" style="width:76px"></img>
						</div> </a>
						<h1></br>Multi-Dimensional Separations</h1>

						<div style="color:#FDBD2D;float:left;position:relative;top:-68.6px;">
							A site dedicated to multi-dimensional separations with an emphasis on the liquid phase.
						</div>

						<img src="../images/peak.png" alt="peak" class="peak" id="peak""></img>
						<img src="../images/peak2.png" alt="peak" class="peak" id="peak2""></img>
						<script>
							<?php
								global $selected_tab;
								echo 'selected_tab = ' . $selected_tab . ';';
								?>
							setPeak(selected_tab);
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
									<a class="dropdown" id="LiteratureDropdownA" onmouseover="menuSelect(3);showLiteratureDropdown();" href="https://www.morepeaks.org/pirok/2dlc-applications.php" style="width:110px">Literature</a>
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
											<a href="../hplcsim">1D-LC Simulator</a>
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
					<!--<main style="position:relative;top:0px;left:-380px;width:1520px;">-->
					<!--<main>-->