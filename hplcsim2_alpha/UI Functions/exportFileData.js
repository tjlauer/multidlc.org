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