const mongoose = require('mongoose')
const Schema = mongoose.Schema

let UsuarioSchema = new Schema({
    usuario: { type: String},
    nombre: { type: String},
    fechaNacimiento: { type: String},
    password: { type: String}
 })
 

let Usuario = mongoose.model('Usuarios', UsuarioSchema)
module.exports = Usuario