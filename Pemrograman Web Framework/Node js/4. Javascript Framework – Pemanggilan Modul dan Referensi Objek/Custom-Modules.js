const nama = "Febri";

const sayHelo = function(){
    return 'Hello nama saya adalah ${nama}';
}

const data = {
    nama : "Febriansyah Agung Tirta",
    umur : 20
}

module.exports = {
    nama,
    sayHelo,
    data
};

const modul = require('./file1.js')

console.log(modul.nama);
console.log(modul.sayHelo());
console.log(modul.data.nama);
console.log(modul.data.umur);