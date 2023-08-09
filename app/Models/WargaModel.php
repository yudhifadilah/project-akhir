<?php

namespace App\Models;
use CodeIgniter\Model;

class WargaModel extends Model 
{
    protected $table      = 'warga';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nama', 'alamat', 'tanggal_lahir', 'pekerjaan', 'jenis_kelamin', 'agama'
    ];
    // Tambahan method atau fungsi lain yang dibutuhkan

    public function getArticles($searchValue = null, $includeDeleted = true)
    {
        $builder = $this->db->table('warga');

        // Apply search filter if provided
        if ($searchValue) {
            $builder->groupStart()
                ->like('nama', $searchValue)
                ->orLike('alamat', $searchValue)
                ->groupEnd();
        }

        // Exclude soft-deleted articles if $includeDeleted is set to false
        if (!$includeDeleted) {
            $builder->where('deleted_at', null);
        }

        return $builder->get()->getResultArray();
    }

    public function hardDelete($id)
    {
        return $this->where('id', $id)->delete();
    }
}
