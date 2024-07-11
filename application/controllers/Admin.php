<?php
defined('BASEPATH') or exit('no direct script access allowed');

class admin extends CI_Controller
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
        $data['admin'] = $this->Madmin->get_all_data('admin')->result();
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/layout/header');
        $this->load->view('admin/admin/tampil', $data);
        $this->load->view('admin/layout/footer');
    }
    public function add()
    {
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/layout/header');
        $this->load->view('admin/admin/formAdd');
        $this->load->view('admin/layout/footer');
    }
    public function save()
    {
        $nama = $this->input->post('nama');
        $no_telp = $this->input->post('no_telp');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $dataInput = array(
            'nama' => $nama,
            'email' => $email,
            'no_telp' => $no_telp,
            'password' => $password,
        );

        $insert = $this->Madmin->insert('admin', $dataInput);
        if ($insert) {
            redirect('admin/add');
        } else {
            redirect('admin');
        }
    }
    public function get_by_id($id)
    {
        $dataWhere = array('id_admin' => $id);
        $data['admin'] = $this->Madmin->get_by_id('admin', $dataWhere)->row_object();
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/layout/header');
        $this->load->view('admin/admin/formEdit', $data);
        $this->load->view('admin/layout/footer');
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $no_telp = $this->input->post('no_telp');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $dataInput = array(
            'id_admin' => $id,
            'nama' => $nama,
            'no_telp' => $no_telp,
            'email' => $email,
            'password'=>$password
        );

        $update = $this->Madmin->update('admin', $dataInput, 'id_admin', $id);

        if ($update) {
            redirect('admin/get_by_id');
        } else {
            redirect('admin');
        }
    }
    public function delete($id)
    {
        $this->Madmin->delete('admin', 'id_admin', $id);
        redirect('admin');
    }
}