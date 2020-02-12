<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model');

    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('name')])->row_array();
        $data['supplier'] = $this->db->get('supplier')->result_array();

        $data['tittle'] = 'Daftar Supplier | Aplikasi Inventaris Barang';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('supplier/index', $data);
        $this->load->view('template/footer');
        
    }

    public function tambahSupplier()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim');

        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('name')])->row_array();

        $data['tittle'] = 'Tambah Supplier | Aplikasi Inventaris Barang';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('supplier/tambah', $data);
        $this->load->view('template/footer');


        if ($this->form_validation->run()) {

            $data = [

                'nama_supplier' => $this->input->post('nama_supplier'),
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat'),
            ];

            $tambah = $this->db->insert('supplier', $data);
            if($tambah) 
            {
                $this->session->set_flashdata('pesan', '<div class ="alert alert-success" role="alert" >Data Berhasil Ditambah!</div>');
                redirect('supplier/index');
            }
            
    }
}

    public function edit($id)
    {
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('name')])->row_array();
        $data['supplier'] = $this->db->get_where('supplier', ['id_supplier' => $id])->result_array();
        $data['tittle'] = "Edit Supplier | Aplikasi Inventaris Barang";

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('supplier/edit', $data);
        $this->load->view('template/footer');
    }

    public function update()
    {
        $data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('name')])->row_array();
        

        $this->form_validation->set_rules('nama', 'Nama', 'trim');

        if ($this->form_validation->run()) {

            $this->User_model->editSupplier();
            redirect('supplier/index');
        }
    }

    public function editSupplier()
    {
        $this->User_model->editSupplier();
    }

    public function hapus($id)
    {
        $hapus = $this->db->delete('supplier', ['id_supplier' => $id]);
        if($hapus)
        {
            $this->session->set_flashdata('pesan', '<div class ="alert alert-success" role="alert" >Data Berhasil Dihapus!</div>');
                redirect('supplier/index');
        }
    }

    
}