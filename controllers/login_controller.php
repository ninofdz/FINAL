<?php

require_once("models/login_model.php");

class login_controller {

    function login() {
        $usuario = new login_model();

        $username = !empty($_POST['username']) ? $_POST['username'] : "";
        $password = !empty($_POST['password']) ? $_POST['password'] : "";

        $usuario->setUsuario($username);
        $usuario->setPassword($password);

        $ok = $usuario->verifyUser();

        if ($ok) {
            $_SESSION['usuario'] = $username;

            return true;
        } else {
            return false;
        }
    }

    function register(){

      $user = new login_model();

      $user->setUserName ($_POST['username']);
      $user->setPassword ($_POST['password']);
      $user->setName ($_POST['name']);
      $user->setEmail ($_POST['email']);
      $user->setAddress ($_POST['address']);
      $user->setPostalCode ($_POST['postalCode']);

      $user->insert_user();


    }

    function loginFailed() {
        $obj = array();
        $obj['message'] = "Error";
        $obj['openModel'] = "<script type='text/javascript'>
         $(document).ready(function(){
         $('#loginModal').modal('show');
         });
         </script>";
        return $obj;
        var_dump($obj);
      //  die;
    }

    function checkCart(){
        if(!empty($_SESSION['cart'])){

        }
    }

}

?>
