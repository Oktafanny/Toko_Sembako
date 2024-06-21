<?php
defined('BASEPATH') or exit('no direct script access allowed');

class kategori extends CI_Controller
{
    public $input, $Madmin, $db, $form_validation, $session;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
        $this->load->library('session');

    }
    public function index()
    {
        $data['kategori'] = $this->Madmin->get_all_data('kategori')->result();
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/layout/header');
        $this->load->view('admin/kategori/tampil', $data);
        $this->load->view('admin/layout/footer');
    }
    public function add()
    {
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/layout/header');
        $this->load->view('admin/kategori/formAdd');
        $this->load->view('admin/layout/footer');
    }
    public function save()
    {
        // $nama = $this->input->post('nama');
        // $no_telp = $this->input->post('no_telp');
        // $alamat = $this->input->post('alamat');
        $kategori = $this->input->post('kategori');
        $dataInput = array(
            'kategori' => $kategori
            // 'tgl_lahir' => $tgl_lahir,
            // 'no_telp' => $no_telp,
            // 'alamat' => $alamat,
        );

        $insert = $this->Madmin->insert('kategori', $dataInput);
        if ($insert) {
            redirect('kategori/add');
        } else {
            redirect('kategori');
        }
    }
    public function get_by_id($id)
    {
        $dataWhere = array('id_kategori' => $id);
        $data['kategori'] = $this->Madmin->get_by_id('kategori', $dataWhere)->row_object();
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/layout/header');
        $this->load->view('admin/kategori/formEdit', $data);
        $this->load->view('admin/layout/footer');
    }

    public function edit()
    {
        $id = $this->input->post('id');
        // $nama = $this->input->post('nama');
        // $no_telp = $this->input->post('no_telp');
        // $alamat = $this->input->post('alamat');
        $kategori = $this->input->post('kategori');
        $dataInput = array(
            'id_kategori' => $id,
            'kategori' => $kategori
            // 'no_telp' => $no_telp,
            // 'alamat' => $alamat,
        );

        $update = $this->Madmin->update('kategori', $dataInput, 'id_kategori', $id);

        if ($update) {
            redirect('kategori/get_by_id');
        } else {
            redirect('kategori');
        }
    }
    public function delete($id)
    {
        $this->Madmin->delete('kategori', 'id_kategori', $id);
        redirect('kategori');
    }
}