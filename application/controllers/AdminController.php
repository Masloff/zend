<?php

class AdminController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function usersAction()
    {

        $users = new Application_Model_DbTable_User();
        $this->view->list = $users->listUsers();

    }

    public function articlesAction()
    {
        $articles = new Application_Model_DbTable_Article();
        $this->view->list = $articles->listArticles();
    }

    public function commentsAction()
    {
        $comments = new Application_Model_DbTable_Comment();
        $this->view->list = $comments->listComments();
    }


}







