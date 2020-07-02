<?php
    /* user model */ 
    class User_Model extends DB {

        protected $_table = 'user';

        public function user_login($data){
              
            try {
                $stmt = $this->DB_con->prepare("SELECT * FROM user WHERE email = :email");
                $stmt->bindValue(':email', $data["email"]);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_OBJ);
                $total_res = $stmt->rowCount();

                if($total_res > 0){
                    if(isset($user) && password_verify($data["password"],$user->password)){ 
                        $_SESSION['id'] = $user->id;
                        $_SESSION['name'] = $user->name;
                        $_SESSION['company'] = $user->company;
                        $_SESSION['phone'] = $user->phone;
                        $_SESSION['email'] = $user->email;
                        $_SESSION['created_on'] = $user->created_on;
                        return true;
                    }
                   
                
                 } return false;
               
            } catch(PDOException $e) {
                die("Query Error: ". $e->getMessage());
            }
        }

        
        public function isloggedin(){
            if(isset($_SESSION['id'])) {
                return true;
            }
            return false;
        }
 
        public function redirect($url){
            header("Location: $url");
        }//end for redirect method
    }
    
