<?php
require_once('connection.class.php');
require_once('subscribe.class.php');

class Nowshowing extends Connection {
		//--------------------------- Add movies-------------------------//
	public function addMovie()
	{
		try {
			$con = new Connection();
			$db = $con->openConnection();

			// $data = $db->query("SELECT * FROM now_showing");
			// $checkDataAvailable = $data->fetchAll();

			// if(!$checkDataAvailable) {
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
				//echo '<pre>';
				//var_dump($movies); die();
					//get the first index of scrapped image
				$scrapped_data = $movies['1']['time'];
				//var_dump($scrapped_data); die();
				$data = $db->query("SELECT * FROM now_showing");
				$checkDataAvailable = $data->fetchAll();

				if($checkDataAvailable){
					//echo 'data available'; die();
					$db_image = $checkDataAvailable[1]['time_detail'];
				if($scrapped_image = $db_image){
	//show image from database
		//die('same pinch');
						$data = $db->query("SELECT * FROM now_showing");
						$checkDataAvailable = $data->fetchAll();

						return $checkDataAvailable;
					}
					else{
						//drop the database & insert to database
						//$i=0;
						for($i=0; $i<1; $i++){
							$data = $db->query("TRUNCATE TABLE now_showing");
							$deleteAll = $data->execute();
						}
					}
}else{
	// send email to all subscriber
					$subscriber = new subscribe();
					$views = $subscriber->viewSubscriber();
					foreach ($views as $contact) {
						$to      =  $contact['subscriber_email'];
    $subject = 'New Upcoming movie';
    $message = "Hello ".$to . "," . "\r\n" . "\r\n" . 
    "We have new now showing movie details, Please kindly visit our website MovieTimes."."\r\n". "\r\n". 
      "Thank you."."\r\n".
      "http://sagars.com/movietimes";
    $headers = "From: info@sagars.com.np" . "\r\n" .
"CC: info@themenepal.com";
    if(mail($to, $subject, $message, $headers)){
    	echo 'sent';
    }else{
echo 'not sent';
    };
   
						
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
