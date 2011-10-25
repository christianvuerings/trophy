<?php

include_once('../Include/database.php');

class User {

    public $userId;
    public $user_id;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $last_login;
    public $language;
    public $city_id;
    public $twitter_id;
    public $facebook_id;
    public $blog_rss;


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

    function Get($userId) {
        $connection = Database::Connect();
        $query = "select * from `user` where `userid`='" . intval($userId) . "' LIMIT 1";
        $cursor = Database::Reader($query, $connection);
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

    function Delete($userId) {
        $connection = Database::Connect();
        $query = "delete from `user` where `userid`='" . $userId . "'";
        return Database::NonQuery($this->pog_query, $connection);
    }
    
    //TODO : getters en setters toevoegen

}

?>