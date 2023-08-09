<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrganizationModel;


class ShowStruktur extends BaseController
{
    public function index()
    {
        $model = new OrganizationModel();
        $data['organizations'] = $model->findAll();


        // Tampilkan view "list_organisasi" dengan data artikel
        return view('front/list_organisasi', $data);
    }

    public function show($id)
    {
        $model = new OrganizationModel();
        $data['organizations'] = $model->find($id);

        // Tampilkan view "single_article" dengan data artikel yang diklik
        return view('front/single_article', $data);
    }
}