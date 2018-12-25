<?php
class logout{
  private $tbl_cart = "tbl_cart";
  private $tbl_compare = "tbl_compare";
  private $session_id;
  public function session_id($session_id){
    $this->session_id = $session_id;
  }
  public function cartsessiondell(){
    $sql = "DELETE FROM $this->tbl_cart WHERE session_id=:session_id";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":session_id",$this->session_id);
    return $stmt->execute();
  }
  public function compatesessiondel(){
    $sql = "DELETE FROM $this->tbl_compare WHERE session_id=:session_id";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":session_id",$this->session_id);
    return $stmt->execute();
  }
}
$logoutObj = new logout();
?>
