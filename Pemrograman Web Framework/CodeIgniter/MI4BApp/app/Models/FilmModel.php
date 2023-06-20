<?php

namespace App\Models;

use CodeIgniter\Model;

class FilmModel extends Model
{
    public function getFilm()
    {
        $data =
            [
                [
                    "nama_film" => "Sewu Dino",
                    "genre" => "Horor",
                    "duration" => "1 jam 43 menit"
                ],
                [
                    "nama_film" => "Fast and Forious X",
                    "genre" => "Action",
                    "duration" => "2 jam 9 menit"
                ],
                [
                    "nama_film" => "Azab",
                    "genre" => "Rerigi",
                    "duration" => "2 jam 9 menit"
                ],
                [
                    "nama_film" => "Pragos vs Krisna The Movie",
                    "genre" => "Action & Comedy",
                    "duration" => "2 jam 9 menit"
                ],
                [
                    "nama_film" => "Bapak Doeng vs Telkomsel",
                    "genre" => "Action",
                    "duration" => "2 jam 15 menit"
                ]
            ];

        return $data;

    }
}