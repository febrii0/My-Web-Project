const fs = require('fs');
const path = require('path');

const folderName = 'fs_latihan';
const filePath = path.join(__dirname, folderName, 'data.json');

// Method untuk membuat file data.json dengan data default
const createFile = () => {
  const data = {
    mahasiswa: [
      {
        nama: 'Febriansyah Agung Tirta',
        npm: '21753049',
        jurusan: 'Manajemen Informatika',
        ipk: 3.75
      }
    ]
  };
  fs.writeFile(filePath, JSON.stringify(data), (err) => {
    if (err) throw err;
    console.log('File data.json telah dibuat dengan data default.');
  });
};

// Method untuk menambahkan informasi mahasiswa baru ke dalam file
const addMahasiswa = (mahasiswa) => {
  fs.readFile(filePath, 'utf8', (err, data) => {
    if (err) throw err;
    const jsonData = JSON.parse(data);
    jsonData.mahasiswa.push(mahasiswa);
    fs.writeFile(filePath, JSON.stringify(jsonData), (err) => {
      if (err) throw err;
      console.log('Data mahasiswa telah ditambahkan ke dalam file.');
    });
  });
};

// Method untuk mengubah informasi mahasiswa yang sudah ada di dalam file
const updateMahasiswa = (npm, newData) => {
  fs.readFile(filePath, 'utf8', (err, data) => {
    if (err) throw err;
    const jsonData = JSON.parse(data);
    const mahasiswaIndex = jsonData.mahasiswa.findIndex(mahasiswa => mahasiswa.npm === npm);
    if (mahasiswaIndex === -1) {
      console.log(`Mahasiswa dengan NPM ${npm} tidak ditemukan.`);
    } else {
      jsonData.mahasiswa[mahasiswaIndex] = {
        ...jsonData.mahasiswa[mahasiswaIndex],
        ...newData
      };
      fs.writeFile(filePath, JSON.stringify(jsonData), (err) => {
        if (err) throw err;
        console.log(`Data mahasiswa dengan NPM ${npm} telah diubah.`);
      });
    }
  });
};

// Method untuk menghapus informasi mahasiswa dari dalam file
const deleteMahasiswa = (npm) => {
  fs.readFile(filePath, 'utf8', (err, data) => {
    if (err) throw err;
    const jsonData = JSON.parse(data);
    const mahasiswaIndex = jsonData.mahasiswa.findIndex(mahasiswa => mahasiswa.npm === npm);
    if (mahasiswaIndex === -1) {
      console.log(`Mahasiswa dengan NPM ${npm} tidak ditemukan.`);
    } else {
      jsonData.mahasiswa.splice(mahasiswaIndex, 1);
      fs.writeFile(filePath, JSON.stringify(jsonData), (err) => {
        if (err) throw err;
        console.log(`Data mahasiswa dengan NPM ${npm} telah dihapus.`);
      });
    }
  });
};

// Method untuk melihat informasi semua mahasiswa yang tersimpan dalam file
const viewMahasiswa = () => {
  fs.readFile(filePath, 'utf8', (err, data) => {
    if (err) throw err;
    const jsonData = JSON.parse(data);
    console.log(jsonData.mahasiswa);
  });
};

// Membuat folder "fs_latihan" jika belum ada
fs.mkdir(folderName, { recursive: true }, (err) => {
  if (err) throw err;
  console.log('Folder fs_latihan telah dibuat.');
  //  // Memeriksa apakah file data.json ada atau tidak
  fs.access(filePath, fs.constants.F_OK, (err) => {
    if (err) {
      // Jika file tidak ada, maka buat file dengan data default
      createFile();
    } else {
      // Jika file sudah ada, lanjutkan dengan menampilkan menu
      console.log('File data.json sudah ada.');
      console.log('Pilih aksi yang ingin dilakukan:');
      console.log('1. Tambahkan data mahasiswa');
      console.log('2. Ubah data mahasiswa');
      console.log('3. Hapus data mahasiswa');
      console.log('4. Tampilkan data mahasiswa');
      console.log('5. Keluar');
      process.stdin.setEncoding('utf8');
      process.stdin.on('readable', () => {
        const chunk = process.stdin.read();
        if (chunk !== null) {
          const choice = parseInt(chunk.trim());
          switch (choice) {
            case 1:
              process.stdin.removeAllListeners('readable');
              console.log('Masukkan informasi mahasiswa baru:');
              console.log('Nama: ');
              let nama = '';
              process.stdin.on('readable', () => {
                const chunk = process.stdin.read();
                if (chunk !== null) {
                  nama += chunk.trim();
                  console.log('NPM: ');
                  let npm = '';
                  process.stdin.on('readable', () => {
                    const chunk = process.stdin.read();
                    if (chunk !== null) {
                      npm += chunk.trim();
                      console.log('Jurusan: ');
                      let jurusan = '';
                      process.stdin.on('readable', () => {
                        const chunk = process.stdin.read();
                        if (chunk !== null) {
                          jurusan += chunk.trim();
                          console.log('IPK: ');
                          let ipk = '';
                          process.stdin.on('readable', () => {
                            const chunk = process.stdin.read();
                            if (chunk !== null) {
                              ipk += chunk.trim();
                              addMahasiswa({ nama, npm, jurusan, ipk: parseFloat(ipk) });
                              console.log('Pilih aksi selanjutnya:');
                              console.log('1. Tambahkan data mahasiswa');
                              console.log('2. Ubah data mahasiswa');
                              console.log('3. Hapus data mahasiswa');
                              console.log('4. Tampilkan data mahasiswa');
                              console.log('5. Keluar');
                            }
                          });
                        }
                      });
                    }
                  });
                }
              });
              break;
            case 2:
              process.stdin.removeAllListeners('readable');
              console.log('Masukkan NPM mahasiswa yang ingin diubah:');
              process.stdin.on('readable', () => {
                const chunk = process.stdin.read();
                if (chunk !== null) {
                  const npm = chunk.trim();
                  console.log('Masukkan informasi baru:');
                  console.log('Nama: ');
                  let nama = '';
                  process.stdin.on('readable', () => {
                    const chunk = process.stdin.read();
                    if (chunk !== null) {
                      nama += chunk.trim();
                      console.log('Jurusan: ');
                      let jurusan = '';
                      process.stdin.on('readable', () => {
                        const chunk = process.stdin.read();
                        if (chunk !== null) {
                          jurusan += chunk.trim();
                          console.log('IPK: ');
                          let ipk = '';
                          process.stdin.on('readable', () => {
                            const chunk = process.stdin.read();
                            if (chunk !== null) {
                             
                              ipk += chunk.trim();
                              updateMahasiswa(npm, { nama, jurusan, ipk: parseFloat(ipk) });
                              console.log('Pilih aksi selanjutnya:');
                              console.log('1. Tambahkan data mahasiswa');
                              console.log('2. Ubah data mahasiswa');
                              console.log('3. Hapus data mahasiswa');
                              console.log('4. Tampilkan data mahasiswa');
                              console.log('5. Keluar');
                            }
                          });
                        }
                      });
                    }
                  });
                }
              });
              break;
            case 3:
              process.stdin.removeAllListeners('readable');
              console.log('Masukkan NPM mahasiswa yang ingin dihapus:');
              process.stdin.on('readable', () => {
                const chunk = process.stdin.read();
                if (chunk !== null) {
                  const npm = chunk.trim();
                  deleteMahasiswa(npm);
                  console.log('Pilih aksi selanjutnya:');
                  console.log('1. Tambahkan data mahasiswa');
                  console.log('2. Ubah data mahasiswa');
                  console.log('3. Hapus data mahasiswa');
                  console.log('4. Tampilkan data mahasiswa');
                  console.log('5. Keluar');
                }
              });
              break;
            case 4:
              process.stdin.removeAllListeners('readable');
              showMahasiswa();
              console.log('Pilih aksi selanjutnya:');
              console.log('1. Tambahkan data mahasiswa');
              console.log('2. Ubah data mahasiswa');
              console.log('3. Hapus data mahasiswa');
              console.log('4. Tampilkan data mahasiswa');
              console.log('5. Keluar');
              break;
            case 5:
              process.exit();
              break;
            default:
              console.log('Aksi tidak valid. Silakan pilih aksi yang tersedia.');
          }
        }
      });
    }
  });
});
