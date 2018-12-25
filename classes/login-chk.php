<?php
class loginChk{
  private $tbl_name = "tbl_customer";
  private $login_email;
  public function login_email($logEmail){
    $this->login_email = $logEmail;
  }
  public function login_emailChkquery(){
    $sql = "SELECT email FROM $this->tbl_name WHERE email=:login_email";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(':login_email',$this->login_email);
    $stmt->execute();
    if($stmt->rowCount()>0){
      return true;
    }else{
      return false;
    }
  }
  public function passChkquery(){
    $sql = "SELECT * FROM $this->tbl_name WHERE email=:login_email";
    $stmt = db::shopPrepare($sql);
    $stmt->bindParam(':login_email',$this->login_email);
    $stmt->execute();
    return $stmt->fetchAll();
  }
}
?>
