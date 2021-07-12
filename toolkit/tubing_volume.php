<?php
	$local_root = 'http://' . $_SERVER['SERVER_NAME'];	
	$selected_tab = 5;
	include($_SERVER['DOCUMENT_ROOT'].'/scaffold/header.php');
?>

<main>
						<div id="description">
							<h1 id="page-title">Tubing Volume Calculator</h1>
							<p>Fill in the empty fields to determine the volume of your tubing</p>
						<hr>
						</hr>
						</div>
						<div id="content">
<div id='tubing-calculator'>
<form onsubmit='return calculate();'>
	<table id="input">
		<tr>
			<td colspan='3'><h2>Input</h2></td>
		</tr>
    		<tr>
        		<td>Length:</td>
        		<td>
           			 	<input type="text" id="value1" name="value1" />
        		</td>
        		<td>
            			<select id="operator1">
                			<option value="millimeter">mm</option>
                			<option value="centimeter">cm</option>
                			<option value="inch">in</option>
            			</select>
        		</td>
    		</tr>
    		<tr>
        		<td>Diameter: </td>
        		<td>
		            <input type="text" id="value2" name="value2" />
		        </td>
		        <td>
		            <select id="operator2">
				<option value="micrometer">&#956;m</option>
		                <option value="millimeter">mm</option>
		                <option value="centimeter">cm</option>
		                <option value="inch">in</option>
		            </select>
		        </td>
		    </tr>
		<tr>
			<td>
			<input type='submit' value='Submit'/>
			</td>
			<td></td>
			<td>
			<input type="reset" id="btn_res" name="btn_res" value="Reset" />
			</td>
		</tr>
	</table>
<table id="output">
    <tr>
	<td colspan='3'><h2>Output</h2></td>
    <tr>
        <td>Volume:</td>
        <td>
            <input type="text" id="result" name="result" />
        </td>
        <td>
            <select id="operator3">
                <option value="milliliter">mL</option>
                <option value="microliter">&#956;L</option>
            </select>
        </td>
    </tr>
</table>
</form>
</div>
<hr></hr>
<div id="return">
	<a id='return' href='../toolkit/tools.php'>Return to toolkit</a>
</div>
						</div>
</main>

<?php
	include($_SERVER['DOCUMENT_ROOT'].'/scaffold/footer.php');
?>

<script>

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