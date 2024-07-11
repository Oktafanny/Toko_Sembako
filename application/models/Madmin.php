<?php
class Madmin extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function cek_login($u, $p)
    {
        $q = $this->db->get_where('admin', array('nama' => $u, 'password' => $p));
        return $q->row();
    }

    public function getUserByName($u)
    {
        $q = $this->db->get_where('pelanggan', array('nama' => $u));
        return $q->row();
    }
    public function cek_pertumbuhan($u)
    {
        $q = $this->db->get_where('pertumbuhan', array('id_pertumbuhan' => $u));
        return $q->row();
    }

    public function get_all_data($tabel)
    {
        $q = $this->db->get($tabel);
        return $q;
    }
    // insert data
    public function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }
    // ambil berdskn id
    public function get_by_id($tabel, $id)
    {
        return $this->db->get_where($tabel, $id);
    }
    // uopdate data
    public function update($tabel, $data, $pk, $id)
    {
        $this->db->where($pk, $id);
        $this->db->update($tabel, $data);
    }
    // hapus data
    public function delete($tabel, $id, $val)
    {
        $this->db->delete($tabel, array($id => $val));
    }

    // cek member
    public function cek_login_member($u, $p)
    {
        $q = $this->db->get_where('tbl_member', array('username' => $u, 'password' => $p, 'statusAktif' => 'Y'));
        return $q;
    }

    // application/models/MyModel.php
    public function get_combined_data()
    {
        $this->db->select('*');
        $this->db->from('anak');
        $this->db->join('ibu', 'id_anak = id_ibu', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function isDataConnected($table, $primaryKey, $id)
    {
        $this->db->where($primaryKey, $id);
        $result = $this->db->get($table);

        return $result->num_rows() > 0;
    }
    public function getChildData($id_anak)
    {
        $this->db->select('id_imunisasi, id_penimbangan');
        $this->db->from('anak');
        $this->db->join('imunisasi', 'anak.id_anak = imunisasi.id_anak', 'left');
        $this->db->join('penimbangan', 'anak.id_anak = penimbangan.id_anak', 'left');
        $this->db->where('anak.id_anak', $id_anak); // Specify the table name for id_anak

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function getPertumbuhanData()
    {
        $this->db->select('pertumbuhan.id_pertumbuhan, anak.nama, imunisasi.imunisasi, penimbangan.berat_badan, penimbangan.tinggi_badan, pertumbuhan.tgl_periksa, pertumbuhan.keterangan');
        $this->db->from('pertumbuhan');
        $this->db->join('anak', 'anak.id_anak = pertumbuhan.id_anak', 'left');
        $this->db->join('imunisasi', 'imunisasi.id_anak = pertumbuhan.id_anak', 'left');
        $this->db->join('penimbangan', 'penimbangan.id_anak = pertumbuhan.id_anak', 'left');

        return $this->db->get()->result();
    }

    public function getPertumbuhan($tabel, $id)
    {
        $this->db->select('pertumbuhan.id_pertumbuhan, anak.nama, imunisasi.imunisasi, penimbangan.berat_badan, penimbangan.tinggi_badan, pertumbuhan.tgl_periksa, pertumbuhan.keterangan');
        $this->db->from($tabel);
        $this->db->join('anak', 'anak.id_anak = pertumbuhan.id_anak', 'left');
        $this->db->join('imunisasi', 'imunisasi.id_anak = pertumbuhan.id_anak', 'left');
        $this->db->join('penimbangan', 'penimbangan.id_anak = pertumbuhan.id_anak', 'left');
        $this->db->where($id);

        return $this->db->get()->row_object();
        // return $this->db->get_where($tabel, $id)->row_object();
        // return $this->db->get_where($tabel, $id);
    }

    public function get_children_with_penimbangan_imunisasi()
    {
        $this->db->select('*');
        $this->db->from('anak');
        $this->db->join('penimbangan', 'anak.id_anak = penimbangan.id_anak', 'inner');
        $this->db->join('imunisasi', 'anak.id_anak = imunisasi.id_anak', 'inner');
        $this->db->group_by('anak.id_anak'); // To get distinct children
        $query = $this->db->get();
        return $query->result();
    }
    public function get_total_mothers()
    {
        return $this->db->count_all('ibu'); // Assuming 'ibu' is the table name
    }

    public function get_total_children()
    {
        return $this->db->count_all('anak'); // Assuming 'anak' is the table name
    }

    public function get_total_staff()
    {
        return $this->db->count_all('petugas'); // Assuming 'petugas' is the table name
    }
    public function get_average_weight()
    {
        $this->db->select_avg('berat_badan');
        $query = $this->db->get('penimbangan');
        $result = $query->row();

        $average_weight = $result->berat_badan;

        $rounded_average_weight = round($average_weight, 2);

        return $rounded_average_weight;
    }
    public function get_average_height()
    {
        $this->db->select_avg('tinggi_badan');
        $query = $this->db->get('penimbangan');
        $result = $query->row();

        $average_height = $result->tinggi_badan;

        $rounded_average_height = round($average_height, 2);

        return $rounded_average_height;
    }

    public function insert_pemesanan($data)
    {
        return $this->db->insert('pemesanan', $data);
    }

    public function getKategoriBarang()
    {
        $query = $this->db->get('kategori');
        return $query->result();
    }

    public function getAllBarang()
    {
        $query = $this->db->get('barang');
        return $query->result();
    }

    public function getBarangById($id_barang)
    {
        $query = $this->db->get_where('barang', array('id_barang' => $id_barang));
        return $query->row();
    }

    public function insertPemesanan($data)
    {
        return $this->db->insert('pemesanan', $data);
    }

    public function getTransactionDetails($id_transaksi)
    {
        $query = $this->db->get_where('transaksi', array('id_transaksi' => $id_transaksi));
        return $query->row_array(); // Mengembalikan data transaksi sebagai array
    }

    // Mendapatkan detail pelanggan berdasarkan id_pelanggan
    public function getCustomerDetails($id_pelanggan)
    {
        $query = $this->db->get_where('pelanggan', array('id_pelanggan' => $id_pelanggan));
        return $query->row_array(); // Mengembalikan data pelanggan sebagai array
    }
    public function get_total_barang()
    {
        return $this->db->count_all('barang');
    }

    public function get_total_pelanggan()
    {
        return $this->db->count_all('pelanggan');
    }

    public function get_total_transaksi()
    {
        return $this->db->count_all('transaksi');
    }

    public function get_total_bayar()
    {
        $this->db->select_sum('totbay');
        $query = $this->db->get('transaksi');
        return $query->row()->totbay;
    }
    public function get_transactions()
    {
        $this->db->select('transaksi.*, pelanggan.nama, pelanggan.alamat, pelanggan.no_telp');
        $this->db->from('transaksi');
        $this->db->join('pelanggan', 'transaksi.id_pelanggan = pelanggan.id_pelanggan');
        $this->db->order_by('transaksi.tgl_transaksi', 'DESC');
        $query = $this->db->get();
        $transactions = $query->result_array();

        foreach ($transactions as &$transaction) {
            $this->db->select('barang.nama_barang, item_transaksi.jumlah, item_transaksi.total');
            $this->db->from('item_transaksi');
            $this->db->join('barang', 'item_transaksi.id_barang = barang.id_barang');
            $this->db->where('item_transaksi.id_transaksi', $transaction['id_transaksi']);
            $query = $this->db->get();
            $transaction['items'] = $query->result_array();
        }

        return $transactions;
    }
    public function getTransactionHistory($id_pelanggan)
    {
        // Get transactions
        $this->db->select('transaksi.id_transaksi, transaksi.tgl_transaksi, transaksi.totbay, transaksi.status');
        $this->db->from('transaksi');
        $this->db->where('transaksi.id_pelanggan', $id_pelanggan);
        $this->db->order_by('transaksi.tgl_transaksi', 'DESC');
        $query = $this->db->get();
        $transactions = $query->result_array();

        // Get items for each transaction
        foreach ($transactions as &$transaction) {
            $this->db->select('barang.nama_barang, item_transaksi.jumlah, item_transaksi.total');
            $this->db->from('item_transaksi');
            $this->db->join('barang', 'item_transaksi.id_barang = barang.id_barang');
            $this->db->where('item_transaksi.id_transaksi', $transaction['id_transaksi']);
            $query = $this->db->get();
            $transaction['items'] = $query->result_array();
        }

        return $transactions;
    }
    public function update_status($id_transaksi, $new_status)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi', array('status' => $new_status));
    }
    public function getItemsByTransactionId($id_transaksi)
    {
        $this->db->select('barang.nama_barang, item_transaksi.jumlah, item_transaksi.total');
        $this->db->from('item_transaksi');
        $this->db->join('barang', 'item_transaksi.id_barang = barang.id_barang');
        $this->db->where('item_transaksi.id_transaksi', $id_transaksi);
        $query = $this->db->get();

        return $query->result_array();
    }
}
