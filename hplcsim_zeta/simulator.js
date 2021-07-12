var exportFileData_Full = "";
var exportFileData_Selected = "";
var exportFileData_SelectedCompound = "";

function logExportFileData_Full(){
	console.log(exportFileData_Full);
	
	var hiddenElement = document.createElement('a');
    hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(exportFileData_Full);
    hiddenElement.target = '_blank';
    hiddenElement.download = 'FullChromatogram.csv';
    hiddenElement.click();
}
function logExportFileData_Selected(){
	if(exportFileData_Selected == ""){
		console.log("No Compound Selected!");
	} else {
		console.log(exportFileData_Selected);
		var hiddenElement = document.createElement('a');
		hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(exportFileData_Selected);
		hiddenElement.target = '_blank';
		hiddenElement.download = ''+exportFileData_SelectedCompound+'.csv';
		hiddenElement.click();
	}
}

function randNumberInRange(min, max) { return (Math.random()*(max-min))+min; }

var M_default = [
	51.15, 83.50, 53.33, 89.69, 86.91, 89.62, 75.09, 89.57, 88.55, 88.98, 80.16, 52.66, 51.76, 54.77, 85.56, 52.98, 81.02, 58.43, 89.02, 56.72, 89.78, 69.60, 89.19, 62.06, 78.60, 54.29, 61.40, 79.86, 51.06, 53.21, 86.55,
	87.02, 88.24, 88.89, 89.36, 52.77, 88.17, 51.29, 89.72, 51.97, 65.29, 71.99, 66.05, 89.74, 65.67, 51.90, 85.86, 89.25, 84.13, 83.72, 55.48, 89.63, 59.84, 77.94, 84.70, 88.94, 86.67, 82.82, 53.99, 50.95, 52.29, 89.12,
	76.55, 87.23, 88.71, 51.45, 58.70, 88.80, 68.40, 89.65, 52.13, 88.76, 82.58, 63.10, 52.47, 54.60, 89.09, 89.22, 64.54, 78.27, 86.79, 87.87, 60.76, 85.71, 68.80, 89.73, 87.43, 86.15, 89.55, 52.87, 51.40, 59.55, 55.11,
	74.33, 56.95, 50.88, 54.94, 63.45, 52.57, 73.17, 89.45, 89.43, 81.83, 50.84, 51.63, 51.51, 77.60, 85.40, 71.20, 87.62, 70.80, 84.33, 61.08, 53.58, 72.39, 52.05, 78.92, 74.71, 82.34, 89.71, 77.25, 88.49, 67.61, 62.75,
	89.31, 89.81, 80.74, 53.45, 83.93, 52.38, 51.24, 87.13, 53.71, 76.19, 89.60, 79.24, 81.30, 86.29, 89.70, 56.07, 83.28, 62.40, 57.18, 52.21, 89.39, 60.14, 50.81, 63.81, 89.80, 50.91, 88.31, 89.47, 89.53, 64.91, 51.57,
	53.85, 58.17, 54.14, 85.06, 89.67, 89.66, 86.42, 87.79, 76.90, 87.95, 51.69, 56.28, 55.67, 67.22, 83.05, 89.33, 85.23, 84.89, 60.45, 51.34, 84.52, 71.60, 70.40, 89.59, 89.16, 59.26, 89.76, 73.95, 73.56, 87.34, 58.98,
	69.20, 66.44, 89.79, 88.10, 54.44, 51.02, 57.66, 86.01, 61.73, 80.45, 87.53, 88.43, 81.57, 55.30, 64.17, 70.00, 88.85, 50.78, 51.20, 57.91, 72.78, 88.37, 87.71, 53.09, 56.50, 89.05, 89.75, 57.42, 55.87, 51.83, 66.83,
	88.03, 89.51, 75.46, 50.75, 79.55, 75.83, 89.50, 89.28, 89.41, 68.01, 88.60, 89.77, 50.98, 51.11, 88.66, 50.72, 82.09
];

var compoundList = [
	"phenol",
	"benzonitrile",
	"p-chlorophenol",
	"acetophenone",
	"nitrobenzene"
];

var compoundLSSCoefficientsArray = [];
var validStationaryPhases = [];
var compoundLSSCoefficients = {};

var sliderBounds = {
	"tempLower": 40,
	"tempUpper": 40,
	"percBLower": 0,
	"percBUpper": 100
};


function updateCompoundsList_keepIfIncluded(){
	var compounds = Object.keys(compoundLSSCoefficients);
	var removedCompounds = [];
	//console.log(compoundList);
	compoundListNew = [];
	for(indx = 0; indx < compoundList.length; indx++){
		if(compounds.includes(compoundList[indx])){
			compoundListNew[compoundListNew.length] = compoundList[indx];
		} else {
			//console.log("    Removed "+compoundList[indx]);
			removedCompounds[removedCompounds.length] = compoundList[indx];
		}
	}

	if (compoundListNew.length == 0) {
		console.log("compoundListNew is empty. Adding first compound in keys to compoundListNew.");
		compoundListNew[0] = compounds[0];
    }

	compoundList = compoundListNew;
	//console.log(compoundList);
	
	var alertText_removedCompounds = "";
	if(removedCompounds.length > 0){
		if(removedCompounds.length == 1){
			alertText_removedCompounds += "For current conditions, no data exists for the following compound:\n\n";
			alertText_removedCompounds += removedCompounds[0];
			alertText_removedCompounds += "\n\nThis compound has been removed from the list.";
		} else {
			alertText_removedCompounds = "For current conditions, no data exists for the following compounds:\n\n";
			for(indx = 0; indx < removedCompounds.length; indx++){
				alertText_removedCompounds += removedCompounds[indx];
				if(indx+1 < removedCompounds.length){ alertText_removedCompounds += ", "; }
				if(indx+2 == removedCompounds.length){ alertText_removedCompounds += "and "; }
			}
			alertText_removedCompounds += "\n\nThese compounds have been removed from the list.";
		}
	}
	
	updateCompoundsTable();
	
	return alertText_removedCompounds
}

function updateCompoundsList(compound){
	var elementID = "compoundsTable_"+compound;
	console.log(elementID);
	if(document.getElementById(elementID).checked == true){
		//console.log("checked = true");
		compoundList[compoundList.length] = compound;
	} else {
		//console.log("checked = false");
		compoundListNew = [];
		for(indx = 0; indx < compoundList.length; indx++){ if(compoundList[indx] != compound){ compoundListNew[compoundListNew.length] = compoundList[indx]; } }
		compoundList = compoundListNew;
	}
	updateCompoundsTable();
	displayTable();
	applyHighlightCode();
	calculatePeaks();
}

function updateCompoundsTable(){
	var compounds = Object.keys(compoundLSSCoefficients);

	var HTMLCache = '<tr><th colspan="2">Compounds</th><th>Concentration</th></tr>';
	var borderCSS = "border-bottom: 1px solid #bbb;"
	
	for(indx in compounds){
		var compound = compounds[indx];
		var concentration = M_default[indx];

		if(compoundList.includes(compound)){ compoundChecked = "checked"; } else { compoundChecked = ""; }
		if(compoundList.length == 1 && compoundChecked == "checked"){ compoundChecked += " disabled"; }
		
		//console.log("compound = "+compound);
		HTMLCache += '<tr>';
		HTMLCache += '<td style="text-align:right; width: 25%; '+borderCSS+'">';
		HTMLCache += '<input type="checkbox" id="compoundsTable_'+compound+'" onchange="updateCompoundsList('+"'"+compound+"'"+');" '+compoundChecked+'>';
		HTMLCache += '</td>';
		HTMLCache += '<td style="text-align:left; '+borderCSS+'">';
		HTMLCache += '<label for="compoundsTable_'+compound+'">'+compound+'</label>';
		HTMLCache += '</td>';
		HTMLCache += '<td style="text-align:left; ' + borderCSS + '">';
		
		HTMLCache += '<input class="number" type="number" step="1" id="concentration_' + compound + '" value="' + concentration + '" onchange="calculatePeaks();" />';
		HTMLCache += '</td>';
		HTMLCache += '</tr>';
	}
	
	document.getElementById("all_compounds_table").style = "width:100%;";
	
	document.getElementById("all_compounds_table").innerHTML = HTMLCache;
}


var logCounter = 1;

function getCurrentTime(){
	var d = new Date();
	var hr = d.getHours();
	hr = Number(hr) + 1;
	var min = d.getMinutes();
	var sec = d.getSeconds();
	var msec = d.getMilliseconds();
	var timeStamp = hr + ":" + min + ":" + sec + "." + msec;
	return timeStamp;
}

function shuffleArray(array) {
  var currentIndex = array.length, temporaryValue, randomIndex;

  // While there remain elements to shuffle...
  while (0 !== currentIndex) {

    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    // And swap it with the current element.
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }

  return array;
}

function showCustom(){
	var state = document.getElementById("add_custom_compound_table").hidden;
	if(state == true){
		document.getElementById("add_custom_compound_table").hidden = false;
	} else {
		document.getElementById("add_custom_compound_table").hidden = true;
		
		document.getElementById("add_custom_compound_name").value = "";
	
		document.getElementById("add_custom_compound_lnkw_int_ACN").value = "";
		document.getElementById("add_custom_compound_lnkw_slope_ACN").value = "";
		document.getElementById("add_custom_compound_s_int_ACN").value = "";
		document.getElementById("add_custom_compound_s_slope_ACN").value = "";
	
		document.getElementById("add_custom_compound_lnkw_int_MeOH").value = "";
		document.getElementById("add_custom_compound_lnkw_slope_MeOH").value = "";
		document.getElementById("add_custom_compound_s_int_MeOH").value = "";
		document.getElementById("add_custom_compound_s_slope_MeOH").value = "";
	}
}

function checkCustom(){
	var name = document.getElementById("add_custom_compound_name").value;
	
	var lnkwIntACN = document.getElementById("add_custom_compound_lnkw_int_ACN").value;
	var lnkwSlopeACN = document.getElementById("add_custom_compound_lnkw_slope_ACN").value;
	var SIntACN = document.getElementById("add_custom_compound_s_int_ACN").value;
	var SSlopeACN = document.getElementById("add_custom_compound_s_slope_ACN").value;
	
	var lnkwIntMeOH = document.getElementById("add_custom_compound_lnkw_int_MeOH").value;
	var lnkwSlopeMeOH = document.getElementById("add_custom_compound_lnkw_slope_MeOH").value;
	var SIntMeOH = document.getElementById("add_custom_compound_s_int_MeOH").value;
	var SSlopeMeOH = document.getElementById("add_custom_compound_s_slope_MeOH").value;
	
	if(lnkwIntACN != "" && lnkwSlopeACN != "" && SIntACN != "" && SSlopeACN != "" && lnkwIntMeOH != "" && lnkwSlopeMeOH != "" && SIntMeOH != "" && SSlopeMeOH != "" && name != "" && typeof name == "string"){
		//enable submit button
		document.getElementById("add_custom_compound_submit_button").disabled = false;
	} else {
		//disable submit button
		document.getElementById("add_custom_compound_submit_button").disabled = true;
	}
}

function addCustom(){
	var name = document.getElementById("add_custom_compound_name").value;
	
	var lnkwIntACN = Number(document.getElementById("add_custom_compound_lnkw_int_ACN").value);
	var lnkwSlopeACN = Number(document.getElementById("add_custom_compound_lnkw_slope_ACN").value);
	var SIntACN = Number(document.getElementById("add_custom_compound_s_int_ACN").value);
	var SSlopeACN = Number(document.getElementById("add_custom_compound_s_slope_ACN").value);
	
	var lnkwIntMeOH = Number(document.getElementById("add_custom_compound_lnkw_int_MeOH").value);
	var lnkwSlopeMeOH = Number(document.getElementById("add_custom_compound_lnkw_slope_MeOH").value);
	var SIntMeOH = Number(document.getElementById("add_custom_compound_s_int_MeOH").value);
	var SSlopeMeOH = Number(document.getElementById("add_custom_compound_s_slope_MeOH").value);
	
	calcGradientACN[name] = [lnkwIntACN, lnkwSlopeACN, SIntACN, SSlopeACN];
	calcGradientMeOH[name] = [lnkwIntMeOH, lnkwSlopeMeOH, SIntMeOH, SSlopeMeOH];
	
	showCustom();
	
	compoundList[compoundList.length] = name;
	if(document.getElementById("solvent_b_text").innerHTML == "Methanol"){
		updateCompoundsTable("MeOH");
	} else if(document.getElementById("solvent_b_text").innerHTML == "Acetonitrile"){
		updateCompoundsTable("ACN");
	}
	displayTable();
	calculatePeaks();
}

function updateShowDebugLog(){
	var enable = document.getElementById("showDebuggingLog").checked;
	
	console.API;
	if (typeof console._commandLineAPI !== 'undefined') {
		console.API = console._commandLineAPI; //chrome
	} else if (typeof console._inspectorCommandLineAPI !== 'undefined') {
		console.API = console._inspectorCommandLineAPI; //Safari
	} else if (typeof console.clear !== 'undefined') {
		console.API = console;
	}
	console.API.clear();
	
	if(enable){
		//console.log("Console logging has been enabled.");
	} else {
		//console.log("Console logging has been disabled.");
		logCounter = 1;
	}
}

function loadAllCompounds(){
	
	document.getElementById("gradient_radio").checked = true;
	
	document.getElementById("Gradient_Time").value = 60;
	document.getElementById("Gradient_Phi_Init").value = 0;
	
	document.getElementById("temperature_chrom").value = 150;
	document.getElementById('temperature_slider').value = 150;
	
	document.getElementById("flow_rate_chrom").value = 0.5;
	
	select_option('Acetonitrile', 'solvent_b');
	
	compounds = Object.keys(calcGradientACN);
	
	compoundList = compounds;
	
	document.getElementById("preloaded_dropdown").innerHTML = "";
		
	for (i = 0; i < compounds.length; i++) {
		var html = document.getElementById("preloaded_dropdown").innerHTML;
		document.getElementById("preloaded_dropdown").innerHTML = html + "<a id="+ compounds[i].replace(/ /g,"_") +"_menu_option onclick=addCompoundToList('" + compounds[i] + "') class='dropbutton'>"+ compounds[i] +"</a>"
	}
	for (i = 0; i < compounds.length; i++) {
		var save = compounds[i].replace(/ /g,"_");
		document.getElementById(save+"_menu_option").onClick = "select_option('"+ compounds[i] +"', 'preloaded')";
	}
	refreshNowloadedCompounds();
	refreshPreloadedCompounds();
	displayTable();
	calculatePeaks();
}

function checkIfCompoundIsListed(compound){
	var j = compoundList.length;
	var listed = false;
	for(i = 0; i < j; i++){
		if(compoundList[i] == compound){
			listed = true;
			break;
		}
	}
	return listed;
}

function hideGradientElutionStuffs(bool){
	//True = Isocratic Mode; False = Gradient Mode
	if(bool == "true"){
		document.getElementById("Solvent_B_Fraction_text").hidden = false;
		document.getElementById("Solvent_B_Fraction_td").hidden = false;
		document.getElementById("Gradient_Settings_Table").hidden = true;
		document.getElementById("Gradient_Settings_Table_AddRow").hidden = true;
		document.getElementById("Gradient_Settings_Table_RemoveRow").hidden = true;
		document.getElementById("Gradient_PreColumn_Volume").hidden = true;
	} else if(bool == "false"){
		document.getElementById("Solvent_B_Fraction_text").hidden = true;
		document.getElementById("Solvent_B_Fraction_td").hidden = true;
		document.getElementById("Gradient_Settings_Table").hidden = false;
		document.getElementById("Gradient_Settings_Table_AddRow").hidden = false;
		document.getElementById("Gradient_Settings_Table_RemoveRow").hidden = false;
		document.getElementById("Gradient_PreColumn_Volume").hidden = false;
	}
}

function resetMenus(){

	
	select_option(validStationaryPhases[0], 'stationary_phase');
	toggleColumnProperties(validStationaryPhases[0]);

	//Mobile Phase Composition
	//select_option('Acetonitrile', 'solvent_b');
	compoundList = ["phenol", "benzonitrile", "p-chlorophenol", "acetophenone", "nitrobenzene"];
	//updateCompoundsTable("ACN");
	document.getElementById("isocratic_radio").checked = true;
	document.getElementById("gradient_radio").checked = false;
	document.getElementById("solvent_fraction_slider").value = 40;
	document.getElementById("solvent_fraction_comp").value = 40;
	
	//Chromatographic Properties
	document.getElementById("temperature_slider").value = 40;
	document.getElementById("temperature_chrom").value = 40;
	document.getElementById("injection_volume_chrom").value = "5.0";
	document.getElementById("flow_rate_chrom").value = "2.0";	
	
	//General Properties
	document.getElementById("signal_offset_general").value = 0;
	document.getElementById("noise_general").value = 2.0;
	document.getElementById("auto_time_check").checked = true;
	document.getElementById("initial_time_general").value = 0;
	document.getElementById("plot_points_general").value = 6000;
	document.getElementById("renderGraph_dots_check").checked = false;
	
	//Column Properties
	document.getElementById("length_column").value = 100.0;
	document.getElementById("inner_diameter_column").value = 4.6;
	document.getElementById("particle_size_column").value = 3.0;
	document.getElementById("interparticle_porosity_column").value = 0.4;
	document.getElementById("intraparticle_porosity_column").value = 0.4;
	document.getElementById("A_column").value = 1.0;
	document.getElementById("B_column").value = 5.0;
	document.getElementById("C_column").value = 0.05;
	
	document.getElementById("dataTable").className = "";

	//compoundList
	displayTable();
	applyHighlightCode();
	//refreshPreloadedCompounds();
	//refreshNowloadedCompounds();
	//Apply Changes
	calculatePeaks();

	//select_option('Agilent SB-C18', 'stationary_phase');
	//toggleColumnProperties('Agilent SB-C18');
}

function closeAllOpenDropdownMenus(exception){
	//console.log("exception = " + exception);
	//console.log("--------------------");
	var elementArray = document.getElementsByClassName("dropdown-content_show");
	for(i = 0; i < elementArray.length; i++){
		var id = elementArray[i].id.replace("_dropdown", "");
		if(id != exception){
			//console.log(id);
			//console.log("Hiding the '"+id+"' dropdown menu...");
			var arrow = document.getElementById(id + "_switch").innerHTML.charCodeAt();
			var classname = document.getElementById(id+"_dropdown").className;
			if (arrow == "9660") {
				document.getElementById(id + "_switch").innerHTML = "&#9650;";
				document.getElementById(id+"_dropdown").className = classname+"_show";
			} else {
				document.getElementById(id + "_switch").innerHTML = "&#9660;";
				document.getElementById(id+"_dropdown").className = classname.replace("_show", "");
			}
		}
	}
	//console.log("----------------------------------------");
}

//On element blur
function isMouseOverDropdownMenu(){
	//get currently focused element className
	var x = document.activeElement.className;
	//console.log("activeElement className = " + x);
	if (x != "dropbutton"){
		closeAllOpenDropdownMenus("");
	}
}

function show(id) {
	closeAllOpenDropdownMenus(id);
	var arrow = document.getElementById(id + "_switch").innerHTML.charCodeAt();
	var classname = document.getElementById(id+"_dropdown").className;
	if (arrow == "9660") {
		document.getElementById(id + "_switch").innerHTML = "&#9650;";
		document.getElementById(id+"_dropdown").className = classname+"_show";
	} else {
		document.getElementById(id + "_switch").innerHTML = "&#9660;";
		document.getElementById(id+"_dropdown").className = classname.replace("_show", "");
	}
}

function enableEdit() {
	var check = document.getElementById("auto_time_check").checked;
	if (check) {
		document.getElementById("initial_time_general").disabled = true;
		document.getElementById("final_time_general").disabled = true;
	} else {
		document.getElementById("initial_time_general").disabled = false;
		document.getElementById("final_time_general").disabled = false;
	}
}

function openMenu(id) {
	var dropdowns = document.getElementsByClassName("menu_section");
	var i;
	for (i = 0; i < dropdowns.length; i++) {
	  var openMenu = dropdowns[i];
	  if (openMenu.classList.contains('show')) {
	  	if (openMenu != document.getElementById(id)){
	  		//openMenu.classList.remove('show');
	  	}
	  }
	}
	document.getElementById(id).classList.toggle("show");
}

function openMenu_ALL(){ //Added by Thomas Lauer on 08/30/2017
	openMenu('manage_compound');
	openMenu('mobile_phase_comp');
	//openMenu('plot_options');
	openMenu('chromatographic_properties');
	openMenu('general_properties');
	openMenu('column_properties');
	//openMenu('languages');
	//openMenu('other');
}

function setDesc(obj, msg) {
	// Do Nothing
}

function toggleColumnProperties(input){ //Added by Thomas Lauer on 08/30/2017
	//log("Running 'toggleColumnProperties("+input+")'...");
	//Check if the value of 'input' is a string.

	//compoundLSSCoefficientsArray = [];
	//compoundLSSCoefficients = {}

	if (typeof input == "string") {
		var validSolventAs = [];
		var validSolventBs = [];

		var solvent_A_dropdown_innerHTML = "";
		var solvent_B_dropdown_innerHTML = "";

		for (var indx = 0; indx < compoundLSSCoefficientsArray.length; indx++) {
			if (compoundLSSCoefficientsArray[indx][0] == input) {
				if (!validSolventAs.includes(compoundLSSCoefficientsArray[indx][1])) {
					validSolventAs.push(compoundLSSCoefficientsArray[indx][1]);

					solvent_A_dropdown_innerHTML += '<a onclick="';
					solvent_A_dropdown_innerHTML += "select_option('" + compoundLSSCoefficientsArray[indx][1] + "', 'solvent_a'); calculatePeaks(); show('solvent_a');";
					solvent_A_dropdown_innerHTML += '">' + compoundLSSCoefficientsArray[indx][1] + '</a>';
				}
				if (!validSolventBs.includes(compoundLSSCoefficientsArray[indx][2])) {
					validSolventBs.push(compoundLSSCoefficientsArray[indx][2]);

					solvent_B_dropdown_innerHTML += '<a onclick="';
					solvent_B_dropdown_innerHTML += "select_option('" + compoundLSSCoefficientsArray[indx][2] + "', 'solvent_b'); calculatePeaks(); show('solvent_b');";
					solvent_B_dropdown_innerHTML += '">' + compoundLSSCoefficientsArray[indx][2] + '</a>';
				}
            }
		}

		document.getElementById("solvent_a_dropdown").innerHTML = solvent_A_dropdown_innerHTML;
		document.getElementById("solvent_b_dropdown").innerHTML = solvent_B_dropdown_innerHTML;

		select_option(validSolventAs[0], 'solvent_a');
		select_option(validSolventBs[0], 'solvent_b');

		//console.log("solvent_a = " + validSolventAs[0]);
		//console.log("solvent_b = " + validSolventBs[0]);

		calculatePeaks();

		//updateCompoundsTable("ACN");
		//calculatePeaks();

	} else {
		//Do Nothing. typeof != 'string'.
	}
}

function updateLoadedCompounds() {
	//console.log("Updating Loaded Compounds")
	//console.log("compoundLSSCoefficientsArray.length = " + compoundLSSCoefficientsArray.length);

	compoundLSSCoefficients = {};

	tempMinValues = [];
	tempMaxValues = [];

	for (var indx = 0; indx < compoundLSSCoefficientsArray.length; indx++) {
		//console.log("indx = " + indx);
		if (compoundLSSCoefficientsArray[indx][0] == document.getElementById('stationary_phase_text').innerHTML) {
			//console.log("Stationary Phase Check Passed");
			if (compoundLSSCoefficientsArray[indx][1] == document.getElementById('solvent_a_text').innerHTML) {
				//console.log("Solvent A Check Passed");
				if (compoundLSSCoefficientsArray[indx][2] == document.getElementById('solvent_b_text').innerHTML) {
					//console.log("Solvent B Check Passed");
					compoundLSSCoefficients[compoundLSSCoefficientsArray[indx][7]] = [compoundLSSCoefficientsArray[indx][8], compoundLSSCoefficientsArray[indx][9], compoundLSSCoefficientsArray[indx][10], compoundLSSCoefficientsArray[indx][11]];

					tempMinValues.push(compoundLSSCoefficientsArray[indx][5]);
					tempMaxValues.push(compoundLSSCoefficientsArray[indx][6]);

				}
			}
		}
	}

	//sliderBounds = {
	//	"tempLower": 10,
	//	"tempUpper": 150,
	//	"percBLower": 0,
	//	"percBUpper": 100
	//};

	sliderBounds["tempLower"] = tempMinValues[0];
	sliderBounds["tempUpper"] = tempMaxValues[0];

	for (var indx = 1; indx < tempMinValues.length; indx++) {
		if (tempMinValues[indx] < sliderBounds["tempLower"]) {
			sliderBounds["tempLower"] = tempMinValues[indx];
		}
		if (tempMaxValues[indx] > sliderBounds["tempUpper"]) {
			sliderBounds["tempUpper"] = tempMaxValues[indx];
		}
	}

	//console.log(sliderBounds);

	//console.log(compoundLSSCoefficients);
}

function select_option(selected, menu) {
	//log("Running 'select_option("+selected+", "+menu+")'...");
	document.getElementById(menu + "_text").innerHTML = selected;



	if (menu == 'solvent_a' || menu == 'solvent_b') {
		//compoundLSSCoefficients = {}
		updateLoadedCompounds();
    }

}

function loadSlider(id) {
	    var margin = {
	          top: 0,
	          right: 15,
	          bottom: 0,
	          left: 15
	      },
	      width = 230 - margin.left - margin.right,
	      height = 75 - margin.top - margin.bottom;

	var type;
	if (id == "solvent_b_slider") {
		type = 100;
	} else {
		type = 150;
	}

	  var x = d3.scaleLinear()
	  	.domain([0, type])
	    .range([0, width]);

	var svg = d3.select("#"+id).append("svg")
	    .attr("width", width + margin.left + margin.right)
	    .attr("height", height + margin.top + margin.bottom)
	    .append("g")
	    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

	  var xAxis = d3.axisBottom().scale(x).ticks(4);
	  var line = d3.line()
	    .x(function(d) {
	        return x(d.q);
	    })

	svg.append("g")
		 	.attr("class", "x axis")
	    .attr("transform", "translate(0," + height * .7 + ")")
	    .call(xAxis);
}

function tableID(x,y){
	return 10 * (y + 1 ) + x
}

function renderGraph(data, renderGraphDots) {
	//console.log("Running 'renderGraph(data)'...")
	var masterlist = [];
	//console.log(data);
	for (i = 0; i < data.length; i++) {
		masterlist = masterlist.concat(data[i]);
	}
	//console.log(masterlist);

	d3.select("#graph_svg").remove(); //grab the '#graph_svg' tag and remove 

	document.getElementById("graph").innerHTML = "<svg id='graph_svg' width='1400' height='500'></svg>"; //Create a new SVG with a width of 1400 and height of 500
	
	var svg = d3.select("#graph_svg"), //grab the '#graph_svg' tag and bind it to the variable svg
	    margin = {top: 20, right: 20, bottom: 30, left: 50}, //create a JSON containing the margins
	    width = 700 - margin.left - margin.right, //create a variable containing the usable width
	    height = 500 - margin.top - margin.bottom, //create a variable containing the usable height
	    g = svg.append("g").attr("transform", "translate(" + margin.left + "," + margin.top + ")"); //grab the '#graph_svg' tag, append a 'g' tag, assign attribute 'transform'; move the contents of the grouping

	var x = d3.scaleLinear()
	    .rangeRound([0, width]); //create a variable 'x' to set the scale’s range to the specified two-element array of numbers while also enabling rounding. equivalent to: .range(range).round(true);

	var y = d3.scaleLinear()
	    .rangeRound([height, 0]); //create a variable 'y' to set the scale’s range to the specified two-element array of numbers while also enabling rounding. equivalent to: .range(range).round(true);

	//var megan = d3.scaleLinear()
	//    .rangeRound([height, 0]);
		
	// Determines the highest retention time
	tR_max = 0;
	for (i = 0; i < data.length; i++){
		tR = document.getElementById(tableID(4,i)).innerHTML;
		tR = 5;
		if (tR_max < tR){
			tR_max = tR;
		}
	}

	// Creates a list (new_data) of one or two data signals:
		// First signal: signal that combines all the gaussian curves.
		// Second signal: individual signal (activated when highlighted).
	new_data = [];
	new_data[0] = aggregateSignal(data);
	
	var domainData = aggregateSignal(data);
	//domainData[0].Ct = 0;
	
	createDataExportFile_Full(new_data[0]);
	
	if (document.getElementById("dataTable").className != ""){
		new_data[1] = data[document.getElementById("dataTable").className];
		createDataExportFile_Selected(new_data[1], compoundList[document.getElementById("dataTable").className]);
	} else {
		exportFileData_Selected = "";
		exportFileData_SelectedCompound = "";
	}

	x.domain(d3.extent(new_data[0], function(d) { return d.t; }));
	//y.domain(d3.extent(new_data[0], function(d) { return d.Ct; }));
	y.domain(d3.extent(domainData, function(d) { return d.Ct; }));
	//megan.domain([0, 100]);

	g.append("g")
	    .attr("transform", "translate(0," + height + ")")
	    .call(d3.axisBottom(x))
	  .append("text")
	    .attr("fill", "#000")
	    .attr("x", 6)
	    .attr("dx", "62em")
	    .attr("dy", "2.6em")
	    .attr("text-anchor", "middle")
	    .text("time (min)");

	g.append("g")
	    .call(d3.axisLeft(y))
	  .append("text")
	    .attr("fill", "#000")
	    .attr("transform", "rotate(-90)")
	    .attr("y", 6)
	    .attr("dy", "-3.5em")
	    .attr("text-anchor", "end")
		.text("Signal");
	    //.text("Signal (µ moles/liter)");
		
	/*g.append("g")
	    .call(d3.axisRight(megan))
	  .append("text")
	    .attr("fill", "#000")
	    .attr("transform", "rotate(-90)")
	    .attr("y", 6)
	    .attr("dy", "60em")
	    .attr("text-anchor", "end")
		.text("I say a lot of things");*/

	for (i = 0; i < new_data.length; i++) {
		//var line = d3.line()
		//    .curve(d3.curveBasis)
		//    .x(function(d) { return x(d.t); })
		//    .y(function(d) { return y(d.Ct); });
			
		var line = d3.line()
		    .x(function(d) { return x(d.t); })
		    .y(function(d) { return y(d.Ct); });

		g.append("path")
		    .datum(new_data[i])
		    .attr("fill", "none")
		    .attr("id", i)
		    .attr("stroke", (i == 0 ? "steelblue" : "orange"))
		    .attr("stroke-linejoin", "round")
		    .attr("stroke-linecap", "round")
		    .attr("stroke-width", 1.5)
		    .attr("d", line);
		
		if(renderGraphDots){
			g.append("g")
			.selectAll("dot")
			.data(new_data[i])
			.enter()
			.append("circle")
				.attr("cx", function(d) { return x(d.t) })
				.attr("cy", function(d) { return y(d.Ct); })
				.attr("r", 1.5)
				.attr("fill", (i == 0 ? "#007aa2" : "#ff0000"));
		}
	}
}

function renderGraph_new(data, renderGraphDots) {
	console.log("Running 'renderGraph_new(data, renderGraphDots)'...")
	var masterlist = [];
	//console.log(data);
	for (i = 0; i < data.length; i++) {
		masterlist = masterlist.concat(data[i]);
	}
	//console.log(masterlist);

	d3.select("#graph_svg").remove(); //grab the '#graph_svg' tag and remove 

	document.getElementById("graph").innerHTML = "<svg id='graph_svg' width='1400' height='500'></svg>"; //Create a new SVG with a width of 1400 and height of 500
	
	var svg = d3.select("#graph_svg"), //grab the '#graph_svg' tag and bind it to the variable svg
	    margin = {top: 20, right: 20, bottom: 30, left: 50}, //create a JSON containing the margins
	    width = 700 - margin.left - margin.right, //create a variable containing the usable width
	    height = 500 - margin.top - margin.bottom, //create a variable containing the usable height
	    g = svg.append("g").attr("transform", "translate(" + margin.left + "," + margin.top + ")"); //grab the '#graph_svg' tag, append a 'g' tag, assign attribute 'transform'; move the contents of the grouping

	var x = d3.scaleLinear()
	    .rangeRound([0, width]); //create a variable 'x' to set the scale’s range to the specified two-element array of numbers while also enabling rounding. equivalent to: .range(range).round(true);

	var y = d3.scaleLinear()
	    .rangeRound([height, 0]); //create a variable 'y' to set the scale’s range to the specified two-element array of numbers while also enabling rounding. equivalent to: .range(range).round(true);

	//var megan = d3.scaleLinear()
	//    .rangeRound([height, 0]);
		
	// Determines the highest retention time
	tR_max = 0;
	for (i = 0; i < data.length; i++){
		tR = document.getElementById(tableID(4,i)).innerHTML;
		tR = 5;
		if (tR_max < tR){
			tR_max = tR;
		}
	}
}

function createDataExportFile_Full(data){
	//console.log(data);
	var fileData = "t, Ct";
	for(i=0; i<data.length; i++){
		fileData += "\n"+data[i].t.toFixed(2)+", "+data[i].Ct;
	}
	//console.log(fileData);
	exportFileData_Full = fileData;
}

function createDataExportFile_Selected(data, compound){
	//console.log(data);
	exportFileData_SelectedCompound = compound;
	var fileData = "t, "+compound;
	for(i=0; i<data.length; i++){
		fileData += "\n"+data[i].t.toFixed(2)+", "+data[i].Ct;
	}
	//console.log(fileData);
	exportFileData_Selected = fileData;
}

function interpolate(x1_ref, y1_ref, x3_ref, y3_ref, x2_target){
	y2 = (x2_target - x1_ref) * (y3_ref - y1_ref) / (x3_ref - x1_ref);
	y2 += y1_ref;

	return y2
}

function maximum_t(data) {
	max = 0;
	for (i = 0; i < data.length; i++){
		last_point = data[i][data[i].length-1].t;
		if (last_point > max){
			max = last_point
		}
	}
	return max
}

function localInterpolation(data,x0){
	max = data[data.length-1].t;
	min = 0;
	// First locates the closest time points (for interpolation).
	for (i = 0; i < data.length; i++){
		if (typeof data[i+1] != "undefined"){
			if (data[i].t <= x0 && x0 <= data[i+1].t){
				p1 = data[i];
				p2 = data[i+1];
				return interpolate(p1.t, p1.Ct, p2.t, p2.Ct, x0)
			}
		} else {
			return 0
		}
	}
}

function aggregateSignal(data){
	base_data = data[0];
	max_t = maximum_t(data);
	
	if(document.getElementById("signal_offset_general").value == ""){ document.getElementById("signal_offset_general").value = 0; }
	if(document.getElementById("noise_general").value == ""){ document.getElementById("noise_general").value = 0; }
	
	var signalOffset = parseFloat(document.getElementById("signal_offset_general").value);
	var noise = parseFloat(document.getElementById("noise_general").value);
	
	//step = .01;
	var step = parseFloat(((60)/parseFloat(document.getElementById("plot_points_general").value)).toFixed(3));
	
	document.getElementById("plot_points_general_detectorFrequency").innerHTML = (1/((60/document.getElementById("plot_points_general").value)*60)).toFixed(3) + " Hz";
	
	
	//var timeStart = 0;
	var timeStart = parseFloat((parseFloat(document.getElementById("initial_time_general").value)/(60)).toFixed(3));
	aggregate_signal = [];

	var index = 0;
	for (j = timeStart; j < max_t ; j += step) { //j = 0; j < max_t ; j += step
		//index = Math.round(j/step);
		x_targ = j;
		signal = 0;
		for (k = 0; k < data.length; k++){
			y_targ = localInterpolation(data[k], x_targ);
			signal += y_targ;
		}
		
		var noiseValue = (Math.random()*noise)-(noise/2);
		
		aggregate_signal[index] = {
					"t" : j,
					"Ct" : signal+signalOffset+noiseValue,
					"c" : "steelblue"
		}
		
		index += 1;
	}
	
	//aggregate_signal[0].Ct = 0;
	
	return aggregate_signal;
}

function printList(list){
	for (i = 0; i < list.length; i++){
		document.write(i + "- " + list[i].t + ": " +list[i].Ct + "\n");
	}
}

//Check whether the specified values are blank OR zero
//If they are, return a 'default' value for the variable
//If they are not, return the original value
function checkIfValid(variable, value) {
	//value = value of iD from HTML input
	//variable = variable testing for incase a 'default' value is needed
	var result;
	if(value == "" || parseFloat(value) == 0){
		if(variable == "iD"){
			result = 5.0;
			document.getElementById("inner_diameter_other").value = "5.0";
		} else if(variable == "d"){
			result =  2.1;
			document.getElementById("inner_diameter_column").value = "2.1";
		} else if(variable == "L"){
			result =  20.0;
			document.getElementById("length_column").value = "20.0";
		} else if(variable == "Vinj"){
			result =  5.0;
			document.getElementById("injection_volume_chrom").value = "5.0";
		} else if(variable == "fR"){
			result =  2.5;
			document.getElementById("flow_rate_chrom").value = "2.5";
		} else if(variable == "Ee"){
			result = 0.36;
			document.getElementById("interparticle_porosity_column").value = "0.36";
		} else if(variable == "El"){
			result = 0.4;
			document.getElementById("intraparticle_porosity_column").value = "0.4";
		} else if(variable == "dP"){
			result = 1.9;
			document.getElementById("particle_size_column").value = "1.9";
		} else if(variable == "A"){
			result = 1.0;
			document.getElementById("A_column").value = "1.0";
		} else if(variable == "B"){
			result = 5.0;
			document.getElementById("B_column").value = "5.0";
		} else if(variable == "C"){
			result = 0.05;
			document.getElementById("C_column").value = "0.05";
		} else if(variable == "tau"){
			result = 0.1;
			document.getElementById("time_constant_general").value = "0.1";
		}
	} else {
		result = parseFloat(value);
	}
	return result;
}

function checkIfValid_blank(variable, value){
	var result;
	if(value == ""){
		if(variable == "l"){
			result = 0.0;
			document.getElementById("other_length").value = "0.0";
		} else if(variable == "T"){
			result = 60;
			document.getElementById("temperature_chrom").value = "60";
		} else if(variable == "phi"){
			result = 30;
			document.getElementById("solvent_fraction_comp").value = "30";
		}
	} else {
		result = parseFloat(value);
	}
	return result;
}

/* all calculations */

//Reduced plate height
function theoreticalPlates(h, dP, L) {
	//h = reduced plate height
	//dP = diameter of stationary phase particles
	//L = column length
	//HETP = height equivalent to a theoretical plate
	// ADDRESS THIS
	//h=2.021449731771019;
	var HETP = h*(dP/10000);
	var N = (L/10)/HETP;
	return [HETP, N];
}

//Isocratic elution mode

//isocratic retention factors
function isocraticRetentionFactor(T, A, B, a, b, phi) {
	//kw = isocratic retention factor of the compound in water
	//S = solvent sensitivity factor of the solute
	//T = temperature in celcius
	var S = A + B*T;
	var kw = Math.pow(10, (a+b*T))
	var k = Math.pow(10, (Math.log(kw) - S*phi));
	return k;
}

//retention time
function retentionTime(t0, k) {
	//t0 = void time
	//k = isocratic retention factor
	var tR = t0/(1+k);
	return tR;
}

//isocratic peak width
function isocraticPeakWidth(tR, N, Vinj, F, tau) {
	//tR = retention time of each compound
	//N = theoretical plate number
	//Vinj = injection volume
	//F = volumetric flow rate
	//tau = detector line constant
	var omegaT = Math.pow(Math.pow(tR/Math.pow(N, 1/2), 2) + Math.pow(tau, 2) + 1/12*Math.pow(Vinj/F, 2), 1/2);
	return omegaT;
}

function tubingVolume(length, diameter) {
    var volume = (length / 100) * (Math.PI * Math.pow((diameter * 0.0000254) / 2, 2) * 1000000000);
    return volume;
}

function calcKprime(t0, T, phi, compoundName, solvent){

	var lnkwint = compoundLSSCoefficients[compoundName][0];
	var lnkwslope = compoundLSSCoefficients[compoundName][1];
	var Sint = compoundLSSCoefficients[compoundName][2];
	var Sslope = compoundLSSCoefficients[compoundName][3];

	//console.log("lnkwint = " + lnkwint);
	//console.log("lnkwslope = " + lnkwslope);
	//console.log("Sint = " + Sint);
	//console.log("Sslope = " + Sslope);

	var tKelvin = T + 273.15;
	
	var lnkw = (lnkwslope * tKelvin) + lnkwint;
	//console.log("lnkw = " + lnkw);
	
	var S = (Sslope * tKelvin) + Sint;
	//console.log("S = " + S);
	
	var lnk = lnkw - (S*(phi));
	//console.log("lnk = " + lnk);
	
	var k = Math.exp(lnk);
	//console.log("k = " + k);
	
	//var k = Math.pow(10, (logkw - S*phi));
	//console.log("k = " + k);
	
	var arr = [lnkw, S, k];
	//console.log(arr);

	return arr;
}


function isocraticSigma (tR, N, tau, Vinj, F, UsT) {
	var t1 = Math.pow((tR*60 / Math.pow(N, 1/2)), 2);
	var t2 = Math.pow(tau, 2);
		var t3 = (1/12)*Math.pow((Vinj/1000) / (F/60), 2);
	return Math.pow(t1 + t2 + t3 + UsT, 1/2);
}

function tubingTimeBroadening(volume, diameter, length, flowRate, diffusionCoefficient) {
	var tubingRadius = (diameter*0.000254)/2;
	var tubingOpenTubeVelocity = (flowRate / 60) / (Math.PI * Math.pow(tubingRadius, 2));
	var tubingZBroadening = (2 * diffusionCoefficient * length / tubingOpenTubeVelocity) + ((Math.pow(tubingRadius, 2) * length * tubingOpenTubeVelocity) / (24 * diffusionCoefficient));
	var tubingVolumeBroadening = Math.pow(Math.sqrt(tubingZBroadening) * Math.PI * Math.pow(tubingRadius, 2), 2);
	var tubingTimeBroadening = Math.pow((Math.sqrt(tubingVolumeBroadening) / flowRate) * 60, 2);
	return tubingTimeBroadening;
}

function isocraticElutionMode(t0, T, phi, N, tau, Vinj, F, solvent, compoundList, v, d, l, De) {
	var compoundName = Object.keys(compoundList);
	
	//console.log("Isocratic Elution Mode");
	
	compoundName = compoundList; // Change implemented by Ray Sajulga 6/2/17

	var graphData = [];
	var tF = 0.0;

	if (!document.getElementById("auto_time_check").checked) { tF = (parseFloat(document.getElementById("final_time_general").value))/60; }
	
	//console.log("tF = "+tF);
	
	var tableArray = new Array();
	var previous_tR = 0;

	var table = [];
	
	var max_final_time = 0;
	
	var resolution_maxTime = 1000;
	
	if (tF <= 0.0) {
		//time is determined automatically
		//var step = parseFloat((30/parseFloat(document.getElementById("plot_points_general").value)).toFixed(3));
		var step = parseFloat(((60)/parseFloat(document.getElementById("plot_points_general").value)).toFixed(3));
		//step = .01;
		for (i = 0; i < compoundName.length; i++) {
			var cmpdData = [];
			//console.log(compoundName[i]);
 
			var k = calcKprime(t0, T, phi, compoundName[i], solvent)[2];
			var tR = (t0/60)*(1+k);
			
			var UsT = tubingTimeBroadening(v, d, l, tR, De);
			
			var sigma = isocraticSigma(tR, N, tau, Vinj, F, UsT);

			var conc = Number(document.getElementById("concentration_"+compoundName[i]).value);

			//console.log("conc = "+conc);

			//var W = parseFloat(((Vinj/1000000)*(M[i])).toFixed(15));
			var W = parseFloat(((Vinj/1000000)*(conc)).toFixed(15));
			//W *= 1000000; 
			//var t = 0;
			var t = tR - (8 * (sigma / 60));

			if (t < 0) {
				t = 0;
			}

			var j = 0;
			var check = true;
			var check2 = true;
			var loops = 0;
			var infinite_loop_breaker = false;
			//var tF = 0;
			var tF = t;

			var compoundArray = new Array();
			compoundArray[0] = compoundName[i];
			compoundArray[1] = k.toFixed(4);
			compoundArray[2] = tR;
			compoundArray[3] = sigma;
			compoundArray[4] = Math.exp(calcKprime(t0, T, phi, compoundName[i], solvent)[0]);
			compoundArray[5] = calcKprime(t0, T, phi, compoundName[i], solvent)[1].toFixed(4);
			tableArray[i] = compoundArray;

			table[i] = [];
			table[i][0] = compoundName[i];

			while (t <= tF) {
				var Ct = 1000000*(W/1000000)/(Math.pow((2*Math.PI), 0.5)*(sigma/60)*(F/(60*1000)))*Math.exp(-Math.pow((t-tR),2)/(2*Math.pow((sigma/60), 2)));
				if (loops > 10000000) {
					//alert("infinite loop");
					//alert(compoundName[i]+" did not elute!");
					console.log(compoundName[i]+" did not elute!");
					infinite_loop_breaker = true;
					break;
				}
				if (Ct > 0.01) {
					check = false;
				}
				cmpdData[j] = {
					"t" : t,
					"Ct" : Ct
				};
				if (check || Ct > 0.01) {
					tF += step;
				}
				
				if(check == false && Ct <= 0.01 && check2 == true){
					tF += (0.02 * tF);
					check2 = false;
				}
				
				if(tF > max_final_time){
					max_final_time = tF;
				}
				
				table[i][j+1]=Ct;
				t += step;
				j++;
				loops++;
			}
			//console.log("tF = "+tF);
			//console.log("[automatic] loops = "+loops);
			//graphData[i] = cmpdData;
			if(infinite_loop_breaker){
				cmpdData = [];
				cmpdData[0] = {
					"t" : 0,
					"Ct" : 0
				};
			}
			//console.log(cmpdData);
			graphData[i] = cmpdData;
		}
		//for(i = 0; i < graphData.length; i++){
		//	console.log("graphData["+i+"].length = "+graphData[i].length);
		//}
		
		document.getElementById("initial_time_general").value = 0;
		document.getElementById("final_time_general").value = ((max_final_time*60)+0).toFixed(1);
		resolution_maxTime = (max_final_time*60)+0;
	} else {
		//time is set manually
		var step = parseFloat(((60)/parseFloat(document.getElementById("plot_points_general").value)).toFixed(3));
		//var step = parseFloat((30/parseFloat(document.getElementById("plot_points_general").value)).toFixed(3));
		
		for (i = 0; i < compoundName.length; i++) {
			var cmpdData = [];
 
			var k = calcKprime(t0, T, phi, compoundName[i], solvent)[2];
			var tR = (t0/60)*(1+k);
			
			var UsT = tubingTimeBroadening(v, d, l, tR, De);
			
			var sigma = isocraticSigma(tR, N, tau, Vinj, F, UsT);

			var conc = Number(document.getElementById("concentration_"+compoundName[i]).value);

			//var W = parseFloat(((Vinj/1000000)*(M[i])).toFixed(15));
			var W = parseFloat(((Vinj/1000000)*(conc)).toFixed(15));
			//W *= 1000000; 
			var t = (parseFloat(document.getElementById("initial_time_general").value))/60;
			var j = 0;
			var check = true;
			var loops = 0;
			var infinite_loop_breaker = false;
			var running = true;
			//var tF = 0;

			var compoundArray = new Array();
			compoundArray[0] = compoundName[i];
			compoundArray[1] = k.toFixed(4);
			compoundArray[2] = tR;
			compoundArray[3] = sigma;
			compoundArray[4] = Math.exp(calcKprime(t0, T, phi, compoundName[i], solvent)[0]);
			compoundArray[5] = calcKprime(t0, T, phi, compoundName[i], solvent)[1].toFixed(4);
			tableArray[i] = compoundArray;

			table[i] = [];
			table[i][0] = compoundName[i];

			while (t <= tF && running) {
				//console.log("t = "+t)
				var Ct = 1000000*(W/1000000)/(Math.pow((2*Math.PI), 0.5)*(sigma/60)*(F/(60*1000)))*Math.exp(-Math.pow((t-tR),2)/(2*Math.pow((sigma/60), 2)));
				if (loops > 10000000) {
					//alert("infinite loop");
					//alert(compoundName[i]+" did not elute!");
					console.log(compoundName[i]+" did not elute!");
					infinite_loop_breaker = true;
					break;
				}
				if (Ct > 0.01) {
					check = false;
				}
				cmpdData[j] = {
					"t" : t,
					"Ct" : Ct
				};
				if (check || Ct > 0.01) {
					//running = true;
				} else {
					//running = false;
				}
				
				table[i][j+1]=Ct;
				t += step;
				j++;
				loops++;
			}
			//console.log("[manual] loops = "+loops);
			//graphData[i] = cmpdData;
			if(infinite_loop_breaker){
				cmpdData = [];
				cmpdData[0] = {
					"t" : 0,
					"Ct" : 0
				};
			}
			//console.log(cmpdData);
			graphData[i] = cmpdData;
		}
	}
	//console.log("----------");
	tableArray = tableArray.sort(compareSecondColumn);
	displayTable(tableArray);
	updateTable(tableArray);
	//calcResolution(phi,T,resolution_maxTime,tableArray);
	graphData = updateGraphData(compoundName, tableArray, graphData);
	return graphData;
}

function compareSecondColumn(a, b) {
    if (Number(a[2]) === Number(b[2])) {
		return 0;
	} else {
		return (Number(a[2]) < Number(b[2])) ? -1 : 1;
	}
}

function updateGraphData(compoundName, tableArray, graphData){
	var newGraphData = [];
	for(i = 0; i < compoundName.length; i++){
		var compound = compoundName[i];
		var newPos = 0;
		for(j = 0; j < tableArray.length; j++){
			if(tableArray[i][0] == compoundName[j]){
				newPos = j;
				break;
			}
		}
		newGraphData[i] = graphData[newPos];
	}
	return newGraphData;
}

function gradient_calck(kw, S, phi){
	var lnk = Math.log(kw)-(S * phi);
	var k = Math.exp(lnk);
	return k;
}

function gradient_calcPhiAtTime(phi_i, phi_f, tG, t){
	var slope = (phi_f - phi_i)/(tG);
	var phi_t = (slope*t)+phi_i;
	return phi_t;
}

function gradientElutionMode(solvent, T, phi_i, phi_f, tD, F, d, L, Et, tG, t0, N, tau, Vinj, V0){
	var logProcess = true;
	if(logProcess){
		
	}
	
	Et /= 1000;
	t0 /= 60;
	var deltaPhi = (phi_f - phi_i)/100;
	phi_i /= 100;
	phi_f /= 100;
	
	var gradientSlope = deltaPhi/tG;
	
	//console.log("--------------------");
	
	//console.log("phi_i:\n"+phi_i);
	//console.log("phi_f:\n"+phi_f);
	//console.log("deltaPhi:\n"+deltaPhi);
	//console.log("tG:\n"+tG);
	
	//console.log("gradientSlope:\n"+gradientSlope);
	
	//console.log("phi_e = "+gradientSlope+"(tR-"+tD+"-"+t0+")+"+phi_i);
	
	//console.log("--------------------");
	
	var tKelvin = T + 273.15;
	
	var graphData = [];
	var tableArray = new Array();
	var previous_tR = 0;
	var table = [];
	
	//var step = .01;
	//var step = parseFloat(((60)/parseFloat(document.getElementById("plot_points_general").value)).toFixed(3));
	
	var tF_max = 0;
	
	var tF = 0.0;
	if (!document.getElementById("auto_time_check").checked) { tF = (parseFloat(document.getElementById("final_time_general").value))/60; }
	
	if (tF <= 0.0) {
		//time is determined automatically
		
		var step = parseFloat(((60)/parseFloat(document.getElementById("plot_points_general").value)).toFixed(3));
		
		for(i = 0; i < compoundList.length; i++){
			var cmpdData = [];
			var UsT = 0;

			var conc = Number(document.getElementById("concentration_"+compoundList[i]).value);

			//var W = parseFloat(((Vinj/1000000)*(M[i])).toFixed(15));
			var W = parseFloat(((Vinj/1000000)*(conc)).toFixed(15));
			var cache = "";
			var compoundName = compoundList[i];
		
			var compound = compoundList[i];

			/*if(solvent == "Methanol"){
				var lnkw = (calcGradientMeOH[compound][1]*tKelvin)+calcGradientMeOH[compound][0];
				var S = (calcGradientMeOH[compound][3]*tKelvin)+calcGradientMeOH[compound][2];
			} else {
				var lnkw = (calcGradientACN[compound][1]*tKelvin)+calcGradientACN[compound][0];
				var S = (calcGradientACN[compound][3]*tKelvin)+calcGradientACN[compound][2];
			}*/

			var lnkw = (compoundLSSCoefficients[compound][1] * tKelvin) + compoundLSSCoefficients[compound][0];
			var S = (compoundLSSCoefficients[compound][3] * tKelvin) + compoundLSSCoefficients[compound][2];
		
			var lnk0 = lnkw - (S*(phi_i));
			var k0 = Math.exp(lnk0);
    
			var b = (S*(phi_f-phi_i)*V0)/(F*tG);
    
			var step1 = k0-(tD/t0);
			var step2 = b * step1 + 1;
			var step3 = (t0/b)*Math.log(step2);
			var tR = t0 + tD + step3;
		
			var kw = Math.exp(lnkw);
			//var phi_e = (1/S)*Math.log((S*(deltaPhi/tG)*kw*t0*(k0-tD/t0)+1)/k0);
		
			if((tR-tD-t0) < 0 || (tR-tD-t0) > tG){
				var phi_e = phi_i;
			} else {
				var phi_e = gradientSlope*(tR-tD-t0)+phi_i;
			}
		
			var lnke = lnkw - (S*(phi_e));
			var ke = Math.exp(lnke);
		
			var sigma = Math.sqrt(Math.pow((t0*60)*((1+ke)/(Math.sqrt(N))), 2)+Math.pow(tau, 2));
		
			var t = 0;
			//var t = tR - (8 * (sigma / 60));
			var j = 0;
			var check = true;
			var loops = 0;
			var tF = 0;
		
			var compoundArray = new Array();
			compoundArray[0] = compoundList[i];
			compoundArray[1] = ke.toFixed(4);
			compoundArray[2] = tR;
			compoundArray[3] = sigma;
			compoundArray[4] = Math.exp(lnkw);;
			compoundArray[5] = S.toFixed(4);
			tableArray[i] = compoundArray;
    
			table[i] = [];
			table[i][0] = compoundList[i];
		
			var finalRun = false;
		
			while (t <= tF) {
				var Ct = 1000000*(W/1000000)/(Math.pow((2*Math.PI), 0.5)*(sigma/60)*(F/(60*1000)))*Math.exp(-Math.pow((t-tR),2)/(2*Math.pow((sigma/60), 2)));
				if (loops > 10000000) {
					alert("infinite loop");
					break;
				}
				if (Ct > 0.00001) {
					check = false;
				}
				
				if(check == false && finalRun == false){
					//tF += 1;
					tF += (0.02 * tF);
					finalRun = true;
				}
				
				cmpdData[j] = {
					"t" : t,
					"Ct" : Ct
				};
				if (check || Ct > 0.00001) {
					tF += step;
				}
				
				table[i][j+1]=Ct;
				t += step;
				j++;
				loops++;
			}
			if(tF > tF_max){
				tF_max = tF;
			}
		
			graphData[i] = cmpdData;
		}
	} else {
		//time is set manually
		
		var step = parseFloat(((60)/parseFloat(document.getElementById("plot_points_general").value)).toFixed(3));
		
		for(i = 0; i < compoundList.length; i++){
			var cmpdData = [];
			var UsT = 0;

			var conc = Number(document.getElementById("concentration_"+compoundList[i]).value);

			//var W = parseFloat(((Vinj/1000000)*(M[i])).toFixed(15));
			var W = parseFloat(((Vinj/1000000)*(conc)).toFixed(15));
			var cache = "";
			var compoundName = compoundList[i];
		
			var compound = compoundList[i];
		
			/*if(solvent == "Methanol"){
				var lnkw = (calcGradientMeOH[compound][1]*tKelvin)+calcGradientMeOH[compound][0];
				var S = (calcGradientMeOH[compound][3]*tKelvin)+calcGradientMeOH[compound][2];
			} else {
				var lnkw = (calcGradientACN[compound][1]*tKelvin)+calcGradientACN[compound][0];
				var S = (calcGradientACN[compound][3]*tKelvin)+calcGradientACN[compound][2];
			}*/

			var lnkw = (compoundLSSCoefficients[compound][1] * tKelvin) + compoundLSSCoefficients[compound][0];
			var S = (compoundLSSCoefficients[compound][3] * tKelvin) + compoundLSSCoefficients[compound][2];
		
			var lnk0 = lnkw - (S*(phi_i));
			var k0 = Math.exp(lnk0);
    
			var b = (S*(phi_f-phi_i)*V0)/(F*tG);
    
			var step1 = k0-(tD/t0);
			var step2 = b * step1 + 1;
			var step3 = (t0/b)*Math.log(step2);
			var tR = t0 + tD + step3;
		
			var kw = Math.exp(lnkw);
			//var phi_e = (1/S)*Math.log((S*(deltaPhi/tG)*kw*t0*(k0-tD/t0)+1)/k0);
		
			if((tR-tD-t0) < 0 || (tR-tD-t0) > tG){
				var phi_e = phi_i;
			} else {
				var phi_e = gradientSlope*(tR-tD-t0)+phi_i;
			}
		
			var lnke = lnkw - (S*(phi_e));
			var ke = Math.exp(lnke);
		
			var sigma = Math.sqrt(Math.pow((t0*60)*((1+ke)/(Math.sqrt(N))), 2)+Math.pow(tau, 2));
		
			var t = 0;
			var j = 0;
			var check = true;
			var loops = 0;
			//var tF = 0;
		
			var compoundArray = new Array();
			compoundArray[0] = compoundList[i];
			compoundArray[1] = ke.toFixed(4);
			compoundArray[2] = tR;
			compoundArray[3] = sigma;
			compoundArray[4] = Math.exp(lnkw);;
			compoundArray[5] = S.toFixed(4);
			tableArray[i] = compoundArray;
    
			table[i] = [];
			table[i][0] = compoundList[i];
		
			var finalRun = false;
		
			while (t <= tF) {
				var Ct = 1000000*(W/1000000)/(Math.pow((2*Math.PI), 0.5)*(sigma/60)*(F/(60*1000)))*Math.exp(-Math.pow((t-tR),2)/(2*Math.pow((sigma/60), 2)));
				if (loops > 10000000) {
					alert("infinite loop");
					break;
				}
				if (Ct > 0.00001) {
					check = false;
				}
				
				if(check == false && finalRun == false){
					//tF += 1;
					//tF += (0.02 * tF);
					finalRun = true;
				}
				
				cmpdData[j] = {
					"t" : t,
					"Ct" : Ct
				};
				if (check || Ct > 0.00001) {
					//tF += step;
				}
				
				table[i][j+1]=Ct;
				t += step;
				j++;
				loops++;
			}
			if(tF > tF_max){
				tF_max = tF;
			}
		
			graphData[i] = cmpdData;
		}
		
	}
	
	
	
	var percentB = [];
		
	for(t = 0; t <= tF_max; t+= step){
		
		if((t-tD-t0) < 0 || (t-tD-t0) > tG){
			var Ct = phi_i;
		} else {
			var Ct = gradientSlope*(t-tD-t0)+phi_i;
		}
		
		percentB[percentB.length] = {
			"t" : t,
			"Ct" : Ct
		};
	}
	
	//console.log("tF_max = "+tF_max);
	
	//console.log(percentB);
	
	tableArray = tableArray.sort(compareSecondColumn);
	displayTable(tableArray);
	updateTable(tableArray);
	return graphData;
}

function testTable(data){
	var myTable="<table id='testTable'>"
	row_length = data[0].length;
	max = 0;
	for (i = 0; i < data.length; i++){
		last_point = data[i].length;
		if (last_point > max){
			max = last_point
		}
	}
	for (i = 0; i < max; i++){
		myTable += "<tr>"
		for (j = 0; j < data.length; j++){
			if (typeof data[j][i] != "undefined"){
				myTable+= "<td>" + data[j][i] + "</td>";
			} else {
				myTable+= "<td></td>";
			}
		}
		myTable += "</tr>"
	}
	document.write(myTable);
}

function print(string){
	document.write(" " + string + "<p></p>");
}

function updateTable(tabularData){
	for (var y=0; y<compoundList.length; y++) {
  		for (var x=0; x<6; x++) {
  			if (2 <= x && x <5){
  				tabularData[y][x] = tabularData[y][x].toFixed(4);
  			}
  			id = "" + (y + 1) + "" + (x + 1);
    		document.getElementById(id).innerHTML = tabularData[y][x];
    	}
    }
}

function clickTable(item){
	/*
	if(item.className == "highlight"){
		var alreadyHighlighted = true;
	} else {
		var alreadyHighlighted = false;
	}
	if(document.getElementsByClassName("highlight").length > 0){
		document.getElementsByClassName("highlight")[0].className = "";
	}
	if(alreadyHighlighted == false){
		item.className = "highlight";
	}
	calculatePeaks();
	var selected = item.hasClass("highlight");
	$("#dataTable tbody tr").removeClass("highlight");
	$("#dataTable").removeClass();
	if(!selected){
		item.addClass("highlight");
		$('#dataTable').addClass(item.attr("id"));
	}
	*/
	console.log("Row "+ item.id +"Clicked!");
}

function displayTable(tabularData){
	var myTable= "";
	for (var y=0; y<compoundList.length; y++) {
		myTable+="<tr id=" + y + ">";
		for (var x=0; x<6; x++) {
			myTable+="<td id=" + (y + 1) + "" + (x + 1) + "> </td>";
		}
		myTable+="</tr>";
	}
	document.getElementById("dataTable").innerHTML = myTable;
}

var optimize_max_resolution = 0;
var optimize_maxRs_phi = 0;
var optimize_maxRs_T = 0;
var optimize_min_time = 1000;

function calcResolution(Rs_solventBFraction, Rs_temperature, Rs_time, tableArray){
	//console.log("calcResolution(tableArray)");
	//console.log("----------");
	//console.log(tableArray);
	//console.log("Compound, k', tR(min), σ(s), kw, S\n");
	for(var tableArrayPos=0; tableArrayPos<(tableArray.length-1); tableArrayPos++){
		//console.log(tableArray[tableArrayPos]);
		//console.log("----------");
		//console.log("Compounds --> "+tableArray[tableArrayPos][0]+" & "+tableArray[tableArrayPos+1][0]);
		//console.log("tR1(min) --> "+tableArray[tableArrayPos][2]);
		//console.log("σ1(s) --> "+tableArray[tableArrayPos][3]);
		//console.log("tR2(min) --> "+tableArray[tableArrayPos+1][2]);
		//console.log("σ2(s) --> "+tableArray[tableArrayPos+1][3]);
		var trA = tableArray[tableArrayPos][2];
		var trB = tableArray[tableArrayPos+1][2];
		var wA = 4*(tableArray[tableArrayPos][3] / 60);
		var wB = 4*(tableArray[tableArrayPos+1][3] / 60);
		//console.log(trA+", "+trB+", "+wA+", "+wB);
		var resolution = 2*(trB-trA)/(wA+wB);
		//console.log(","+Rs_solventBFraction+","+Rs_temperature+","+resolution+","+Rs_time+",");
		
		if(Rs_time < optimize_min_time){
			if(resolution > optimize_max_resolution){
				optimize_max_resolution = resolution;
				optimize_maxRs_phi = Rs_solventBFraction;
				optimize_maxRs_T = Rs_temperature;
				optimize_min_time = Rs_time;
			}
		}
	}
	//console.log("----------");
}

function optimize(){
	optimize_max_resolution = 0;
	optimize_maxRs_phi = 0;
	optimize_maxRs_T = 0;
	var optimize_phi_initial = document.getElementById('solvent_fraction_comp').value;
	for(optimize_phi=0; optimize_phi<=100; optimize_phi++){
		document.getElementById('solvent_fraction_comp').value = optimize_phi;
		for(optimize_T=10; optimize_T<=150; optimize_T++){
			document.getElementById('temperature_chrom').value = optimize_T;
			calculatePeaks();
		}
	}
	document.getElementById('solvent_fraction_comp').value = optimize_phi_initial;
	calculatePeaks();
	console.log("Max Rs = "+optimize_max_resolution+" @ phi = "+optimize_maxRs_phi+" & T = "+optimize_maxRs_T+", time = "+optimize_min_time);
}

//consolidate calculations
function calculatePeaks() {
	if(document.getElementById("plot_points_general").value < 100 || document.getElementById("plot_points_general").value == ""){ document.getElementById("plot_points_general").value = 100; }
	//Find Elution Mode
	var mode;
	if (document.getElementById("isocratic_radio").checked) {
		mode = "isocratic";
		hideGradientElutionStuffs("true");
		//document.getElementById("headerTable_k").innerHTML = "k&#39;";
		document.getElementById("headerTable_k").innerHTML = "k";
	} else {
		mode = "gradient";
		hideGradientElutionStuffs("false");
		document.getElementById("headerTable_k").innerHTML = "k<sub>e</sub>";
	}
	
	//Run value validation
	//if(document.getElementById("Gradient_MixingVolume").value == ""){ document.getElementById("Gradient_MixingVolume").value = 200; }
	//if(document.getElementById("Gradient_NonMixingVolume").value == ""){ document.getElementById("Gradient_NonMixingVolume").value = 200; }
	if(document.getElementById("Gradient_Delay_Volume").value == ""){ document.getElementById("Gradient_MixingVolume").value = 400; }
	
	if(document.getElementById('solvent_fraction_comp').value > 100){ document.getElementById('solvent_fraction_comp').value = 100; }
	if(document.getElementById('solvent_fraction_comp').value < 0){ document.getElementById('solvent_fraction_comp').value = 0; }
	
	if(document.getElementById("Gradient_Phi_Init").value > 100){ document.getElementById("Gradient_Phi_Init").value = 100; }
	if(document.getElementById("Gradient_Phi_Init").value < 0){ document.getElementById("Gradient_Phi_Init").value = 0; }
	
	if(document.getElementById("Gradient_Phi_Final").value > 100){ document.getElementById("Gradient_Phi_Final").value = 100; }
	if(document.getElementById("Gradient_Phi_Final").value < 0){ document.getElementById("Gradient_Phi_Final").value = 0; }
	
	if(document.getElementById('temperature_chrom').value > 150){ document.getElementById('temperature_chrom').value = 150; }
	if(document.getElementById('temperature_chrom').value < 10){ document.getElementById('temperature_chrom').value = 10; }
	
	if(document.getElementById("flow_rate_chrom").value > 8){ document.getElementById("flow_rate_chrom").value = 8; }
	if(document.getElementById("flow_rate_chrom").value < 0.05){ document.getElementById("flow_rate_chrom").value = 0.05; }
	
	if(document.getElementById("length_column").value < 1){ document.getElementById("length_column").value = 1; }
	
	if(document.getElementById("inner_diameter_column").value < 1){ document.getElementById("inner_diameter_column").value = 1; }
	
	if(document.getElementById("injection_volume_chrom").value < 0.1){ document.getElementById("injection_volume_chrom").value = 0.1; }
//============================================================================================================================================
	//Collect inputs from the user interface
	
	var solvent = document.getElementById("solvent_b_text").innerHTML; //Organic Modifier

	//compoundLSSCoefficients
	var alertText_removedCompounds = updateCompoundsList_keepIfIncluded();
	
	//console.log(compoundList);
	
	var d = checkIfValid("d", document.getElementById('inner_diameter_column').value);	//*column diameter
	var L = checkIfValid("L", document.getElementById('length_column').value);	//*column length
	var Vinj = checkIfValid("Vinj", document.getElementById('injection_volume_chrom').value); //*injection volume
	var fR = checkIfValid("fR", document.getElementById("flow_rate_chrom").value); //flow rate
	
	//var gradient_mixingVolume = document.getElementById("Gradient_MixingVolume").value;
	//var gradient_nonMixingVolume = document.getElementById("Gradient_NonMixingVolume").value;
	
	var gradient_mixingVolume = document.getElementById("Gradient_Delay_Volume").value / 2;
	var gradient_nonMixingVolume = document.getElementById("Gradient_Delay_Volume").value / 2;
	
	var phi_i = document.getElementById("Gradient_Phi_Init").value;
	var phi_f = document.getElementById("Gradient_Phi_Final").value;
	
	var tG = document.getElementById("Gradient_Time").value;
	
	var Ee = checkIfValid("Ee", document.getElementById('interparticle_porosity_column').value); //interparticlePorosity(Ve, V);	//fraction of volume in column between stationary phase particles
	var El = checkIfValid("El", document.getElementById('intraparticle_porosity_column').value); //intraparticlePorosity(Vp, Vl);	//fraction of stationary phase particles occupied by eluent
	
	var dP = checkIfValid("dP", document.getElementById('particle_size_column').value);	//diameter of stationary phase particles
	
	var T = checkIfValid_blank("T", document.getElementById('temperature_chrom').value);	//temperature
	var phi = checkIfValid_blank("phi", document.getElementById('solvent_fraction_comp').value) / 100;		//volume fraction of organic modifier
	
	var A = checkIfValid("A", document.getElementById("A_column").value);	//*van Deemter coefficient
	var B = checkIfValid("B", document.getElementById("B_column").value);	//*van Deemter coefficient
	var C = checkIfValid("C", document.getElementById("C_column").value);	//*van Deemter coefficient
	
	var tau = checkIfValid("tau", document.getElementById("time_constant_general").value);
	
	var iD = checkIfValid("iD", document.getElementById("inner_diameter_other").value);	//inner diameter
	var l = checkIfValid_blank("l", document.getElementById("other_length").value);	//post column tubing
	var v = tubingVolume(l, iD);
	//document.getElementById("volume_other").innerHTML = v.toFixed(5);
	
//============================================================================================================================================
	//Run calculations and update user interface
	
	/*console.log("phi = "+phi);
	if(phi < 0.3){
		console.log("phi << 0.3");
		console.log("plot points = "+(phi*10000));
		document.getElementById("plot_points_general").value = (phi*10000).toFixed(0);
	} else {
		console.log("phi >= 0.3");
		console.log("plot points = 3000");
		document.getElementById("plot_points_general").value = 3000;
	}*/
	
	var VD = Number(gradient_mixingVolume) + Number(gradient_nonMixingVolume); //Dwell volume
	var tD = (((Number(gradient_mixingVolume)/1000) + (Number(gradient_nonMixingVolume)/1000))/Number(fR)); //Dwell time
	//document.getElementById("Gradient_PreColumn_Volume_DwellVolume").innerHTML = VD;
	document.getElementById("Gradient_PreColumn_Volume_DwellTime").innerHTML = tD.toFixed(2);
	
	if(tG <= 0){ tG = 0.01; document.getElementById("Gradient_Time").value = 0.01; } //Gradient Time
	
	var Et = Ee + El*(1-Ee); //total porosity
	document.getElementById("total_porosity_column").innerHTML = Et.toFixed(4);
	
	var V0 = Math.PI*Math.pow(((d/10)/2), 2)*(L/10)*Et; //void volume
	var t0 = V0/fR*60; //void time
	document.getElementById("void_volume_column").innerHTML = V0.toFixed(4);
	document.getElementById("void_time_column").innerHTML = t0.toFixed(4);
	
	if(mode == "isocratic"){
		if (solvent == "Acetonitrile") {
			var n = Math.exp(phi * (-3.476 + (726 / (T + 273.15))) + (1 - phi) * (-5.414 + (1566 / (T + 273.15))) + phi * (1 - phi) * (-1.762 + (929 / (T + 273.15)))); //viscosity - acetonitrile
		} else if (solvent == "Methanol") {
			var n = Math.exp(phi * (-4.597 + (1211 / (T + 273.15))) + (1 - phi) * (-5.961 + (1736 / (T + 273.15))) + phi * (1 - phi) * (-6.215 + (2809 / (T + 273.15)))); //viscosity - methanol
		} else {
			var n = Math.exp((0) * (-3.476 + (726 / (T + 273.15))) + (1 - (0)) * (-5.414 + (1566 / (T + 273.15))) + (0) * (1 - (0)) * (-1.762 + (929 / (T + 273.15)))); //viscosity - 100% water
        }
	} else if(mode == "gradient"){
		var n = 0;
		var phi_Tmp_count = 0;
		//console.log("phi_i = " + phi_i);
		//console.log("phi_f = " + phi_f);
		for(phi_Tmp = phi_i/100; phi_Tmp <= phi_f/100; phi_Tmp+=0.01){
			if (solvent == "Acetonitrile") {
				n += Math.exp(phi_Tmp * (-3.476 + (726 / (T + 273.15))) + (1 - phi_Tmp) * (-5.414 + (1566 / (T + 273.15))) + phi_Tmp * (1 - phi_Tmp) * (-1.762 + (929 / (T + 273.15)))); //viscosity - acetonitrile
			} else if (solvent == "Methanol") {
				n += Math.exp(phi_Tmp * (-4.597 + (1211 / (T + 273.15))) + (1 - phi_Tmp) * (-5.961 + (1736 / (T + 273.15))) + phi_Tmp * (1 - phi_Tmp) * (-6.215 + (2809 / (T + 273.15)))); //viscosity - methanol
			} else {
				n += Math.exp((0) * (-3.476 + (726 / (T + 273.15))) + (1 - (0)) * (-5.414 + (1566 / (T + 273.15))) + (0) * (1 - (0)) * (-1.762 + (929 / (T + 273.15)))); //viscosity - 100% water
            }
			phi_Tmp_count += 1;
		}
		//console.log("n = " + n);
		//console.log("phi_Tmp_count = " + phi_Tmp_count);
		n = n / phi_Tmp_count;
		//console.log("n = " + n);
	}
	
	//console.log("n = " + n);
	document.getElementById("eluent_viscosity_general").innerHTML = n.toFixed(4);
	
	var associationParameter = ((1 - phi) * (2.6 - 1.9)) + 1.9;	//association parameter
	
	var Morg;	//molecular weight of the organic modifier
	if (solvent == "Methanol") { Morg = 32.04; /*Methanol*/ } else { Morg = 41.05; /*Acetonitrile*/ }
	
	var Msolv = phi * (Morg - 18) +18; //molecular weight of the solvent
	
	var Vm = 200; //molar volume of the solute
	//Currently, 200 g/mol is just a representitive value. Will add full functionality soon. -Thomas Lauer 03/06/2018
	
	var De = 0.000000074*(((T + 273.15)*Math.sqrt(associationParameter*Msolv))/(n*Math.pow(Vm, 0.6))); //average analyte diffusion coefficient
	document.getElementById("avg_diffusion_coefficient_general").innerHTML = De.toExponential(4);
	
	var Us = (fR/60)/((Math.PI * Math.pow((d/10), 2))/4); //open tube flow velocity
	var Ue = Us/Ee; //interstitial flow velocity
	var U = Us/Et; //chromatographic flow velocity
	var V = Ue*(dP/10000)/De; //reduced velocity
	document.getElementById("open_tube_flow_velocity").innerHTML = Us.toFixed(4);
	document.getElementById("intersitial_flow_velocity").innerHTML = Ue.toFixed(4);
	document.getElementById("chromatographic_flow_velocity").innerHTML = U.toFixed(4);
	document.getElementById("reduced_flow_velocity").innerHTML = V.toFixed(4);
	
	var deltaP = 180*((Us*n*(L/10)*Math.pow((1-Ee), 2))/(Math.pow(Ee, 3)*Math.pow(dP, 2)));		//backpressure
	document.getElementById("backpressure_chrom").innerHTML = (deltaP).toFixed(2);
	
	var h = A+(B/V)+(C*V);	//reduced plate height
	document.getElementById("reduced_plate_height_column").innerHTML = parseFloat(h).toFixed(4);
	
	var NHETP = theoreticalPlates(h, dP, L);	//theoretical plate number
	document.getElementById("HETP_chrom").innerHTML = NHETP[0] .toExponential(4);
	
	var N = NHETP[1]; //number of theoretical plates
	document.getElementById("theoretical_plates_chrom").innerHTML = Math.floor(N);
	
//============================================================================================================================================
	//Run elution mode specific calculations
	
	var data;
	if (mode == "isocratic") {
		data = isocraticElutionMode(t0, T, phi, N, tau, Vinj, fR, solvent, compoundList, v, d, l, De);
	} else {
		data = gradientElutionMode(solvent, T, phi_i, phi_f, tD, fR, d, L, Et, tG, t0, N, tau, Vinj, V0);
	}
	
//============================================================================================================================================
	//Render the graph and run final user interface updates
	
	var renderGraphDots = document.getElementById("renderGraph_dots_check").checked;
	renderGraph(data, renderGraphDots);
	//var useNewRenderGraphFunction = document.getElementById("renderGraph_newFunction_check").checked;
	
	/*if(useNewRenderGraphFunction){
		renderGraph_new(data, renderGraphDots);
	} else {
		renderGraph(data, renderGraphDots);
	}*/
	
	//refreshPreloadedCompounds();
	//refreshNowloadedCompounds();

	//if (compoundList.length == Object.keys(calcGradientACN).length) {
	if (compoundList.length == Object.keys(compoundLSSCoefficients).length){
		document.getElementById("loadAllCompounds_button").disabled = true;
		//document.getElementById("preloaded").disabled = true;
	} else {
		document.getElementById("loadAllCompounds_button").disabled = false;
		//document.getElementById("preloaded").disabled = false;
	}
	
	if(compoundList.length <= 1){
		//document.getElementById("now_loaded").disabled = true;
	} else {
		//document.getElementById("now_loaded").disabled = false;
	}
	//console.log("--------------------------------------------------");
	
	if(alertText_removedCompounds != ""){ alert(alertText_removedCompounds); }
} 

function load() {
	// compoundLSSCoefficients

	updateLoadedCompounds();

	//calcGradientACN = calcGradientACN_Agilent_SBC18;
	//calcGradientMeOH = calcGradientMeOH_Agilent_SBC18;
	
	var sliders = document.getElementsByClassName("slider_ticks");
	var i;
	for (i = 0; i < sliders.length; i++) {
		loadSlider(sliders[i].id);
	}
	//var raw_compounds = Object.keys(calcGradientACN);
	var raw_compounds = Object.keys(compoundLSSCoefficients);
	var compounds = [];
	for(k = 0; k < raw_compounds.length; k++){
		var listed = checkIfCompoundIsListed(raw_compounds[k]);
		if(listed == false){
			var arrayPos = compounds.length;
			compounds[arrayPos] = raw_compounds[k];
		}
	}
			
	//document.getElementById("preloaded_dropdown").innerHTML = "";
		
	/*for (i = 0; i < compounds.length; i++) {
		var html = document.getElementById("preloaded_dropdown").innerHTML;
		document.getElementById("preloaded_dropdown").innerHTML = html + "<a id="+ compounds[i].replace(/ /g,"_") +"_menu_option onclick=addCompoundToList('" + compounds[i] + "') class='dropbutton'>"+ compounds[i] +"</a>"
	}*/
	//log("preloaded_dropdown innerHTML has been updated!");
	/*for (i = 0; i < compounds.length; i++) {
		var save = compounds[i].replace(/ /g,"_");
		document.getElementById(save+"_menu_option").onClick = "select_option('"+ compounds[i] +"', 'preloaded')";
	}*/
	//refreshNowloadedCompounds();
	
	updateCompoundsTable("ACN");
	
	displayTable();
	calculatePeaks();
}



