<?php
namespace App\Controllers;

use App\Models\DataWargaRWModel;

class DataWargaRWController extends BaseController
{
    public function index()
    {
        $dataWargaRWModel = new DataWargaRWModel();
        $data['data_warga_rw'] = $dataWargaRWModel->findAll();

        return view('data_warga_rw/index', $data);
    }

    // Add create, edit, and delete methods for DataWargaRW here
}
