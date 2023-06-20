const http = require('http');
const port = 3030;
const server = http.createServer((req, res) => {
    // header digunakan untuk memberikan informasi tambahan respon dari server
    res.writeHead(200, {
        'Content-Type': 'text/html'
    });
    //res.write('Hrllo response');
    const url = req.url;
    if(url === '/about'){
        res.write("ini adalah halaman about");
    }else if(url === '/contact'){
        res.write("ini adalah halaman contact");
    }else{
        res.write("ini adalah halaman default");
    }
    res.end();
});

server.listen(port, () => {
    console.log("Server is listening on port : ", port)
})