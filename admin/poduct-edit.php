<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
<div class="box round first grid">
<h2>Edit Product</h2>
<a href="product-list.php"><img src="img/icons8-go-back-55.png" alt=""></a>
<?php
if(isset($_GET["productId"]) && $_GET["productId"] != NULL){
  $id = $_GET["productId"];
?>
<?php
class editSelectClass{
  private $tbl_product = "tbl_product";
  private $tbl_cat = "tbl_cat";
  private $tbl_brand = "tbl_brand";
  private $id;
  public function id($id){
    $this->id = $id;
  }
  public function query(){
    $sql = "SELECT $this->tbl_product.*,$this->tbl_cat.cat_name,$this->tbl_brand.brand_name
            FROM $this->tbl_product
            INNER JOIN $this->tbl_cat
            ON $this->tbl_product.cat_id = $this->tbl_cat.id
            INNER JOIN $this->tbl_brand
            ON $this->tbl_product.brand_id = $this->tbl_brand.id
            WHERE $this->tbl_product.id=:id";
   $stmt = db::shopPrepare($sql);
   $stmt->bindParam(":id",$this->id);
   $stmt->execute();
   return $stmt->fetchAll();
  }
}
$editObj = new editSelectClass();
$editObj->id($id);
$editObj->query();
foreach ($editObj->query() as $value) {
  $resultPro_name = $value["product_name"];
  $resultPro_details = $value["details"];
  $resultPro_price = $value["price"];
  $resultPro_img = $value["img"];
  $resultPro_product_type = $value["product_type"];
  $resultcat_name = $value["cat_name"];
  $resultcat_id = $value["cat_id"];
  $resultbrand_name = $value["brand_name"];
  $resultbrand_id = $value["brand_id"];
}
?>
<div class="block">
  <?php
  if(isset($_POST["submit"])){
    $product_name = $formatObj->validation($_POST["name"]);
    $catagory = $formatObj->validation($_POST["catagory"]);
    $brand = $formatObj->validation($_POST["brand"]);
    $body = $_POST["body"];
    $price = $formatObj->validation($_POST["price"]);
    $pro_type = $formatObj->validation($_POST["pro_type"]);
    $permitted = array('jpg','jpeg','png','gif');
    $file_name = $_FILES["image"]["name"];
    $file_size = $_FILES["image"]["size"];
    $tmp_name = $_FILES["image"]["tmp_name"];
    $div = explode('.',$file_name);
    $file_exe = strtolower(end($div));
    $unique = substr(md5(time()),0,10).".".$file_exe;
    $unique_name = "uploads/products/".$unique;
    if(!empty($file_name)){
      if(empty($product_name)){
        $empty_pro_name = "Product name required.";
      }elseif(empty($catagory)){
        $empty_catagory = "Empty catagory field.";
      }elseif(empty($brand)){
        $empty_brand = "Empty brand field.";
      }elseif(empty($body)){
        $empty_body = "Empty body field.";
      }elseif(empty($price)){
        $empty_price = "Empty product price.";
      }elseif(empty($pro_type)){
        $empty_type = "Empty product type.";
      }elseif ($file_size>103690) {
       $shortSize = "<span style='color:red'>File size should be less than 100 KB</span>";
      }elseif (in_array($file_exe,$permitted) === false) {
       $permit = "<span style='color:red'>You can uplode only ".implode(', ',$permitted)."</span>";
     }else{
       move_uploaded_file($tmp_name,$unique_name);
       class upProductClass{
         private $tbl_name = "tbl_product";
         private $id;
         private $product_name;
         private $catagory;
         private $brand;
         private $body;
         private $price;
         private $pro_type;
         private $unique_name;
         public function id($id){
           $this->id = $id;
         }
         public function product_name($product_name){
           $this->product_name = $product_name;
         }
         public function catagory($catagory){
           $this->catagory = $catagory;
         }
         public function brand($brand){
           $this->brand = $brand;
         }
         public function body($body){
           $this->body = $body;
         }
         public function price($price){
           $this->price = $price;
         }
         public function pro_type($pro_type){
           $this->pro_type = $pro_type;
         }
         public function unique_name($unique_name){
           $this->unique_name = $unique_name;
         }
         public function query(){
           $sql = "UPDATE $this->tbl_name
           SET
           product_name=:product_name,
           cat_id=:catagory,
           brand_id=:brand,
           details=:body,
           price=:price,
           img=:unique_name,
           product_type=:pro_type
           WHERE id=:id";
           $stmt = db::shopPrepare($sql);
           $stmt->bindParam(":id",$this->id);
           $stmt->bindParam(":product_name",$this->product_name);
           $stmt->bindParam(":catagory",$this->catagory);
           $stmt->bindParam(":brand",$this->brand);
           $stmt->bindParam(":body",$this->body);
           $stmt->bindParam(":price",$this->price);
           $stmt->bindParam(":unique_name",$this->unique_name);
           $stmt->bindParam(":pro_type",$this->pro_type);
           return $stmt->execute();
         }
       }
       $upProductObj = new upProductClass();
       $upProductObj->id($id);
       $upProductObj->product_name($product_name);
       $upProductObj->catagory($catagory);
       $upProductObj->brand($brand);
       $upProductObj->body($body);
       $upProductObj->price($price);
       $upProductObj->pro_type($pro_type);
       $upProductObj->unique_name($unique_name);
       $upProductObj->query();
       if($upProductObj->query()){
         unlink($resultPro_img);
         $_SESSION["upsuccess_one"] = 1;
         echo "<script>window.location='product-list.php';</script>";
       }else{
         echo "<h4 style='color:red'>Something went wrong.</h4>";
       }
     }
}else{
     if(empty($product_name)){
       $empty_pro_name = "Product name required.";
     }elseif(empty($catagory)){
       $empty_catagory = "Empty catagory field.";
     }elseif(empty($brand)){
       $empty_brand = "Empty brand field.";
     }elseif(empty($body)){
       $empty_body = "Empty body field.";
     }elseif(empty($price)){
       $empty_price = "Empty product price.";
     }elseif(empty($pro_type)){
       $empty_type = "Empty product type.";
     }else{
     class upProductClassTwo{
       private $tbl_name = "tbl_product";
       private $id;
       private $product_name;
       private $catagory;
       private $brand;
       private $body;
       private $price;
       private $pro_type;
       public function id($id){
         $this->id = $id;
       }
       public function product_name($product_name){
         $this->product_name = $product_name;
       }
       public function catagory($catagory){
         $this->catagory = $catagory;
       }
       public function brand($brand){
         $this->brand = $brand;
       }
       public function body($body){
         $this->body = $body;
       }
       public function price($price){
         $this->price = $price;
       }
       public function pro_type($pro_type){
         $this->pro_type = $pro_type;
       }
       public function query(){
         $sql = "UPDATE $this->tbl_name
         SET
         product_name=:product_name,
         cat_id=:catagory,
         brand_id=:brand,
         details=:body,
         price=:price,
         product_type=:pro_type
         WHERE id=:id";
         $stmt = db::shopPrepare($sql);
         $stmt->bindParam(":id",$this->id);
         $stmt->bindParam(":product_name",$this->product_name);
         $stmt->bindParam(":catagory",$this->catagory);
         $stmt->bindParam(":brand",$this->brand);
         $stmt->bindParam(":body",$this->body);
         $stmt->bindParam(":price",$this->price);
         $stmt->bindParam(":pro_type",$this->pro_type);
         return $stmt->execute();
       }
     }
     $upObjTwo = new upProductClassTwo();
     $upObjTwo->id($id);
     $upObjTwo->product_name($product_name);
     $upObjTwo->catagory($catagory);
     $upObjTwo->brand($brand);
     $upObjTwo->body($body);
     $upObjTwo->price($price);
     $upObjTwo->pro_type($pro_type);
     $upObjTwo->query();
     if($upObjTwo->query()){
       $_SESSION["upsuccess_two"] = 1;
       echo "<script>window.location='product-list.php';</script>";
     }else{
       echo "<h4 style='color:red'>Something went wrong.</h4>";
     }
   }//end of the conditation 2
 }//end of the conditaion when empty file
}
  ?>
<form action="" method="post" enctype="multipart/form-data">
<table class="form">
  <tr>
    <td></td>
    <td style="color:red;">
      <?php if(isset($empty_pro_name)){echo $empty_pro_name;}?>
    </td>
  </tr>
<tr>
    <td>
        <label>Name</label>
    </td>
    <td>
        <input name="name" type="text" value="<?php if(isset($resultPro_name)){echo $resultPro_name;}?>" class="medium" />
    </td>
</tr>
<tr>
  <td></td>
  <td style="color:red;">
    <?php if(isset($empty_catagory)){echo $empty_catagory;}?>
  </td>
</tr>
	<tr>
    <td>
        <label>Category</label>
    </td>
    <td>
        <select id="select" name="catagory">
            <option value="<?php if(isset($resultcat_id)){echo $resultcat_id;}?>"><?php if(isset($resultcat_name)){echo $resultcat_name;}?></option>
            <?php
            class catRead{
              private $tbl_name = "tbl_cat";
              public function query(){
                $sql = "SELECT * FROM $this->tbl_name ORDER BY cat_name ASC";
                $stmt = db::shopPrepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
              }
            }
            $catReadObj = new catRead();
            $catReadObj->query();
            foreach ($catReadObj->query() as $value) {
            ?>
            <option value='<?php echo $value["id"];?>'><?php echo $value["cat_name"];?></option>
          <?php } ?>
        </select>
    </td>
</tr>
<tr>
  <td></td>
  <td style="color:red;">
    <?php if(isset($empty_brand)){echo $empty_brand;}?>
  </td>
</tr>
	<tr>
    <td>
        <label>Brand</label>
    </td>
    <td>
        <select id="select" name="brand">
            <option value="<?php if(isset($resultbrand_id)){echo $resultbrand_id;}?>"><?php if(isset($resultbrand_name)){echo $resultbrand_name;}?></option>
            <?php
            class brandRead{
              private $tbl_name = "tbl_brand";
              public function query(){
                $sql = "SELECT * FROM $this->tbl_name ORDER BY brand_name ASC";
                $stmt = db::shopPrepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
              }
            }
            $brandReadObj = new brandRead();
            $brandReadObj->query();
            foreach ($brandReadObj->query() as $value) {
            ?>
            <option value="<?php echo $value["id"];?>"><?php echo $value["brand_name"];?></option>
          <?php } ?>
        </select>
    </td>
</tr>
<tr>
  <td></td>
  <td>
    <img width="150px" src="<?php if(isset($resultPro_img)){echo $resultPro_img;}?>" alt="">
  </td>
</tr>
<tr>
  <td></td>
  <td style="color:red;">
    <?php
    if(isset($shortSize)){echo $shortSize;}
    if(isset($permit)){echo $permit;}
    ?>
  </td>
</tr>
<tr>
    <td>
        <label>Upload Image</label>
    </td>
    <td>
        <input name="image" type="file" />
    </td>
</tr>
<tr>
  <td></td>
  <td style="color:red;">
    <?php if(isset($empty_price)){echo $empty_price;}?>
  </td>
</tr>
<tr>
    <td>
        <label>Price($)</label>
    </td>
    <td>
        <input name="price" type="text" value="<?php if(isset($resultPro_price)){echo $resultPro_price;}?>"  class="medium" />
    </td>
</tr>
<tr>
  <td></td>
  <td style="color:red;">
    <?php if(isset($empty_type)){echo $empty_type;}?>
  </td>
</tr>
	<tr>
    <td>
        <label>Product Type</label>
    </td>
    <td>
        <select id="select" name="pro_type">
            <option value="<?php if(isset($resultPro_product_type)){echo $resultPro_product_type;}?>">
              <?php
               if($resultPro_product_type == 1){
                 echo "Featured";
               }elseif($resultPro_product_type == 2){
                 echo "Non-fetured";
               }
               ?>
            </option>
            <option value="1">Featured</option>
            <option value="2">Non-Featured</option>
        </select>
    </td>
</tr>
<tr>
  <td></td>
  <td style="color:red;">
    <?php if(isset($empty_body)){echo $empty_body;}?>
  </td>
</tr>
 <tr>
    <td style="vertical-align: top; padding-top: 9px;">
        <label>Description</label>
    </td>
    <td>
        <textarea name="body" class="tinymce"><?php if(isset($resultPro_details)){echo $resultPro_details;}?></textarea>
    </td>
</tr>
	<tr>
    <td></td>
    <td>
        <input type="submit" name="submit" Value="Change" />
    </td>
</tr>
</table>
</form>
</div>
<?php
}else{
echo "<script>window.location='404.php';</script>";
}
?>
</div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>
