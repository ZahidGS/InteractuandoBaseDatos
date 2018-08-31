<?php

require_once "conexion.php";

$obj=new conectar();
$conexion=$obj->conexion();

$email1 = 'roxy@hotmail.com';
$nombre1 = 'Roxana Yañez';
$password1 = password_hash('roxy123', PASSWORD_DEFAULT);
$fecha1 = '2000-05-13';

//echo $password1;

$email2 = 'yady@gmail.com';
$nombre2 = 'Yadira Perez';
$password2 = password_hash('yady123', PASSWORD_DEFAULT);
$fecha2 = '1960-09-06';

$email3 = 'naty@hotmail.com';
$nombre3 = 'Natalia Reyes';
$password3 = password_hash('naty123', PASSWORD_DEFAULT);
$fecha3 = '2002-02-21';

$sql="INSERT into usuarios (email, nombreCompleto, password, fechaNacimiento)
                    values ('$email1',
                            '$nombre1',
                            '$password1', 
                            '$fecha1'),
                            ('$email2',
                            '$nombre2',
                            '$password2', 
                            '$fecha2'),
                            ('$email3',
                            '$nombre3',
                            '$password3', 
                            '$fecha3')
                            ";

$result = mysqli_query($conexion,$sql);

if ($result==1) {
    echo 'insertados con exito';
} else {
    echo 'algo te falló mi buen!!';
}

 ?>
