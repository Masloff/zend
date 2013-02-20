<?php
class Application_Plugin_Access extends Zend_Controller_Plugin_Abstract
{

    private $_acl = null;
    private $_auth = null;

    const ACCESS_DENIED = 401;
    /*
    *
    */

    public function __construct()
    {
        $this->_acl = $this->getRole();
        $this->_auth = Zend_Auth::getInstance();
    }

    protected function getRole()
    {
        $acl = new Zend_Acl();

        $acl->addRole('guest');
        $acl->addRole('user', 'guest');
        $acl->addRole('admin', 'user');

        $acl->addResource('index');
        $acl->addResource('error');
        $acl->addResource('admin');

        $acl->addResource('article');
        $acl->addResource('user');

        #admin allow
        $acl->allow('admin', 'error', array('index'));
        $acl->allow('admin', 'admin', array('users','articles','comments'));


        #user allow
        $acl->allow('user', 'user', array('logout'));
        $acl->allow('user', 'article', array('list','id','edit','new'));
        $acl->deny('user', 'user', array('registration', 'login'));


        #guest allow
        $acl->allow('guest', 'user', array('login', 'registration'));
        $acl->allow('guest', 'article', array('list'));
        $acl->allow('guest', 'index', array('index'));


        Zend_Registry::set('Zend_Acl',$acl);

        $identity = Zend_Auth::getInstance()->getStorage()->read();

        $role = !empty($identity->role) ? $identity->role : 'guest';
        Zend_Registry::set('currentRole',$role);
        //Zend_View_Helper_Navigation_HelperAbstract::setDefaultAcl($acl);

        return $acl;

    }

    public function preDispatch(Zend_Controller_Request_Abstract $request) {

        // get current controller
        $resource = $request->getControllerName();

        // get current action
        $action = $request->getActionName();

        // get role
        $identity = $this->_auth->getStorage()->read();

        $role = !empty($identity->role) ? $identity->role : 'guest';

        Zend_View_Helper_Navigation_HelperAbstract::setDefaultRole($role);

        if (!$this->_acl->isAllowed($role, $resource, $action)) {

            $request->setControllerName('error')->setActionName('page404');
            #throw new Zend_Acl_Exception("This page is not accessible.", Application_Plugin_AccessCheck::ACCESS_DENIED);
        }
    }
}