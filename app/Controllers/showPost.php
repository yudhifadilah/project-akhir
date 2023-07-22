<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArticleModel;


class ShowPost extends BaseController
{
    public function index()
    {
        $model = new ArticleModel();
        $data['articles'] = $model->findAll();


        // Tampilkan view "list_articles" dengan data artikel
        return view('front/list_articles', $data);
    }

    public function show($id)
    {
        $model = new ArticleModel();
        $data['article'] = $model->find($id);

        // Tampilkan view "single_article" dengan data artikel yang diklik
        return view('front/single_article', $data);
    }
}