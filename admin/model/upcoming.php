<?php
require_once('connection.class.php');

class Upcoming extends Connection {
	private $movie_details_id;

	public function setMovieDetailsId($ud=''){
		$this->movie_details_id=$ud;
	}
		//--------------------------- Add movies-------------------------//
		public function addUpcomingMovie()
		{
			try {
				$con = new Connection();
				$db = $con->openConnection();
				$data = $db->query("SELECT * FROM upcoming");
				$checkDataAvailable = $data->fetchAll();

				if(!$checkDataAvailable) {
					include_once('admin/plugins/htmldom/simple_html_dom.php');
					// Create DOM from URL or file
					$html = file_get_html('http://www.showtimenepal.com/p/upcoming-movies.html');

					// creating an array of elements
					$upcomingmovies = [];

					$body = $html->find("#post-body-4286126248204104629",0);

					foreach ($body->find('div .upcoming_block') as $movie) {
// echo '<pre>';
// var_dump($movie);
			        // Find item link element
			        $thumbnail = $movie->find('img',0);
							$title = $movie->find('h3',0);
			        $cast = $movie->find('div',0);
							$release_date = $movie->find('div',1);
							$genre = $movie->find('div',2);
							$runtime = $movie->find('div',4);
							$trailer = $movie->find('iframe',0);



							// $timeDetails = $movie->find('td',2);
			        // $ticketDetails = $movie->find('td',3);

			        // get title attribute
			        $image = $thumbnail ? $thumbnail->src : null;
							$title = $title ? $title->innertext : null;

							$casts = $cast->children;
							foreach ($casts as $singlecast) {
								$singlecast->outertext = '';
							}
							$cast = $cast ? $cast->innertext : null;

							$release_dates = $release_date->children;
							foreach($release_dates as $singlerelease){
								$singlerelease->outertext = '';
							}
							$release_date = $release_date ? $release_date->innertext : null;

							$genres = $genre->children;
							foreach($genres as $singlegenre){
								$singlegenre->outertext = '';
							}
							$genre = $genre ? $genre->innertext : null;

							$runtimes = $runtime->children;
							foreach($runtimes as $singleruntime){
								$singleruntime->outertext = '';
							}
							$runtime = $runtime ? $runtime->innertext : null;
							$trailer = $trailer ? $trailer->src : null;



			        // $movieContact = $contactDetails ? $contactDetails->innertext : null;
							// $movieTime = 	$timeDetails ? $timeDetails->innertext : null;
							// $movieTicket = 	$ticketDetails ? $ticketDetails->innertext : null;

			        $upcomingmovies[] = [
			                'image' => $image,
			                'title' => $title,
			                'cast' => $cast,
			                'release_date' => $release_date,
											'genre' => $genre,
											'runtime' => $runtime,
											'trailer' => $trailer
			        ];
					}
					// echo '<pre>';
					// var_dump($upcomingmovies);
/*email*/
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.sagars.com.np';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'contact@sagars.com.np';                 // SMTP username
    $mail->Password = 'secret';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('contact@sagars.com.np', 'Mailer');
    $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
    $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Your Subscription';
    $mail->Body    = $movie;
    $mail->AltBody = 'We will be email you for if new movie releases';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}

/*email*/


				foreach ($upcomingmovies as $movie) {
// 					echo '<pre>';
// echo $movie['image'];
				  $sql = $db->prepare("INSERT INTO upcoming(`thumbnail_image`,`title`,`cast`,`release_date`,`genre`,`runtime`,`trailer`)
					 VALUES ('".$movie['image']."','".$movie['title']."','".$movie['cast']."','".$movie['release_date']."','".$movie['genre']."','".$movie['runtime']."','".$movie['trailer']."') ") ;
				  $insert = $sql->execute();
				    }
				}

			} catch (Exception $e) {

			}
	}


		//------------------view movies ------------------------//
		public function viewUpcomingMovies(){
			$con = new Connection();
            $db = $con->openConnection();
			if(isset($this->movie_details_id)){
				$data = $db->query("SELECT * FROM upcoming WHERE upcoming_movie_id = '$this->movie_details_id'");
				$movies = $data->fetchAll();
}
			else{
$data = $db->query("SELECT * FROM upcoming ORDER BY upcoming_movie_id DESC");
$movies = $data->fetchAll();

			}
	return $movies;

}

}
