const Router = require("express").Router();
const Eventos = require("./eventosModel.js");
const Users = require("./userModel.js");

// Router.get('/', function(req, res) {
//         res.render("index.js")

// })

Router.post("/login", function(req, res) {
  Users.find({}, { usuario: req.body.user, clave: req.body.pass }).exec(
    function(err, docs) {
      if (err) {
        res.status(500);
        res.json(err);
      }
      if (docs.length > 0) {
        res.send("Validado");
      }
    }
  );
});
//Obtener todos los eventos
Router.get("/all", function(req, res) {
  Eventos.find({}).exec(function(err, docs) {
    if (err) {
      res.status(500);
      res.json(err);
    }
    res.json(docs);
  });
});
/*app.get('/', function(req, res) {
    console.log(__dirname)
    res.sendFile('../client/index.html')
    })*/
// Obtener un usuario por su id
/*Router.get('/', function(req, res) {
    let nombre = req.query.nombre
    Users.findOne({nombres: nombre}).exec(function(err, doc){
        if (err) {
            res.status(500)
            res.json(err)
        }
        res.json(doc)
    })
})*/

// Agregar a un evento
Router.post("/new", function(req, res) {
  let evento = new Eventos({
    codigo: Math.floor(Math.random() * 50),
    title: req.body.title,
    start: req.body.start,
    end: req.body.end,
    usuario: 1
  });
  evento.save(function(error) {
    if (error) {
      res.status(500);
      res.json(error);
    }
    res.send("Registro guardado");
  });
});

Router.post("/delete", function(req, res) {
  Eventos.remove({ codigo: req.body.codigo }, function(err) {
    console.log("elim: ", req.body.codigo);
    if (err) {
      res.status(500);
      res.json(err);
    }
    res.send("Registro Eliminado ");
  });
});

Router.post("/update/", function(req, res) {
  let ev = {
    codigo: req.body.codigo,
    title: req.body.title,
    start: req.body.start,
    end: req.body.end
  };

  Eventos.updateOne({ codigo: req.body.codigo }, { $set: ev }, function(error) {
    if (error) {
      res.status(500);
      res.json(error);
    }
    res.send("Registro Modificado");
  });
});

Router.post("/active/:id", function(req, res) {});

module.exports = Router;
