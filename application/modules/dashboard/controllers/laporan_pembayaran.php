<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan_pembayaran extends CI_Controller {

	function index()
	{
		if($this->session->userdata("logged_in")!="")
		{
			redirect("dashboard");
		}
		else
		{
			redirect("login");
		}
	}

	function harian($uri=0)
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
			
			$cari = $this->session->userdata("tgl_cari");
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_laporan_pembayaran("harian",$cari,$GLOBALS['site_limit_medium'],$uri);
			$d['tgl_cari'] = $this->session->userdata("tgl_cari");
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/laporan_pembayaran/bg_home_harian");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("login");
		}
	}

	function bulanan($uri=0)
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
			
			$cari = $this->session->userdata("bulan_cari");
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_laporan_pembayaran("bulanan",$cari,$GLOBALS['site_limit_medium'],$uri);
			$d['bulan_cari'] = $this->session->userdata("bulan_cari");
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/laporan_pembayaran/bg_home_bulanan");
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
			$st = $_POST['jenis'];
			if($st=="harian")
			{
				$set['tgl_cari'] = $_POST['tgl'];
				$this->session->set_userdata($set);
				redirect("dashboard/laporan_pembayaran/harian");
			}
			else if($st=="bulanan")
			{
				$set['bulan_cari'] = $_POST['bulan'];
				$this->session->set_userdata($set);
				redirect("dashboard/laporan_pembayaran/bulanan");
			}
		}
		else
		{
			redirect("login");
		}
	}
}
