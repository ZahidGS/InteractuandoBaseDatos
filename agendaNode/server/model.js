const mongoose = require('mongoose')
const Schema = mongoose.Schema

let EventoSchema = new Schema({
   id: { type: Number, required: true, unique: true},
   title: { type: String, required: true},
   start: { type: String, required: true},
   end: { type: String},
   //allDay: { type: Number, required: true},
   user: { type: String, required: true}
})

let Evento = mongoose.model('eventos', EventoSchema)
module.exports = Evento