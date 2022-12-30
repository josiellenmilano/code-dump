<?php
/*
* Function to create a username based on full name.
* @param string $fullName
* @return string without accents and special characters except hífen character (firstname-lastname)
*/
function createUsername($fullName) {
	// replace character accents
	$string = preg_replace('~&([a-z]{1,2})(acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($fullName, ENT_QUOTES, 'UTF-8'));

	// remove special characters
	$string = trim(preg_replace('/[^A-Za-z0-9 ]/', '', $string)); // keep the spaces except in the beginning and end

	// split the content of $string
	$arrayString = explode(" ",$string);

	// get the first item in array
	$stringFistVal =  array_shift($arrayString); 

	// get the last item in array
	$stringLastVal = array_pop($arrayString);

	// concatenate the first and last items and convert to lowercase
	$concatFirstLastVal = strtolower(implode("-",array($stringFistVal, $stringLastVal)));

	// return the usarname
	return $concatFirstLastVal;
}
