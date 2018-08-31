/* 
Autor Zahid Guerrero
Agosto 2018
Proyecto agenda con NodeJS
 */


//importar librerias
const mongoose = require('mongoose')
const Schema = mongoose.Schema

//crear schema de evento
let EventoSchema = new Schema({
   id: { type: Number, required: true, unique: true},
   title: { type: String, required: true},
   start: { type: String, required: true},
   end: { type: String},
   //allDay: { type: Number, required: true},
   user: { type: String, required: true}
})


//disposicion de schema evento
let Evento = mongoose.model('eventos', EventoSchema)
module.exports = Evento