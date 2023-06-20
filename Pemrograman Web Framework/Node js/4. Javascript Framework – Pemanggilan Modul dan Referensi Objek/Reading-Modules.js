const readline = require('readline');
const process = require('process');

const input = readline.createInterface({
    input: process.stdin,
    output: process.stdout,
})

input.question("Siapa nama anda?", (name)=> {
    input.question("Berapa umur anda?", (umur)=> {
        console.info('Halo ${umur}');
        input.close();
    })
})