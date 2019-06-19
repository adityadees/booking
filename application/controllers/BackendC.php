<?php

class BackendC extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
			$url=base_url('login');
			redirect($url);
		};
		$this->load->model('Mymod');
	}

	public function index()
	{
		$tgl =  Date('Y-m-d');
		$y['title']='Dashboard';
		$x['antrian_now'] = $this->db->query("SELECT booking_antrian from booking where booking_status='menunggu' OR booking_status='proses' and booking_tanggal='$tgl' order by booking_antrian  desc limit 1")->result();

		$this->load->view('backend/layout/header',$y);
		$this->load->view('backend/layout/topbar');
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/index',$x);
		$this->load->view('backend/layout/footer');
	}
	public function riwayat()
	{
		$y['title']='Riwayat';
		$this->load->view('backend/layout/header',$y);
		$this->load->view('backend/layout/topbar');
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/riwayat/index');
		$this->load->view('backend/layout/footer');
	}


	public function sendWhatsapp(){
		$user = $this->input->post('user');
		$message = $this->input->post('message');
		$area = '62';
		$str = $user;
		$str[0] = '';
		$nphone = $area.$str;
		$red = "https://wa.me/".$nphone."?text=".$message;

		//echo "<script>
		//window.open("."'".$red."'".");
		//</script>";
	//	redirect('admin');
		redirect($red);	

	}

}