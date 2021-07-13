/* Changelog - HPLC Simulator - Ray J.R. Sajulga, Dwight Stoll
	
	08/29/2017
		+Changelog created
		
		+Added 'fail safes' to textbox inputs to prevent infinite loops
			++Created function 'checkIfValid(variable, value)'
				Checks if the value is either blank OR zero
					If it is blank or zero
						Return a preset 'Default' value
					If it is not blank or zero
						Return the original value

			++Created function 'checkIfValid_blank(variable, value)'
				Checks if the value is blank
					If it is blank
						Return a preset 'Default' value
					If it is not blank
						Return the original value
*/