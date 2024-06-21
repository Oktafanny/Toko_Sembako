<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{
    public $input, $Madmin, $db, $form_validation, $session, $cart;

    function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
        $this->load->library('cart');
        $this->load->library('session');
    }

    public function index()
    {
        $data['kategori'] = $this->Madmin->get_all_data('kategori')->result();
        $data['barang'] = $this->Madmin->get_all_data('barang')->result();
        $this->load->view('pelanggan/layout/header');
        $this->load->view('pelanggan/layout/menu');
        $this->load->view('pelanggan/pemesanan/tampil', $data);
        $this->load->view('pelanggan/layout/footer');
    }

    public function add_to_cart()
    {
        $id_barang = $this->input->post('id_barang');
        $qty = $this->input->post('jumlah');
        $barang = $this->Madmin->get_by_id('barang', array('id_barang' => $id_barang))->row();

        $data = array(
            'id' => $barang->id_barang,
            'qty' => $qty,
            'price' => $barang->harga,
            'name' => $barang->nama_barang,
            'options' => array('kategori' => $barang->id_kategori)
        );

        $this->cart->insert($data);
        redirect('pemesanan');
    }

    public function checkout()
    {
        $this->load->view('pelanggan/layout/header');
        $this->load->view('pelanggan/layout/menu');
        $this->load->view('pelanggan/pemesanan/checkout');
        $this->load->view('pelanggan/layout/footer');
    }

    public function process_order()
    {
        $order_data = array(
            'id_pelanggan' => $this->session->userdata('id_pelanggan'),
            'tgl_transaksi' => date('Y-m-d H:i:s'),
            'jumlah_barang' => $this->cart->total_items(),
            'totbay' => $this->cart->total(),
            'status' => 'Pending'
        );

        $this->db->insert('transaksi', $order_data);
        $order_id = $this->db->insert_id();

        foreach ($this->cart->contents() as $item) {
            $item_data = array(
                'id_transaksi' => $order_id,
                'id_barang' => $item['id'],
                'jumlah' => $item['qty'],
                'total' => $item['subtotal']
            );
            $this->db->insert('item_transaksi', $item_data);
        }

        $this->cart->destroy();
        redirect('pemesanan/checkout');
    }
}
