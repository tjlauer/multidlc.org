function updateCompoundsList(compound){
	var elementID = "compoundsTable_"+compound;
	console.log(elementID);
	if(document.getElementById(elementID).checked == true){
		console.log("checked = true");
		compoundList[compoundList.length] = compound;
	} else {
		console.log("checked = false");
		compoundListNew = [];
		for(indx = 0; indx < compoundList.length; indx++){ if(compoundList[indx] != compound){ compoundListNew[compoundListNew.length] = compoundList[indx]; } }
		compoundList = compoundListNew;
	}
	if(document.getElementById("solvent_b_text").innerHTML == "Methanol"){
		updateCompoundsTable("MeOH");
	} else if(document.getElementById("solvent_b_text").innerHTML == "Acetonitrile"){
		updateCompoundsTable("ACN");
	}
	displayTable();
	applyHighlightCode();
	calculatePeaks();
}

function updateCompoundsTable_toggleHidden(compoundFamily){
	var state = document.getElementById("all_compounds_table_"+compoundFamily).hidden;
	
	if(state == true){
		document.getElementById("all_compounds_table_"+compoundFamily).hidden = false;
		compoundFamilies[compoundFamily][1] = false;
	} else if(state == false) {
		document.getElementById("all_compounds_table_"+compoundFamily).hidden = true;
		compoundFamilies[compoundFamily][1] = true;
	}
	
}

function updateCompoundsTable(mobilePhase){
	//document.getElementById("all_compounds_table")
	
	var compoundFamilyNames = Object.keys(compoundFamilies);
	
	var borderCSS = "border-bottom: 1px solid #bbb;"
	
	var HTMLCache = '';
	
	for(compoundFamily in compoundFamilies){
		var compounds = compoundFamilies[compoundFamily][0];
		
		if(compounds.length == 0){
			continue;
		}
		
		HTMLCache += '<table style="width:100%;">';
		HTMLCache += '<tr onclick="updateCompoundsTable_toggleHidden('+"'"+compoundFamily+"'"+');"><th colspan="2">'+compoundFamily+'</th></tr>';
		HTMLCache += '</table>';
		
		if(compoundFamilies[compoundFamily][1] == true){
			HTMLCache += '<table id="all_compounds_table_'+compoundFamily+'" style="width:100%;" hidden>';
		} else {
			HTMLCache += '<table id="all_compounds_table_'+compoundFamily+'" style="width:100%;">';
		}
		
		for(indx in compounds){
			var compound = compounds[indx];
		
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
			HTMLCache += '</tr>';
		}
		
		//HTMLCache += '<br><br>';
		
		HTMLCache += '</table>';
		
	}
	
	HTMLCache += '<br>';
	
	//document.getElementById("all_compounds_table").style = "width:100%;";
	
	document.getElementById("all_compounds_table").innerHTML = HTMLCache;
}