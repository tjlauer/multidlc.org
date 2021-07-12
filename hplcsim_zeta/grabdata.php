<?php

/**
     * Rounding to significant digits ( just like JS toPrecision() )
     *
     * @number <float> value to round
     * @sf <int> Number of significant figures
     */
    function toPrecision($number, $sf) 
	{
          // How many decimal places do we round and format to?
		  if ($number == 0)
		  	return "0";
          $dp = ceil($sf - log10(abs($number)) - 1);

          // Round as a regular number.
          $numberFinal = round($number, $dp);
		  
          //If the original number it's half up rounded, don't need the last 0
          $arrDecimais=explode('.',$numberFinal);
           $valorFinal=str_replace(',', '', number_format($numberFinal, $dp));
		  
		  return $valorFinal;
    } 
	
	$column_data = array();

	$handle = fopen($_SERVER['DOCUMENT_ROOT'].'/hplcsim_zeta/LSS_Coefficients.csv', "r");
	$linenum = 0;

	while (!feof($handle))
	{
		$linenum++;
		$string = fgets($handle);

		// Get rid of the first line (just the column headers)
		if ($linenum == 1)
			continue;
		
		// Put the data into an array
		$row_array = str_getcsv($string);
		if ($row_array[0] == '')
			break;

		$column_data[$linenum]["Column"] = $row_array[0];
		$column_data[$linenum]["Solvent_A"] = $row_array[1];
		$column_data[$linenum]["Solvent_B"] = $row_array[2];
		$column_data[$linenum]["CompPerc_Min"] = $row_array[3];
		$column_data[$linenum]["CompPerc_Max"] = $row_array[4];
		$column_data[$linenum]["Temp_Min"] = $row_array[5];
		$column_data[$linenum]["Temp_Max"] = $row_array[6];
		$column_data[$linenum]["Compound"] = $row_array[7];
		$column_data[$linenum]["lnkw_intercept"] = $row_array[8];
		$column_data[$linenum]["lnkw_slope"] = $row_array[9];
		$column_data[$linenum]["S_intercept"] = $row_array[10];
		$column_data[$linenum]["S_slope"] = $row_array[11];
   }
   fclose($handle);

?>