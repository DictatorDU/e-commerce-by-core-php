<?php
class paymentConfirmClass{
  private $tbl_name = "tbl_cart";
  private $session_id;
  public function session_id($session_id){
    $this->session_id = $session_id;
  }
  public function query(){
    $sql = "SELECT * FROM $this->tbl_name WHERE session_id=:session_id";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":session_id",$this->session_id);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  private $tbl_customer = "tbl_customer";
  private $user_id;
  public function user_id($user_id){
    $this->user_id = $user_id;
  }
  public function Customerquery(){
    $sql = "SELECT * FROM $this->tbl_customer WHERE id=:user_id";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":user_id",$this->user_id);
    $stmt->execute();
    return $stmt->fetchAll();
  }
}
$paymentConfirmObj = new paymentConfirmClass();
?>
