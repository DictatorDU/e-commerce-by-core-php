<?php
class complete{
  private $tbl_shipt = "tbl_shipt";
  private $tbl_customer = "tbl_customer";
  private $tbl_product = "tbl_product";
  private $tbl_cat = "tbl_cat";
  private $tbl_brand = "tbl_brand";

  private $shipt_id;

  public function shipt_id($shipt_id){
    $this->shipt_id = $shipt_id;
  }
  public function completeList(){
    $sql = "SELECT $this->tbl_shipt.*,$this->tbl_customer.name
            FROM $this->tbl_shipt
            INNER JOIN $this->tbl_customer
            ON $this->tbl_shipt.customer_id = $this->tbl_customer.id
            WHERE $this->tbl_shipt.status=1
            ORDER BY $this->tbl_shipt.shipt_id DESC";
    $stmt = db::shopPrepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function completeviewlist(){
    $sql = "SELECT $this->tbl_shipt.*,$this->tbl_customer.*
            FROM $this->tbl_shipt
            INNER JOIN $this->tbl_customer
            ON $this->tbl_shipt.customer_id = $this->tbl_customer.id
            WHERE $this->tbl_shipt.shipt_id=:shipt_id";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":shipt_id",$this->shipt_id);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function brandAndCat(){
    $sql = "SELECT $this->tbl_shipt.product_id,$this->tbl_product.*,$this->tbl_cat.cat_name,$this->tbl_brand.brand_name
            FROM $this->tbl_shipt
            INNER JOIN $this->tbl_product
            ON $this->tbl_shipt.product_id = $this->tbl_product.id
            INNER JOIN $this->tbl_brand
            ON $this->tbl_product.brand_id = $this->tbl_brand.id
            INNER JOIN $this->tbl_cat
            ON $this->tbl_product.cat_id = $this->tbl_cat.id
            WHERE $this->tbl_shipt.shipt_id=:shipt_id LIMIT 1";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":shipt_id",$this->shipt_id);
    $stmt->execute();
    return $stmt->fetchAll();
  }
}
$completeObj = new complete();
?>
