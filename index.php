<?php include("inc/header.php");?>
<?php include("inc/slider.php");?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
          <?php
          class featureClas{
            private $tbl_name = "tbl_product";
            public function query(){
              $sql = "SELECT * FROM $this->tbl_name WHERE product_type=1 ORDER BY id DESC LIMIT 4";
              $stmt = db::shopPrepare($sql);
              $stmt->execute();
              return $stmt->fetchAll();
            }
          }
          $featureObj = new featureClas();
          $featureObj->query();
          foreach ($featureObj->query() as $value) {
          ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?productId=<?php echo $value["id"];?>"><img height="200px" src="admin/<?php echo $value["img"];?>" alt="" /></a>
					 <h2><?php echo  $formatObj->textShorten($value["product_name"],20);?></h2>
					 <p><span class="price">$<?php echo $value["price"];?></span></p>
				   <div class="button"><span><a href="preview.php?productId=<?php echo $value["id"];?>" class="details">Details</a></span></div>
				</div>
      <?php } ?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
        <?php
        class letestClass{
          private $tbl_name = "tbl_product";
          public function query(){
            $sql = "SELECT * FROM $this->tbl_name ORDER BY id DESC LIMIT 4";
            $stmt = db::shopPrepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
          }
        }
        $featureObj = new letestClass();
        $featureObj->query();
        foreach ($featureObj->query() as $value) {
        ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?productId=<?php echo $value["id"];?>"><img height="200px" src="admin/<?php echo $value["img"];?>" alt="" /></a>
					 <h2><?php echo  $formatObj->textShorten($value["product_name"],20)?></h2>
					 <p><span class="price">$<?php echo $value["price"]?></span></p>
				     <div class="button"><span><a href="preview.php?productId=<?php echo $value["id"];?>" class="details">Details</a></span></div>
				</div>
      <?php } ?>
				</div>
			</div>
    </div>
 </div>
</div>
<?php include("inc/footer.php");?>
