<?php include("inc/header.php");
$signined = session::get("customer_login");
if($signined == false){
  header("location:login.php");
}
?>
<div class="main">
   <div class="content">
     <div class="section group">
       <style media="screen">
         .tblone{width: 600px;margin: 0 auto;border:1px solid #ddd}
         .tblone tr td{text-align: justify;color:#676756cf}
       </style>
       <?php
       $user_id = session::get("customerId");
       class profileClass{
         private $tbl_customer = "tbl_customer";
         private $user_id;
         public function user_id($user_id){
           $this->user_id = $user_id;
         }
         public function query(){
           $sql = "SELECT * FROM $this->tbl_customer WHERE id=:user_id";
           $stmt = db::shopPrepare($sql);
           $stmt->bindParam(":user_id",$this->user_id);
           $stmt->execute();
           return $stmt->fetchAll();
         }
       }
       $profileObj = new profileClass();
       $profileObj->user_id($user_id);
       $profileObj->query();
       foreach ($profileObj->query() as $value) {
       ?>
       <table class="tblone">
         <tr>
           <td colspan="3"><h2>Your profile</h2></td>
         </tr>
          <tr>
            <td width="25%">Name</td>
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
            <td colspan="3"><a  style="color:#1888ff" href="profile-update.php?profile-update=<?php echo $value["id"];?>">Setting</a></td>
          </tr>
       </table>
     <?php } ?>
     </div>
    </div>
</div>
<?php include("inc/footer.php");?>
