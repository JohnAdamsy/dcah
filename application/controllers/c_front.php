<?php
class C_Front extends CI_Controller {
	var $data;
	var $instructions;

	public function __construct() {

		parent::__construct();
	    $this->data=array();

	}

	public function index() {
		if(!$this -> session -> userdata('fCode')){
			
		$data['form'] = '<p>Your MFL Name/Code is required.<p>';
		$this -> load -> view('index', $data); //landing page
	    }else{
			$this->inventory();
		}
		//dashboard
		
		//$this->inventory();
		//redirect(base_url() . 'c_auth/index', 'refresh');
		
	}//End of index file
	

	public function inventory() {
		//print 'sess val: '.var_dump($this->session->all_userdata()); die;
		if($this -> session -> userdata('fCode')){
		$data['status']="";
		$data['response']="";
		$data['form'] = '

						<h3>Form Guide</h3>
						
						<ol start="1" type="1|a|A|i|I">
							<li>
								Please click on one of the two forms below for instructions
							</li>
							<ol start="a">
								<li class="form-link c">
									Child Assessment Form
								</li>
								<section class="form-instructions c" >
									<ol>
										<li>
											The <b><em>Date</em></b> is automatically registered as the date the form was filled.
										</li>
										<li>
											The <b><em>Facility Details</em></b> are pre-filled.
										</li>
										<li>
											Please fill the Facility Contact details.
										</li>
										<li>
											In the case of the options, there are two possible scenarios (YES or NO).
										</li>
										
										<ol>
											<li>If YES</li>
											<ol>
												<li>All dependent fields remain active or selectable.</li>
											</ol>
											<li>If NO</li>
											<ol>
												<li>All dependent fields become inactive or unselectable.</li>
											</ol>
										</ol>
						
									</ol>
								</section>
								<li class="form-link m">
									Maternal & New-Born Health Assessment
								</li>
								<section class="form-instructions m" >
									<ol>
										<li>
											The <b><em>Date</em></b> is automatically registered as the date the form was filled.
										</li>
										<li>
											The <b><em>Facility Details</em></b> are pre-filled.
										</li>
										<li>
											Please fill the Facility Contact details.
										</li>
										<li>
											In the case of the options, there are two possible scenarios (YES or NO).
										</li>
										
										<ol>
											<li>If YES</li>
											<ol>
												<li>All dependent fields remain active or selectable.</li>
											</ol>
											<li>If NO</li>
											<ol>
												<li>All dependent fields become inactive or unselectable.</li>
											</ol>
										</ol>
						
									</ol>
								</section>
							</ol>
						
						</ol>';

		$data['form_id']='';
		$this -> load -> view('pages/inventory/index', $data);
		}else{
			redirect(base_url() . 'c_front', 'refresh');
		}
		//echo 'inventory';
	}

	public function formviewer() {
		$data['form'] = '<p class="error"><br/><br/>Click on any of the tabs to continue<br/><br/><p>';
		$this -> load -> view('form', $data);
	}
	
	public function reports() {
		$data['status']="";
		$data['response']="";
		$data['form'] = '<p class="error"><br/><br/>No report has been chosen<br/><br/><p>';
		$data['form_id']='';
		$this -> load -> view('reports', $data);
		//echo 'Vehicles';
	}
	
}