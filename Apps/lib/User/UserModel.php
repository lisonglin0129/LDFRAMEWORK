<?php
	class UserModel{
		private $username;
		public function setUsername($username){
			$this->username = $username;
		}
		public function getUsername(){
			return $this->username;
		}
	}
?>