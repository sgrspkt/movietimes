<?php
require_once('connection.class.php');

class Subscribe extends Connection{
		private $subscribe_id;
		private $subscriber_email;
		private $subscribe_date;

		/*public function __construct(){
		parent:: __construct();
	}*/

		public function setSubscribeId($si=''){
			$this->subscribe_id=$si;
		}

		public function setSubscribeEmail($sl=''){
			$this->subscriber_email=$sl;
		}

		public function setSubscribeDate($de=''){
			$this->subscribe_date=$de;
		}
		//--------------------------- Add subscribe-------------------------//

		public function addSubscribe()
		{
try

{

    $con = new Connection();
$db = $con->openConnection();

     // sql to create table

    $sql = $db->prepare("INSERT INTO subscriber (`subscriber_email`,`subscriber_date`) VALUES ('$this->subscriber_email','$this->subscribe_date')") ;

    // inserting a record

		if($sql->execute()){
	 		return true;
	 	};
   // echo "New record created successfully";

}

catch (PDOException $e)

{

    echo "There is some problem in connection: " . $e->getMessage();

}
		}

		//------------------view subsriber section ------------------------//
		public function viewSubscriber(){
			$con = new Connection();
            $db = $con->openConnection();
			if(isset($this->subscriber)){
				$data = $db->query("SELECT * FROM subscriber WHERE subscribe_id = '$this->subscriber_id'");
				$subscriber = $data->fetchAll();

			}elseif(isset($this->name)){
				$data = $db->query("SELECT * FROM subscriber WHERE name='$this->name");
				$subscriber = $data->fetchAll();
			}
			else{
$data = $db->query("SELECT * FROM subscriber ORDER BY subscriber_id DESC");
$subscriber = $data->fetchAll();

			}
	return $subscriber;

}

//------------------verify subsriber section ------------------------//
		public function verifySubscriber(){
			$con = new Connection();
            $db = $con->openConnection();
				$data = $db->query("SELECT * FROM subscriber WHERE subscriber_email = '$this->subscriber_email'");
				$subscriber = $data->fetchAll();
				
			
	return $subscriber;

}


}
