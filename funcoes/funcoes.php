<?php 

function teste($variavel){

		if (!isset($variavel) || empty($variavel)) {
			
			$var = "a";
		}
		  	else{
		  		$var = $variavel;
		  	}

		  	return $var;

	} // function


?>