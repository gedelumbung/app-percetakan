<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class belum_lunas extends CI_Controller {

	function index($uri=0)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['mark_dashboard'] = "";
			$d['mark_pelanggan'] = "";
			$d['mark_user'] = "";
			$d['mark_bahan'] = "";
			$d['mark_pemesanan'] = "";
			$d['mark_pembayaran'] = "";
			$d['mark_jenis_cetakan'] = "";
			$d['mark_jenis_satuan'] = "";
			$d['mark_belum_lunas'] = "active";
			
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_data_belum_lunas($GLOBALS['site_limit_medium'],$uri);
			$this->session->unset_userdata('kode_pelanggan');
			$this->session->unset_userdata('tgl_pesan');
			$this->session->unset_userdata('tgl_selesai');
			$this->session->unset_userdata('jumlah_harga');
			$this->cart->destroy();
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/belum_lunas/bg_home");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("login");
		}
	}

	function set()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$set['key'] = $_POST['key'];
			$set['key_search'] = $_POST['key_search'];
			$this->session->set_userdata($set);
			redirect("dashboard/belum_lunas");
		}
		else
		{
			redirect("login");
		}
	}
}
