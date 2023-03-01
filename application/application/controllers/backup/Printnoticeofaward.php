<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Printnoticeofaward extends CI_Controller {

	/**
	 * Example: FPDF 
	 *
	 * Documentation: 
	 * http://www.fpdf.org/ > Manual
	 *
	 */
	public function index() {	
		$this->load->library('fpdf_gen');
		//$this->fpdf->WriteHTML("<b>BOLD</b>");
		$this->fpdf->SetFont('Arial','B',16);
		$this->fpdf->Cell(40,10,'Hello World!<br>test');
		$this->fpdf->Image(40,10,'');
		//$pdf->MultiCell(190,10,$this->fpdf->WriteHTML("<b>BOLD</b>"));
		echo $this->fpdf->Output('hello_world.pdf','D');
	}	

    
}
