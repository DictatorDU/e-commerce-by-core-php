<?php
class order{
  private $tbl_order = "tbl_order";
  private $tbl_customer = "tbl_customer";
  private $tbl_product = "tbl_product";
  private $tbl_brand = "tbl_brand";
  private $tbl_cat = "tbl_cat";
  private $customerId;
  private $product_name;
  private $productname;
  private $customer_id_pro;
  private $order_id;
  private $product_id;
  public function customerId($customerId){
    $this->customerId = $customerId;
  }
  public function product_name($product_name){
    $this->product_name = $product_name;
  }
  public function productname($productname){
    $this->productname = $productname;
  }
  public function customer_id_pro($customer_id_pro){
    $this->customer_id_pro = $customer_id_pro;
  }
  public function order_id($order_id){
    $this->order_id = $order_id;
  }
  public function product_id($product_id){
    $this->product_id = $product_id;
  }
  public function selectquery(){
    $sql = "SELECT * FROM $this->tbl_order WHERE status=0 ORDER BY id DESC";
    $stmt = db::shopPrepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function customerDetials(){
    $sql = "SELECT * FROM $this->tbl_customer WHERE id=:customerId LIMIT 1";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":customerId",$this->customerId);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function productShiptId(){
    $sql = "SELECT * FROM $this->tbl_order WHERE id=:product_id LIMIT 1";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":product_id",$this->product_id);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function customerOrderPro(){
    $sql = "SELECT * FROM $this->tbl_order WHERE product_name=:productname LIMIT 1";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":productname",$this->productname);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function customerOrdercatBrand(){
    $sql = "SELECT $this->tbl_product.*,$this->tbl_cat.cat_name,$this->tbl_brand.brand_name
            FROM $this->tbl_product
            INNER JOIN $this->tbl_cat
            ON $this->tbl_product.cat_id = $this->tbl_cat.id
            INNER JOIN $this->tbl_brand
            ON $this->tbl_product.brand_id = $this->tbl_brand.id
            WHERE $this->tbl_product.product_name=:product_name";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":product_name",$this->product_name);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function customerOrdersame(){
    $sql = "SELECT * FROM $this->tbl_order WHERE customer_id=:customer_id_pro AND status=0";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":customer_id_pro",$this->customer_id_pro);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function shipSelect(){
    $sql = "SELECT * FROM $this->tbl_order WHERE id=:order_id";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":order_id",$this->order_id);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function statusUpdate(){
    $sql = "UPDATE $this->tbl_order SET status=2 WHERE id=:order_id";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":order_id",$this->order_id);
    return $stmt->execute();
  }
}
$orderObj = new order();
?>
