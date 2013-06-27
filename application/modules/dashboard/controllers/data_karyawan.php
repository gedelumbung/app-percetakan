<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_karyawan extends CI_Controller {

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
			
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_data_karyawan($GLOBALS['site_limit_medium'],$uri);
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/data_karyawan/bg_home");
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
			
			$d['id_param'] = "";
			$d['nama_karyawan'] = "";
			$d['gaji_pokok'] = "";
			$d['alamat'] = "";
			$d['st'] = "tambah";
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/data_karyawan/bg_input");
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
			
			$id['id_karyawan'] = $id_param;
			$get = $this->db->get_where("dlmbg_karyawan",$id)->row();
			$d['id_param'] = $get->id_karyawan;
			$d['nama_karyawan'] = $get->nama_karyawan;
			$d['alamat'] = $get->alamat;
			$d['gaji_pokok'] = $get->gaji_pokok;
			$d['st'] = "edit";
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/data_karyawan/bg_input");
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
			$id['id_karyawan'] = $_POST['id_param'];
			$dt['nama_karyawan'] = $_POST['nama_karyawan'];
			$dt['alamat'] = $_POST['alamat'];
			$dt['gaji_pokok'] = $_POST['gaji_pokok'];
			$st = $_POST['st'];
			
			if($st=="tambah")
			{
				$this->db->insert("dlmbg_karyawan",$dt);
				redirect("dashboard/data_karyawan");
			}
			else if($st=="edit")
			{
				$this->db->update("dlmbg_karyawan",$dt,$id);
				redirect("dashboard/data_karyawan");
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
			$id['id_karyawan'] = $id_param;
			$get = $this->db->delete("dlmbg_karyawan",$id);
			redirect("dashboard/data_karyawan");
		}
		else
		{
			redirect("login");
		}
	}
}
