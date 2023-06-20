const { fstat } = require("fs");

// Synchronous
try{
    fs.mkdirSync('newfolderSync');
    console.log('folder created successfully.');
} catch(e){
    console.log(e)
}

// Asynchronous
fs.mkdir('newfolder' (e) => {
    if(e){
        console.error(e);
    }else{
        console.log('Folder created successfully.');
    }
})