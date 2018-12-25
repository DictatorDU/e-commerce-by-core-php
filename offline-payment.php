<?php include("inc/header.php");?>
<?php
$signined = session::get("customer_login");
if($signined == false){
  header("location:login.php");
}
?>
<style media="screen">
.sectionTwo{width: 508px;min-height:400px;border: 1px solid #ddd;float: right;}
.sectionOne{width: 508px;min-height:400px;border: 1px solid #ddd;float: left;}
</style>
<div class="main">
   <div class="content">
     <div class="section group">
       <?php
       $user_id = session::get("customerId");
       $session_id = session_id();
       include("classes/offline-payment.php");
       $paymentConfirmObj->session_id($session_id);
       foreach ($paymentConfirmObj->query() as $value) {
         $sssid = $value["session_id"];
       }
       if(!empty($sssid)){
       ?>
       <div class="sectionOne">
         <table class="tblone">
           <tr>
             <th width="40%">Product</th>
             <th width="25%">Price (Per.)</th>
             <th width="5%">Quantity</th>
             <th width="25%">Total Price</th>
           </tr>
          <?php
          foreach ($paymentConfirmObj->query() as $value) {
          ?>
            <tr>
            <td><?php echo $value["product_name"];?></td>
            <td style="text-align: center;">$<?php echo $value["price"];?></td>
            <td style="text-align: center;"><?php echo $value["quantity"];?></td>
            <td style="text-align: center;">$<?php echo $value["total_price"];?></td>
            <?php
            $sum = 0;
            $qnt = 0;
            foreach ($paymentConfirmObj->query() as $total) {
               $sum = $sum+$total["total_price"];
               $qnt = $qnt+$total["quantity"];
            }?>
          </tr>
        <?php }?>
      </table>
      <hr>
      <style media="screen">
        .tblPrice{width: 300px;float: right;}
        .tblPrice td .tdHead{font-size: 20px;}
      </style>
      <table class="tblPrice">
        <tr>
          <td><span class="tdHead">Total product price </span></td>
          <td width="10%">:</td>
          <td> $<?php
          if(isset($sum)){echo $sum;}
          ?></td>
        </tr>
        <tr>
          <td><span class="tdHead">Vat (5%) </span></td>
          <td>:</td>
          <td> $<?php
          if(isset($sum)){echo $sum/100*5;}
          ?></td>
        </tr>
        <tr>
          <td><span class="tdHead">Total price </span></td>
          <td>:</td>
          <td style="font-size:20px;color:red;"> $<?php
          if(isset($sum)){echo $sum/100*5+$sum;}
          ?></td>
        </tr>
        <tr>
          <td><span class="tdHead">Quantity </span></td>
          <td>:</td>
          <td><?php
          if(isset($qnt)){echo $qnt;}
          ?></td>
        </tr>
      </table>
       </div>
       <div class="sectionTwo">
         <style media="screen">
         .tblone{margin: 0 auto;}
         .tblone tr td{text-align: justify;color:#676756cf}
         .tblone tr td.headline{background: #666666;color:#fff;}
         .tblone tr td.headline h2{color:#fff;}
         </style>
         <?php
         $paymentConfirmObj->user_id($user_id);
         foreach ($paymentConfirmObj->Customerquery() as $value) {?>
           <table class="tblone">
             <tr>
               <td class="headline" colspan="3"><h2>Your Address</h2></td>
             </tr>
              <tr>
                <td width="30%">Name</td>
                <td width="5%">:</td>
                <td><?php echo $value["name"];?></td>
              </tr>
              <tr>
                <td>Phone Number</td>
                <td>:</td>
                <td><?php echo $value["phone"];?></td>
              </tr>
              <tr>
                <td>E-mail</td>
                <td>:</td>
                <td><?php echo $value["email"];?></td>
              </tr>
              <tr>
                <td>Address</td>
                <td>:</td>
                <td><?php echo $value["address"];?></td>
              </tr>
              <tr>
                <td>Zip-code</td>
                <td>:</td>
                <td><?php echo $value["zip"];?></td>
              </tr>
              <tr>
                <td>City</td>
                <td>:</td>
                <td><?php echo $value["city"];?></td>
              </tr>
              <tr>
                <td>Country</td>
                <td>:</td>
                <td><?php echo $value["country"];?></td>
              </tr>
              <tr>
                <td colspan="3"><a  style="color:#1888ff" href="profile-update.php?profile-update=<?php echo $value["id"];?>">Change</a></td>
              </tr>
           </table>
         <?php }?>
       </div>
       <style media="screen">
       .order{color: #fffefe;background: #e82020;padding: 15px 59px;text-align: center;float: right;border-radius: 5px;margin-top: 14px;font-size: 25px;font-weight: bold;}
       .order:hover{background: #fd0606;}
       </style>
         <a class="order" href="order.php?order=<?php echo session_id();?>">Order</a>
     <?php }else{header("location:cart.php?buy_product=$session_id");}?>
     </div>
    </div>
</div>
<?php include("inc/footer.php");?>
