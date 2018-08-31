<?php

/* 
Autor: Zahid Guerrero
Proyecto Agenda PHP
Agosto 2018
 */
//CIERRA SESION Y ENVIA AL FORMULARIO INDEX
session_start();

if (isset($_SESSION['username'])) {
  session_destroy();
  header('Location:../client/index.html');
}



 ?>
