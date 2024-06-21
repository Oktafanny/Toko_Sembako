<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Fungsi untuk mengambil semua barang
    public function get_all_barang()
    {
        $query = $this->db->get('barang');
        return $query->result();
    }

    // Fungsi untuk mengambil barang berdasarkan ID
    public function get_barang_by_id($id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        $query = $this->db->get('barang');
        return $query->row();
    }

    // Fungsi untuk mengambil barang berdasarkan kategori
    public function get_barang_by_kategori($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $query = $this->db->get('barang');
        return $query->result();
    }

    // Fungsi untuk menambahkan barang baru
    public function add_barang($data)
    {
        return $this->db->insert('barang', $data);
    }

    // Fungsi untuk memperbarui barang
    public function update_barang($id_barang, $data)
    {
        $this->db->where('id_barang', $id_barang);
        return $this->db->update('barang', $data);
    }

    // Fungsi untuk menghapus barang
    public function delete_barang($id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        return $this->db->delete('barang');
    }
}
