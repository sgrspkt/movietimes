	<?php
	require_once('connection.class.php');
	require_once('subscribe.class.php');

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
	 	//var_dump($upcomingmovies); die();
				$scrapped_image = $upcomingmovies[0]['image'];
	//var_dump($scrapped_image);

				$data = $db->query("SELECT * FROM upcoming");
				$checkDataAvailable = $data->fetchAll();

	//if data available in db
				if($checkDataAvailable){
					$db_image = $checkDataAvailable[0]['thumbnail_image'];
	//no new movie found
					if($scrapped_image = $db_image){
	//show image from database
		//die('same pinch');
						$data = $db->query("SELECT * FROM upcoming");
						$checkDataAvailable = $data->fetchAll();

						return $checkDataAvailable;
					}


	//new image found
					else{
		//drop the database & insert to database
						$i=0;
						for($i=0; $i<1; $i++){
							$data = $db->query("DROP FROM upcoming");
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
    "We have new upcoming movie details, Please kindly visit our website MovieTimes."."\r\n". "\r\n". 
      "Thank you."."\r\n".
      "http://sagars.com/movietimes";
    $headers = "From: info@sagars.com.np" . "\r\n" .
"CC: info@themenepal.com";
    mail($to, $subject, $message, $headers);
   
						
					}
						foreach ($upcomingmovies as $movie) {

	// 					echo '<pre>';
	// echo $movie['image'];
							$sql = $db->prepare("INSERT INTO upcoming(`thumbnail_image`,`title`,`cast`,`release_date`,`genre`,`runtime`,`trailer`)
								VALUES ('".$movie['image']."','".$movie['title']."','".$movie['cast']."','".$movie['release_date']."','".$movie['genre']."','".$movie['runtime']."','".$movie['trailer']."') ") ;
							$insert = $sql->execute();
						}
					
				}
			}

			catch (Exception $e) {

			}
		}


			//------------------view movies ------------------------//
		public function viewUpcomingMovies(){
			$con = new Connection();
			$db = $con->openConnection();
			if(isset($this->movie_details_id)){
				$data = $db->query("SELECT * FROM upcoming WHERE upcoming_movie_id = '$this->movie_details_id'");
				$movies = $data->fetchAll();	
			}else{
				$data = $db->query("SELECT * FROM upcoming");
				$movies = $data->fetchAll();
				
			}
			return $movies;	
		}
	}
