<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{
    public $input, $Madmin, $db, $form_validation, $session, $cart;
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('Madmin');
        $this->load->library('session');
    }

    public function add_to_cart()
    {
        $id_barang = $this->input->post('id_barang');
        $jumlah = $this->input->post('jumlah');
        $barang = $this->Madmin->getBarangById($id_barang);

        $data = array(
            'id' => $barang->id_barang,
            'qty' => $jumlah,
            'price' => $barang->harga,
            'name' => $barang->nama_barang
        );

        $this->cart->insert($data);
        redirect('pemesanan/view_cart');
    }

    public function view_cart()
    {
        $this->load->view('user/cart');
    }

    public function checkout()
    {
        $user_data = $this->session->userdata('user_data');

        if ($user_data) {
            $data_transaksi = array(
                'id_pelanggan' => $user_data->id_pelanggan,
                'tgl_transaksi' => date('Y-m-d H:i:s'),
                'jumlah_barang' => $this->cart->total_items(),
                'totbay' => $this->cart->total(),
                'status' => 'pending'
            );

            $this->Madmin->insert('transaksi', $data_transaksi);
            $id_transaksi = $this->db->insert_id();

            foreach ($this->cart->contents() as $item) {
                $data_item = array(
                    'id_transaksi' => $id_transaksi,
                    'id_barang' => $item['id'],
                    'jumlah' => $item['qty'],
                    'total' => $item['subtotal']
                );

                $this->Madmin->insert('item_transaksi', $data_item);
                $this->update_stok_barang($item['id'], $item['qty']);
            }

            $this->cart->destroy();
            redirect('pemesanan/success/'. $id_transaksi);
        } else {
            redirect('user/index');
        }
    }

    private function update_stok_barang($id_barang, $jumlah)
    {
        $barang = $this->Madmin->getBarangById($id_barang);
        $new_stok = $barang->stok - $jumlah;

        $this->Madmin->update('barang', array('stok' => $new_stok), 'id_barang', $id_barang);
    }

    // public function success()
    // {
    //     $this->load->view('user/success');
    // }

    public function success($id_transaksi)
    {
        $transaction = $this->Madmin->getTransactionDetails($id_transaksi); // Adjust with your actual model method

        // Check if transaction exists and fetch customer details
        if ($transaction) {
            $data['customer'] = $this->Madmin->getCustomerDetails($transaction['id_pelanggan']);
            $data['total'] = $transaction['totbay'];
            $this->load->view('user/success', $data);
        } else {
            // Handle error or redirect if transaction not found
            redirect('some/error/page');
        }

        // Load view with data
        // $this->load->view('user/success', $data);
    }
    public function remove_from_cart($rowid)
    {
        $data = array(
            'rowid' => $rowid,
            'qty' => 0
        );

        $this->cart->update($data);
        redirect('pemesanan/view_cart');
    }
}
