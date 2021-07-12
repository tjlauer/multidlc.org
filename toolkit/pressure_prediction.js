function calculate() {
	try {
		var value1 = parseFloat(validate(document.getElementById("value1").value.trim()));
		var value2 = parseFloat(validate(document.getElementById("value2").value.trim()));
		var operator1 = document.getElementById('operator1').value;
		var operator2 = document.getElementById('operator2').value;
		var operator3 = document.getElementById('operator3').value;
		document.getElementById("result").value = operate(value1, value2, operator1, operator2, operator3);

	} catch (err) {
		alert("There was a problem: " + err.messaqge);
	}
	return false;
}

function operate(value1, value2, operator1, operator2, operator3) {
	if (operator1 == 'millimeter') {
		var conversionFact1 = 10;
	} else if (operator1 == 'centimeter') {
		var conversionFact1 = 1;
	} else if (operator1 == 'inch') {
		var conversionFact1 = 1 / 2.54;
	}
	if (operator2 == 'millimeter') {
		var conversionFact2 = 10;
	} else if (operator2 == 'centimeter') {
		var conversionFact2 = 1;
	} else if (operator2 == 'inch') {
		var conversionFact2 = 1 / 2.54;
	} else if (operator2 == 'micrometer') {
		var conversionFact2 = 10000;
	}
	if (operator3 == 'milliliter') {
		var conversionFact3 = 1;
	} else if (operator3 == 'microliter') {
		var conversionFact3 = 1000;
	}
	return Math.PI * Math.pow(((value2 / conversionFact2) / 2), 2) * value1 / conversionFact1 * conversionFact3;
}

function check(legend, box){
	if(box.checked){
		box.checked = false;
		legend.style.color = "#797979";
	} else {
		box.checked = true;
		legend.style.color = "#000000"
	}
	readDataP();
}

function validate(value) {
	if (value == null || value == "") {
		alert("Required Field");
		return 0;
	} else if (isNaN(value)) {
		alert("Must be a Number Field");
		return 0;
	} else
		return value;
}

function readDataP() {
	var length = document.getElementById('length_input').value;
	var diameter = document.getElementById('diameter_input').value;
	var composition = document.getElementById('composition_input').value;
	var temperature = document.getElementById('temperature_input').value;
	var amb = document.getElementById('ambient_input').checked;
	var turb = document.getElementById('turbulent_input').checked;
	var lam = document.getElementById('laminar_input').checked;

	plotData(calcPressure(parseFloat(length), parseFloat(diameter), parseFloat(composition), parseFloat(temperature)), amb, turb, lam);
	return false;
}

function clearV() {
	document.getElementById('composition_input').reset();
	document.getElementById('temperature_input').reset();
	document.getElementById('pressure_input').reset();
	document.getElementById("viscosity_output").reset();
	document.getElementById("density_output").reset();

	return false;
}

function readDataV() {
	var composition = parseFloat(document.getElementById('composition_input').value);
	var temperature = parseFloat(document.getElementById('temperature_input').value);
	var pressure = parseFloat(document.getElementById('pressure_input').value);
	var temp_kelvin = convTemp(temperature);

	document.getElementById("viscosity_output").value = parseFloat(calcViscosity(temp_kelvin, composition, pressure)).toFixed(3);
	document.getElementById("density_output").value = parseFloat(calcDensity(temp_kelvin, composition, pressure) / 1000).toFixed(2);
	return false;
}

function convTemp(temp) {
	//this function converts Celcius to Kelvin
	return temp + 273.15;
}

function convDiameter(diameter) {
	//this function converts microns to centimeters
	return diameter / 10000;
}

function calcVelocity(diameter, flow) {
	//this function calculates the velocity of the mobile phase based
	//the diameter and the flow rate of the solvent
	//return flow / ((diameter / 2) ^ 2 * 3.1415926535897) / 60;
	var pt1 = Math.pow((diameter / 2), 2);
	return flow / (pt1 * 3.1415926535897 * 60);
}

function calcDensity(temp, comp, pressure) {
	//this function calculates the density of the solvent based
	//on its composition

	//=(($AZ$1*0^2+$AZ$2*0+$AZ$3)+($BA$1*0^2+
	//$BA$2*0+$BA$3)*$L$3+($BB$1*0^2+$BB$2*0+$BB$3)*$R$3+
	//($BC$1*0^2+$BC$2*0+$BC$3)*($L$3^2)+
	//($BD$1*0^2+$BD$2*0+$BD$3)*$L$3*$R$3+
	//($BE$1*0^2+$BE$2*0+$BE$3)*($R$3^2))*1000

	var p1 = -0.00000008839 * Math.pow(pressure, 2) + 0.0001154 * pressure + 0.963;
	var p2 = (0.00000005063 * Math.pow(pressure, 2) + -0.0001752 * pressure + 0.01955) * comp;
	var p3 = (0.0000000004975 * Math.pow(pressure, 2) + -0.0000003184 * pressure + 0.0007167) * temp;
	var p4 = (-0.00000001572 * Math.pow(pressure, 2) + 0.00002746 * pressure + -0.0557) * Math.pow(comp, 2);
	var p5 = (-0.0000000001625 * Math.pow(pressure, 2) + 0.0000006069 * pressure + -0.0006368) * comp * temp;
	var p6 = (-0.000000000000729 * Math.pow(pressure, 2) + 0.0000000002659 * pressure + -0.000001953) * Math.pow(temp, 2);
	return (p1 + p2 + p3 + p4 + p5 + p6) * 1000;
}

function calcViscosity(temp, comp, pressure) {
	//this function calculates the viscosity of the solvent in the column
	//based on temperature(K) and solvent composition

	var var1 = 0.0000004821 * Math.pow(pressure, 2) + -0.002168 * pressure + 16.41;
	var var2 = (-0.0000007406 * Math.pow(pressure, 2) + 0.00444 * pressure + -6.199) * comp;
	var var3 = (-0.000000002772 * Math.pow(pressure, 2) + 0.00001193 * pressure + -0.08809) * temp;
	var var4 = (0.000001044 * Math.pow(pressure, 2) + -0.002009 * pressure + -5.88) * Math.pow(comp, 2);
	var var5 = (0.000000002536 * Math.pow(pressure, 2) + -0.00001911 * pressure + 0.04568) * comp * temp;
	var var6 = (0.000000000004 * Math.pow(pressure, 2) + -0.00000001588 * pressure + 0.0001098) * Math.pow(temp, 2);
	var var7 = (-0.0000004567 * Math.pow(pressure, 2) + 0.0006429 * pressure + 0.3917) * Math.pow(comp, 3);
	var var8 = (-0.000000001098 * Math.pow(pressure, 2) + 0.00000337 * pressure + 0.01239) * temp * Math.pow(comp, 2);
	var var9 = (-0.000000000004045 * Math.pow(pressure, 2) + 0.00000002375 * pressure + -0.00007427) * comp * Math.pow(temp, 2);
	var add = var1 + var2 + var3 + var4 + var5 + var6 + var7 + var8 + var9;
	return Math.exp(add);
}

function parseData(input) {
	//Takes a string and splits it into a list.  The values are then put
	//into a dictionary such that any value with an even index is the key and
	//a value with an odd index is the value retreived with the key
	//Used to organize the values retrieved from the text file in the following order
	//key: Reynold's number and value:Global FF
	var dict = {};
	var list = input.split(" ");
	var i = 0;
	var key = true;
	while (i < list.length) {
		var keyVal;
		if (key) {
			keyVal = list[i];
			key = false;
		} else {
			dict[keyVal] = list[i];
			key = true;
		}
		i++;
	}
	return dict;
}

function getReynolds() {
	//retrieves a string from the text file "reynolds_number.txt" and returns the
	//string on that file.  This particular file contains Reynold's numbers from
	//35 to 4000 and their corresponding global FF values
	var reyNumData;
	var read = new XMLHttpRequest();
	read.overrideMimeType('text/plain');
	read.onreadystatechange = function() {
		if (read.readyState == 4) {
			if (read.status == 200) {
				reyNumData = read.responseText;
			}
		}
	};
	read.open("GET", "../toolkit/reynolds_number.txt", false);
	read.send();
	return reyNumData;
}

function closest(num, arr) {
	var mid;
	var lo = 0;
	var hi = arr.length - 1;
	while (hi - lo > 1) {
		mid = Math.floor((lo + hi) / 2);
		if (arr[mid] < num) {
			lo = mid;
		} else {
			hi = mid;
		}
	}
	if (num - arr[lo] <= arr[hi] - num) {
		return arr[lo];
	}
	return arr[hi];
}

function calcPressure(length, diameter_micron, composition, temperature_c) {
	//constants throughout calculations
	var temperature_k = convTemp(temperature_c);
	var diameter_cm = convDiameter(diameter_micron);
	var reynolds = parseData(getReynolds());
	var keys = Object.keys(reynolds);
	var pressure = 0;
	var density = 0;

	//used to calculate viscosity for each iteration, requires initial pressure of 0
	var old_viscosity = 1000;
	var viscosity = 0;

	//variables to be returned and graphed
	var counter = 0;
	var x_vals = [];
	var lam_ambi_pressure = [];
	var turb_pressure = [];
	var lam_act_pressure = [];

	//each iteration of the while loop represents the calculation of one point on the
	//final graph for each line in the plot
	var flow = 0.200297;
	while (flow <= 5.0) {
		x_vals[counter] = flow;
		var whileCount = 0;
		while (whileCount < 500 && Math.abs(old_viscosity - viscosity) > 0.0001) {
			whileCount++;
			if (whileCount > 1000) {
				alert("stuck in infinite loop at " + flow + " mL/s");
				exit();
			}
			//calculating density
			var density = calcDensity(temperature_k, composition, pressure);

			//calculating velocity
			var velocity = calcVelocity(diameter_cm, flow);

			//calculating viscosity
			old_viscosity = viscosity;
			viscosity = calcViscosity(temperature_k, composition, pressure);

			//determining FF by calculating the Reynold's number for the column and finding
			//the FF corresponding to the closest Reynold's number in a table of values
			//						rey =$Q$3*(F6/60/100/100/100)*($P$3/100)/((($P$3/100/2)^2*3.1415926535897)*M6/1000);
			var pt1 = flow / 60000000;
			var pt2 = diameter_cm / 100;
			var pt3 = Math.pow(diameter_cm / 200, 2) * 3.1415926535897;
			var pt4 = viscosity / 1000;
			var rey = density * pt1 * pt2 / (pt3 * pt4);
			var closest_rey = closest(Math.round(rey), keys);
			var ff_global = reynolds[closest_rey];

			//determining the pressure of the column
			//pressure = P6*$J$3*((G6/100)^2)*$Q$3/(100000*2*($K$3/1000000))
			pt1 = Math.pow((velocity / 100), 2);
			pt2 = (diameter_micron / 1000000) * 100000 * 2;
			pressure = ff_global * length * pt1 * density / pt2

			//add point to ambient pressure plot
			if (old_viscosity == 0) {
				//lam_ambi_pressure[counter] =128*$J$3*M6/1000*F6/60/100/100/100/3.1415926535897/(($P$3/100)^4)/100000;
				pt1 = viscosity / 1000;
				pt3 = Math.pow((diameter_cm / 100), 4);
				pt2 = flow / (60000000 * 3.1415926535897 * 100000 * pt3);
				lam_ambi_pressure[counter] = parseFloat(128 * length * pt1 * pt2).toFixed(3);
			}
		}
		//add point to actual pressure plot
		//lam_act_pressure[counter]=128*$J$3*AD6/1000*F6/60/100/100/100/3.1415926535897/(($P$3/100)^4)/100000;
		pt1 = viscosity / 1000;
		pt3 = Math.pow((diameter_cm / 100), 4);
		pt2 = flow / (188495559.2 * 100000 * pt3);
		lam_act_pressure[counter] = parseFloat(128 * length * pt1 * pt2).toFixed(3);

		//add point to turbulent pressure
		turb_pressure[counter] = parseFloat(pressure).toFixed(3);

		//reset variables
		pressure = 0;
		old_viscosity = 1000;
		viscosity = 0;

		//increase counters
		whileCount = 0;
		counter++;
		flow += 0.000799;
	}
	return [x_vals, lam_ambi_pressure, lam_act_pressure, turb_pressure];
}

function calcPressureSimulator(length_mm, diameter_mm, composition_percent, temperature_c, flowrate) {
	//constants throughout calculations
	var composition = composition_percent/100;
	var length = length_mm/1000;
	var temperature_k = convTemp(temperature_c);
	var diameter_cm = diameter_mm/10;
	var diameter_micron = diameter_cm * 10000;
	var reynolds = parseData(getReynolds());
	var keys = Object.keys(reynolds);
	var pressure = 0;
	var density = 0;

	//used to calculate viscosity for each iteration, requires initial pressure of 0
	var old_viscosity = 1000;
	var viscosity = 0;

	//variables to be returned and graphed
	var counter = 0;
	var x_vals = [];
	var lam_ambi_pressure = [];
	var turb_pressure = [];
	var lam_act_pressure = [];

	//each iteration of the while loop represents the calculation of one point on the
	//final graph for each line in the plot
	var flow = flowrate / 60;
	var whileCount = 0;
	while (whileCount < 500 && Math.abs(old_viscosity - viscosity) > 0.0001) {
		whileCount++;
		if (whileCount > 1000) {
			alert("stuck in infinite loop at " + flow + " mL/s");
			exit();
		}
		//calculating density
		var density = calcDensity(temperature_k, composition, pressure);
			//calculating velocity
		var velocity = calcVelocity(diameter_cm, flow);
			//calculating viscosity
		old_viscosity = viscosity;
		viscosity = calcViscosity(temperature_k, composition, pressure);
			//determining FF by calculating the Reynold's number for the column and finding
		//the FF corresponding to the closest Reynold's number in a table of values
		//rey =$Q$3*(F6/60/100/100/100)*($P$3/100)/((($P$3/100/2)^2*3.1415926535897)*M6/1000);
		var pt1 = flow / 60000000;
		var pt2 = diameter_cm / 100;
		var pt3 = Math.pow(diameter_cm / 200, 2) * 3.1415926535897;
		var pt4 = viscosity / 1000;
		var rey = density * pt1 * pt2 / (pt3 * pt4);
		var closest_rey = closest(Math.round(rey), keys);
		var ff_global = reynolds[closest_rey];
		//determining the pressure of the column
		//pressure = P6*$J$3*((G6/100)^2)*$Q$3/(100000*2*($K$3/1000000))
		pt1 = Math.pow((velocity / 100), 2);
		pt2 = (diameter_micron / 1000000) * 100000 * 2;
		pressure = ff_global * length * pt1 * density / pt2
			//add point to ambient pressure plot
		if (old_viscosity == 0) {
			//lam_ambi_pressure[counter] =128*$J$3*M6/1000*F6/60/100/100/100/3.1415926535897/(($P$3/100)^4)/100000;
			pt1 = viscosity / 1000;
			pt3 = Math.pow((diameter_cm / 100), 4);
			pt2 = flow / (60000000 * 3.1415926535897 * 100000 * pt3);
			lam_ambi_pressure[counter] = parseFloat(128 * length * pt1 * pt2).toFixed(3);
		}
	}
	return viscosity;
}

function plotData(data, check_amb, check_turb, check_lam) {

	var turbulent;
	if (check_turb) {
		turbulent = {
			name : 'Turbulent flow',
			x : data[0],
			y : data[3],
			mode : 'markers',
			hoverinfo : 'x+y',
			marker : {
				size : '5',
				color : '#aa5585',
			},
			type : 'scatter'
		};
	} else {
		turbulent = {
		name : 'Turbulent flow',
		x : data[0],
		y : data[3],
		mode : 'markers',
		hoverinfo : 'x+y',
		visible : 'legendonly',
		marker : { size : '5',
			color : '#aa5585',
			}, type :'scatter'
		};
	}

	var amb_visc;
	if (check_amb) {
		amb_visc = {
			name : 'Laminar flow (Viscosity at ambient pressure)',
			x : data[0],
			y : data[1],
			mode : 'markers',
			hoverinfo : 'x+y',
			marker : {
				size : '5',
				color : '#556595',
			},
			type : 'scatter'
		};
	} else {
		amb_visc = {
			name : 'Laminar flow (Viscosity at ambient pressure)',
			x : data[0],
			y : data[1],
			mode : 'markers',
			hoverinfo : 'x+y',
			visible : 'legendonly',
			marker : {
				size : '5',
				color : '#556595',
			},
			type : 'scatter'
		};
	}

	var final_visc;
	if (check_lam) {
		final_visc = {
			name : 'Laminar flow (Viscosity at actual pressure)',
			x : data[0],
			y : data[2],
			mode : 'markers',
			hoverinfo : 'x+y',
			marker : {
				size : '5',
				color : '#d4a66a',
			},
			type : 'scatter'
		};
	} else {
		final_visc = {
		name : 'Laminar flow (Viscosity at actual pressure)',
		x : data[0],
		y : data[2],
		mode : 'markers',
		hoverinfo : 'x+y',
		visible : 'legendonly',
		marker : { 
			size : '5',
			color : '#d4a66a',
			}, 
		type :'scatter'
		};
	}

	Plotly.newPlot('graph', [turbulent, amb_visc, final_visc], {
		title : 'Pressure Prediction Plot',
		showlegend : false,
		autofit : false,
		height : 500,
		width : 598,
		xaxis : {
			title : 'Flow (mL/min)',
			legend : {
				x : 0,
				y : 0
			},
			titlefont : {
				family : 'Courier New, monospace',
				size : 18,
				color : '#7f7f7f'
			}
		},
		yaxis : {
			title : 'Pressure (bar)',
			titlefont : {
				family : 'Courier New, monospace',
				size : 18,
				color : '#7f7f7f'
			}
		}
	});
}