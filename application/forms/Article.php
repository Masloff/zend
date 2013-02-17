<?php

class Application_Form_Article extends Zend_Form
{

    public function init()
    {
        $this->setName('artForm');
        $this->setAction('/article/new');

        $name = new Zend_Form_Element_Text('name');
        $name  ->setLabel('Назва статті')
               ->setRequired(true)
               ->addValidator('NotEmpty')
               ->setAttrib('id', 'name');

        $short_text = new Zend_Form_Element_Text('short_text');
        $short_text ->setLabel('Описання')
                    ->setRequired(true)
                    ->addValidator('NotEmpty')
                    ->setAttrib('id', 'short_text');

        $full_text = new Zend_Form_Element_Textarea('full_text');
        $full_text ->setLabel('Текст статті')
                   ->setRequired(true)
                   ->addValidator('NotEmpty')
                   ->setAttrib('id', 'full_text');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submit');

        $this->addElements(array($name, $short_text, $full_text, $submit));

    }


}

