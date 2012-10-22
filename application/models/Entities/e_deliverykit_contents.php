<?php
namespace models\Entities;

/**
 * @Entity
 * @Table(name="deliverykit_contents")
 */
class E_deliverykit_contents {

	/**
	 * @Id
	 * @Column(name="dkAssessmentID", type="integer", length=11, nullable=false)
	 * @GeneratedValue(strategy="AUTO")
	 * */
	private $dkAssessmentID;

	/**
	 * @Column(name="facilityCode", type="string",length=45, nullable=false)
	 * */
	private $facilityCode;

	/**
	 * @Column(name="equipmentID", type="string",length=8, nullable=false)
	 * */
	private $equipmentID;

	/**
	 * @Column(name="quentity", type="string",length=11, nullable=false)
	 * */
	private $quantity;

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

	public function getDkAssessmentID() {
		return $this -> dkAssessmentID;
	}

	public function setDkAssessmentID($dkAssessmentID) { $this -> dkAssessmentID = $dkAssessmentID;
	}

	public function getFacilityCode() {
		return $this -> facilityCode;
	}

	public function setFacilityCode($facilityCode) { $this -> facilityCode = $facilityCode;
	}

	public function getEquipmentID() {
		return $this -> equipmentID;
	}

	public function setEquipmentID($equipmentID) { $this -> equipmentID = $equipmentID;
	}

	public function getQuantity() {
		return $this -> quantity;
	}

	public function setQuantity($quantity) { $this -> quantity = $quantity;
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