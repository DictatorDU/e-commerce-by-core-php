<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Product Description</h2>
        <a href="product-list.php"><img src="img/icons8-go-back-55.png" alt=""></a>
        <div class="block">
        <?php
          if(isset($_GET["productId"]) && $_GET["productId"] != NULL){
            $id = $_GET["productId"];
        ?>
          <?php
            class viewProductClass{
              private $tbl_product = "tbl_product";
              private $tbl_cat = "tbl_cat";
              private $tbl_brand = "tbl_brand";
              private $id;
              public function id($id){
                $this->id = $id;
              }
              public function showMsgQuery(){
                $sql = "SELECT $this->tbl_product.*,$this->tbl_cat.cat_name,$this->tbl_brand.brand_name
                        FROM $this->tbl_product
                        INNER JOIN $this->tbl_cat
                        ON $this->tbl_product.cat_id = $this->tbl_cat.id
                        INNER JOIN $this->tbl_brand
                        ON $this->tbl_product.brand_id = $this->tbl_brand.id
                        WHERE $this->tbl_product.id=:id";
                $stmt = db::shopPrepare($sql);
                $stmt->bindValue(":id",$this->id);
                $stmt->execute();
                return $stmt->fetchAll();
              }
            }
            $showProductObj = new viewProductClass();
            $showProductObj->id($id);
            $showResult = $showProductObj->showMsgQuery();
            if($showResult){
              foreach ($showResult as $value) {
                $msgId = $value['id'];
                ?>
              <div class="" style="width:25%;height:auto;float:left;border-right:2px solid #f1f1f1">
              <p style="display:inline;"><?php
                 echo "<img width='120px' src='".$value["img"]."' alt='' /> <br />";
                 echo "<h1>".$value["product_name"]."</h1>";
                 echo "<h1 style='color:red'>$".$value["price"]."</h1>";
                 echo "<strong>Offer date: </strong>".$formatObj->formatDate($value['date']).'<br />';
                 ?>
              </p>
            </div>
            <div class="" style="width:73%;height:auto;float:right;">
              <p>
                <?php
                echo $value["details"];
                ?>
              </p>
            </div>
           <?php
         }
           }else{
             echo "<strong><h1 style='color:red'>Error</h1></strong><br /><h3>Something went wrong..!!</h3>";
           }?>
       <?php }else{
             echo "<strong><h1 style='color:red'>Error</h1></strong><br /><h3>Not found data..!!</h3>";
           }
           ?>
        </div>
     </div>
 </div>
<?php include 'inc/footer.php';?>
