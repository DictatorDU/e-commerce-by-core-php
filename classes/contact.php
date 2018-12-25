<?php
class contact{
  private $tbl_contact = "tbl_contact";
  private $tbl_address = "tbl_address";
  private $name;
  private $email;
  private $msg;
  public function name($name){
    $this->name = $name;
  }
  public function email($email){
    $this->email = $email;
  }
  public function msg($msg){
    $this->msg = $msg;
  }
  public function insertQuery(){
    $sql = "INSERT INTO $this->tbl_contact(name,email,msg) VALUES(:name,:email,:msg)";
    $stmt = db::shopPrepare($sql);
    $stmt->bindValue(":name",$this->name);
    $stmt->bindValue(":email",$this->email);
    $stmt->bindValue(":msg",$this->msg);
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
