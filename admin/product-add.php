<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
<div class="box round first grid">
<h2>Add New Product</h2>
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
    }elseif(empty($file_name)){
     $emptyImg = "<span style='color:red'>Please select a picture</span>";
    }elseif ($file_size>103690) {
     $shortSize = "<span style='color:red'>File size should be less than 100 KB</span>";
    }elseif (in_array($file_exe,$permitted) === false) {
     $permit = "<span style='color:red'>You can uplode only ".implode(', ',$permitted)."</span>";
    }else{
    move_uploaded_file($tmp_name,$unique_name);
    class insertClass{
      private $tbl_name = "tbl_product";
      private $product_name;
      private $catagory;
      private $brand;
      private $body;
      private $price;
      private $pro_type;
      private $unique_name;
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
        $sql = "INSERT INTO $this->tbl_name(product_name,cat_id,brand_id,details,price,img,product_type) VALUES(:product_name,:catagory,:brand,:body,:price,:unique_name,:pro_type)";
        $stmt = db::shopPrepare($sql);
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
    $insertObj = new insertClass();
    $insertObj->product_name($product_name);
    $insertObj->catagory($catagory);
    $insertObj->brand($brand);
    $insertObj->body($body);
    $insertObj->price($price);
    $insertObj->pro_type($pro_type);
    $insertObj->unique_name($unique_name);
    if($insertObj->query()){
      echo "<h4 style='color:green'>You have successfully added a ".$product_name."</h4>";
    }else{
      echo "<h4 style='color:red'>Something went wrong.</h4>";
    }
  }//end of the condition
}//end of the getting data
  ?>
<form action="" method="post" enctype="multipart/form-data">
<table class="form">
<tr>
  <td>
      <label>Product Name</label>
  </td>
  <td>
      <input type="text" name="name" class="medium" />
  </td>
</tr>
<tr>
  <td>
      <label>Category</label>
  </td>
  <td>
      <select id="select" name="catagory">
          <option>Select Category</option>
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
          foreach ($catReadObj->query() as $value) { ?>
          <option value='<?php echo $value["id"];?>'><?php echo $value["cat_name"];?></option>
        <?php } ?>
      </select>
  </td>
</tr>
<tr>
  <td>
      <label>Brand</label>
  </td>
  <td>
      <select id="select" name="brand">
          <option>Select Brand</option>
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
          foreach ($brandReadObj->query() as $value) { ?>
          <option value='<?php echo $value["id"];?>'><?php echo $value["brand_name"];?></option>
        <?php } ?>
      </select>
  </td>
</tr>
<tr>
  <td>
      <label>Price</label>
  </td>
  <td>
      <input type="text" name="price" class="medium" />
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
  <td>
      <label>Product Type</label>
  </td>
  <td>
      <select id="select" name="pro_type">
          <option>Select Type</option>
          <option value="1">Featured</option>
          <option value="2">Non-Featured</option>
      </select>
  </td>
</tr>
<tr>
  <td style="vertical-align: top; padding-top: 9px;">
      <label>Description</label>
  </td>
  <td>
      <textarea name="body" class="tinymce"></textarea>
  </td>
</tr>
<tr>
  <td></td>
  <td>
      <input type="submit" name="submit" Value="Save" />
  </td>
</tr>
</table>
</form>
</div>
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
