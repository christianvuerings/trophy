<?php

require_once 'dal/CityDAO.php';
require_once 'model/interfaces/CityInterface.php';

/**
 * Model City
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class City implements CityInterface {

    private $id;
    private $alpha;
    private $longitude;
    private $latitude;
    private $code;
    private $name;
    private $provinceId;
    //mapping with flex
    public $_explicitType = "classestrophy.City";

    public function __construct() {

    }

    /**
     * Creates a new City object
     *
     * @param string   $alpha
     * @param float   $longitude
     * @param float   $latitude
     * @param string   $code
     * @param string   $name
     * @param int   $provinceId
     * @return City $instance
     */
    public static function createNew($alpha, $code, $name, $provinceId, $longitude = NULL, $latitude = NULL) {
	$instance = new self();

	$instance->alpha = $alpha;
	$instance->longitude = $longitude;
	$instance->latitude = $latitude;
	$instance->code = $code;
	$instance->name = $name;
	$instance->provinceId = $provinceId;

	return $instance;
    }

    /**
     * deletes an object from permanent storage
     *
     * @param int $id
     * @return void
     */
    public static function delete($id) {
	// get data access object
	$dao = CityDAO::getInstance();

	$dao->delete($id);
    }

    /**
     * Saves this object to permanent storage
     *
     * @return int $id
     */
    public function save() {
	// get data access object
	$dao = CityDAO::getInstance();

	// saves this object tot storage
	$id = $dao->save($this);

	// update id
	$this->id = $id;

	// returns id
	return $id;
    }

    /**
     * loads an object from permanent storage
     *
     * @param int $id
     * @return City
     */
    public static function load($id) {
	// get data access object
	$dao = CityDAO::getInstance();

	return $dao->load($id);
    }

    /* Getters and setters */

    /**
     * Returns id
     *
     * @return int
     */
    public function getId() {
	return $this->id;
    }

    /**
     * Returns alpha
     *
     * @return string
     */
    public function getAlpha() {
	return $this->alpha;
    }

    /**
     * Returns longitude
     *
     * @return float
     */
    public function getLongitude() {
	return $this->longitude;
    }

    /**
     * Returns latitude
     *
     * @return float
     */
    public function getLatitude() {
	return $this->latitude;
    }

    /**
     * Returns code
     *
     * @return string
     */
    public function getCode() {
	return $this->code;
    }

    /**
     * Returns name
     *
     * @return string
     */
    public function getName() {
	return $this->name;
    }

    /**
     * Returns provinceId
     *
     * @return int
     */
    public function getProvinceId() {
	return $this->provinceId;
    }

    /**
     * Sets id
     *
     * @param int
     */
    public function setId($id) {
	$this->id = $id;
    }

    /**
     * Sets alpha
     *
     * @param string
     */
    public function setAlpha($alpha) {
	$this->alpha = $alpha;
    }

    /**
     * Sets longitude
     *
     * @param float
     */
    public function setLongitude($longitude) {
	$this->longitude = $longitude;
    }

    /**
     * Sets latitude
     *
     * @param float
     */
    public function setLatitude($latitude) {
	$this->latitude = $latitude;
    }

    /**
     * Sets code
     *
     * @param string
     */
    public function setCode($code) {
	$this->code = $code;
    }

    /**
     * Sets name
     *
     * @param string
     */
    public function setName($name) {
	$this->name = $name;
    }

    /**
     * Sets provinceId
     *
     * @param int
     */
    public function setProvinceId($provinceId) {
	$this->provinceId = $provinceId;
    }

}

?>
