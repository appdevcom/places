<?php

	$db = new mysqli("localhost", "root", "", "places");
	$db->set_charset("utf8");

	
	$path_params = explode('/', trim($_SERVER['PATH_INFO']));
	$input = json_decode(file_get_contents('php://input'),true);
	
	if ($input['name']){
		$name=$input['name'];
		$address=$input['address'];
		$latitude =$input['latitude'];
		$longitude=$input['longitude'];
		$description=$input['description'];
	}
	
	switch($_SERVER['REQUEST_METHOD'] ) {

		case 'GET':
			if(isset($path_params[1])){
				if($path_params[1] == "places"){
					$sql="select * from place";
					if (isset($path_params[2]) && is_numeric($path_params[2])){  // id
						$sql.= " where id=" . $path_params[2];
					} 

					$result=$db->query($sql);
					while($row = $result->fetch_assoc()){
						$list[]=$row;
					}
					
					/*print "<pre>";
					print_r ($list);
					print "</pre>";*/  // descomentar e comentar a linha com json_encode para testar o get
					
					header("Access-Control-Allow-Origin: *");  // allow cross origin
					header('Content-Type: application/json');
					print json_encode($list, JSON_UNESCAPED_UNICODE);
					
				} else {
					print "needs parameter 1";
				}	
				

			} 

			break;
			
		case 'POST':
			echo 'POST metodo: ';
			
			print "$name $address $latitude $longitude $description <br>\n";
			
			$sql="insert into place(name, address, latitude, longitude, description) 
			values ('$name', '$address', '$latitude', '$longitude', '$description') ";
			
			//print "$sql"; // debug
			
			$result=$db->query($sql);
			print "new register:" . $db->insert_id;

			break;
		case 'PUT':	
			echo 'PUT metodo: ';
			
			if (isset($path_params[2]) && is_numeric($path_params[2])){  // id
			
				$id=$path_params[2];
				print "$name $address $latitude $longitude $description $id<br>\n";
				
				$sql="update place set name='$name', address='$address', latitude='$latitude', longitude='$longitude', 
				description='$description' where id=$id";
				
				//print "$sql"; // debug
				
				$result=$db->query($sql);
				print "rows changed:" . $db->affected_rows;	
			
			} else {
				print "error no id";
			} 
			

			break;
		case 'DELETE':	
			echo 'DELETE metodo: ';
			if (isset($path_params[2]) && is_numeric($path_params[2])){  // id
				$id=$path_params[2];
				
				$sql="delete from place where id=$id";
				$result=$db->query($sql);
				print "rows changed:" . $db->affected_rows;
				
			
			} else {
				print "error no id";
			} 
			break;
		default: 
			echo "places service";
	}
	
	// call 
	// this is your installed dir: http://localhost/services/
	// it's possible to omit the extention ".php" in apache with mod_rewrite
	
	// GET
	// Retrieve all places with a GET from URI http://localhost/services/ws.php/places
	// Retrieve one user with a GET from URI http://localhost/services/ws.php/places/1
	
	// POST INSERT http://localhost/services/ws.php/places ou sem places
	
	// put UPDATE URI http://localhost/services/ws.php/places/1
	
	// DELETE delete URI http://localhost/services/ws.php/places/1


?>
