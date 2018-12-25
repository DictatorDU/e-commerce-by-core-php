<?php include("inc/header.php");?>
<?php
$signined = session::get("customer_login");
if($signined == false){
  header("location:login.php");
}
?>
<?php if(isset($_GET["order"]) && $_GET["order"] == "successfull"){ ?>
<div class="main">
   <div class="content">
     <div class="section group">
       <style media="screen">
         .success_div{width: 550px;height: 350px;border: 2px solid #ddd;margin:0 auto;}
         .success_div h2{padding: 20px;font-size: 31px;text-align: center;border-bottom:1px solid #ddd;color:green;}
         .success_div p{padding:5px 10px;font-size: 20px;}
       </style>
       <div class="success_div">
           <?php
            $customerId = session::get("customerId");
            include("classes/order.php");
            $orderClassObj = new orderClass();
            $orderClassObj->customerId($customerId);
           ?>
           <h2>Successful</h2>
           <p>
             Total payable amount (including VAT) $<?php
             $sum = 0;
             foreach ($orderClassObj->price() as $value) {
               $sum = $sum + $value["price"];
             }
             if(isset($sum)){echo $sum;}
             ?>.<br><br>
             Thank you for your Purchase.We received your order. We will contact you as soon as possible with your order details.
             <a href="order-detials.php">Visit your order detials.</a>
           </p>
       </div>
     </div>
    </div>
</div>
<?php }else{ header("location:error/.htaccess");} ?>
<?php include("inc/footer.php");?>
