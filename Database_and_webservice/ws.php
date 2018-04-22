<?php

	$conn = new mysqli("localhost", "root", "", "places");
	$conn->set_charset("utf8");

	
	$path_params = explode('/', trim($_SERVER['PATH_INFO']));
	
	
	switch($_SERVER['REQUEST_METHOD'] ) {

		case 'GET':
			if(isset($path_params[1])){
				if($path_params[1] == "places"){
					$sql="select * from place";
					if (isset($path_params[2]) && is_numeric($path_params[2])){  // id
						$sql.= " where id=" . $path_params[2];
					} 
				
					//$list=[];
					$result=$conn->query($sql);
					while($row = $result->fetch_assoc()){
						$list[]=$row;
					}
					
					/*print "<pre>";
					print_r ($list);
					print "</pre>";*/
					
					header('Content-Type: application/json');
					print json_encode($list, JSON_UNESCAPED_UNICODE);
					
				} 	
				

			} 

			break;
			
		case 'POST':
			echo 'POST metodo';
			$input = json_decode(file_get_contents('php://input'),true);

			break;
		case 'PUT':	
			echo 'PUT metodo';
			$input = json_decode(file_get_contents('php://input'),true);

			break;
		case 'DELETE':	
			echo 'DELETE metodo';
			if (isset($path_params[2]) && is_numeric($path_params[2])){  // id

			
			} else {
				print "error no id";
			} 
			break;
		default: 
			echo "places service";
	}
	
	// GET
	// Retrieve all places with a GET from URI http://localhost/services/ws.php/places
	// Retrieve one user with a GET from URI http://localhost/services/ws.php/places/1
	
	// POST INSERT http://localhost/services/ws.php/places ou sem places
	
	// put UPDATE URI http://localhost/services/ws.php/places/1
	
	// DELETE delete URI http://localhost/services/ws.php/places/1


?>

	