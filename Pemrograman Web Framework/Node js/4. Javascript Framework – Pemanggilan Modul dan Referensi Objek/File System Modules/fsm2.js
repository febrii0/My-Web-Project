const { error } = require("console");

// Synchronous
fs.writeFileSync('fileWriteSync.txt', 'ini adalah file text dengan synchronous');
console.log('File ini ditulis secara synchronous');

// Asynchronous
fs.writeFile('filewrite.txt', 'ini adalah text file asynchronous', (error) => {
    if(error) throw error;
    console.log('File ditulis secara asynchronous');
});