<?php

class Application_Model_DbTable_Article extends Zend_Db_Table_Abstract
{

    protected $_name = 'articles';

    public function CreateNewArticle($name, $short, $full, $owner_id){

        /**
         * CreateNewUser method
         *
         * Adds a new article to articles table
         *
         * @param  $array (array) with received form article data
         * @return $status (int) business creating status
         */

        $data = array(

            'name' => $name,
            'short_text' => $short,
            'full_text' => $full,
            'owner_id' => $owner_id

        );

        $this->insert($data);

    }
}

