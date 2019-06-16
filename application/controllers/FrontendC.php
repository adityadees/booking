<?php

class FrontendC extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Mymod');
	}

	public function index()
	{
		$y['title'] = 'Home';
	//	$this->load->view('frontend/layout/header',$y);
	//	$this->load->view('frontend/slider/slider');
		$this->load->view('frontend/index');
	//	$this->load->view('frontend/layout/footer');

	}

	public function register(){
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$repassword = $this->input->post('repassword');
		$alamat = $this->input->post('alamat');
		$tgl = $this->input->post('resdate');
		$tel = $this->input->post('phone');

		$table = 'user';
		$data = [
			'user_nama'	=> $nama,
			'user_email'	=> $email,
			'user_username'	=> $username,
			'user_password'	=> md5($password),
			'user_alamat'	=> $alamat,
			'user_tgl'	=> $tgl,
			'user_tel'	=> $tel,
			'user_role'	=> 'customer',
		];
		$cek = $this->Mymod->ViewDataWhere('user',['user_username' => $username]);

		if(count($cek) == 0){
			if($password == $repassword){
				$q = $this->Mymod->InsertData($table,$data);
				if($q==1){
					$this->session->set_flashdata('success', 'Akun anda telah berhasil dibuat!');
					redirect(base_url());
				} else {
					$this->session->set_flashdata('error', 'Akun anda gagal dibuat!');
					redirect(base_url());
				}
			} else {
				$this->session->set_flashdata('error', 'Password Tidak Sama');
				redirect(base_url());
			}
		} else {
			$this->session->set_flashdata('error', 'Username Telah Terpakai');
			redirect(base_url());
		}
	}
}