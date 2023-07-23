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
    public function getArticles($searchValue = null, $includeDeleted = true)
    {
        $builder = $this->db->table('articles');

        // Apply search filter if provided
        if ($searchValue) {
            $builder->groupStart()
                ->like('title', $searchValue)
                ->orLike('content', $searchValue)
                ->groupEnd();
        }

        // Exclude soft-deleted articles if $includeDeleted is set to false
        if (!$includeDeleted) {
            $builder->where('deleted_at', null);
        }

        return $builder->get()->getResultArray();
    }

    public function getImagePath($imageName)
    {
        return base_url('/assets/img/postingan/' . $imageName);
    }
}
