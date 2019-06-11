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

}