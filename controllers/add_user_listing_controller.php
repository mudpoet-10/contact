<?php 
    include ROOT.DS.'models'.DS."publicModels.php";
    /*note to dev:  this is for overwriting browser CORS ROLE*/
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    /*end of overwriting browser CORS ROLE*/

    date_default_timezone_set('Asia/Manila');
    $user = new User_Model();

	error_reporting( ~E_NOTICE );
	if (isset($_POST['add_user'])) {

        $email = $_POST['email'];
		    $option = ['cost' => 11];
        $password_hash = password_hash($_POST['password'], PASSWORD_BCRYPT, $option);
        $created_on = date("Y-m-d H:i:s"); 

	    $data = [
        'name' => $_POST['name'],
        'company' => $_POST['company'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'password' => $password_hash,
        'created_on' => $created_on
      ]; 

      $where = array(
          "email" => $_POST['email'],
      );

      $usrEml = $user->getBy($where);
      
      if ($usrEml[0]->email == $email) {
        echo json_encode(array(
                "success" => false
            ));
            return false;
            
      } else {
        $user->insert($data);

        echo json_encode(array(
            "success" => true
        ));
        return false;
      }
      
	}
?>
