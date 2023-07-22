<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ArticleModel;

class welcome extends BaseController
{
    public function index()
    {
        $model = new ArticleModel();
        $data['articles'] = $model->findAll();
        return view('front/landing', $data);
    }
}
