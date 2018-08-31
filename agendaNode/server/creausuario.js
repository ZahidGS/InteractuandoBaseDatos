/* 
Autor Zahid Guerrero
Agosto 2018
Proyecto agenda con NodeJS
 */

 
//importar mongoose y schema de usuario
const mongoose = require('mongoose');
const usuario = require('./modelUsuario.js')


//conexion a la Base de Datos
mongoose.connect('mongodb://localhost:27017/agenda', function (err) {
 
    if (err) return console.log(err);
  
    console.log('Successfully connected');
});

//instanciar usuario con el schema
var Usuario = new usuario ();

//agregar datos al usuario
Usuario.usuario = 'rosy@gmail.com';
Usuario.nombre = 'Rosa';
Usuario.password = '123';
Usuario.fechaNacimiento = '1975-06-07';


//guardar datos
Usuario.save((err) => {
        if(err) return console.log(err)

        console.log('Usuario guardado de nuevo!!!')
});

