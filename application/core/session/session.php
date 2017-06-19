<?php 

/**
* Session : Handle all the usages of SESSIONS
*/
class Session {

	private $signed_in = false;
	public $user_id;
	public $username;
	public $message;
	public $role;

	function __construct() {

		session_start();

		//to see if someone is logged in or not and act in accordance 
		$this->check_the_login();

		//to be sure that everything is ok with the messages in the session. super global
		$this->check_message();
	}

	//this function will just output messages for us...
	public function message($msg = "") {
		if (!empty($msg)) {
			$_SESSION['message'] = $msg;
		} else {
			//if we dont have a message as argument, the methold will just display the default one.
			return $this->message;
		}
		
	}

	public function check_message() {

		if (isset($_SESSION['message'])) {

			$this->message = $_SESSION['message'];

			//we unset it to make sure that when the page is refreshed we dont get the same message aigain... it has already did it job (giving the message to the message var...) so it will do another job next.
			unset($_SESSION['message']);

		} else {
			// to avoid errors... because if the var is not set and we call it it will display some errors...
			$this->message = "";

		}
		
	}


	//Getter for the private variable signed in
	public function is_signed_in() {
		return $this->signed_in;
	}

	//this function is here to log in the user... It will initiate a session for this specific user as an object...
	//the argument here is an information fetched from the db
	public function login($user) {
		
		if ($user) {
			$this->user_id = $_SESSION['user_id'] = $user->id;
			$this->username = $_SESSION['username'] = $user->username;
			$this->role = $_SESSION['role'] = $user->id_role;
			$this->signed_in = true;
		} 

	}

	//unset all the information related to the user session and also the variables
	public function logout() {
		unset($_SESSION['user_id']);
		unset($this->user_id);

		$this->message = "";
		$this->signed_in = false;
	}

	//check if the session user_id is set... If a session is initialized for a specific user...
	//this will allow us to determine wether a user is signed in or not... and control the login flow
	private function check_the_login() {

		//The user is loged in 
		if (isset($_SESSION['user_id'])) {

			$this->user_id = $_SESSION['user_id'];
			$this->signed_in = true;

		//the user is not logged in... if the variables are initialized from a prior session... we turn them back
		}else {

			unset($this->user_id);
			$this->signed_in = false;

		}

	}

}