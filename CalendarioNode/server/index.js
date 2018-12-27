const http = require('http'),
      path = require('path'),
      Routing = require('./rutas.js'),
      express = require('express'),
      bodyParser = require('body-parser'),
      mongoose = require('mongoose');

const PORT = 8087
const app = express()

const Server = http.createServer(app)

mongoose.connect('mongodb://localhost/calendario')


app.use(express.static('../client'))
app.use(bodyParser.urlencoded({ extended: true}))
app.use(bodyParser.json())

app.use('/events', Routing)


const options = {};

const server = http.createServer(options, (req, res) => {
    console.log('got here', req, res);
});
 

Server.listen(PORT, function() {
  console.log('Server is listeng on port: ' + PORT)
  
})


