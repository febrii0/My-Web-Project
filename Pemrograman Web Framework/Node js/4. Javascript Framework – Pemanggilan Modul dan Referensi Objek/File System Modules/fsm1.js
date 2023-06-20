const { error } = require('console');
const fs = require('fs')

// Synchronous
// fungsi readfilesync mempunyai 2 parameter, path dan encoding
const data = fs.readFileSync('./file.txt', 'utf-8');
console.log(data)

// Asynchronous
// fungsi readfile mempunyai 3 parameter yaitu path, encoding, dan juga callback
fs.readFile('./file.txt', 'utf-8', (error, data) => {
    if(error) throw error;
    console.log(data);
});