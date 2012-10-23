<?php

	ini_set(('display_errors'), 1);

	class Chat
	{
		protected $db;
		protected $results;

		public function __construct()
		{
			$this->db = new PDO('mysql:host=roundel.de;dbname=d01324f7', 'd01324f7', 'VkPof7bhLeg3uLUJ');
		}

		public function initialResults()
		{
			$query = "SELECT * FROM chat ORDER BY id desc LIMIT 10";
			//$query = "SHOW columns FROM chat";
			$stmt = $this->db->prepare($query);

			$stmt->execute();
			$this->results = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$this->formatResults();
		}

		public function getNewChats ()
		{
			$results = array();
			$i = 0;

			while( count($results) === 0 )
			{
				$query = "SELECT * FROM chat WHERE id > :lastId ORDER BY id asc";
				$stmt = $this->db->prepare($query);

				$stmt->execute(array('lastId' => $_GET['newChats']));
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$i++;

				if ($i >= 10)
				{
					break;
				}
				usleep(35);
			}

			$this->results = $results;
			$this->formatResults();

		}

		public function postMessage()
		{
			$query = "INSERT INTO `chat`(`from`, `from_email`, `text`) VALUES (:from, :from_email, :text)";

			$stmt = $this->db->prepare($query);
			$stmt->execute(array(
				'from' => $_POST['username'],
				'from_email' => $_POST['email'],
				'text' => $_POST['text']
			));
		}

		public function formatResults(Array $results = null)
		{
			header('Content-Type: application/json');
			echo json_encode($this->results);
		}
	}

	$chat = new Chat();
	switch (true)
	{
		case (isset($_GET['init'])):
			$chat->initialResults();
			break;
		case (isset($_GET['newChats'])):
			$chat->getNewChats();
			break;
		case (isset($_GET['post'])):
			$chat->postMessage();
			break;
	}

?>