<?php

class User {

    public $userId = '';

    /**
     * @var INT
     */
    public $user_id;

    /**
     * @var VARCHAR(255)
     */
    public $first_name;

    /**
     * @var VARCHAR(255)
     */
    public $last_name;

    /**
     * @var VARCHAR(255)
     */
    public $email;

    /**
     * @var VARCHAR(255)
     */
    public $password;

    /**
     * @var DATETIME
     */
    public $last_login;

    /**
     * @var DATETIME
     */
    public $member_since;

    /**
     * @var INT
     */
    public $language;

    /**
     * @var INT
     */
    public $city_id;

    /**
     * @var VARCHAR(255)
     */
    public $twitter_id;

    /**
     * @var VARCHAR(255)
     */
    public $facebook_id;

    /**
     * @var VARCHAR(255)
     */
    public $blog_rss;

    /**
     * Getter for some private attributes
     * @return mixed $attribute
     */
    public function __get($attribute) {
        if (isset($this->{"_" . $attribute})) {
            return $this->{"_" . $attribute};
        } else {
            return false;
        }
    }

    function User($user_id='', $first_name='', $last_name='', $email='', $password='', $last_login='', $member_since='', $language='', $city_id='', $twitter_id='', $facebook_id='', $blog_rss='') {
        $this->user_id = $user_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->last_login = $last_login;
        $this->member_since = $member_since;
        $this->language = $language;
        $this->city_id = $city_id;
        $this->twitter_id = $twitter_id;
        $this->facebook_id = $facebook_id;
        $this->blog_rss = $blog_rss;
    }

    /**
     * Gets object from database
     * @param integer $userId 
     * @return object $User
     */
    function Get($userId) {
        $connection = Database::Connect();
        $this->pog_query = "select * from `user` where `userid`='" . intval($userId) . "' LIMIT 1";
        $cursor = Database::Reader($this->pog_query, $connection);
        while ($row = Database::Read($cursor)) {
            $this->userId = $row['userid'];
            $this->user_id = $this->Unescape($row['user_id']);
            $this->first_name = $this->Unescape($row['first_name']);
            $this->last_name = $this->Unescape($row['last_name']);
            $this->email = $this->Unescape($row['email']);
            $this->password = $this->Unescape($row['password']);
            $this->last_login = $row['last_login'];
            $this->member_since = $row['member_since'];
            $this->language = $this->Unescape($row['language']);
            $this->city_id = $this->Unescape($row['city_id']);
            $this->twitter_id = $this->Unescape($row['twitter_id']);
            $this->facebook_id = $this->Unescape($row['facebook_id']);
            $this->blog_rss = $this->Unescape($row['blog_rss']);
        }
        return $this;
    }

    /**
     * Returns a sorted array of objects that match given conditions
     * @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
     * @param string $sortBy 
     * @param boolean $ascending 
     * @param int limit 
     * @return array $userList
     */
    function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='') {
        $connection = Database::Connect();
        $sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
        $this->pog_query = "select * from `user` ";
        $userList = Array();
        if (sizeof($fcv_array) > 0) {
            $this->pog_query .= " where ";
            for ($i = 0, $c = sizeof($fcv_array); $i < $c; $i++) {
                if (sizeof($fcv_array[$i]) == 1) {
                    $this->pog_query .= " " . $fcv_array[$i][0] . " ";
                    continue;
                } else {
                    if ($i > 0 && sizeof($fcv_array[$i - 1]) != 1) {
                        $this->pog_query .= " AND ";
                    }
                    if (isset($this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes']) && $this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes'][0] != 'NUMERIC' && $this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes'][0] != 'SET') {
                        if ($GLOBALS['configuration']['db_encoding'] == 1) {
                            $value = POG_Base::IsColumn($fcv_array[$i][2]) ? "BASE64_DECODE(" . $fcv_array[$i][2] . ")" : "'" . $fcv_array[$i][2] . "'";
                            $this->pog_query .= "BASE64_DECODE(`" . $fcv_array[$i][0] . "`) " . $fcv_array[$i][1] . " " . $value;
                        } else {
                            $value = POG_Base::IsColumn($fcv_array[$i][2]) ? $fcv_array[$i][2] : "'" . $this->Escape($fcv_array[$i][2]) . "'";
                            $this->pog_query .= "`" . $fcv_array[$i][0] . "` " . $fcv_array[$i][1] . " " . $value;
                        }
                    } else {
                        $value = POG_Base::IsColumn($fcv_array[$i][2]) ? $fcv_array[$i][2] : "'" . $fcv_array[$i][2] . "'";
                        $this->pog_query .= "`" . $fcv_array[$i][0] . "` " . $fcv_array[$i][1] . " " . $value;
                    }
                }
            }
        }
        if ($sortBy != '') {
            if (isset($this->pog_attribute_type[$sortBy]['db_attributes']) && $this->pog_attribute_type[$sortBy]['db_attributes'][0] != 'NUMERIC' && $this->pog_attribute_type[$sortBy]['db_attributes'][0] != 'SET') {
                if ($GLOBALS['configuration']['db_encoding'] == 1) {
                    $sortBy = "BASE64_DECODE($sortBy) ";
                } else {
                    $sortBy = "$sortBy ";
                }
            } else {
                $sortBy = "$sortBy ";
            }
        } else {
            $sortBy = "userid";
        }
        $this->pog_query .= " order by " . $sortBy . " " . ($ascending ? "asc" : "desc") . " $sqlLimit";
        $thisObjectName = get_class($this);
        $cursor = Database::Reader($this->pog_query, $connection);
        while ($row = Database::Read($cursor)) {
            $user = new $thisObjectName();
            $user->userId = $row['userid'];
            $user->user_id = $this->Unescape($row['user_id']);
            $user->first_name = $this->Unescape($row['first_name']);
            $user->last_name = $this->Unescape($row['last_name']);
            $user->email = $this->Unescape($row['email']);
            $user->password = $this->Unescape($row['password']);
            $user->last_login = $row['last_login'];
            $user->member_since = $row['member_since'];
            $user->language = $this->Unescape($row['language']);
            $user->city_id = $this->Unescape($row['city_id']);
            $user->twitter_id = $this->Unescape($row['twitter_id']);
            $user->facebook_id = $this->Unescape($row['facebook_id']);
            $user->blog_rss = $this->Unescape($row['blog_rss']);
            $userList[] = $user;
        }
        return $userList;
    }

    /**
     * Saves the object to the database
     * @return integer $userId
     */
    function Save() {
        $connection = Database::Connect();
        $this->pog_query = "select `userid` from `user` where `userid`='" . $this->userId . "' LIMIT 1";
        $rows = Database::Query($this->pog_query, $connection);
        if ($rows > 0) {
            $this->pog_query = "update `user` set 
			`user_id`='" . $this->Escape($this->user_id) . "', 
			`first_name`='" . $this->Escape($this->first_name) . "', 
			`last_name`='" . $this->Escape($this->last_name) . "', 
			`email`='" . $this->Escape($this->email) . "', 
			`password`='" . $this->Escape($this->password) . "', 
			`last_login`='" . $this->last_login . "', 
			`member_since`='" . $this->member_since . "', 
			`language`='" . $this->Escape($this->language) . "', 
			`city_id`='" . $this->Escape($this->city_id) . "', 
			`twitter_id`='" . $this->Escape($this->twitter_id) . "', 
			`facebook_id`='" . $this->Escape($this->facebook_id) . "', 
			`blog_rss`='" . $this->Escape($this->blog_rss) . "' where `userid`='" . $this->userId . "'";
        } else {
            $this->pog_query = "insert into `user` (`user_id`, `first_name`, `last_name`, `email`, `password`, `last_login`, `member_since`, `language`, `city_id`, `twitter_id`, `facebook_id`, `blog_rss` ) values (
			'" . $this->Escape($this->user_id) . "', 
			'" . $this->Escape($this->first_name) . "', 
			'" . $this->Escape($this->last_name) . "', 
			'" . $this->Escape($this->email) . "', 
			'" . $this->Escape($this->password) . "', 
			'" . $this->last_login . "', 
			'" . $this->member_since . "', 
			'" . $this->Escape($this->language) . "', 
			'" . $this->Escape($this->city_id) . "', 
			'" . $this->Escape($this->twitter_id) . "', 
			'" . $this->Escape($this->facebook_id) . "', 
			'" . $this->Escape($this->blog_rss) . "' )";
        }
        $insertId = Database::InsertOrUpdate($this->pog_query, $connection);
        if ($this->userId == "") {
            $this->userId = $insertId;
        }
        return $this->userId;
    }

    /**
     * Clones the object and saves it to the database
     * @return integer $userId
     */
    function SaveNew() {
        $this->userId = '';
        return $this->Save();
    }

    /**
     * Deletes the object from the database
     * @return boolean
     */
    function Delete() {
        $connection = Database::Connect();
        $this->pog_query = "delete from `user` where `userid`='" . $this->userId . "'";
        return Database::NonQuery($this->pog_query, $connection);
    }

    /**
     * Deletes a list of objects that match given conditions
     * @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
     * @param bool $deep 
     * @return 
     */
    function DeleteList($fcv_array) {
        if (sizeof($fcv_array) > 0) {
            $connection = Database::Connect();
            $pog_query = "delete from `user` where ";
            for ($i = 0, $c = sizeof($fcv_array); $i < $c; $i++) {
                if (sizeof($fcv_array[$i]) == 1) {
                    $pog_query .= " " . $fcv_array[$i][0] . " ";
                    continue;
                } else {
                    if ($i > 0 && sizeof($fcv_array[$i - 1]) !== 1) {
                        $pog_query .= " AND ";
                    }
                    if (isset($this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes']) && $this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes'][0] != 'NUMERIC' && $this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes'][0] != 'SET') {
                        $pog_query .= "`" . $fcv_array[$i][0] . "` " . $fcv_array[$i][1] . " '" . $this->Escape($fcv_array[$i][2]) . "'";
                    } else {
                        $pog_query .= "`" . $fcv_array[$i][0] . "` " . $fcv_array[$i][1] . " '" . $fcv_array[$i][2] . "'";
                    }
                }
            }
            return Database::NonQuery($pog_query, $connection);
        }
    }

}

?>