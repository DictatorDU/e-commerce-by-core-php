<?php 
 class others{
 	private $tbl_socile = "tbl_socile";
 	private $facebook;
 	private $twitter;
 	private $linkedin;
 	private $googleplus;

 	public function facebook($facebook){
 		$this->facebook = $facebook;
 	}
 	public function twitter($twitter){
 		$this->twitter = $twitter;
 	}
 	public function linkedin($linkedin){
 		$this->linkedin = $linkedin;
 	}
 	public function googleplus($googleplus){
 		$this->googleplus = $googleplus;
 	}
 	public function socileUp(){
 		$sql = "UPDATE $this->tbl_socile SET fb=:facebook,twitter=:twitter,googleplus=:googleplus,linkedin=:linkedin";
 		$stmt = db::shopPrepare($sql);
 		$stmt->bindParam(":facebook",$this->facebook);
 		$stmt->bindParam(":twitter",$this->twitter);
 		$stmt->bindParam(":googleplus",$this->googleplus);
 		$stmt->bindParam(":linkedin",$this->linkedin);
 		return $stmt->execute();
 	}
 	public function socileSelect(){
 		$sql = "SELECT * FROM $this->tbl_socile LIMIT 1";
 		$stmt = db::shopPrepare($sql);
 		$stmt->execute();
 		return $stmt->fetchAll();
 	}
 }
 $othersObj = new others();
?>