<?php
defined('BASEPATH') or exit('no direct script access allowed');

class Adminpanel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Madmin'); // Buat model untuk verifikasi login
    }
    public $input, $Madmin, $db, $form_validation, $session;
    public function index()
    {
        $this->load->view('admin/login');
    }
    public function dashboard()
    {
        $data['total_barang'] = $this->Madmin->get_total_barang();
        $data['total_pelanggan'] = $this->Madmin->get_total_pelanggan();
        $data['total_transaksi'] = $this->Madmin->get_total_transaksi();
        $data['total_bayar'] = $this->Madmin->get_total_bayar();
        $data['transactions'] = $this->Madmin->get_transactions();
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/layout/header');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/layout/footer');
    }

    public function login()
    {
        $this->load->model('Madmin');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->Madmin->cek_login($username, $password);
        if ($user) {
            redirect('Adminpanel/dashboard');
        } else {
            redirect('Adminpanel');
        }
    }

    public function changePassword()
    {
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/changePassword');
        $this->load->view('admin/layout/footer');
    }
    // -------------action ubah password----------------
    public function savePassword()
    {
        $this->load->model('Madmin');
        $data['user'] = $this->db->get_where('tbl_admin', ['userName' => $this->session->userdata('userName')])->row_array();
        // var_dump($data);die;

        // -----------------validasi form----------------
        $this->form_validation->set_rules(
            'oldPassword',
            'pasword lama',
            'required',
            array('required' => 'Password wajib di isi !',)
        );
        $this->form_validation->set_rules(
            'newPassword',
            'pasword baru',
            'required|min_length[3]',
            array(
                'required' => 'masukan password baru!',
            )
        );

        if ($this->form_validation->run() != false) {

            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');

            // verifikasi apakah password sudah dimasukan deng benar
            if (!password_verify($oldPassword, $data['user']['password'])) {
                $this->session->set_flashdata('massage', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h6><i> password salah! </i></h6>
                </div>');
                redirect('Adminpanel/changePassword');
            } else {
                // password sama dengan old password
                if ($oldPassword == $newPassword) {
                    $this->session->set_flashdata('massage', '<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        <h6><i> password baru tidak boleh sama! </i></h6>
                        </div>');
                    redirect('Adminpanel/changePassword');
                } else {
                    // password bener
                    $password_hash = password_hash($newPassword, PASSWORD_DEFAULT);
                    $dataUpdate = array('password' => $password_hash);
                    $this->Madmin->update('tbl_admin', $dataUpdate, 'idAdmin', $data['user']['idAdmin']);

                    $this->session->set_flashdata('massage', '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        <h6><i>  password berhasil diubah! </i></h6>
                        </div>');
                    redirect('Adminpanel/changePassword');
                }
            }
        } else {
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/layout/menu', $data);
            $this->load->view('admin/changePassword', $data);
            $this->load->view('admin/layout/footer');
        }
    }


    public function logout()
    {
        redirect('adminpanel');
    }

    public function update_status($id_transaksi, $new_status)
    {
        // Update status transaksi
        $this->Madmin->update_status($id_transaksi, $new_status);

        // Redirect kembali ke halaman dashboard
        redirect('Adminpanel/dashboard');
    }
}
