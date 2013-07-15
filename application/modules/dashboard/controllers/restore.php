<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Restore extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 * @keterangan : Controller untuk manajemen restore data ke database
	 **/
	
	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek))
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
			
 			$this->load->view($GLOBALS['site_theme']."/bg_header");
 			$this->load->view($GLOBALS['site_theme']."/bg_left",$d);
 			$this->load->view($GLOBALS['site_theme']."/restore/bg_home");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			$st = $this->session->userdata('stts');
			if($st=='admin')
			{
				header('location:'.base_url().'dashboard');
			}
			else
			{
				header('location:'.base_url().'');
			}
		}
	}
	
	public function upload()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek))
		{
			$acak=rand(00000000000,99999999999);
			$bersih=$_FILES['userfile']['name'];
			$nm=str_replace(" ","_","$bersih");
			$pisah=explode(".",$nm);
			$nama_murni_lama = preg_replace("/^(.+?);.*$/", "\\1",$pisah[0]);
			$nama_murni=date('Ymd-His');
			$ekstensi_kotor = $pisah[1];
			
			$file_type = preg_replace("/^(.+?);.*$/", "\\1", $ekstensi_kotor);
			$file_type_baru = strtolower($file_type);
			
			$ubah=$acak; //tanpa ekstensi
			$n_baru = $ubah.'.'.$file_type_baru;
			
			$in['gbr'] = $n_baru;
		
			$config['upload_path'] = './asset/db-temp/';
			$config['allowed_types'] = 'txt';
			$config['max_size'] = '1000000';
			$config['max_width'] = '100';
			$config['max_height'] = '100';		
			$config['file_name'] = $n_baru;						
			$this->load->library('upload', $config);
			
			if(!$this->upload->do_upload())
			{
				echo $this->upload->display_errors();
			}
			else 
			{
				$this->db->query("TRUNCATE TABLE dlmbg_daftar_cetak");
				$this->db->query("TRUNCATE TABLE dlmbg_gaji_karyawan");
				$this->db->query("TRUNCATE TABLE dlmbg_jenis_cetakan");
				$this->db->query("TRUNCATE TABLE dlmbg_jenis_satuan");
				$this->db->query("TRUNCATE TABLE dlmbg_karyawan");
				$this->db->query("TRUNCATE TABLE dlmbg_kwitansi");
				$this->db->query("TRUNCATE TABLE dlmbg_pelanggan");
				$this->db->query("TRUNCATE TABLE dlmbg_pembayaran");
				$this->db->query("TRUNCATE TABLE dlmbg_pemesanan");
				$this->db->query("TRUNCATE TABLE dlmbg_pemesanan_detail");
				$this->db->query("TRUNCATE TABLE dlmbg_sessions");
				$this->db->query("TRUNCATE TABLE dlmbg_setting");
				$this->db->query("TRUNCATE TABLE dlmbg_user");

				$direktori = "./asset/db-temp/".$config['file_name'];
				$isi_file=file_get_contents($direktori);
				$string_query=rtrim($isi_file, "\n;" );
				$array_query=explode(";", $string_query);
				foreach($array_query as $query)
				{
					$this->db->query($query);
				}
				unlink($direktori);
				header('location:'.base_url().'dashboard/restore');
			}
		}
		else
		{
			$st = $this->session->userdata('stts');
			if($st=='admin')
			{
				header('location:'.base_url().'dashboard');
			}
			else
			{
				header('location:'.base_url().'');
			}
		}
	}
}

/* End of file restore.php */
/* Location: ./application/controllers/restore.php */