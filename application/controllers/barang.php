<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        

        $this->load->library('form_validation');
        $this->load->model('User_model');
       
    }

    public function tambahBarang()
    {
        $this->User_model->tambahBarang();        
    }

    public function daftarBarang()
    {
        $this->User_model->daftarBarang();
    }

    public function edit($id)
    {
        $this->User_model->edit($id);
    }

    public function update()
    {
        $this->User_model->update();
    }

    public function delete($id)
    {
        $this->User_model->hapus($id);
    }

    public function barangMasuk()
    {
        $this->User_model->barangMasuk();
    }

    public function tambahBarangMasuk()
    {
        $this->User_model->tambahBarangMasuk();
    }

    public function barangKeluar()
    {
        $this->User_model->barangKeluar();
    }

    public function tambahBarangKeluar()
    {
        $this->User_model->tambahBarangKeluar();
    }

    public function editBarangKeluar($id)
    {
        $this->User_model->editBarangKeluar($id);
    }

    public function updateBarangKeluar()
    {
        $this->User_model->updateBarangKeluar();
    }

    public function deleteBarangKeluar($id)
    {
        $this->User_model->deleteBarangKeluar($id);
    }

    public function editBarangMasuk($id)
    {
        $this->User_model->editBarangMasuk($id);
    }

    public function updateBarangMasuk()
    {
        $this->User_model->updateBarangMasuk();
    }

    public function deleteBarangMasuk($id)
    {
        $this->User_model->deleteBarangMasuk($id);
    }

}