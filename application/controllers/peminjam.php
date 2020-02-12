<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjam extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model');
       
    }

    public function tambahPeminjam()
    {
        $this->User_model->tambahPeminjam();
    }

    public function daftarPeminjam()
    {
        $this->User_model->daftarPeminjam();
    }

    public function editPeminjam($id)
    {
        $this->User_model->editPeminjam($id);
    }

    public function updatePeminjam()
    {
        $this->User_model->updatePeminjam();
    }

    public function deletePeminjam($id)
    {
        $this->User_model->deletePeminjam($id);
    }
}