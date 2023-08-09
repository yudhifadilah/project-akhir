<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OrganizationModel;

class OrganizationController extends BaseController
{
    public function index()
    {
        $model = new OrganizationModel();
        $data = [
            'user' => $this->user, // Assuming $this->user contains the user data
            'title' => 'Semua Struktur Organisasi',
            'organizations' => $model->findAll(), // Fetching the organizations data from the model
        ];
    
        return view('/admin/organization/list_organization', $data);
    }

    public function create()
    {
        $model = new OrganizationModel();
        $data = [
            'user' => $this->user,
            'title' => 'Create Struktur Organisasi',
        ];

        return view('/admin/organization/create', $data);
    }
    
    public function store()
    {
        $model = new OrganizationModel();

        // Ambil file gambar dari form upload
        $imageFile = $this->request->getFile('image');

        // Cek apakah ada gambar yang diupload
        if ($imageFile->isValid() && !$imageFile->hasMoved()) {
            // Generate nama unik untuk gambar dengan extensionnya
            $imageName = $imageFile->getRandomName();

            // Pindahkan gambar yang diupload ke folder /img/postingan
            $imageFile->move('assets/img/postingan', $imageName);

            // Data organization untuk disimpan ke database
            $data = [
                'name' => $this->request->getPost('name'),
                'jabatan' => $this->request->getPost('jabatan'),
                'image_filename' => $imageName // Simpan nama file gambar ke database
            ];

            // Simpan data organization ke database
            $model->insert($data);

            // Redirect ke halaman daftar organization
            return redirect()->to('/admin/organization');
        } else {
            // Jika gambar gagal diupload, tampilkan pesan error atau lakukan tindakan sesuai kebutuhan
            return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar.');
        }
    }

    public function dt_organizations()
    {
        if ($this->request->getMethod()) {
            if ($this->request->isAJAX()) {
                $model = new OrganizationModel();
                $searchValue = $this->request->getPost("search")['value'];

                // Get filtered organization based on search input, excluding soft-deleted organization
                $lists = $model->getArticles($searchValue, false);

                $data = [];
                $no = $this->request->getPost("start");

                foreach ($lists as $list) {
                    $no++;

                    $row = [];

                    $row['id'] = $list['id'];
                    $row['name'] = $list['name'];
                    $row['jabatan'] = $list['jabatan'];
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

    public function update($id)
    {
        $model = new OrganizationModel();

        // Ambil data organization yang akan diupdate
        $organization = $model->find($id);

        if (!$organization) {
            return redirect()->to('/admin/organization')->with('msg', 'Organisasi not found.');
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'jabatan' => $this->request->getPost('jabatan'),
        ];

        // Cek apakah ada file gambar yang diunggah
        $image = $this->request->getFile('image_filename');

        if ($image !== null) {
            if ($image->isValid() && !$image->hasMoved()) {
                // Tentukan direktori tujuan untuk menyimpan gambar
                $uploadPath = 'assets/img/postingan';

                // Hapus gambar lama jika ada
                if ($organization['image_filename'] !== null && file_exists($uploadPath . '/' . $organization['image_filename'])) {
                    unlink($uploadPath . '/' . $organization['image_filename']);
                }

                // Generate nama unik untuk file gambar
                $newName = $image->getRandomName();

                // Pindahkan gambar ke direktori yang ditentukan
                $image->move($uploadPath, $newName);

                // Simpan nama file gambar baru ke dalam data yang akan diupdate
                $data['image_filename'] = $newName;
            } else {
                // Jika file gambar tidak valid, Anda dapat menangani kesalahan di sini
                return redirect()->back()->withInput()->with('error', 'File gambar tidak valid.');
            }
        }

        // Validasi data jika diperlukan

        // Update data di database
        $model->update($id, $data);

        // Redirect ke halaman daftar organization setelah berhasil mengupdate artikel
        return redirect()->to('/admin/organization')->with('success', 'Organisasi berhasil diupdate.');
    }
    

    public function edit($id)
    {
        $model = new OrganizationModel();

        // Get the specific organization by $id (assuming you want to edit a specific organization)
        $organization = $model->find($id);

        if (!$organization) {
            // Handle the case where the organization with the given $id is not found
            return redirect()->to('/admin/organization')->with('msg', 'Article not found.');
        }

        $data = [
            'user' => $this->user,
            'title' => 'organization',
            'organization' => $organization, // Pass the specific organization to the view
        ];

        // Tampilkan view "organization/edit" dengan data artikel yang ingin di-edit
        return view('admin/organization/edit', $data);
    }



    public function hard_delete($id)
    {
        $model = new OrganizationModel();

        // Check if the organization with the given ID exists in the database
        $organization = $model->find($id);
        if (!$organization) {
            // If the organization is not found, return a 404 response or handle it accordingly
            return $this->response->setStatusCode(404, 'Data tidak ditemukan.');
        }

        // Perform the hard delete operation on the organization using the custom method from the model
        $model->hardDelete($id);

        // Set flash message to show "Data berhasil dihapus" (Data has been deleted successfully)
        session()->setFlashdata('msg', 'Data berhasil dihapus.');

        // Redirect to the page for listing organization or any other relevant page
        return redirect()->to('/admin/organization');
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
