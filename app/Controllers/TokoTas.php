<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class TokoTas extends BaseController
{
    public function index()
    {
    }

    // Function sederhana untuk menampilkan data array dalam format JSON
    public function showSimpleJson()
    {
        // Data array sederhana
        $data = [
            'id' => 1,
            'kategori' => 'shoulderbag',
            'nama' => 'aurorabag',
            'harga' => '150000',
            'stok' => '10'
        ];

        // Mengambil response dalam format JSON
        return $this->response->setJSON($data);
    }

    // Method untuk menampilkan data admin dalam bentuk JSON
    public function getTokoTasDataJson()
    {
        // Memanggil model TokoTasModel
        $tokotasModel = new TokoTasModel();

        // Mengambil data dari tabel tb_produk
        $tokotas = $tokotasModel->getTokoTasData();

        // Memanggil data dalam format JSON
        return $this->response->setJSON($tokotas);
    }

    // Function untuk menyimpan data dengan output JSON
    public function storeData()
    {
        // Memanggil model TokoBukuModel
        $tokotasModel = new TokoTasModel();

        // Mendapatkan data input dari request
        $data = [
            'kategori' => $this->request->get('kategori'),
            'nama' => $this->request->get('nama'),
            'harga' => $this->request->get('harga'),
            'stok' => $this->request->get('stok')
        ];

        //Menyimpan data ke dalam databbase
        if ($tokotasModel->insert($data)) {
            // Jika berhasil menyimpan data, kirimkan response JSON
            return $this->response->setJSON([
                'message' => 'Berhasil menyimpan data',
                'status' => 1 // atau TRUE
            ]);
        } else {
            // Jika gagal menyimpan data, kirimkan response JSON dengan status gagal
            return $this->response->setJSON([
                'message' => 'Gagal menyimpan data',
                'status' => 0 // atau FALSE
            ]);
        }
    }

    // Method untuk mengupdate data toko tas
    public function update($id)
    {
        //$idAdmin = $this->request->getGet('id');
        // Memanggil model TokoTasModel
        $tokotasModel = new TokoTasModel();

        // Mengambil data input dari request
        $data = [
            'kategori' => $this->request->getPost('kategori'),
            'nama' => $this->request->getPost('nama'),
            'stok' => $this->request->getPost('stok'),
            'harga' => $this->request->getPost('harga'),
            'tgl_update' => date('Y-m-d H:i:s') // Mengisi dengan tanggal dan waktu saat ini
        ];

        // Update data toko tas berdasarkan id
        if ($tokotasModel->updateTokoTasData($id, $data)) {
            // Jika berhasil update
            return $this->response->setJSON([
                'message' => 'Berhasil memperbarui data',
                'status' => 1
            ]);
        } else {
            // Jika gagal update
            return $this->response->setJSON([
                'message' => 'Gagal memperbarui data',
                'status' => 0
            ]);
        }
    }

    // Method untuk menghapus data toko tas
    public function delete($id)
    {
         //$idAdmin = $this->request->getGet('id');
        // Memanggil model TokoTasModel
        $tokotasModel = new TokoTasModel();

        // Menghapus data toko tas berdasarkan id
        if ($tokotasModel->deleteTokoTas($id)) {
            // Jika berhasil dihapus
            return $this->response->setJSON([
                'message' => 'Berhasil menghapus data',
                'status' => 1
            ]);
        } else {
            // Jika gagal dihapus
            return $this->response->setJSON([
                'message' => 'Gagal menghapus data',
                'status' => 0
            ]);
        }
    }
}