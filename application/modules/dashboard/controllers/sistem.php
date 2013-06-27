<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sistem extends CI_Controller {

   public function index($uri=0)
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
			
			$d['dt_retrieve'] = $this->app_load_data_model->generate_index_sistem($GLOBALS['site_limit_medium'],$uri);
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/sistem/bg_home");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("auth/user_login");
		}
   }
   
   public function edit($id_param)
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
			
			$where['id_setting'] = $id_param;
			$get = $this->db->get_where("dlmbg_setting",$where)->row();
			
			$d['tipe'] = $get->tipe;
			$d['title'] = $get->title;
			$d['content_setting'] = $get->content_setting;
			
			$d['id_param'] = $get->id_setting;
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/sistem/bg_input");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("auth/user_login");
		}
   }
 
   public function simpan()
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
			
			$id['id_setting'] = $this->input->post("id_param");
			$in['tipe'] = $this->input->post("tipe");
			$in['title'] = $this->input->post("title");
			$in['content_setting'] = $this->input->post("content_setting");
			
			$this->db->update("dlmbg_setting",$in,$id);
			
			redirect("dashboard/sistem");
		}
		else
		{
			redirect("auth/user_login");
		}
   }
}
 
