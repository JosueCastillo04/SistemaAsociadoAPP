<?php
    require_once "../model/loginModel.php";
    $loginModel = new LoginModel();
       
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
       
        session_start();
        unset($_SESSION['user']);
        
        session_destroy();
        echo "listo";


    }else{
        $user = $_POST['user'];
        $pass  = $_POST['password'];
        if($user != null && $pass != null){
            $input=["user"=>$user,"passwd"=>$pass];
            if($loginModel->getSession($input)){
                session_start();
                $_SESSION['user'] = $input['user'];
                echo "entro";
            }else{
                echo " no entro";
            }
        }
    }
    
    
    

    
        
    


?>