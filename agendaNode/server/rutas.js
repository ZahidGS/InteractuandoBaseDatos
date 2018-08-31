const express = require('express')
const Router = express.Router()
const Eventos = require('./model.js')
const Usuarios = require('./modelUsuario.js')

//Obtener todos los eventos
Router.get('/eventos/all', function(req, res) {
    Eventos.find({}).exec(function(err, docs) {
        if (err) {
            res.status(500)
            res.json(err)
        }
        res.json(docs)
    })
})

// Obtener un usuario por su codigo
Router.post('/login', function(req, res) {
    
    let user = req.body.user
    let pass = req.body.pass

    //console.log(user + '' + pass)
    //console.log('Validado', req.params.user, req.params.pass)
    
   Usuarios.findOne({usuario: user, password: pass}).exec(function(err, doc){
        if (err) {
            res.status(500)
            res.json(err)
        } else {
          if (doc) {
             //if (doc.password == pass) {
                
                res.send("Validado")
             //} else {
                //res.send("Password no valido")
             //}
          } else {
             res.send("Usuario o password incorrectos!!")
          }
        }
    })
})

// Agregar un evento
Router.post('/eventos/new', function(req, res) {
    let evento = new Eventos({
        id: Math.floor(Math.random() * 50),
        title: req.body.title,
        start: req.body.start,
        end: req.body.end,
        //allDay: req.body.allDay,
        user: req.body.user
    })

    evento.save(function(error) {
        if (error) {
            res.sendStatus(500)
            res.json(error)
        } else {

            res.send("Evento Almacenado")
            console.log('registro almacenado ', evento.id, evento.title,  evento.start, evento.end, evento.user)
        }
    })
})

// Modificar un evento
Router.post('/eventos/update', function(req, res) {
   let evento = new Eventos({
        id: req.body.id,
        start: req.body.start,
        end: req.body.end
    })

    try {
      var myquery = { id: req.body.id };
      var newvalues = { start: req.body.start, end: req.body.end };

    evento.update(myquery, newvalues,function(error) {
        if (error) {
            res.sendStatus(500)
            res.json(error)
        }
        res.send("Evento Actualizado")
    })
} catch(e) {
   res.send(e.message)
}
})

// Eliminar un evento por su id
Router.post('/eventos/delete/:id', function(req, res) {
    let uid = req.params.id
    Eventos.remove({id: uid}, function(error) {
        if(error) {
            res.status(500)
            res.json(error)
        }
        res.send("Registro eliminado")
    })
})

module.exports = Router

