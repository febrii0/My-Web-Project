<?php

namespace App\Controllers;

use App\Controllers\BaseController;

//step1
use App\Models\FilmModel;
use App\Models\GenreModel; //tambahkan (1)

class Film extends BaseController
{
    //step2 prperti
    protected $Film;
    protected $Genre; // tambahkan (2)
    //step 3 buat fungsi construct untuk inisiasi class model
    public function __construct()
    {
        //step 4 panggil property film
        $this->Film = new FilmModel();
        $this->Genre = new GenreModel(); //tambahkan (3)
    }


    public function index()
    {
        // //step 5 memanggil ulang
        // dd($this->Film->getFilm());
        //array
        $data['data_film'] = $this->Film->getAllDataJoin();
        return view("film/index", $data);
    }

    public function all()
    {
        $data['semuaFilm'] = $this->Film->getAllDataJoin();
        return view("film/semuaFilm", $data);
    }

    public function add()
    {
        $data["semuaGenre"] = $this->Genre->getAllData();
        $data["errors"] = session('errors');
        return view("film/add", $data);
    }

    public function update($id)
    {
        $decryptedId = decryptUrl($id);
        $data["semuaGenre"] = $this->Genre->getAllData();
        $data["errors"] = session('errors');
        $data["semuaFilm"] = $this->Film->getDataByID($decryptedId);
        return view("film/update", $data);
    }

    public function destroy($id)
    {
        $decryptedId = decryptUrl($id);
        $this->Film->delete($decryptedId);
        session()->setFlashdata('success', 'Data berhasil dihapus.');

        return redirect()->to('/film');
    }


    public function edit()
    {
        $validation = $this->validate([
            'nama_film' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Nama Film harus diisi.'
                ]
            ],
            'id_genre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Genre harus diisi.'
                ]
            ],
            'duration' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Durasi harus diisi.'
                ]
            ],
            'cover' => [
                'rules' => 'mime_in[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]|max_size[cover,2048]',
                'errors' => [
                    'mime_in' => 'Tipe file pada kolom Cover harus berupa JPG, JPEG, atau PNG.',
                    'max_size' => 'Ukuran file pada kolom Cover melebihi batas maximum.'
                ]
            ]
        ]);
        if (!$validation) {
            $errors = \Config\Services::validation()->getErrors();

            return redirect()->back()->withInput()->with('errors', $errors);
        }

        // mengambil data lama
        $film = $this->Film->find($this->request->getPost('id'));
        // tambah request id
        $data = [
            'id' => $this->request->getPost('id'),
            'nama_film' => $this->request->getPost('nama_film'),
            'id_genre' => $this->request->getPost('id_genre'),
            'duration' => $this->request->getPost('duration'),
        ];
        // cek apakah ada cover yang diupload
        $cover = $this->request->getFile('cover');
        if ($cover->isValid() && !$cover->hasMoved()) {
            // generate nama file yang unik
            $imageName = $cover->getRandomName();
            // pindahkan file ke direktori penyimpanan
            $cover->move(ROOTPATH . 'public/assets/cover/' . $imageName);
            // hapus file gambar lama jika ada
            if ($film['cover']) {
                unlink(ROOTPATH . 'public/assets/cover/' . $film['cover']);
            }
            // jika ada tambahan array cover pada variable $data
            $data['$cover'] = $imageName;
        }

        $this->Film->save($data);
        // ubah pesannya
        session()->setFlashdata('success', 'Data berhasil diperbarui.');
        return redirect()->to('/film');
    }


    public function store()
    {

        $validation = $this->validate([
            'nama_film' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Nama Film harus diisi.'
                ]
            ],
            'id_genre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Genre harus diisi.'
                ]
            ],
            'duration' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom Durasi harus diisi.'
                ]
            ],
            'cover' => [
                'rules' => 'uploaded[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]|max_size[cover,2048]',
                'errors' => [
                    'uploaded' => 'Kolom Cover harus berisi file.',
                    'mime_in' => 'Tipe file pada kolom Cover harus berupa JPG, JPEG, atau PNG.',
                    'max_size' => 'Ukuran file pada kolom Cover melebihi batas maximum.'
                ]
            ]
        ]);

        if (!$validation) {
            $errors = \Config\Services::validation()->getErrors();

            return redirect()->back()->withInput()->with('errors', $errors);
        }

        $image = $this->request->getFile('cover');
        //Generate nama file yang unik
        $imageName = $image->getRandomName();
        //Pindahkan file ke direktori penyimpanan
        $image->move(ROOTPATH . 'public/assets/cover', $imageName);

        $data = [
            'nama_film' => $this->request->getPost('nama_film'),
            'id_genre' => $this->request->getPost('id_genre'),
            'duration' => $this->request->getPost('duration'),
            'cover' => $imageName,
        ];
        $this->Film->save($data);
        session()->setFlashdata('success', 'Data berhasil disimpan.'); // tambahkan ini
        return redirect()->to('/film');
    }
}