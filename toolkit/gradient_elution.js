function conv_dead_volume(dead_volume) {
	return dead_volume / 1000;
}

function calculate_retention(flow_rate,dead_volume,gradient_time,b_initial,b_final) {
	flow_rate = parseFloat(flow_rate)
	dead_volume = parseFloat(dead_volume)
	gradient_time = parseFloat(gradient_time)
	b_initial = parseFloat(b_initial)
	b_final = parseFloat(b_final)

	var t0 = 0.347
	var dwell_time = dead_volume / flow_rate

	var S_AP2 = 17.935012;
	var S_AP3 = 21.8674653;
	var S_AP4 = 10.7640032;
	var S_AP5 = 14.0356301;
	var S_PB4 = 8.39434301;

	var lnkw_AP2 = 4.51385085;
	var lnkw_AP3 = 6.89958296;
	var lnkw_AP4 = 5.77604964;
	var lnkw_AP5 = 7.32158562;
	var lnkw_PB4 = 6.40424266;

	var k0_1 = Math.EXP(lnkw_AP2-(b_initial*S_AP2));
	var k0_2 = Math.EXP(lnkw_AP3-(b_initial*S_AP3));
	var k0_3 = Math.EXP(lnkw_AP4-(b_initial*S_AP4));
	var k0_4 = Math.EXP(lnkw_AP5-(b_initial*S_AP5));
	var k0_5 = Math.EXP(lnkw_PB4-(b_initial*S_PB4));

	//gradient steepness
	var b1 = (S_AP2 * (b_final - b_initial) * dead_volume) / (flow_rate * gradient_time);
	var b2 = (S_AP3 * (b_final - b_initial) * dead_volume) / (flow_rate * gradient_time);
	var b3 = (S_AP4 * (b_final - b_initial) * dead_volume) / (flow_rate * gradient_time);
	var b4 = (S_AP5 * (b_final - b_initial) * dead_volume) / (flow_rate * gradient_time);
	var b5 = (S_PB4 * (b_final - b_initial) * dead_volume) / (flow_rate * gradient_time);
	//var k_average= 1/b
	var time1 = t0 + dwell_time + ((t0/b1)*LN((b1*(k0_1-(dwell_time/t0)))+1));
	var time2 = t0 + dwell_time + ((t0/b2)*LN((b2*(k0_2-(dwell_time/t0)))+1));
	var time3 = t0 + dwell_time + ((t0/b3)*LN((b3*(k0_3-(dwell_time/t0)))+1));
	var time4 = t0 + dwell_time + ((t0/b4)*LN((b4*(k0_4-(dwell_time/t0)))+1));
	var time5 = t0 + dwell_time + ((t0/b5)*LN((b5*(k0_5-(dwell_time/t0)))+1));

	var kf_1 = k0_1 / ((b1 * (k0_1 - (dwell_time / t0))) + 1);
	var kf_2 = k0_2 / ((b2 * (k0_2 - (dwell_time / t0))) + 1);
	var kf_3 = k0_3 / ((b3 * (k0_3 - (dwell_time / t0))) + 1);
	var kf_4 = k0_4 / ((b4 * (k0_4 - (dwell_time / t0))) + 1);
	var kf_5 = k0_5 / ((b5 * (k0_5 - (dwell_time / t0))) + 1);

	var p1 = b1 * (k0_1 / (k0_1 + 1));
	var p2 = b2 * (k0_2 / (k0_2 + 1));
	var p3 = b3 * (k0_3 / (k0_3 + 1));
	var p4 = b4 * (k0_4 / (k0_4 + 1));
	var p5 = b5 * (k0_5 / (k0_5 + 1));

	var G1 = (Math.pow((1 + p1 + ((Math.pow(p1,2))/3)),0.5)) / (1 + p1);
	var G2 = (Math.pow((1 + p2 + ((Math.pow(p2,2))/3)),0.5)) / (1 + p2);
	var G3 = (Math.pow((1 + p3 + ((Math.pow(p3,2))/3)),0.5)) / (1 + p3);
	var G4 = (Math.pow((1 + p4 + ((Math.pow(p4,2))/3)),0.5)) / (1 + p4);
	var G5 = (Math.pow((1 + p5 + ((Math.pow(p5,2))/3)),0.5)) / (1 + p5);

	var halfwidth1 = (2.35 * G1 *t0 * (1 + kf_1)) / (Math.pow(5000,0.5));
	var halfwidth2 = (2.35 * G2 *t0 * (1 + kf_2)) / (Math.pow(5000,0.5));
	var halfwidth3 = (2.35 * G3 *t0 * (1 + kf_3)) / (Math.pow(5000,0.5));
	var halfwidth4 = (2.35 * G4 *t0 * (1 + kf_4)) / (Math.pow(5000,0.5));
	var halfwidth5 = (2.35 * G5 *t0 * (1 + kf_5)) / (Math.pow(5000,0.5));

	var basewidth1 = (4 * halfwidth1) / 2.354;
	var basewidth2 = (4 * halfwidth2) / 2.354;
	var basewidth3 = (4 * halfwidth3) / 2.354;
	var basewidth4 = (4 * halfwidth4) / 2.354;
	var basewidth5 = (4 * halfwidth5) / 2.354;

	var ke_1 = k0_1 / ((b1 * k0_1) + 1);
	var ke_2 = k0_2 / ((b1 * k0_2) + 1);
	var ke_3 = k0_3 / ((b1 * k0_3) + 1);
	var ke_4 = k0_4 / ((b1 * k0_4) + 1);
	var ke_5 = k0_5 / ((b1 * k0_5) + 1);

	var times = [t0,time1,time2,time3,time4,time5];
	//var times = [0,1,2,3,4,5]
	var heights = [1,2,3,4,5,6]

	var traces = []
	/*for (var i = 0; i < times.length; i++) {
		traces[i] = {
			x: times[i],
			y: heights[i],
			mode: 'lines',
		}
	}*/

	var trace1 = {
		x: [t0,time1,time2,time3,time4,time5],
		y: [1,2,3,4,5,6],
		type: 'scatter',
	};

	var layout = {
		title: 'Gradient Elution',
		xaxis: {
			range: [0, 10],
			autorange: true,
			title: 'time (min)',
		},
		yaxis: {
			range: [0,300],
			autorange: true,
			title: 'Signal',
		},
		showlegend: false,
	};

	Plotly.newPlot("graph", trace1, layout);

}

function main(flow_rate,dead_volume,gradient_time,b_initial,b_final) {
	calculate_retention(flow_rate,conv_dead_volume(dead_volume),gradient_time,b_initial,b_final);
	//var time1 = t0 + dwell_time + ((t0/b1)*LN((b1*(k0_1-(dwell_time/t0)))+1));
	//return String(time1);
	//return "3";
}