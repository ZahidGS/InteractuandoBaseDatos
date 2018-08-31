<?php
  
//carga conexion y comienza sesion de usuario
  require('./conector.php');
  session_start();

  
  if (isset($_SESSION['username'])) {
    $con = new ConectorBD();
    if ($con->initConexion()=='OK') {
      
      //crea el objeto array...
      $eventos = array();
      
      //obtiene ID de usuario
      $iduser = $_SESSION['id_usuario'];
      
      
      //obtiene los datos de la BD
      $resultado = $con->getEventosUser($iduser);

      //captura en la respuesta los datos relacionados
       while($fila = $resultado->fetch_assoc()){

        $id = $fila['id_evento'];
        $title = $fila['titulo'];
        $start = $fila['fechaInicio']." ".$fila['horaInicio'];
        $allDay = $fila['diaCompleto'];
        $end = $fila['fechaFin']." ".$fila['horaFin'];

        $eventos['eventos'][] = array('id' => $id, 'title' => $title, 'start' => $start, 'end' => $end);

      }
 
      $eventos['msg'] = 'OK';
      echo json_encode($eventos);
       
    }else {
      $response['msg']= 'No se pudo conectar a la base de datos';
    }
  }else {
    $response['msg']= 'No se ha iniciado una sesión';
  }



 ?>
