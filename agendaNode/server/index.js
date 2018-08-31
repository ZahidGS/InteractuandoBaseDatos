/* 
Autor Zahid Guerrero
Agosto 2018
Proyecto agenda con NodeJS
 */

//importar librerias
const http = require('http'),
      express = require('express'),
      Routing = require('./rutas.js'),
      bodyParser = require('body-parser'),
      mongoose = require('mongoose');

//crear variables de entorno: puerto, app, server y url
const PORT = 8082
const app = express()
const Server = http.createServer(app)
const url = 'mongodb://localhost/agenda';

//conexion a la Base de Datos
mongoose.connect(url, function(err){
 
  if (err) return console.log(err);
  
  console.log('Successfully connected'); 
})


//uso de rutas
app.use(express.static('client'))
app.use(bodyParser.json())
app.use(bodyParser.urlencoded({ extended: true}))
app.use('/', Routing)


//activar servidor
Server.listen(PORT, function() {
  console.log('Server is running on port: ' + PORT)
})

