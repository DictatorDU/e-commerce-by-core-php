<?php
class letestProduction{
  private $tbl_name = "tbl_product";
  public function getIphone(){
    $sql = "SELECT * FROM $this->tbl_name WHERE brand_id='15' ORDER BY id DESC LIMIT 1";
    $stmt = db::shopPrepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function getSamsung(){
    $sql = "SELECT * FROM $this->tbl_name WHERE brand_id='1' ORDER BY id DESC LIMIT 1";
    $stmt = db::shopPrepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function getAccer(){
    $sql = "SELECT * FROM $this->tbl_name WHERE brand_id='9' ORDER BY id DESC LIMIT 1";
    $stmt = db::shopPrepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }
  public function getCannon(){
    $sql = "SELECT * FROM $this->tbl_name WHERE brand_id='16' ORDER BY id DESC LIMIT 1";
    $stmt = db::shopPrepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }
}
$letestBrandObj = new letestProduction();
foreach ($letestBrandObj->getIphone() as $value) {
  $iphoneId = $value["id"];
  $iphoneName = $value["product_name"];
  $iphoneImg = $value["img"];
  $iphonebody = $formatObj->textShorten($value["details"],35);
}
foreach ($letestBrandObj->getSamsung() as $value) {
  $samsungId = $value["id"];
  $samsungName = $value["product_name"];
  $samsungImg = $value["img"];
  $samsungbody = $formatObj->textShorten($value["details"],35);
}
foreach ($letestBrandObj->getAccer() as $value) {
  $AccerId = $value["id"];
  $AccerName = $value["product_name"];
  $accerImg = $value["img"];
  $accerbody = $formatObj->textShorten($value["details"],35);
}
foreach ($letestBrandObj->getCannon() as $value) {
  $cannonId = $value["id"];
  $cannonName = $value["product_name"];
  $cannonImg = $value["img"];
  $cannonbody = $formatObj->textShorten($value["details"],35);
}
?>
