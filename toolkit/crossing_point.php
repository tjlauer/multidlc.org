<?php
	$local_root = 'http://' . $_SERVER['SERVER_NAME'];	
	$selected_tab = 5;
	include($_SERVER['DOCUMENT_ROOT'].'/scaffold/header.php');
?>

<main>
						<div id="description">
							<h1 id="page-title">Crossing Point Calculator</h1>
							<p>Adjust the numbers in the field to determine the crossing point for your data</p>
						<hr>
						</hr>
						</div>
						<div id="content">
<div id='crossing-point'>

			<form onsubmit='return calculate()'>
			<table id = "calculator">
					<thead>
						<td colspan='2'><b>Input</b></td>
						<td></td>
						<td colspan='2'><b>Output</b></td>
					</thead>
					<tr>
						<td colspan='5'>
							<select id="operator">
								<option value="secs">sec</option>
								<option value="min">min</option>
							</select>
						</td>
					</tr>
					<tr>
						<td title="?m">dp<sub>1</sub>(?m):</td>
						<td>
						<input type="text" id="dp1" name="dp1" value="1.8" style="width:50px;"/>
						</td>
						<td> |||</td>
						<td class='output'> Crossover time:</td>
						<td>
						<input type="text" id="ct" name="ct" style="width:50px;" />
						</td>

					</tr>
					<tr>
						<td title="?m">dp<sub>2</sub>(?m):</td>
						<td>
						<input type="text" id="dp2" name="dp2" value="3" style="width:50px;"/>
						</td>
						<td> |||</td>
						<td  class='output'> Crossover plate height:</td>
						<td>
						<input type="text" id="cph" name="cph" style="width:50px;"/>
						</td>
					</tr>
					<tr>
						<td style="font-weight:bold;font-size:14px;background:#FDBD2D;">van Deemter Coefficients </td><td></td>
						<td> |||</td>
						<td  class='output'> Crossover plate count:</td>
						<td>
						<input type="text" id="cpc" name="cpc" style="width:50px;"/>
						</td>
					</tr>
					<tr>
						<td>A:</td>
						<td>
						<input type="text" id="A" name="A" value="1.0" style="width:50px;"/>
						</td>
						<td> |||</td>
						<td  class='output'> Column length (1):</td>
						<td>
						<input type="text" id="cl1" name="cl1" style="width:50px;"/>
						</td>
					</tr>
					<tr>
						<td>B:</td>
						<td>
						<input type="text" id="B" name="B" value="5.0" style="width:50px;" />
						</td>
						<td> |||</td>
						<td  class='output'> Column length (2):</td>
						<td>
						<input type="text" id="cl2" name="cl2" style="width:50px;"/>
						</td>
					</tr>
					<tr>
						<td>C:</td>
						<td>
						<input type="text" id="C" name="C" value="0.050" style="width:50px;"/>
						</td>
						<td> |||</td>
						<td  class='output'> N (K-S):</td>
						<td>
						<input type="text" id="NKS" name="NKS" style="width:50px;"/>
						</td>
					</tr>
					<tr>
						<td style="font-weight:bold;font-size:14px;background:#FDBD2D;">Column Properties</td><td></td>
						<td> |||</td>
						<td style="color:red;font-weight:bold;"> % Loss in N relative to K-S:</td>
						<td>
						<input type="text" id="lossKS" name="lossKS" style="width:50px;" />
						</td>
					</tr>
					<tr>
						<td title="F">Flow resistance parameter (&Phi;):</td>
						<td>
						<input type="text" id="frp" name="frp" value="500" style="width:50px;"/>
						</td>
						<td> |||</td>
						<td  class='output'> u<sub>e1</sub> (cm/s):</td>
						<td>
						<input type="text" id="ue1" name="ue1" style="width:50px;"/>
						</td>
					</tr>
					<tr>
						<td>Intraparticle porosity (&epsilon;<sub>i</sub>):</td>
						<td>
						<input type="text" id="ei" name="ei" value="0.30" style="width:50px;"/>
						</td>
						<td> |||</td>
						<td  class='output'> u<sub>e2</sub> (cm/s):</td>
						<td>
						<input type="text" id="ue2" name="ue2" style="width:50px;"/>
						</td>
					</tr>
					<tr>
						<td>Interstitial porosity (&epsilon;<sub>e</sub>):</td>
						<td>
						<input type="text" id="ee" name="ee" value="0.38" style="width:50px;"/>
						</td>
						<td> |||</td>
						<td  class='output'> Reduced velocity (1):</td>
						<td>
						<input type="text" id="rv1" name="rv1" style="width:50px;"/>
						</td>
					</tr>
					<tr>
						<td>Internal diameter (mm)</td>
						<td>
						<input type="text" id="mm" name="mm" value="2.1" style="width:50px;"/>
						</td>
						<td> |||</td>
						<td  class='output'> Reduced velocity (2):</td>
						<td>
						<input type="text" id="rv2" name="rv2" style="width:50px;"/>
						</td>
					</tr>
					<tr>
						<td style="font-weight:bold;font-size:14px;background:#FDBD2D;">Conditions</td><td></td>
						</td>
						<td> |||</td>
						<td  class='output' title="mL/min"> Flow rate (1) (mL/min):</td>
						<td>
						<input type="text" id="fr1" name="fr1" style="width:50px;"/>
						</td>
					</tr>
					<tr>
						<td>Maximum pressure (bar)</td>
						<td>
						<input type="text" id="bar" name="bar" value="1200" style="width:50px;"/>
						</td>
						<td> |||</td>
						<td  class='output' title="mL/min"> Flow rate (2) (mL/min):</td>
						<td>
						<input type="text" id="fr2" name="fr2" style="width:50px;"/>
						</td>
					</tr>
					<tr>
						<td title="%ACN, 0-1 scale">Mobile phase composition</td>
						<td>
						<input type="text" id="mpc" name="mpc" value="0.40" style="width:50px;"/>
						</td>
						<td> |||</td>
						<td  class='output' title="cP"> Viscosity:</td>
						<td>
						<input type="text" id="viscosity" name="viscosity" style="width:50px;"/>
						</td>
					</tr>
					<tr>
						<td>Temperature (?C)</td>
						<td>
						<input type="text" id="temp" name="temp" value="40" style="width:50px;"/>
						</td>
						<td> |||</td>
						<td  class='output' title="cm?/s"> Diffusion coefficient:</td>
						<td>
						<input type="text" id="Dc" name="Dc" style="width:50px;"/>
						</td>
					</tr>
					<tr>
						<td>Column diameter (mm)</td>
						<td>
						<input type="text" id="cd" name="cd" value="2.1" style="width:50px;"/>
						</td>
						<td> |||</td>
						<td  class='output' title="cm?/s"> &epsilon;T:</td>
						<td>
						<input type="text" id="eT" name="eT" style="width:50px;"/>
						</td>
					</tr>
					<tr>
						<td>Solute Molecular Weight (g/mol)</td>
						<td>
						<input type="text" id="smw" name="smw" value="200" style="width:50px;"/>
						</td>
						<td> |||</td>
						<td  class='output' title="cm?/s"> &lambda;:</td>
						<td>
						<input type="text" id="lambda" name="lambda" style="width:50px;"/>
						</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td> |||</td>
						<td  class='output' title="cm?/s">&amp;</td>
						<td>
						<input type="text" id="psi" name="psi" style="width:50px;"/>
						</td>
					</tr>
					<tr>
						<td></td>
						<td class='submit_button' colspan='5'>
						<input type="submit" value="Submit"/>
					</tr>
				</table>
				</form>
</div>
<hr></hr>
<div id="return">
	<a id='return' href='tools.php'>Return to toolkit</a>
</div>
						</div>
</main>

<?php
	include($_SERVER['DOCUMENT_ROOT'].'/scaffold/footer.php');
?>

<script>
function calculate() {
    try {
        var ei = parseFloat(validate(document.getElementById("ei").value.trim()));
        var ee = parseFloat(validate(document.getElementById("ee").value.trim()));
	var mpc = parseFloat(validate(document.getElementById("mpc").value.trim()));
	var temp = parseFloat(validate(document.getElementById("temp").value.trim()));
	var bar = parseFloat(validate(document.getElementById("bar").value.trim()));
	var smw = parseFloat(validate(document.getElementById("smw").value.trim()));
	var dp1 = parseFloat(validate(document.getElementById("dp1").value.trim()));
	var dp2 = parseFloat(validate(document.getElementById("dp2").value.trim()));
	var A = parseFloat(validate(document.getElementById("A").value.trim()));
	var B = parseFloat(validate(document.getElementById("B").value.trim()));
	var C = parseFloat(validate(document.getElementById("C").value.trim()));
	var frp = parseFloat(validate(document.getElementById("frp").value.trim()));	
	var mm = parseFloat(validate(document.getElementById("mm").value.trim()));
	var eT = ee + ei * (1 - ee);
	var K = 273.15 + temp;
        document.getElementById("eT").value = eT.toFixed(3);
	var lambda = ee / eT;
	document.getElementById("lambda").value = lambda.toFixed(3) ;
	var viscosity = Math.pow(Math.E,mpc*(-3.476+726/K)+(1-mpc)*(-5.414+1566/K)+mpc*(1-mpc)*(-1.762+929/K));
	document.getElementById("viscosity").value = viscosity.toFixed(3);
	var psi = Math.pow((100000*bar/(frp*0.001*viscosity*lambda)),.5);
	document.getElementById("psi").value = psi.toFixed(3);
	var Dc = 0.000000074*Math.pow((mpc*1*41+(1-mpc)*2.6*18),.5)*K/(viscosity*Math.pow((smw/1),0.6));
	var fixedDc = parseFloat(Dc.toPrecision(3));
	document.getElementById("Dc").value = fixedDc.toExponential();
	var ue2 = Math.pow(B/C,.5)*Dc/(dp1/10000);
	document.getElementById("ue2").value = ue2.toFixed(3);
	var ue1 = Math.pow(B/C,.5)*Dc/(dp2/10000);
	document.getElementById("ue1").value = ue1.toFixed(3);
	var fr2 = 60*ue2*Math.PI*(mm/10/2)*(mm/10/2)*ee;
	var fr1 = 60*ue1*Math.PI*(mm/10/2)*(mm/10/2)*ee;
	document.getElementById("fr2").value = fr2.toFixed(3);
	document.getElementById("fr1").value = fr1.toFixed(3);
	var rv1 = ue1*(dp1/10000)/Dc;
	document.getElementById("rv1").value = rv1.toFixed(3);
	var rv2 = ue2*(dp2/10000)/Dc;
	document.getElementById("rv2").value = rv2.toFixed(3);
	var ct = Math.pow(psi * (dp1/10000)*((dp2/10000)/Dc),2) * (C/B);
	if (document.getElementById("operator").value == 'min') {
		ct = ct / 60;
	}
	document.getElementById("ct").value = ct.toFixed(3);
	var cph = A + B / rv1 + C * rv1;
	document.getElementById("cph").value = cph.toFixed(3);
	var cl1 = lambda * psi * psi * (dp1/10000) * (dp1/10000) * (dp2/10000)/(Dc*Math.pow(B/C,.5));
	document.getElementById("cl1").value = cl1.toFixed(3);
	var cpc = cl1 / (cph * (dp1/10000));
	document.getElementById("cpc").value = cpc.toFixed(3);
	var cl2 = psi * lambda * (dp2/10000) * Math.pow(ct,.5);
	document.getElementById("cl2").value = cl2.toFixed(3);
	var NKS = Math.pow(100000*bar*lambda*ct/frp/(viscosity/1000),.5) * (1/(A+2*Math.pow(B*C,.5)));
	document.getElementById("NKS").value = NKS.toFixed(3);
	var lossKS = (100 * (cpc-NKS) / NKS);
	document.getElementById("lossKS").value = lossKS.toFixed(3);
    } catch (err) {
        alert("There was a problem: " + err.messaqge);
    }
    return false;
}

function sigFigs(n) {
    return Math.round(n * 1000) / 1000;
}

function validate(value) {
    if (value == null || value == "") {
        alert("Required Field");
        return 0;
    } else if (isNaN(value)) {
        alert("Must be a Number Field");
        return 0;
    } else return value;
}
		</script>