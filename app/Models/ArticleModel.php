<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table = 'articles'; // Nama tabel di database

    protected $primaryKey = 'id'; // Nama kolom primary key

    protected $allowedFields = ['title', 'content', 'image_filename', 'created_at']; // Kolom yang diizinkan untuk diisi

    protected $useTimestamps = true; // Aktifkan otomatisasi timestamps (created_at dan updated_at)

    protected $createdField = 'created_at'; // Nama kolom untuk created_at

    protected $dateFormat = 'datetime'; // Format tanggal yang dihasilkan oleh model

    // Jika Anda menggunakan datetime pada database, gunakan baris berikut untuk mendapatkan format tanggal yang sesuai
    // protected $dateFormat = 'datetime';
    // protected $createdField = 'created_at';
    // protected $updatedField = 'updated_at';

    // Fungsi untuk mengambil data dari tabel articles
// ArticleModel.php

public function getArticles($searchValue = null)
{
    $builder = $this->db->table('articles');

    // Apply search filter if provided
    if ($searchValue) {
        $builder->groupStart()
                ->like('title', $searchValue)
                ->orLike('content', $searchValue)
                ->groupEnd();
    }

    return $builder->get()->getResultArray();
}


    public function getImagePath($imageName)
{
    return base_url('/assets/img/postingan/' . $imageName);
}

}