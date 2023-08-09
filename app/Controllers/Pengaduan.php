<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\PengaduanModel;
use App\Models\BuktiModel;

class Pengaduan extends BaseController
{
    public function __construct()
    {
        $this->pengaduan = new PengaduanModel();
        $this->bukti = new BuktiModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data = [
            'user' => $this->user,
            'title' => 'Daftar Pengaduan Saya',
            'data' => $this->pengaduan->where(['user_id' => $this->user['id'], 'row_status' => 1])->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('user/pengaduan/index', $data);
    }

    public function soft_delete($id)
    {
        $this->bukti->soft_delete($id); // update deleted_at, row_status

        $this->pengaduan->save([
            'id' => $id,
            'deleted_at' => date('Y-m-d H:i:s'),
            'row_status' => 0
        ]);

        session()->setFlashdata('msg', 'Data berhasil dihapus.');
        return redirect()->to('/pengaduan');
    }

    public function detail($id)
    {
        $data = [
            'user' => $this->user,
            'title' => 'Detail pengaduan',
            'data' =>  $this->pengaduan->find($id),
            'bukti' => $this->bukti->getBukti($id),
        ];

        if (empty($data['data'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }

        return view('user/pengaduan/detail', $data);
    }

    public function tambah()
    {
        $data = [
            'user' => $this->user,
            'title' => 'Tambah Pengaduan Baru',
            'validation' => $this->validation
        ];
        return view('user/pengaduan/tambah_pengaduan', $data);
    }

    public function tambah_pengaduan()
    {
        helper(['form', 'url']);

        // Load models
        $pengaduanModel = new PengaduanModel();
        $buktiModel = new BuktiModel();

        if ($this->request->getMethod() === 'post') {
            $data = [
                'judul_pengaduan' => $this->request->getPost('judul_pengaduan'),
                'isi_pengaduan' => $this->request->getPost('isi_pengaduan'),
                'nama_pengadu' => $this->request->getPost('nama_pengadu'),
                'user_id' => $this->request->getPost('user_id'),
            ];

            if ($pengaduanModel->save($data)) {
                $pengaduanId = $pengaduanModel->insertID();

                $uploadedFiles = $this->request->getFiles();
                $filePaths = [];

                foreach ($uploadedFiles['images'] as $image) {
                    if ($image->isValid() && !$image->hasMoved()) {
                        $fileName = $image->getRandomName();
                        $image->move(ROOTPATH . 'public/uploads', $fileName);
                        $filePaths[] = $fileName;
                    }
                }

                $buktiData = [
                    'pengaduan_id' => $pengaduanId,
                    'img_satu' => $filePaths[0] ?? null,
                    'img_dua' => $filePaths[1] ?? null,
                    'img_tiga' => $filePaths[2] ?? null,
                ];

                $buktiModel->insert($buktiData);

                return redirect()->to('/pengaduan')->with('msg', 'Data pengaduan berhasil ditambah.');
            } else {
                // Handle error if data couldn't be saved
                return redirect()->to('/pengaduan/tambah')->withInput()->with('error', 'Terjadi kesalahan, data gagal ditambah.');
            }
        }

        // Load the view
        return view('TambahPengaduan');
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
