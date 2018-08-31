const mongoose = require('mongoose');

const usuario = require('./modelUsuario.js')

mongoose.connect('mongodb://localhost:27017/agenda', function (err) {
 
    if (err) return console.log(err);
  
    console.log('Successfully connected');
});


var Usuario = new usuario ();

Usuario.usuario = 'rosy@gmail.com';
Usuario.nombre = 'Rosa';
Usuario.password = '123';
Usuario.fechaNacimiento = '1975-06-07';


Usuario.save((err) => {
        if(err) return console.log(err)

        console.log('Usuario guardado de nuevo!!!')
});

