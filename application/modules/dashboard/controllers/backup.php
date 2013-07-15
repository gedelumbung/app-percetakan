<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backup extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 * @keterangan : Controller untuk melakukan backup database
	 **/
	
	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek))
		{
			$this->db->query("TRUNCATE TABLE dlmbg_sessions");
			$nama_file = 'backup-'.date('d-m-Y').'.txt.zip';
			$this->load->dbutil();
			$backup = $this->dbutil->backup();
			force_download($nama_file,$backup);
		}
		else
		{
			$st = $this->session->userdata('stts');
			if($st=='admin')
			{
				header('location:'.base_url().'app');
			}
			else
			{
				header('location:'.base_url().'front');
			}
		
		}
	}
}

/* End of file backup.php */
/* Location: ./application/controllers/backup.php */