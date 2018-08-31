const http = require('http'),
      express = require('express'),
      Routing = require('./rutas.js'),
      bodyParser = require('body-parser'),
      mongoose = require('mongoose');

const PORT = 8082
const app = express()

const Server = http.createServer(app)
const url = 'mongodb://localhost/agenda';

mongoose.connect(url, function(err){
 
  if (err) return console.log(err);
  
  console.log('Successfully connected'); 
})


app.use(express.static('client'))
app.use(bodyParser.json())
app.use(bodyParser.urlencoded({ extended: true}))
app.use('/', Routing)


Server.listen(PORT, function() {
  console.log('Server is running on port: ' + PORT)
})

