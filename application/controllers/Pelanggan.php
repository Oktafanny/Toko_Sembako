<?php
defined('BASEPATH') or exit('no direct script access allowed');

class pelanggan extends CI_Controller
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
        $data['pelanggan'] = $this->Madmin->get_all_data('pelanggan')->result();
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/layout/header');
        $this->load->view('admin/pelanggan/tampil', $data);
        $this->load->view('admin/layout/footer');
    }
    public function add()
    {
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/layout/header');
        $this->load->view('admin/pelanggan/formAdd');
        $this->load->view('admin/layout/footer');
    }
    public function save()
    {
        $nama = $this->input->post('nama');
        $no_telp = $this->input->post('no_telp');
        $alamat = $this->input->post('alamat');
        // $tgl_lahir = $this->input->post('tgl_lahir');
        $dataInput = array(
            'nama' => $nama,
            // 'tgl_lahir' => $tgl_lahir,
            'no_telp' => $no_telp,
            'alamat' => $alamat,
        );

        $insert = $this->Madmin->insert('pelanggan', $dataInput);
        if ($insert) {
            redirect('pelanggan/add');
        } else {
            redirect('pelanggan');
        }
    }
    public function get_by_id($id)
    {
        $dataWhere = array('id_pelanggan' => $id);
        $data['pelanggan'] = $this->Madmin->get_by_id('pelanggan', $dataWhere)->row_object();
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/layout/header');
        $this->load->view('admin/pelanggan/formEdit', $data);
        $this->load->view('admin/layout/footer');
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $no_telp = $this->input->post('no_telp');
        $alamat = $this->input->post('alamat');
        // $tgl_lahir = $this->input->post('tgl_lahir');
        $dataInput = array(
            'nama' => $nama,
            // 'tgl_lahir' => $tgl_lahir,
            'no_telp' => $no_telp,
            'alamat' => $alamat,
        );

        $update = $this->Madmin->update('pelanggan', $dataInput, 'id_pelanggan', $id);

        if ($update) {
            redirect('pelanggan/get_by_id');
        } else {
            redirect('pelanggan');
        }
    }
    public function delete($id)
    {
        $this->Madmin->delete('pelanggan', 'id_pelanggan', $id);
        redirect('pelanggan');
    }
}