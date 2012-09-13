<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
	$query = TicketsystemQuery::create();
	$ticket = $query->findPk(1);
	echo $ticket->getFehlermeldung();
	var_dump( $ticket );
        // action body
    }

	public function ticketsystemAction()
	{
		// $this->_helper->layout->disableLayout(); //nur einblenden, wenn kein 'wrapper'-DIV in unterseiten verwendet
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
