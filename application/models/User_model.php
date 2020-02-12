<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
       
    }

    public function index()
    {
        $data['tittle'] = 'Dashboard | Aplikasi Inventaris Barang';
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('name')])->row_array();

        $data['barsuk'] = $this->User_model->getBarangmasuk(5);       
        $data['barpin'] =  $this->User_model->getBarangpinjam(5);       
        $data['barkel'] = $this->User_model->getBarangkeluar(5);
        
        $data['peminjam'] = $this->User_model->count('peminjam');
        $data['nama'] = $this->User_model->count('user');
        $data['supplier'] = $this->User_model->count('supplier');
        $data['stok'] = $this->User_model->sum('barang', 'jumlah_barang');
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/footer');
    }

    public function getBarangmasuk($limit = null, $id_barang = null, $range = null)
    {
        $this->db->select('*');
        $this->db->join('barang', 'id_barang_stok = id_barang');
        if ($limit != null) {
            $this->db->limit($limit);
        }  
        if ($id_barang != null) {
            $this->db->where('id_barang', $id_barang);
        }
        $this->db->order_by('id_barang_masuk', 'DESC');
        return $this->db->get('barang_masuk')->result_array();

    }

    public function getBarangpinjam($limit = null, $id_barang = null, $range = null)
    {
        $this->db->select('*');
        $this->db->join('barang', 'id_barang_pinjam = id_barang');  
        if ($limit != null) {
            $this->db->limit($limit);
        } 
        if ($id_barang != null) {
            $this->db->where('id_barang', $id_barang);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get('peminjam')->result_array();

    }

    public function getBarangkeluar($limit = null, $id_barang = null, $range = null)
    {
        $this->db->select('*');
        $this->db->join('barang', 'id_barang_kel = id_barang');
        if ($limit != null) {
            $this->db->limit($limit);
        }   
        if ($id_barang != null) {
            $this->db->where('id_barang', $id_barang);
        }
        $this->db->order_by('id_barang_keluar', 'DESC');
        return $this->db->get('barang_keluar')->result_array();

    }

    public function tambahBarang()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim');

        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('name')])->row_array();
        $data['supplier'] = $this->db->get('supplier')->result_array();

        $data['tittle'] = 'Tambah Barang | Aplikasi Inventaris Barang';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('barang/tambah_barang', $data);
        $this->load->view('template/footer');

        if ($this->form_validation->run()) {

            $data = [

                'nama' => $this->input->post('nama'),
                'jumlah_barang' => $this->input->post('jumlah'),
                'satuan' => $this->input->post('satuan')
            ];

            $tambah = $this->db->insert('barang', $data);

            if($tambah){
                $this->session->set_flashdata('pesan', '<div class ="alert alert-success" role="alert" >Data Berhasil Ditambah!</div>');
                redirect('barang/daftarBarang');
            }

        }
    }

    public function hapus($id)
    {
        $hapus = $this->db->delete('barang', ['id_barang' => $id]);

        if($hapus){
            $this->session->set_flashdata('pesan', '<div class ="alert alert-success" role="alert" >Data Berhasil Dihapus!</div>');
                redirect('barang/daftarBarang');
        }
    }

    public function tambahPeminjam()
    {
        $this->form_validation->set_rules('nama_peminjam', 'Nama', 'trim');


        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('name')])->row_array();
        $data['barang'] = $this->db->get('barang')->result_array();

        $data['tittle'] = 'Tambah Peminjam | Aplikasi Inventaris Barang';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('peminjam/tambah', $data);
        $this->load->view('template/footer');


        if ($this->form_validation->run()) {

            $data = [

                'nama_peminjam' => $this->input->post('nama_peminjam'),
                'id_barang_pinjam' => $this->input->post('id_barang_pinjam'),
                'jumlah_pinjam' => $this->input->post('jumlah'),
                'tgl_pinjam' => $this->input->post('tgl_pinjam'),
                'tgl_kembali' => $this->input->post('tgl_kembali')
            ];

            $tambah = $this->db->insert('peminjam', $data);

            if($tambah)
            {
                $this->session->set_flashdata('pesan', '<div class ="alert alert-success" role="alert" >Data Berhasil Ditambah!</div>');
                redirect('peminjam/daftarPeminjam');
            }
        }
    }

    public function daftarBarang()
    {
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('name')])->row_array();

        $data['barang'] = $this->db->get('barang')->result_array();

        $data['tittle'] = 'Daftar Barang | Aplikasi Inventaris Barang';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('barang/daftar_barang', $data);
        $this->load->view('template/footer');
    }

    public function daftarPeminjam()
    {

        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('name')])->row_array();

        $this->db->select('*');
        $this->db->join('barang', 'id_barang_pinjam = id_barang');

        $data['peminjam'] = $this->db->get('peminjam')->result_array();

        $data['tittle'] = 'Daftar Peminjam | Aplikasi Inventaris Barang';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('peminjam/daftar_peminjam', $data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {

        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('name')])->row_array();
        $data['barang'] = $this->db->get_where('barang', ['id_barang' => $id])->result_array();
        $data['supplier'] = $this->db->get_where('supplier', ['id_supplier' => $id])->result_array();

        $data['tittle'] = "Edit Barang | Aplikasi Inventaris Barang";

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('barang/edit', $data);
        $this->load->view('template/footer');
    }

    public function update()
    {
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('name')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'trim');

        if ($this->form_validation->run()) {

            $this->User_model->editBarang();
        }
    }

    public function editBarang()
    {

        $data = [
            'id_barang' => $this->input->post('id_barang'),
            'nama' => $this->input->post('nama'),
            'jumlah_barang' => $this->input->post('jumlah'),
            'satuan' => $this->input->post('satuan')
        ];

        $this->db->where('id_barang', $this->input->post('id_barang'));
        $update = $this->db->update('barang', $data);

        if($update)
        {
            $this->session->set_flashdata('pesan', '<div class ="alert alert-success" role="alert" >Data Berhasil Diedit!</div>');
                redirect('barang/daftarBarang');
        }
    }

    public function editPeminjam($id)
    {
        
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('name')])->row_array();
        $data['peminjam'] = $this->db->get_where('peminjam', ['id' => $id])->result_array();
        $data['barang'] = $this->db->get('barang')->result_array();

        $data['tittle'] = 'Edit Peminjam | Aplikasi Inventaris Barang';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('peminjam/edit', $data);
        $this->load->view('template/footer');
    }

    public function updatePeminjam()
    {

        $data = [
            'id' => $this->input->post('id'),
            'nama_peminjam' => $this->input->post('nama_peminjam'),
            'id_barang_pinjam' => $this->input->post('id_barang_pinjam'),
            'jumlah_pinjam' => $this->input->post('jumlah'),
            'tgl_pinjam' => $this->input->post('tgl_pinjam'),
            'tgl_kembali' => $this->input->post('tgl_kembali')
            
        ];

        $this->db->where('id', $this->input->post('id'));
        $update = $this->db->update('peminjam', $data);

        if($update)
        {
            $this->session->set_flashdata('pesan', '<div class ="alert alert-success" role="alert" >Data Berhasil Diedit!</div>');
                redirect('peminjam/daftarPeminjam');
        }
    }

    public function deletePeminjam($id)
    {
        $hapus = $this->db->delete('peminjam', ['id' => $id]);

        if($hapus){
            $this->session->set_flashdata('pesan', '<div class ="alert alert-success" role="alert" >Data Berhasil Dihapus!</div>');
                redirect('peminjam/daftarPeminjam');
        }
    }

    public function user()
    {
        
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('name')])->row_array();

        $data['tittle'] = "Profile | Aplikasi Inventaris Barang";
        $data['profile'] = $this->db->get('user')->result_array();
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user/akun', $data);
        $this->load->view('template/footer');
       
    }

    public function data()
    {
        
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('name')])->row_array();
 
        $data['tittle'] = "Data User | Aplikasi Inventaris Barang";
        $data['profile'] = $this->db->get('user')->result_array();
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user/data', $data);
        $this->load->view('template/footer');
       
    }

    public function editUser($id)
    {
        
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('name')])->row_array();

        $data['tittle'] = "Edit Profile | Aplikasi Inventaris Barang";
        $data['profile'] = $this->db->get_where('user', ['id' => $id])->result_array();
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('user/edit', $data);
        $this->load->view('template/footer');
       
    }

    public function userUpdate()
    {
        $data = [

            'id' => $this->input->post('id'),
            'nama' => $this->input->post('nama'),
            'password' => $this->input->post('password')

        ];

        $this->db->where('id', $this->input->post('id'));
        $update = $this->db->update('user', $data);

        if($update)
        {
            $this->session->set_flashdata('pesan', '<div class ="alert alert-success" role="alert" >User Berhasil Diedit.Silahkan Login Kembali!</div>');
                redirect('login/logout');
        }
    }

    public function userDelete($id)
    {
        $hapus = $this->db->delete('user', ['id' => $id]);

        if($hapus){
            $this->session->set_flashdata('pesan', '<div class ="alert alert-success" role="alert" >Data Berhasil Dihapus!</div>');
                redirect('user/data');
        }
    }

    public function barangMasuk()
    {

        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('name')])->row_array();
        
        $this->db->select('*');
        $this->db->join('barang', 'id_barang_stok = id_barang');
        $this->db->join('supplier', 'supplier_id = id_supplier');
        
        $data['barang'] = $this->db->get('barang_masuk')->result_array();

        $data['tittle'] = "Barang Masuk | Aplikasi Inventaris Barang";
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('barang_masuk/index', $data);
        $this->load->view('template/footer');
    }

    public function tambahBarangMasuk()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim');
        
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('name')])->row_array();

        $data['tittle'] = "Barang Masuk | Aplikasi Inventaris Barang";
        $data['barang'] = $this->db->get('barang')->result_array();
        $data['supplier'] = $this->db->get('supplier')->result_array();
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('barang_masuk/tambah', $data);
        $this->load->view('template/footer');

        if ($this->form_validation->run()) {

            $data = [

                'tanggal_masuk' => $this->input->post('tanggal'),
                'supplier_id' => $this->input->post('supplier_id'),
                'id_barang_stok' => $this->input->post('id_barang_stok'),
                'jumlah_masuk' => $this->input->post('jumlah'),
                'kondisi' => $this->input->post('kondisi'),
                'kategori' => $this->input->post('kategori')
            ];


            $tambah = $this->db->insert('barang_masuk', $data);

            if($tambah)
            {
                $this->session->set_flashdata('pesan', '<div class ="alert alert-success" role="alert" >Data Berhasil Ditambah!</div>');
                redirect('barang/barangMasuk');
            }
        }
    }

    public function editBarangMasuk($id)
    {
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('name')])->row_array();
        $data['barang_masuk'] = $this->db->get_where('barang_masuk', ['id_barang_masuk' => $id])->result_array();
        $data['supplier'] = $this->db->get_where('supplier')->result_array();
        $data['barang'] = $this->db->get_where('barang')->result_array();

        $data['tittle'] = "Edit Barang | Aplikasi Inventaris Barang";

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('barang_masuk/edit', $data);
        $this->load->view('template/footer');
    }

    public function updateBarangMasuk()
    {
        $data = [

            'id_barang_masuk' => $this->input->post('id_barang_masuk'),
            'tanggal_masuk' => $this->input->post('tanggal'),
            'id_barang_stok' => $this->input->post('id_barang_stok'),
            'supplier_id' => $this->input->post('supplier_id'),
            'jumlah_masuk' => $this->input->post('jumlah'),
            'kondisi' => $this->input->post('kondisi'),
            'kategori' => $this->input->post('kategori')

        ];

        $this->db->where('id_barang_masuk', $this->input->post('id_barang_masuk'));
        $update = $this->db->update('barang_masuk', $data);

        if($update)
        {
            $this->session->set_flashdata('pesan', '<div class ="alert alert-success" role="alert" >Data Berhasil Diedit!</div>');
                redirect('barang/barangMasuk');
        }
    }

    public function deleteBarangMasuk($id)
    {
        $hapus = $this->db->delete('barang_masuk', ['id_barang_masuk' => $id]);

        if($hapus){
            $this->session->set_flashdata('pesan', '<div class ="alert alert-success" role="alert" >Data Berhasil Dihapus!</div>');
                redirect('barang/barangMasuk');
        }
    }

    public function barangKeluar()
    {
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('name')])->row_array();

        $this->db->select('*');
        $this->db->join('barang', 'id_barang_kel = id_barang');
        
        $data['tittle'] = "Barang Keluar | Aplikasi Inventaris Barang";
        $data['barang'] = $this->db->get('barang_keluar')->result_array();
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('barang_keluar/index', $data);
        $this->load->view('template/footer');
    }

    public function tambahBarangKeluar()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'trim');
        
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('name')])->row_array();

        $data['tittle'] = "Barang Keluar | Aplikasi Inventaris Barang";
        $data['barang'] = $this->db->get('barang')->result_array();
        $data['supplier'] = $this->db->get('supplier')->result_array();
        
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('barang_keluar/tambah', $data);
        $this->load->view('template/footer');

        if ($this->form_validation->run()) {

            $data = [

                'tanggal_keluar' => $this->input->post('tanggal'),
                'id_barang_kel' => $this->input->post('id_barang_kel'),
                'jumlah_keluar' => $this->input->post('jumlah')
            ];

            $tambah = $this->db->insert('barang_keluar', $data);

            if($tambah)
            {
                $this->session->set_flashdata('pesan', '<div class ="alert alert-success" role="alert" >Data Berhasil Ditambah!</div>');
                redirect('barang/barangKeluar');
            }
        }
    }

    public function editBarangKeluar($id)
    {
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('name')])->row_array();
        $data['barang_keluar'] = $this->db->get_where('barang_keluar', ['id_barang_keluar' => $id])->result_array();
        $data['supplier'] = $this->db->get_where('supplier')->result_array();
        $data['barang'] = $this->db->get_where('barang')->result_array();

        $data['tittle'] = "Edit Barang | Aplikasi Inventaris Barang";

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('barang_keluar/edit', $data);
        $this->load->view('template/footer');
    }

    public function updateBarangKeluar()
    {
        $data = [
            'id_barang_keluar' => $this->input->post('id_barang_keluar'),
            'tanggal_keluar' => $this->input->post('tanggal'),
            'id_barang_kel' => $this->input->post('id_barang_kel'),
            'jumlah_keluar' => $this->input->post('jumlah')
        ];

        $this->db->where('id_barang_keluar', $this->input->post('id'));
        $update = $this->db->update('barang_keluar', $data);

        if($update)
        {
            $this->session->set_flashdata('pesan', '<div class ="alert alert-success" role="alert" >Data Berhasil Diedit!</div>');
                redirect('barang/barangKeluar');
        }
    }

    public function deleteBarangKeluar($id)
    {
        $hapus = $this->db->delete('barang_keluar', ['id_barang_keluar' => $id]);

        if($hapus){
            $this->session->set_flashdata('pesan', '<div class ="alert alert-success" role="alert" >Data Berhasil Dihapus!</div>');
                redirect('barang/barangKeluar');
        }
    }

    public function getBarangById($id)
    {
        return $this->db->get_where('barang', ['id' => $id])->result_array();
    }

    
    public function editSupplier()
    {
        $data = [
            'id_supplier' => $this->input->post('id_supplier'),
            'nama_supplier' => $this->input->post('nama_supplier'),
            'no_telp' => $this->input->post('no_telp'),
            'alamat' => $this->input->post('alamat'),

        ];

        $this->db->where('id_supplier', $this->input->post('id_supplier'));
        $update = $this->db->update('supplier', $data);

        if($update)
        {
            $this->session->set_flashdata('pesan', '<div class ="alert alert-success" role="alert" >Data Berhasil Diedit!</div>');
                redirect('supplier/index');
        }
    }

    public function count($table)
    {
        return $this->db->count_all($table);
    }

    public function sum($table, $field)
    {
        $this->db->select_sum($field);
        return $this->db->get($table)->row_array()[$field];
    }
}
