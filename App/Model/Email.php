<?php 
namespace App\Model;

class Email{
	private $id_email_forn, $email_forn, $id_forn_fk;

	//------------
	public function getid_email_forn(){
		return $this->id_email_forn;
	}
	public function setid_email_forn($id_email_forn){
		$this->id_email_forn = $id_email_forn;
	}
	//------------
	public function getemail_forn(){
		return $this->email_forn;
	}
	public function setemail_forn($email_forn){
		$this->email_forn = $email_forn;
	}
	//------------
	public function getid_forn_fk(){
		return $this->id_forn_fk;
	}
	public function setid_forn_fk($id_forn_fk){
		$this->id_forn_fk = $id_forn_fk;
	}
}

 ?>