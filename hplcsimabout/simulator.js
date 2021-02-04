//Old Array[5, 25, 40, 15, 10, 5]
//var M = [5,6.09,7.36,8.79,10.4,12.18,14.13,16.23,18.46,20.79,23.18,25.59,27.98,30.28,32.45,34.44,36.19,37.65,38.78,39.56,39.95,39.95,39.56,38.78,37.65,36.19,34.44,32.45,30.28,27.98,25.59,23.18,20.79,
//	     18.46,16.23,14.13,12.18,10.4,8.79,7.36,6.09,5];
//var M = [40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40];

var M = [1.15,33.50,3.33,39.69,36.91,39.62,25.09,39.57,38.55,38.98,30.16,2.66,1.76,4.77,35.56,2.98,31.02,8.43,39.02,6.72,39.78,19.60,39.19,12.06,28.60,4.29,11.40,29.86,1.06,3.21,36.55,37.02,38.24,
	38.89,39.36,2.77,38.17,1.29,39.72,1.97,15.29,21.99,16.05,39.74,15.67,1.90,35.86,39.25,34.13,33.72,5.48,39.63,9.84,27.94,34.70,38.94,36.67,32.82,3.99,0.95,2.29,39.12,26.55,37.23,38.71,1.45,8.70,
	38.80,18.40,39.65,2.13,38.76,32.58,13.10,2.47,4.60,39.09,39.22,14.54,28.27,36.79,37.87,10.76,35.71,18.80,39.73,37.43,36.15,39.55,2.87,1.40,9.55,5.11,24.33,6.95,0.88,4.94,13.45,2.57,23.17,39.45,
	39.43,31.83,0.84,1.63,1.51,27.60,35.40,21.20,37.62,20.80,34.33,11.08,3.58,22.39,2.05,28.92,24.71,32.34,39.71,27.25,38.49,17.61,12.75,39.31,39.81,30.74,3.45,33.93,2.38,1.24,37.13,3.71,26.19,39.60,
	29.24,31.30,36.29,39.70,6.07,33.28,12.40,7.18,2.21,39.39,10.14,0.81,13.81,39.80,0.91,38.31,39.47,39.53,14.91,1.57,3.85,8.17,4.14,35.06,39.67,39.66,36.42,37.79,26.90,37.95,1.69,6.28,5.67,17.22,
	33.05,39.33,35.23,34.89,10.45,1.34,34.52,21.60,20.40,39.59,39.16,9.26,39.76,23.95,23.56,37.34,8.98,19.20,16.44,39.79,38.10,4.44,1.02,7.66,36.01,11.73,30.45,37.53,38.43,31.57,5.30,14.17,20.00,38.85,
	0.78,1.20,7.91,22.78,38.37,37.71,3.09,6.50,39.05,39.75,7.42,5.87,1.83,16.83,38.03,39.51,25.46,0.75,29.55,25.83,39.50,39.28,39.41,18.01,38.60,39.77,0.98,1.11,38.66,0.72,32.09];

var compoundList = [
	"acetophenone",
	"naphthalene",
	"phenol",
	"p-chlorophenol",
	"benzonitrile"
]

var calcGradientACN = {
	//"Compound Name": [ln kw intercept, ln kw slope, S intercept, S slope],
	"N-benzylformamide": [4.11763684964633, -0.00859108668819096, 5.72460154055311, -0.004518391449322835],
	"benzylalcohol": [4.295870151731668, -0.00838504826707623, 5.11516782884082, -0.0035429892224701012],
	"phenol": [7.250245913957449, -0.01623644076804236, 8.080764119773358, -0.011393740748934839],
	"3-phenylpropanol": [6.979319890216979, -0.011916768623047113, 8.913709246999934, -0.00977469046200866],
	"p-chlorophenol": [10.853767117959531, -0.022819863346957618, 12.933042037683173, -0.021129750042128245],
	"acetophenone": [7.5643514498972575, -0.014076608120989617, 8.205918005466286, -0.0096488009139789],
	"benzonitrile": [9.157574281447951, -0.018693495104451376, 9.933437736260569, -0.014607943615296394],
	"nitrobenzene": [10.709052818652065, -0.021722028876511597, 11.913552746640644, -0.019092652251069955],
	"methylbenzoate": [9.736348393086557, -0.017804279807352354, 10.511061065621254, -0.013937724488517097],
	"anisole": [10.619453288436164, -0.02027269140388422, 11.524487520896395, -0.017394070021991195],
	"benzene": [10.44880732516308, -0.019639538882926806, 10.982731964464346, -0.016380707763880318],
	"p-nitrotoluene": [12.640177028747386, -0.024650000794250664, 14.110519191618183, -0.0227133244127602],
	"p-nitrobenzylchloride": [14.606820002699553, -0.029833906766707965, 17.071583915484293, -0.029903671253214692],
	"toluene": [12.620918352164775, -0.023122296489957304, 13.477923070957644, -0.020736302933891882],
	"benzophenone": [14.072155096078763, -0.025488280205364526, 15.875496292470416, -0.023860401325815152],
	"bromobenzene": [13.8638573956341, -0.02595715959089104, 15.087285684478196, -0.024450098570551106],
	"naphthalene": [15.63919469704874, -0.029463036485079655, 17.392590529166682, -0.029003464987497615],
	"ethylbenzene": [15.020728922213326, -0.027352050407686294, 16.45404067792924, -0.026482537881368524],
	"p-xylene": [14.62975194741648, -0.02609635317889557, 15.43623038724321, -0.023540985427180604],
	"p-dichlorobenzene": [15.561553538993556, -0.028722422384016594, 16.846328292929112, -0.027388726937070666],
	"propylbenzene": [16.948939478253603, -0.029923292573128975, 18.036356827939073, -0.027912591078851634],
	"n-butylbenzene": [18.161616836431968, -0.030503467927069025, 18.38213053057011, -0.025855676201241597],
	"diethylformamide": [4.02358028702793, -0.00593748531320223, 11.4679326302866, -0.0123072072560952],
	"methylparaben": [11.4111369378345, -0.0228188521038433, 22.526811115202, -0.0366649524457222],
	"ethylparaben": [11.1898101697198, -0.0216321215335735, 17.0359605776335, -0.0269714258248205],
	"propylparaben": [11.0596971062141, -0.020133642293226, 14.1858776754127, -0.0200270391872307],
	"butylparaben": [12.1341303147334, -0.0211029280202196, 14.026391259171, -0.018467385725791],
	"acetanilide": [6.99233786611718, -0.0139326286293655, 10.9138048720276, -0.014891861475092],
	"propiophenone": [9.65102894789204, -0.015987532340238,  10.7187934245166, -0.012507833154392],
	"butyrophenone": [12.0552481653964, -0.0199003704613709, 14.7871477768746, -0.0201212808687109],
	"valerophenone": [11.2311772882595, -0.0170491283515628, 10.7488618780099, -0.0107369614592026],
	"hexanophenone": [13.0781795720922, -0.0197554842203633, 12.3839302756758, -0.0130680713075359],
	"heptanophenone": [12.9705190560471, -0.0182211003263966, 10.8623066945769, -0.00850288263012924],
	"octanophenone": [14.3891847086718, -0.0199033409824707, 11.7236631163352, -0.00894938100296847],
	"ibuprofen": [5.59239458233024, -0.00434643221635735, -6.93530425991638, 0.0489485565782194],
	"Loratidine": [6.568915, -0.000766666666666656, 3.09189, 0.0260666666666667],
	"Impurity-A": [10.522385, -0.0145666666666666, -3.91414000000002, 0.0889333333333334],
	"Impurity-B": [9.638725, -0.0115, 1.263735, 0.0697666666666667],
	"Impurity-C": [6.31166, -0.00306666666666665, 9.61285, 0.00766666666666668],
	"Impurity-D": [9.67080999999999, -0.0107333333333333, 5.15878499999999, 0.0161],
	"Impurity-E": [11.10164, -0.0122666666666667, 8.09002, 0.00919999999999999],
	"Impurity-F": [11.8243, -0.0153333333333333, -2.24583500000001, 0.0375666666666667],
	"Impurity-G": [10.72881, -0.0107333333333333, 0.538314999999997, 0.0299],
}

var calcGradientMeOH = {
	//"Compound Name": [ln k intercept, ln k slope, S intercept, S slope],
	"N-benzylformamide": [9.164256973698459, -0.02056138653509061, 11.017552429310824, -0.017627024734002957],
	"benzylalcohol": [9.368291799905602, -0.02044397690961204, 10.719335353513642, -0.017293059939322706],
	"phenol": [10.528635454669072, -0.024096647274333242, 11.830889215104005, -0.020815067582978557],
	"3-phenylpropanol": [13.990046610542905, -0.028603819813134486, 14.869796455088817, -0.024560711558855575],
	"p-chlorophenol": [15.861739909834881, -0.03486502200878007, 16.61089215982821, -0.030667729059069244],
	"acetophenone": [10.653179001828002, -0.02131414397680926, 12.326072909876794, -0.019996315953535758],
	"benzonitrile": [10.51274763619913, -0.02166400338685396, 12.538014443255712, -0.02085416530130655],
	"nitrobenzene": [12.077706680960972, -0.025014753882566368, 12.825033442420875, -0.021807386141678032],
	"methylbenzoate": [13.820020039954208, -0.02737258643594428, 14.762757063401498, -0.02472742162094264],
	"anisole": [13.103233159526095, -0.026162704070098193, 13.235300319411905, -0.022293188047843478],
	"benzene": [12.79279454930435, -0.025133621563273766, 12.89520867762737, -0.02189002373674944],
	"p-nitrotoluene": [14.783529711252328, -0.029673985457580394, 15.031584762786096, -0.025339654409184665],
	"p-nitrobenzylchloride": [16.364970805591096, -0.03408790047687219, 17.116251860081324, -0.03061188374616741],
	"toluene": [15.67880353961861, -0.030163537531225547, 15.060060720664186, -0.025233838160978087],
	"benzophenone": [18.601522937006184, -0.03594300992712139, 19.634722807368355, -0.03334126588775872],
	"bromobenzene": [17.712516295303878, -0.03500806434412767, 17.70340522317306, -0.031615757661614736],
	"naphthalene": [20.307889560692914, -0.04065942707536027, 20.02083287112345, -0.03650363138267144],
	"ethylbenzene": [19.094169428831844, -0.03690048224162992, 18.509629573953802, -0.03225261521523469],
	"p-xylene": [18.601129054735626, -0.03523252467484119, 17.15440900790893, -0.028311194595588108],
	"p-dichlorobenzene": [19.827805654558052, -0.03851035621541407, 19.46621766710542, -0.0343040373662159],
	"propylbenzene": [21.667241339921787, -0.04077994058619559, 20.28349365146609, -0.03399212706819865],
	"n-butylbenzene": [24.29235971858094, -0.0451391923516342, 22.217297337226874, -0.03671425777979378],
	"diethylformamide": [4.02358028702793, -0.00593748531320223, 11.4679326302866, -0.0123072072560952],
	"methylparaben": [11.4111369378345, -0.0228188521038433, 22.526811115202, -0.0366649524457222],
	"ethylparaben": [11.1898101697198, -0.0216321215335735, 17.0359605776335, -0.0269714258248205],
	"propylparaben": [11.0596971062141, -0.020133642293226, 14.1858776754127, -0.0200270391872307],
	"butylparaben": [12.1341303147334, -0.0211029280202196, 14.026391259171, -0.018467385725791],
	"acetanilide": [6.99233786611718, -0.0139326286293655, 10.9138048720276, -0.014891861475092],
	"propiophenone": [9.65102894789204, -0.015987532340238,  10.7187934245166, -0.012507833154392],
	"butyrophenone": [12.0552481653964, -0.0199003704613709, 14.7871477768746, -0.0201212808687109],
	"valerophenone": [11.2311772882595, -0.0170491283515628, 10.7488618780099, -0.0107369614592026],
	"hexanophenone": [13.0781795720922, -0.0197554842203633, 12.3839302756758, -0.0130680713075359],
	"heptanophenone": [12.9705190560471, -0.0182211003263966, 10.8623066945769, -0.00850288263012924],
	"octanophenone": [14.3891847086718, -0.0199033409824707, 11.7236631163352, -0.00894938100296847],
	"ibuprofen": [5.59239458233024, -0.00434643221635735, -6.93530425991638, 0.0489485565782194],
	"Loratidine": [6.568915, -0.000766666666666656, 3.09189, 0.0260666666666667],
	"Impurity-A": [10.522385, -0.0145666666666666, -3.91414000000002, 0.0889333333333334],
	"Impurity-B": [9.638725, -0.0115, 1.263735, 0.0697666666666667],
	"Impurity-C": [6.31166, -0.00306666666666665, 9.61285, 0.00766666666666668],
	"Impurity-D": [9.67080999999999, -0.0107333333333333, 5.15878499999999, 0.0161],
	"Impurity-E": [11.10164, -0.0122666666666667, 8.09002, 0.00919999999999999],
	"Impurity-F": [11.8243, -0.0153333333333333, -2.24583500000001, 0.0375666666666667],
	"Impurity-G": [10.72881, -0.0107333333333333, 0.538314999999997, 0.0299],
}

var calcKACN = {
	"N-benzylformamide" : [0.769127502, -0.003731062],
	"benzylalcohol" : [0.870975072,	-0.00364158],
	"phenol" : [1.222652803, -0.007051397],
	"3-phenylpropanol" : [1.617423196, -0.005175387],
	"p-chlorophenol" : [2.006666967, -0.009910541],
	"acetophenone" : [1.615282733, -0.006113393],
	"benzonitrile" : [1.759520682, -0.008118482],
	"nitrobenzene" : [2.074051745, -0.009433757],
	"methylbenzoate" : [2.116364506, -0.0077323],
	"anisole" : [2.2070705, -0.008804318],
	"benzene" : [2.208069224, -0.008529343],
	"p-nitrotoluene" : [2.565390235, -0.010705359],
	"p-nitrobenzylchloride" : [2.804538425, -0.012956701],
	"toluene" : [2.738254098, -0.010041886],
	"benzophenone" : [3.087847385, -0.011069419],
	"bromobenzene" : [2.941762836, -0.011273051],
	"naphthalene" : [3.296888486, -0.012795634],
	"ethylbenzene" : [3.278713293, -0.011878845],
	"p-xylene" : [3.257874421, -0.011333502],
	"p-dichlorobenzene" : [3.351026587, -0.01247399],
	"propylbenzene" : [3.811104371, -0.012995521],
	"n-butylbenzene" : [4.268938682, -0.013247488],
}

var calcKMeOH = {
	"N-benzylformamide" : [1.540839577, -0.008929697],
	"benzylalcohol" : [1.643378791, -0.008878706],
	"phenol" : [1.714002346, -0.010465041],
	"3-phenylpropanol" : [2.68259933, -0.012422481],
	"p-chlorophenol" : [2.752714402, -0.015141687],
	"acetophenone" : [2.098172436, -0.009256615],
	"benzonitrile" : [1.995680909, -0.009408557],
	"nitrobenzene" : [2.277842706, -0.01086377],
	"methylbenzoate" : [2.754815913, -0.011887763],
	"anisole" : [2.587044692, -0.011362318],
	"benzene" : [2.574300441, -0.010915393],
	"p-nitrotoluene" : [2.900253547, -0.012887248],
	"p-nitrobenzylchloride" : [3.063452817, -0.014804187],
	"toluene" : [3.230991673, -0.013099858],
	"benzophenone" : [3.814708, -0.015609851],
	"bromobenzene" : [3.539527614, -0.015203809],
	"naphthalene" : [3.996276656, -0.017658165],
	"ethylbenzene" : [3.91507907, -0.016025676],
	"p-xylene" : [3.898820055, -0.015301291],
	"p-dichlorobenzene" : [4.042717849, -0.016724835],
	"propylbenzene" : [4.572339411, -0.017710503],
	"n-butylbenzene" : [5.195286534, -0.019603702]
}

var calcSACN = {
	"N-benzylformamide" : [-1.950157208, 0.001962312],
	"benzylalcohol" : [-1.801193074, 0.001538701],
	"phenol" : [-2.157819856, 0.004948239],
	"3-phenylpropanol" : [-2.711627278, 0.004245094],
	"p-chlorophenol" : [-3.110178571, 0.009176534],
	"acetophenone" : [-2.419171414, 0.004190421],
	"benzonitrile" : [-2.581132813, 0.006344149],
	"nitrobenzene" : [-2.909075892, 0.008291834],
	"methylbenzoate" : [-2.911497882, 0.006053077],
	"anisole" : [-2.941605639, 0.007554149],
	"benzene" : [-2.82653686, 0.007114051],
	"p-nitrotoluene" : [-3.433694873, 0.009864271],
	"p-nitrobenzylchloride" : [-3.866695802, 0.012986999],
	"toluene" : [-3.393491059, 0.009005662],
	"benzophenone" : [-4.064139779, 0.010362441],
	"bromobenzene" : [-3.651869929, 0.010618543],
	"naphthalene" : [-4.112896456, 0.012596045],
	"ethylbenzene" : [-4.00434081, 0.01150122],
	"p-xylene" : [-3.911260542, 0.01022372],
	"p-dichlorobenzene" : [-4.06721018, 0.011894773],
	"propylbenzene" : [-4.521888293, 0.012122284],
	"n-butylbenzene" : [-4.916062651, 0.011228978],
}

var calcSMeOH = {
	"N-benzylformamide" : [-2.693811682, 0.00765532],
	"benzylalcohol" : [-2.603915073, 0.007510281],
	"phenol" : [-2.668849687, 0.009039869],
	"3-phenylpropanol" : [-3.54429381, 0.010666582],
	"p-chlorophenol" : [-3.575981618, 0.013318826],
	"acetophenone" : [-2.981031723, 0.00868429],
	"benzonitrile" : [-2.971312206, 0.009056849],
	"nitrobenzene" : [-2.982884732, 0.009470827],
	"methylbenzoate" : [-3.478030789, 0.010738983],
	"anisole" : [-3.103431889, 0.009681809],
	"benzene" : [-3.003558355, 0.009506717],
	"p-nitrotoluene" : [-3.522153507, 0.011004872],
	"p-nitrobenzylchloride" : [-3.80208134, 0.013294572],
	"toluene" : [-3.54707318, 0.010958917],
	"benzophenone" : [-4.572059492, 0.014479928],
	"bromobenzene" : [-3.937991714, 0.013730549],
	"naphthalene" : [-4.36460133, 0.015853326],
	"ethylbenzene" : [-4.212581658, 0.014007133],
	"p-xylene" : [-4.091577867, 0.012295396],
	"p-dichlorobenzene" : [-4.384667429, 0.014898054],
	"propylbenzene" : [-4.77660703, 0.014762593],
	"n-butylbenzene" : [-5.293527636, 0.0159448],
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
	refreshPreloadedCompounds()
	displayTable();
	calculatePeaks();
}

function loadAllImpurities(){
	
	resetMenus();
	
	compounds = ["Impurity-A", "Impurity-B", "Impurity-C", "Impurity-D", "Impurity-E", "Impurity-F", "Impurity-G"];
	
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
	refreshPreloadedCompounds()
	displayTable();
	calculatePeaks();
}

function loadAllParabens(){
	
	resetMenus();
	
	compounds = ["methylparaben", "ethylparaben", "propylparaben", "butylparaben"];
	
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
	refreshPreloadedCompounds()
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

function refreshPreloadedCompounds(){
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
}

function refreshNowloadedCompounds(){
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
}

function setManageCompound(compound){
	log("Running 'setManageCompound("+compound+")'...");
	document.getElementById("manageCompound_compound").innerHTML = compound;
	document.getElementById("manageCompound").hidden = false;
	show('now_loaded');
}

function removeCompoundFromList(){
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
	calculatePeaks();
	refreshPreloadedCompounds();
	
	if(compoundList.length <= 1){
		document.getElementById("now_loaded").disabled = true;
	} else {
		document.getElementById("now_loaded").disabled = false;
	}
	document.getElementById("preloaded").disabled = false;
}

function addCompoundToList(compound){
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
}

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
	document.getElementById("isocratic_radio").checked = true;
	document.getElementById("gradient_radio").checked = false;
	document.getElementById("solvent_fraction_slider").value = 40;
	document.getElementById("solvent_fraction_comp").value = 40;
	//Chromatographic Properties
	document.getElementById("temperature_slider").value = 40;
	document.getElementById("temperature_chrom").value = 40;
	document.getElementById("injection_volume_chrom").value = "5.0";
	document.getElementById("flow_rate_chrom").value = "2.0";	
	//compoundList
	compoundList = ["acetophenone", "naphthalene", "phenol", "p-chlorophenol", "benzonitrile"];
	displayTable();
	refreshPreloadedCompounds();
	refreshNowloadedCompounds();
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
	log("Running 'toggleColumnProperties("+input+")'...");
	//Check if the value of 'input' is a string.
	if(typeof input == "string"){
		//Initiate variable 'disableAll'.
		var disableAll = true;
		//Initiate variable to hold all column value arrays.
		var allColumnValueArrs = [];
		//Initiate variable to hold which column was matched to 'input'.
		var selectedColumn = -1;
		//Generate random numbers incase "Generate Random Column" was selected.
		var generate_one = "" + Math.round((Math.random()*199)+1);
		var generate_two = "" + Number(((Math.random()*4.9)+0.1).toFixed(1));
		var generate_three = "" + Number(((Math.random()*4.9)+0.1).toFixed(1));
		//Initiate column value arrays. Template:
		//allColumnValueArrs[#] = [length, inner diameter, particle size, interparticle porosity, intraparticle porosity, disableAll,   A,            B,            C]; //Description
		//Units:                   mm      mm              um                                                             boolean       Van Deemter   Van Deemter   Van Deemter
		//Array Position:          0       1               2              3                       4                       5             6             7             8
		allColumnValueArrs[0] = ["100.0", "2.0", "2.0", "0.36", "0.4", false, "1.0", "5.0", "0.05"]; //Custom Column
		allColumnValueArrs[1] = [generate_one, generate_two, generate_three, "0.36", "0.4", false, "1.0", "5.0", "0.05"]; //Generate Random Column
		allColumnValueArrs[2] = ["100.0", "4.6", "3.0", "0.4", "0.4", true, "1.0", "5.0", "0.05"]; //Agilent SB-C18
		/*Check 'input' against known values. If one matches, take appropriate action.
		If not, go to the default 'Agilent SB-C18' because there was a syntax error when calling this function. */
		if(input == "Agilent SB-C18"){
			selectedColumn = 2;
			disableAll = allColumnValueArrs[2][5];
		} else if(input == "Custom Column"){ //User wants to enter custom column parameters.
			selectedColumn = 0;
			disableAll = allColumnValueArrs[0][5];
		} else if(input == "Generate Random Column"){ //User wants random column parameters to be generated.
			selectedColumn = 1;
			disableAll = allColumnValueArrs[1][5];
		} else if(input == "Edit Current Column"){ //User is editing current column
			selectedColumn = -1;
			disableAll = false;
		} else { //Fail safe: Syntax Error. Variable 'input' did not match any of the preset values.
			selectedColumn = 2;
			disableAll = allColumnValueArrs[2][5];
		}
		if(selectedColumn == -1){
			//Do Nothing
		} else {
			document.getElementById("length_column").value = allColumnValueArrs[selectedColumn][0];
			document.getElementById("inner_diameter_column").value = allColumnValueArrs[selectedColumn][1];
			document.getElementById("particle_size_column").value = allColumnValueArrs[selectedColumn][2];
			document.getElementById("interparticle_porosity_column").value = allColumnValueArrs[selectedColumn][3];
			document.getElementById("intraparticle_porosity_column").value = allColumnValueArrs[selectedColumn][4];
			document.getElementById("A_column").value = allColumnValueArrs[selectedColumn][6];
			document.getElementById("B_column").value = allColumnValueArrs[selectedColumn][7];
			document.getElementById("C_column").value = allColumnValueArrs[selectedColumn][8];
		}
		//Set the disabled state of the input tags based on the value of the variable 'disableAll'.
		document.getElementById("length_column").disabled = disableAll;
		document.getElementById("inner_diameter_column").disabled = disableAll;
		document.getElementById("particle_size_column").disabled = disableAll;
		document.getElementById("interparticle_porosity_column").disabled = disableAll;
		document.getElementById("intraparticle_porosity_column").disabled = disableAll;
		document.getElementById("A_column").disabled = disableAll;
		document.getElementById("B_column").disabled = disableAll;
		document.getElementById("C_column").disabled = disableAll;
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

function renderGraph(data) {
	log("Running 'renderGraph(data)'...");
	var masterlist = []
	for (i = 0; i < data.length; i++) {
		masterlist = masterlist.concat(data[i])
	}

	d3.select("#graph_svg").remove();

	document.getElementById("graph").innerHTML = "<svg id='graph_svg' width='1400' height='500'></svg>";
	
	var svg = d3.select("#graph_svg"),
	    margin = {top: 20, right: 20, bottom: 30, left: 50},
	    width = 700 - margin.left - margin.right,
	    height = 500 - margin.top - margin.bottom,
	    g = svg.append("g").attr("transform", "translate(" + margin.left + "," + margin.top + ")");

	var x = d3.scaleLinear()
	    .rangeRound([0, width]);

	var y = d3.scaleLinear()
	    .rangeRound([height, 0]);

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
	if (document.getElementById("dataTable").className != ""){
		new_data[1] = data[document.getElementById("dataTable").className];
	}

	x.domain(d3.extent(new_data[0], function(d) { return d.t; }));
	y.domain(d3.extent(new_data[0], function(d) { return d.Ct; }));

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
	    .text("Signal (µ moles/liter)");

	for (i = 0; i < new_data.length; i++) {
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
		    .attr("stroke-width", 1.5)
		    .attr("d", line);
	}
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

function totalPorosity(Ee, El) {
	log("Running 'totalPorosity("+Ee+", "+El+")'...");
	//Ee = interparticle porosity
	//El = intraparticle porosity
	var Et = Ee + El*(1-Ee);
	return Et;
}

//void stuff
function voidVolume (Et, d, L) {
	log("Running 'voidVolume("+Et+", "+d+", "+L+")'...");
	//d = column diameter
	//L = column length
	//Et = total porosity
	var V0 = Math.PI*Math.pow(((d/10)/2), 2)*(L/10)*Et;
	return V0;
}

function voidTime(V0, F) {
	log("Running 'voidTime("+V0+", "+F+")'...");
	//V0 = void volume
	//F = volumetric flow rate
	var t0 = V0/F*60;
	return t0;
}

//flow velocity
function openTubeFlowVelocity(F, d) {
	log("Running 'openTubeFlowVelocity("+F+", "+d+")'...");
	//F = volumetric flow rate (mL/min)
	//d = column diameter (mm)
	//L = column length (mm)
	var F_new = F / 60;
	var d_new = d / 10;
	var O = (Math.PI * Math.pow(d_new, 2))/4;
	var Us = F_new/O;
	return Us;
}

function interstitialFlowVelocity(Us, Ee) {
	log("Running 'interstitialFlowVelocity("+Us+", "+Ee+")'...");
	//Us = open tube flow velocity
	//Ee = interparticle velocity
	var Ue = Us/Ee;
	return Ue;
}

function chromatographicFlowVelocity(Us, Et) {
	log("Running 'chromatographicFlowVelocity("+Us+", "+Et+")'...");
	//Us = open tube flow velocity
	//Et = total porosity
	var U = Us/Et;
	return U;
}

function reducedVelocity(Ue, dp, De) {
	log("Running 'reducedVelocity("+Ue+", "+dp+", "+De+")'...");
	//Ue = intersitial flow velocity
	//dp = diameter of stationary phase particles
	//De = diffusion coefficient of solute in eluent
	var V = Ue*(dp/10000)/De;
	return V;
}

//backpressure
function backpressure(Us, n, Ee, dp, L) {
	log("Running 'backpressure("+Us+", "+n+", "+Ee+", "+dp+", "+L+")'...");
	//Us = open tube flow velocity
	//n = viscosity
	//Ee = interparticle velocity
	//L = column length
	var L_new = L/10;
	var deltaP = 180*((Us*n*L_new*Math.pow((1-Ee), 2))/(Math.pow(Ee, 3)*Math.pow(dp, 2)));
	return deltaP;
}

//average analyte diffusion coefficient
function analyteDiffCoeff(T, phi, associationParameter, n, Vm, Msolv) {
	log("Running 'analyteDiffCoeff("+T+", "+phi+", "+associationParameter+", "+n+", "+Vm+", "+Msolv+")'...");
	//T = temperature in kelvin
	//x = solvent association parameter
	//Msolv = molecular weight of solvent
	//n = viscosity
	//Vm = molar volume of solute
	var De = 0.000000074*(((T + 273.15)*Math.sqrt(associationParameter*Msolv))/(n*Math.pow(Vm, 0.6)));
	return De;
}

//Reduced plate height
function reducedPlateHeight(A, B, C, v) {
	log("Running 'reducedPlateHeight("+A+", "+B+", "+C+", "+v+")'...");
	//A, B, C = van Deemter parameters
	//v = reduced flow velocity
	var h = A + (B/v) + (C*v);
	return h;
}

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
	//console.log("tKelvin = " + tKelvin);
	
	//console.log("lnkwint = " + lnkwint);
	//console.log("lnkwslope = " + lnkwslope);
	//console.log("Sint = " + Sint);
	//console.log("Sslope = " + Sslope);
	
	/*if(compoundName == "diethylformamide" || compoundName == "ethylparaben" || compoundName == "propylparaben" || compoundName == "butylparaben" || compoundName == "acetanilide" || compoundName == "propiophenone" || compoundName == "butyrophenone" || compoundName == "valerophenone" || compoundName == "hexanophenone" || compoundName == "heptanophenone" || compoundName == "octanophenone" || compoundName == "ibuprofen" || compoundName == "Loratidine" || compoundName == "Impurity A" || compoundName == "Impurity B" || compoundName == "Impurity C" || compoundName == "Impurity D" || compoundName == "Impurity E" || compoundName == "Impurity F" || compoundName == "Impurity G"){
		var lnkw = (lnkwslope * tKelvin) + lnkwint;
		var S = (Sslope * tKelvin) + Sint;
	} else {
		var lnkw = (lnkwslope * tKelvin) + lnkwint;
		var S = (Sslope * tKelvin) + Sint;
	}*/
	
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
	log("Running 'isocraticElutionMode("+t0+", "+T+", "+phi+", "+N+", "+tau+", "+Vinj+", "+F+", "+solvent+", "+compoundList+", "+v+", "+d+", "+l+", "+De+")'...");
	var compoundName = Object.keys(compoundList);
	
	compoundName = compoundList; // Change implemented by Ray Sajulga 6/2/17

	var graphData = [];
	var tF = 0.0;

	if (!document.getElementById("auto_time_check").checked) {
		tF = parseFloat(document.getElementById("final_time_general").value);
	}

	var tableArray = new Array();
	var previous_tR = 0;

	var table = [];

	if (tF <= 0.0) {
		//time is determined automatically
		var step = parseFloat((8.34/parseFloat(document.getElementById("plot_points_general").value)).toFixed(3));
		step = .01;
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
			var loops = 0;
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
					alert("infinite loop");
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

				table[i][j+1]=Ct;
				t += step;
				j++;
				loops++;
			}
			graphData[i] = cmpdData;
		}
	} else {
		//time is set manually
		var step = parseFloat((tF/parseFloat(document.getElementById("plot_points_general").value)).toFixed(3));

		for (i = 0; i < compoundName.length; i++) {
			var cmpdData = [];

			var k = calcKprime(t0, T, phi, compoundName[i], solvent)[2];
			var tR = t0/(1+k);
			var UsT = tubingTimeBroadening(v, d, l, tR, De);
			var sigma = isocraticSigma(tR, N, tau, Vinj, F, UsT);
			var W = (Vinj/1000000)*(M[i]);
			var t = 0;
			var j = 0;
			while (t <= tF) {
				var Ct = (W/1000000)/(2*Math.pow((Math.PI), 0.5)*sigma*(F/(60*1000)))*Math.exp(-Math.pow(((t-tR)/(2*sigma)), 2));
				cmpdData[j] = {
					"t" : t,
					"Ct" : (Ct * 1000000)
				}
				t += step;
				j++;
			}
			graphData[i] = cmpdData;
		}
	}
	
	updateTable(tableArray);
	
	return graphData;
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
		Et /= 1000;
		t0 /= 60;
		var deltaPhi = (phi_f - phi_i)/100;
		phi_i /= 100;
		phi_f /= 100;
		log("solvent = " + solvent);
		log("T = " + T);
		log("phi_i = " + phi_i);
		log("phi_f = " + phi_f);
		log("deltaPhi = " + deltaPhi);
		log("tD = " + tD);
		log("F = " + F);
		log("d = " + d);
		log("L = " + L);
		log("Et = " + Et);
		log("tG = " + tG);
		log("t0 = " + t0);
	}
	
	var tKelvin = T + 273.15;
	
	var graphData = [];
	var tableArray = new Array();
	var previous_tR = 0;
	var table = [];
	var step = .01;
	
	for(i = 0; i < compoundList.length; i++){
		var cmpdData = [];
		var UsT = 0;
		var W = parseFloat(((Vinj/1000000)*(M[i])).toFixed(15));
		
		var compoundName = compoundList[i];
		
		var compound = compoundList[i];
		
		if(solvent == "Methanol"){
			var lnkw = (calcGradientMeOH[compound][1]*tKelvin)+calcGradientMeOH[compound][0];
			var S = (calcGradientMeOH[compound][3]*tKelvin)+calcGradientMeOH[compound][2];
		} else {
			var lnkw = (calcGradientACN[compound][1]*tKelvin)+calcGradientACN[compound][0];
			var S = (calcGradientACN[compound][3]*tKelvin)+calcGradientACN[compound][2];
		}
    
		var lnk0 = lnkw - (S*(phi_i));
		var k0 = Math.exp(lnk0);
    
		var b = (S*(phi_f-phi_i)*V0)/(F*tG);
    
		var step1 = k0-(tD/t0);
		var step2 = b * step1 + 1;
		var step3 = (t0/b)*Math.log(step2);
		var tR = t0 + tD + step3;
    
		var phi_e = (((phi_f-phi_i)/tG)*tR)+phi_i;
    
		var lnke = lnkw - (S*(phi_e));
		var ke = Math.exp(lnke);
		
		//console.log("compound = " + compound);
		//console.log("ke = " + ke);
		//console.log("t0 = " + (t0*60));
		//console.log("N = " + N);
		//console.log("tau = " + tau);
		
		
		
		var sigma = Math.sqrt(Math.pow((t0*60)*((1+ke)/(Math.sqrt(N))), 2)+Math.pow(tau, 2));
		
		//console.log("sigma = " + sigma);
		
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
		compoundArray[4] = Math.exp(lnkw);
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
				tF += 1;
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
		graphData[i] = cmpdData;
	}
	
	updateTable(tableArray);
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

//consolidate calculations
function calculatePeaks() {
	//console.log("Running Calculations...");
	log("Running 'calculatePeaks()'...");
	var mode;
	if (document.getElementById("isocratic_radio").checked) {
		mode = "isocratic";
		hideGradientElutionStuffs("true");
		document.getElementById("headerTable_k").innerHTML = "k&#39;";
		//log("-- Element 'isocratic_radio' is checked. mode set to 'isocratic'.");
		//console.log("-- Calculations are isocratic");
	} else {
		mode = "gradient";
		hideGradientElutionStuffs("false");
		document.getElementById("headerTable_k").innerHTML = "k<sub>e</sub>";
		//log("-- Element 'isocratic_radio' is not checked. mode set to 'gradient'.");
		//console.log("-- Calculations are gradient");
	}
	
	var solvent = document.getElementById("solvent_b_text").innerHTML;
	//log("-- var solvent = solvent_b_text.innerHTML = " + solvent);
	
	//checkIfValid(variable, value);
	var iD = checkIfValid("iD", document.getElementById("inner_diameter_other").value);	//inner diameter
	//log("-- var iD = inner_diameter_other.value = " + iD);
	var l = checkIfValid_blank("l", document.getElementById("other_length").value);	//post column tubing
	//log("-- var l = other_length.value = " + l);
	var v = tubingVolume(l, iD);
	//log("-- var v = tubingVolume(" + l + ", " + iD + ") = " + v);
	document.getElementById("volume_other").innerHTML = v.toFixed(5);
	//log("-- Set 'volume_other.innerHTML' to " + v.toFixed(5));
	
	var d = checkIfValid("d", document.getElementById('inner_diameter_column').value);	//*column diameter
	//log("-- var d = inner_diameter_column.value = " + d);
	var L = checkIfValid("L", document.getElementById('length_column').value);	//*column length
	//log("-- var L = length_column.value = " + L);
	var Vinj = checkIfValid("Vinj", document.getElementById('injection_volume_chrom').value); //*injection volume
	//log("-- var Vinj = injection_volume_chrom.value = " + Vinj);
	var fR = checkIfValid("fR", document.getElementById("flow_rate_chrom").value); //flow rate
	//log("-- var fR = flow_rate_chrom.value = " + fR);

	if(document.getElementById("Gradient_MixingVolume").value == ""){
		document.getElementById("Gradient_MixingVolume").value = 200;
	}
	
	if(document.getElementById("Gradient_NonMixingVolume").value == ""){
		document.getElementById("Gradient_NonMixingVolume").value = 200;
	}
	
	var gradient_mixingVolume = document.getElementById("Gradient_MixingVolume").value;
	var gradient_nonMixingVolume = document.getElementById("Gradient_NonMixingVolume").value;
	
	var VD = Number(gradient_mixingVolume) + Number(gradient_nonMixingVolume);
	var tD = (((Number(gradient_mixingVolume)/1000) + (Number(gradient_nonMixingVolume)/1000))/Number(fR));
	
	document.getElementById("Gradient_PreColumn_Volume_DwellVolume").innerHTML = VD;
	document.getElementById("Gradient_PreColumn_Volume_DwellTime").innerHTML = tD.toFixed(2);
	
	var phi_i = document.getElementById("Gradient_Phi_Init").value;
	var phi_f = document.getElementById("Gradient_Phi_Final").value;
	
	if(phi_f <= phi_i){
		phi_i = phi_f - 1;
		document.getElementById("Gradient_Phi_Init").value = phi_i;
	}
	
	var tG = document.getElementById("Gradient_Time").value;
	
	if(tG <= 0){
		tG = 0.01;
		document.getElementById("Gradient_Time").value = 0.01;
	}
	
	var Ee = checkIfValid("Ee", document.getElementById('interparticle_porosity_column').value); //interparticlePorosity(Ve, V);	//fraction of volume in column between stationary phase particles
	//log("-- var Ee = interparticle_porosity_column.value = " + Ee);
	var El = checkIfValid("El", document.getElementById('intraparticle_porosity_column').value); //intraparticlePorosity(Vp, Vl);	//fraction of stationary phase particles occupied by eluent
	//log("-- var El = intraparticle_porosity_column.value = " + El);
	var Et = totalPorosity(Ee, El);			//total porosity
	//log("-- var Et = totalPorosity(" + Ee + ", " + El + ") = " + Et);
	
	document.getElementById("total_porosity_column").innerHTML = Et.toFixed(4);
	//log("-- Set 'total_porosity_column.innerHTML' to " + Et.toFixed(4));
	
	var V0 = voidVolume (Et, d, L);	//void volume
	//log("-- var V0 = voidVolume(" + Et + ", " + d + ", " + L + ") = " + V0);
	
	document.getElementById("void_volume_column").innerHTML = V0.toFixed(4);
	//log("-- Set 'void_volume_column.innerHTML' to " + V0.toFixed(4));
	var t0 = voidTime(V0, fR);		//void time
	//log("-- var t0 = voidTime(" + V0 + ", " + fR + ") = " + t0);
	document.getElementById("void_time_column").innerHTML = t0.toFixed(4);
	//log("-- Set 'void_time_column.innerHTML' to " + t0.toFixed(4));
	
	var dP = checkIfValid("dP", document.getElementById('particle_size_column').value);	//diameter of stationary phase particles
	//log("-- var dP = particle_size_column.value = " + dP);
	
	var T = checkIfValid_blank("T", document.getElementById('temperature_chrom').value);	//temperature
	//log("-- var T = temperature_chrom.value = " + T);
	var phi = checkIfValid_blank("phi", document.getElementById('solvent_fraction_comp').value) / 100;		//volume fraction of organic modifier
	//log("-- var phi = particle_size_column.value / 100 = " + phi);
	
	//var n = calcPressureSimulator(L,1000* d, phi, T, fR);	//viscosity

	// This method of calculation is what is used in the original java version.
	//var n = Math.exp((phi*(-3.476+(726/(T+273.15)))) + ((1-phi)*(-5.414+(1566/(T+273.15))))+(phi*(1-phi)*(-1.762 + (929 / (T + 273.15)))));
	var n = Math.exp(phi*(-3.476+(726/(T+273.15)))+(1-phi)*(-5.414+(1566/(T+273.15)))+phi*(1-phi)*(-1.762+(929/(T+273.15))));
	//log("-- var n = Math.exp((" + phi + ")*(-3.476+(726/((" + T + ")+273.15)))+(1-(" + phi + "))*(-5.414+(1566/((" + T + ")+273.15)))+(" + phi + ")*(1-(" + phi + "))*(-1.762+(929/((" + T + ")+273.15)))) = " + n);
	
	document.getElementById("eluent_viscosity_general").innerHTML = n.toFixed(4);
	//log("-- Set 'eluent_viscosity_general.innerHTML' to " + n.toFixed(4));
	
	var associationParameter = ((1 - phi) * (2.6 - 1.9)) + 1.9;	//association parameter
	//log("-- var associationParameter = ((1 - (" + phi + ")) * (2.6 - 1.9)) + 1.9 = " + associationParameter);
	
	var Morg;	//molecular weight of the organic modifier
	if (solvent == "Methanol") {
		Morg = 32.04; // Methanol
	} else {
		Morg = 41.05; // Acetonitrile
	}
	//log("-- var Morg = molecular weight of the organic modifier (" + solvent + ") = " + Morg);
	
	var Msolv = phi * (Morg - 18) +18;
	//log("-- var Msolv = (" + phi + ") * ((" + Morg + ") - 18) +18 = " + Msolv);

	//var Vm = 0;		//molar volume of the solute
	//for (i = 0; i < compoundList.length; i++) {
	//	Vm += getMolarVolume(compoundList[i]);
    //}
	//Vm = Vm / compoundList.length;
	
	//log("-- var Vm = molar volume of the solute = " + Vm);

	//var De = analyteDiffCoeff(T, phi, associationParameter, n, Vm, Msolv);	//average analyte diffusion coefficient
	var De = 0.00001615;
	document.getElementById("avg_diffusion_coefficient_general").innerHTML = De.toExponential(4);
	//log("-- Set 'avg_diffusion_coefficient_general.innerHTML' to " + De.toExponential(4));
	
	var Us = openTubeFlowVelocity(fR, d);			//open tube flow velocity
	//log("-- var Us = openTubeFlowVelocity(" + fR + ", " + d + ") = " + Us);
	var Ue = interstitialFlowVelocity(Us, Ee);		//interstitial flow velocity
	//log("-- var Ue = interstitialFlowVelocity(" + Us + ", " + Ee + ") = " + Ue);
	var U = chromatographicFlowVelocity(Us, Et);	//chromatographic flow velocity
	//log("-- var U = chromatographicFlowVelocity(" + Us + ", " + Et + ") = " + U);
	var V = reducedVelocity(Ue, dP, De);			//reduced velocity
	//log("-- var V = reducedVelocity(" + Ue + ", " + dP + ", " + De + ") = " + V);
	
	document.getElementById("open_tube_flow_velocity").innerHTML = Us.toFixed(4);
	//log("-- Set 'open_tube_flow_velocity.innerHTML' to " + Us.toFixed(4));
	document.getElementById("intersitial_flow_velocity").innerHTML = Ue.toFixed(4);
	//log("-- Set 'intersitial_flow_velocity.innerHTML' to " + Ue.toFixed(4));
	document.getElementById("chromatographic_flow_velocity").innerHTML = U.toFixed(4);
	//log("-- Set 'chromatographic_flow_velocity.innerHTML' to " + U.toFixed(4));
	document.getElementById("reduced_flow_velocity").innerHTML = V.toFixed(4);
	//log("-- Set 'reduced_flow_velocity.innerHTML' to " + V.toFixed(4));
	
	var deltaP = backpressure(Us, n, Ee, dP, L);		//backpressure
	//log("-- var deltaP = backpressure(" + Us + ", " + n + ", " + Ee + ", " + dP + ", " + L + ") = " + deltaP);
	
	document.getElementById("backpressure_chrom").innerHTML = (deltaP).toFixed(2);
	//log("-- Set 'backpressure_chrom.innerHTML' to " + (deltaP).toFixed(2));
	
	var A = checkIfValid("A", document.getElementById("A_column").value);	//*van Deemter coefficient
	//log("-- var A = A_column.value = " + A);
	var B = checkIfValid("B", document.getElementById("B_column").value);	//*van Deemter coefficient
	//log("-- var B = B_column.value = " + B);
	var C = checkIfValid("C", document.getElementById("C_column").value);	//*van Deemter coefficient
	//log("-- var C = C_column.value = " + C);
	
	var h = reducedPlateHeight(A, B, C, V);	//reduced plate height
	//log("-- var h = reducedPlateHeight(" + A + ", " + B + ", " + C + ", " + V + ") = " + h);
	document.getElementById("reduced_plate_height_column").innerHTML = parseFloat(h).toFixed(4);
	//log("-- Set 'reduced_plate_height_column.innerHTML' to " + parseFloat(h).toFixed(4));
	
	var NHETP = theoreticalPlates(h, dP, L);	//theoretical plate number
	//log("-- var NHETP = theoreticalPlates(" + h + ", " + dP + ", " + L + ") = " + NHETP);
	
	document.getElementById("HETP_chrom").innerHTML = NHETP[0] .toExponential(4);
	//log("-- Set 'HETP_chrom.innerHTML' to " + NHETP[0] .toExponential(4));
	
	var N = NHETP[1];
	//log("-- var N = NHETP[1] = " + NHETP[1]);
	
	document.getElementById("theoretical_plates_chrom").innerHTML = Math.floor(N);
	//log("-- Set 'theoretical_plates_chrom.innerHTML' to " + Math.floor(N));

	var tau = checkIfValid("tau", document.getElementById("time_constant_general").value);
	//log("-- var tau = time_constant_general.value = " + tau);
	
	var data;
	if (mode == "isocratic") {
		//log("Mode == 'isocratic'. Data set to 'isocraticElutionMode(t0, T, phi, N, tau, Vinj, fR, solvent, compoundList, v, d, l, De)'");
		data = isocraticElutionMode(t0, T, phi, N, tau, Vinj, fR, solvent, compoundList, v, d, l, De);
	} else {
		//log("Mode == 'gradient'. Data set to 'gradientElutionMode(solvent, T, phi_i, phi_f, tD, fR, d, L, Et, tG, t0, N, tau, Vinj, V0)'");
		data = gradientElutionMode(solvent, T, phi_i, phi_f, tD, fR, d, L, Et, tG, t0, N, tau, Vinj, V0);
	}
	
	renderGraph(data);
	
	document.getElementById('GenRandExpBtn').disabled = false;
	//log("-- Set 'GenRandExpBtn.disabled' to 'false'");
	
	//log("-Completed function 'calculatePeaks()' successfully!");
	
	refreshPreloadedCompounds();
	refreshNowloadedCompounds();
	
	if(compoundList.length == Object.keys(calcGradientACN).length){
		document.getElementById("loadAllCompounds_button").disabled = true;
		document.getElementById("preloaded").disabled = true;
	} else {
		document.getElementById("loadAllCompounds_button").disabled = false;
		document.getElementById("preloaded").disabled = false;
	}
	
	if(compoundList.length <= 1){
		document.getElementById("now_loaded").disabled = true;
	} else {
		document.getElementById("now_loaded").disabled = false;
	}
	
	if(checkIfCompoundIsListed("Impurity-A") && checkIfCompoundIsListed("Impurity-B") && checkIfCompoundIsListed("Impurity-C") && checkIfCompoundIsListed("Impurity-D") && checkIfCompoundIsListed("Impurity-E") && checkIfCompoundIsListed("Impurity-F") && checkIfCompoundIsListed("Impurity-G") && compoundList.length == 7){
		document.getElementById("loadAllImpurities_button").disabled = true;
	} else {
		document.getElementById("loadAllImpurities_button").disabled = false;
	}
	
	if(checkIfCompoundIsListed("methylparaben") && checkIfCompoundIsListed("ethylparaben") && checkIfCompoundIsListed("propylparaben") && checkIfCompoundIsListed("butylparaben") && compoundList.length == 4){
		document.getElementById("loadAllParabens_button").disabled = true;
	} else {
		document.getElementById("loadAllParabens_button").disabled = false;
	}
}

function load() {
	log("Running 'load()'...");
	var sliders = document.getElementsByClassName("slider_ticks");
	var i;
	for (i = 0; i < sliders.length; i++) {
		loadSlider(sliders[i].id);
	}
	var raw_compounds = Object.keys(calcGradientACN);
	//console.log(Object.keys(calcGradientACN));
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
	log("preloaded_dropdown innerHTML has been updated!");
	for (i = 0; i < compounds.length; i++) {
		var save = compounds[i].replace(/ /g,"_");
		document.getElementById(save+"_menu_option").onClick = "select_option('"+ compounds[i] +"', 'preloaded')";
	}
	//log("save+'_menu_option' onClick has been initiated!");
	refreshNowloadedCompounds();
	displayTable();
	calculatePeaks();
}