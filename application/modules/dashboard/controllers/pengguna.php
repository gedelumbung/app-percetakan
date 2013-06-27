<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pengguna extends CI_Controller {

	function index($uri=0)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['mark_dashboard'] = "";
			$d['mark_pelanggan'] = "";
			$d['mark_user'] = "active";
			$d['mark_bahan'] = "";
			$d['mark_pemesanan'] = "";
			$d['mark_pembayaran'] = "";
			$d['mark_jenis_cetakan'] = "";
			$d['mark_jenis_satuan'] = "";
			
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_data_pengguna($GLOBALS['site_limit_medium'],$uri);
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/pengguna/bg_home");
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
			$d['mark_user'] = "active";
			$d['mark_bahan'] = "";
			$d['mark_pemesanan'] = "";
			$d['mark_pembayaran'] = "";
			$d['mark_jenis_cetakan'] = "";
			$d['mark_jenis_satuan'] = "";
			
			$d['id_param'] = "";
			$d['nama_user'] = "";
			$d['username'] = "";
			$d['st'] = "tambah";
			$d['level'] = "";
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/pengguna/bg_input");
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
			$d['mark_user'] = "active";
			$d['mark_bahan'] = "";
			$d['mark_pemesanan'] = "";
			$d['mark_pembayaran'] = "";
			$d['mark_jenis_cetakan'] = "";
			$d['mark_jenis_satuan'] = "";
			
			$id['kode_user'] = $id_param;
			$get = $this->db->get_where("dlmbg_user",$id)->row();
			$d['id_param'] = $get->kode_user;
			$d['username'] = $get->username;
			$d['nama_user'] = $get->nama_user;
			$d['level'] = $get->level;
			$d['st'] = "edit";
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/pengguna/bg_input");
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
			$id['kode_user'] = $_POST['id_param'];
			$dt['username'] = $_POST['username'];
			$dt['nama_user'] = $_POST['nama_user'];
			$dt['level'] = $_POST['level'];
			$st = $_POST['st'];
			
			if($st=="tambah")
			{
				$dt['password'] = md5($_POST['password'].$GLOBALS['key_login']);
				$this->db->insert("dlmbg_user",$dt);
				redirect("dashboard/pengguna");
			}
			else if($st=="edit")
			{
				if(empty($_POST['password']))
				{
					$this->db->update("dlmbg_user",$dt,$id);
				}
				else
				{
					$dt['password'] = md5($_POST['password'].$GLOBALS['key_login']);
					$this->db->update("dlmbg_user",$dt,$id);
				}
				redirect("dashboard/pengguna");
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
			$id['kode_user'] = $id_param;
			$get = $this->db->delete("dlmbg_user",$id);
			redirect("dashboard/pengguna");
		}
		else
		{
			redirect("login");
		}
	}
}
