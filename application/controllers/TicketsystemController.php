<?php

class TicketsystemController extends Zend_Controller_Action
{
	public function eingangAction ()
    {
    	$this->_helper->layout->disableLayout();	
    }
    public function bearbeitungAction ()
    {
    	$this->_helper->layout->disableLayout();	
    }
    public function ausgangAction ()
    {
    	$this->_helper->layout->disableLayout();	
    }
}