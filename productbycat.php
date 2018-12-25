<?php include("inc/header.php");?>
<?php
if(isset($_GET["catagoryId"]) && $_GET["catagoryId"] != NULL){
  $cat_id = $_GET["catagoryId"];
?>
 <div class="main">
    <div class="content">
          <?php
          include("classes/catagory.php");
          $readCatObj->cat_id($cat_id);
          $readCatObj->catProduct();
          if($readCatObj->catProduct()){?>
        <div class="content_top">
          <div class="heading">
            <?php foreach ($readCatObj->singleCatName() as  $value) {?>
          <h3><?php echo $value["cat_name"];?></h3>
        <?php } ?>
          </div>
          <div class="clear"></div>
        </div>
          <div class="section group">
          <?php foreach ($readCatObj->catProduct() as $value) {?>
				<div class="grid_1_of_4 images_1_of_4" style="width:20%">
					 <a href="preview.php?productId=<?php echo $value["id"];?>"><img height="200px" width="100%" src="admin/<?php echo $value["img"];?>" alt="" /></a>
					 <h2><?php echo $value["product_name"];?></h2>
					 <p><span class="price">$<?php echo $value["price"];?></span></p>
				     <div class="button"><span><a href="preview.php?productId=<?php echo $value["id"];?>">Details</a></span></div>
				</div>
      <?php }
      }else{
        echo '<img style="margin-left:40%;" src="images/images.png" alt="" />';
      } ?>
			</div>
    </div>
 </div>
<?php }else{header("location:error/.htaccess");}?>
</div>
<?php include("inc/footer.php");?>
