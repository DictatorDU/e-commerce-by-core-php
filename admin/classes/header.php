<?php
class header{
  private $status = 0;
  private $tbl_order = "tbl_order";
  private $tbl_shipt = "tbl_shipt";
  public function order_count(){
    $sql = "SELECT * FROM $this->tbl_order WHERE status=:status";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":status",$this->status);
    $stmt->execute();
    return $stmt->rowCount();
  }
  public function shiptCount(){
    $sql = "SELECT * FROM $this->tbl_shipt WHERE status=:status";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":status",$this->status);
    $stmt->execute();
    return $stmt->rowCount();
  }
}
$headerObj = new header();
?>
