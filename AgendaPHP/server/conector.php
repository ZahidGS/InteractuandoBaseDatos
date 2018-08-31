<?php


  class ConectorBD
  {
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $conexion;
    private $nombre_db='agenda';

    //inicia conexion
    function initConexion(){
      $this->conexion = new mysqli($this->host, $this->user, $this->password,$this->nombre_db);
      if ($this->conexion->connect_error) {
        return "Error:" . $this->conexion->connect_error;
      }else {
        return "OK";
      }
    }

    //crea nueva tabla
    function newTable($nombre_tbl, $campos){
      $sql = 'CREATE TABLE '.$nombre_tbl.' (';
      $length_array = count($campos);
      $i = 1;
      foreach ($campos as $key => $value) {
        $sql .= $key.' '.$value;
        if ($i!= $length_array) {
          $sql .= ', ';
        }else {
          $sql .= ');';
        }
        $i++;
      }
      return $this->ejecutarQuery($sql);
    }

    //muestra datos del usuario
    function datosUsuario($email){
      $sql="SELECT * FROM usuarios WHERE email='".$email."'";
      return $this->ejecutarQuery($sql);
    }

    //ejecuta la consulta
    function ejecutarQuery($query){
      return $this->conexion->query($query);
    }

    //cierra la conexion
    function cerrarConexion(){
      $this->conexion->close();
    }

    //crea nueva restriccion de usuarios
    function nuevaRestriccion($tabla, $restriccion){
      $sql = 'ALTER TABLE '.$tabla.' '.$restriccion;
      return $this->ejecutarQuery($sql);
    }

    //crea nueva relacion de llaves en dos tablas
    function nuevaRelacion($from_tbl, $to_tbl, $from_field, $to_field){
      $sql = 'ALTER TABLE '.$from_tbl.' ADD FOREIGN KEY ('.$from_field.') REFERENCES '.$to_tbl.'('.$to_field.');';
      return $this->ejecutarQuery($sql);
    }

    //inserta datos en una tabla
    function insertData($tabla, $data){
      $sql = 'INSERT INTO '.$tabla.' (';
      $i = 1;
      foreach ($data as $key => $value) {
        $sql .= $key;
        if ($i<count($data)) {
          $sql .= ', ';
        }else $sql .= ')';
        $i++;
      }
      $sql .= ' VALUES (';
      $i = 1;
      foreach ($data as $key => $value) {
        $sql .= $value;
        if ($i<count($data)) {
          $sql .= ', ';
        }else $sql .= ');';
        $i++;
      }

      return $this->ejecutarQuery($sql);

    }

    //realiza la conexion a la BD
    function getConexion(){
      return $this->conexion;
    }

    //actualiza registro
    function actualizarRegistro($tabla, $data, $condicion){
      $sql = 'UPDATE '.$tabla.' SET ';
      $i=1;
      foreach ($data as $key => $value) {
        $sql .= $key.'='.$value;
        if ($i<sizeof($data)) {
          $sql .= ', ';
        }else $sql .= ' WHERE '.$condicion.';';
        $i++;
      }
      return $this->ejecutarQuery($sql);
    }

    //elimina registro
    function eliminarRegistro($tabla, $condicion){
      $sql = "DELETE FROM ".$tabla." WHERE ".$condicion.";";
      return $this->ejecutarQuery($sql);
    }

    //crea una consulta 
    function consultar($tablas, $campos, $condicion = ""){
      $sql = "SELECT ";
      $ultima_key = end(array_keys($campos));
      foreach ($campos as $key => $value) {
        $sql .= $value;
        if ($key!=$ultima_key) {
          $sql.=", ";
        }else $sql .=" FROM ";
      }

      $ultima_key = end(array_keys($tablas));
      foreach ($tablas as $key => $value) {
        $sql .= $value;
        if ($key!=$ultima_key) {
          $sql.=", ";
        }else $sql .= " ";
      }

      if ($condicion == "") {
        $sql .= ";";
      }else {
        $sql .= $condicion.";";
      }

      return $this->ejecutarQuery($sql);
    }


    //obtiene datos del usuario
    function getUser($user){
      $sql = "SELECT id_usuario
              FROM usuarios
              WHERE email = '".$user."';";
      return $this->ejecutarQuery($sql);
    }

    //obtiene datos de los eventos por usuario
    function getEventosUser($user_id){
      $sql = "SELECT * FROM eventos 
                    WHERE id_usuario = ".$user_id.";";

      return $this->ejecutarQuery($sql);
    }


  }


 ?>
