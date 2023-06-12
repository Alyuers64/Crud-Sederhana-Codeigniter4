<?php

namespace App\Controllers;

use App\Models\ModelPelanggan;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\Response;

class Pelanggan extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new ModelPelanggan();
    }

    public function hapus($id_pelanggan){
        $this->model->delete($id_pelanggan);
        return redirect()->to('/');
    }

    public function index()
    {
        $jumlahBaris = 5;
        $pencarian = $this->request->getGet('pencarian');

        if ($pencarian) {
            $tampildata = $this->model->cari($pencarian)->paginate($jumlahBaris);
        } else {
            $tampildata = $this->model->paginate($jumlahBaris);
        }

        $pager = $this->model->pager;
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $nomor = ($currentPage - 1) * $jumlahBaris;

        $data = [
            'tampildata' => $tampildata,
            'pager' => $pager,
            'nomor' => $nomor,
            'request' => $this->request,
        ];

        return view('viewtampilpelanggan', $data);
    }

    public function edit($id_pelanggan)
    {
        $model = new \App\Models\ModelPelanggan();
        $data = $model->find($id_pelanggan);

        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode(array('error' => 'Data not found'));
        }
    }

    public function simpan()
    {
    $validation = \Config\Services::validation();
    $rules = [
        'nama' => [
            'label' => 'Nama',
            'rules' => 'required|min_length[3]',
            'errors' => [
                'required' => '{field} harus diisi',
                'min_length' => 'Panjang {field} minimal 3 karakter'
            ]
        ],
        'nomor_hp' => [
            'label' => 'Nomor HP',
            'rules' => 'required|min_length[12]|max_length[12]',
            'errors' => [
                'required' => '{field} harus diisi',
                'min_length' => 'Panjang {field} minimal 12 karakter',
                'max_length' => 'Panjang {field} maksimal 12 karakter'
            ]
        ],
        'alamat' => [
            'label' => 'Alamat',
            'rules' => 'required|min_length[5]',
            'errors' => [
                'required' => '{field} harus diisi',
                'min_length' => '{field} minimal 5 karakter'
            ]
        ],

        'jenis_orderan' => [
            'label' => 'Jenis Orderan',
            'rules' => 'required',
            'errors' => [
                'required' => 'Silakan pilih {field}'
            ]
        ]
    ];

    if ($this->validate($rules)) {
        $id_pelanggan = $this->request->getPost('id_pelanggan');
        $nama = $this->request->getPost('nama');
        $nomor_hp = $this->request->getPost('nomor_hp');
        $alamat = $this->request->getPost('alamat');
        $jenis_orderan = $this->request->getPost('jenis_orderan');

        $data = [
            'id_pelanggan' => $id_pelanggan,
            'nama' => $nama,
            'nomor_hp' => $nomor_hp,
            'alamat' => $alamat,
            'jenis_orderan' => $jenis_orderan
        ];

        if ($id_pelanggan && $this->model->find($id_pelanggan)) {
            $this->model->update($id_pelanggan, $data);
            $response = [
                'sukses' => 'Berhasil Memperbarui Data',
                'error' => false
            ];
        } else {
            $this->model->insert($data);
            $response = [
                'sukses' => 'Berhasil Menambahkan Data',
                'error' => false
            ];
        }
    } else {
        $errors = $validation->getErrors();
        $response = [
            'sukses' => false,
            'error' => $errors
        ];
    }

    return $this->response->setJSON($response);
}

}