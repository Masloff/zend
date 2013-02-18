<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    function _initViewRes() {

        $this->bootstrap('view');
        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();
        return $view;

    }

    protected function _initAcl()
    {

        $fc = Zend_Controller_Front::getInstance();
        $fc -> registerPlugin(new Application_Plugin_Access());

    }

    public function _initNavigation()
    {

        $this->bootstrap('view');
        $view = $this->getResource('view');

        $navigation = new Maslov_Navigation(new Zend_Config(require APPLICATION_PATH . DIRECTORY_SEPARATOR.'configs'.DIRECTORY_SEPARATOR.'navigation.php'));

        Zend_Registry::set('Zend_Navigation',$navigation);

        $acl = Zend_Registry::get('Zend_Acl');

        $view   ->navigation($navigation)
            ->setAcl($acl)
            ->setRole(Zend_Registry::get('currentRole'));

    }
}

