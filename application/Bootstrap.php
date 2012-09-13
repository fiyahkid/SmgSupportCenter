<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initDb() {
		require_once 'Zend/Loader/Autoloader.php';
		require_once '../application/models/RequestModel.php';
		
		//-- Setup Autoload
		Zend_Loader_Autoloader::getInstance();
		
		//-- Include Pfade setzen
		set_include_path('.' . PATH_SEPARATOR .
						 '../library' . PATH_SEPARATOR .
						 '../application/models/' . PATH_SEPARATOR .
						 get_include_path());
		
		
		//-- Roundel.de - support_center "without Zend"
		$params = array('host'		=> 'roundel.de',
						'username'	=> 'd01324f7',
						'password'	=> 'VkPof7bhLeg3uLUJ',
						'dbname'	=> 'd01324f7');
		
		
		//-- Test-DB
// 		$params = array('host'		=> 'localhost',
// 						'username'	=> 'root',
// 						'password'	=> '',
// 						'dbname'	=> 'ticketsystem');
		
		$db = Zend_Db::factory('PDO_MYSQL', $params);
		Zend_Db_Table::setDefaultAdapter($db);
		
		//require_once '../application/models/TicketoverviewModel.php';
		
		//-- Setup Controller
		$frontController = Zend_Controller_Front::getInstance();
		$frontController->setControllerDirectory('../application/controllers');
		
		
	}
	
	public function _initView(){
		$view = new Zend_View();
		
		$viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper(
				'ViewRenderer'
		);
		$viewRenderer->setView($view);
		
		return $view;
	}
	
	public function _initJQuery(){
		$this->bootstrap('layout');
		$view = $this->getResource('layout')->getView();
		//$view->addHelperPath('ZendX/JQuery/View/Helper/', 'ZendX_JQuery_View_Helper');
		//ZendX_JQuery::enableView($view);
		//$view->jQuery()->enable()->uienable();
		
	}
	
}

?>
