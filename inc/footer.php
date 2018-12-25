
</div>
<div class="footer">
   <div class="wrapper">
    <div class="section group">
     <div class="col_1_of_4 span_1_of_4">
         <h4>Information</h4>
         <ul>
         <li><a href="#">About Us</a></li>
         <li><a href="#">Customer Service</a></li>
         <li><a href="#"><span>Advanced Search</span></a></li>
         <li><a href="#">Orders and Returns</a></li>
         <li><a href="#"><span>Contact Us</span></a></li>
         </ul>
       </div>
     <div class="col_1_of_4 span_1_of_4">
       <h4>Why buy from us</h4>
         <ul>
         <li><a href="about.php">About Us</a></li>
         <li><a href="faq.php">Customer Service</a></li>
         <li><a href="#">Privacy Policy</a></li>
         <li><a href="contact.php"><span>Site Map</span></a></li>
         <li><a href="preview.php"><span>Search Terms</span></a></li>
         </ul>
     </div>
     <div class="col_1_of_4 span_1_of_4">
       <h4>My account</h4>
         <ul>
           <li><a href="login.php">Sign In</a></li>
           <li><a href="cart.php?buy_product=<?php echo session_id();?>">View Cart</a></li>
           <li><a href="wish-list.php?customerId=<?php echo $customer_id;?>">My Wishlist</a></li>
           <li><a href="order-detials.php">Track My Order</a></li>
           <li><a href="contact.php">Help</a></li>
         </ul>
     </div>
     <div class="col_1_of_4 span_1_of_4">
       <h4>Contact</h4>
         <ul>
           <?php foreach ($contactObj->showInfo() as $value){ ?>
           <li><span>+88 <?php echo $value["phone"];?></span></li>
           <li><span>+88 <?php echo $value["phone_two"];?></span></li>
           <?php } ?>
         </ul>
         <div class="social-icons">
           <h4>Follow Us</h4>
               <ul>
                 <?php foreach($othersObj->socileSelect() as $value){ ?>
                 <a href="<?php echo $value['fb'];?>" target="_blank"><li class="facebook"> </li></a>
                 <a href="<?php echo $value['twitter'];?>" target="_blank"><li class="twitter"></li></a>
                 <a href="<?php echo $value['googleplus'];?>" target="_blank"><li class="googleplus"></li></a>
                 <a href="<?php echo $value['linkedin'];?>" target="_blank"><li class="contact"></li></a>
                 <div class="clear"></div>
                 <?php } ?>
              </ul>
           </div>
     </div>
   </div>
   <div class="copy_right">
     <p>Training with live project &amp; All rights Reseverd </p>
    </div>
  </div>
 </div>
 <script type="text/javascript">
 $(document).ready(function() {

   $().UItoTop({ easingType: 'easeOutQuart' });

 });
</script>
 <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
 <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
 <script defer src="js/jquery.flexslider.js"></script>
 <script type="text/javascript">
 $(function(){
   SyntaxHighlighter.all();
 });
 $(window).load(function(){
   $('.flexslider').flexslider({
   animation: "slide",
   start: function(slider){
     $('body').removeClass('loading');
   }
   });
 });
 </script>
</body>
</html>
