<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArticleModel;
use App\Models\KeuanganRWModel; // Add the KeuanganRWModel namespace

class Welcome extends BaseController
{
    public function index()
    {
        $model = new ArticleModel();
        $data['articles'] = $model->findAll();

        // Load the KeuanganRWModel
        $keuanganModel = new KeuanganRWModel();
        $data['keuangan_rw'] = $keuanganModel->findAll();

        return view('front/landing', $data);
    }
}
