<?php
defined('BASEPATH') or exit('no direct script access allowed');

class User extends CI_Controller
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
        $this->load->view('user/login');
    }
    public function dashboard()
    {
        // Fetch data based on login (you can change 'nama' to appropriate field)
        $nama = $this->input->post('nama');
        $user = $this->Madmin->getUserByName($nama); // Adjust this based on your model function

        if ($user) {
            // Set session data if login successful
            $this->session->set_userdata('user_data', $user);

            // Load necessary data for the view
            $data['kategori'] = $this->Madmin->getKategoriBarang();
            $data['barang'] = $this->Madmin->getAllBarang();

            $this->load->view('user/dashboard', $data);
        } else {
            redirect('user/index'); // Redirect to login page if login fails
        }
    }

    public function dashboard2()
    {
        // Check if session already exists
        if ($this->session->userdata('user_data')) {
            // Session already exists, load dashboard directly
            $data['kategori'] = $this->Madmin->getKategoriBarang(); // Example: Fetch necessary data
            $data['barang'] = $this->Madmin->getAllBarang(); // Example: Fetch necessary data

            $this->load->view('user/dashboard', $data);
        } else {
            // No session, redirect to login
            redirect('user/index');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_data'); // Destroy session on logout
        redirect('user/index'); // Redirect to login page after logout
    }

    // application/controllers/User.php
    public function transaction_history()
    {
        $user_data = $this->session->userdata('user_data');

        if ($user_data) {
            $data['transactions'] = $this->Madmin->getTransactionHistory($user_data->id_pelanggan);
            $this->load->view('user/transaction_history', $data);
        } else {
            redirect('user/index');
        }
    }
}
