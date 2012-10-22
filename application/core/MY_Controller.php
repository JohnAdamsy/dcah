<?php
## Extend CI_Controller to include Doctrine Entity Manager

class  MY_Controller  extends  CI_Controller {

	public $em, $response, $theForm, $rowsInserted, $executionTime, $data, $selectCommodityType, $facilities, $selectCounties, $selectDistricts, $selectFacilityType, $selectFacilityLevel;

	function __construct() {
		parent::__construct();

		/* Instantiate Doctrine's Entity manage so we don't have
<<<<<<< HEAD
		 to everytime we want to use Doctrine */

		$this -> em = $this -> doctrine -> em;
		$this -> response = '';
		$this -> theForm = '';
		$this -> data = '';
		$this -> selectCounties = $this -> selectDistricts = $selectFacilityType = $selectFacilityLevel = '';
		$this -> getCountyNames();
		$this -> getDisctrictNames();
		$this -> getFacilityLevels();
		$this -> getFacilityTypes();
=======
		   to everytime we want to use Doctrine */
		   
		$this->em = $this->doctrine->em;
		$this->response='';
		$this->theForm='';
		$this->data='';
		$this->selectCounties=$this->selectDistricts=$selectFacilityType=$selectFacilityLevel='';
		$this->getCountyNames();$this->getDisctrictNames();$this->getFacilityLevels();$this->getFacilityTypes();
>>>>>>> upstream/master
	}

	function getRepositoryByFormName($form) {
		$this -> the_form = $this -> em -> getRepository($form);
		return $this -> theForm;
	}
<<<<<<< HEAD

	public function getDisctrictNames() {/*obtained from the session data*/
		if ($this -> session -> userdata('allDistricts'))
			//  print var_dump($this -> session -> userdata('allDistricts'));exit;
			foreach ($this -> session -> userdata('allDistricts') as $key => $value) {
				$this -> selectDistricts .= '<option value="' . $value['districtID'] . '">' . $value['districtName'] . '</option>' . '<br />';
			}

		//var_dump($this -> session -> userdata('allDistricts')); exit;
		return $this -> selectDistricts;

	}

	public function getCountyNames() {/*obtained from the session data*/
		if ($this -> session -> userdata('allCounties'))
			//  print var_dump($this -> session -> userdata('allCounties'));exit;
			foreach ($this -> session -> userdata('allCounties') as $key => $value) {
				$this -> selectCounties .= '<option value="' . $value['countyID'] . '">' . $value['countyName'] . '</option>' . '<br />';
			}

		//var_dump($this -> session -> userdata('allCounties')); exit;
		return $this -> selectCounties;

	}

	public function getFacilityTypes() {/*obtained from the session data*/
		if ($this -> session -> userdata('allFacilityTypes'))
			//  print var_dump($this -> session -> userdata('allFacilityTypes'));exit;
			foreach ($this -> session -> userdata('allFacilityTypes') as $key => $value) {
				$this -> selectFacilityType .= '<option value="' . $value['facilityTypeID'] . '">' . $value['facilityType'] . '</option>' . '<br />';
			}

		//var_dump($this -> session -> userdata('allFacilityTypes')); exit;
		return $this -> selectFacilityType;

	}

	public function getFacilityLevels() {/*obtained from the session data*/
		if ($this -> session -> userdata('allFacilityLevels'))
=======
	
	public function getDisctrictNames(){/*obtained from the session data*/
			  if($this -> session -> userdata('allDistricts') )
			//  print var_dump($this -> session -> userdata('allDistricts'));exit;
				foreach($this -> session -> userdata('allDistricts') as $key=>$value){
				 $this->selectDistricts.= '<option value="'.$value['districtID'].'">'.$value['districtName'].'</option>'.'<br />';
				}
				
				//var_dump($this -> session -> userdata('allDistricts')); exit;
				return $this->selectDistricts;
			
		}

    public function getCountyNames(){/*obtained from the session data*/
			  if($this -> session -> userdata('allCounties') )
			//  print var_dump($this -> session -> userdata('allCounties'));exit;
				foreach($this -> session -> userdata('allCounties') as $key=>$value){
				 $this->selectCounties.= '<option value="'.$value['countyID'].'">'.$value['countyName'].'</option>'.'<br />';
				}
				
				//var_dump($this -> session -> userdata('allCounties')); exit;
				return $this->selectCounties;
			
		}
	
	public function getFacilityTypes(){/*obtained from the session data*/
			  if($this -> session -> userdata('allFacilityTypes') )
			//  print var_dump($this -> session -> userdata('allFacilityTypes'));exit;
				foreach($this -> session -> userdata('allFacilityTypes') as $key=>$value){
				 $this->selectFacilityType.= '<option value="'.$value['facilityTypeID'].'">'.$value['facilityType'].'</option>'.'<br />';
				}
				
				//var_dump($this -> session -> userdata('allFacilityTypes')); exit;
				return $this->selectFacilityType;
			
		}

	public function getFacilityLevels(){/*obtained from the session data*/
			  if($this -> session -> userdata('allFacilityLevels'))
>>>>>>> upstream/master
			// print var_dump($this -> session -> userdata('allCounties'));exit;
			foreach ($this -> session -> userdata('allFacilityLevels') as $key => $value) {
				$this -> selectFacilityLevel .= '<option value="' . $value['facilityLevelID'] . '">' . $value['facilityLevel'] . '</option>' . '<br />';
			}

		//var_dump($this -> session -> userdata('allFacilityLevels')); exit;
		return $this -> selectFacilityLevel;

	}

}
