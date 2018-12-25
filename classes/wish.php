<?php
class wish{
  private $tbl_wish = "tbl_wish";
  private $customer_id;
  public function customer_id($customer_id){
    $this->customer_id = $customer_id;
  }
  private $wish_id;
  public function wish_id($wish_id){
    $this->wish_id = $wish_id;
  }
  public function wishshow(){
    $sql = "SELECT * FROM $this->tbl_wish WHERE customer_id=:customer_id ORDER BY wish_id DESC";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":customer_id",$this->customer_id);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function delwish(){
    $sql = "DELETE FROM $this->tbl_wish WHERE wish_id=:wish_id";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":wish_id",$this->wish_id);
    return $stmt->execute();
  }
}
$wishObj = new wish();
?>
