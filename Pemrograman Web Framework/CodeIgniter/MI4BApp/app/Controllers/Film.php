<?php

namespace App\Controllers;

use App\Controllers\BaseController;

// step 1
use App\Models\FilmModel;

class Film extends BaseController
{
    // step 2 - membuat property film
    protected $film;

    //step 3 - fungsi construct()
    public function __construct()
    {
        //step 4 - memanggil property film
        $this->film = new FilmModel();
    }

    public function index()
    { //step 5 - menggunakan
        // dd($this->film->getFilm());

        $data['data_film'] = $this->film->getFilm();
        return view("film/index", $data);
    }
}