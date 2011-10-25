<?php

require_once 'MySQLDatabase.php';
require_once 'interfaces/SpecialtiesDAOInterface.php';
require_once '../model/interfaces/SpecialtiesInterface.php';
require_once '../model/Specialties.php';

/**
 * DAO for Specialties
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class SpecialtiesDAO implements SpecialtiesDAOInterface {
    const TABLE_NAME = 'user_specialties';

    private $instance;

    private function __construct() {
        
    }

    /**
     * Returns an instance of this SpecialtiesDAO
     * Singleton pattern
     * 
     * @return SpecialtiesDAO $instance
     */
    public function getInstance() {
        if (is_null($this->instance))
            $this->instance = new self();

        return $this->instance;
    }


    public function load($userId) {
        // get database
        $db = MySQLDatabase::getInstance();

        // get record from database
        $records = $db->getRecord('SELECT us.user_id,s.label FROM users_specialties us INNER JOIN specialties s ON (us.specialties_id = s.specialties_id)  WHERE user_id = ' . $userId);

        foreach ($records as $record) {
            array_push($returnArray, $record['s.label']);
        }

        return $returnArray;
    }

    public function save($userid, $specialtiesId) {
        // get database
        $db = MySQLDatabase::getInstance();


        // if the key is NULL, there is no record of it in the database
        // create array to insert    
        $newRecord = array();
        $newRecord['user_id'] = $userid;
        $newRecord['specialties_id'] = $specialtiesId;

        // add this record
        $db->insert(self::TABLE_NAME, $newRecord);


    }

}

?>
