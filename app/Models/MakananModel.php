<?php

namespace App\Models;

use CodeIgniter\Model;

class MakananModel extends Model
{
    protected $table            = 'makanan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama',
        'slug',
        'kategori',
        'deskripsi',
        'harga',
        'berat',
        'tingkat_pedas',
        'rating',
        'terjual',
        'gambar',
        'status',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
