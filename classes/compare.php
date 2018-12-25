<?php
class compare{
  private $tbl_compare = "tbl_compare";
  private $session_id;
  public function session_id($session_id){
    $this->session_id = $session_id;
  }
  private $compare_id;
  public function compare_id($compare_id){
    $this->compare_id = $compare_id;
  }
  public function compareshow(){
    $sql = "SELECT * FROM $this->tbl_compare WHERE session_id=:session_id ORDER BY compare_id DESC";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":session_id",$this->session_id);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function delcompare(){
    $sql = "DELETE FROM $this->tbl_compare WHERE compare_id=:compare_id";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":compare_id",$this->compare_id);
    return $stmt->execute();
  }
}
$compareObj = new compare();
?>
