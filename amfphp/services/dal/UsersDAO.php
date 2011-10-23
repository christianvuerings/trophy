<?php

require_once 'MySQLDatabase.php';
require_once 'interfaces/UsersDAOInterface.php';
require_once '../model/interfaces/UsersInterface.php';
require_once '../model/Users.php';
require_once 'SpecialtiesDAO.php';
require_once 'OccupationDAO.php';

/**
 * DAO for Users
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class UsersDAO implements UsersDAOInterface {
    const TABLE_NAME = 'users';

    private $instance;

    private function __construct() {
        
    }

    /**
     * Returns an instance of this UsersDAO
     * Singleton pattern
     * 
     * @return UsersDAO $instance
     */
    public function getInstance() {
        if (is_null($this->instance))
            $this->instance = new self();

        return $this->instance;
    }

    /**
     * loads a Users object from the database
     * 
     * @param $int $usersId
     * @return Users
     */
    public function load($usersIds=array()) {
        // get database
        $db = MySQLDatabase::getInstance();

        foreach ($usersIds as $userId) {
            // get record from database
            $record = $db->getRecord('SELECT u.users_id, u.first_name, u.last_name, u.email, u.password, u.last_login, u.member_since, u.twitter_id, u.facebook_id, u.blog_rss, u.address_street, u.address_number, u.address_bus, u.cities_id, u.telephone, u.fax, u.gsm, l.label FROM users u INNER JOIN languages u ON(u.languages_id = l.languages_id) WHERE users_id =' . $usersId);

            // translate record to Users object
            $users = new Users();
            $users->setUsersId($record['u.users_id']);
            $users->setFirstName($record['u.first_name']);
            $users->setLastName($record['u.last_name']);
            $users->setEmail($record['u.email']);
            $users->setPassword($record['u.password']);
            $users->setLastLogin($record['u.last_login']);
            $users->setMemberSince($record['u.member_since']);
            $users->setTwitterId($record['u.twitter_id']);
            $users->setFacebookId($record['u.facebook_id']);
            $users->setBlogRss($record['u.blog_rss']);
            $users->setAddressStreet($record['u.address_street']);
            $users->setAddressNumber($record['u.address_number']);
            $users->setAddressBus($record['u.address_bus']);
            $users->setCitiesId($record['u.cities_id']);
            $users->setTelephone($record['u.telephone']);
            $users->setFax($record['u.fax']);
            $users->setGsm($record['u.gsm']);
            $users->setLanguage($record['l.label']);
            $users->setSpecialties($this->getSpecialtiesFromUser($record['u.users_id']));
            $users->setOccupations($this->getOccupationsFromUser($record['u.users_id']));
            array_push($userArray, $users);
        }

        // return Users object
        return $userArray;
    }

    public function getSpecialtiesFromUser($userId) {
        $specialtiesDAO = new SpecialtiesDAO();
        $resultArray = $specialtiesDAO->load($userId);
        return $resultArray;
    }

    public function getOccupationsFromUser($userId) {
        $occupationsDAO = new OccupationsDAO();
        $resultArray = $occupationsDAO->load($userId);
        return $resultArray;
    }

    public function inHelper($items=array()) {
        $content = '(';
        foreach ($items as $item) {
            $content.=$item . ',';
        }
        $content .= ')';

        return $content;
    }

    /**
     * Saves the given object to the database
     * 
     * @param UsersInterface $users
     * @return int $primaryKey
     */
    public function save(UsersInterface $users) {
        // get database
        $db = MySQLDatabase::getInstance();

        // get the key
        $primaryKey = $users->getUsersId();

        if (is_null($primaryKey)) {
            // if the key is NULL, there is no record of it in the database
            // create array to insert    
            $newRecord = array();
            $newRecord['first_name'] = $users->getFirstName();
            $newRecord['last_name'] = $users->getLastName();
            $newRecord['email'] = $users->getEmail();
            $newRecord['password'] = $users->getPassword();
            $newRecord['last_login'] = $users->getLastLogin();
            $newRecord['member_since'] = $users->getMemberSince();
            $newRecord['twitter_id'] = $users->getTwitterId();
            $newRecord['facebook_id'] = $users->getFacebookId();
            $newRecord['blog_rss'] = $users->getBlogRss();
            $newRecord['address_street'] = $users->getAddressStreet();
            $newRecord['address_number'] = $users->getAddressNumber();
            $newRecord['address_bus'] = $users->getAddressBus();
            $newRecord['cities_id'] = $users->getCitiesId();
            $newRecord['telephone'] = $users->getTelephone();
            $newRecord['fax'] = $users->getFax();
            $newRecord['gsm'] = $users->getGsm();
            $newRecord['languages_id'] = $users->getLanguagesId();

            // add this record
            $primaryKey = $db->insert(self::TABLE_NAME, $newRecord);
        } else {
            // the key is not null, the record already exists in the database
            // we need to perform an update on that record
            // create array for update
            $record = array();
            $record['users_id'] = $users->getUsersId();
            $record['first_name'] = $users->getFirstName();
            $record['last_name'] = $users->getLastName();
            $record['email'] = $users->getEmail();
            $record['password'] = $users->getPassword();
            $record['last_login'] = $users->getLastLogin();
            $record['member_since'] = $users->getMemberSince();
            $record['twitter_id'] = $users->getTwitterId();
            $record['facebook_id'] = $users->getFacebookId();
            $record['blog_rss'] = $users->getBlogRss();
            $record['address_street'] = $users->getAddressStreet();
            $record['address_number'] = $users->getAddressNumber();
            $record['address_bus'] = $users->getAddressBus();
            $record['cities_id'] = $users->getCitiesId();
            $record['telephone'] = $users->getTelephone();
            $record['fax'] = $users->getFax();
            $record['gsm'] = $users->getGsm();
            $record['languages_id'] = $users->getLanguagesId();

            // update the record
            $db->update(self::TABLE_NAME, $record, 'users_id = ?', array($primaryKey));
        }

        // return key
        return $primaryKey;
    }

}

?>
