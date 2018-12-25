<?php include("inc/header.php");?>
<?php
$signined = session::get("customer_login");
if($signined == false){
  header("location:login.php");
}
?>
<div class="main">
   <div class="content">
     <div class="section group">
       <?php
       $session_id = session_id();
       $customerId = session::get("customerId");
       if(isset($_GET["order"]) && $_GET["order"] == $session_id){
         include("classes/order.php");
         $orderObj = new orderClass();
         $orderObj->session_id($session_id);
         foreach ($orderObj->selectQuery() as $value) {
           $productId = $value["product_id"];
           $product_name = $value["product_name"];
           $price = $value["total_price"];
           $vat = $price/100*5;
           $total_price = $price+$vat;
           $quantity = $value["quantity"];
           $img = $value["img"];

           $orderObj->customerId($customerId);
           $orderObj->productId($productId);
           $orderObj->product_name($product_name);
           $orderObj->total_price($total_price);
           $orderObj->quantity($quantity);
           $orderObj->img($img);
           if($orderObj->insertOrder()){
             $orderObj->delquery();
             header("location:success-order.php?order=successfull");
           }
         }
       }
       ?>
     </div>
    </div>
</div>
<?php include("inc/footer.php");?>
