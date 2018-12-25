<?php
class catread{
  private $tbl_name = "tbl_cat";
  private $tbl_product = "tbl_product";
  private $cart_id;
  public function catRead(){
    $sql = "SELECT * FROM $this->tbl_name ORDER BY cat_name ASC";
    $stmt = db::shopPrepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function cat_id($cat_id){
    $this->cat_id = $cat_id;
  }
  public function catProduct(){
    $sql = "SELECT * FROM $this->tbl_product WHERE cat_id=:cat_id ORDER BY id ASC";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":cat_id",$this->cat_id);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function singleCatName(){
    $sql = "SELECT * FROM $this->tbl_name WHERE id=:cat_id";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":cat_id",$this->cat_id);
    $stmt->execute();
    return $stmt->fetchAll();
  }
}
$readCatObj = new catread();
?>
