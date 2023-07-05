<?php

namespace App\Controllers;

use App\Controllers\BaseController;

//step1
use App\Models\GenreModel;

class Genre extends BaseController
{

    //step2 prperti
    protected $Genre;
    //step 3 buat fungsi construct untuk inisiasi class model
    public function __construct()
    {
        //step 4 panggil property Genre
        $this->Genre = new GenreModel();
    }


    public function index()
    {
        // //step 5 memanggil ulang
        // dd($this->Genre->getGenre());
        //array
        $data['data_Genre'] = $this->Genre->getGenre();
        return view("genre/index", $data);
        
    }

    public function all(){
        $data['semuaGenre'] = $this->Genre->getAllData();
        return view("genre/semuaGenre",$data);
    }

    // public function Genre_by_id(){
    //     dd($this->Genre->getDataByID(1));
    // }

    // public function Genre_by_genre(){
    //     dd($this->Genre->getDataBy("Horror"));
    // }

    // public function Genre_order(){
    //     dd($this->Genre->getOrderBy());
    // }

    // public function Genre_limit_five(){
    //     dd($this->Genre->getLimit());
    // }
}
