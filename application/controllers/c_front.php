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
			
		$data['form'] = '<p>Please input your Facility Name.<p>';
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
		<li class="form-link a">
			MNCH Commodity Assessment Tool Instructions
		</li>
		<section class="form-instructions a">
			<ol>
				<li>
					Instructions for the User page
				</li>
				<ol>
					<li>
						Upload the  signed letter by the Head of the two divisions- I will send you a soft copy of this
					</li>
					<li>
						Section the instructions as per the following
					</li>
				</ol>
				<li>
					Start
				</li>
				<ol>
					<li>
						To begin with the data entry, type in the name of the facility you are entering data for. Select the correct facility from the list that the system will provide.
					</li>
					<li>
						The system will upload the Master Facility Code (MFL) for the facility you have selected automatically. Confirm if this is your MFL code. If it is not, ensure that the facility name you have selected is the correct one.
					</li>
				</ol>
				<li>
					Facility Registration
				</li>
				<ol>
					<li>
						Once you entered the facility name, the facility registration page will load.
					</li>
					<li>
						The system will automatically upload the following information:  facility type, level of care, ownership/management, and district, county. If this information is not uploaded automatically, complete with the correct information.
					</li>
					<li>
						Complete the facility-in-charge information section with the following: name, telephone contact & email contact
					</li>
				</ol>

				<li>
					Assessment Tools Page
				</li>
				<ol>
					<li>
						The MNCH tools should be completed one at a time. You cannot move to the next tool without fully completing the first one.
					</li>
					<li>
						The system will load on two tabs at the top
					</li>
					<li>
						Child Health Commodities, Supplies & Equipment Assessment
					</li>
					<li>
						Maternal and Newborn health commodities, supplies & equipment assessment
					</li>
					<li>
						The two tools should be completed by ALL facilities.
					</li>
					<li>
						Select the assessment tool you would like to begin with then when done move to the next one.
					</li>
				</ol>
			</ol>
		</section>
		<li class="form-link c">
			Child Assessment Form
		</li>
		<section class="form-instructions c" >
			<ol>
				<li>
					The assessment will focus on the following:
				</li>
				<ol>
					<li>
						Commodities: Zinc sulphate 20mg, low –Osmolarity oral rehydration salts (ORS), Ciprofloxacin, and Metronidazole
					</li>
					<li>
						Supplies & Equipment:  Supplies and equipment available at the oral rehydration therapy corners in the facility
					</li>
				</ol>
				<li>
					The tool has 6 tabs from which data on the commodities should be collected from.
					These are points where children are managed or where the commodities are stored and which might have stocks.
				</li>
				<li>
					Please note you cannot proceed to the next tab, the next section or the next form without fully
					completing all the section in the 6 tabs.  Where stocks are not available, indicate zero (o) quantities and proceed to the next step.
				</li>
				<li>
					In the case of the options, there are two possible scenarios (YES or NO).
				</li>

				<ol>
					<li>
						If YES
					</li>
					<ol>
						<li>
							All dependent fields remain active or selectable.
						</li>
					</ol>
					<li>
						If NO
					</li>
					<ol>
						<li>
							All dependent fields become inactive or unselectable.
						</li>
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
					The assessment will focus on the following:
				</li>
				<ol>
					<li>
						Basic emergency obstetric and new born care commodities, supplies & equipment
					</li>
					<li>
						Some sections of the tool will
						have a provision for definite answers- YES/NO – these will limit you to choose only one response
					</li>
					<li>
						Some sections in the tool may allow for multiple sections.
					</li>
				</ol>
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
					<li>
						If YES
					</li>
					<ol>
						<li>
							All dependent fields remain active or selectable.
						</li>
					</ol>
					<li>
						If NO
					</li>
					<ol>
						<li>
							All dependent fields become inactive or unselectable.
						</li>
					</ol>
				</ol>

			</ol>
		</section>
	</ol>

</ol>

';

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