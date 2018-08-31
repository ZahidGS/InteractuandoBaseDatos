<?php

/* 
Autor: Zahid Guerrero
Proyecto Agenda PHP
Agosto 2018
 */

    //configura la conexion
    class conectar{
        public function conexion(){
            $conexion=mysqli_connect('localhost','root','','agenda');

            return $conexion;
        }
    }

?>