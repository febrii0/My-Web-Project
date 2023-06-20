<?php

namespace App\Models;

use CodeIgniter\Model;

class FilmModel extends Model
{
    protected $table            = 'film';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowFields      = [];

    public function getFilm(){

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

    public function getAllDataJoin()
    {
        $query = $this->db->table("film")
            ->select("film.*, genre.nama_genre")
            ->join("genre", "genre.id = film.id_genre");
        return $query->get()->getResultArray();
    }

    //findALL()
    public function getAllData(){
        return $this->findAll();
     }
    //find($id)
     public function getDataByID($id){
         return $this->find($id);
     }
     //where($column, $value)
     public function getDataBy($data){
         return $this->where("genre", $data)->findAll();
     }
    //orderBy($column, $order)
     public function getOrderBy(){
         return $this->orderBy("created_at","desc")->findAll();
     }
    //limit($limit, $offset)
     public function getLimit(){
         return $this->limit(10)->get()->getResultArray();
    }

}
