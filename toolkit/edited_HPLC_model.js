function conv_ParticleSize(particleSize) {
	//this function converts microns to centimeters
	return particleSize / 10000;
}

function conv_Temp(Temp) {
	//this function converts degress Celsius to degress Kelvin
	return parseFloat(Temp) + 273
}

//function calculateLength(particleSize,Ue_value,Length_value,A_value,B_value,C_value,organic_type,percent_B,MW_value,Temp,epsilon_e,epsilon_i) {
function calculateLength(particleSize,Ue_value,Length_value,A_value,B_value,C_value,organic_type,percent_B,MW_value,Temp,epsilon_e,epsilon_i,max_pressure,particle_dia) {	

	Ue_value = parseFloat(Ue_value)
	Length_value = parseFloat(Length_value)
	A_value = parseFloat(A_value)
	B_value = parseFloat(B_value)
	C_value = parseFloat(C_value)
	percent_B = parseFloat(percent_B)
	MW_value = parseFloat(MW_value)
	max_pressure = parseFloat(max_pressure)
	particle_dia = parseFloat(particle_dia)
	epsilon_e = parseFloat(epsilon_e)

	var plateHeights = []
	var Ue_vals = []
	var Flow = []
	var i = 0.01
	var j = 0
	var k = 0
	while (i <= Ue_value) {
		Ue_vals[j] = i
		Flow[k] = Math.PI * (Math.pow((particle_dia * 0.5),2)) * Ue_vals[j] * epsilon_e;
		i += 0.05
		j ++
		k ++
	}

	if (organic_type == 'Acetonitrile') {
		var x_association = (1 * percent_B) + (2.6 * (1 - percent_B))
		var n_viscosity = Math.exp(16.42 + (-6.244 * percent_B) + (-.08816 * Temp) + (-5.874 * Math.pow(percent_B, 2)) + (0.04594 * percent_B * Temp) + (0.0001099 * Math.pow(Temp,2)) + (0.3916 * Math.pow(percent_B,3)) + (0.01237 * Math.pow(percent_B,2) * Temp) + (-0.00007465 * percent_B * Math.pow(Temp,2)))
	}

	if (organic_type == 'Methanol') {
		var x_association = (1.9 * percent_B) + (2.6 * (1 - percent_B))
		var n_viscosity = Math.exp(22.2831197882253 + (-2.3695685602611 * percent_B) + (-0.125282811501898 * Temp) + (-11.5345747523277 * Math.pow(percent_B, 2)) + (0.0517314164107194 * percent_B * Temp) + (0.000167866399076663 * Math.pow(Temp,2)) + (0.0280262988444658 * Math.pow(percent_B,3)) + (0.0277168799128358 * Math.pow(percent_B,2) * Temp) + (-0.000114766698586637 * percent_B * Math.pow(Temp,2)))
	}

	var M_value = ((1 - percent_B) * 18) + (percent_B * MW_value)
	var Dm = (0.000000074 * Temp * Math.sqrt(x_association * M_value)) / (n_viscosity * Math.pow(MW_value, 0.6));

	//return Diffusion Coefficient as output*

	for (var i = 0; i < Ue_vals.length; i++) {
		var V = (Ue_vals[i] * particleSize) / Dm ;
		var h = (A_value + (B_value / V) + (C_value * V));
		plateHeights[i] = h * particleSize;
	}

	//this part of the function returns the value of the length
	//corresponding to constant plate number values
	//Length = plateNumber * plateHeight
	var Plate_Length = [];
	var plateNumbers = [1000,2000,3000,4000,5000,6000,7000,8000,9000,10000,15000,20000,25000,30000];
	for (var i = 0; i < plateNumbers.length; i++){
		Plate_Length[i] = []
		for (var j = 0; j < plateHeights.length; j++){
			Plate_Length[i][j] = (plateNumbers[i] * plateHeights[j]);
		}
	}

	//this part solves for the length values corresponding
	//to each Ue (velocity) value at the given amount of pressure
	//Length = (Pressure * particleSize) / (500 * Ue)

	var L_Pressure = [];

	for (var i = 0; i < Ue_vals.length; i++) {
		L_Pressure[i] = (max_pressure * Math.pow(particleSize,2) * Math.pow(10000,2) / (500 * n_viscosity * Ue_vals[i]));
	}
	
	//this will produce constant time lines
	
		var Length_t_1s = []
		var Length_t_2s = []
		var Length_t_5s = []
		var Length_t_10s = []
		var Length_t_20s = []
		var Length_t_40s = []
		var Length_t_80s = []

		epsilon_e = parseFloat(epsilon_e)
		epsilon_i = parseFloat(epsilon_i)
		var epsilon_t = epsilon_e + (epsilon_i) * (1 - epsilon_e)
		var lambda = epsilon_e / epsilon_t
	
	for (var i = 0; i < Ue_vals.length; i++) {
		Length_t_1s[i] = lambda * Ue_vals[i];
		Length_t_2s[i] = lambda * 2 * Ue_vals[i];
		Length_t_5s[i] = lambda * 5 * Ue_vals[i];
		Length_t_10s[i] = lambda * 10 * Ue_vals[i];
		Length_t_20s[i] = lambda * 20 * Ue_vals[i];
		Length_t_40s[i] = lambda * 40 * Ue_vals[i];
		Length_t_80s[i] = lambda * 80 * Ue_vals[i];
	}

	var Time_Lengths = [Length_t_1s,Length_t_2s,Length_t_5s,Length_t_10s,Length_t_20s,Length_t_40s,Length_t_80s];

	//var x_values = Ue_values;
	//var y_values = [Length_from_N,Pressure_Lengths_A,Pressure_Lengths_B,Time_Lengths]

	var hex = ["#FF0000","#FF5900","#FF7100","#FFB100","#D7EC0C","#58D76E","#58D76E","#58D76E","#58D76E","#58D76E","#1646B5","#9508B3","#CC061D","#CC061D"]
	//var labels = ['N=1000','N=2000','N=3000','N=4000','N=5000','N=6000','N=7000','N=8000','N=9000','N=10000','N=15000','N=20000','N=25000','N=30000']
	var traces = []
	for (var i = 0; i < plateNumbers.length; i++) {
		traces[i] = {
			x: Flow,
			//x: Ue_vals,
			y: Plate_Length[i],
			mode: 'lines',
			hoverinfo: 'none',
			line: {
				shape: 'spline',
				color: hex[i],
				dash: 'solid'
			}
		}
	}
	traces[plateNumbers.length]	= {
			x: Flow,
			//x: Ue_vals,
			y: L_Pressure,
			mode: 'lines',
			hoverinfo: 'none',
			line: {
				shape: 'spline',
				color: '#000000',
				dash: 'solid'
			}
		}

	//var hex2 = ["#BD00BD","#DB0077","#FF701B","#FFAA00","#68E600","#2307F2","#31C3C3"];
	var labels = ['1s','2s','5s','10s','20s','40s','80s'];
	for (i = 0; i < Time_Lengths.length; i++) {
		traces[plateNumbers.length + 1 + i]	= {
			x: Flow,
			//x: Ue_vals,
			y: Time_Lengths[i],
			//text: labels[i],
			hoverinfo: 'none',
			mode: 'lines+text',
			//text: labels[i],
			//textposition: 'right',
			font: {
				family: 'Arial',
				size: 16,
				color: '#000000'
			},
			line: {
				color: "#000000",
				//color: hex2[i],
				dash: 'dot'
			}
		}

	}

	var layout = {
  		title: 'Chromatographic Optimization Plot',
  		xaxis: {
    		range: [0, (Math.PI * (Math.pow((particle_dia * 0.5),2)) * Ue_value * epsilon_e)],
    		autorange: false,
    		//title: 'Interstitial Velocity (cm/s)'
    		title: 'Flow Rate (cubic centimers per second)'
  		},
  		yaxis: {
    		range: [0, Length_value],
    		autorange: false,
    		title: 'Column Length (centimeters)'
  		},
  		showlegend: false,
  		/*annotations: [
  			{
  				x:0.32,
  				y:Length_value,
  				xref:'x',
  				yref:'y',
  				text:'80 s',
  				showarrow: false,
  				ax: 0,
  				ay: -40
  			},
  			{
  				x:0.57,
  				y:Length_value,
  				xref:'x',
  				yref:'y',
  				text:'40 s',
  				showarrow: false,
  				ax: 0,
  				ay: -40
  			},
  			{
  				x:1.1,
  				y:Length_value,
  				xref:'x',
  				yref:'y',
  				text:'20 s',
  				showarrow: false,
  				ax: 0,
  				ay: -40
  			},
  			{
  				x:2.1,
  				y:Length_value,
  				xref:'x',
  				yref:'y',
  				text:'10 s',
  				showarrow: false,
  				ax: 0,
  				ay: -40
  			},
  			{
  				x:Ue_value,
  				y:11.5,
  				xref:'x',
  				yref:'y',
  				text:' 5 s',
  				showarrow: false,
  				ax: 0,
  				ay: -40
  			},
  			{
  				x:Ue_value,
  				y:4.8,
  				xref:'x',
  				yref:'y',
  				text:' 2 s',
  				showarrow: false,
  				ax: 0,
  				ay: -40
  			},
  			{
  				x:Ue_value,
  				y:2.5,
  				xref:'x',
  				yref:'y',
  				text:' 1 s',
  				showarrow: false,
  				ax: 0,
  				ay: -40
  			},*/

	};

	Plotly.newPlot('graph', traces, layout)

}

//function main(particleSize,Ue_value,Length_value,A_value,B_value,C_value,organic_type,percent_B,MW_value,Temp,epsilon_e,epsilon_i) {
function main(particleSize,Ue_value,Length_value,A_value,B_value,C_value,organic_type,percent_B,MW_value,Temp,epsilon_e,epsilon_i,max_pressure,particle_dia) {
	//calculateLength(conv_ParticleSize(particleSize),Ue_value,Length_value,A_value,B_value,C_value,organic_type,percent_B,MW_value,conv_Temp(Temp),epsilon_e,epsilon_i);
	calculateLength(conv_ParticleSize(particleSize),Ue_value,Length_value,A_value,B_value,C_value,organic_type,percent_B,MW_value,conv_Temp(Temp),epsilon_e,epsilon_i,max_pressure,particle_dia);
}
