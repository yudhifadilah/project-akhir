<?php
namespace App\Models;

use CodeIgniter\Model;

class OrganizationModel extends Model
{
    protected $table = 'organizations'; // Replace 'organizations' with your actual table name
    protected $primaryKey = 'id'; // Replace 'id' with your primary key field name
    protected $allowedFields = ['name', 'jabatan', 'image_filename', 'created_at']; // List of allowed fields to be inserted/updated
    // Add other configurations as needed for database interactions.

    
    public function hardDelete($id)
    {
        return $this->where('id', $id)->delete();
    }



}

