<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
        $this->setName('logForm');
        $this->setAction('/user/login');

        $email = new Zend_Form_Element_Text('email');
        $email  ->setLabel('Email')
            ->setRequired(true)
            ->addValidator('NotEmpty')
            ->setAttrib('id', 'email');

        $password = new Zend_Form_Element_Password('password');
        $password   ->setLabel('Пароль')
            ->setRequired(true)
            ->addValidator('NotEmpty')
            ->setAttrib('id', 'password');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submit');

        $this->addElements(array($email, $password, $submit));
    }


}

