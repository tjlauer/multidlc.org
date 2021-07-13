


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

function log(msg){
	var debugLog = document.getElementById("showDebuggingLog").checked;
	if(debugLog == true){
		var logCache = "";
		var t = getCurrentTime();
		logCache += logCounter + ") " + t + " -\n\t" + msg;
		logCache += "\n--------------------------------------------------------------------------------\n";
		//console.log(logCache);
		logCounter++;
	}
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
	
	/*compounds = compoundList;
	
	document.getElementById("preloaded_dropdown").innerHTML = "";
		
	for (i = 0; i < compounds.length; i++) {
		var html = document.getElementById("preloaded_dropdown").innerHTML;
		document.getElementById("preloaded_dropdown").innerHTML = html + "<a id="+ compounds[i].replace(/ /g,"_") +"_menu_option onclick=addCompoundToList('" + compounds[i] + "') class='dropbutton'>"+ compounds[i] +"</a>"
	}
	log("preloaded_dropdown innerHTML has been updated!");
	for (i = 0; i < compounds.length; i++) {
		var save = compounds[i].replace(/ /g,"_");
		document.getElementById(save+"_menu_option").onClick = "select_option('"+ compounds[i] +"', 'preloaded')";
	}*/
	//log("save+'_menu_option' onClick has been initiated!");
	//refreshNowloadedCompounds();
	//refreshPreloadedCompounds();
	compoundList[compoundList.length] = name;
	
	compoundFamilies["Custom"][0][compoundFamilies["Custom"][0].length] = name;
	
	compoundFamilies["Custom"][1] = false;
	
	if(document.getElementById("solvent_b_text").innerHTML == "Methanol"){
		updateCompoundsTable("MeOH");
	} else if(document.getElementById("solvent_b_text").innerHTML == "Acetonitrile"){
		updateCompoundsTable("ACN");
	}
	displayTable();
	calculatePeaks();
}

function setLanguage(){
	var wordJSON = {};
	wordJSON.menu = {};
	if (document.getElementById("german_radio").checked) {
		//Selected Language is german
		//alert("Selected language has been switched to German.");
		wordJSON.menu.languages = "Sprachen";
		wordJSON.menu.manageCompounds = "Verbindungen verwalten";
		wordJSON.menu.mobilePhaseComposition = "Zusammensetzung der mobilen Phase";
		wordJSON.menu.chromatographicProperties = "Chromatographische Eigenschaften";
		wordJSON.menu.generalProperties = "Allgemeine Eigenschaften (Beta)";
		wordJSON.menu.columnProperties = "Spalteneigenschaften";
	} else if (document.getElementById("spanish_radio").checked) {
		//Selected Language is spanish
		//alert("Selected language has been switched to Spanish.");
		wordJSON.menu.languages = "Languages";
		wordJSON.menu.manageCompounds = "Manage Compounds";
		wordJSON.menu.mobilePhaseComposition = "Mobile Phase Composition";
		wordJSON.menu.chromatographicProperties = "Chromatographic Properties";
		wordJSON.menu.generalProperties = "General Properties (Beta)";
		wordJSON.menu.columnProperties = "Column Properties";
	} else if (document.getElementById("french_radio").checked) {
		//Selected Language is french
		//alert("Selected language has been switched to French.");
		wordJSON.menu.languages = "Languages";
		wordJSON.menu.manageCompounds = "Manage Compounds";
		wordJSON.menu.mobilePhaseComposition = "Mobile Phase Composition";
		wordJSON.menu.chromatographicProperties = "Chromatographic Properties";
		wordJSON.menu.generalProperties = "General Properties (Beta)";
		wordJSON.menu.columnProperties = "Column Properties";
	} else {
		//Selected Language is english
		//alert("Selected language has been switched to English.");
		wordJSON.menu.languages = "Languages";
		wordJSON.menu.manageCompounds = "Manage Compounds";
		wordJSON.menu.mobilePhaseComposition = "Mobile Phase Composition";
		wordJSON.menu.chromatographicProperties = "Chromatographic Properties";
		wordJSON.menu.generalProperties = "General Properties (Beta)";
		wordJSON.menu.columnProperties = "Column Properties";
	}
	updateWords(wordJSON);
	//console.log(JSON.stringify(wordJSON));
}

function updateWords(wordJSON){
	document.getElementById("languages_button").innerHTML = wordJSON.menu.languages;
	document.getElementById("add_compound_button").innerHTML = wordJSON.menu.manageCompounds;
	document.getElementById("mobile_phase_button").innerHTML = wordJSON.menu.mobilePhaseComposition;
	document.getElementById("chromatographic_properties_button").innerHTML = wordJSON.menu.chromatographicProperties;
	document.getElementById("general_properties_button").innerHTML = wordJSON.menu.generalProperties;
	document.getElementById("column_properties_button").innerHTML = wordJSON.menu.columnProperties;
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
	log("preloaded_dropdown innerHTML has been updated!");
	for (i = 0; i < compounds.length; i++) {
		var save = compounds[i].replace(/ /g,"_");
		document.getElementById(save+"_menu_option").onClick = "select_option('"+ compounds[i] +"', 'preloaded')";
	}
	//log("save+'_menu_option' onClick has been initiated!");
	refreshNowloadedCompounds();
	refreshPreloadedCompounds();
	displayTable();
	calculatePeaks();
}

function toggleShowDebuggingLog(){
	var ele = document.getElementById("showDebuggingLog");
	if(ele.checked == true){
		ele.checked = false;
	} else {
		ele.checked = true;
	}
}

function checkIfCompoundIsListed(compound){
	log("Running 'checkIfCompoundIsListed("+compound+")'...");
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

/*function refreshPreloadedCompounds(){
	log("Running 'refreshPreloadedCompounds()'...");
	var raw_compounds = Object.keys(calcGradientACN);
	var compounds = [];
	for(k = 0; k < raw_compounds.length; k++){
		var listed = checkIfCompoundIsListed(raw_compounds[k]);
		if(listed == false){
			var arrayPos = compounds.length;
			compounds[arrayPos] = raw_compounds[k];
		}
	}
		
	document.getElementById("preloaded_dropdown").innerHTML = "";
			
	for (i = 0; i < compounds.length; i++) {
		var html = document.getElementById("preloaded_dropdown").innerHTML;
		document.getElementById("preloaded_dropdown").innerHTML = html + "<a id="+ compounds[i].replace(/ /g,"_") +"_menu_option onclick=addCompoundToList('" + compounds[i] + "') class='dropbutton'>"+ compounds[i] +"</a>"
	}
	for (i = 0; i < compounds.length; i++) {
		var save = compounds[i].replace(/ /g,"_");
		document.getElementById(save+"_menu_option").onClick = "select_option('"+ compounds[i] +"', 'preloaded')";
	}
}*/

/*function refreshNowloadedCompounds(){
	log("Running 'refreshNowloadedCompounds()'...");
	var compounds = compoundList;
	
	document.getElementById("now_loaded_dropdown").innerHTML = "";
			
	for (i = 0; i < compounds.length; i++) {
		var html = document.getElementById("now_loaded_dropdown").innerHTML;
		document.getElementById("now_loaded_dropdown").innerHTML = html + "<a id="+ compounds[i].replace(/ /g,"_") +"_menu_option onclick=setManageCompound('" + compounds[i] + "') class='dropbutton'>"+ compounds[i] +"</a>"
	}
	for (i = 0; i < compounds.length; i++) {
		var save = compounds[i].replace(/ /g,"_");
		document.getElementById(save+"_menu_option").onClick = "select_option('"+ compounds[i] +"', 'now_loaded')";
	}
}*/

/*function setManageCompound(compound){
	log("Running 'setManageCompound("+compound+")'...");
	document.getElementById("manageCompound_compound").innerHTML = compound;
	document.getElementById("manageCompound").hidden = false;
	show('now_loaded');
}*/

/*function removeCompoundFromList(){
	log("Running 'removeCompoundFromList()'...");
	var compound = document.getElementById("manageCompound_compound").innerHTML;
	var newArray = [];
	for(i = 0; i < compoundList.length; i++){
		if(compoundList[i] == compound){
			//Do Nothing
		} else {
			var pos = newArray.length;
			newArray[pos] = compoundList[i];
		}
	}
	compoundList = newArray;
	document.getElementById("manageCompound").hidden = true;
	displayTable();
	applyHighlightCode();
	calculatePeaks();
	refreshPreloadedCompounds();
	
	if(compoundList.length <= 1){
		document.getElementById("now_loaded").disabled = true;
	} else {
		document.getElementById("now_loaded").disabled = false;
	}
	document.getElementById("preloaded").disabled = false;
}*/

/*function addCompoundToList(compound){
	log("Running 'addCompoundToList("+compound+")'...");
	show('preloaded');
	if(compoundList.length < M.length){
		var j = compoundList.length;
		var valid = true;
		for(i = 0; i < j; i++){
			if(compoundList[i] == compound){
				valid = false;
				break;
			}
		}
		if(valid == true){
			compoundList[j] = compound;
			refreshPreloadedCompounds();
			refreshNowloadedCompounds();
			displayTable();
			applyHighlightCode();
			calculatePeaks();
		}
	} else {
		alert("compoundList is full. Please remove a compound.");
	}
	
	if(compoundList.length >= M.length){
		document.getElementById("preloaded").disabled = true;
	} else {
		document.getElementById("preloaded").disabled = false;
	}
	document.getElementById("now_loaded").disabled = false;
}*/

function hideGradientElutionStuffs(bool){
	log("Running 'hideGradientElutionStuffs("+bool+")'...");
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
	log("Running 'resetMenus()'...");
	//Mobile Phase Composition
	select_option('Acetonitrile', 'solvent_b');
	compoundList = ["phenol", "benzonitrile", "p-chlorophenol", "acetophenone", "nitrobenzene"];
	updateCompoundsTable("ACN");
	document.getElementById("isocratic_radio").checked = true;
	document.getElementById("gradient_radio").checked = false;
	document.getElementById("solvent_fraction_slider").value = 40;
	document.getElementById("solvent_fraction_comp").value = 40;
	document.getElementById("Gradient_Time").value = 5;
	document.getElementById("Gradient_Phi_Init").value = 5;
	document.getElementById("Gradient_Phi_Final").value = 95;
	//Chromatographic Properties
	document.getElementById("temperature_slider").value = 40;
	document.getElementById("temperature_chrom").value = 40;
	document.getElementById("injection_volume_chrom").value = "5.0";
	document.getElementById("flow_rate_chrom").value = "2.0";	
	//compoundList
	displayTable();
	applyHighlightCode();
	//refreshPreloadedCompounds();
	//refreshNowloadedCompounds();
	//Apply Changes
	calculatePeaks();
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
	log("Running 'show("+id+")'...");
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
	log("Running 'enableEdit()'...");
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
	log("Running 'openMenu("+id+")'...");
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
	log("Running 'openMenu_ALL()'...");
	openMenu('manage_compound');
	openMenu('mobile_phase_comp');
	//openMenu('plot_options');
	openMenu('chromatographic_properties');
	openMenu('general_properties');
	openMenu('column_properties');
	//openMenu('languages');
	//openMenu('other');
}

function generateRandomExperiment(){ //Added by Thomas Lauer on 08/30/2017
	log("Running 'generateRandomExperiment()'...");
	var solventBFraction = Math.round(Math.random()*100);
	var temperature = Math.round(Math.random()*150);
	var injectionVolume = Number(((Math.random()*9)+1).toFixed(1));
	var flowRate = Number(((Math.random()*4.9)+0.1).toFixed(1));
	var columnLength = Number(((Math.random()*180)+20).toFixed(1));
	var columnInnerDiameter = Number(((Math.random()*4.3)+0.7).toFixed(1));
	var columnParticleSize = Number(((Math.random()*2.8)+0.2).toFixed(1));
	
	document.getElementById("isocratic_radio").checked = true;
	document.getElementById("solvent_fraction_comp").value = solventBFraction;
	document.getElementById("solvent_fraction_slider").value = solventBFraction;
	document.getElementById("temperature_chrom").value = temperature;
	document.getElementById("temperature_slider").value = temperature;
	document.getElementById("injection_volume_chrom").value = injectionVolume;
	document.getElementById("flow_rate_chrom").value = flowRate;
	select_option('Generate Random Column', 'stationary_phase');
	document.getElementById("length_column").value = columnLength;
	document.getElementById("inner_diameter_column").value = columnInnerDiameter;
	document.getElementById("particle_size_column").value = columnParticleSize;
	document.getElementById("interparticle_porosity_column").value = "0.36";
	document.getElementById("intraparticle_porosity_column").value = "0.4";
	document.getElementById("A_column").value = "1.0";
	document.getElementById("B_column").value = "5.0";
	document.getElementById("C_column").value = "0.05";
	
	calculatePeaks();
}

function setDesc(obj, msg){
	/*
	log("Running 'setDesc("+obj+", "+msg+")'...");
	if(typeof obj == "string" && typeof msg == "string"){
		if(obj == "" && msg == ""){
			document.getElementById("Description").innerHTML = "Descriptions: <div>Mouse over an element to view a description of it!</div>";
		} else if(msg == "") {
			document.getElementById("Description").innerHTML = obj + ": <div>Description Pending...</div>";
		} else {
			document.getElementById("Description").innerHTML = obj + ": <div>" + msg + "</div>";
		}
	} else {
		//Do Nothing. Typeof did not return "string" for both variables;
	}
	*/
}

function toggleColumnProperties(input){ //Added by Thomas Lauer on 08/30/2017
	//log("Running 'toggleColumnProperties("+input+")'...");
	//Check if the value of 'input' is a string.
	if(typeof input == "string"){
		
		select_option('Acetonitrile', 'solvent_b');
		
		if(input == "Agilent SB-C18"){
			calcGradientACN = calcGradientACN_Agilent_SBC18;
			calcGradientMeOH = calcGradientMeOH_Agilent_SBC18;
			document.getElementById("temperature_slider").disabled = false;
			document.getElementById("temperature_chrom").disabled = false;
			document.getElementById("temperature_disabled_text").hidden = true;
			//document.getElementById("temperature_input_rowOne").hidden = false;
			//document.getElementById("temperature_input_rowTwo").hidden = false;
		} else if(input == "Agilent SB-C8") {
			calcGradientACN = calcGradientACN_Agilent_SBC8;
			calcGradientMeOH = calcGradientMeOH_Agilent_SBC8;
			document.getElementById("temperature_slider").disabled = true;
			document.getElementById("temperature_chrom").disabled = true;
			document.getElementById("temperature_slider").value = 40;
			document.getElementById("temperature_chrom").value = 40;
			document.getElementById("temperature_disabled_text").hidden = false;
			//document.getElementById("temperature_input_rowOne").hidden = true;
			//document.getElementById("temperature_input_rowTwo").hidden = true;
		}
		updateCompoundsTable("ACN");
		//Finally, run the function 'calculatePeaks()' to update the graph.
		calculatePeaks();
	} else {
		//Do Nothing. typeof != 'string'.
	}
}

function select_option(selected, menu) {
	log("Running 'select_option("+selected+", "+menu+")'...");
	document.getElementById(menu + "_text").innerHTML = selected;
}

function loadSlider(id) {
	log("Running 'loadSlider("+id+")'...");
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

var renderGraph_percB_data = [];

function renderGraph(data) {
	log("Running 'renderGraph(data)'...");
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
	
	createDataExportFile_Full(new_data[0]);
	
	if (document.getElementById("dataTable").className != ""){
		new_data[1] = data[document.getElementById("dataTable").className];
		createDataExportFile_Selected(new_data[1], compoundList[document.getElementById("dataTable").className]);
	} else {
		exportFileData_Selected = "";
		exportFileData_SelectedCompound = "";
	}

	x.domain(d3.extent(new_data[0], function(d) { return d.t; }));
	y.domain(d3.extent(new_data[0], function(d) { return d.Ct; }));
	
	var yLimMax = d3.extent(new_data[0], function(d) { return d.Ct; })[1];
	
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

	if(renderGraph_percB_data.length > 1){
		
		var yRight = d3.scaleLinear()
			.rangeRound([height, 0]); //create a variable 'y' to set the scale’s range to the specified two-element array of numbers while also enabling rounding. equivalent to: .range(range).round(true);
		
		yRight.domain([0,1]);
		
		g.append("g")
			.call(d3.axisRight(yRight))
			.append("text")
			.attr("fill", "#000")
			.attr("transform", "rotate(-90)")
			.attr("y", 6)
			.attr("dy", "3.5em")
			.attr("text-anchor", "end")
			.text("%B");
		
		var line = d3.line()
			.curve(d3.curveBasis)
			.x(function(d) { return x(d.t); })
			.y(function(d) { return y(d.Ct * yLimMax); });
	
		g.append("path")
		    .datum(renderGraph_percB_data)
		    .attr("fill", "none")
		    //.attr("id", i)
		    //.attr("stroke", (i == 0 ? "red" : "red"))
			.attr("stroke", "#980000")
		    .attr("stroke-linejoin", "round")
		    .attr("stroke-linecap", "round")
		    .attr("stroke-width", 0.8)
		    .attr("d", line);
	}

	for (var i = 0; i < new_data.length; i++) {
		var line = d3.line()
			.curve(d3.curveBasis)
		    .x(function(d) { return x(d.t); })
		    .y(function(d) { return y(d.Ct); });

		g.append("path")
		    .datum(new_data[i])
		    .attr("fill", "none")
		    .attr("id", i)
		    .attr("stroke", (i == 0 ? "steelblue" : "orange"))
		    .attr("stroke-linejoin", "round")
		    .attr("stroke-linecap", "round")
		    //.attr("stroke-width", 1.5)
			.attr("stroke-width", 2)
		    .attr("d", line);
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
	log("Running 'maximum_t(data)'...");
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
	log("Running 'aggregateSignal(data)'...");
	base_data = data[0];
	max_t = maximum_t(data);

	step = .01;
	aggregate_signal = [];

	for (j = 0; j < max_t ; j += step) {
		index = Math.round(j/step);
		x_targ = j;
		signal = 0;
		for (k = 0; k < data.length; k++){
			y_targ = localInterpolation(data[k], x_targ);
			signal += y_targ;
		}
		aggregate_signal[index] = {
					"t" : j,
					"Ct" : signal,
					"c" : "steelblue"
		}
	}
	return aggregate_signal;
}

function printList(list){
	log("Running 'printList("+list+")'...");
	for (i = 0; i < list.length; i++){
		document.write(i + "- " + list[i].t + ": " +list[i].Ct + "\n");
	}
}

//Check whether the specified values are blank OR zero
//If they are, return a 'default' value for the variable
//If they are not, return the original value
function checkIfValid(variable, value) {
	log("Running 'checkIfValid("+variable+", "+value+")'...");
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
	log("Running 'checkIfValid_blank("+variable+", "+value+")'...");
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
/*
//porosity
function interparticlePorosity(Ve, V) {
	//Ve = volume of eluent between particles
	//V = volume of empty column
	var Ee = Ve/V;
	return Ee;
}

function intraparticlePorosity(Vp, Vl) {
	//Vl = eluent acessible volume w/ in particles
	//Vp = total volume of stationary phase particles
	var El = Vl/Vp;
	return El;
}
*/

//Reduced plate height

function theoreticalPlates(h, dP, L) {
	log("Running 'theoreticalPlates("+h+", "+dP+", "+L+")'...");
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
	log("Running 'isocraticRetentionFactor("+T+", "+A+", "+B+", "+a+", "+b+", "+phi+")'...");
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
	log("Running 'retentionTime("+t0+", "+k+")'...");
	//t0 = void time
	//k = isocratic retention factor
	var tR = t0/(1+k);
	return tR;
}

//isocratic peak width
function isocraticPeakWidth(tR, N, Vinj, F, tau) {
	log("Running 'isocraticPeakWidth("+tR+", "+N+", "+Vinj+", "+F+", "+tau+")'...");
	//tR = retention time of each compound
	//N = theoretical plate number
	//Vinj = injection volume
	//F = volumetric flow rate
	//tau = detector line constant
	var omegaT = Math.pow(Math.pow(tR/Math.pow(N, 1/2), 2) + Math.pow(tau, 2) + 1/12*Math.pow(Vinj/F, 2), 1/2);
	return omegaT;
}

function tubingVolume(length, diameter) {
	log("Running 'tubingVolume("+length+", "+diameter+")'...");
    var volume = (length / 100) * (Math.PI * Math.pow((diameter * 0.0000254) / 2, 2) * 1000000000);
    return volume;
}

/*function isocraticRetentionFactor(compoundName, solvent) {
	log("Running 'isocraticRetentionFactor("+compoundName+", "+solvent+")'...");
	if (solvent == "Methanol") {
		return (calcKMeOH[compoundName]);
	} else {
		return (calcKACN[compoundName]);
	}	
}*/

/*function solventSensitivityFactor(compoundName, solvent) {
	log("Running 'solventSensitivityFactor("+compoundName+", "+solvent+")'...");
	if (solvent == "Methanol") {
		return (calcSMeOH[compoundName]);
	} else {
		return (calcSACN[compoundName]);
	}
}*/

/*function getMolarVolume(compound) {
	log("Running 'getMolarVolume("+compound+")'...");
	var MolarVolumeArray = {
		"N-benzylformamide" : 156.1,
		"benzylalcohol" : 125.6,
		"phenol" : 103.4,
		"3-phenylpropanol" : 170,
		"acetophenone" : 140.4,
		"benzonitrile" : 122.7,
		"p-chlorophenol" : 124.3,
		"nitrobenzene" : 122.7,
		"methylbenzoate" : 151.2,
		"anisole" : 128.1,
		"benzene" : 96,
		"p-nitrotoluene" : 144.9,
		"p-nitrobenzylchloride" : 165.8,
		"toluene" : 118.2,
		"benzophenone" : 206.8,
		"bromobenzene" : 119.3,
		"naphthalene" : 147.6,
		"ethylbenzene" : 140.4,
		"p-xylene" : 140.4,
		"p-dichlorobenzene" : 137.8,
		"propylbenzene" : 162.6,
		"n-butylbenzene" : 184.8
	};	
	return MolarVolumeArray[compound];
}*/

/*function calctR(t0, T, phi, compoundName, solvent) {
	log("Running 'calctR("+t0+", "+T+", "+phi+", "+compoundName+", "+solvent+")'...");
	var Tconst = isocraticRetentionFactor(compoundName, solvent);
	var Sconst = solventSensitivityFactor(compoundName, solvent);
	var S = -1*(Sconst[0] + Sconst[1]*T);
	var logkw = Tconst[0] + Tconst[1]*T;
	var k = Math.pow(10, (logkw - S*phi));
	//check with Dwight, should be division?
	return t0*(1+k);
}*/

function calcKprime(t0, T, phi, compoundName, solvent){
	log("Running 'calcKprime(t0 = "+t0+", T = "+T+", phi = "+phi+", compound = "+compoundName+", solvent = "+solvent+")'...");
	if (solvent == "Methanol") {
		var lnkwint = calcGradientMeOH[compoundName][0];
		var lnkwslope = calcGradientMeOH[compoundName][1];
		var Sint = calcGradientMeOH[compoundName][2];
		var Sslope = calcGradientMeOH[compoundName][3];
	} else {
		var lnkwint = calcGradientACN[compoundName][0];
		var lnkwslope = calcGradientACN[compoundName][1];
		var Sint = calcGradientACN[compoundName][2];
		var Sslope = calcGradientACN[compoundName][3];
	}
	
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
	
	return arr;
}


function isocraticSigma (tR, N, tau, Vinj, F, UsT) {
	log("Running 'isocraticSigma ("+tR+", "+N+", "+tau+", "+Vinj+", "+F+", "+UsT+")'...");
	var t1 = Math.pow((tR*60 / Math.pow(N, 1/2)), 2);
	var t2 = Math.pow(tau, 2);
		var t3 = (1/12)*Math.pow((Vinj/1000) / (F/60), 2);
	return Math.pow(t1 + t2 + t3 + UsT, 1/2);
}

function tubingTimeBroadening(volume, diameter, length, flowRate, diffusionCoefficient) {
	log("Running 'tubingTimeBroadening("+volume+", "+diameter+", "+length+", "+flowRate+", "+diffusionCoefficient+")'...");
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
 
			var k = calcKprime(t0, T, phi, compoundName[i], solvent)[2];
			var tR = (t0/60)*(1+k);
			
			var UsT = tubingTimeBroadening(v, d, l, tR, De);
			
			var sigma = isocraticSigma(tR, N, tau, Vinj, F, UsT);

			var W = parseFloat(((Vinj/1000000)*(M[i])).toFixed(15));
			//W *= 1000000; 
			var t = 0;
			var j = 0;
			var check = true;
			var check2 = true;
			var loops = 0;
			var infinite_loop_breaker = false;
			var tF = 0;

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

			var W = parseFloat(((Vinj/1000000)*(M[i])).toFixed(15));
			//W *= 1000000; 
			var t = 0; //(parseFloat(document.getElementById("initial_time_general").value))/60;
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
	updateTable(tableArray);
	calcResolution(phi,T,resolution_maxTime,tableArray);
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
	log("Running 'gradient_calck("+kw+", "+S+", "+phi+")'...");
	var lnk = Math.log(kw)-(S * phi);
	var k = Math.exp(lnk);
	return k;
}

function gradient_calcPhiAtTime(phi_i, phi_f, tG, t){
	log("Running 'gradient_calcPhiAtTime("+phi_i+", "+phi_f+", "+tG+", "+t+")'...");
	var slope = (phi_f - phi_i)/(tG);
	var phi_t = (slope*t)+phi_i;
	return phi_t;
}

function gradientElutionMode(solvent, T, phi_i, phi_f, tD, F, d, L, Et, tG, t0, N, tau, Vinj, V0){
	log("Running 'gradientElutionMode("+solvent+", "+T+", "+phi_i+", "+phi_f+", "+tD+", "+F+", "+d+", "+L+", "+Et+", "+tG+", "+t0+", "+N+", "+tau+", "+Vinj+", "+V0+")'...");
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
	var step = parseFloat(((60)/parseFloat(document.getElementById("plot_points_general").value)).toFixed(3));
	
	var tF_max = 0;
	
	for(i = 0; i < compoundList.length; i++){
		var cmpdData = [];
		var UsT = 0;
		var W = parseFloat(((Vinj/1000000)*(M[i])).toFixed(15));
		var cache = "";
		var compoundName = compoundList[i];
		
		var compound = compoundList[i];
		
		cache += "compound = " + compound + "\n";
		
		if(solvent == "Methanol"){
			var lnkw = (calcGradientMeOH[compound][1]*tKelvin)+calcGradientMeOH[compound][0];
			var S = (calcGradientMeOH[compound][3]*tKelvin)+calcGradientMeOH[compound][2];
			cache += "lnkw = ("+calcGradientMeOH[compound][1]+"*"+tKelvin+")+"+calcGradientMeOH[compound][0]+" = " + lnkw + "\n";
			cache += "S = ("+calcGradientMeOH[compound][3]+"*"+tKelvin+")+"+calcGradientMeOH[compound][2]+" = "+S + "\n";
		} else {
			var lnkw = (calcGradientACN[compound][1]*tKelvin)+calcGradientACN[compound][0];
			var S = (calcGradientACN[compound][3]*tKelvin)+calcGradientACN[compound][2];
			cache += "lnkw = ("+calcGradientACN[compound][1]+"*"+tKelvin+")+"+calcGradientACN[compound][0]+" = " + lnkw + "\n";
			cache += "S = ("+calcGradientACN[compound][3]+"*"+tKelvin+")+"+calcGradientACN[compound][2]+" = "+S + "\n";
		}
		
		var lnk0 = lnkw - (S*(phi_i));
		cache += "lnk0 = " + lnk0 + "\n";
		var k0 = Math.exp(lnk0);
		cache += "k0 = " + k0 + "\n";
    
		var b = (S*(phi_f-phi_i)*V0)/(F*tG);
		cache += "b = " + b + "\n";
    
		var step1 = k0-(tD/t0);
		var step2 = b * step1 + 1;
		var step3 = (t0/b)*Math.log(step2);
		var tR = t0 + tD + step3;
		cache += "tR = " + tR + "\n";
		
		var kw = Math.exp(lnkw);
		//var phi_e = (1/S)*Math.log((S*(deltaPhi/tG)*kw*t0*(k0-tD/t0)+1)/k0);
		
		if((tR-tD-t0) < 0 || (tR-tD-t0) > tG){
			var phi_e = phi_i;
		} else {
			var phi_e = gradientSlope*(tR-tD-t0)+phi_i;
		}
		
		
		
		//console.log("tR: "+tR);
		//console.log("phi_e: "+phi_e);
		//console.log("NEW_phi_e: "+NEW_phi_e);
		//console.log("--------------------");
		
		//var phi_e = (((phi_f-phi_i)/tG)*tR)+phi_i;
		cache += "phi_e = " + phi_e + "\n";
		
		var lnke = lnkw - (S*(phi_e));
		cache += "lnke = lnkw - ("+S+"*("+phi_e+")) = " + lnke + "\n";
		var ke = Math.exp(lnke);
		cache += "ke = Math.exp("+lnke+") = " + ke + "\n";
		
		var sigma = Math.sqrt(Math.pow((t0*60)*((1+ke)/(Math.sqrt(N))), 2)+Math.pow(tau, 2));
		cache += "sigma = Math.sqrt(Math.pow(("+t0+"*60)*((1+"+ke+")/(Math.sqrt("+N+"))), 2)+Math.pow("+tau+", 2)) = "+sigma;
		
		//console.log(cache);
		
		var t = 0;
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
		
		//var thisIsATest_peakValue = 0;
		//var thisIsATest_peakTime = 0;
		
		var tF_max_failsafe = 1;
		
		while (t <= tF) {
			var Ct = 1000000*(W/1000000)/(Math.pow((2*Math.PI), 0.5)*(sigma/60)*(F/(60*1000)))*Math.exp(-Math.pow((t-tR),2)/(2*Math.pow((sigma/60), 2)));
			if (loops > 10000000) {
				alert("infinite loop");
				//tF_max_failsafe = 0;
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
			
			//if(Ct > thisIsATest_peakValue){
			//	thisIsATest_peakValue = Ct;
			//	thisIsATest_peakTime = t;
			//}

			table[i][j+1]=Ct;
			t += step;
			j++;
			loops++;
		}
		
		if(tF > tF_max){
			tF_max = tF;
		}
		//console.log("peakValue:\n"+thisIsATest_peakValue);
		//console.log("peakTime:\n"+thisIsATest_peakTime);
		
		graphData[i] = cmpdData;
	}
	
	console.log(tF_max);
	
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
	
	console.log("tF_max = "+tF_max);
	
	//console.log(percentB);
	
	tableArray = tableArray.sort(compareSecondColumn);
	updateTable(tableArray);
	
	renderGraph_percB_data = percentB;
	
	return graphData;
}

function testTable(data){
	log("Running 'testTable("+data+")'...");
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
	log("Running 'print("+string+")'...");
	document.write(" " + string + "<p></p>");
}

function updateTable(tabularData){
	log("Running 'updateTable("+tabularData+")'...");
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
	log("Running 'displayTable("+tabularData+")'...");
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
	
	//Find Elution Mode
	var mode;
	if (document.getElementById("isocratic_radio").checked) {
		mode = "isocratic";
		hideGradientElutionStuffs("true");
		document.getElementById("headerTable_k").innerHTML = "k&#39;";
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
	
//============================================================================================================================================
	//Collect inputs from the user interface
	
	var solvent = document.getElementById("solvent_b_text").innerHTML; //Organic Modifier
	
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
		if(solvent == "Acetonitrile"){
			var n = Math.exp(phi*(-3.476+( 726/(T+273.15)))+(1-phi)*(-5.414+(1566/(T+273.15)))+phi*(1-phi)*(-1.762+( 929/(T+273.15)))); //viscosity - acetonitrile
		} else if(solvent == "Methanol"){
			var n = Math.exp(phi*(-4.597+(1211/(T+273.15)))+(1-phi)*(-5.961+(1736/(T+273.15)))+phi*(1-phi)*(-6.215+(2809/(T+273.15)))); //viscosity - methanol
		}
	} else if(mode == "gradient"){
		var n = 0;
		var phi_Tmp_count = 0;
		//console.log("phi_i = " + phi_i);
		//console.log("phi_f = " + phi_f);
		for(phi_Tmp = phi_i/100; phi_Tmp <= phi_f/100; phi_Tmp+=0.01){
			if(solvent == "Acetonitrile"){
				n += Math.exp(phi_Tmp*(-3.476+( 726/(T+273.15)))+(1-phi_Tmp)*(-5.414+(1566/(T+273.15)))+phi_Tmp*(1-phi_Tmp)*(-1.762+( 929/(T+273.15)))); //viscosity - acetonitrile
			} else if(solvent == "Methanol"){
				n += Math.exp(phi_Tmp*(-4.597+(1211/(T+273.15)))+(1-phi_Tmp)*(-5.961+(1736/(T+273.15)))+phi_Tmp*(1-phi_Tmp)*(-6.215+(2809/(T+273.15)))); //viscosity - methanol
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
		renderGraph_percB_data = [];
		data = isocraticElutionMode(t0, T, phi, N, tau, Vinj, fR, solvent, compoundList, v, d, l, De);
	} else {
		data = gradientElutionMode(solvent, T, phi_i, phi_f, tD, fR, d, L, Et, tG, t0, N, tau, Vinj, V0);
	}
	
//============================================================================================================================================
	//Render the graph and run final user interface updates
	renderGraph(data);
	
	document.getElementById('GenRandExpBtn').disabled = false;
	
	//refreshPreloadedCompounds();
	//refreshNowloadedCompounds();
	
	if(compoundList.length == Object.keys(calcGradientACN).length){
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
} 

var calcGradientACN = {};
var calcGradientMeOH = {};

function load() {
	
	calcGradientACN = calcGradientACN_Agilent_SBC18;
	calcGradientMeOH = calcGradientMeOH_Agilent_SBC18;
	
	log("Running 'load()'...");
	var sliders = document.getElementsByClassName("slider_ticks");
	var i;
	for (i = 0; i < sliders.length; i++) {
		loadSlider(sliders[i].id);
	}
	var raw_compounds = Object.keys(calcGradientACN);
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



