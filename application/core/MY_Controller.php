<?php
## Extend CI_Controller to include Doctrine Entity Manager

class  MY_Controller  extends  CI_Controller {

	public $em, $response, $theForm, $rowsInserted, $executionTime, $data, 
	$selectCommodityType, $facilities, $selectCounties, 
	$selectDistricts, $selectFacilityType, $selectFacilityLevel,$selectFacilityOwner,$selectProvince;

	function __construct() {
		parent::__construct();

		/* Instantiate Doctrine's Entity manage so we don't have

		   to everytime we want to use Doctrine */
		   
		$this->em = $this->doctrine->em;
		$this->response=$this->theForm=$this->data='';
		$this->selectCounties=$this->selectDistricts=$selectFacilityType=$selectFacilityLevel=$selectProvince=$selectFacilityOwner='';
		$this->getCountyNames();$this->getDisctrictNames();$this->getFacilityLevels();
		$this->getFacilityTypes();$this->getFacilityOwners();$this->getProvinceNames();


	}

	function getRepositoryByFormName($form) {
		$this -> the_form = $this -> em -> getRepository($form);
		return $this -> theForm;
	}

	
	public function getProvinceNames(){/*obtained from the session data*/
			  if($this -> session -> userdata('allProvinces') )
			//  print var_dump($this -> session -> userdata('allProvinces'));exit;
				foreach($this -> session -> userdata('allProvinces') as $key=>$value){
				 $this->selectProvince.= '<option value="'.$value['provinceID'].'">'.$value['provinceName'].'</option>'.'<br />';
				}
				
				//var_dump($this -> session -> userdata('allProvinces')); exit;
				return $this->selectProvince;
			
		}

	
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

			// print var_dump($this -> session -> userdata('allFacilityLevels'));exit;

			foreach ($this -> session -> userdata('allFacilityLevels') as $key => $value) {
				$this -> selectFacilityLevel .= '<option value="' . $value['facilityLevelID'] . '">' . $value['facilityLevel'] . '</option>' . '<br />';
			}

		//var_dump($this -> session -> userdata('allFacilityLevels')); exit;
		return $this -> selectFacilityLevel;

	}

	public function getFacilityOwners(){/*obtained from the session data*/
			  if($this -> session -> userdata('allFacilityOwners'))
			// print var_dump($this -> session -> userdata('allFacilityOwners'));exit;
			foreach ($this -> session -> userdata('allFacilityOwners') as $key => $value) {
				$this -> selectFacilityOwner .= '<option value="' . $value['facilityOwnerID'] . '">' . $value['facilityOwner'] . '</option>' . '<br />';
			}

		//var_dump($this -> session -> userdata('allFacilityOwners')); exit;
		return $this -> selectFacilityOwner;

	}

}
