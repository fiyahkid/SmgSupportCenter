<?php 

class AuthController extends Zend_Controller_Action
{
	public function loginAction()
	{
		//$auth = Zend_Auth::getInstance();
		//$db = $this->_getParam('db');
		///*
		$db = new Zend_Db_Adapter_Pdo_Mysql(array(
				'host'		=> '127.0.0.1',
				'username'	=> 'root',
				'password'	=> '',
				'dbname'	=> 'supportcenter'
				));
		//*/
		$loginForm = new Application_Form_Auth_Login($_POST);
		
		if ($loginForm->valid() && !empty($_POST)) {
			$adapter = new Zend_Auth_Adapter_DbTable(
					$db,
					'users',
					'username',
					'password',
					'MD5(CONCAT(?, password_salt))'
					);
			
			$adapter->setIdentity($_POST['username']);
			$adapter->setCredential($_POST['password']);
			
			//$adapter->setIdentity($loginForm->getValue('username'));
			//$adapter->setCredential($loginForm->getValue('password'));
			
			$result = $adapter->authenticate();
			
			//var_dump($result);
			
			if ($result->isValid()) {
				$this->_helper->FlashMessenger('Erfolgreich angemeldet');
				$this->_redirect('/');
				return;
			}
		}
		
		$this->view->loginForm = $loginForm;
		/*
		echo "ajfkajsfkjansfjansf";
		var_dump($loginForm->getValue('username'));
		var_dump($_POST['username']);
		*/
	}
}

?>