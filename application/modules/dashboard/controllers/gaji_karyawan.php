<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gaji_karyawan extends CI_Controller {

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
			$d['mark_belum_lunas'] = "";
			
			$cari = $this->session->userdata("bulan_cari");
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_gaji_karyawan($cari,$GLOBALS['site_limit_medium'],$uri);
			$d['bulan_cari'] = $cari;
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/gaji_karyawan/bg_home");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("login");
		}
	}

	function tambah()
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
			$d['mark_belum_lunas'] = "";
			
			$d['id_param'] = "";
			$d['id_karyawan'] = "";
			$d['tanggal'] = "";
			$d['st'] = "tambah";
			
			$d['karyawan'] = $this->db->get("dlmbg_karyawan");
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/gaji_karyawan/bg_input");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("login");
		}
	}

	function edit($id_param)
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
			$d['mark_belum_lunas'] = "";
			
			$id['id_gaji_karyawan'] = $id_param;
			$get = $this->db->get_where("dlmbg_gaji_karyawan",$id)->row();
			$d['id_param'] = $get->id_gaji_karyawan;
			$d['id_karyawan'] = $get->id_karyawan;
			$d['tanggal'] = $get->tanggal;
			$d['st'] = "edit";
			
			$d['karyawan'] = $this->db->get("dlmbg_karyawan");
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/gaji_karyawan/bg_input");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("login");
		}
	}

	function simpan()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$id['id_gaji_karyawan'] = $_POST['id_param'];
			$dt['id_karyawan'] = $_POST['id_karyawan'];
			$dt['tanggal'] = $_POST['tanggal'];
			$st = $_POST['st'];
			
			if($st=="tambah")
			{
				$this->db->insert("dlmbg_gaji_karyawan",$dt);
				redirect("dashboard/gaji_karyawan");
			}
			else if($st=="edit")
			{
				$this->db->update("dlmbg_gaji_karyawan",$dt,$id);
				redirect("dashboard/gaji_karyawan");
			}
		}
		else
		{
			redirect("login");
		}
	}

	function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$id['id_gaji_karyawan'] = $id_param;
			$get = $this->db->delete("dlmbg_gaji_karyawan",$id);
			redirect("dashboard/gaji_karyawan");
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
			$set['bulan_cari'] = $_POST['bulan'];
			$this->session->set_userdata($set);
			redirect("dashboard/gaji_karyawan");
		}
		else
		{
			redirect("login");
		}
	}
}
