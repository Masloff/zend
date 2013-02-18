<?php

class Application_Model_DbTable_Comment extends Zend_Db_Table_Abstract
{

    protected $_name = 'comments';

    public function newComment($text, $article_id, $owner_id){


        $data = array(

            'comment' => $text,
            'article_id' => $article_id,
            'owner_id' => $owner_id

        );

        $this->insert($data);

    }

    public function  listComments(){

        $data = $this   ->select()
                        ->from($this->_name);


        return $data->query()->fetchAll();


    }

    public function getArticleComments($article_id){

        $data = $this   ->select()
                        ->from($this->_name)
                        ->where('article_id =?', $article_id);

        return $data->query()->fetchAll();

    }
}

