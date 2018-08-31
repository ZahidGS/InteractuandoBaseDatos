<?php
 

 require('./conector.php');

 session_start();

 
 if (isset($_SESSION['username'])) {
   $con = new ConectorBD();
   if ($con->initConexion()=='OK') {
     
     $data['id_evento'] = "'".$_POST['id']."'";
     $data['fechaInicio'] = "'".$_POST['start_date']."'";
     $data['fechaFin'] = "'".$_POST['end_date']."'";
     //$data['horaInicio'] = "'".$_POST['start_hour']."'";
     //$data['horaFin'] = "'".$_POST['end_hour']."'";

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


echo json_encode($response,JSON_FORCE_OBJECT);




 ?>
