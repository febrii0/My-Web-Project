<?php

namespace App\Models;

use CodeIgniter\Model;

class GenreModel extends Model
{
    protected $table            = 'genre';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowFields      = [];

        public function getGenre(){

        $data =
        [
            [
                "nama_film" => "Sewu Dino",
                "genre" => "Horor",
                "duration" => "1 jam 43 menit"
            ],
            [
                "nama_film" => "Ivvana",
                "genre" => "Horor",
                "duration" => "1 jam 20 menit"
            ],
            [
                "nama_film" => "Menjelang Maghrib",
                "genre" => "Horor",
                "duration" => "1 jam 30 menit"
            ],
            [
                "nama_film" => "Upin Ipin The Movie",
                "genre" => "Animasi",
                "duration" => "1 jam 19 menit"
            ],
            [
                "nama_film" => "Pragos Sang Iblis",
                "genre" => "Animasi",
                "duration" => "1 jam 05 menit"
            ]
        ];

        return $data;
    }

    //findALL()
    public function getAllData(){
        return $this->findAll();
     }
}
