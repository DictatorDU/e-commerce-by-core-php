<?php
class pro_update{
  private $tbl_name = "tbl_customer";
  private $user_id;
  private $email;
  private $phone;
  private $name;
  private $address;
  private $city;
  private $zip;
  private $country;
  public function user_id($user_id){
    $this->user_id = $user_id;
  }
  public function email($email){
    $this->email = $email;
  }
  public function phone($phone){
    $this->phone = $phone;
  }
  public function name($name){
    $this->name = $name;
  }
  public function address($address){
    $this->address = $address;
  }
  public function city($city){
    $this->city = $city;
  }
  public function zip($zip){
    $this->zip = $zip;
  }
  public function country($country){
    $this->country = $country;
  }
  public function Query(){
    $sql = "UPDATE $this->tbl_name
            SET name=:name,
                address=:address,
                city=:city,
                zip=:zip,
                email=:email,
                country=:country,
                phone=:phone
         WHERE id=:user_id";
    $stmt = db::shopPrepare($sql);
    $stmt->bindValue(":user_id",$this->user_id);
    $stmt->bindValue(":name",$this->name);
    $stmt->bindValue(":address",$this->address);
    $stmt->bindValue(":city",$this->city);
    $stmt->bindValue(":zip",$this->zip);
    $stmt->bindValue(":email",$this->email);
    $stmt->bindValue(":country",$this->country);
    $stmt->bindValue(":phone",$this->phone);
    return $stmt->execute();
  }
}
$profileUpObj = new pro_update();
?>
