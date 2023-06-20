const http = require('http');
const fs = require('fs');

const server = http.createServer((req, res) => {
  if (req.url === '/' || req.url === '/default') {
    fs.readFile('default.html', (err, data) => {
      if (err) {
        res.writeHead(404);
        res.end('Halaman tidak ditemukan');
      } else {
        res.writeHead(200, {'Content-Type': 'text/html'});
        res.end(data);
      }
    });
  } else if (req.url === '/contact') {
    fs.readFile('contact.html', (err, data) => {
      if (err) {
        res.writeHead(404);
        res.end('Halaman tidak ditemukan');
      } else {
        res.writeHead(200, {'Content-Type': 'text/html'});
        res.end(data);
      }
    });
  } else if (req.url === '/about') {
    fs.readFile('about.html', (err, data) => {
      if (err) {
        res.writeHead(404);
        res.end('Halaman tidak ditemukan');
      } else {
        res.writeHead(200, {'Content-Type': 'text/html'});
        res.end(data);
      }
    });
  } else {
    res.writeHead(404);
    res.end('Halaman tidak ditemukan');
  }
});

server.listen(8000, () => {
  console.log('Server berjalan di port 8000');
});
