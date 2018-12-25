<?php
class product{
  private $tbl_product = "tbl_product";
  private $tbl_cat = "tbl_cat";
  private $tbl_brand = "tbl_brand";
  private $brand_id;
  public function brand_id($brand_id){
    $this->brnad_id = $brand_id;
  }
  public function showBrand(){
    $sql = "SELECT * FROM $this->tbl_brand ORDER BY brand_name ASC";
    $stmt = db::shopPrepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function shoProduct(){
    $sql = "SELECT * FROM $this->tbl_product WHERE brand_id=:brand_id LIMIT 1";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":brand_id",$this->brand_id);
    $stmt->execute();
    return $stmt->fetchAll();
  }
}
$productObj = new product();
?>
