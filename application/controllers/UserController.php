<?php

class UserController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function registrationAction()
    {
        $form = new Application_Form_Registration();
        $db = new Application_Model_DbTable_User();
        $this->view->form = $form;

        if($this->getRequest()->isPost()){

            #отримуємо дані з пост запиту
            $formData = $this->getRequest()->getPost();
            #перевіряємо чи всі обов'язкові(за налаштуваннями форми) дані отримано
            if($form->isValid($formData)){

                #отримуємо передані пароль і логін
                $first_name = $this->getRequest()->getParam('first_name');
                $last_name = $this->getRequest()->getParam('last_name');
                $email = $this->getRequest()->getParam('email');
                $password = $this->getRequest()->getParam('password');

                $db->CreateNewUser($first_name, $last_name, $email, $password);
                $this->_helper->redirector('index', 'index');

            }
        }
    }

    public function loginAction()
    {

        $login = new Application_Form_Login();
        $this->view->form = $login;

        if ($this->getRequest()->isPost()) {

            $data = $this->getRequest()->getPost();
            #якщо дані пройшли умови вказані в формі
            if ($login->isValid($data)) {

                #отримуємо дані
                $email = $this->getRequest()->getPost('email');
                $password = md5($this->getRequest()->getPost('password'));
                #пароль в бд також має бути в md5()

                #ініціалізуємо адаптор
                $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());

                #робимо порівняння отриманих через пост даних і значень таблиці
                $authAdapter->setTableName('users')
                    ->setIdentityColumn('email')
                    ->setCredentialColumn('password')
                    ->setIdentity($email)
                    ->setCredential($password);

                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);

                #якщо логін і пароль співпадають робимо запис даних користувача в сесію
                if ($result->isValid()) {

                    $identity = $authAdapter->getResultRowObject();

                    $authStorage = $auth->getStorage();
                    $authStorage->write($identity);

                    #редірект на головну
                    $this->_helper->redirector('index', 'index');
                }
                else{
                    #редірект на сторінку з помилкою про невдалу авторизацію
                    $this->_helper->redirector('index', 'error');

                }

            }

        }
    }

    public function logoutAction()
    {
        /*
         * Logout action
         *
         * User logout functionality, session clearing
         */


        Zend_Auth::getInstance()->clearIdentity();
        $this->_helper->redirector('index', 'index');
    }


}







