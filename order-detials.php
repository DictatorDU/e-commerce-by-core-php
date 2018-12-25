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
       <style media="screen">
       .sectionOne{width: 100%;min-height:400px;border: 1px solid #ddd;float: left;}
       </style>
       <div class="sectionOne">
         <?php
         $customerId = session::get("customerId");
         include("classes/order.php");
         $orderClassObj = new orderClass();
         $orderClassObj->customerId($customerId);
         foreach ($orderClassObj->readOrdered() as $value) {
         if($value["status"] == 3){
         if(isset($_GET["shipted_order_del"]) && $_GET["shipted_order_del"] != NULL){
           $orderid = $_GET["shipted_order_del"];
           $orderClassObj->orderid($orderid);
           $orderClassObj->shiptedorderdel();
           if($orderClassObj->shiptedorderdel()){
             echo "<script>window.location='order-detials.php';</script>";
           }
         }
       }
       if($value["status"] == 2){
         if(isset($_GET["shipted_order_con"]) && $_GET["shipted_order_con"] != NULL){
           $orderid = $_GET["shipted_order_con"];
           $orderClassObj->orderid($orderid);
           $orderClassObj->shiptUpconfirm();
           $orderClassObj->shipteproconfirm();
           if($orderClassObj->shipteproconfirm()){
             echo "<script>window.location='order-detials.php';</script>";
           }
         }
       }
     }
         if(!empty($orderClassObj->readOrdered())){
         ?>
         <table class="tblone">
           <tr>
             <th width="2%">No</th>
             <th width="20%">Product</th>
             <th width="10%">Image</th>
             <th width="20%">Price (Per.) + VAT(5%)</th>
             <th width="5%">Quantity</th>
             <th width="10%">Total Price</th>
             <th width="10%">Status</th>
             <th width="12%">Date</th>
             <th width="10%">Action</th>
           </tr>
          <?php
          $i=0;
          foreach ($orderClassObj->readOrdered() as $value) {
            $status = $value["status"];
            $i++;
            $qnt = $value["quantity"];
            $price = $value["price"];
          ?>
            <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $value["product_name"];?></td>
            <td><img height="50px" src='admin/<?php echo $value["img"];?>' alt=""></td>
            <td style="text-align: center;">$<?php
            echo $price/$qnt;
            ?></td>
            <td style="text-align: center;"><?php echo $value["quantity"];?></td>
            <td style="text-align: center;">$<?php echo $value["price"];?></td>
            <td style="text-align: center;"><?php
             $status = $value["status"];
             if($status == 0){
               echo "<span style='color:green'>Pending</span>";
             }elseif($status == 2){
               echo "Shipted";
             }elseif($status == 3){
               echo "Reached";
             }
             ?></td>
             <td style="text-align: center"><?php echo $formatObj->formatDatetwo($value["time_date"]);?></td>
             <?php if($status == 0){?>
            <td style="text-align: center;">Not availble</td>
          <?php }elseif($status == 2){ ?>
            <td style="text-align: center;"><a href="?shipted_order_con=<?php echo $value["id"];?>">Confirm</a></td>
         <?php }else{?>
            <td style="text-align: center;color:red;font-size:20px;"><a href="?shipted_order_del=<?php echo $value["id"];?>">X</a></td>
          <?php } ?>
          </tr>
        <?php } ?>
      </table>
    <?php }else{echo '<img style="margin-left:25%;" src="images/empty-cart-icon-1.jpg" alt="" />';} ?>
     </div>
     </div>
    </div>
</div>
<?php include("inc/footer.php");?>
