<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {   
    	//Startseite, rendert eigentlich nur das Layout...
    }

    public function mainAction ()
    {
    	//Content der Index Seite, wird per Ajax von Angular reingeladen
    	//immer Layout disablen

    	$this->_helper->layout->disableLayout();
    }

    public function getListAction ()
    {
    	//Seite auf der die Tickets angzeigt werden
    	$this->_helper->layout->disableLayout();	
    }





	public function ticketsystemAction()
	{
		//$this->_helper->layout->disableLayout(); //nur einblenden, wenn kein 'wrapper'-DIV in unterseiten verwendet
		// action body
	}
	public function kalenderAction()
	{
		// $this->_helper->layout->disableLayout(); //nur einblenden, wenn kein 'wrapper'-DIV in unterseiten verwendet
		// action body
	}
	public function terminverwaltungAction()
	{
		// $this->_helper->layout->disableLayout(); //nur einblenden, wenn kein 'wrapper'-DIV in unterseiten verwendet
		// action body
	}
	public function instantmessagingAction()
	{
		// $this->_helper->layout->disableLayout(); //nur einblenden, wenn kein 'wrapper'-DIV in unterseiten verwendet
		// action body
	}
	public function statistikAction()
	{
		// $this->_helper->layout->disableLayout(); //nur einblenden, wenn kein 'wrapper'-DIV in unterseiten verwendet
		// action body
	}
}

?>
