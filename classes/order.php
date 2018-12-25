<?php
class orderClass{
  private $tbl_cart = "tbl_cart";
  private $tbl_order = "tbl_order";
  private $tbl_shipt = "tbl_shipt";
  private $session_id;
  private $customerId;
  private $productId;
  private $product_name;
  private $total_price;
  private $quantity;
  private $img;
  private $orderid;
  public function session_id($session_id){
    $this->session_id = $session_id;
  }
  public function customerId($customerId){
    $this->customerId = $customerId;
  }
  public function productId($productId){
    $this->productId = $productId;
  }
  public function product_name($product_name){
    $this->product_name = $product_name;
  }
  public function total_price($total_price){
    $this->total_price = $total_price;
  }
  public function quantity($quantity){
    $this->quantity = $quantity;
  }
  public function img($img){
    $this->img = $img;
  }
  public function orderid($orderid){
    $this->orderid = $orderid;
  }
  public function selectQuery(){
    $sql = "SELECT * FROM $this->tbl_cart WHERE session_id=:session_id";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":session_id",$this->session_id);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function insertOrder(){
    $sql = "INSERT INTO $this->tbl_order
    (product_id,product_name,customer_id,price,img,quantity)
    VALUES(:productId,:product_name,:customerId,:total_price,:img,:quantity)";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":productId",$this->productId);
    $stmt->bindParam(":product_name",$this->product_name);
    $stmt->bindParam(":customerId",$this->customerId);
    $stmt->bindParam(":total_price",$this->total_price);
    $stmt->bindParam(":img",$this->img);
    $stmt->bindParam(":quantity",$this->quantity);
    return $stmt->execute();
  }
  public function delquery(){
    $sql = "DELETE FROM $this->tbl_cart WHERE session_id=:session_id";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":session_id",$this->session_id);
    return $stmt->execute();
  }
  public function price(){
    $sql = "SELECT * FROM $this->tbl_order WHERE customer_id=:customerId AND time_date= now()";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":customerId",$this->customerId);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function readOrdered(){
    $sql = "SELECT * FROM $this->tbl_order WHERE customer_id=:customerId ORDER BY id DESC";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":customerId",$this->customerId);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function shipteproconfirm(){
    $sql = "UPDATE $this->tbl_order SET status=3 WHERE id=:orderid";
    $stmt =db::shopPrepare($sql);
    $stmt->bindParam(":orderid",$this->orderid);
    return $stmt->execute();
  }
  public function shiptUpconfirm(){
    $sql = "UPDATE $this->tbl_shipt SET status=1 WHERE order_id=:orderid";
    $stmt =db::shopPrepare($sql);
    $stmt->bindParam(":orderid",$this->orderid);
    return $stmt->execute();
  }
  public function shiptedorderdel(){
    $sql = "DELETE FROM $this->tbl_order WHERE id=:orderid";
    $stmt =db::shopPrepare($sql);
    $stmt->bindParam(":orderid",$this->orderid);
    return $stmt->execute();
  }
}
?>
