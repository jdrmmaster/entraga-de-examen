const mongoose = require('mongoose')

const Schema = mongoose.Schema

let EventosSchema = new Schema({
  codigo: { type: Number, required: true},
  title: { type: String},
  start: { type: String}, 
  end: { type: String},  
  usuario: { type: String} 
    
})

let EventosModel = mongoose.model('eventos', EventosSchema)

module.exports = EventosModel
 