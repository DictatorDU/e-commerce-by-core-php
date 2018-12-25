<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
<div class="box round first grid">
<h2>Post List</h2>
<div class="block">
  <?php
  if(isset($_SESSION["upsuccess_one"])){
    echo "<h4 style='color:green'>You have successfully changed.</h4>";
  }
  if(isset($_SESSION["upsuccess_two"])){
    echo "<h4 style='color:green'>You have successfully changed.</h4>";
  }
  if(isset($_SESSION["productUpSuc"])){
    echo "<h4 style='color:green'>You have successfully deleted.</h4>";
  }
  ?>
<table class="data display datatable" id="example">
<thead>
	<tr>
		<th style="width:5%;text-align:center;">SL</th>
		<th style="width:15%;text-align:center;">Product Name</th>
		<th style="width:10%;text-align:center;">Catagory</th>
		<th style="width:10%;text-align:center;">Brand</th>
		<th style="width:20%;text-align:center;">Description</th>
		<th style="width:7%;text-align:center;">Price</th>
		<th style="width:7%;text-align:center;">Image</th>
		<th style="width:7%;text-align:center;">Type</th>
		<th style="width:20%;text-align:center;">Action</th>
	</tr>
</thead>
<tbody>
  <?php
  class viewClass{
    private $tbl_product = "tbl_product";
    private $tbl_cat = "tbl_cat";
    private $tbl_brand = "tbl_brand";
    public function query(){
      $sql = "SELECT $this->tbl_product.*,$this->tbl_cat.cat_name,$this->tbl_brand.brand_name
              FROM $this->tbl_product
              INNER JOIN $this->tbl_cat
              ON $this->tbl_product.cat_id = $this->tbl_cat.id
              INNER JOIN $this->tbl_brand
              ON $this->tbl_product.brand_id = $this->tbl_brand.id
              ORDER BY $this->tbl_product.product_name ASC";
     $stmt = db::shopPrepare($sql);
     $stmt->execute();
     return $stmt->fetchAll();
    }
  }
  $viewObj = new viewClass();
  $viewObj->query();
  if($viewObj->query()){
    $i = 0;
    foreach ($viewObj->query() as $value) {
      $i++;   ?>
	<tr class="odd gradeX">
		<td style="text-align:center;"><?php echo $i;?></td>
		<td style="text-align:center;"><?php echo $formatObj->textShorten($value["product_name"],25);?></td>
		<td style="text-align:center;"><?php echo $value["cat_name"];?></td>
		<td style="text-align:center;" class="center"><?php echo $value["brand_name"];?></td>
		<td style="text-align:center;"><?php echo $formatObj->textShorten($value["details"]);?></td>
		<td style="text-align:center;">$<?php echo $value["price"];?></td>
		<td style="text-align:center;"><img width="50px" height="auto" src="<?php echo $value['img'];?>" alt=""></td>
		<td style="text-align:center;"><?php
    if($value["product_type"] == 1){
      echo "Featured";
    }elseif($value["product_type"] == 2){
      echo "Non-Featured";
    }
     ?></td>
		<td style="text-align:center;">
      <a href="poduct-edit.php?productId=<?php echo $value["id"];?>">Edit</a> ||
      <a href="product-delete.php?productId=<?php echo $value["id"];?>">Delete</a> ||
      <a href="product-view.php?productId=<?php echo $value["id"];?>">View</a>
    </td>
	</tr>
<?php }} ?>
</tbody>
</table>
</div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php
unset($_SESSION["upsuccess_one"]);
unset($_SESSION["upsuccess_two"]);
unset($_SESSION["productUpSuc"]);
?>
<?php include 'inc/footer.php';?>
