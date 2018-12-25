<?php 
class others{
	private $tbl_socile = "tbl_socile";
	public function socileSelect(){
 		$sql = "SELECT * FROM $this->tbl_socile LIMIT 1";
 		$stmt = db::shopPrepare($sql);
 		$stmt->execute();
 		return $stmt->fetchAll();
 	}
}
$othersObj = new others();
?>