/* 
Autor Zahid Guerrero
Agosto 2018
Proyecto agenda con NodeJS
 */

//importar librerias
const mongoose = require('mongoose')
const Schema = mongoose.Schema

//crear schema usuario
let UsuarioSchema = new Schema({
    usuario: { type: String},
    nombre: { type: String},
    fechaNacimiento: { type: String},
    password: { type: String}
 })
 
//disposicion de schema usuario
let Usuario = mongoose.model('usuarios', UsuarioSchema)
module.exports = Usuario