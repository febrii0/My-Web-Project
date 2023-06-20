const http = require('http');
const port = 3030;
const server = http.createServer((req, res) => {
    // header digunakan untuk memberikan informasi tambahan respon dari server
    res.writeHead(200, {
        'Content-Type': 'text/html'
    });
    res.write('Hello response');
    res.end();
});

server.listen(port, ()=> {
    console.log("Server is listening on port : ", port);
})