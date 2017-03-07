<?php

class Session{

	private $logged_in = false;
	public $id;
	//public $logged_in_as;
	function __construct(){

		session_start();
		$this->check_login();
	}

	public function login($matric_no){
			//database should find user based on username/password
		if($matric_no){
			// if(is_a($object,'Staff')){

			// 	$this->logged_in_as = $_SESSION['who'] = "staff";
			// }else if(is_a($object,'Admin')){
			// 	$this->logged_in_as = $_SESSION['who'] = "admin";
			// }
	
		$this->id = $_SESSION['id'] = $matric_no;
		$this->logged_in  = true;
	}
}
	
	public function logout(){

		unset($_SESSION['id']);
		//unset($_SESSION['who']);
		unset($this->id);
		unset($this->logged_in_as);
		$this->logged_in = false;

	}

	public function is_logged_in(){
		return $this->logged_in;
	}
	private function check_login(){
		if(isset($_SESSION['id'])){
			$this->id = $_SESSION['id'];
			//$this->logged_in_as = $_SESSION['who'];
			$this->logged_in = true;

		}else{
			unset($this->id);
			//unset($this->logged_in_as);
			$this->logged_in  = false;
		}
	}

}

	$session = new Session();
  ?>