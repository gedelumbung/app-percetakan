<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('pdf_create'))
{
	function pdf_create($html, $filename, $stream=FALSE) 
	{
		require_once("dompdf/dompdf_config.inc.php");
		spl_autoload_register('DOMPDF_autoload');
		
		$dompdf = new DOMPDF();
		$dompdf->load_html($html);
		$dompdf->set_paper("A4");
		$dompdf->render();
		if ($stream) 
		{
			$dompdf->stream($filename.".pdf");
		} else 
		{
			$CI =& get_instance();
			$CI->load->helper('file');
			write_file("./pdf-report/".$filename.".pdf", $dompdf->output());
			$file = "./pdf-report/".$filename.".pdf";
			
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header("Content-Type: application/force-download");
			header('Content-Disposition: attachment; filename=' . urlencode(basename($file)));
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			ob_clean();
			flush();
			readfile($file);
			exit;
			unlink($file);
		}
	}
}
