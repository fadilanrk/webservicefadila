<?php

namespace App\Models;

use CodeIgniter\Model;

class TokoTasModel extends Model
{
    protected $table      = 'produk'; // Nama tabel
    protected $primaryKey = 'id'; // Primary key dari tabel
    protected $allowedFields = ['id', 'kategori', 'nama', 'harga', 'stok'];

    // Method untuk mengambil data admin
    public function getTokoTasData()
    {
        // Mengambil semua data dari tabel
        return $this->findAll();
    }

    // Method untuk mengambil data produk berdasarkan id
    public function getProduk($id)
    {
        //Mengambil data produk berdasarkan id
        return $this->find($id);
    }

    // Method untuk menyimpan data baru atau memperbarui data yang sudah ada
    public function saveTokoTas($id)
    {
        // Menyimpan data baru atau memperbarui data yang ada jika primary key sudah ada
        return $this->save($data);
    }

    // Method untuk memperbarui data produk berdasarkan id
    public function updateTokoTas($id, $data)
    {
        // Menggunakan method update() dari CodeIgniter Model untuk mengupdate data
        return $this->update($id, $data);
    }

    // Method untuk menghapus data produk berdasarkan id
    public function deleteTokoTas($id)
    {
        // Menggunakan method delete() untuk menghapus data produk berdasarkan id
        return $this->delete($id);
    }
}