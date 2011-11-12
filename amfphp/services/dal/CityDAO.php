<?php

require_once 'MySQLDatabase.php';
require_once 'interfaces/CityDAOInterface.php';
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
     * Returns an instance of this UserDAO
     * Singleton pattern
     * 
     * @return UserDAO $instance
     */
    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new self();

        return self::$instance;
    }

    /**
     * deletes a City object from the database
     * 
     * @param $int $cityId
     * @return int  number of deleted rows
     */
    public function delete($cityId) {
// get database
        $db = MySQLDatabase::getInstance();

// delete and return affected rows
        return $db->delete(TABLE_NAME, 'city_id = ?', array($primaryKey));
    }

    /**
     * loads a City object from the database
     * 
     * @param $int $cityId
     * @return City
     */
    public function load($cityId) {
// get database
        $db = MySQLDatabase::getInstance();

// get record from database
        $record = $db->getRecord('SELECT city_id, province_id, zipcode, name FROM ' . self::TABLE_NAME . 'WHERE city_id = ?', array($cityId));

// translate record to City object
        $city = new City();
        $city->setCityId($record['city_id']);
        $city->setProvinceId($record['province_id']);
        $city->setZipcode($record['zipcode']);
        $city->setName($record['name']);

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
        $primaryKey = $city->getCityId();

        if (is_null($primaryKey)) {
// if the key is NULL, there is no record of it in the database
// create array to insert    
            $newRecord = array();
            $newRecord['province_id'] = $city->getProvinceId();
            $newRecord['zipcode'] = $city->getZipcode();
            $newRecord['name'] = $city->getName();

// add this record
            $primaryKey = $db->insert(self::TABLE_NAME, $newRecord);
        } else {
// the key is not null, the record already exists in the database
// we need to perform an update on that record
// create array for update
            $record = array();
            $record['city_id'] = $city->getCityId();
            $record['province_id'] = $city->getProvinceId();
            $record['zipcode'] = $city->getZipcode();
            $record['name'] = $city->getName();

// update the record
            $db->update(self::TABLE_NAME, $record, 'city_id = ?', array($primaryKey));
        }

// return key
        return $primaryKey;
        }

        /**
         * Search for cities that match
         * 
         * @param string $searchTerm
         * @return array<string> $validCities
         */
        public function autocompleteCities($searchTerm){
        $validCities = array();
        $db = MySQLDatabase::getInstance();
        //TODO : fix sql injection
        $query = "SELECT * FROM " . self::TABLE_NAME . " WHERE alpha LIKE '%".$search."%' ";
        $results = $db->getRecords($query);
        foreach ($results as $result) {
            array_push($validCities, $result['alpha']);
        }
        return $validCities;
    }

}

?>
