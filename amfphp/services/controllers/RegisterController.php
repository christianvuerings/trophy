<?php

require_once('dal/UserDAO.php');
require_once('model/User.php');

class RegisterController {

    /**
     * Registering a new user
     *
     * @param User $myUser
     * @return string $message
     */
    public static function RegisterUser(User $myUser) {
        $message = UserDAO::getInstance()->register($myUser);
    }

}

?>