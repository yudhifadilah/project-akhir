<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ArticleModel;

class ArticleController extends BaseController
{
    public function index()
    {
        $model = new ArticleModel();
        $articles = $model->findAll(); // Get all articles from the model

        //$data['articles'] = $model->findAll();

            // Sort the articles using Bubble Sort
    $sortedArticles = $this->bubbleSort($articles);
        $data = [
            'user' => $this->user,
            'title' => 'Semua Berita',
            'articles' => $sortedArticles, // Pass the sorted articles to the view

        ];

        // Tampilkan view "list_articles" dengan data artikel
        return view('admin/articles/list_articles', $data);
    }

    public function create()
    {
        $model = new ArticleModel();
        //$data['articles'] = $model->findAll();
        $data = [
            'user' => $this->user,
            'title' => 'Create Article',
        ];
        // Tampilkan view "create_article"
        return view('admin/articles/create_article', $data);
    }

    public function store()
    {
        $model = new ArticleModel();

        // Ambil file gambar dari form upload
        $imageFile = $this->request->getFile('image');

        // Cek apakah ada gambar yang diupload
        if ($imageFile->isValid() && !$imageFile->hasMoved()) {
            // Generate nama unik untuk gambar dengan extensionnya
            $imageName = $imageFile->getRandomName();

            // Pindahkan gambar yang diupload ke folder /img/postingan
            $imageFile->move('assets/img/postingan', $imageName);

            // Data artikel untuk disimpan ke database
            $data = [
                'title' => $this->request->getPost('title'),
                'content' => $this->request->getPost('content'),
                'image_filename' => $imageName // Simpan nama file gambar ke database
            ];

            // Simpan data artikel ke database
            $model->insert($data);

            // Redirect ke halaman daftar artikel
            return redirect()->to('/admin/articles');
        } else {
            // Jika gambar gagal diupload, tampilkan pesan error atau lakukan tindakan sesuai kebutuhan
            return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar.');
        }
    }


    public function dt_articles()
    {
        if ($this->request->getMethod()) {
            if ($this->request->isAJAX()) {
                $model = new ArticleModel();
                $searchValue = $this->request->getPost("search")['value'];
                
                // Get sorting information from DataTables request
    
                // Get filtered articles based on search input, excluding soft-deleted articles
                $lists = $model->getArticles($searchValue, false, $orderColumnIndex, $orderDir);
    
                $data = [];
                $no = $this->request->getPost("start");
    
                foreach ($lists as $list) {
                    $no++;
    
                    $row = [];
    
                    $row['id'] = $list['id'];
                    $row['title'] = $list['title'];
                    $row['content'] = $list['content'];
                    $row['image_filename'] = $list['image_filename'];
                    $row['created_at'] = $list['created_at'];
    
                    $data[] = $row;
                }
    
                $output = [
                    "draw" => $this->request->getPost("draw"),
                    "recordsTotal" => count($lists),
                    "recordsFiltered" => count($lists),
                    "data" => $data
                ];
    
                echo json_encode($output);
            }
        }
    }
    



    // ...

    public function edit($id)
    {
        $model = new ArticleModel();
    
        // Get the specific article by $id (assuming you want to edit a specific article)
        $article = $model->find($id);
    
        if (!$article) {
            // Handle the case where the article with the given $id is not found
            return redirect()->to('/admin/articles')->with('msg', 'Article not found.');
        }
    
        $data = [
            'user' => $this->user,
            'title' => 'Article',
            'article' => $article, // Pass the specific article to the view
        ];
    
        // Tampilkan view "edit_article" dengan data artikel yang ingin di-edit
        return view('admin/articles/edit', $data);
    }
    
    

    public function update($id)
    {
        $model = new ArticleModel();
    
        // Get the specific article by $id
        $article = $model->find($id);
    
        if (!$article) {
            // Handle the case where the article with the given $id is not found
            return redirect()->to('/admin/articles')->with('msg', 'Article not found.');
        }
    
        // Get existing image filename
        $existingImage = $article['image_filename'];
    
        // Ambil file gambar dari form upload
        $imageFile = $this->request->getFile('image_filename');
    
        // Cek apakah ada gambar yang diupload
        if ($imageFile->isValid() && !$imageFile->hasMoved()) {
            // Generate nama unik untuk gambar dengan extensionnya
            $imageName = $imageFile->getRandomName();
    
            // Pindahkan gambar yang diupload ke folder /img/postingan
            $imageFile->move('assets/img/postingan', $imageName);
    
            // Hapus gambar lama jika ada
            if ($existingImage && file_exists('assets/img/postingan/' . $existingImage)) {
                unlink('assets/img/postingan/' . $existingImage);
            }
        } else {
            $imageName = $existingImage;
        }
    
        $data = [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'image_filename' => $imageName,
        ];
    
        // Validasi data jika diperlukan
    
        // Update data di database
        $model->update($id, $data);
    
        // Redirect ke halaman daftar artikel setelah berhasil mengupdate artikel
        return redirect()->to('/admin/articles');
    }

    public function hardDelete($id)
    {
        $model = new ArticleModel();
        $model->delete($id); // Perform hard delete using built-in delete method
        
        session()->setFlashdata('msg', 'Data berhasil dihapus.');
        
        return redirect()->to('/admin/articles');
    }

    private function bubbleSort($array)
    {
        $n = count($array);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if (strcmp($array[$j]['title'], $array[$j + 1]['title']) > 0) {
                    $temp = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $temp;
                }
            }
        }
        return $array;
    }
}
    
