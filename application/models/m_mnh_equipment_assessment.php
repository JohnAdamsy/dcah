<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 *model to E_Stock,E_Equipment_Assessment & E_OrtC_Assessment entities
 */
use application\models\Entities\E_Equipment_Assessment;
use application\models\Entities\E_OrtC_Assessment;
use application\models\Entities\E_Stock;
use application\models\Entities\E_Province;
use application\models\Entities\E_Facility_Owner; 
use application\models\Entities\E_Labour_And_Delivery;
use application\models\Entities\E_Sterilization_Method_Assessment;
use application\models\Entities\E_Mlw_Medication_Assessment;
use application\models\Entities\E_Mnh_Medication;
use application\models\Entities\E_Newborncare_General_Questions;
use application\models\Entities\E_Mnh_Equipment_Assessment;
use application\models\Entities\E_Deliverykit_Contents;

class M_Mnh_Equipment_Assessment  extends MY_Model {
	var $id, $attr, $frags, $elements, $noOfInserts, $batchSize,$countyList,$districtList,$fTypeList,$fLevelList,$mfcCode,$dbSessionValues,
	$facility,$commodity,$ortAssessCode, $isFacility;

	function __construct() {
		parent::__construct();
		$this->isFacility='false';
		
	}

	function addRecord() {
        $s=microtime(true); /*mark the timestamp at the beginning of the transaction*/
		 
		 $this->elements = array();
		 $this->theIds=array();
		 
		
		if ($this -> input -> post()) {//check if a post was made
		
	    //$this->addFacilityInfo();
		$this->addORTInfo();//<-
		$this->addEquipmentAssessmentInfo();
	    $this->addZincCommoditiesInfo();
		$this->addORSCommoditiesInfo();
			
			//exit;
			
			}//close the this->input->post
			$e=microtime(true);
			$this->executionTime=round($e-$s,'4');
	        $this->rowsInserted=$this->noOfInsertsBatch;
			return $this -> response = 'ok';
	} //end of addRecord()

   
   
   //methods required 1. to check if supplied facility name exists
   // 2. If facility name exists, 1. skip the facility insert but update* the facility info supplied 2. insert into the others
   //*For now, just update but later on, try to autosuggest and remind user of a need to update contact info
   
   //check if facility name exists
   

   public function facilityExists($mfc){
	     try{
			$this->facility=$this->em->getRepository('models\Entities\E_Facility')
			                       ->findOneBy( array('facilityName'=>$mfc));
			}catch(exception $ex){
				//ignore
				//die($ex->getMessage());
			}
			return $this->facility;
		
	}/*close facilityExists($mfc)*/
	
	public function getFacilityCode(){
		if ($this -> input -> post()) {//check if a post was made
			
       //Working with an object of the entity
       try{
		$this->facility = $this->em->getRepository('models\Entities\e_facility')->findOneBy(array('facilityMFC' => $this -> input -> post('username')));
	    
	    if($this->facility){
			return $this->isFacility='true';
	    }
		}catch(exception $ex){
			//ignore
				//die($ex->getMessage());
		}
		
	}//close the this->input->post
	}/*close getFacilityCode()*/
	
	public function verifyFacilityByName(){
		if ($this -> input -> post()) {//check if a post was made
			
       //Working with an object of the entity
       try{
		$this->facility = $this->em->getRepository('models\Entities\e_facility')->findOneBy(array('facilityName' => $this -> input -> post('username')));
	    
	    if($this->facility){
			return $this->isFacility='true';
	    }
		}catch(exception $ex){
			//ignore
				//die($ex->getMessage());
		}
		
	}//close the this->input->post
	}/*close verifyFacilityByName*/
	
	//checks if commodity name exists
	 public function commodityExists($cName){
	     try{
			$this->commodity=$this->em->getRepository('models\Entities\E_Commodity')
			                       ->findOneBy( array('commodityName'=>$cName));
			}catch(exception $ex){
				//ignore
				//die($ex->getMessage());
			}
			return $this->commodity;
		
	}/*close commodityExists($cName)*/
	
	private function addFacilityInfo(){
			foreach ($this -> input -> post() as $key => $val) {//For every posted values
		   
		  
		    if(substr($key,0,3)=="fac"){//select data for facilities
			     $this->attr = $key;//the attribute name
				 if (!empty($val)) {
					//We then store the value of this attribute for this element.
					// $this->elements[$this->id][$this->attr]=htmlentities($val);
					$this->elements[$this->attr]=htmlentities($val);
				   }else{
				   	$this->elements[$this->attr]='';
				   }
				   
			 }
			
			 }//close foreach ($this -> input -> post() as $key => $val)
			 
			// exit;
			
		   //get county name,district name by id
			$this->getCountyName($this->input->post('facilityCounty'));/*method defined in MY_Model*/
			$this->getDistrictName($this->input->post('facilityDistrict'));/*method defined in MY_Model*/
			
		    //get the highest value of the array that will control the number of inserts to be done
						$this->noOfInsertsBatch=1; /*only 1 facility record is expected*/
						 
						// print "max rows: ".$this->noOfInsertsBatch; exit;
						 for($i=1; $i<=$this->noOfInsertsBatch;++$i){
			 	
				//insert facility if new, else update the existing one
			   $this -> theForm = new \models\Entities\E_Facility(); //create an object of the model
		      
			 	
				$this -> theForm -> setCreatedAt(new DateTime()); /*timestamp option*/
				//$this -> theForm -> setDates($this->elements[$i]['visitDate']);;/*entry option*/
				$this -> theForm -> setFacilityName($this->input->post('facilityName'));
				$this -> theForm -> setFacilityMFC($this->input->post('facilityMFC').'1');//developer test
				$this -> theForm -> setFacilityDistrict($this->district->getDistrictName());
				$this -> theForm -> setFacilityCounty($this->county->getCountyName());
				$this -> theForm -> setFacilityContactPerson($this->input->post('facilityContactPerson'));
				//$this -> theForm -> setZincOrsDispensedFrom($this->input->post('facilityZincOrsDispensedFrom'));
				$this -> theForm -> setFacilityEmail($this->input->post('facilityEmail'));
				$this -> em -> persist($this -> theForm);
                
				try{
					
				$this -> em -> flush();
				$this->em->clear(); //detaches all objects from doctrine
				}catch(Exception $ex){
				    //die($ex->getMessage());
					/*display user friendly message*/
					
				}//end of catch

        	
				
					 } //end of innner loop
					 
	} //close addFacilityInfo
	
	private function addLNDInfo(){
		
		    foreach ($this -> input -> post() as $key => $val) {//For every posted values
		    if(substr($key,0,3)=="lnd"){//select data for facilities
			     $this->attr = $key;//the attribute name
				 if (!empty($val)) {
					//We then store the value of this attribute for this element.
					// $this->elements[$this->id][$this->attr]=htmlentities($val);
					$this->elements[$this->attr]=htmlentities($val);
				   }else{
				   	$this->elements[$this->attr]='';
				   }
				   //print $key.' val='.$val.' <br />';
			 }
			
			 }//close foreach ($this -> input -> post() as $key => $val)
			 
			 //exit;
				
		        //get the highest value of the array that will control the number of inserts to be done
						$this->noOfInsertsBatch=1; //only 1 ort corner record inserted
						 
						 
						 for($i=1; $i<=$this->noOfInsertsBatch;++$i){
			 	
				//insert facility if new, else update the existing one
			   $this -> theForm = new \models\Entities\E_Labour_And_Delivery(); //create an object of the model
		      
			 	
				$this -> theForm -> setCreatedAt(new DateTime()); /*timestamp option*/
				$this -> theForm -> setFacilityCode($this->input->post('facilityMFC'));
				$this -> theForm -> setQuestion1($this->elements['ortQuestion1']);
				$this -> theForm -> setQuestion2($this->elements['ortQuestion2']);
				if($this->elements['ortDehydrationLocation']==''){
					$this->elements['ortDehydrationLocation']='N/A';
				}
				$this -> theForm -> setLocationOfDehydrationUnit($this->elements['ortDehydrationLocation']);
				$this -> theForm -> setDateOfAssessment($this->input->post('facilityDateOfInventory'));
				$this -> em -> persist($this -> theForm);
						
						//now do a batched insert
			
			  
			try{
					
				$this -> em -> flush();
					//retrieve id of the last insert to use in in equipment assessment
				//$this -> em -> refresh($this -> theForm);
				
				$this->ortAssessCode=$this->theForm->getOrtAssessmentCode();
				//print ('last id: '.$this->ortAssessCode);exit;
				
				$this->em->clear(); //detaches all objects from doctrine
				
				}catch(Exception $ex){
				    //die($ex->getMessage());
					/*display user friendly message*/
					
				}//end of catch
				
			
					 } //end of innner loop	
	}//close addORTInfo
	
	private function addEquipmentAssessmentInfo(){
		$count=1;$finalCount=0;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
		    if(substr($key,0,5)=="equip"){//select data for equipment
			   //we separate the attribute name from the number
					
				  $this->frags = explode("_", $key);
				   
				  //$this->id = $this->frags[1];  // the id
				
				 $this->id = $count;  // the id
				    
				  
				  $this->attr = $this->frags[0];//the attribute name
				  
				  
				     //mark the end of 1 row...for record count
				if($this->attr=="equipBudgetPresent"){
					//print 'count at:'.$count.'<br />';
					$finalCount=$count;
					 $count++;
					 // print 'DOM: '.$key.' Attr: '.$this->attr.' val='.$val.' id='.$this->id.' <br />';
				}
				  
				 if (!empty($val)) {
					//We then store the value of this attribute for this element.
					 $this->elements[$this->id][$this->attr]=htmlentities($val);
					//$this->elements[$this->attr]=htmlentities($val);
				   }else{
				   	$this->elements[$this->id][$this->attr]='';
				   }
				 
				
				   
			 }
			
			 }//close foreach ($this -> input -> post() as $key => $val)
			// print var_dump($this->elements);
			// exit;
		    
		          //get the highest value of the array that will control the number of inserts to be done
				  $this->noOfInsertsBatch=$finalCount;
						 
						 
						 for($i=1; $i<=$this->noOfInsertsBatch;++$i){
			 	
				//insert facility if new, else update the existing one
			   $this -> theForm = new \models\Entities\E_Equipment_Assessment(); //create an object of the model
			   
		       //return the id of the last ORT assessment insert to use it in this subsequent equipment assessment
			 	
				//$this -> theForm -> setCreatedAt(new DateTime()); /*timestamp option*/
				$this -> theForm -> setEquipmentCode($this->elements[$i]['equipCode']);
				$this -> theForm -> setOrtCode($this->ortAssessCode);
				$this -> theForm -> setEquipmentAvailable($this->elements[$i]['equipAvailable']);
				$this -> theForm -> setQuantity($this->elements[$i]['equipQuantity']);
				$this -> theForm -> setSupplierName($this->elements[$i]['equipSupplier']);
				$this -> theForm -> setBudgetKept($this->elements[$i]['equipBudgetPresent']);
				$this -> em -> persist($this -> theForm);
						
						//now do a batched insert, default at 5
			  $this->batchSize=5;
			if($i % $this->batchSize==0){
			try{
					
				$this -> em -> flush();
				$this->em->clear(); //detaches all objects from doctrine
				}catch(Exception $ex){
				    //die($ex->getMessage());
					/*display user friendly message*/
					
				}//end of catch
				
			} else if($i<$this->batchSize || $i>$this->batchSize || $i==$this->noOfInsertsBatch && 
			$this->noOfInsertsBatch-$i<$this->batchSize){
				 //total records less than a batch, insert all of them
				try{
					
				$this -> em -> flush();
				$this->em->clear(); //detactes all objects from doctrine
				}catch(Exception $ex){
					//die($ex->getMessage());
					/*display user friendly message*/
					
				}//end of catch
				 
				
			}//end of batch condition
					 } //end of innner loop	
					 
					 
	}//close addEquipmentAssessmentInfo
	
	private function addZincCommoditiesInfo(){
		 	
		 $count=1;$finalCount=0;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
		    if(substr($key,0,2)=="zn"){//select data for zn commodities
			   //we separate the attribute name from the number
					
				  $this->frags = explode("_", $key);
				   
				  //$this->id = $this->frags[1];  // the id
				
				$this->id = $count;  // the id
				    
				  
				  $this->attr = $this->frags[0];//the attribute name
				  
				  //mark the end of 1 row...for record count
				if($this->attr=="znStockComments"){
					//print 'count at:'.$count.'<br />';
					$finalCount=$count;
					 $count++;
				}
				 
				 if (!empty($val)) {
					//We then store the value of this attribute for this element.
					 $this->elements[$this->id][$this->attr]=htmlentities($val);
					//$this->elements[$this->attr]=htmlentities($val);
				   }else{
				   	$this->elements[$this->id][$this->attr]='';
				   }
				 // print $this->attr.' val='.$val.' id='.$this->id.' <br />';
				  //print $key.' val='.$this->elements[$this->id][$this->attr].'<br />';
				  
			 }//close  if(substr($key,0,2)=="zn")
			
			 }//close foreach ($this -> input -> post() as $key => $val)
			// print 'Record count at:'.$finalCount.'<br />';
			 //exit;	
			
		  //get the record count that will control the number of inserts to be done        
		  $this->noOfInsertsBatch=$finalCount;
						 
						 
		for($i=1; $i<=$this->noOfInsertsBatch;++$i){
			 	
				//insert facility if new, else update the existing one
			   $this -> theForm = new \models\Entities\E_Stock(); //create an object of the model
			 	
				$this -> theForm -> setCreatedAt(new DateTime()); /*timestamp option*/
				$this -> theForm -> setStockBatchNo($this->elements[$i]['znStockBatchNo']);
				$this -> theForm -> setStockQuantity($this->elements[$i]['znStockQuantity']);
				$this -> theForm -> setStockDateDispensed($this->elements[$i]['znStockDispensedDate']);
				$this -> theForm -> setStockSupplier($this->elements[$i]['znStockSupplier']);
				$this -> theForm -> setStockExpiryDate($this->elements[$i]['znStockExpiryDate']);
				$this -> theForm -> setStockComments($this->elements[$i]['znStockComments']);
				$this -> theForm -> setStockCommodityType($this->elements[$i]['znCommodityName']);
				$this -> theForm -> setStockFacility($this->input->post('facilityMFC'));
				$this -> theForm -> setStockDateOfInventory($this->input->post('facilityDateOfInventory'));
				$this -> em -> persist($this -> theForm);
						
						//now do a batched insert, default at 5
			  $this->batchSize=5;
			if($i % $this->batchSize==0){
			try{
					
				$this -> em -> flush();
				$this->em->clear(); //detaches all objects from doctrine
				}catch(Exception $ex){
				    //die($ex->getMessage());
					/*display user friendly message*/
					
				}//end of catch
				
			} else if($i<$this->batchSize || $i>$this->batchSize || $i==$this->noOfInsertsBatch && 
			$this->noOfInsertsBatch-$i<$this->batchSize){
				 //total records less than a batch, insert all of them
				try{
					
				$this -> em -> flush();
				$this->em->clear(); //detactes all objects from doctrine
				}catch(Exception $ex){
					//die($ex->getMessage());
					/*display user friendly message*/
					
				}//end of catch
				 
				
			}//end of batch condition
					 } //end of innner loop	
	}//close addZincCommoditiesInfo
	
	private function addORSCommoditiesInfo(){
		
		 $count=1;$finalCount=0;
		foreach ($this -> input -> post() as $key => $val) {//For every posted values
		    if(substr($key,0,3)=="ors"){//select data for ors commodities
			   //we separate the attribute name from the number
					
				  $this->frags = explode("_", $key);
				   
				  $this->id = $this->frags[1];  // the id
				  
				  //$this->id = $count;  // the id
				    
				  
				  $this->attr = $this->frags[0];//the attribute name
				  
				   //mark the end of 1 row...for record count
				if($this->attr=="orsStockComments"){
					//print 'count at:'.$count.'<br />';
					$finalCount=$count;
					 $count++;
				}
				  
				  
				 if (!empty($val)) {
					//We then store the value of this attribute for this element.
					 $this->elements[$this->id][$this->attr]=htmlentities($val);
					//$this->elements[$this->attr]=htmlentities($val);
				   }else{
				   	$this->elements[$this->attr]='';
				   }
				  // print $this->attr.' val='.$val.' id='.$this->id.' <br />';
				  
			 }//close if(substr($key,0,3)=="ors")
			
			 }//close foreach ($this -> input -> post() as $key => $val)
			 
			// print 'Record count at:'.$finalCount.'<br />';
			 
			// exit;	
		
		 //get the highest value of the array that will control the number of inserts to be done

		$this->noOfInsertsBatch=$finalCount;		 
						 
		for($i=1; $i<=$this->noOfInsertsBatch;++$i){
			 	
				//insert facility if new, else update the existing one
			   $this -> theForm = new \models\Entities\E_Stock(); //create an object of the model
			   
		       //return the id of the last ORT assessment insert to use it in this subsequent equipment assessment
			 	
				$this -> theForm -> setCreatedAt(new DateTime()); /*timestamp option*/
				$this -> theForm -> setStockBatchNo($this->elements[$i]['orsStockBatchNo']);
				$this -> theForm -> setStockQuantity($this->elements[$i]['orsStockQuantity']);
				$this -> theForm -> setStockDateDispensed($this->elements[$i]['orsStockDispensedDate']);
				$this -> theForm -> setStockSupplier($this->elements[$i]['orsStockSupplier']);
				$this -> theForm -> setStockExpiryDate($this->elements[$i]['orsStockExpiryDate']);
				$this -> theForm -> setStockComments($this->elements[$i]['orsStockComments']);
				$this -> theForm -> setStockCommodityType($this->elements[$i]['orsCommodityName']);
				$this -> theForm -> setStockFacility($this->input->post('facilityMFC'));
				$this -> theForm -> setStockDateOfInventory($this->input->post('facilityDateOfInventory'));
				$this -> em -> persist($this -> theForm);
						
						//now do a batched insert, default at 5
			  $this->batchSize=5;
			if($i % $this->batchSize==0){
			try{
					
				$this -> em -> flush();
				$this->em->clear(); //detaches all objects from doctrine
				}catch(Exception $ex){
				    //die($ex->getMessage());
					/*display user friendly message*/
					
				}//end of catch
				
			} else if($i<$this->batchSize || $i>$this->batchSize || $i==$this->noOfInsertsBatch && 
			$this->noOfInsertsBatch-$i<$this->batchSize){
				 //total records less than a batch, insert all of them
				try{
					
				$this -> em -> flush();
				$this->em->clear(); //detactes all objects from doctrine
				}catch(Exception $ex){
					//die($ex->getMessage());
					/*display user friendly message*/
					
				}//end of catch
				 
				
			}//end of batch condition
					 } //end of innner loop	
	}// addORSCommoditiesInfo();
	
	//fetch prexisting data about the facilities
	public function retrieveMFLInformation(){
		$this->countyList=$this->getAllCountyNames();
		$this->districtList=$this->getAllDistrictNames();
		$this->fTypeList=$this->getAllFacilityTypes();
		$this->fLevelList=$this->getAllFacilityLevels();
		$this->dbSessionValues=array($this->district,$this->county,$this->fTypeList,$this->fLevelList);
		//var_dump($this->dbSessionValues[3]);exit;
		return $this->dbSessionValues;
	}

	
	/*retrieve form files by factory*/
	function retrieveFacilityInfo($mfc){
	      /*using DQL*/
	      try{
	      //geting server side param: $store=$this->uri->segment(param_position_from_base_url);
	      $query = $this->em->createQuery('SELECT f FROM models\Entities\e_facility f WHERE f.facilityMFC= :fcode');
		  $query->setParameter('fcode',$mfc);
          
          $this->formRecords = $query->getArrayResult();
		 
		  if(max($this->formRecords) !=0)
		  $this->response=array('rData'=>$this->formRecords);
		 //json format
		 $this->formRecords= json_encode($this->response);
		 // var_dump($this->formRecords);

		  }catch(exception $ex){
		  	//ignore
		    //die($ex->getMessage());
		  	return false;
		  }
		 
		   return true;
		   
	}/*close retrieveForms($factory)*/
	
}//end of class M_Zinc_Ors_Inventory 
