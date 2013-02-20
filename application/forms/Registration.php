<?php

class Application_Form_Registration extends Zend_Form
{
    public function init()
    {

        $this->setName('regForm');
        $this->setAction('/user/registration');

        $first_name = new Zend_Form_Element_Text('first_name');
        $first_name  ->setLabel('Ім\'я')
            ->setRequired(true)
            ->addValidator('NotEmpty')
            ->setAttrib('id', 'first_name');

        $last_name = new Zend_Form_Element_Text('last_name');
        $last_name  ->setLabel('Прізвище')
            ->setRequired(true)
            ->addValidator('NotEmpty')
            ->setAttrib('id', 'last_name');

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
        $submit->setAttrib('id', 'submitButton');

        $this->addElements(array($first_name, $last_name, $email, $password, $submit));

    }
}
