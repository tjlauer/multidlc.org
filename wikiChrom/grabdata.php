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

	$handle = fopen($_SERVER['DOCUMENT_ROOT'].'/wikiChrom/database.csv', "r");
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

		$column_data[$linenum]["id"] = $row_array[0];
		$column_data[$linenum]["analyte"] = $row_array[1];
		$column_data[$linenum]["abbreviation"] = $row_array[2];
		$column_data[$linenum]["cas"] = $row_array[3];
		$column_data[$linenum]["dataset_id"] = $row_array[4];
		$column_data[$linenum]["mechanism"] = $row_array[5];
		$column_data[$linenum]["manufacturer"] = $row_array[6];
		$column_data[$linenum]["brand"] = $row_array[7];
		$column_data[$linenum]["stationary_phase"] = $row_array[8];
		$column_data[$linenum]["pore_size"] = $row_array[9];
		$column_data[$linenum]["particle_size"] = $row_array[10];
		$column_data[$linenum]["a_solvent"] = $row_array[11];
		$column_data[$linenum]["b_solvent"] = $row_array[12];
		$column_data[$linenum]["composition"] = $row_array[13];
		$column_data[$linenum]["temperature"] = $row_array[14];
		$column_data[$linenum]["midpoint_pressure"] = $row_array[15];
		$column_data[$linenum]["retention_factor"] = $row_array[16];
		$column_data[$linenum]["SD_k"] = $row_array[17];
		$column_data[$linenum]["n_k"] = $row_array[18];
   }
   fclose($handle);
    
?>