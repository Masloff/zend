<?php

class Application_Form_Review extends Zend_Form
{

    public function init()
    {
        $this->setName('comForm');

        $id = new Zend_Form_Element_Hidden('id');

        $text = new Zend_Form_Element_Textarea('comment');
        $text  ->setLabel('Залишити коментар')
               ->setRequired(true)
               ->addValidator('NotEmpty')
               ->setAttrib('id', 'comment');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitComment');

        $this->addElements(array($id, $text, $submit));
    }


}

