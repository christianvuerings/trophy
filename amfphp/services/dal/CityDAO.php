<?php

require_once 'dal/MySQLDatabase.php';
require_once 'dal/interfaces/CityDAOInterface.php';
require_once 'model/interfaces/CityInterface.php';
require_once 'model/City.php';

/**
 * DAO for City
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class CityDAO implements CityDAOInterface {
    const TABLE_NAME = 'city';

    private static $instance;

    private function __construct() {

    }

    /**
     * Returns an instance of this CityDAO
     * Singleton pattern
     *
     * @return CityDAO $instance
     */
    public function getInstance() {
	if (is_null(self::$instance))
	    self::$instance = new self();

	return self::$instance;
    }

    /**
     * Search for cities that match
     *
     * @param string $searchTerm
     * @return array<string> $validCities
     */
    public function autocompleteCities($searchTerm) {
	// get database
	$db = MySQLDatabase::getInstance();

	// build query
	$query = "SELECT alpha FROM " . self::TABLE_NAME . " WHERE alpha LIKE ? ";

	// get valid cities
	$validCities = $db->getColumn($query, array('%' . $searchTerm . '%'));

	return $validCities;
    }

    /**
     * deletes a City object from the database
     *
     * @param int $id
     * @return int  number of deleted rows
     */
    public function delete($id) {
	// get database
	$db = MySQLDatabase::getInstance();

	// delete and return affected rows
	return $db->delete(TABLE_NAME, 'id = ?', array($primaryKey));
    }

    /**
     * loads a City object from the database
     *
     * @param int $id
     * @return City
     */
    public function load($id) {
	// get database
	$db = MySQLDatabase::getInstance();

	// get record from database
	$record = $db->getRecord('SELECT id, alpha, longitude, latitude, code, name, province_id FROM ' . self::TABLE_NAME . 'WHERE id = ?', array($id));

	// translate record to City object
	$city = new City();
	$city->setId($record['id']);
	$city->setAlpha($record['alpha']);
	$city->setLongitude($record['longitude']);
	$city->setLatitude($record['latitude']);
	$city->setCode($record['code']);
	$city->setName($record['name']);
	$city->setProvinceId($record['province_id']);

	// return City object
	return $city;
    }

    /**
     * Saves the given object to the database
     *
     * @param CityInterface $city
     * @return int $primaryKey
     */
    public function save(CityInterface $city) {
	// get database
	$db = MySQLDatabase::getInstance();

	// get the key
	$primaryKey = $city->getId();

	if (is_null($primaryKey)) {
	    // if the key is NULL, there is no record of it in the database
	    // create array to insert
	    $newRecord = array();
	    $newRecord['alpha'] = $city->getAlpha();
	    $newRecord['longitude'] = $city->getLongitude();
	    $newRecord['latitude'] = $city->getLatitude();
	    $newRecord['code'] = $city->getCode();
	    $newRecord['name'] = $city->getName();
	    $newRecord['province_id'] = $city->getProvinceId();

	    // add this record
	    $primaryKey = $db->insert(self::TABLE_NAME, $newRecord);
	} else {
	    // the key is not null, the record already exists in the database
	    // we need to perform an update on that record
	    // create array for update
	    $record = array();
	    $record['id'] = $city->getId();
	    $record['alpha'] = $city->getAlpha();
	    $record['longitude'] = $city->getLongitude();
	    $record['latitude'] = $city->getLatitude();
	    $record['code'] = $city->getCode();
	    $record['name'] = $city->getName();
	    $record['province_id'] = $city->getProvinceId();

	    // update the record
	    $db->update(self::TABLE_NAME, $record, 'id = ?', array($primaryKey));
	}

	// return key
	return $primaryKey;
    }

}

?>
