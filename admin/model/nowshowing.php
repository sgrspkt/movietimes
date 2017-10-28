<?php
require_once('connection.class.php');

class Nowshowing extends Connection {
		//--------------------------- Add movies-------------------------//
		public function addMovie()
		{
			try {
				$con = new Connection();
				$db = $con->openConnection();

				$data = $db->query("SELECT * FROM now_showing");
				$checkDataAvailable = $data->fetchAll();

				if(!$checkDataAvailable) {
					include_once('admin/plugins/htmldom/simple_html_dom.php');
					// Create DOM from URL or file
					$html = file_get_html('http://www.showtimenepal.com/p/now-showing.html');

					// creating an array of elements
					$movies = [];
					$body = $html->find(".resM",0);

					foreach ($body->find('tr') as $job) {

			        // Find item link element
			        $hallDetails = $job->find('td',0);
			        $contactDetails = $job->find('td',1);
			        $timeDetails = $job->find('td',2);
			        $ticketDetails = $job->find('td',3);

			        // get title attribute
			        $movieHall = $hallDetails ? $hallDetails->innertext : null;
			        $movieContact = $contactDetails ? $contactDetails->innertext : null;
							$movieTime = 	$timeDetails ? $timeDetails->innertext : null;
							$movieTicket = 	$ticketDetails ? $ticketDetails->innertext : null;

			        $movies[] = [
			                'movieHall' => $movieHall,
			                'contact' => $movieContact,
			                'time' => $movieTime,
			                'ticket' => $movieTicket
			        ];
					}
				foreach ($movies as $movie) {

				  $sql = $db->prepare("INSERT INTO now_showing(`hall_detail`,`contact_detail`,`time_detail`,`ticket_detail`) VALUES ('".$movie['movieHall']."','".$movie['contact']."','".$movie['time']."','".$movie['ticket']."') ") ;
				  $insert = $sql->execute();
				    }
				}

			} catch (Exception $e) {

			}
	}


		//------------------view movies ------------------------//
		public function viewMovies(){
			$con = new Connection();
            $db = $con->openConnection();
			if(isset($this->movie_details_id)){
				$data = $db->query("SELECT * FROM now_showing WHERE movie_details_id = '$this->movie_details_id'");
				$movies = $data->fetchAll();
}
			else{
$data = $db->query("SELECT * FROM now_showing ORDER BY movie_details_id DESC");
$movies = $data->fetchAll();

			}
	return $movies;

}

}
