<?php

class BackendC extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
			$url=base_url('login');
			redirect($url);
		};
		$this->load->model('Mymod');
		$this->data['uid'] = $_SESSION['user_id'];
	}

	public function index()
	{
		$tgl =  Date('Y-m-d');
		$y['title']='Dashboard';
		if ($_SESSION['user_role'] == 'admin') {
			$x['antrian_list'] = $this->Mymod->antrian(date('Y-m-d'));
			$x['antrian_anda'] = $this->Mymod->get_antrian_num(date('Y-m-d'),$this->data['uid']);
			$x['antrian_now'] = $this->Mymod->antrian_last(date('Y-m-d'));
		} else {
			$x['antrian_now'] = $this->Mymod->antrian_last(date('Y-m-d'));
			$x['antrian_anda'] = $this->Mymod->get_antrian_num(date('Y-m-d'),$this->data['uid']);
			$x['getpick'] = $this->Mymod->getpick();
			$x['recent'] = $this->Mymod->recent($this->data['uid']);
			$x['kdantrian'] = $this->Mymod->get_last_row('booking',['booking_tanggal'=> date('Y-m-d')],'booking_antrian');
		}
		$x['montir'] = $this->Mymod->GetDataJoinNW([
			'pickup' => 'montir_id',
			'montir' => 'montir_id',
		], 'right');

		$this->load->view('backend/layout/header',$y);
		$this->load->view('backend/layout/topbar');
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/index',$x);
		$this->load->view('backend/layout/footer');
	}
	public function riwayat()
	{
		$y['title']='Riwayat';
		if ($_SESSION['user_role']=='admin') {
			$x['history'] = $this->Mymod->history('');
		} else {
			$x['history'] = $this->Mymod->history($this->data['uid']);
		}
		$this->load->view('backend/layout/header',$y);
		$this->load->view('backend/layout/topbar');
		$this->load->view('backend/layout/sidebar');
		$this->load->view('backend/history/history',$x);
		$this->load->view('backend/layout/footer');
	}

	public function riwayat_detail()
	{
		$y['title']='Riwayat';
		$segment=$this->uri->segment(3);
		$where=[
			't1.booking_kode'=>$segment,
		];
		$jtable=[
			'booking' => 'booking_kode',
			'transaksi' => 'booking_kode',
			'user' => 'user_id',
		];
		$data = $this->Mymod->GetDataJoinArr($jtable,$where);
		$y['title']='Invoice';
		$x['data'] = $data->row_array();

		$this->load->view('backend/layout/header',$y);
		$this->load->view('backend/history/history_detail',$x);
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


	public function get_antrian(){
		$gantrian = $this->Mymod->get_antrian_num(date('Y-m-d'),$this->data['uid']);
		$kdantrian = $this->Mymod->get_last_row('booking',['booking_tanggal'=> date('Y-m-d')],'booking_antrian');

		if(!isset($kdantrian)){
			$antrian = 1;
		} else {
			$antrian = $kdantrian->booking_antrian+1;
		}
		if(count($gantrian) == 0){
			$nama = $this->input->post('nama');
			$plat = $this->input->post('plat');
			$layanan = $this->input->post('layanan');
			$kendala = $this->input->post('kendala');

			if($layanan == 'service'){
				$jenis = 'SC';
			} else if($layanan == 'sparepart'){
				$jenis = 'SP';
			} else {
				$this->session->set_flashdata('error', 'Silahkan pilih jenis layanan anda');
				redirect(base_url('dashboard'));
			}

			$kode = $jenis.rand(0,999).rand(0,10).$this->data['uid'].time();
			$data= [
				'booking_kode'	=> $kode,
				'user_id'	=> $this->data['uid'],
				'booking_plat'	=> $plat,
				'booking_antrian'	=> $antrian,
				'booking_layanan'	=> $layanan,
				'booking_kendala'	=> $kendala,
				'booking_tanggal'	=> date('Y-m-d')
			];

			$q = $this->Mymod->InsertData('booking',$data);
			if($q==1){
				$this->session->set_flashdata('success', 'Anda berhasil mengambil nomor antrian');
				redirect(base_url('dashboard'));
			} else {
				$this->session->set_flashdata('error', 'Gagal mengambil nomor antrian');
				redirect(base_url('dashboard'));
			}
		} else {
			$this->session->set_flashdata('error', 'Anda sudah memiliki nomor antrian');
			redirect(base_url('dashboard'));
		}
	}

	public function konfirmasi_antrian(){
		$est = $this->input->post('est');
		$kode = $this->input->post('kode');
		$montir_id = $this->input->post('montir');
		$date = new DateTime(date("Y-m-d H:i"));
		$date->add(new DateInterval('PT'.$est.'M'));
		$date =  $date->format('Y-m-d H:i:s');

		$data= [
			'booking_kode'	=> $kode,
			'montir_id'	=> $montir_id,
			'pickup_est_selesai'	=> $date,
		];

		$q = $this->Mymod->InsertData('pickup',$data);
		if($q==1){
			$r = $this->Mymod->UpdateData('booking',['booking_status' => 'proses'],['booking_kode' => $kode]);
			if($r==1){
				$this->session->set_flashdata('success', 'Berhasil memproses data');
				redirect(base_url('dashboard'));
			} else {
				$this->session->set_flashdata('error', 'Gagal memproses data');
				redirect(base_url('dashboard'));
			}
		} else {
			$this->session->set_flashdata('error', 'Gagal memproses data');
			redirect(base_url('dashboard'));
		}

	}


	public function konfirmasi_selesai(){
		$kode = $this->input->post('kode');
		$biaya = $this->input->post('biaya');
		$rincian = $this->input->post('rincian');
		$q = $this->Mymod->ViewDataWhere('pickup',['booking_kode' => $kode]);
		$montir_id = $q[0]->montir_id; 
		$pickup_id = $q[0]->pickup_id; 
		$data= [
			'booking_kode'	=> $kode,
			'montir_id'	=> $montir_id,
			'transaksi_biaya'	=> $biaya,
			'transaksi_keterangan'	=> $rincian,
			'transaksi_tanggal'	=> date('Y-m-d H:i:s'),
		];
		$q = $this->Mymod->InsertData('transaksi',$data);
		if($q==1){
			$r = $this->Mymod->UpdateData('booking',['booking_status' => 'selesai'],['booking_kode' => $kode]);
			if($r==1){
				$s = $this->Mymod->DeleteData('pickup',['pickup_id' => $pickup_id]);
				if($s==1){
					$this->session->set_flashdata('success', 'Berhasil memproses data');
					redirect(base_url('dashboard'));
				} else {
					$this->session->set_flashdata('error', 'Gagal memproses data');
					redirect(base_url('dashboard'));
				}
			} else {
				$this->session->set_flashdata('error', 'Gagal memproses data');
				redirect(base_url('dashboard'));
			}
		} else {
			$this->session->set_flashdata('error', 'Gagal memproses data');
			redirect(base_url('dashboard'));
		}

	}


	public function konfirmasi_batal()
	{
		$kode = $this->input->post('kode');

		$r = $this->Mymod->UpdateData('booking',['booking_status' => 'batal'],['booking_kode' => $kode]);
		if($r==1){
			$this->session->set_flashdata('success', 'Berhasil menghapus data');
			redirect(base_url('dashboard'));
		} else {
			$this->session->set_flashdata('error', 'Gagal memproses data');
			redirect(base_url('dashboard'));
		}
	}

}