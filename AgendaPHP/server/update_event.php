<?php
 
/* 
Autor: Zahid Guerrero
Proyecto Agenda PHP
Agosto 2018
 */

 //ACTUALIZA EL VENTO
 require('./conector.php');

 session_start();

 //valida sesion de usuario
 if (isset($_SESSION['username'])) {
   $con = new ConectorBD();

   //si se conecta... carga los datos del post y ejecuta la funcion para actualizar registro
   if ($con->initConexion()=='OK') {
     
     $data['id_evento'] = "'".$_POST['id']."'";
     $data['fechaInicio'] = "'".$_POST['start_date']."'";
     $data['fechaFin'] = "'".$_POST['end_date']."'";
     //$data['horaInicio'] = "'".$_POST['start_hour']."'";
     //$data['horaFin'] = "'".$_POST['end_hour']."'";

     //valida actualizacion de registro
     if ($con->actualizarRegistro('eventos', $data, "id_evento=".$_POST['id'])) {
       $response['msg']= 'OK';
     }else {
       $response['msg']= 'No se pudo actualizar los datos';
     }
     
   }else {
     $response['msg']= 'No se pudo conectar a la base de datos';
   }
 }else {
   $response['msg']= 'No se ha iniciado una sesión';
 }

//regresa respuesta como JSON
echo json_encode($response,JSON_FORCE_OBJECT);


$con->cerrarConexion();


 ?>
