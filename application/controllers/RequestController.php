<?php 

class RequestController extends Zend_Controller_Action
{
	public function init() {

	}

	public function indexAction () {
		die('test');
	}

	public function ticketoverviewAction(){
		
	}
	
	public function getListAction()
	{
		$query = TicketsystemQuery::create();
		$tickets = $query->limit( $this->_getParam('limit', 10) )->offset( $this->_getParam('offset', 10) )->find();

		$results = array();
		foreach($tickets as $ticket){
			$results[] = $ticket->toArray();
		}

		$this->_helper->json($results);

	}

	public function getSearchListAction()
	{
		$query = TicketsystemQuery::create();
		$tickets = $query/*->limit( $this->_getParam('limit') )*/->offset( $this->_getParam('offset') )->find();
	}

	public function requestallAction()
	{
		$request = new RequestModel();
		$rowset = $request->fetchAll();
		
		foreach($rowset as $key => $row)
		{
			echo '<h3>Row ' . $key . '</h3>';
			Zend_Debug::dump($row->toArray());
			
			echo '<h3>Row ' . $key . ' Title</h3>';
			Zend_Debug::dump($row->ticket_id);
		}
	}
	

	public function tsDetailsAction(){
		$request = new RequestModel();
		
		$aktion = $this->_getParam('aktion');
		
		if($aktion == 'get_details'){
			$id = $this->_getParam('tid');
			$select = $request->getAdapter()
						 ->select()
						 ->from(array('ts' => 'ticketsystem',
						 			  'tv' => 'ticket_verlauf'))
						 ->joinLeft(array('tv' => 'ticket_verlauf'), 'ts.ticket_id = tv.ticket_id')
						 ->where('ts.ticket_id = ?', $id)
						 ->where('tv.ticket_id = ?', $id)
						 ->order('tv.ticket_id ASC');
			$stmt = $select->query();
		}else{
			$id = $this->_getParam('tid');
			$select = $request->getAdapter()
						 ->select()
						 ->from(array('ts' => 'ticketsystem',
						 			  'tv' => 'ticket_verlauf'))
						 ->joinLeft(array('tv' => 'ticket_verlauf'), 'ts.ticket_id = tv.ticket_id')
						 ->where('tv.id_ticket_verlauf = ?', $id)
						 ->order('tv.ticket_id ASC');
			$stmt = $select->query();
		}
		
		$this->_helper->layout()->disableLayout();
// 		$this->_helper->viewRenderer()->setNoRender(true);
		
		header("Content-Type: application/json");
		
		$return = $this->_helper->json($stmt->fetchAll());
		return $return;
	}
	
	public function tsListeAction(){
		$request = new RequestModel();
		
		$select = $request->select()
						  ->from(array('ts' => 'ticketsystem'),
						  		 array('*',
						  		 	   'dat_format' => 'DATE_FORMAT(datum, "%d.%m.%Y %T")',
						  		 	   'timestamp' => 'UNIX_TIMESTAMP(datum)'))
						  ->order('ticket_id DESC');
		$stmt = $select->query();
		
		$this->_helper->layout()->disableLayout();
// 		$this->_helper->viewRenderer()->setNoRender(true);
		
		header("Content-Type: application/json");
		
		$return = $this->_helper->json($stmt->fetchAll());
		return $return;
	}
	
	public function ticketVerlaufAction(){
		$request = new RequestModel();
		
		$ticketId = $this->_getParam('id');
		
		$select = $request->getAdapter()
						  ->select()
						  ->from(array('ts' => 'ticketsystem'))
						  ->where('ts.ticket_id = ticket_verlauf.ticket_id LIKE ?', $ticketId)
						  ->order('tv_datum ASC');
		
		$stmt = $select->query();
		
		$return = $this->_helper->json($stmt->fetchAll());
		return $return;
	}
	
	public function ticketVerlaufEingangAction(){
		$request = new RequestModel();
		
		if(/*isset(*/$this->_getParam('id')/*) && is_numeric($this->_getParam('id'))*/){
			$ticketId = $this->_getParam('id');
		}else{
			return json_encode(array());
		}
		
		$select = $request->select()
						  ->from(array('ts' => 'ticketsystem'),
						  		 array('*'))
						  ->where('id_ticketsystem = ?', $ticketId)
						  ->limit('1');
		$stmt = $select->query();
		
		$return = $this->_helper->json($stmt->fetchAll());
		return $return;
	}
	
	public function ticketVerlaufNeuAction(){
		$request = new RequestModel();
		
		$ticketId = $this->_getParam('id');
		
		$select = $request->select()
						  ->from(array('ts' => 'ticketsystem',
						  			   'tv' => 'ticket_verlauf'),
						  		 array('*',
						  		 	   'dat_format' => 'DATE_FORMAT(datum, "%d.%m.%Y %T")'))
						  ->where('ts.ticket_id = tv.ticket_id LIKE ?', $ticketId);
		
		$stmt = $select->query();
		
		$return = $this->_helper->json($stmt->fetchAll());
		return $return;
	}

	public function anhangAction(){
		$request = new RequestModel();
		
		$ticketId = $this->_getParam('ticket_id');
		
		$select = $request->select()
						  ->from('ticket_verlauf', 'tv_screenshot')
						  ->where('ticket_id = ?', $ticketId);
		
		$stmt = $select->query();
		
		$return = $this->_helper->json($stmt->fetchAll());
		return $return;
	}
}

class SafeController extends Zend_Controller_Action
{
	public function ticketNeuAction(){
		$request = new RequestModel();
		
		$ticketId = new EditTicketNrController();
		$tid = $ticketId->newTicketNrAction();
		
// 		$an 			= $this->_getParam('an');
// 		$debitor 		= $this->_getParam('debitor');
// 		$fehlermeldung 	= $this->_getParam('fehlermeldung');
// 		$von 			= $this->_getParam('von');
// 		$produkt 		= $this->_getParam('produkt');
// 		$fehlerart 		= $this->_getParam('fehlerart');
// 		$fehlertext 	= $this->_getParam('fehlertext');
// 		$screenshot 	= $this->_getParam('screenshot');
////	$tid 			= $this->_getParam('ticket_id');
// 		$status 		= $this->_getParam('status');
				
		$data = array('an'				=> $this->_getParam('an'),
					  'debitor'			=> $this->_getParam('debitor'),
					  'fehlermeldung'	=> $this->_getParam('fehlermeldung'),
					  'von'				=> $this->_getParam('von'),
					  'produkt'			=> $this->_getParam('produkt'),
					  'fehlerart'		=> $this->_getParam('fehlerart'),
					  'fehlertext'		=> $this->_getParam('fehlertext'),
					  'screenshot'		=> $this->_getParam('screenshot'),
					  'ticket_id'		=> $tid,
					  'status'			=> $this->_getParam('status')								
					 );
		
// 		$id = $request->insert($data);
// 		$row = $request->fetchRow('ticket_id = ' . $id);
		
		$err = $request->insert('ticket_verlauf', $data);
		if(!$err){
			print_r($request->errorInfo());
		}
		
		$request->insert('ticket_verlauf', $data);
	}
	
	public function ticketVerlaufNeuAction(){
		$request = new RequestModel();
		
		$ticketId = new EditTicketNrController();
		$tid = $ticketId->lastTicketNrAction();
		
		$data = array('fehlermeldung'	=> $this->_getParam('fehlermeldung'),
					  'fehlertext' 		=> $this->_getParam('fehlertext'),
					  'bearbeiter'		=> $this->_getParam('bearbeiter'),
					  'status'			=> $this->_getParam('status'),
					  'screenshot'		=> $this->_getParam('screenshot'),
					  'ticket_id'		=> $tid
					 );
		
		$err = $request->insert('ticket_verlauf', $data);
		if(!$err){
			print_r($request->errorInfo());
		}
		
		$request->insert('ticket_verlauf', $data);
		
	}
	
	public function tVerlaufNeuAction(){
		$request = new RequestModel();
		
		$data = array('fehlermeldung'	=> $this->_getParam('fehlermeldung'),
					  'fehlertext' 		=> $this->_getParam('fehlertext'),
					  'bearbeiter'		=> $this->_getParam('bearbeiter'),
					  'status'			=> $this->_getParam('status'),
					  'screenshot'		=> $this->_getParam('screenshot'),
					  'ticket_id'		=> $this->_getParam('ticket_id')
					 );
		
		$err = $request->insert('ticket_verlauf', $data);
		if(!$err){
			print_r($request->errorInfo());
		}
		
		$request->insert('ticket_verlauf', $data);
		
	}
}

class EditTicketNrController extends Zend_Controller_Action
{
	public function newTicketNrAction(){
		$request = new RequestModel();
		
		$select = $request->select()
						  ->from('ticketsystem')
						  ->order('ticket_id DESC')
						  ->limit('1');
		$stmt = $select->query();
		
		$tn = $stmt->fetchAll();
		
		if(!$tn){
			return 0;
		}else{
			return $tn->ticket_id + 1;
		}
	}
	
	public function lastTicketNrAction(){
		$request = new RequestModel();
		
		$select = $request->select()
						  ->from('ticketsystem')
						  ->order('ticket_id DESC')
						  ->limit('1');
		$stmt = $select->query();
		
		$tn = $stmt->fetchAll();
		
		if(!$tn){
			return 0;
		}else{
			return $tn->ticket_id;
		}
	}
}

















/*
	public function createAction()
	{
		$ticketsystem = new TicketoverviewModel();
		
		$newDate 				= date('d.m.Y H:i:s');
		
		//-- 
		
		$betreff 				= 'Das ist der erste Test';
		$datum 					= date('d.m.Y');
		$ticketstatus_nummer 	= '1';
		$teams_nummer 			= '1';
		$mitarbeiter_mk 		= 'resc';
		$tickettypen_nummer 	= '1';
		$inserted 				= date('d.m.Y H:i:s');
		$insertedname 			= '1';
		$kennnummer 			= '1';
		$name 					= 'test';
		$telefon 				= '0123456789';
		$telefon_mobil 			= '0123456789';
		$fax 					= '1234567890';
		$email 					= 'test@test.test';
		$locked 				= '1';
		$wiedervorlage 			= '2';
		$versendet 				= '2';
		$ticketpop3_nummer 		= '1';
		$nummer_clear 			= '1';
		$prioritaet 			= '2';
		$editlock 				= '1';
		$editlock_mk 			= '1';
		$email_cc 				= 'tes@tes.tes';
		$email_bcc 				= 'te@te.te';
		$an_liste 				= '1';
		$lastchange 			= date('d.m.Y H:i:s');
		$ticketherkunft 		= '1';
		$newticket 				= '1'; 
		
		
		$data = array(
				'betreff' 				=> $betreff,
				'datum' 				=> $datum,
				'ticketstatus_nummer' 	=> $ticketstatus_nummer,
				'teams_nummer' 			=> $teams_nummer,
				'mitarbeiter_mk' 		=> $mitarbeiter_mk,
				'tickettypen_nummer' 	=> $tickettypen_nummer,
				'inserted'				=> $inserted,
				'insertedname' 			=> $insertedname,
				'kennnummer' 			=> $kennnummer,
				'name' 					=> $name,
				'telefon' 				=> $telefon,
				'telefon_mobil' 		=> $telefon_mobil,
				'fax' 					=> $fax,
				'email' 				=> $email,
				'locked' 				=> $locked,
				'wiedervorlage' 		=> $wiedervorlage,
				'versendet' 			=> $versendet,
				'ticketpop3_nummer' 	=> $ticketpop3_nummer,
				'nummer_clear' 			=> $nummer_clear,
				'prioritaet' 			=> $prioritaet,
				'editlock' 				=> $editlock,
				'editlock_mk' 			=> $editlock_mk,
				'email_cc' 				=> $email_cc,
				'email_bcc' 			=> $email_bcc,
				'an_liste' 				=> $an_liste,
				'lastchange' 			=> $lastchange,
				'ticketherkunft' 		=> $ticketherkunft,
				'newticket' 			=> $newticket
				);
		
		//-- Datensatz einfügen
		$id = $ticketsystem->insert($data);
		
		//-- Datensatz abrufen und $row zuweisen
		$row = $ticketsystem->fetchRow('nummer = ' . $id);
		
		//-- Daten per dump ausgeben
		Zend_Debug::dump($row->toArray());
	}
	
	public function showAction()
	{
		$ticketsystem = new TicketoverviewModel();
		
		$row = $ticketsystem->fetchRow('ticket_id = 1');
		
		Zend_Debug::dump($row->toArray());
	}
	
	public function changeAction()
	{
		$ticketsystem = new TicketoverviewModel();
		
		$row = $ticketsystem->fetchRow('ticket_id = 1');
		$newDate = date('Y-m-d H:i:s');
		$row->datum = $newDate;
		$row->save();
		
		Zend_Debug::dump($row->toArray());
	}
	
	public function deleteAction()
	{
		$ticketsystem = new TicketoverviewModel();
	
		$newDate 				= date('d.m.Y H:i:s');
	
		//--
	
		$betreff 				= 'Das ist der erste Test';
		$datum 					= date('d.m.Y');
		$ticketstatus_nummer 	= '1';
		$teams_nummer 			= '1';
		$mitarbeiter_mk 		= 'resc';
		$tickettypen_nummer 	= '1';
		$inserted 				= date('d.m.Y H:i:s');
		$insertedname 			= '1';
		$kennnummer 			= '1';
		$name 					= 'test';
		$telefon 				= '0123456789';
		$telefon_mobil 			= '0123456789';
		$fax 					= '1234567890';
		$email 					= 'test@test.test';
		$locked 				= '1';
		$wiedervorlage 			= '2';
		$versendet 				= '2';
		$ticketpop3_nummer 		= '1';
		$nummer_clear 			= '1';
		$prioritaet 			= '2';
		$editlock 				= '1';
		$editlock_mk 			= '1';
		$email_cc 				= 'tes@tes.tes';
		$email_bcc 				= 'te@te.te';
		$an_liste 				= '1';
		$lastchange 			= date('d.m.Y H:i:s');
		$ticketherkunft 		= '1';
		$newticket 				= '1';
	
	
		$data = array(
				'betreff' 				=> $betreff,
				'datum' 				=> $datum,
				'ticketstatus_nummer' 	=> $ticketstatus_nummer,
				'teams_nummer' 			=> $teams_nummer,
				'mitarbeiter_mk' 		=> $mitarbeiter_mk,
				'tickettypen_nummer' 	=> $tickettypen_nummer,
				'inserted'				=> $inserted,
				'insertedname' 			=> $insertedname,
				'kennnummer' 			=> $kennnummer,
				'name' 					=> $name,
				'telefon' 				=> $telefon,
				'telefon_mobil' 		=> $telefon_mobil,
				'fax' 					=> $fax,
				'email' 				=> $email,
				'locked' 				=> $locked,
				'wiedervorlage' 		=> $wiedervorlage,
				'versendet' 			=> $versendet,
				'ticketpop3_nummer' 	=> $ticketpop3_nummer,
				'nummer_clear' 			=> $nummer_clear,
				'prioritaet' 			=> $prioritaet,
				'editlock' 				=> $editlock,
				'editlock_mk' 			=> $editlock_mk,
				'email_cc' 				=> $email_cc,
				'email_bcc' 			=> $email_bcc,
				'an_liste' 				=> $an_liste,
				'lastchange' 			=> $lastchange,
				'ticketherkunft' 		=> $ticketherkunft,
				'newticket' 			=> $newticket
		);
	
		//-- Datensatz einfügen
		$id = $ticketsystem->insert($data);
	
		//-- Datensatz abrufen und $row zuweisen
		$row = $ticketsystem->fetchRow('nummer = ' . $id);
	
		//-- Datensatz löschen
			   $ticketsystem->delete('nummer = ' . $id);
	
		//-- Daten per dump ausgeben
		Zend_Debug::dump($row->toArray());
	}
*/


?>
