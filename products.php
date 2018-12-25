<?php
include("inc/header.php");
include("classes/product.php");
?>
 <div class="main">
   <?php
   foreach ($productObj->showBrand() as $value) {
   ?>
    <div class="content">
			<div class="content_bottom">
    		<div class="heading">
    		<h3><?php echo $value['brand_name'];?></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
      <?php
      $brand_id = 1;
      $productObj->brand_id($brand_id);
      foreach ($productObj->shoProduct() as $valueTow) {
      ?>
      <div class="section group">
        <div class="grid_1_of_4 images_1_of_4">
           <a href="preview-3.html"><img src="admin/<?php echo $valueTow['img'];?>" alt="" /></a>
           <h2><?php echo $valueTow['product_name'];?></h2>
           <p><span class="price">$ <?php echo $valueTow['price'];?></span></p>
            <div class="button"><span><a href="preview.php?productId=<?php echo $valueTow['id'];?>" class="details">Details</a></span></div>
        </div>
      </div>
    <?php } ?>
    </div>
  <?php } ?>
 </div>
</div>
<?php include("inc/footer.php");?>
