<?php
namespace models\Entities;

/**
 * @Entity
 * @Table(name="mnh_equipment_assessment")
 */
class E_mnh_equipment_assessment {

	/**
	 * @Id
	 * @Column(name="assessmentID", type="integer", length=11, nullable=false)
	 * @GeneratedValue(strategy="AUTO")
	 * */
	private $assessmentID;

	/**
	 * @Column(name="facilityCode", type="string",length=45, nullable=false)
	 * */
	private $facilityCode;

	/**
	 * @Column(name="equipmentCode", type="string",length=45, nullable=false)
	 * */
	private $equipmentCode;

	/**
	 * @Column(name="available", type="string",length=45, nullable=false)
	 * */
	private $available;

	/**
	 * @Column(name="quantityAvailable", type="integer",length=11, nullable=false)
	 * */
	private $quantityAvailable;

	/**
	 * @Column(name="functioning", type="string",length=45, nullable=false)
	 * */
	private $functioning;

	/**
	 * @Column(name="quantityFunctioning", type="string",length=45, nullable=false)
	 * */
	private $quantityFunctioning;

	/**
	 * @Column(name="equipmentType", type="string",length=45, nullable=false)
	 * */
	private $equipmentType;

	/**
	 * @Column(name="questionSection", type="string",length=45, nullable=false)
	 * */
	private $questionSection;

	/**
	 * @Column(name="dateOfAssessment", type="date",length=45, nullable=false)
	 * */
	private $dateOfAssessment;

	/**
	 * @Column(name="createdAt", type="datetime",length=45, nullable=false)
	 * */
	private $createdAt;

	/**
	 * @Column(name="updatedAt", type="datetime",length=45, nullable=false)
	 * */
	private $updatedAt;

	public function getAssessmentID() {
		return $this -> assessmentID;
	}

	public function setAssessmentID($assessmentID) { $this -> assessmentID = $assessmentID;
	}

	public function getFacilityCode() {
		return $this -> facilityCode;
	}

	public function setFacilityCode($facilityCode) { $this -> facilityCode = $facilityCode;
	}

	public function getEquipmentCode() {
		return $this -> equipmentCode;
	}

	public function setEquipmentCode($equipmentCode) { $this -> equipmentCode = $equipmentCode;
	}

	public function getAvailable() {
		return $this -> available;
	}

	public function setAvailable($available) { $this -> available = $available;
	}

	public function getQuantityAvailable() {
		return $this -> quantityAvailable;
	}

	public function setQuantityAvailable($quantityAvailable) { $this -> quantityAvailable = $quantityAvailable;
	}

	public function getFunctioning() {
		return $this -> functioning;
	}

	public function setFunctioning($functioning) { $this -> functioning = $functioning;
	}

	public function getQuantityFunctioning() {
		return $this -> quantityFunctioning;
	}

	public function setQuantityFunctioning($quantityFunctioning) { $this -> quantityFunctioning = $quantityFunctioning;
	}

	public function getEquipmentType() {
		return $this -> equipmentType;
	}

	public function setEquipmentType($equipmentType) { $this -> equipmentType = $equipmentType;
	}

	public function getQuestionSection() {
		return $this -> questionSection;
	}

	public function setQuestionSection($questionSection) { $this -> questionSection = $questionSection;
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

	public function getUpdatedAt() {
		return $this -> updatedAt;
	}

	public function setUpdatedAt($updatedAt) { $this -> updatedAt = $updatedAt;
	}

}
?>