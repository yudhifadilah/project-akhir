<?php
namespace App\Models;

use CodeIgniter\Model;

class DataWargaRWModel extends Model
{
    protected $table = 'data_warga_rw';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'umur'];
}
