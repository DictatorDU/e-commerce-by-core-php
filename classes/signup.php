<?php
class signUp{
  private $tbl_name = "tbl_customer";
  private $email;
  private $phone;

  public function emailCK($email){
    $this->email = $email;
  }
  public function phoneCK($phone){
    $this->phone = $phone;
  }

  public function emailQuery(){
    $sql = "SELECT email FROM $this->tbl_name WHERE email=:email";
    $stmt=db::shopPrepare($sql);
    $stmt->bindParam(":email",$this->email);
    $stmt->execute();
    if($stmt->rowCount()>0){
      return true;
    }else{
      return false;
    }
  }

  public function phoneQuery(){
    $sql = "SELECT phone FROM $this->tbl_name WHERE phone=:phone";
    $stmt=db::shopPrepare($sql);
    $stmt->bindParam(":phone",$this->phone);
    $stmt->execute();
    if($stmt->rowCount()>0){
      return true;
    }else{
      return false;
    }
  }

}//End of the class

$signUpClassObj = new signUp();
$signUpClassObj->phoneCK($phone);
$signUpClassObj->emailCK($email);
?>
