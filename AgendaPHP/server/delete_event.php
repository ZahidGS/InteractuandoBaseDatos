<?php

/* 
Autor: Zahid Guerrero
Proyecto Agenda PHP
Agosto 2018
 */

 // ELIMINA EL EVENTO SELECCIONADO
require('./conector.php');

session_start();


if (isset($_SESSION['username'])) {
  $con = new ConectorBD();
  if ($con->initConexion()=='OK') {

    if ($con->eliminarRegistro('eventos', "id_evento=".$_POST['id'])) {
      $response['msg']= 'OK';
    }else {
      $response['msg']= 'No se pudo eliminar los datos';
    }
    
  }else {
    $response['msg']= 'No se pudo conectar a la base de datos';
  }
}else {
  $response['msg']= 'No se ha iniciado una sesión';
}


echo json_encode($response,JSON_FORCE_OBJECT);

$con->cerrarConexion();

 ?>
