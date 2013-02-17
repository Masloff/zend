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
        $db = new Application_Model_DbTable_Article();

    }


}





