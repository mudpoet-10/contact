<?php
	include ROOT.DS.'models'.DS."publicModels.php";
    /*note to dev:  this is for overwriting browser CORS ROLE*/
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST');
    header("Access-Control-Allow-Headers: X-Requested-With");
    /*end of overwriting browser CORS ROLE*/
 
	$user = new User_Model();

	error_reporting( ~E_NOTICE );
	if (isset($_POST['delete_user'])) {
			
			$userID = $_POST['btnDelete'];

			$where = array(
 				"id" => $userID
			);

			 if ($user->delete($where)) {
		        echo json_encode(array(
		                "success" => true
		            ));
		            return false;
		            
		      } else {
		        echo json_encode(array(
		                "success" => false
		            ));
		            return false;
		      }

			
	}
?>
