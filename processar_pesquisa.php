<?php

    //$estado = $_POST['id'];

	
		$cidades = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);
    
	
 
 			$data[] = "teste";


 			echo json_encode($data);

?>