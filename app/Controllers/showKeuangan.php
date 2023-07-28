<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KeuanganRWModel;


class ShowKeuangan extends BaseController
{
    public function index()
    {
        $model = new KeuanganRWModel();
        $data['keuangan_rw'] = $model->findAll();


        // Tampilkan view "list_articles" dengan data artikel
        return view('front/list_articles', $data);
    }

    public function show($id)
    {
        $model = new KeuanganRWModel();
        $data['keuangan_rw'] = $model->find($id);

        // Tampilkan view "single_article" dengan data artikel yang diklik
        return view('front/single_article', $data);
    }
}