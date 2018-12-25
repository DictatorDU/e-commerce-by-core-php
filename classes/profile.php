<?php
class profileClass{
  private $tbl_customer = "tbl_customer";
  private $user_id;
  public function user_id($user_id){
    $this->user_id = $user_id;
  }
  public function query(){
    $sql = "SELECT * FROM $this->tbl_customer WHERE id=:user_id";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":user_id",$this->user_id);
    $stmt->execute();
    return $stmt->fetchAll();
  }
}
$profileObj = new profileClass();
?>
