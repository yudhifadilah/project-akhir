<?php
namespace App\Models;

use CodeIgniter\Model;

class KeuanganRWModel extends Model
{
    protected $table = 'keuangan_rw';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tanggal', 'deskripsi', 'jumlah'];

    public function getArticles($searchValue = null, $includeDeleted = true)
    {
        $builder = $this->db->table('keuangan_rw');

        // Apply search filter if provided
        if ($searchValue) {
            $builder->groupStart()
                ->like('deskripsi', $searchValue)
                ->orLike('jumlah', $searchValue)
                ->groupEnd();
        }

        // Exclude soft-deleted articles if $includeDeleted is set to false
        if (!$includeDeleted) {
            $builder->where('deleted_at', null);
        }

        return $builder->get()->getResultArray();
    }
}
