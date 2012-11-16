<?php
class C_Pdf extends MY_Controller {

	public function index() {
		$this -> load -> library('mpdf');
		$this -> mpdf -> WriteHTML('<p>Hallo World</p>');
		$this -> mpdf -> Output();
	}

	public function generatePDF() {

	}

	public function child_health_assessment() {
		//$stylesheet = file_get_contents(base_url().'css/styles.css');
		//$html= $this->load->view('form_child_health');
		$html = $this ->load->view('form_child_health');
		$this -> load -> library('mpdf');
		$this -> mpdf = new mPDF('', 'A4-L', 0, '', 15, 15, 16, 16, 9, 9, '');
		$this -> mpdf -> SetTitle('Test');
		$this -> mpdf -> WriteHTML('Test PDF');
		$this -> mpdf -> simpleTables = true;
		$this -> mpdf -> WriteHTML('<br/>');
		$this -> mpdf -> WriteHTML($html);
		$report_name = 'Test' . ".pdf";
		$this -> mpdf -> Output($report_name, 'D');

	}

	public function maternal_health_assessment() {
		$this -> load -> library('mpdf');
		$this -> mpdf -> WriteHTML('<p>Hallo World</p>');
		$this -> mpdf -> Output();

	}

}
