<?php
class previewClass{
  private $tbl_compare = "tbl_compare";
  private $tbl_wish = "tbl_wish";
  private $customer_id;
  private $pro_id;
  private $session_id;
  private $pro_name;
  private $brand;
  private $pro_price;
  private $img;
  public function customer_id($customer_id){
    $this->customer_id = $customer_id;
  }
  public function pro_id($id){
    $this->pro_id = $id;
  }
  public function pro_name($pro_name){
    $this->pro_name = $pro_name;
  }
  public function pro_price($pro_price){
    $this->pro_price = $pro_price;
  }
  public function brand($brand){
    $this->brand = $brand;
  }
  public function img($img){
    $this->img = $img;
  }
  public function session_id($session_id){
    $this->session_id = $session_id;
  }
  public function compareInert(){
    $sql = "INSERT INTO $this->tbl_compare(product_id,product_name,price,brand,img,session_id)
    VALUES(:pro_id,:pro_name,:pro_price,:brand,:img,:session_id)";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":pro_id",$this->pro_id);
    $stmt->bindParam(":pro_name",$this->pro_name);
    $stmt->bindParam(":pro_price",$this->pro_price);
    $stmt->bindParam(":brand",$this->brand);
    $stmt->bindParam(":img",$this->img);
    $stmt->bindParam(":session_id",$this->session_id);
    return $stmt->execute();
  }
  public function compareChk(){
    $sql = "SELECT * FROM $this->tbl_compare WHERE session_id=:session_id AND product_id=:pro_id";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":session_id",$this->session_id);
    $stmt->bindParam(":pro_id",$this->pro_id);
    $stmt->execute();
    if($stmt->rowCount()>0){
      return true;
    }else{
      return false;
    }
  }
  public function wishInert(){
    $sql = "INSERT INTO $this->tbl_wish(product_id,product_name,price,brand,img,customer_id)
    VALUES(:pro_id,:pro_name,:pro_price,:brand,:img,:customer_id)";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":pro_id",$this->pro_id);
    $stmt->bindParam(":pro_name",$this->pro_name);
    $stmt->bindParam(":pro_price",$this->pro_price);
    $stmt->bindParam(":brand",$this->brand);
    $stmt->bindParam(":img",$this->img);
    $stmt->bindParam(":customer_id",$this->customer_id);
    return $stmt->execute();
  }
  public function wishChk(){
    $sql = "SELECT * FROM $this->tbl_wish WHERE customer_id=:customer_id AND product_id=:pro_id";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":customer_id",$this->customer_id);
    $stmt->bindParam(":pro_id",$this->pro_id);
    $stmt->execute();
    if($stmt->rowCount()>0){
      return true;
    }else{
      return false;
    }
  }
}
$previewObj = new previewClass();
?>
