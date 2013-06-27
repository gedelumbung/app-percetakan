<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pembayaran extends CI_Controller {

	function index($uri=0)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['mark_dashboard'] = "";
			$d['mark_pelanggan'] = "";
			$d['mark_user'] = "";
			$d['mark_bahan'] = "";
			$d['mark_pemesanan'] = "";
			$d['mark_pembayaran'] = "active";
			$d['mark_jenis_cetakan'] = "";
			$d['mark_jenis_satuan'] = "";
			
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_data_pembayaran($GLOBALS['site_limit_medium'],$uri);
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/pembayaran/bg_home");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("login");
		}
	}

	function edit($id_param,$id_pemesanan)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['mark_dashboard'] = "";
			$d['mark_pelanggan'] = "";
			$d['mark_user'] = "";
			$d['mark_bahan'] = "";
			$d['mark_pemesanan'] = "";
			$d['mark_pembayaran'] = "active";
			$d['mark_jenis_cetakan'] = "";
			$d['mark_jenis_satuan'] = "";
			
			$get = $this->db->select("*")->join("dlmbg_pemesanan","dlmbg_pemesanan.kode_pemesanan=dlmbg_pembayaran.kode_pemesanan")->get_where("dlmbg_pembayaran",array("kode_pembayaran"=>$id_param))->row();
			
			$d['kode_pembayaran'] = $get->kode_pembayaran;
			$d['no_nota'] = $get->kode_pemesanan;
			$d['tgl_bayar'] = $get->tgl_bayar;
			$d['uang_muka'] = $get->uang_muka;
			$d['jumlah_total'] = $get->jumlah_harga;
			$d['jumlah_harga'] = $get->jumlah_harga-$get->uang_muka;
			$d['jumlah_harga'] = $get->jumlah_harga-$get->uang_muka;
			$d['status_pembayaran'] = $get->status_pembayaran;
			$d['bayar'] = $get->bayar;
			
			$get_head = $this->db->get_where("dlmbg_pemesanan",array("kode_pemesanan"=>$get->kode_pemesanan))->row();
			if($this->session->userdata("kode_pelanggan")=="")
			{
				$set_sess_head['kode_pelanggan'] = $get_head->kode_pelanggan;
				$this->session->set_userdata($set_sess_head);
			}
			$d['tgl_pesan'] = $get_head->tgl_pesan;
			$d['tgl_selesai'] = $get_head->tgl_selesai;
			$d['status_pembayaran'] = $get_head->status_pembayaran;
			
			$get_detail = $this->db->query("select a.kode_jenis_cetakan, a.jumlah, b.harga, b.nama_cetakan, b.satuan from dlmbg_pemesanan_detail a left join 
			(select x.nama_cetakan, y.satuan,  x.harga, x.kode_jenis_cetakan from dlmbg_jenis_cetakan x left join dlmbg_jenis_satuan y on x.id_jenis_satuan=y.id_jenis_satuan) 
			b on a.kode_jenis_cetakan=b.kode_jenis_cetakan where a.kode_pemesanan='".$id_pemesanan."'");
			
			$in_cart = array();
			foreach($get_detail->result() as $dpd)
			{
				$in_cart[] = array(
				'id'      => $dpd->kode_jenis_cetakan,
				'qty'     => $dpd->jumlah,
				'price'   => $dpd->harga,
				'name'    => $dpd->nama_cetakan,
				'options' => array('Satuan' => $dpd->satuan));
			}
			$this->cart->insert($in_cart);
			
			$d['pelanggan'] = $this->db->get("dlmbg_pelanggan");
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/pembayaran/bg_edit");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("login");
		}
	}

	function cetak($id_param)
	{
		if($this->session->userdata("logged_in")!="")
		{
			$d['mark_dashboard'] = "";
			$d['mark_pelanggan'] = "";
			$d['mark_user'] = "";
			$d['mark_bahan'] = "";
			$d['mark_pemesanan'] = "";
			$d['mark_pembayaran'] = "active";
			$d['mark_jenis_cetakan'] = "";
			$d['mark_jenis_satuan'] = "";
			
			$get = $this->db->get_where("dlmbg_pembayaran",array("kode_pemesanan"=>$id_param))->row();
			
			$d['kode_pembayaran'] = $get->kode_pembayaran;
			$d['no_nota'] = $get->kode_pemesanan;
			$d['tgl_bayar'] = $get->tgl_bayar;
			$d['bayar'] = $get->bayar;
			
			$get_head = $this->db->get_where("dlmbg_pemesanan",array("kode_pemesanan"=>$get->kode_pemesanan))->row();
			if($this->session->userdata("kode_pelanggan")=="")
			{
				$set_sess_head['kode_pelanggan'] = $get_head->kode_pelanggan;
				$this->session->set_userdata($set_sess_head);
			}
			$d['tgl_pesan'] = $get_head->tgl_pesan;
			$d['tgl_selesai'] = $get_head->tgl_selesai;
			$d['jumlah_harga'] = $get_head->jumlah_harga;
			$d['status_pembayaran'] = $get_head->status_pembayaran;
			
			$get_detail = $this->db->query("select a.kode_jenis_cetakan, a.jumlah, b.harga, b.nama_cetakan, b.satuan from dlmbg_pemesanan_detail a left join 
			(select x.nama_cetakan, y.satuan,  x.harga, x.kode_jenis_cetakan from dlmbg_jenis_cetakan x left join dlmbg_jenis_satuan y on x.id_jenis_satuan=y.id_jenis_satuan) 
			b on a.kode_jenis_cetakan=b.kode_jenis_cetakan where a.kode_pemesanan='".$id_param."'");
			
			$in_cart = array();
			foreach($get_detail->result() as $dpd)
			{
				$in_cart[] = array(
				'id'      => $dpd->kode_jenis_cetakan,
				'qty'     => $dpd->jumlah,
				'price'   => $dpd->harga,
				'name'    => $dpd->nama_cetakan,
				'options' => array('Satuan' => $dpd->satuan));
			}
			$this->cart->insert($in_cart);
			
			$d['pelanggan'] = $this->db->get("dlmbg_pelanggan");
 			
			$html = $this->load->view($GLOBALS['site_theme']."/pembayaran/bg_cetak",$d, true);
			pdf_create($html,$id_param.time()."");
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
			$id['kode_pembayaran'] = $this->input->post('kode_pembayaran');
			$id['kode_pemesanan'] = $this->input->post('no_nota');
			$d_header['tgl_bayar'] = $this->input->post('tgl_bayar');
			$d_header['bayar'] = $this->input->post('bayar');
			
			$up['status_pembayaran'] = $this->input->post('status_pembayaran');
			$this->db->update("dlmbg_pemesanan",$up,array("kode_pemesanan" => $id['kode_pemesanan']));
			
			$this->db->update("dlmbg_pembayaran",$d_header,$id);
			$this->session->unset_userdata('kode_pelanggan');
			$this->session->unset_userdata('tgl_pesan');
			$this->session->unset_userdata('tgl_selesai');
			$this->session->unset_userdata('jumlah_harga');
			$this->cart->destroy();
			redirect("dashboard/pembayaran/edit/".$id['kode_pembayaran']."/".$id['kode_pemesanan']."");
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
			$id['kode_pembayaran'] = $id_param;
			$this->db->delete("dlmbg_pembayaran",$id);
			redirect("dashboard/pembayaran");
		}
		else
		{
			redirect("login");
		}
	}
}
