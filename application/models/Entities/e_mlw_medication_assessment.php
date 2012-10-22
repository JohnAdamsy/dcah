<?php
namespace models\Entities;

/**
 * @Entity
 * @Table(name="mlw_medication_assessment")
 */
class E_mlw_medication_assessment {

	/**
	 * @Id
	 * @Column(name="mlwAssessmentID", type="integer", length=11, nullable=false)
	 * @GeneratedValue(strategy="AUTO")
	 * */
	private $mlwAssessmentID;

	/**
	 * @Column(name="facilityID", type="string",length=45, nullable=false)
	 * */
	private $facilityID;

	/**
	 * @Column(name="medicationID", type="string",length=45, nullable=false)
	 * */
	private $medicationID;

	/**
	 * @Column(name="available", type="string",length=45, nullable=false)
	 * */
	private $available;

	/**
	 * @Column(name="quantityAvailable", type="integer",length=11, nullable=false)
	 * */
	private $quantityAvailable;

	/**
	 * @Column(name="medicationType", type="string",length=45, nullable=false)
	 * */
	private $medicationType;

	/**
	 * @Column(name="placeFound", type="string",length=45, nullable=false)
	 * */
	private $placeFound;

	/**
	 * @Column(name="dateOfAssessment", type="date",length=45, nullable=false)
	 * */
	private $dateOfAssessment;

	/**
	 * @Column(name="createdAt", type="datetime",length=45, nullable=false)
	 * */
	private $createdAt;

	public function getMlwAssessmentID() {
		return $this -> mlwAssessmentID;
	}

	public function setMlwAssessmentID($mlwAssessmentID) { $this -> mlwAssessmentID = $mlwAssessmentID;
	}

	public function getFacilityID() {
		return $this -> facilityID;
	}

	public function setFacilityID($facilityID) { $this -> facilityID = $facilityID;
	}

	public function getMedicationID() {
		return $this -> medicationID;
	}

	public function setMedicationID($medicationID) { $this -> medicationID = $medicationID;
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

	public function getMedicationType() {
		return $this -> medicationType;
	}

	public function setMedicationType($medicationType) { $this -> medicationType = $medicationType;
	}

	public function getPlaceFound() {
		return $this -> placeFound;
	}

	public function setPlaceFound($placeFound) { $this -> placeFound = $placeFound;
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