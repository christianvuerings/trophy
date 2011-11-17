<?php

require_once 'dal/MySQLDatabase.php';
require_once 'dal/interfaces/AddressDAOInterface.php';
require_once 'model/interfaces/AddressInterface.php';
require_once 'model/Address.php';

/**
 * DAO for Address
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class AddressDAO implements AddressDAOInterface {
    const TABLE_NAME = 'address';

    private static $instance;

    private function __construct(){ }

    /**
     * Returns an instance of this AddressDAO
     * Singleton pattern
     *
     * @return AddressDAO $instance
     */
    public function getInstance() {
	if (is_null(self::$instance))
	    self::$instance = new self();

	return self::$instance;
    }

    /**
     * deletes a Address object from the database
     *
     * @param int $addressId
     * @return int  number of deleted rows
     */
    public function delete($addressId) {
	// get database
	$db = MySQLDatabase::getInstance();

	// delete and return affected rows
	return $db->delete(TABLE_NAME, 'address_id = ?', array($primaryKey));
    }

    /**
     * loads a Address object from the database
     *
     * @param int $addressId
     * @return Address
     */
    public function load($addressId) {
	// get database
	$db = MySQLDatabase::getInstance();

	// get record from database
	$record = $db->getRecord('SELECT address_id, address_street, address_number, address_bus, city_id FROM ' . self::TABLE_NAME . 'WHERE address_id = ?', array($addressId));

	// translate record to Address object
	$address = new Address();
	$address->setAddressId($record['address_id']);
	$address->setAddressStreet($record['address_street']);
	$address->setAddressNumber($record['address_number']);
	$address->setAddressBus($record['address_bus']);
	$address->setCityId($record['city_id']);

	// return Address object
	return $address;
    }

    /**
     * Saves the given object to the database
     *
     * @param AddressInterface $address
     * @return int $primaryKey
     */
    public function save(AddressInterface $address){
	// get database
	$db = MySQLDatabase::getInstance();

	// get the key
	$primaryKey = $address->getAddressId();

	if(is_null($primaryKey)){
	    // if the key is NULL, there is no record of it in the database
	    // create array to insert
	    $newRecord = array();
        	    		    	    $newRecord['address_street'] = $address->getAddressStreet();
			    	    $newRecord['address_number'] = $address->getAddressNumber();
			    	    $newRecord['address_bus'] = $address->getAddressBus();
			    	    $newRecord['city_id'] = $address->getCityId();

	    // add this record
	    $primaryKey = $db->insert(self::TABLE_NAME, $newRecord);
	} else {
	    // the key is not null, the record already exists in the database
	    // we need to perform an update on that record
	    // create array for update
	    $record = array();
	    	    $record['address_id'] = $address->getAddressId();
		    $record['address_street'] = $address->getAddressStreet();
		    $record['address_number'] = $address->getAddressNumber();
		    $record['address_bus'] = $address->getAddressBus();
		    $record['city_id'] = $address->getCityId();

	    // update the record
	    $db->update(self::TABLE_NAME, $record, 'address_id = ?', array($primaryKey));
	}

	// return key
	return $primaryKey;
    }
}
?>
