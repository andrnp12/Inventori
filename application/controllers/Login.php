<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}


    public function index()
    {

		if ($this->session->userdata('name')) {
			redirect('user');
		}

		$this->form_validation->set_rules('name', 'Name', 'trim');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run() == false){ 
			$data['tittle'] = 'Halaman Login Inventori';
			$this->load->view('template/auth_header', $data);
			$this->load->view('login/login');
			$this->load->view('template/auth_footer');

		}else{

			$this->_login();

		}
	}	

	private function _login()
	{

		$name = $this->input->post('name');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['nama' => $name])->row_array();

		if($user) {
			
			//usernya ada
			if (password_verify($password, $user['password'])) {

				$data = ['name' => $user['nama']];
				$this->session->set_userdata($data);
				redirect('user');
			} else {

				$this->session->set_flashdata('message', '<div class ="alert alert-danger" role="alert" >Password Salah!</div>');
				redirect('login');

			}
			
		} else {

			$this->session->set_flashdata('message', '<div class ="alert alert-danger" role="alert" >Username Salah!</div>');
			redirect('login');

		}

	}
	
	public function registrasi()
	{

		$data['user'] = $this->db->get_where('user', ['nama' => $this->session->userdata('name')])->row_array();


		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]',[
			'min_length' => 'password terlalu pendek!'
		]);


		if($this->form_validation->run() == false){

			$data['tittle'] = 'Registrasi Admin Inventori';
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('login/registrasi', $data);
			$this->load->view('template/footer');

		}else{
			
			$data =[

				'nama' => $this->input->post('name'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('pesan', '<div class ="alert alert-success" role="alert" >Selamat! akun telah berhasil di buat</div>');
			redirect('user/user');
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('name');
		$this->session->set_flashdata('message', '<div class ="alert alert-success" role="alert" >Anda Logged Out!</div>');
		redirect('login');
		
	}
}
