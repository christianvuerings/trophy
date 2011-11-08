<?php

require_once 'MySQLDatabase.php';
require_once 'interfaces/UserDAOInterface.php';
require_once '../model/interfaces/UserInterface.php';
require_once '../model/User.php';
require_once '../model/interfaces/OccupationInterface.php';
require_once '../model/Occupation.php';
require_once '../model/interfaces/SpecialtyInterface.php';
require_once '../model/Specialty.php';

/**
 * DAO for User
 *
 * @author Thomas Crepain <info@thomascrepain.be>
 */
class UserDAO implements UserDAOInterface {
    const TABLE_NAME = 'user';
    const OCCUPATION_LINK_TABLE_NAME = 'user_occupation';
    const SPECIALTY_LINK_TABLE_NAME = 'user_specialty';

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
     * deletes a User object from the database
     * 
     * @param $int $userId
     * @return int  number of deleted rows
     */
    public function delete($userId) {
        // get database
        $db = MySQLDatabase::getInstance();

        //delete the user out of the occupation en specialty link table
        $db->delete(OCCUPATION_LINK_TABLE_NAME, 'user_id = ?', array($primaryKey));
        $db->delete(specialtY_LINK_TABLE_NAME, 'user_id = ?', array($primaryKey));

        // delete and return affected rows
        return $db->delete(TABLE_NAME, 'user_id = ?', array($primaryKey));
    }

    /**
     * Function to login a user by email and password
     * 
     * @param string $email
     * @param string $password
     * @return User
     */
    public function login($email, $password) {
        // get database
        $db = MySQLDatabase::getInstance();
        $password = md5($password);
        
	// TODO: sql injection, fix this!!
        $query = "SELECT * FROM " .self::TABLE_NAME." WHERE email='".$email."' AND password='".$password."'";
        // get record from database
        $record = $db->getRecord($query);

        // translate record to User object
        $user = new User();
        $user->setUserId($record['user_id']);
        $user->setFirstName($record['first_name']);
        $user->setLastName($record['last_name']);
        $user->setEmail($record['email']);
        $user->setPassword($record['password']);
        $user->setLastLogin($record['last_login']);
        $user->setMemberSince($record['member_since']);
        $user->setLanguageId($record['language_id']);


        return $user;
    }

    /**
     * loads a User object from the database
     * 
     * @param $int $userId
     * @return User
     */
    public function load($userId) {
        // get database
        $db = MySQLDatabase::getInstance();

        // get record from database
        $record = $db->getRecord('SELECT user_id, first_name, last_name, email, password, last_login, member_since, twitter_id, facebook_id, blog_rss, address_street, address_number, address_bus, city_id, telephone, fax, gsm, language_id FROM ' . self::TABLE_NAME . 'WHERE user_id = ?', array($userId));

        // translate record to User object
        $user = new User();
        $user->setUserId($record['user_id']);
        $user->setFirstName($record['first_name']);
        $user->setLastName($record['last_name']);
        $user->setEmail($record['email']);
        $user->setPassword($record['password']);
        $user->setLastLogin($record['last_login']);
        $user->setMemberSince($record['member_since']);
        $user->setTwitterId($record['twitter_id']);
        $user->setFacebookId($record['facebook_id']);
        $user->setBlogRss($record['blog_rss']);
        $user->setAddressStreet($record['address_street']);
        $user->setAddressNumber($record['address_number']);
        $user->setAddressBus($record['address_bus']);
        $user->setCityId($record['city_id']);
        $user->setTelephone($record['telephone']);
        $user->setFax($record['fax']);
        $user->setGsm($record['gsm']);
        $user->setLanguageId($record['language_id']);

        // TODO: load the users occupations
        // TODO: load the users specialties
        // return User object
        return $user;
    }

    /**
     * loads User objects from the database
     * 
     * @param array<int> $userIds
     * @return array<User>
     */
    public function loadMultiple($userIds) {
        // get database
        $db = MySQLDatabase::getInstance();

        // get records from database
        $records = $db->getRecords('SELECT user_id, first_name, last_name, email, password, last_login, member_since, twitter_id, facebook_id, blog_rss, address_street, address_number, address_bus, city_id, telephone, fax, gsm, language_id FROM ' . self::TABLE_NAME . 'WHERE user_id IN (?)', array(implode(', ', $userIds)));

        $users = array();
        foreach ($records as $record) {
            // translate record to User object
            $user = new User();
            $user->setUserId($record['user_id']);
            $user->setFirstName($record['first_name']);
            $user->setLastName($record['last_name']);
            $user->setEmail($record['email']);
            $user->setPassword($record['password']);
            $user->setLastLogin($record['last_login']);
            $user->setMemberSince($record['member_since']);
            $user->setTwitterId($record['twitter_id']);
            $user->setFacebookId($record['facebook_id']);
            $user->setBlogRss($record['blog_rss']);
            $user->setAddressStreet($record['address_street']);
            $user->setAddressNumber($record['address_number']);
            $user->setAddressBus($record['address_bus']);
            $user->setCityId($record['city_id']);
            $user->setTelephone($record['telephone']);
            $user->setFax($record['fax']);
            $user->setGsm($record['gsm']);
            $user->setLanguageId($record['language_id']);

            // TODO: load the users occupations
            // TODO: load the users specialties

            $users[] = $user;
        }

        // return array of User objects
        return $users;
    }

    /**
     * Saves the given object to the database
     * 
     * @param UserInterface $user
     * @return int $primaryKey
     */
    public function save(UserInterface $user) {
        // get database
        $db = MySQLDatabase::getInstance();

        // get the key
        $primaryKey = $user->getUserId();

        if (is_null($primaryKey)) {
            // if the key is NULL, there is no record of it in the database
            // create array to insert    
            $newRecord = array();
            $newRecord['first_name'] = $user->getFirstName();
            $newRecord['last_name'] = $user->getLastName();
            $newRecord['email'] = $user->getEmail();
            $newRecord['password'] = $user->getPassword();
            $newRecord['last_login'] = $user->getLastLogin();
            $newRecord['member_since'] = $user->getMemberSince();
            $newRecord['twitter_id'] = $user->getTwitterId();
            $newRecord['facebook_id'] = $user->getFacebookId();
            $newRecord['blog_rss'] = $user->getBlogRss();
            $newRecord['address_street'] = $user->getAddressStreet();
            $newRecord['address_number'] = $user->getAddressNumber();
            $newRecord['address_bus'] = $user->getAddressBus();
            $newRecord['city_id'] = $user->getCityId();
            $newRecord['telephone'] = $user->getTelephone();
            $newRecord['fax'] = $user->getFax();
            $newRecord['gsm'] = $user->getGsm();
            $newRecord['language_id'] = $user->getLanguageId();

            // TODO: save the users occupations
            // TODO: save the users specialties
            // add this record
            $primaryKey = $db->insert(self::TABLE_NAME, $newRecord);
        } else {
            // the key is not null, the record already exists in the database
            // we need to perform an update on that record
            // create array for update
            $record = array();
            $record['user_id'] = $user->getUserId();
            $record['first_name'] = $user->getFirstName();
            $record['last_name'] = $user->getLastName();
            $record['email'] = $user->getEmail();
            $record['password'] = $user->getPassword();
            $record['last_login'] = $user->getLastLogin();
            $record['member_since'] = $user->getMemberSince();
            $record['twitter_id'] = $user->getTwitterId();
            $record['facebook_id'] = $user->getFacebookId();
            $record['blog_rss'] = $user->getBlogRss();
            $record['address_street'] = $user->getAddressStreet();
            $record['address_number'] = $user->getAddressNumber();
            $record['address_bus'] = $user->getAddressBus();
            $record['city_id'] = $user->getCityId();
            $record['telephone'] = $user->getTelephone();
            $record['fax'] = $user->getFax();
            $record['gsm'] = $user->getGsm();
            $record['language_id'] = $user->getLanguageId();

            // TODO: save the users occupations
            // TODO: save the users specialties
            // update the record
            $db->update(self::TABLE_NAME, $record, 'user_id = ?', array($primaryKey));
        }

        // return key
        return $primaryKey;
    }

    public function getUserOccupations($userId) {
	// get database
        $db = MySQLDatabase::getInstance();
	
	// get records
        $records = $db->getRecord('SELECT occupations_id FROM ' . self::OCCUPATION_LINK_TABLE_NAME . 'WHERE user_id = ?', array($userId));
        $occupationArray = array();
        foreach ($records as $record) {
            $occupationId = $record['occupations_id'];
            $occupation = new Occupation();
            $occupation = Occupation::load($occupationId);
            array_push($occupationArray, $occupation);
        }

        return $occupationArray;
    }

    public function getSpecialies($userId) {
	// get database
        $db = MySQLDatabase::getInstance();
	
	// get records
        $records = $db->getRecord('SELECT specialties_id FROM ' . self::specialtY_LINK_TABLE_NAME . 'WHERE user_id = ?', array($userId));
        $specialtiesArray = array();
        foreach ($records as $record) {
            $specialtiesId = $record['specialties_id'];
            $specialty = new specialty();
            $specialty = specialty::load($specialtiesId);
            array_push($specialtiesArray, $specialty);
        }

        return $specialtiesArray;
    }

    /**
     * Saves the link between a User and an occupation
     *
     * @param UserInterface $user
     * @param OccupationInterface $occupation 
     */
    public function saveLinkBetweenUserAndOccupation(UserInterface $user, OccupationInterface $occupation) {
	// get database
        $db = MySQLDatabase::getInstance();
	
	// insert link
        $db->insert(self::OCCUPATION_LINK_TABLE_NAME, array('user_id' => $user->getUserId(), 'occupation_id' => $occupation->getOccupationId()));
    }

    /**
     * Saves the link between a user and a specialty
     *
     * @param UserInterface $user
     * @param specialtyInterface $specialty 
     */
    public function saveLinkBetweenUserAndspecialty(UserInterface $user, specialtyInterface $specialty) {
        $db->insert(self::specialtY_LINK_TABLE_NAME, array('user_id' => $user->getUserId(), 'specialty_id' => $specialty->getspecialtyId()));
    }
    
    /**
     * Searches the database for users with a practice in a specified city
     * The query can be the name of the city (or something that looks like it)
     * or the zipcode of this city
     *
     * @param string $query
     * @param OccupationInterface $occupation
     * @param CountryInterface $country
     * @return array<User> 
     */
    public function searchUsersByPostalCodeOrCityname($query, OccupationInterface $occupation, CountryInterface $country){
	// get database
        $db = MySQLDatabase::getInstance();
	
	// get user ids
	$userIds = $db->getColumn("SELECT u.user_id 
			FROM " . self::TABLE_NAME . " AS u
			LEFT JOIN ". self::OCCUPATION_LINK_TABLE_NAME . " AS ou ON ou.user_id = u.user_id
			LEFT JOIN practice AS p ON p.user_id = u.user_id
			LEFT JOIN city AS c ON c.city_id = p.city_id
			LEFT JOIN province ON province.province_id = c.province_id
			WHERE ou.occupation_id = ? 
			AND province.country_id = ?
			AND (c.name LIKE ? OR c.zipcode = ?)",
			array($occupation->getOccupationId(), $country->getCountryId(), $query, $query));
	
	// return these users
        return $this->loadMultiple($userIds);
    }

    /**
     * Removes the link between a User and an occupation
     *
     * @param UserInterface $user
     * @param OccupationInterface $occupation 
     */
    public function removeLinkBetweenUserAndOccupation(UserInterface $user, OccupationInterface $occupation) {
	// get database
        $db = MySQLDatabase::getInstance();
	
	// delete link
        $db->delete(self::OCCUPATION_LINK_TABLE_NAME, 'user_id = ? AND occupation_id = ?', array($user->getUserId(), $occupation->getOccupationId()));
    }

    /**
     * Removes the link between a user and a specialty
     *
     * @param UserInterface $user
     * @param specialtyInterface $specialty 
     */
    public function removeLinkBetweenUserAndspecialty(UserInterface $user, specialtyInterface $specialty) {
	// get database
        $db = MySQLDatabase::getInstance();
	
	// delete link
        $db->delete(self::specialtY_LINK_TABLE_NAME, 'user_id = ? AND specialty_id = ?', array($user->getUserId(), $specialty->getspecialtyId()));
    }

}

?>
