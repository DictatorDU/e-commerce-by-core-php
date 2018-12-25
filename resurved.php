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
       <p style="font-size:40px;padding:100px;">Order page will be go here.</p>
     </div>
    </div>
</div>
<?php include("inc/footer.php");?>
