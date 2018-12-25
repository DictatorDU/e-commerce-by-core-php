<?php
class shipt{
  private $tbl_shipt = "tbl_shipt";
  private $tbl_customer = "tbl_customer";
  private $tbl_product = "tbl_product";
  private $tbl_cat = "tbl_cat";
  private $tbl_brand = "tbl_brand";
  private $order_id;
  private $product_id;
  private $product_name;
  private $customer_id;
  private $quantity;
  private $total_price;
  private $time_date;
  private $img;
  private $shipt_id;
  public function order_id($order_id){
    $this->order_id = $order_id;
  }
  public function product_id($product_id){
    $this->product_id = $product_id;
  }
  public function product_name($product_name){
    $this->product_name = $product_name;
  }
  public function quantity($quantity){
    $this->quantity = $quantity;
  }
  public function price($price){
    $this->total_price = $price;
  }
  public function customer_id($customer_id){
    $this->customer_id = $customer_id;
  }
  public function time_date($time_date){
    $this->time_date = $time_date;
  }
  public function img($img){
    $this->img = $img;
  }
  public function shipt_id($shipt_id){
    $this->shipt_id = $shipt_id;
  }
  public function insertShipt(){
    $sql = "INSERT INTO $this->tbl_shipt(order_id,product_id,product_name,img,customer_id,total_price,time_date,quantity) VALUES(:order_id,:product_id,:product_name,:img,:customer_id,:total_price,:time_date,:quantity)";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":order_id",$this->order_id);
    $stmt->bindParam(":product_id",$this->product_id);
    $stmt->bindParam(":product_name",$this->product_name);
    $stmt->bindParam(":img",$this->img);
    $stmt->bindParam(":customer_id",$this->customer_id);
    $stmt->bindParam(":total_price",$this->total_price);
    $stmt->bindParam(":time_date",$this->time_date);
    $stmt->bindParam(":quantity",$this->quantity);
    return $stmt->execute();
  }

  public function shiptedList(){
    $sql = "SELECT $this->tbl_shipt.*,$this->tbl_customer.name
            FROM $this->tbl_shipt
            INNER JOIN $this->tbl_customer
            ON $this->tbl_shipt.customer_id = $this->tbl_customer.id
            WHERE $this->tbl_shipt.status=0
            ORDER BY $this->tbl_shipt.shipt_id DESC";
    $stmt = db::shopPrepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function shiptviewlist(){
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
$shiptObj = new shipt();
?>
