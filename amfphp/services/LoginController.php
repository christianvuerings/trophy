<?php
require_once 'dal/UserDAO.php';


class LoginController {

    /**
     * Logging in a user by email 
     *
     * @param string $email
     * @param string $password
     * @return User user
     */
    public static function LoginUser($email, $password) {
        $user = UserDAO::getInstance()->login($email, $password);     
        return array($user);
    }

}

?>