<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {


	public function __construct(){
		parent::__construct();
		// $this->load->library('form_validation');
		$this->load->model('Auth_model', 'auth');
	}

	public function index()
	{
		$this->load->view('pages/auth/login.php');
	}

	public function process()
	{
		# code...
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->db->from('user');
		$this->db->where('Username', $username);
		$check = $this->db->get()->row();

		if ($check == null) {
			# code...
			$this->session->set_flashdata('error', 'Username not found');
			$this->load->view('pages/auth/login.php');
		} elseif ($password == $check->Password) {
			# code...
			$data = [
				'UserID' => $check->UserID,
				'username' => $username,
				'NamaLengkap' => $check->NamaLengkap,
				'Email' => $check->Email,
				'Password' => $check->Password,
				'Alamat' => $check->Alamat,
				'level' => $check->level
			];
			
			$this->session->set_userdata($data);
			$this->session->set_flashdata('success', 'Login Successfully !!');
			redirect('Index');
		} else {
			# code...
			$this->session->set_flashdata('error', 'Wrong Password');
			$this->load->view('pages/auth/login');
		}
	}
}
