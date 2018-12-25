<?php
class contact{
  private $tbl_address = "tbl_address";
  private $name;
  private $email;
  private $phone;
  private $phone_2;
  private $fax;
  private $country;
  private $address;
  private $info;
  public function name($name){
    $this->name = $name;
  }
  public function phone($phone){
    $this->phone = $phone;
  }
  public function phone_2($phone_2){
    $this->phone_2 = $phone_2;
  }
  public function email($email){
    $this->email = $email;
  }
  public function address($address){
    $this->address = $address;
  }
  public function fax($fax){
    $this->fax = $fax;
  }
  public function country($country){
    $this->country = $country;
  }
  public function info($info){
    $this->info = $info;
  }
  public function upquery(){
    $sql = "UPDATE $this->tbl_address SET
           title=:name,address=:address,phone=:phone,email=:email,fax=:fax,country=:country,some_info=:info,phone_two=:phone_2";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(":name",$this->name);
    $stmt->bindParam(":email",$this->email);
    $stmt->bindParam(":phone",$this->phone);
    $stmt->bindParam(":phone_2",$this->phone_2);
    $stmt->bindParam(":fax",$this->fax);
    $stmt->bindParam(":address",$this->address);
    $stmt->bindParam(":country",$this->country);
    $stmt->bindParam(":info",$this->info);
    return $stmt->execute();
  }
  public function showInfo(){
    $sql = "SELECT * FROM $this->tbl_address LIMIT 1";
    $stmt=db::shopPrepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }
}
$contactObj = new contact();
?>
