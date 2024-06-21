<?php
defined('BASEPATH') or exit('no direct script access allowed');

class barang extends CI_Controller
{
    public $input, $Madmin, $db, $form_validation, $session;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index()
    {
        $data['barang'] = $this->Madmin->get_all_data('barang')->result();
        $data['kategori'] = $this->Madmin->get_all_data('kategori')->result();
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/layout/header');
        $this->load->view('admin/barang/tampil', $data);
        $this->load->view('admin/layout/footer');

    }
    public function add()
    {
        $data['kategori'] = $this->Madmin->get_all_data('kategori')->result();
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/layout/header');
        $this->load->view('admin/barang/formAdd', $data);
        $this->load->view('admin/layout/footer');
    }

    public function save()
    {
        $id_kategori = $this->input->post('id_kategori');
        $barang = $this->input->post('barang');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $dataInput = array(
            'id_kategori' => $id_kategori,
            'nama_barang' => $barang,
            'harga' => $harga,
            'stok' => $stok,
        );

        $insert = $this->Madmin->insert('barang', $dataInput);
        if ($insert) {
            redirect('barang/add');
        } else {
            redirect('barang');
        }
    }
    public function get_by_id($id)
    {
        $dataWhere = array('id_barang' => $id);
        $data['barang'] = $this->Madmin->get_by_id('barang', $dataWhere)->row_object();
        $data['kategori'] = $this->Madmin->get_all_data('kategori')->result();
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/layout/header');
        $this->load->view('admin/barang/formEdit', $data);
        $this->load->view('admin/layout/footer');
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $id_kategori = $this->input->post('id_kategori');
        $barang = $this->input->post('barang');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $dataInput = array(
            'id_barang'=> $id,
            'id_kategori' => $id_kategori,
            'nama_barang' => $barang,
            'harga' => $harga,
            'stok' => $stok
        );

        $update = $this->Madmin->update('barang', $dataInput, 'id_barang', $id);

        if ($update) {
            redirect('barang/get_by_id');
        } else {
            redirect('barang');
        }
    }
    public function delete($id)
    {
        $this->Madmin->delete('barang', 'id_barang', $id);
        redirect('barang');
    }
}