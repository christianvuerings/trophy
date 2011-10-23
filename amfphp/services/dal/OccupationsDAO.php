<?php

require_once 'MySQLDatabase.php';
require_once 'interfaces/OccupationsDAOInterface.php';
require_once '../model/interfaces/OccupationsInterface.php';
require_once '../model/Occupations.php';

/**
 * DAO for Occupations
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class OccupationsDAO implements OccupationsDAOInterface {
    const TABLE_NAME = 'users_occupations';

    private $instance;

    private function __construct() {
        
    }

    /**
     * Returns an instance of this OccupationsDAO
     * Singleton pattern
     * 
     * @return OccupationsDAO $instance
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
        $records = $db->getRecord('SELECT us.user_id,s.label FROM users_occupations uo INNER JOIN occupations o ON (uo.occupation_id = o.occupation_id)  WHERE user_id = ' . $userId);

        foreach ($records as $record) {
            array_push($returnArray, $record['o.label']);
        }

        return $returnArray;
    }

    public function save($userid, $occupationId) {
        // get database
        $db = MySQLDatabase::getInstance();


        // if the key is NULL, there is no record of it in the database
        // create array to insert    
        $newRecord = array();
        $newRecord['user_id'] = $userid;
        $newRecord['occupation_id'] = $occupationId;

        // add this record
        $db->insert(self::TABLE_NAME, $newRecord);


    }

}

?>
