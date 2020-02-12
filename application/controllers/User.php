<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model');
       
    }

    public function index()
    {
        $this->User_model->index();
    }

    public function user()
    {
        $this->User_model->user();
    }

    public function editUser($id)
    {
        $this->User_model->editUser($id);
    }

    public function userUpdate()
    {
        $this->User_model->userUpdate();
    }

    public function userDelete($id)
    {
        $this->User_model->userDelete($id);
    }

    public function data()
    {
        $this->User_model->data();
    }
    

}
