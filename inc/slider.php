<div class="header_bottom">
  <div class="header_bottom_left">
    <div class="section group">
      <?php
      include("classes/letest-product-classes.php");
      ?>
      <div class="listview_1_of_2 images_1_of_2">
        <div class="listimg listimg_2_of_1">
           <a href="preview.php?productId=<?php echo $iphoneId;?>"> <img height="100px" src="admin/<?php if(isset($iphoneImg)){echo $iphoneImg;}?>" alt="" /></a>
        </div>
          <div class="text list_2_of_1">
          <h2><?php if(isset($iphoneName)){echo $iphoneName;}?></h2>
          <p><?php if(isset($iphonebody)){echo $iphonebody;}?></p>
          <div class="button"><span><a href="preview.php?productId=<?php echo $iphoneId;?>">Add to cart</a></span></div>
         </div>
       </div>
      <div class="listview_1_of_2 images_1_of_2">
        <div class="listimg listimg_2_of_1">
            <a href="preview.php?productId=<?php echo $samsungId;?>"><img height="100px" src="admin/<?php if(isset($samsungImg)){echo $samsungImg;}?>" alt="" / ></a>
        </div>
        <div class="text list_2_of_1">
            <h2><?php if(isset($samsungName)){echo $samsungName;}?></h2>
            <p><?php if(isset($samsungbody)){echo $samsungbody;}?></p>
            <div class="button"><span><a href="preview.php?productId=<?php echo $samsungId;?>">Add to cart</a></span></div>
        </div>
      </div>
    </div>
    <div class="section group">
      <div class="listview_1_of_2 images_1_of_2">
        <div class="listimg listimg_2_of_1">
           <a href="preview.php?productId=<?php echo $AccerId;?>"> <img height="100px" src="admin/<?php if(isset($accerImg)){echo $accerImg;}?>" alt="" /></a>
        </div>
          <div class="text list_2_of_1">
          <h2><?php if(isset($AccerName)){echo $AccerName;}?></h2>
          <p><?php if(isset($accerbody)){echo $accerbody;}?></p>
          <div class="button"><span><a href="preview.php?productId=<?php echo $AccerId;?>">Add to cart</a></span></div>
         </div>
       </div>
      <div class="listview_1_of_2 images_1_of_2">
        <div class="listimg listimg_2_of_1">
            <a href="preview.php?productId=<?php echo $cannonId;?>"><img height="100px" src="admin/<?php if(isset($cannonImg)){echo $cannonImg;}?>" alt="" /></a>
        </div>
        <div class="text list_2_of_1">
            <h2><?php if(isset($cannonName)){echo $cannonName;}?></h2>
            <p><?php if(isset($cannonbody)){echo $cannonbody;}?></p>
            <div class="button"><span><a href="preview.php?productId=<?php echo $cannonId;?>">Add to cart</a></span></div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
     <div class="header_bottom_right_images">
     <!-- FlexSlider -->

    <section class="slider">
        <div class="flexslider">
        <ul class="slides">
          <li><img src="images/1.jpg" alt=""/></li>
          <li><img src="images/2.jpg" alt=""/></li>
          <li><img src="images/3.jpg" alt=""/></li>
          <li><img src="images/4.jpg" alt=""/></li>
          </ul>
        </div>
      </section>
<!-- FlexSlider -->
    </div>
  <div class="clear"></div>
</div>
