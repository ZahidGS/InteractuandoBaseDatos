<?php
session_start();
include_once 'php_mysql.php';

$obCon=new ConectorBD();

$Mensaje["msg"]=$obCon->initConexion("agenda");

if($Mensaje["msg"]=="OK"){
    $eventos = array();
    $idUser=$_SESSION["idUser"];
    $sql="SELECT * FROM eventos WHERE idUser='$idUser'";
    $Consulta=$obCon->Query($sql);
    while($DatosEventos=$Consulta->fetch_assoc()){
        $id=$DatosEventos["ID"];
        $title=$DatosEventos["Titulo"];
        $start = $DatosEventos['FechaInicio']." ".$DatosEventos['HoraInicio'];
        $end = $DatosEventos['FechaFin']." ".$DatosEventos['HoraFin'];
        $eventos["eventos"][] = array('id' => $id, 'title' => $title, 'start' => $start, 'end' => $end);
    }
    
    $eventos["msg"]="OK";
    echo json_encode($eventos);
    
}else{
    $Mensaje["msg"]="No se pudo conectar a la Base de datos";
    print(json_encode($Mensaje));
}


 ?>