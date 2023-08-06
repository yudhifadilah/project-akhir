<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\WargaModel;

class WargaController extends BaseController
{
    public function index()
    {
        $model = new WargaModel();
        $data = [
            'user' => $this->user, // Assuming $this->user contains the user data
            'title' => 'Semua Data warga',
            'warga' => $model->findAll(), // Fetching the organizations data from the model
        ];
    
        return view('warga/index', $data);
    }

    public function create()
    {
        $model = new WargaModel();
        $data = [
            'user' => $this->user,
            'title' => 'Create Data Warga',
        ];

        return view('/warga/create', $data);
    }
    
    public function store()
    {
        $model = new WargaModel();

        // Data Warga untuk disimpan ke database
        $data = [
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'agama' => $this->request->getPost('agama'),
            
        ];

        // Simpan data organization ke database
        $model->insert($data);

        // Redirect ke halaman daftar organization
        return redirect()->to('/WargaController');
    }

    public function dt_organizations()
    {
        if ($this->request->getMethod()) {
            if ($this->request->isAJAX()) {
                $model = new WargaModel();
                $searchValue = $this->request->getPost("search")['value'];

                // Get filtered organization based on search input, excluding soft-deleted organization
                $lists = $model->getArticles($searchValue, false);

                $data = [];
                $no = $this->request->getPost("start");

                foreach ($lists as $list) {
                    $no++;

                    $row = [];

                    $row['id'] = $list['id'];
                    $row['nama'] = $list['nama'];
                    $row['alamat'] = $list['alamat'];
                    $row['tanggal_lahir'] = $list['tanggal_lahir'];
                    $row['pekerjaan'] = $list['pekerjaan'];
                    $row['jenis_kelamin'] = $list['jenis_kelamin'];
                    $row['agama'] = $list['agama'];

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
        $model = new WargaModel();
    
        // Ambil data warga yang akan diupdate
        $warga = $model->find($id);
    
        if (!$warga) {
            return redirect()->to('/WargaController')->with('msg', 'Warga not found.');
        }
    
        $data = [
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'agama' => $this->request->getPost('agama'),
        ];
    
        // Validasi data jika diperlukan
    
        // Update data di database
        $model->update($id, $data);
    
        // Redirect ke halaman daftar warga setelah berhasil mengupdate data
        return redirect()->to('/WargaController')->with('success', 'Data Warga berhasil diupdate.');
    }
    
    

    public function edit($id)
    {
        $model = new WargaModel();

        // Get the specific organization by $id (assuming you want to edit a specific organization)
        $wargarw = $model->find($id);

        if (!$wargarw) {
            // Handle the case where the organization with the given $id is not found
            return redirect()->to('/WargaController')->with('msg', 'Data not found.');
        }

        $data = [
            'user' => $this->user,
            'title' => 'Data Warga',
            'warga' => $wargarw, // Pass the specific warga to the view
        ];

        // Tampilkan view "warga/edit" dengan data artikel yang ingin di-edit
        return view('/warga/edit', $data);
    }



    public function hard_delete($id)
    {
        $model = new WargaModel();

        // Check if the organization with the given ID exists in the database
        $wargarw = $model->find($id);
        if (!$wargarw) {
            // If the organization is not found, return a 404 response or handle it accordingly
            return $this->response->setStatusCode(404, 'Data tidak ditemukan.');
        }

        // Perform the hard delete operation on the organization using the custom method from the model
        $model->hardDelete($id);

        // Set flash message to show "Data berhasil dihapus" (Data has been deleted successfully)
        session()->setFlashdata('msg', 'Data berhasil dihapus.');

        // Redirect to the page for listing organization or any other relevant page
        return redirect()->to('/WargaController');
    }
}
