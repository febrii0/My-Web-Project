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
        $data['v_film'] = $this->Film->getAllDataJoin();
        return view("film/v_film", $data);
    }

    public function add()
    {
        $data["v_genre"] = $this->Genre->getAllData();
        $data["errors"] = session('errors');
        return view("film/add", $data);
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
                    'mime_in' => 'Tipe file pada kolom Cover harus berupa jpg,jpeg, atau png.',
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
        $image->move(ROOTPATH . 'public/asstes/cover', $imageName);

        $data = [
            'nama_film' => $this->request->getPost('nama_film'),
            'id_genre' => $this->request->getPost('id_genre'),
            'duration' => $this->request->getPost('duration'),
            'cover' => $imageName,
        ];
        $this->Film->save($data);
        return redirect()->to('/film');
    }

    public function film_by_id()
    {
        dd($this->Film->getDataByID(1));
    }

    public function film_by_genre()
    {
        dd($this->Film->getDataBy("Horror"));
    }

    public function film_order()
    {
        dd($this->Film->getOrderBy());
    }

    public function film_limit_five()
    {
        dd($this->Film->getLimit());
    }
}