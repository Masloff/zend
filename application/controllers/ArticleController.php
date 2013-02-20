<?php

class ArticleController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function newAction()
    {
        $form = new Application_Form_Article();
        
        $db = new Application_Model_DbTable_Article();
        $this->view->form = $form;

        $identity = Zend_Auth::getInstance()->getStorage()->read();

        if($identity){

            $this->view->name = $identity->first_name;

        }

        if($this->getRequest()->isPost()){

            #отримуємо дані з пост запиту
            $formData = $this->getRequest()->getPost();
            #перевіряємо чи всі обов'язкові(за налаштуваннями форми) дані отримано
            if($form->isValid($formData)){

                #отримуємо передані пароль і логін
                $name = $this->getRequest()->getParam('name');
                $short_text = $this->getRequest()->getParam('short_text');
                $full_text = $this->getRequest()->getParam('full_text');
                $identity = Zend_Auth::getInstance()->getStorage()->read();


                $db->CreateNewArticle($name, $short_text, $full_text, $identity->id);


            }
        }

    }

    public function listAction()
    {
        $identity = Zend_Auth::getInstance()->getStorage()->read();
        if($identity){

            $this->view->name = $identity->first_name;

        }

        $articles = new Application_Model_DbTable_Article();
        $this->view->list = $articles->listArticles();
        
    }

    public function idAction()
    {

        $db = new Application_Model_DbTable_Article();
        $comments = new Application_Model_DbTable_Comment();
        $form = new Application_Form_Review();

        $identity = Zend_Auth::getInstance()->getStorage()->read();

        if($this->getRequest()->isPost()){



            #отримуємо дані з пост запиту
            $formData = $this->getRequest()->getPost();
            #перевіряємо чи всі обов'язкові(за налаштуваннями форми) дані отримано
            if($form->isValid($formData)){



                #отримуємо передані пароль і логін
                $text = $this->getRequest()->getParam('comment');
                $article_id = $this->getRequest()->getParam('id');
                $identity = Zend_Auth::getInstance()->getStorage()->read();


                $comments->newComment($text, $article_id, $identity->id);


            }
        }

        $this->view->list = $comments->getArticleComments($this->getRequest()->getParam('id'));
        $this->view->form = $form;
        $this->view->article = $db->getArticleById($this->getRequest()->getParam('id'));


    }

    public function reviewAction()
    {
        // action body
    }

    public function commentListAction()
    {
        // action body
    }

    public function editAction()
    {

        $form = new Application_Form_Article();
        $db = new Application_Model_DbTable_Article();
        $identity =  Zend_Auth::getInstance()->getStorage()->read();


        if($this->getRequest()->isPost()){

            #отримуємо дані з пост запиту
            $formData = $this->getRequest()->getPost();
            #перевіряємо чи всі обов'язкові(за налаштуваннями форми) дані отримано
            if($form->isValid($formData)){

                $db->updateArticle($formData, $identity->id);

            }
        }

        $data = $db->getArticleById($this->getRequest()->getParam('id'));

        $this->view->form = $form->populate($data);
    }

    public function editcommentAction()
    {

        $form = new Application_Form_Review();
        $db = new Application_Model_DbTable_Article();
        $comments = new Application_Model_DbTable_Comment();
        $identity =  Zend_Auth::getInstance()->getStorage()->read();

        if($this->getRequest()->getParam('delete')){


            $comments->deleteComment($this->getRequest()->getParam('delete'));

        }

        if($this->getRequest()->isPost()){

            #отримуємо дані з пост запиту
            $formData = $this->getRequest()->getPost();
            #перевіряємо чи всі обов'язкові(за налаштуваннями форми) дані отримано
            if($form->isValid($formData)){

                $comments->updateComment($formData, $identity->id);

            }
        }

        $data = $comments->getCommentById($this->getRequest()->getParam('id'));

        $this->view->form = $form->populate($data);


    }


}















