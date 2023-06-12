<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    protected $allowedFields = ['nama', 'nomor_hp', 'alamat', 'jenis_orderan'];

    public function tampildata()
    {
        return $this->findAll();
    }

    public function cari($pencarian)
    {
        $builder = $this->table("pelanggan");
        $arr_pencarian = explode(" ", $pencarian);
        for ($x = 0; $x < count($arr_pencarian); $x++) {
            $builder->like('nama', $arr_pencarian[$x]);
            $builder->orLike('alamat', $arr_pencarian[$x]);
            $builder->orLike('jenis_orderan', $arr_pencarian[$x]);
        }
        return $builder;
    }

    public function cariWithPagination($pencarian, $jumlahBaris)
    {
        $builder = $this->cari($pencarian);
        return $builder->paginate($jumlahBaris);
    }
}