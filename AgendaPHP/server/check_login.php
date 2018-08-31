
<!--  
Autor: Zahid Guerrero
Proyecto Agenda PHP
Agosto 2018

 -->

<?php

//importar conector
require('./conector.php');

//instancia conector
$con = new ConectorBD();

//revisa conexion y valida usuario
if ($con->initConexion()=='OK') {

  
    //$php_response['msg'] = 'OK';

    $passw=$_POST["password"];
    $email=$_POST["username"];
    
    $resul=$con->datosUsuario($email);
    
      while ($rows = $resul->fetch_array()) {
         
        if(password_verify($passw,$rows["password"])) {
          session_start();
          $_SESSION['username'] = $rows["email"];
          $_SESSION['id_usuario'] = $rows["id_usuario"];
          $php_response=array("msg"=>"OK","data"=>"2");   
        }else{
          $php_response=array("msg"=>"NO existe el Usuario","data"=>"2"); 
        }
        echo json_encode($php_response,JSON_FORCE_OBJECT);
      }

}

 $con->cerrarConexion();

 ?>
