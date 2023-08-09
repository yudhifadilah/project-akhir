<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table = 'articles'; // Nama tabel di database

    protected $primaryKey = 'id'; // Nama kolom primary key

    protected $allowedFields = ['title', 'content', 'image_filename', 'created_at', 'deleted_at']; // Kolom yang diizinkan untuk diisi

    protected $useTimestamps = true; // Aktifkan otomatisasi timestamps (created_at dan updated_at)

    protected $createdField = 'created_at'; // Nama kolom untuk created_at
    protected $deletedField = 'deleted_at'; // Nama kolom untuk deleted_at

    protected $dateFormat = 'datetime'; // Format tanggal yang dihasilkan oleh model

    // Fungsi untuk mengambil data dari tabel articles

    public function getImagePath($imageName)
    {
        return base_url('/assets/img/postingan/' . $imageName);
    }

    public function getArticles($searchValue, $excludeDeleted = true, $orderColumnIndex = null, $orderDir = 'asc')
    {
        $builder = $this->select('*')
                        ->like('title', $searchValue)
                        ->orWhere('content', $searchValue);

        if ($excludeDeleted) {
            $builder->where('is_deleted', 0); // Assuming you have a field indicating soft deletion
        }

        if ($orderColumnIndex !== null) {
            // Example: You can adjust this based on your actual column names
            $columns = ['title', 'content', 'created_at'];
            $orderBy = isset($columns[$orderColumnIndex]) ? $columns[$orderColumnIndex] : 'created_at';
            $builder->orderBy($orderBy, $orderDir);
        }

        return $builder->findAll();
    }
}
