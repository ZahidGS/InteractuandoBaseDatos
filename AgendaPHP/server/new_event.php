<?php

/* 
Autor: Zahid Guerrero
Proyecto Agenda PHP
Agosto 2018
 */

 //CREA NUEVO EVENTO

  require('./conector.php');

  session_start();

  //revisa sesion de usuario 
  if (isset($_SESSION['username'])) {
    $con = new ConectorBD();

    //si se conecta...
    if ($con->initConexion()=='OK') {
      
      $data['titulo'] = "'".$_POST['titulo']."'";
      $data['fechaInicio'] = "'".$_POST['start_date']."'";
      $data['diaCompleto'] = "'".$_POST['allDay']."'";
      $data['fechaFin'] = "'".$_POST['end_date']."'";
      $data['horaFin'] = "'".$_POST['end_hour']."'";
      $data['horaInicio'] = "'".$_POST['start_hour']."'";
      
      
      $email1 = $_SESSION['username'];
      
      $resultado = $con->getUser($email1);
      $fila = $resultado->fetch_assoc();
      $data['id_usuario'] = $fila['id_usuario'];

      
      //inserta los datos y valida su exito
      if ($con->insertData('eventos', $data)) {
        $response['msg']= 'OK';
      }else {
        $response['msg']= 'No se pudo realizar la inserción de los datos';
      }
      
    }else {
      $response['msg']= 'No se pudo conectar a la base de datos';
    }
  }else {
    $response['msg']= 'No se ha iniciado una sesión';
  }

//regresa la respuesta como JSON
 echo json_encode($response,JSON_FORCE_OBJECT);





 ?>
