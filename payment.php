<?php include("inc/header.php");?>
<?php
$signined = session::get("customer_login");
if($signined == false){
  header("location:login.php");
}
$session_id = session_id();
include("classes/offline-payment.php");
$paymentConfirmObj->session_id($session_id);
foreach ($paymentConfirmObj->query() as $value) {
  $sssid = $value["session_id"];
}
if(!empty($sssid)){
?>
<style media="screen">
.payment{width: 600px;min-height: 300px;border:1px solid #ddd;border-radius: 3px;margin:0 auto;text-align: center;}
.payment h2 {font-size: 34px;color: #6C6C6C;font-family: 'Monda', sans-serif;text-align: center;padding: 15px;border-bottom: .5px solid #ddd;margin-bottom: 70px;}
.payment a {background: #f11205;color: #fff;padding: 10px 30px;font-size: 20px;border-radius: 3px;text-align: center;}
.payment a:hover{background: #cc1010;color: #fbfbfb;}
</style>
<div class="main">
   <div class="content">
     <div class="section group">
       <div class="payment">
          <h2>Payment option</h2>
          <a href="online-payment.php">Online Payment</a>
          <a href="offline-payment.php">Offline Payment</a><br>
       </div>
     </div>
    </div>
</div>
<?php }else{header("location:cart.php?buy_product=$session_id");}?>
<?php include("inc/footer.php");?>
