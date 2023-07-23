<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ArticleModel;

class ArticleController extends BaseController
{
    public function index()
    {
        $model = new ArticleModel();
        //$data['articles'] = $model->findAll();
        $data = [
            'user' => $this->user,
            'title' => 'Semua Berita',
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

                // Get filtered articles based on search input, excluding soft-deleted articles
                $lists = $model->getArticles($searchValue, false);

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

        $data = [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            // 'image' => $this->request->getFile('image'), // Tidak perlu, karena kita hanya ingin mengedit data, bukan gambar
        ];

        // Validasi data jika diperlukan

        // Update data di database
        $model->update($id, $data);

        // Redirect ke halaman daftar artikel setelah berhasil mengupdate artikel
        return redirect()->to('/admin/articles');
    }

    public function hard_delete($id)
    {
        $model = new ArticleModel();
    
        // Check if the article with the given ID exists in the database
        $article = $model->find($id);
        if (!$article) {
            // If the article is not found, return a 404 response or handle it accordingly
            return $this->response->setStatusCode(404, 'Artikel tidak ditemukan.');
        }
    
        // Perform the hard delete operation on the article
        $model->delete($id);
    
        // Set flash message to show "Data berhasil dihapus" (Data has been deleted successfully)
        session()->setFlashdata('msg', 'Data berhasil dihapus.');
    
        // Redirect to the page for listing articles or any other relevant page
        return redirect()->to('/admin/articles');
    }
    


}
    

