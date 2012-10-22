<?php
namespace models\Entities;

	/**
	 * @Entity
	 * @Table(name="county")
	 */
 class E_county{
 	
   /**
	* @Id
	* @Column(name="nbcAssessmentID", type="integer", length=11, nullable=false)
	* @GeneratedValue(strategy="AUTO")
	* */
	private $nbcAssessmentID;
	
   /**
	* @Column(name="facilityCode", type="string",length=45, nullable=false)
	* */
	private $facilityCode;
	
	  /**
	* @Column(name="newbornResuscitated", type="string",length=45, nullable=false)
	* */
	private $newbornResuscitated;
	
	  /**
	* @Column(name="bloodTransfusionDone", type="string",length=45, nullable=false)
	* */
	private $bloodTransfusionDone;
	
	  /**
	* @Column(name="bloodBank", type="string",length=45, nullable=false)
	* */
	private $bloodBank;
	
	  /**
	* @Column(name="csDone", type="string",length=45, nullable=false)
	* */
	private $csDone;
	
	  /**
	* @Column(name="numberOfCaeserian", type="string",length=45, nullable=false)
	* */
	private $numberOfCaeserian;
	
	  /**
	* @Column(name="dateOfAssessment", type="datetime",length=45, nullable=false)
	* */
	private $dateOfAssessment;
	
	  /**
	* @Column(name="createdAt", type="date",length=45, nullable=false)
	* */
	private $createdAt;
	 
	public function getNbcAssessmentID() {
			return $this -> nbcAssessmentID;
	}
	
	public function setNbcAssessmentID($nbcAssessmentID) { $this -> nbcAssessmentID = $nbcAssessmentID;
	}
	 
	public function getFacilityCode() {
			return $this -> facilityCode;
	}
	
	public function setFacilityCode($facilityCode) { $this -> facilityCode = $facilityCode;
	}
	
	public function getNewbornResuscitated() {
			return $this -> newbornResuscitated;
	}
	
	public function setNewbornResuscitated($countyName) { $this -> countyName = $countyName;
	}
	
	public function getBloodTransfusionDone() {
			return $this -> bloodTransfusionDone;
	}
	
	public function setBloodTransfusionDone($bloodTransfusionDone) { $this -> bloodTransfusionDone = $bloodTransfusionDone;
	}
	
	public function getBloodBank() {
			return $this -> bloodBank;
	}
	
	public function setBloodBank($bloodBank) { $this -> bloodBank = $bloodBank;
	}
	
	public function getCsDone() {
			return $this -> csDone;
	}
	
	public function setCsDone($csDone) { $this -> csDone = $csDone;
	}
	
	public function getNumberOfCaeserian() {
			return $this -> numberOfCaeserian;
	}
	
	public function setNumberOfCaeserian($numberOfCaeserian) { $this -> numberOfCaeserian = $numberOfCaeserian;
	}
	
	public function getDateOfAssessment() {
			return $this -> dateOfAssessment;
	}
	
	public function setDateOfAssessment($dateOfAssessment) { $this -> dateOfAssessment = $dateOfAssessment;
	}
	
	public function getCreatedAt() {
			return $this -> createdAt;
	}
	
	public function setCreatedAt($createdAt) { $this -> createdAt = $createdAt;
	}
}
?>