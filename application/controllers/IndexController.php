<?php

class IndexController extends Zend_Controller_Action
{

    public function indexAction(){
        $identity = Zend_Auth::getInstance()->getStorage()->read();

        if($identity){

            $this->view->name = $identity->first_name;

        }

    }

    public function init()
    {
        /* Initialize action controller here */
    }



}

