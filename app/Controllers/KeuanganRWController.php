<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KeuanganRWModel;

class KeuanganRWController extends BaseController
{
    public function index()
    {
        $keuanganRWModel = new KeuanganRWModel();
        $data = [
            'user' => $this->user, // Assuming $this->user contains the user data
            'title' => 'Rekapitulasi Kas RW Cilame',
            'keuangan_rw' => $keuanganRWModel->findAll(), // Fetching the organizations data from the model
        ];
        return view('keuangan_rw/index', $data);
    }

    public function create()
    {
        $keuanganRWModel = new KeuanganRWModel();
        $data = [
            'user' => $this->user,
            'title' => 'Input Keuangan Rukun Warga',
        ];

        return view('/keuangan_rw/create', $data);
    }

    public function store()
    {
        $keuanganRWModel = new KeuanganRWModel();

        // Data organization untuk disimpan ke database
        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'jumlah' => $this->request->getPost('jumlah'),
        ];

        // Simpan data organization ke database
        $keuanganRWModel->insert($data);

        // Redirect ke halaman daftar organization
        return redirect()->to('/keuangan_rw');
    }
        
    

    public function dt_keuangan()
    {
        if ($this->request->getMethod()) {
            if ($this->request->isAJAX()) {
                $keuanganRWModel = new KeuanganRWModel();
                $searchValue = $this->request->getPost("search")['value'];

                // Get filtered organization based on search input, excluding soft-deleted organization
                $lists = $keuanganRWModel->getArticles($searchValue, false);

                $data = [];
                $no = $this->request->getPost("start");

                foreach ($lists as $list) {
                    $no++;

                    $row = [];

                    $row['id'] = $list['id'];
                    $row['tanggal'] = $list['tanggal'];
                    $row['deskripsi'] = $list['deskripsi'];
                    $row['jumlah'] = $list['jumlah'];

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
        $keuanganRWModel = new KeuanganRWModel();

        // Ambil data organization yang akan diupdate
        $keuangan_rw = $keuanganRWModel->find($id);

        if (!$keuangan_rw) {
            return redirect()->to('/keuangan_rw')->with('msg', 'Organisasi not found.');
        }

        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'jumlah' => $this->request->getPost('jumlah'),
        ];

        // Cek apakah ada file gambar yang diunggah
        $image = $this->request->getFile('image_filename');

        // Validasi data jika diperlukan

        // Update data di database
        $keuanganRWModel->update($id, $data);

        // Redirect ke halaman daftar organization setelah berhasil mengupdate artikel
        return redirect()->to('/keuangan_rw')->with('success', 'Organisasi berhasil diupdate.');
    }
    

    public function edit($id)
    {
        $keuanganRWModel = new KeuanganRWModel();

        // Get the specific organization by $id (assuming you want to edit a specific organization)
        $keuangan_rw = $keuanganRWModel->find($id);

        if (!$keuangan_rw) {
            // Handle the case where the organization with the given $id is not found
            return redirect()->to('/keuangan_rw')->with('msg', 'Article not found.');
        }

        $data = [
            'user' => $this->user,
            'title' => 'keuangan_rw',
            'keuangan_rw' => $keuangan_rw, // Pass the specific organization to the view
        ];

        // Tampilkan view "organization/edit" dengan data artikel yang ingin di-edit
        return view('/keuangan_rw/edit', $data);
    }



    public function hard_delete($id)
    {
        $keuanganRWModel = new KeuanganRWModel();
    
        // Check if the financial record with the given ID exists in the database
        $keuangan_rw = $keuanganRWModel->find($id);
        if (!$keuangan_rw) {
            // If the financial record is not found, return a 404 response or handle it accordingly
            return $this->response->setStatusCode(404, 'Data tidak ditemukan.');
        }
    
        // Perform the hard delete operation on the financial record
        $keuanganRWModel->hardDelete($id);
    
        // Set flash message to show "Data berhasil dihapus" (Data has been deleted successfully)
        session()->setFlashdata('msg', 'Data berhasil dihapus.');
    
        // Redirect back to the listing page after successful deletion
        return redirect()->to('/KeuanganRWController/index');
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