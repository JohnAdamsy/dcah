<?php
namespace models\Entities;

/**
 * @Entity
 * @Table(name="labour_and_delivery")
 */
class E_labour_and_delivery {

	/**
	 * @Id
	 * @Column(name="ldAssessmentID", type="integer", length=11, nullable=false)
	 * @GeneratedValue(strategy="AUTO")
	 * */
	private $ldAssessmentID;

	/**
	 * @Column(name="facilityCode", type="string",length=45, nullable=false)
	 * */
	private $facilityCode;

	/**
	 * @Column(name="deliveryService24Hours", type="string",length=45, nullable=false)
	 * */
	private $deliveryService24Hours;

	/**
	 * @Column(name="deliveryService24HoursComments", type="string",length=45, nullable=false)
	 * */
	private $deliveryService24HoursComments;

	/**
	 * @Column(name="deliverySkilledPersonelAvailable", type="string",length=45, nullable=false)
	 * */
	private $deliverySkilledPersonelAvailable;

	/**
	 * @Column(name="deliveryServiceProviders", type="string",length=255, nullable=false)
	 * */
	private $deliveryServiceProviders;

	/**
	 * @Column(name="numberOfBedsInMaternity", type="integer",length=11, nullable=false)
	 * */
	private $numberOfBedsInMaternity;

	/**
	 * @Column(name="deliveryRoomDescription", type="string",length=45, nullable=false)
	 * */
	private $deliveryRoomDescription;

	/**
	 * @Column(name="createdAt", type="datetime",length=45, nullable=false)
	 * */
	private $createdAt;

	/**
	 * @Column(name="dateOfAssessment", type="date",length=45, nullable=false)
	 * */
	private $dateOfAssessment;

	public function getLdAssessmemntID() {
		return $this -> ldAssessmentID;
	}

	public function setLdAssessmemntID($ldAssessmentID) { $this -> ldAssessmentID = $ldAssessmentID;
	}

	public function getFacilityCode() {
		return $this -> facilityCode;
	}

	public function setFacilityCode($facilityCode) { $this -> facilityCode = $facilityCode;
	}

	public function getDeliveryService24Hours() {
		return $this -> deliveryService24Hours;
	}

	public function setDeliveryService24Hours($deliveryService24Hours) { $this -> deliveryService24Hours = $deliveryService24Hours;
	}

	public function getDeliveryService24HoursComments() {
		return $this -> deliveryService24HoursComments;
	}

	public function setDeliveryService24HoursComments($deliveryService24HoursComments) { $this -> deliveryService24HoursComments = $deliveryService24HoursComments;
	}

	public function getDeliverySkilledPersonelAvailable() {
		return $this -> deliverySkilledPersonelAvailable;
	}

	public function setDeliverySkilledPersonelAvailable($deliverySkilledPersonelAvailable) { $this -> deliverySkilledPersonelAvailable = $deliverySkilledPersonelAvailable;
	}

	public function getDeliveryServiceProviders() {
		return $this -> deliveryServiceProviders;
	}

	public function setDeliveryServiceProviders($deliveryServiceProviders) { $this -> deliveryServiceProviders = $deliveryServiceProviders;
	}

	public function getNumberOfBedsInMaternity() {
		return $this -> numberOfBedsInMaternity;
	}

	public function setNumberOfBedsInMaternity($numberOfBedsInMaternity) { $this -> numberOfBedsInMaternity = $numberOfBedsInMaternity;
	}

	public function getDeliveryRoomDescription() {
		return $this -> deliveryRoomDescription;
	}

	public function setDeliveryRoomDescription($deliveryRoomDescription) { $this -> deliveryRoomDescription = $deliveryRoomDescription;
	}

	public function getCreatedAt() {
		return $this -> createdAt;
	}

	public function setCreatedAt($createdAt) { $this -> createdAt = $createdAt;
	}

	public function getDateOfAssessment() {
		return $this -> dateOfAssessment;
	}

	public function setDateOfAssessment($dateOfAssessment) { $this -> dateOfAssessment = $dateOfAssessment;
	}

}
?>