<?php

class Application_Model_DbTable_User extends Zend_Db_Table_Abstract
{

    protected $_name = 'users';

    public function CreateNewUser($first, $last, $mail, $pass){

        /**
         * CreateNewUser method
         *
         * Adds a new user to users table
         *
         * @param  $array (array) with received form user data
         * @return $status (int) business creating status
         */

        $data = array(

            'first_name' => $first,
            'last_name' => $last,
            'email' => $mail,
            'password' => md5($pass),
            'role' => 'user',
            'status' => 1

        );

    $this->insert($data);

    }


}

