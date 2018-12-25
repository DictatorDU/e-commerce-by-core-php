<?php include("inc/header.php");?>
<?php
if(isset($_GET["delete"]) && $_GET["delete"] != NULL){
  $cart_id = $_GET["delete"];
  class delClass{
    private $tbl_name = "tbl_cart";
    private $cart_id;
    public function cart_id($cart_id){
      $this->cart_id = $cart_id;
    }
    public function query(){
      $sql = "DELETE FROM $this->tbl_name WHERE cart_id=:cart_id";
      $stmt = db::shopPrepare($sql);
      $stmt->bindParam(":cart_id",$this->cart_id);
      return $stmt->execute();
    }
  }
  $delProObj = new delClass();
  $delProObj->cart_id($cart_id);
  $delProObj->query();
  if($delProObj->query()){
    $_SESSION["delProCart"] = 1;
    $session_id = session_id();
    header("location:cart.php?buy_product=$session_id");
  }
}
?>
