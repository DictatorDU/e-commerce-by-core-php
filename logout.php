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
       $signined = session::get("customer_login");
       if($signined == true){
       if(isset($_GET["action"]) && $_GET["action"] == "logout"){
             $session_id = session_id();
             include("classes/logout.php");
             $logoutObj->session_id($session_id);
             $logoutObj->cartsessiondell();
             $logoutObj->compatesessiondel();
             session::sessionDestroy();
       }
     }
       ?>
     </div>
    </div>
</div>
<?php include("inc/footer.php");?>
