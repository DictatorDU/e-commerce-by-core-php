<?php
class cart{
  private $tbl_name = "tbl_cart";
  private $session_id;
  private $cart_id;
  private $count;
  private $totalPrice;
  public function cart_id($cart_id){
    $this->cart_id = $cart_id;
  }
  public function count($count){
    $this->count = $count;
  }
  public function totalPrice($totalPrice){
    $this->totalPrice = $totalPrice;
  }
  public function session_id($session_id){
    $this->session_id = $session_id;
  }
  public function Proquery(){
    $sql = "SELECT * FROM $this->tbl_name WHERE session_id=:session_id";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":session_id",$this->session_id);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function Upquery(){
    $sql = "UPDATE $this->tbl_name SET total_price=:totalPrice,quantity=:count WHERE cart_id=:cart_id";
    $stmt= db::shopPrepare($sql);
    $stmt->bindParam(":cart_id",$this->cart_id);
    $stmt->bindParam(":count",$this->count);
    $stmt->bindParam(":totalPrice",$this->totalPrice);
    return $stmt->execute();
  }
}
$cartObj = new cart();
?>
