const mongoose = require('mongoose')

const Schema = mongoose.Schema

let UserSchema = new Schema({
  userId: { type: Number, required: true, unique: true},
  usuario: { type: String, required: true },
  clave: { type: String, required: true} 
    
})

let UserModel = mongoose.model('usuarios', UserSchema)

module.exports = UserModel
